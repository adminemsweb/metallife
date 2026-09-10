(()=>{
  const labels={lote:'lote',dia:'dia',turno:'turno',semana:'semana',mes:'mês','Pintura eletrostatica a po':'Pintura eletrostática a pó','Pintura liquida':'Pintura líquida','Automatica':'Automática','Transportador aereo':'Transportador aéreo','Varias vezes ao dia':'Várias vezes ao dia','Iluminacao da area de pintura':'Iluminação da área de pintura','Exaustao e filtragem':'Exaustão e filtragem','Recuperacao de tinta em po':'Recuperação de tinta em pó','Integracao com transportador':'Integração com transportador','Acessos para manutencao':'Acessos para manutenção'};
  const text=value=>String(value??'').trim();
  const label=value=>labels[value]||text(value);
  const number=value=>text(value).replace('.',',');
  const dimensions=(data,prefix,unit)=>{
    const names=['width','height','depth'];
    if(names.every(key=>!text(data[prefix+'_'+key])))return 'A definir com a equipe';
    return names.map((key,i)=>['L','A','P'][i]+': '+(text(data[prefix+'_'+key])?number(data[prefix+'_'+key])+' '+unit:'a definir')).join(' × ');
  };
  const features=data=>(Array.isArray(data.features)?data.features:[]).filter(item=>data.process!=='Pintura liquida'||item!=='Recuperacao de tinta em po').map(label);
  const rows=data=>[
    ['Produto',text(data.product)||'O que você quer pintar?'],
    ['Produção desejada',text(data.quantity)?number(data.quantity)+' peças'+(data.period?' por '+label(data.period):' — período a definir'):'Quantidade e período a definir'],
    ['Maior peça (L × A × P)',dimensions(data,'piece','cm')],
    ['Pintura / aplicação',(label(data.process)||'A definir')+' / '+(label(data.operation)||'A definir')],
    ['Cabine: medidas úteis internas',data.size_mode==='custom'?dimensions(data,'booth','m'):'Dimensionar com a Metal Life'],
    ['Espaço disponível',dimensions(data,'space','m')],
    ['Cor externa da cabine',text(data.finish)||'A definir'],
    ['Recursos para avaliação',features(data).join(', ')||'A definir com a equipe'],
    ...(data.visual_panel||data.visual_frame?[['Referência de cores do visualizador','Painel: '+(text(data.visual_panel)||'a definir')+' / Estrutura: '+(text(data.visual_frame)||'a definir')]]:[])
  ];
  const message=data=>{
    const details=rows(data).map(([key,value])=>key+': '+value);
    const extra=[['Material',data.material],['Peso da maior peça (kg)',data.weight],['Movimentação',label(data.handling)],['Trocas de cor da tinta',label(data.changes)],['Horas de produção por dia',data.hours],['Operadores simultâneos',data.operators],['Tinta / revestimento',data.coating],['Alimentação elétrica',data.power],['Observações',data.notes],['Nome',data.name],['Empresa',data.company],['Cidade / estado',data.city]].filter(([,value])=>text(value)).map(([key,value])=>key+': '+text(value));
    return ['Olá! Quero uma proposta de cabine de pintura industrial Metal Life.','',...details,'',...extra,'','Estas são as necessidades desejadas. Solicito avaliação técnica de medidas, capacidade e configuração.'].join('\n');
  };
  const fitWarnings=data=>{
    if(data.size_mode!=='custom')return [];
    const result=[];
    for(const [axis,name] of [['width','largura'],['height','altura'],['depth','profundidade']]){
      const cabin=Number(data['booth_'+axis]),piece=Number(data['piece_'+axis])/100,space=Number(data['space_'+axis]);
      if(cabin>0&&piece>0&&piece>=cabin)result.push(`A ${name} da peça é igual ou maior que a medida interna desejada da cabine.`);
      if(cabin>0&&space>0&&cabin>=space)result.push(`A ${name} interna desejada da cabine é igual ou maior que o espaço disponível.`);
    }
    return result;
  };
  window.BoothProject={rows,message,fitWarnings};
})();
