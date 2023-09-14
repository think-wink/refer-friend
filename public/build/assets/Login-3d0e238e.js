import{T as p,n,d as o,L as s,w as l,F as _,o as d,Z as f,t as x,u as w,b as t,D as g,e as b,N as h}from"./app-6671a1a6.js";import{A as V}from"./AuthenticationCard-9e58b623.js";import{_ as y}from"./AuthenticationCardLogo-d2b8efea.js";import{P}from"./PrimaryButton-b06a47cd.js";import{_ as u}from"./TextInput-8165b4bb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./InputLabel-fb64be07.js";const v=t("img",{src:"/img/logo.png",class:"mx-auto mb-5"},null,-1),B={key:0,class:"text-center font-medium text-sm text-orange"},N=["onSubmit"],C={class:"w-96 mx-auto"},L={class:""},S=t("p",{class:"ml-3 text-text-second text-sm pt-1"}," Please enter your username",-1),k={class:"mt-4"},F=t("p",{class:"ml-3 text-text-second text-sm"}," Please enter your password and press submit",-1),U={class:"flex flex-col items-end justify-end mt-4"},E={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(i){const e=p({email:"",password:"",remember:!1}),c=()=>{e.transform(m=>({...m,remember:e.remember?"on":""})).post(route("login"),{onFinish:()=>e.reset("password")})};return(m,a)=>(d(),n(_,null,[o(s(f),{title:"Log in"}),o(V,null,{logo:l(()=>[o(y)]),default:l(()=>[v,i.status?(d(),n("div",B,x(i.status),1)):w("",!0),t("form",{onSubmit:h(c,["prevent"])},[t("div",C,[t("div",L,[o(u,{modelValue:s(e).email,"onUpdate:modelValue":a[0]||(a[0]=r=>s(e).email=r),type:"email",class:"text-white",required:"",autofocus:"",autocomplete:"username",placeholder:"Username",error:s(e).errors.email,label:"Login"},null,8,["modelValue","error"]),S]),t("div",k,[o(u,{id:"password",modelValue:s(e).password,"onUpdate:modelValue":a[1]||(a[1]=r=>s(e).password=r),error:s(e).errors.password,type:"password",label:"Password",class:"text-white",required:"",autocomplete:"current-password",placeholder:"Password"},null,8,["modelValue","error"]),F]),t("div",U,[o(P,{class:g({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:l(()=>[b(" submit ")]),_:1},8,["class","disabled"])])])],40,N)]),_:1})],64))}};export{E as default};
