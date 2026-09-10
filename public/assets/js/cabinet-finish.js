/* Finish simulation restricted to the photographed surfaces of each view. */
(()=>{
  const views={
    'cabine2.webp':{
      size:[1024,1536],
      body:[[20,187],[249,96],[939,177],[837,1264],[383,1534],[157,1225]],
      panel:[[394,309],[761,290],[697,1367],[385,1000]]
    },
    'cabine.webp':{
      size:[1024,1536],
      body:[[325,42],[386,0],[1024,0],[1024,1536],[481,1536],[353,1326]],
      panel:[[937,192],[1024,207],[1024,1180],[800,1255],[689,1182]]
    },
    'cabine3.png':{
      size:[960,1280],
      body:[[46,131],[693,104],[960,31],[960,1280],[151,1280],[129,1218]],
      panel:[[238,254],[678,254],[632,1045],[257,980]]
    }
  };
  const colors={orange:'#e85b1b',red:'#d52b25',yellow:'#f1c928',green:'#24a84a',blue:'#1769c2',cyan:'#16b8c8',purple:'#7651c9',white:'#f5f5f2',black:'#111416',gray:'#aeb3b7',graphite:'#30363a',navy:'#174c78',beige:'#c8b38d'};
  const smooth=(a,b,value)=>{const t=Math.min(1,Math.max(0,(value-a)/(b-a)));return t*t*(3-2*t);};
  const rasterize=(points,size,width,height)=>{
    const mask=new Uint8Array(width*height);
    const polygon=points.map(([x,y])=>[x/size[0]*width,y/size[1]*height]);
    for(let y=0;y<height;y++){
      const cuts=[];
      for(let i=0,j=polygon.length-1;i<polygon.length;j=i++){
        const [ax,ay]=polygon[i],[bx,by]=polygon[j];
        if((ay>y+.5)!==(by>y+.5))cuts.push(ax+(y+.5-ay)*(bx-ax)/(by-ay));
      }
      cuts.sort((a,b)=>a-b);
      for(let n=0;n+1<cuts.length;n+=2){
        const start=Math.max(0,Math.ceil(cuts[n]-.5)),end=Math.min(width,Math.ceil(cuts[n+1]-.5));
        mask.fill(1,y*width+start,y*width+end);
      }
    }
    return mask;
  };
  const rgb=key=>{
    const hex=colors[key]||key;
    if(!/^#[0-9a-f]{6}$/i.test(hex))return null;
    return [1,3,5].map(i=>parseInt(hex.slice(i,i+2),16)/255);
  };
  const prepare=(source,path)=>{
    const view=views[path.split('/').pop().split('?')[0]];
    if(!view)return null;
    const body=rasterize(view.body,view.size,source.width,source.height);
    const panel=rasterize(view.panel,view.size,source.width,source.height);
    const weights=new Float32Array(body.length);
    for(let p=0;p<body.length;p++){
      if(!body[p]||!panel[p])continue;
      const i=p*4,r=source.data[i]/255,g=source.data[i+1]/255,b=source.data[i+2]/255;
      // Geometry excludes orange reflections on the side, door and floor.
      // A gradual chroma weight preserves the metal rails crossing the panel.
      weights[p]=smooth(.08,.23,r-b)*smooth(.03,.13,r-g);
    }
    return {body,weights};
  };
  const render=(source,masks,panelKey,frameKey)=>{
    const pixels=new Uint8ClampedArray(source.data);
    if(!masks||(panelKey==='orange'&&frameKey==='gray'))return pixels;
    const panel=rgb(panelKey),frame=rgb(frameKey);
    for(let p=0;p<masks.body.length;p++){
      const i=p*4;
      if(!masks.body[p]||!pixels[i+3])continue;
      const r=source.data[i]/255,g=source.data[i+1]/255,b=source.data[i+2]/255;
      const luminance=.2126*r+.7152*g+.0722*b;
      const metalLight=(Math.max(r,g,b)+Math.min(r,g,b))/2;
      const panelWeight=panelKey==='orange'?0:masks.weights[p];
      const frameWeight=frameKey==='gray'?0:(1-masks.weights[p])*smooth(.025,.13,luminance);
      for(let c=0;c<3;c++){
        const original=source.data[i+c]/255;
        const tint=(color,light)=>{
          const diffuse=color[c]*(.18+light*1.05);
          const highlight=smooth(.7,1,light);
          return Math.min(1,diffuse+(1-diffuse)*highlight);
        };
        const panelValue=panel?tint(panel,Math.max(r,g,b)*.66):original;
        const frameValue=frame?tint(frame,metalLight):original;
        pixels[i+c]=(original*(1-panelWeight-frameWeight)+panelValue*panelWeight+frameValue*frameWeight)*255;
      }
    }
    return pixels;
  };
  window.CabinetFinish={prepare,render};
})();
