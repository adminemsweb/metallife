(()=>{
  document.documentElement.classList.add('motion-ready');

  const mobileMenu=document.querySelector('[data-mobile-menu]');
  const menuOpen=document.querySelector('[data-menu-open]');
  const menuClose=document.querySelector('[data-menu-close]');
  const navButtons=[...document.querySelectorAll('.nav-group>button')];
  let lastFocus=null;

  const mobileFocusable=()=>mobileMenu?[...mobileMenu.querySelectorAll('a,button')]:[];
  const closeNavGroups=except=>{
    navButtons.forEach(button=>{
      if(button===except)return;
      button.parentElement.classList.remove('open');
      button.setAttribute('aria-expanded','false');
    });
  };
  const closeMobileMenu=()=>{
    if(!mobileMenu)return;
    mobileMenu.hidden=true;
    document.body.classList.remove('menu-open');
    menuOpen?.setAttribute('aria-expanded','false');
    lastFocus?.focus();
  };
  const openMobileMenu=()=>{
    if(!mobileMenu)return;
    lastFocus=document.activeElement;
    mobileMenu.hidden=false;
    document.body.classList.add('menu-open');
    menuOpen?.setAttribute('aria-expanded','true');
    menuClose?.focus();
  };

  menuOpen?.addEventListener('click',openMobileMenu);
  menuClose?.addEventListener('click',closeMobileMenu);
  mobileMenu?.querySelectorAll('a').forEach(link=>link.addEventListener('click',closeMobileMenu));

  navButtons.forEach(button=>{
    button.addEventListener('click',event=>{
      event.stopPropagation();
      const group=button.parentElement;
      const willOpen=!group.classList.contains('open');
      closeNavGroups(button);
      group.classList.toggle('open',willOpen);
      button.setAttribute('aria-expanded',String(willOpen));
    });
  });
  document.addEventListener('click',event=>{
    if(!event.target.closest('.nav-group'))closeNavGroups();
  });
  document.addEventListener('keydown',event=>{
    if(event.key==='Escape'){
      closeNavGroups();
      if(mobileMenu&&!mobileMenu.hidden)closeMobileMenu();
    }
    if(event.key==='Tab'&&mobileMenu&&!mobileMenu.hidden){
      const items=mobileFocusable();
      const first=items[0];
      const last=items.at(-1);
      if(event.shiftKey&&document.activeElement===first){
        event.preventDefault();
        last.focus();
      }else if(!event.shiftKey&&document.activeElement===last){
        event.preventDefault();
        first.focus();
      }
    }
  });

  const form=document.querySelector('[data-submit-form]');
  form?.addEventListener('submit',()=>{
    const button=form.querySelector('[data-submit-button]');
    button.disabled=true;
    button.textContent='Enviando...';
  });
  document.querySelector('[data-focus-notice]')?.focus();

  const revealItems=[...document.querySelectorAll('[data-reveal]')];
  if('IntersectionObserver' in window){
    const revealObserver=new IntersectionObserver(entries=>{
      entries.forEach(entry=>{
        if(!entry.isIntersecting)return;
        entry.target.classList.add('is-visible');
        revealObserver.unobserve(entry.target);
      });
    },{threshold:.16,rootMargin:'0px 0px -7% 0px'});
    revealItems.forEach(item=>revealObserver.observe(item));
  }else{
    revealItems.forEach(item=>item.classList.add('is-visible'));
  }

  document.querySelectorAll('[data-product-carousel]').forEach(carousel=>{
    const track=carousel.querySelector('[data-carousel-track]');
    const previous=carousel.querySelector('[data-carousel-previous]');
    const next=carousel.querySelector('[data-carousel-next]');
    if(!track||!previous||!next)return;

    const cards=()=>[...track.children];
    const step=()=>{
      const first=cards()[0];
      if(!first)return track.clientWidth;
      const gap=parseFloat(getComputedStyle(track).columnGap)||0;
      return first.getBoundingClientRect().width+gap;
    };
    const updateControls=()=>{
      const tolerance=3;
      previous.disabled=track.scrollLeft<=tolerance;
      next.disabled=track.scrollLeft+track.clientWidth>=track.scrollWidth-tolerance;
    };
    const move=direction=>track.scrollBy({left:direction*step(),behavior:'smooth'});

    previous.addEventListener('click',()=>move(-1));
    next.addEventListener('click',()=>move(1));
    track.addEventListener('scroll',updateControls,{passive:true});
    window.addEventListener('resize',updateControls);
    updateControls();
  });
})();
