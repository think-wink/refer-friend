import{S as p}from"./SectionTitle-ffdb7fe8.js";import{o as i,f,d as r,w as n,C as o,b as t,p as w,m as x,G as v,B as _,c as g,g as m,V as u,W as y,E as b,M as k,h as $,K as B}from"./app-3f896bec.js";const S={class:"md:grid md:grid-cols-3 md:gap-6"},C={class:"mt-5 md:mt-0 md:col-span-2"},E={class:"px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg"},O={__name:"ActionSection",setup(e){return(s,a)=>(i(),f("div",S,[r(p,null,{title:n(()=>[o(s.$slots,"title")]),description:n(()=>[o(s.$slots,"description")]),_:3}),t("div",C,[t("div",E,[o(s.$slots,"content")])])]))}},W={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},M=t("div",{class:"absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"},null,-1),V=[M],N={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:s}){const a=e;w(()=>a.show,()=>{a.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const l=()=>{a.closeable&&s("close")},c=d=>{d.key==="Escape"&&a.show&&l()};x(()=>document.addEventListener("keydown",c)),v(()=>{document.removeEventListener("keydown",c),document.body.style.overflow=null});const h=_(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[a.maxWidth]);return(d,A)=>(i(),g(B,{to:"body"},[r(u,{"leave-active-class":"duration-200"},{default:n(()=>[m(t("div",W,[r(u,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:n(()=>[m(t("div",{class:"fixed inset-0 transform transition-all",onClick:l},V,512),[[y,e.show]])]),_:1}),r(u,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:n(()=>[m(t("div",{class:b(["mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",k(h)])},[e.show?o(d.$slots,"default",{key:0}):$("",!0)],2),[[y,e.show]])]),_:3})],512),[[y,e.show]])]),_:3})]))}},T={class:"px-6 py-4"},z={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},D={class:"mt-4 text-sm text-gray-600 dark:text-gray-400"},L={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right"},U={__name:"DialogModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:s}){const a=()=>{s("close")};return(l,c)=>(i(),g(N,{show:e.show,"max-width":e.maxWidth,closeable:e.closeable,onClose:a},{default:n(()=>[t("div",T,[t("div",z,[o(l.$slots,"title")]),t("div",D,[o(l.$slots,"content")])]),t("div",L,[o(l.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}},j=["type"],q={__name:"SecondaryButton",props:{type:{type:String,default:"button"}},setup(e){return(s,a)=>(i(),f("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"},[o(s.$slots,"default")],8,j))}};export{q as _,U as a,O as b};
