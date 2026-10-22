(()=>{
  const form=document.querySelector('[data-landing-quote]');
  if(!form)return;
  form.addEventListener('submit',event=>{
    event.preventDefault();
    if(!form.reportValidity())return;
    const data=new FormData(form);
    const message=[
      'Olá! Gostaria de solicitar uma cotação à Metal Life.',
      '',
      'Nome: '+String(data.get('name')||'').trim(),
      'WhatsApp: '+String(data.get('phone')||'').trim(),
      'E-mail: '+String(data.get('email')||'').trim(),
      'Produtos para cotação: '+String(data.get('products')||'').trim()
    ].join('\n');
    window.location.assign('https://wa.me/5511969195102?text='+encodeURIComponent(message));
  });
})();
