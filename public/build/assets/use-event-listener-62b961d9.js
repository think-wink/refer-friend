import{o as b,u as S,H as x}from"./open-closed-45b09712.js";import{G as E,g as N,z as L,f as g}from"./app-a830934e.js";var P=Object.defineProperty,I=(e,t,n)=>t in e?P(e,t,{enumerable:!0,configurable:!0,writable:!0,value:n}):e[t]=n,y=(e,t,n)=>(I(e,typeof t!="symbol"?t+"":t,n),n);class O{constructor(){y(this,"current",this.detect()),y(this,"currentId",0)}set(t){this.current!==t&&(this.currentId=0,this.current=t)}reset(){this.set(this.detect())}nextId(){return++this.currentId}get isServer(){return this.current==="server"}get isClient(){return this.current==="client"}detect(){return typeof window>"u"||typeof document>"u"?"server":"client"}}let v=new O;function A(e){if(v.isServer)return null;if(e instanceof Node)return e.ownerDocument;if(e!=null&&e.hasOwnProperty("value")){let t=b(e);if(t)return t.ownerDocument}return document}let p=["[contentEditable=true]","[tabindex]","a[href]","area[href]","button:not([disabled])","iframe","input:not([disabled])","select:not([disabled])","textarea:not([disabled])"].map(e=>`${e}:not([tabindex='-1'])`).join(",");var M=(e=>(e[e.First=1]="First",e[e.Previous=2]="Previous",e[e.Next=4]="Next",e[e.Last=8]="Last",e[e.WrapAround=16]="WrapAround",e[e.NoScroll=32]="NoScroll",e))(M||{}),T=(e=>(e[e.Error=0]="Error",e[e.Overflow=1]="Overflow",e[e.Success=2]="Success",e[e.Underflow=3]="Underflow",e))(T||{}),$=(e=>(e[e.Previous=-1]="Previous",e[e.Next=1]="Next",e))($||{});function D(e=document.body){return e==null?[]:Array.from(e.querySelectorAll(p)).sort((t,n)=>Math.sign((t.tabIndex||Number.MAX_SAFE_INTEGER)-(n.tabIndex||Number.MAX_SAFE_INTEGER)))}var F=(e=>(e[e.Strict=0]="Strict",e[e.Loose=1]="Loose",e))(F||{});function H(e,t=0){var n;return e===((n=A(e))==null?void 0:n.body)?!1:S(t,{[0](){return e.matches(p)},[1](){let r=e;for(;r!==null;){if(r.matches(p))return!0;r=r.parentElement}return!1}})}var k=(e=>(e[e.Keyboard=0]="Keyboard",e[e.Mouse=1]="Mouse",e))(k||{});typeof window<"u"&&typeof document<"u"&&(document.addEventListener("keydown",e=>{e.metaKey||e.altKey||e.ctrlKey||(document.documentElement.dataset.headlessuiFocusVisible="")},!0),document.addEventListener("click",e=>{e.detail===1?delete document.documentElement.dataset.headlessuiFocusVisible:e.detail===0&&(document.documentElement.dataset.headlessuiFocusVisible="")},!0));function V(e){e==null||e.focus({preventScroll:!0})}let _=["textarea","input"].join(",");function K(e){var t,n;return(n=(t=e==null?void 0:e.matches)==null?void 0:t.call(e,_))!=null?n:!1}function C(e,t=n=>n){return e.slice().sort((n,r)=>{let u=t(n),o=t(r);if(u===null||o===null)return 0;let s=u.compareDocumentPosition(o);return s&Node.DOCUMENT_POSITION_FOLLOWING?-1:s&Node.DOCUMENT_POSITION_PRECEDING?1:0})}function B(e,t,{sorted:n=!0,relativeTo:r=null,skipElements:u=[]}={}){var o;let s=(o=Array.isArray(e)?e.length>0?e[0].ownerDocument:document:e==null?void 0:e.ownerDocument)!=null?o:document,i=Array.isArray(e)?n?C(e):e:D(e);u.length>0&&i.length>1&&(i=i.filter(d=>!u.includes(d))),r=r??s.activeElement;let w=(()=>{if(t&5)return 1;if(t&10)return-1;throw new Error("Missing Focus.First, Focus.Previous, Focus.Next or Focus.Last")})(),a=(()=>{if(t&1)return 0;if(t&2)return Math.max(0,i.indexOf(r))-1;if(t&4)return Math.max(0,i.indexOf(r))+1;if(t&8)return i.length-1;throw new Error("Missing Focus.First, Focus.Previous, Focus.Next or Focus.Last")})(),l=t&32?{preventScroll:!0}:{},m=0,f=i.length,c;do{if(m>=f||m+f<=0)return 0;let d=a+m;if(t&16)d=(d+f)%f;else{if(d<0)return 3;if(d>=f)return 1}c=i[d],c==null||c.focus(l),m+=w}while(c!==s.activeElement);return t&6&&K(c)&&c.select(),2}function h(e,t,n){v.isServer||E(r=>{document.addEventListener(e,t,n),r(()=>document.removeEventListener(e,t,n))})}function X(e,t,n=L(()=>!0)){function r(o,s){if(!n.value||o.defaultPrevented)return;let i=s(o);if(i===null||!i.getRootNode().contains(i))return;let w=function a(l){return typeof l=="function"?a(l()):Array.isArray(l)||l instanceof Set?l:[l]}(e);for(let a of w){if(a===null)continue;let l=a instanceof HTMLElement?a:b(a);if(l!=null&&l.contains(i)||o.composed&&o.composedPath().includes(l))return}return!H(i,F.Loose)&&i.tabIndex!==-1&&o.preventDefault(),t(o,i)}let u=N(null);h("mousedown",o=>{var s,i;n.value&&(u.value=((i=(s=o.composedPath)==null?void 0:s.call(o))==null?void 0:i[0])||o.target)},!0),h("click",o=>{u.value&&(r(o,()=>u.value),u.value=null)},!0),h("blur",o=>r(o,()=>window.document.activeElement instanceof HTMLIFrameElement?window.document.activeElement:null),!0)}var G=(e=>(e[e.None=1]="None",e[e.Focusable=2]="Focusable",e[e.Hidden=4]="Hidden",e))(G||{});let q=g({name:"Hidden",props:{as:{type:[Object,String],default:"div"},features:{type:Number,default:1}},setup(e,{slots:t,attrs:n}){return()=>{let{features:r,...u}=e,o={"aria-hidden":(r&2)===2?!0:void 0,style:{position:"fixed",top:1,left:1,width:1,height:0,padding:0,margin:-1,overflow:"hidden",clip:"rect(0, 0, 0, 0)",whiteSpace:"nowrap",borderWidth:"0",...(r&4)===4&&(r&2)!==2&&{display:"none"}}};return x({ourProps:o,theirProps:u,slot:{},attrs:n,slots:t,name:"Hidden"})}}});function j(e,t,n){v.isServer||E(r=>{window.addEventListener(e,t,n),r(()=>window.removeEventListener(e,t,n))})}var R=(e=>(e[e.Forwards=0]="Forwards",e[e.Backwards=1]="Backwards",e))(R||{});function z(){let e=N(0);return j("keydown",t=>{t.key==="Tab"&&(e.value=t.shiftKey?1:0)}),e}function J(e,t,n,r){v.isServer||E(u=>{e=e??window,e.addEventListener(t,n,r),u(()=>e.removeEventListener(t,n,r))})}export{J as E,M as N,B as P,V as S,T,G as a,D as b,R as d,q as f,F as h,A as m,z as n,H as w,X as y};
