(()=>{
  const form=document.querySelector('#booth-project');
  if(!form)return;
  const model=window.BoothProject;
  const field=name=>form.elements.namedItem(name);
  const summary=form.querySelector('[data-booth-summary]');
  const sizeFields=form.querySelector('[data-booth-dimensions]');
  const assisted=form.querySelector('[data-booth-assisted]');
  const warning=form.querySelector('[data-booth-fit]');
  const status=form.querySelector('[data-booth-status]');
  const submit=form.querySelector('[data-booth-submit]');
  const copy=form.querySelector('[data-booth-copy]');
  const example=document.querySelector('[data-booth-example]');
  const powder=form.querySelector('[data-powder-option]');
  const read=()=>{
    const data=new FormData(form);
    const visualPanel=document.querySelector('[data-cabine-panel-name]')?.textContent.trim();
    const visualFrame=document.querySelector('[data-cabine-frame-name]')?.textContent.trim();
    return {...Object.fromEntries(data.entries()),features:data.getAll('features'),visual_panel:visualPanel,visual_frame:visualFrame};
  };
  const update=()=>{
    const custom=field('size_mode').value==='custom';
    sizeFields.hidden=!custom;
    assisted.hidden=custom;
    sizeFields.querySelectorAll('input').forEach(input=>{input.required=custom;input.disabled=!custom;});
    const liquid=field('process').value==='Pintura liquida';
    powder.disabled=liquid;
    if(liquid)powder.checked=false;
    form.querySelector('[data-powder-note]').hidden=!liquid;
    for(const name of ['name','product'])field(name).setCustomValidity(field(name).value.trim()?'':'Preencha este campo.');
    const data=read();
    summary.replaceChildren(...model.rows(data).map(([key,value])=>{
      const row=document.createElement('div'),term=document.createElement('dt'),definition=document.createElement('dd');
      term.textContent=key;definition.textContent=value;row.append(term,definition);return row;
    }));
    const warnings=model.fitWarnings(data);
    warning.hidden=warnings.length===0;
    warning.textContent=warnings.length?warnings.join(' ')+' Revise as medidas; a equipe também avaliará acessos, folgas de trabalho e equipamentos auxiliares.':'';
  };
  form.addEventListener('input',()=>{status.textContent='';update();});
  form.addEventListener('change',update);
  document.querySelector('[data-cabine-gallery]')?.addEventListener('cabine:colors',update);
  form.addEventListener('submit',event=>{
    event.preventDefault();update();
    if(!form.reportValidity())return;
    const url=new URL('https://wa.me/5511969195102');
    url.searchParams.set('text',model.message(read()));
    window.location.assign(url.href);
  });
  copy.addEventListener('click',async()=>{
    update();
    try{await navigator.clipboard.writeText(model.message(read()));status.textContent='Resumo copiado. Você pode colar a mensagem no WhatsApp.';}
    catch{status.textContent='Não foi possível copiar automaticamente. Use o botão para abrir o projeto no WhatsApp.';}
  });
  example.addEventListener('click',()=>{
    for(const [name,value] of Object.entries({product:'Panelas',quantity:'500',period:'dia',piece_width:'35',piece_height:'20',piece_depth:'50',hours:'8'}))field(name).value=value;
    update();
    status.textContent='Exemplo aplicado: 500 panelas por dia. Medidas ilustrativas; ajuste para o seu produto.';
    field('product').focus();
  });
  update();submit.disabled=false;copy.hidden=false;example.hidden=false;
})();
