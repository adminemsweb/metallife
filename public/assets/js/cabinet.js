(()=>{
  const gallery=document.querySelector('.cabinet-hero[data-cabine-gallery]');
  if(!gallery)return;
  const source=gallery.querySelector('[data-cabine-source]');
  const render=gallery.querySelector('[data-cabine-render]');
  const status=gallery.querySelector('[data-cabinet-status]');
  const angle=gallery.querySelector('[data-cabinet-angle-name]');
  const zoom=gallery.querySelector('[data-cabinet-zoom]');
  const viewControls=gallery.querySelector('.cabinet-view-controls');
  const views=[...gallery.querySelectorAll('[data-cabinet-view]')];
  const quoteLinks=[...document.querySelectorAll('[data-cabinet-quote]')];
  const panelName=gallery.querySelector('[data-cabine-panel-name]');
  const frameName=gallery.querySelector('[data-cabine-frame-name]');
  const canvas=gallery.querySelector('[data-cabine-canvas]');
  const updateConfiguration=()=>{
    const panel=panelName.textContent.trim();
    const frame=frameName.textContent.trim();
    const message=`Olá! Tenho interesse no gabinete metálico personalizado Metal Life.\nMinha combinação de referência: painel ${panel}; estrutura ${frame}.\nGostaria de definir as medidas e receber uma proposta.`;
    quoteLinks.forEach(link=>link.href=`https://wa.me/5511969195102?text=${encodeURIComponent(message)}`);
    canvas.setAttribute('aria-label',`Gabinete Metal Life: painel ${panel}, estrutura ${frame}. ${angle.textContent.split('/').at(-1).trim()}.`);
    canvas.setAttribute('aria-hidden',String(!render.classList.contains('is-rendered')));
    source.setAttribute('aria-hidden',String(render.classList.contains('is-rendered')));
  };
  const resetZoom=()=>{
    render.classList.remove('is-zoomed');
    zoom.setAttribute('aria-pressed','false');
    zoom.setAttribute('aria-label','Ampliar visualização');
    zoom.innerHTML='<span aria-hidden="true">+</span> Ampliar';
  };
  views.forEach(button=>button.addEventListener('click',()=>{
    if(button.getAttribute('aria-pressed')==='true')return;
    views.forEach(view=>view.setAttribute('aria-pressed',String(view===button)));
    render.classList.remove('is-rendered');
    source.setAttribute('aria-hidden','false');
    canvas.setAttribute('aria-hidden','true');
    resetZoom();
    angle.textContent=button.dataset.viewName;
    source.alt=button.dataset.viewAlt;
    status.textContent='Carregando a vista selecionada…';
    source.src=button.dataset.cabinetView;
  }));
  source.addEventListener('load',()=>{
    status.textContent='Vista atualizada. As cores escolhidas foram mantidas.';
    updateConfiguration();
  });
  source.addEventListener('error',()=>{
    canvas.setAttribute('aria-hidden','true');
    source.setAttribute('aria-hidden','false');
    status.textContent='Não foi possível carregar esta vista. Selecione outro ângulo para tentar novamente.';
  });
  zoom.addEventListener('click',()=>{
    const expanded=render.classList.toggle('is-zoomed');
    zoom.setAttribute('aria-pressed',String(expanded));
    zoom.setAttribute('aria-label',expanded?'Reduzir visualização':'Ampliar visualização');
    zoom.innerHTML=expanded?'<span aria-hidden="true">−</span> Reduzir':'<span aria-hidden="true">+</span> Ampliar';
  });
  gallery.addEventListener('cabine:colors',updateConfiguration);
  viewControls.hidden=false;
  zoom.hidden=false;
  updateConfiguration();
})();
