(()=>{
  document.documentElement.classList.add('motion-ready');

  const mobileMenu=document.querySelector('[data-mobile-menu]');
  const menuOpen=document.querySelector('[data-menu-open]');
  const menuClose=document.querySelector('[data-menu-close]');
  const navButtons=[...document.querySelectorAll('.nav-group>button')];
  let lastFocus=null;

  const mobileFocusable=()=>mobileMenu?[...mobileMenu.querySelectorAll('a,button,summary')].filter(item=>item.getClientRects().length>0):[];
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
    const dropdown=button.nextElementSibling;
    dropdown.id=`nav-dropdown-${navButtons.indexOf(button)}`;
    button.setAttribute('aria-controls',dropdown.id);
    button.parentElement.addEventListener('focusout',event=>{
      if(!button.parentElement.contains(event.relatedTarget))closeNavGroups();
    });
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
      const expandedButton=navButtons.find(button=>button.getAttribute('aria-expanded')==='true');
      expandedButton?.focus();
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

  window.matchMedia('(min-width:1281px)').addEventListener('change',event=>{
    closeNavGroups();
    if(event.matches&&mobileMenu&&!mobileMenu.hidden)closeMobileMenu();
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

  document.querySelectorAll('[data-cabine-colors]').forEach(picker=>{
    const gallery=picker.closest('[data-cabine-gallery]');
    const render=gallery?.querySelector('[data-cabine-render]');
    const source=render?.querySelector('[data-cabine-source]');
    const canvas=render?.querySelector('[data-cabine-canvas]');
    const panelButtons=[...picker.querySelectorAll('[data-cabine-panel]')];
    const frameButtons=[...picker.querySelectorAll('[data-cabine-frame]')];
    const randomButton=picker.querySelector('[data-cabine-random]');
    const resetButton=picker.querySelector('[data-cabine-reset]');
    const panelCustom=picker.querySelector('[data-cabine-panel-custom]');
    const frameCustom=picker.querySelector('[data-cabine-frame-custom]');
    const panelName=picker.querySelector('[data-cabine-panel-name]');
    const frameName=picker.querySelector('[data-cabine-frame-name]');
    if(!gallery||!render||!source||!canvas||!panelButtons.length||!frameButtons.length)return;

    let panelIndex=0;
    let frameIndex=0;
    let customPanelColor=null;
    let customFrameColor=null;
    let cycleTimer=null;
    let hasUserSelection=false;
    let sourcePixels=null;
    let finishMasks=null;
    const reduceMotion=window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const renderColors=()=>{
      if(!sourcePixels){
        gallery.dispatchEvent(new CustomEvent('cabine:colors'));
        return;
      }
      const panelKey=customPanelColor||panelButtons[panelIndex].dataset.cabinePanel;
      const frameKey=customFrameColor||frameButtons[frameIndex].dataset.cabineFrame;
      const pixels=window.CabinetFinish.render(sourcePixels,finishMasks,panelKey,frameKey);

      canvas.getContext('2d').putImageData(new ImageData(pixels,sourcePixels.width,sourcePixels.height),0,0);
      render.classList.add('is-rendered');
      gallery.dispatchEvent(new CustomEvent('cabine:colors'));
    };
    const updateButtons=(buttons,activeIndex)=>{
      buttons.forEach((button,buttonIndex)=>{
        const isActive=buttonIndex===activeIndex;
        button.classList.toggle('is-active',isActive);
        button.setAttribute('aria-pressed',String(isActive));
      });
    };
    const selectPanel=index=>{
      customPanelColor=null;
      panelCustom?.classList.remove('is-active');
      panelIndex=(index+panelButtons.length)%panelButtons.length;
      const activeButton=panelButtons[panelIndex];
      gallery.dataset.activeColor=activeButton.dataset.cabinePanel;
      if(panelName)panelName.textContent=activeButton.dataset.colorName;
      updateButtons(panelButtons,panelIndex);
      renderColors();
    };
    const selectFrame=index=>{
      customFrameColor=null;
      frameCustom?.classList.remove('is-active');
      frameIndex=index;
      const activeButton=frameButtons[frameIndex];
      if(frameName)frameName.textContent=activeButton.dataset.colorName;
      updateButtons(frameButtons,frameIndex);
      renderColors();
    };
    const startCycle=()=>{
      if(reduceMotion||hasUserSelection||gallery.dataset.cabineAutocycle==='false')return;
      window.clearInterval(cycleTimer);
      cycleTimer=window.setInterval(()=>selectPanel(panelIndex+1),3200);
    };

    panelButtons.forEach((button,index)=>{
      button.addEventListener('click',()=>{
        hasUserSelection=true;
        window.clearInterval(cycleTimer);
        selectPanel(index);
      });
    });
    frameButtons.forEach((button,index)=>{
      button.addEventListener('click',()=>{
        hasUserSelection=true;
        window.clearInterval(cycleTimer);
        selectFrame(index);
      });
    });
    panelCustom?.addEventListener('change',()=>{
      hasUserSelection=true;
      window.clearInterval(cycleTimer);
      customPanelColor=panelCustom.value;
      panelCustom.classList.add('is-active');
      gallery.dataset.activeColor='custom';
      if(panelName)panelName.textContent=customPanelColor.toUpperCase();
      updateButtons(panelButtons,-1);
      renderColors();
    });
    frameCustom?.addEventListener('change',()=>{
      hasUserSelection=true;
      window.clearInterval(cycleTimer);
      customFrameColor=frameCustom.value;
      frameCustom.classList.add('is-active');
      if(frameName)frameName.textContent=customFrameColor.toUpperCase();
      updateButtons(frameButtons,-1);
      renderColors();
    });
    randomButton?.addEventListener('click',()=>{
      hasUserSelection=true;
      window.clearInterval(cycleTimer);
      selectPanel(Math.floor(Math.random()*panelButtons.length));
      selectFrame(Math.floor(Math.random()*frameButtons.length));
    });
    resetButton?.addEventListener('click',()=>{
      hasUserSelection=true;
      window.clearInterval(cycleTimer);
      selectPanel(0);
      selectFrame(0);
    });
    picker.addEventListener('mouseenter',()=>window.clearInterval(cycleTimer));
    picker.addEventListener('mouseleave',startCycle);
    picker.addEventListener('focusin',()=>window.clearInterval(cycleTimer));
    picker.addEventListener('focusout',event=>{
      if(!picker.contains(event.relatedTarget))startCycle();
    });
    const prepareCanvas=()=>{
      if(!source.naturalWidth||!source.naturalHeight)return;
      const width=Math.min(768,source.naturalWidth);
      const height=Math.round(width*(source.naturalHeight/source.naturalWidth));
      canvas.width=width;
      canvas.height=height;
      const context=canvas.getContext('2d',{willReadFrequently:true});
      context.drawImage(source,0,0,width,height);
      sourcePixels=context.getImageData(0,0,width,height);
      finishMasks=window.CabinetFinish.prepare(sourcePixels,source.getAttribute('src')||'');
      renderColors();
    };
    source.addEventListener('load',prepareCanvas);
    source.addEventListener('error',()=>{
      sourcePixels=null;
      render.classList.remove('is-rendered');
    });
    if(source.complete)prepareCanvas();
    startCycle();
  });
})();
