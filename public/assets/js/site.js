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

    const panelTones={
      orange:[.055,.98],
      red:[0,.85],
      yellow:[.14,.92],
      green:[.34,.82],
      blue:[.61,.8],
      cyan:[.52,.78],
      purple:[.76,.72],
      white:[0,0],
      black:[0,0]
    };
    let panelIndex=0;
    let frameIndex=0;
    let customPanelColor=null;
    let customFrameColor=null;
    let cycleTimer=null;
    let hasUserSelection=false;
    let sourcePixels=null;
    const reduceMotion=window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const hslToRgb=(h,s,l)=>{
      if(s===0)return[l,l,l];
      const hue=(p,q,t)=>{
        if(t<0)t+=1;
        if(t>1)t-=1;
        if(t<1/6)return p+(q-p)*6*t;
        if(t<1/2)return q;
        if(t<2/3)return p+(q-p)*(2/3-t)*6;
        return p;
      };
      const q=l<.5?l*(1+s):l+s-l*s;
      const p=2*l-q;
      return[hue(p,q,h+1/3),hue(p,q,h),hue(p,q,h-1/3)];
    };
    const hexToHsl=hex=>{
      const value=Number.parseInt(hex.slice(1),16);
      const red=((value>>16)&255)/255;
      const green=((value>>8)&255)/255;
      const blue=(value&255)/255;
      const max=Math.max(red,green,blue);
      const min=Math.min(red,green,blue);
      const delta=max-min;
      const lightness=(max+min)/2;
      if(delta===0)return[0,0,lightness];
      const saturation=delta/(1-Math.abs(2*lightness-1));
      let hue=max===red?(green-blue)/delta:max===green?2+(blue-red)/delta:4+(red-green)/delta;
      hue=((hue/6)%1+1)%1;
      return[hue,saturation,lightness];
    };
    const customToneRgb=(tone,sourceLightness)=>{
      const [hue,saturation,targetLightness]=tone;
      if(saturation<.08){
        const value=targetLightness>.82?.62+sourceLightness*.36:targetLightness<.18?.02+sourceLightness*.22:targetLightness*.45+sourceLightness*.45;
        return[value,value,value*.99];
      }
      const lightness=Math.min(.92,Math.max(.035,targetLightness*.22+sourceLightness*.78));
      return hslToRgb(hue,Math.max(.28,saturation),lightness);
    };
    const renderColors=()=>{
      if(!sourcePixels)return;
      const pixels=new Uint8ClampedArray(sourcePixels.data);
      const panelKey=customPanelColor?'custom':panelButtons[panelIndex].dataset.cabinePanel;
      const frameKey=customFrameColor?'custom':frameButtons[frameIndex].dataset.cabineFrame;
      const panelTone=panelKey==='custom'?hexToHsl(customPanelColor):panelTones[panelKey];
      const [panelHue,panelSaturation]=panelTone;
      const frameTone=frameKey==='custom'?hexToHsl(customFrameColor):null;

      for(let index=0;index<pixels.length;index+=4){
        if(pixels[index+3]===0)continue;
        const red=pixels[index]/255;
        const green=pixels[index+1]/255;
        const blue=pixels[index+2]/255;
        const max=Math.max(red,green,blue);
        const min=Math.min(red,green,blue);
        const lightness=(max+min)/2;
        const delta=max-min;
        const saturation=delta===0?0:delta/(1-Math.abs(2*lightness-1));
        const isPanel=saturation>.28&&red>green*1.12&&red>blue*1.35;
        const isNeutralMetal=saturation<.16||delta<.14;
        const isStructure=!isPanel&&isNeutralMetal&&max>.1;

        if(isPanel){
          if(panelKey==='custom'){
            const [nextRed,nextGreen,nextBlue]=customToneRgb(panelTone,lightness);
            pixels[index]=nextRed*255;
            pixels[index+1]=nextGreen*255;
            pixels[index+2]=nextBlue*255;
          }else if(panelKey==='white'){
            const value=Math.min(1,.68+lightness*.3)*255;
            pixels[index]=value;
            pixels[index+1]=value;
            pixels[index+2]=value*.985;
          }else if(panelKey==='black'){
            const value=(.035+lightness*.28)*255;
            pixels[index]=value*.94;
            pixels[index+1]=value*.98;
            pixels[index+2]=value;
          }else{
            const [nextRed,nextGreen,nextBlue]=hslToRgb(panelHue,panelSaturation,lightness);
            pixels[index]=nextRed*255;
            pixels[index+1]=nextGreen*255;
            pixels[index+2]=nextBlue*255;
          }
        }else if(isStructure){
          if(frameKey==='custom'){
            const [nextRed,nextGreen,nextBlue]=customToneRgb(frameTone,lightness);
            pixels[index]=nextRed*255;
            pixels[index+1]=nextGreen*255;
            pixels[index+2]=nextBlue*255;
          }else if(frameKey==='gray'){
            const value=(.16+lightness*.52)*255;
            pixels[index]=value*.94;
            pixels[index+1]=value*.98;
            pixels[index+2]=value;
          }else if(frameKey==='white'){
            const value=Math.min(1,lightness*1.08+.06)*255;
            pixels[index]=value;
            pixels[index+1]=value;
            pixels[index+2]=value*.985;
          }else if(frameKey==='graphite'){
            const value=(.07+lightness*.34)*255;
            pixels[index]=value*.92;
            pixels[index+1]=value*.98;
            pixels[index+2]=value;
          }else if(frameKey==='navy'){
            const [nextRed,nextGreen,nextBlue]=hslToRgb(.59,.58,.09+lightness*.4);
            pixels[index]=nextRed*255;
            pixels[index+1]=nextGreen*255;
            pixels[index+2]=nextBlue*255;
          }else if(frameKey==='black'){
            const value=(.025+lightness*.22)*255;
            pixels[index]=value*.94;
            pixels[index+1]=value*.98;
            pixels[index+2]=value;
          }else if(frameKey==='red'){
            const [nextRed,nextGreen,nextBlue]=hslToRgb(0,.58,.08+lightness*.44);
            pixels[index]=nextRed*255;
            pixels[index+1]=nextGreen*255;
            pixels[index+2]=nextBlue*255;
          }else if(frameKey==='beige'){
            const [nextRed,nextGreen,nextBlue]=hslToRgb(.11,.28,.22+lightness*.52);
            pixels[index]=nextRed*255;
            pixels[index+1]=nextGreen*255;
            pixels[index+2]=nextBlue*255;
          }
        }
      }

      canvas.getContext('2d').putImageData(new ImageData(pixels,sourcePixels.width,sourcePixels.height),0,0);
      render.classList.add('is-rendered');
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
      if(reduceMotion||hasUserSelection)return;
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
      const width=Math.min(768,source.naturalWidth);
      const height=Math.round(width*(source.naturalHeight/source.naturalWidth));
      canvas.width=width;
      canvas.height=height;
      const context=canvas.getContext('2d',{willReadFrequently:true});
      context.drawImage(source,0,0,width,height);
      sourcePixels=context.getImageData(0,0,width,height);
      renderColors();
    };
    if(source.complete)prepareCanvas();
    else source.addEventListener('load',prepareCanvas,{once:true});
    startCycle();
  });
})();
