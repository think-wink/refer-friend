import{c as i,w as n,a as l,o as p,b as e,d as r,t as d,e as c}from"./app-6671a1a6.js";import{_}from"./AppLayout-6a98379c.js";import{P as m,_ as u}from"./PopupButton-1709f310.js";import"./index-f0515acb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./use-event-listener-1d91b1fd.js";const f={class:"grid grid-cols-2"},h=e("div",{class:"ml-2 text-3xl text-white"}," API Docs ",-1),k={class:"justify-self-end"},w=e("a",{class:"bg-orange text-white rounded py-2 mt-1 px-5 inline-block",target:"_blank",href:"/docs"}," Main Docs Page",-1),b={class:"break-all"},g=e("iframe",{src:"/docs",class:"w-full h-[60vh] mt-4"}," ",-1),y={props:{tokens:Array},data(){return{open:!1,response:null}},methods:{newToken(){l.post("/dashboard/users/tokens/create").then(t=>{this.response=t.data,this.setOpen(!0)})},setOpen(t){this.open=t}}},I=Object.assign(y,{__name:"API",setup(t){return(s,o)=>(p(),i(_,{title:"API"},{default:n(()=>[e("div",f,[h,e("div",k,[e("button",{class:"bg-orange text-white rounded py-2 mt-1 px-5 mr-5",onClick:o[0]||(o[0]=(...a)=>s.newToken&&s.newToken(...a))}," Generate API key "),w])]),r(u,{show:s.open,close:()=>s.setOpen(!1)},{title:n(()=>[e("p",b,"your new api token is "+d(s.response.token),1)]),buttons:n(()=>[r(m,{onClick:o[1]||(o[1]=a=>s.setOpen(!1))},{default:n(()=>[c(" close ")]),_:1})]),_:1},8,["show","close"]),g]),_:1}))}});export{I as default};