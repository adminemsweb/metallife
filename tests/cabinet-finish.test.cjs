const test=require('node:test');
const assert=require('node:assert/strict');
const fs=require('node:fs');
const vm=require('node:vm');
const path=require('node:path');
const context={window:{},Uint8Array,Uint8ClampedArray,Float32Array};
vm.createContext(context);
vm.runInContext(fs.readFileSync(path.join(__dirname,'../public/assets/js/cabinet-finish.js'),'utf8'),context);
const finish=context.window.CabinetFinish;
const source={width:96,height:128,data:Uint8ClampedArray.from({length:96*128*4},(_,i)=>[220,92,28,255][i%4])};
const pixel=(pixels,x,y)=>Array.from(pixels.slice((y*96+x)*4,(y*96+x)*4+4));

for(const view of ['cabine2.webp','cabine.webp','cabine3.png']){
  test(`${view}: restoring leaves every original pixel unchanged`,()=>{
    const masks=finish.prepare(source,view);
    assert.deepEqual(finish.render(source,masks,'orange','gray'),source.data);
  });
  test(`${view}: changing finishes preserves background and alpha`,()=>{
    const masks=finish.prepare(source,view);
    const output=finish.render(source,masks,'blue','beige');
    let changed=0;
    for(let p=0;p<96*128;p++){
      assert.equal(output[p*4+3],source.data[p*4+3]);
      if(!masks.body[p])assert.deepEqual(Array.from(output.slice(p*4,p*4+4)),Array.from(source.data.slice(p*4,p*4+4)));
      if(output[p*4]!==source.data[p*4])changed++;
    }
    assert.ok(changed>0);
  });
}
test('orange reflections on the interior side are never recolored as panel',()=>{
  const masks=finish.prepare(source,'cabine3.png');
  const output=finish.render(source,masks,'blue','gray');
  assert.deepEqual(pixel(output,15,50),pixel(source.data,15,50));
  assert.notDeepEqual(pixel(output,45,50),pixel(source.data,45,50));
});
test('warm and neutral metal both receive the frame finish',()=>{
  const sample={...source,data:new Uint8ClampedArray(source.data)};
  sample.data.set([140,140,140,255],(50*96+16)*4);
  const output=finish.render(sample,finish.prepare(sample,'cabine3.png'),'orange','beige');
  assert.notDeepEqual(pixel(output,15,50),pixel(sample.data,15,50));
  assert.notDeepEqual(pixel(output,16,50),pixel(sample.data,16,50));
  assert.deepEqual(pixel(output,45,50),pixel(sample.data,45,50));
});
test('unmapped images stay untouched',()=>{
  assert.deepEqual(finish.render(source,finish.prepare(source,'unknown.jpg'),'blue','beige'),source.data);
});
