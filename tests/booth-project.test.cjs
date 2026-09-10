const test=require('node:test'),assert=require('node:assert/strict'),fs=require('node:fs'),vm=require('node:vm'),path=require('node:path');
const scope={window:{}};vm.createContext(scope);vm.runInContext(fs.readFileSync(path.join(__dirname,'../public/assets/js/booth-project.js'),'utf8'),scope);
const model=scope.window.BoothProject;
const project={product:'Panelas',quantity:'500',period:'dia',piece_width:'35',piece_height:'20',piece_depth:'50',process:'Pintura eletrostatica a po',operation:'Manual',size_mode:'custom',booth_width:'2.5',booth_height:'2',booth_depth:'3',space_width:'5',space_height:'4',space_depth:'6',features:['Exaustao e filtragem','Recuperacao de tinta em po'],material:'Alumínio',weight:'1.5',handling:'Gancheiras',changes:'Varias vezes ao dia',hours:'8',operators:'2',coating:'Tinta de referência',finish:'Azul RAL 5010',power:'220 V trifásico',notes:'Peças com alças & tampa + suporte.',name:'João',company:'A&B',city:'São Paulo / SP'};
test('WhatsApp message includes complete painting project and units',()=>{
 const message=model.message(project);
 for(const part of ['Panelas','500 peças por dia','L: 35 cm × A: 20 cm × P: 50 cm','L: 2,5 m × A: 2 m × P: 3 m','Alumínio','Peso da maior peça (kg): 1.5','Gancheiras','Várias vezes ao dia','Horas de produção por dia: 8','Operadores simultâneos: 2','Tinta de referência','Azul RAL 5010','220 V trifásico','Peças com alças & tampa + suporte.','João','A&B','São Paulo / SP','Exaustão e filtragem','Recuperação de tinta em pó','avaliação técnica'])assert.ok(message.includes(part),part);
 assert.ok(!message.includes('gabinete metálico'));
 const url=new URL('https://wa.me/5511969195102');url.searchParams.set('text',message);assert.equal(new URL(url.href).searchParams.get('text'),message);
});
test('quantity period is preserved for batches, shifts and days',()=>{
 for(const period of ['lote','turno','dia'])assert.ok(model.message({...project,period}).includes('500 peças por '+period));
});
test('assisted sizing excludes stale custom dimensions and does not invent size',()=>{
 const message=model.message({...project,size_mode:'assisted'});assert.ok(message.includes('Dimensionar com a Metal Life'));assert.ok(!message.includes('L: 2,5 m'));
 assert.equal(model.fitWarnings({...project,size_mode:'assisted',booth_width:'0.01'}).length,0);
});
test('piece dimensions are converted from cm to m only for fit checks',()=>{
 assert.equal(model.fitWarnings(project).length,0);
 assert.ok(model.fitWarnings({...project,piece_width:'250'}).some(s=>s.includes('peça')));
 assert.ok(model.fitWarnings({...project,space_width:'2.5'}).some(s=>s.includes('espaço')));
});
test('unknown and partial measurements are explicit',()=>{
 const message=model.message({size_mode:'custom',piece_width:'30',booth_height:'2'});
 assert.ok(message.includes('L: 30 cm × A: a definir × P: a definir'));
 assert.ok(message.includes('L: a definir × A: 2 m × P: a definir'));
 assert.ok(!message.includes('undefined'));
});
test('liquid painting does not request powder recovery',()=>{
 const message=model.message({...project,process:'Pintura liquida'});assert.ok(!message.includes('Recuperação de tinta em pó'));assert.ok(message.includes('Exaustão e filtragem'));
});
test('the original visualizer colors accompany the complete project',()=>{
 const message=model.message({...project,visual_panel:'Azul',visual_frame:'#AABBCC'});
 assert.ok(message.includes('Painel: Azul / Estrutura: #AABBCC'));
 assert.ok(message.includes('500 peças por dia'));
 assert.ok(message.includes('L: 2,5 m × A: 2 m × P: 3 m'));
});
