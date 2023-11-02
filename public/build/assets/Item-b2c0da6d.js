import{r as E}from"./vue.runtime.esm-bundler-5fa238d2.js";import{k,l as d,B as g,m as P,G as O,H as V,I as C,J as M,f as K,b as v,c as w,E as y,g as z,W as q,i as S,o as _}from"./app-3f896bec.js";import{_ as A}from"./_plugin-vue_export-helper-c27b6911.js";import{u as x,o as p,c as G,H as D,t as $,p as J,N as I,l as h,a as f}from"./open-closed-f1df1f8f.js";import{b as Q}from"./use-resolve-button-type-4f1ad198.js";var R=(t=>(t[t.Open=0]="Open",t[t.Closed=1]="Closed",t))(R||{});let H=Symbol("DisclosureContext");function B(t){let n=M(H,null);if(n===null){let l=new Error(`<${t} /> is missing a parent <Disclosure /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(l,B),l}return n}let T=Symbol("DisclosurePanelContext");function U(){return M(T,null)}let W=k({name:"Disclosure",props:{as:{type:[Object,String],default:"template"},defaultOpen:{type:[Boolean],default:!1}},setup(t,{slots:n,attrs:l}){let r=d(t.defaultOpen?0:1),e=d(null),c=d(null),s={buttonId:d(null),panelId:d(null),disclosureState:r,panel:e,button:c,toggleDisclosure(){r.value=x(r.value,{[0]:1,[1]:0})},closeDisclosure(){r.value!==1&&(r.value=1)},close(o){s.closeDisclosure();let u=(()=>o?o instanceof HTMLElement?o:o.value instanceof HTMLElement?p(o):p(s.button):p(s.button))();u==null||u.focus()}};return C(H,s),G(g(()=>x(r.value,{[0]:h.Open,[1]:h.Closed}))),()=>{let{defaultOpen:o,...u}=t,i={open:r.value===0,close:s.close};return D({theirProps:u,ourProps:{},slot:i,slots:n,attrs:l,name:"Disclosure"})}}}),X=k({name:"DisclosureButton",props:{as:{type:[Object,String],default:"button"},disabled:{type:[Boolean],default:!1},id:{type:String,default:()=>`headlessui-disclosure-button-${$()}`}},setup(t,{attrs:n,slots:l,expose:r}){let e=B("DisclosureButton");P(()=>{e.buttonId.value=t.id}),O(()=>{e.buttonId.value=null});let c=U(),s=g(()=>c===null?!1:c.value===e.panelId.value),o=d(null);r({el:o,$el:o}),s.value||V(()=>{e.button.value=o.value});let u=Q(g(()=>({as:t.as,type:n.type})),o);function i(){var a;t.disabled||(s.value?(e.toggleDisclosure(),(a=p(e.button))==null||a.focus()):e.toggleDisclosure())}function m(a){var b;if(!t.disabled)if(s.value)switch(a.key){case f.Space:case f.Enter:a.preventDefault(),a.stopPropagation(),e.toggleDisclosure(),(b=p(e.button))==null||b.focus();break}else switch(a.key){case f.Space:case f.Enter:a.preventDefault(),a.stopPropagation(),e.toggleDisclosure();break}}function j(a){switch(a.key){case f.Space:a.preventDefault();break}}return()=>{let a={open:e.disclosureState.value===0},{id:b,...L}=t,N=s.value?{ref:o,type:u.value,onClick:i,onKeydown:m}:{id:b,ref:o,type:u.value,"aria-expanded":t.disabled?void 0:e.disclosureState.value===0,"aria-controls":p(e.panel)?e.panelId.value:void 0,disabled:t.disabled?!0:void 0,onClick:i,onKeydown:m,onKeyup:j};return D({ourProps:N,theirProps:L,slot:a,attrs:n,slots:l,name:"DisclosureButton"})}}}),F=k({name:"DisclosurePanel",props:{as:{type:[Object,String],default:"div"},static:{type:Boolean,default:!1},unmount:{type:Boolean,default:!0},id:{type:String,default:()=>`headlessui-disclosure-panel-${$()}`}},setup(t,{attrs:n,slots:l,expose:r}){let e=B("DisclosurePanel");P(()=>{e.panelId.value=t.id}),O(()=>{e.panelId.value=null}),r({el:e.panel,$el:e.panel}),C(T,e.panelId);let c=J(),s=g(()=>c!==null?(c.value&h.Open)===h.Open:e.disclosureState.value===0);return()=>{let o={open:e.disclosureState.value===0,close:e.close},{id:u,...i}=t,m={id:u,ref:e.panel};return D({ourProps:m,theirProps:i,slot:o,attrs:n,slots:l,features:I.RenderStrategy|I.Static,visible:s.value,name:"DisclosurePanel"})}}});const{createElementVNode:Y,openBlock:Z,createElementBlock:ee}=E;var te=function(n,l){return Z(),ee("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[Y("path",{"fill-rule":"evenodd",d:"M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z","clip-rule":"evenodd"})])};const{createElementVNode:le,openBlock:oe,createElementBlock:ne}=E;var se=function(n,l){return oe(),ne("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[le("path",{d:"M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"})])},ae=te,re=se;const ue={props:{state:Object},emits:["toggleOpen"],components:{Disclosure:W,DisclosureButton:X,DisclosurePanel:F,PlusIcon:re,MinusIcon:ae},data(){return{icon_style:"w-8 h-8 self-center"}}},ce=["innerHTML"],ie={class:"m-5 border-b border-grey pb-2"},de=["innerHTML"];function pe(t,n,l,r,e,c){const s=S("MinusIcon"),o=S("PlusIcon");return _(),K("div",null,[v("button",{class:y("w-full font-anton text-lg p-3 text-primary-dark text-left flex items-center "+(l.state.open?" bg-primary-light hover:bg-[#dddddd]":"")),onClick:n[0]||(n[0]=u=>t.$emit("toggleOpen",l.state.id))},[l.state.open?(_(),w(s,{key:0,class:y(e.icon_style)},null,8,["class"])):(_(),w(o,{key:1,class:y(e.icon_style)},null,8,["class"])),v("span",{innerHTML:l.state.title,class:"font-bold underline ml-2"},null,8,ce)],2),z(v("div",null,[v("div",ie,[v("div",{class:"flex flex-col gap-3",innerHTML:l.state.content},null,8,de)])],512),[[q,l.state.open]])])}const he=A(ue,[["render",pe]]);export{he as default};
