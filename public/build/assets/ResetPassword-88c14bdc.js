import{T as c,n as w,d as e,L as o,w as d,F as f,o as _,Z as g,b as a,N as V,D as x,e as v}from"./app-a830934e.js";import{A as b}from"./AuthenticationCard-27c7f83a.js";import{_ as l}from"./InputError-fbeb44ff.js";import{_ as i}from"./InputLabel-013a4cd4.js";import{P as h}from"./PrimaryButton-188034cf.js";import{_ as m}from"./TextInput-610d7b00.js";import"./_plugin-vue_export-helper-c27b6911.js";const k={class:"w-96 mx-auto p-1"},y=a("img",{src:"/img/logo.png",class:"mx-auto py-3"},null,-1),P=["onSubmit"],B={class:"mt-4"},C={class:"mt-4"},N={class:"flex items-center justify-end mt-4"},T={__name:"ResetPassword",props:{email:String,token:String},setup(p){const n=p,s=c({token:n.token,email:n.email,password:"",password_confirmation:""}),u=()=>{s.post(route("password.update"),{onFinish:()=>s.reset("password","password_confirmation")})};return(S,t)=>(_(),w(f,null,[e(o(g),{title:"Reset Password"}),e(b,null,{default:d(()=>[a("div",k,[y,a("form",{onSubmit:V(u,["prevent"]),class:"text-white"},[a("div",null,[e(i,{for:"email",value:"Email",class:"text-white"}),e(m,{id:"email",modelValue:o(s).email,"onUpdate:modelValue":t[0]||(t[0]=r=>o(s).email=r),type:"email",class:"mt-1 text-white",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),e(l,{class:"mt-2",message:o(s).errors.email},null,8,["message"])]),a("div",B,[e(i,{for:"password",value:"Password"}),e(m,{id:"password",modelValue:o(s).password,"onUpdate:modelValue":t[1]||(t[1]=r=>o(s).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(l,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),a("div",C,[e(i,{for:"password_confirmation",value:"Confirm Password"}),e(m,{id:"password_confirmation",modelValue:o(s).password_confirmation,"onUpdate:modelValue":t[2]||(t[2]=r=>o(s).password_confirmation=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(l,{class:"mt-2",message:o(s).errors.password_confirmation},null,8,["message"])]),a("div",N,[e(h,{class:x({"opacity-25":o(s).processing}),disabled:o(s).processing},{default:d(()=>[v(" Reset Password ")]),_:1},8,["class","disabled"])])],40,P)])]),_:1})],64))}};export{T as default};