import{r as E}from"./vue.runtime.esm-bundler-86ff56d6.js";import{f as D,g as p,z as b,h as P,E as O,G as N,H as $,I as C,n as z,b as d,c as B,D as _,x as K,V as q,r as S,o as y}from"./app-a830934e.js";import{_ as A}from"./_plugin-vue_export-helper-c27b6911.js";import{u as x,o as v,c as G,H as k,t as M,p as Q,N as I,l as h,a as f}from"./open-closed-45b09712.js";import{b as R}from"./use-resolve-button-type-e5b08ff5.js";var U=(t=>(t[t.Open=0]="Open",t[t.Closed=1]="Closed",t))(U||{});let H=Symbol("DisclosureContext");function w(t){let n=C(H,null);if(n===null){let o=new Error(`<${t} /> is missing a parent <Disclosure /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(o,w),o}return n}let T=Symbol("DisclosurePanelContext");function X(){return C(T,null)}let F=D({name:"Disclosure",props:{as:{type:[Object,String],default:"template"},defaultOpen:{type:[Boolean],default:!1}},setup(t,{slots:n,attrs:o}){let r=p(t.defaultOpen?0:1),e=p(null),c=p(null),s={buttonId:p(null),panelId:p(null),disclosureState:r,panel:e,button:c,toggleDisclosure(){r.value=x(r.value,{[0]:1,[1]:0})},closeDisclosure(){r.value!==1&&(r.value=1)},close(l){s.closeDisclosure();let u=(()=>l?l instanceof HTMLElement?l:l.value instanceof HTMLElement?v(l):v(s.button):v(s.button))();u==null||u.focus()}};return $(H,s),G(b(()=>x(r.value,{[0]:h.Open,[1]:h.Closed}))),()=>{let{defaultOpen:l,...u}=t,i={open:r.value===0,close:s.close};return k({theirProps:u,ourProps:{},slot:i,slots:n,attrs:o,name:"Disclosure"})}}}),J=D({name:"DisclosureButton",props:{as:{type:[Object,String],default:"button"},disabled:{type:[Boolean],default:!1},id:{type:String,default:()=>`headlessui-disclosure-button-${M()}`}},setup(t,{attrs:n,slots:o,expose:r}){let e=w("DisclosureButton");P(()=>{e.buttonId.value=t.id}),O(()=>{e.buttonId.value=null});let c=X(),s=b(()=>c===null?!1:c.value===e.panelId.value),l=p(null);r({el:l,$el:l}),s.value||N(()=>{e.button.value=l.value});let u=R(b(()=>({as:t.as,type:n.type})),l);function i(){var a;t.disabled||(s.value?(e.toggleDisclosure(),(a=v(e.button))==null||a.focus()):e.toggleDisclosure())}function m(a){var g;if(!t.disabled)if(s.value)switch(a.key){case f.Space:case f.Enter:a.preventDefault(),a.stopPropagation(),e.toggleDisclosure(),(g=v(e.button))==null||g.focus();break}else switch(a.key){case f.Space:case f.Enter:a.preventDefault(),a.stopPropagation(),e.toggleDisclosure();break}}function V(a){switch(a.key){case f.Space:a.preventDefault();break}}return()=>{let a={open:e.disclosureState.value===0},{id:g,...j}=t,L=s.value?{ref:l,type:u.value,onClick:i,onKeydown:m}:{id:g,ref:l,type:u.value,"aria-expanded":t.disabled?void 0:e.disclosureState.value===0,"aria-controls":v(e.panel)?e.panelId.value:void 0,disabled:t.disabled?!0:void 0,onClick:i,onKeydown:m,onKeyup:V};return k({ourProps:L,theirProps:j,slot:a,attrs:n,slots:o,name:"DisclosureButton"})}}}),W=D({name:"DisclosurePanel",props:{as:{type:[Object,String],default:"div"},static:{type:Boolean,default:!1},unmount:{type:Boolean,default:!0},id:{type:String,default:()=>`headlessui-disclosure-panel-${M()}`}},setup(t,{attrs:n,slots:o,expose:r}){let e=w("DisclosurePanel");P(()=>{e.panelId.value=t.id}),O(()=>{e.panelId.value=null}),r({el:e.panel,$el:e.panel}),$(T,e.panelId);let c=Q(),s=b(()=>c!==null?(c.value&h.Open)===h.Open:e.disclosureState.value===0);return()=>{let l={open:e.disclosureState.value===0,close:e.close},{id:u,...i}=t,m={id:u,ref:e.panel};return k({ourProps:m,theirProps:i,slot:l,attrs:n,slots:o,features:I.RenderStrategy|I.Static,visible:s.value,name:"DisclosurePanel"})}}});const{createElementVNode:Y,openBlock:Z,createElementBlock:ee}=E;var te=function(n,o){return Z(),ee("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[Y("path",{"fill-rule":"evenodd",d:"M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z","clip-rule":"evenodd"})])};const{createElementVNode:le,openBlock:oe,createElementBlock:ne}=E;var se=function(n,o){return oe(),ne("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[le("path",{d:"M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"})])},ae=te,re=se;const ue={props:{state:Object},emits:["toggleOpen"],components:{Disclosure:F,DisclosureButton:J,DisclosurePanel:W,PlusIcon:re,MinusIcon:ae},data(){return{icon_style:"w-8 h-8 self-center"}}},ce={class:"flex flex-row gap-3"},ie=["innerHTML"],de={class:"m-5"},pe=["innerHTML"];function ve(t,n,o,r,e,c){const s=S("PlusIcon"),l=S("MinusIcon");return y(),z("div",null,[d("button",{onClick:n[0]||(n[0]=u=>t.$emit("toggleOpen",o.state.id)),class:_(["w-full font-anton text-lg p-3 text-primary-dark text-left",t.open?"":"bg-primary-light hover:bg-[#dddddd]"])},[d("span",ce,[o.state.open?(y(),B(s,{key:0,class:_(e.icon_style)},null,8,["class"])):(y(),B(l,{key:1,class:_(e.icon_style)},null,8,["class"])),d("div",{innerHTML:o.state.title},null,8,ie)])],2),K(d("div",null,[d("div",de,[d("div",{class:"flex flex-col gap-3",innerHTML:o.state.content},null,8,pe)])],512),[[q,o.state.open]])])}const _e=A(ue,[["render",ve]]);export{_e as default};