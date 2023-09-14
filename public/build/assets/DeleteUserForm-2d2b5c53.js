import{g as i,T as f,c as y,w as e,o as w,e as s,b as c,d as t,L as a,P as g,D as h}from"./app-6671a1a6.js";import{b as k,_ as v,a as x}from"./SecondaryButton-b89ec5cb.js";import{_ as m}from"./DangerButton-efa662b1.js";import{_ as b}from"./InputError-9fe5c435.js";import{_ as D}from"./TextInput-8165b4bb.js";import"./SectionTitle-7c7f0abb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./InputLabel-fb64be07.js";const C=c("div",{class:"max-w-xl text-sm text-gray-600 dark:text-gray-400 bg-p"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ",-1),V={class:"mt-5"},$={class:"mt-4"},S={__name:"DeleteUserForm",setup(A){const r=i(!1),l=i(null),o=f({password:""}),p=()=>{r.value=!0,setTimeout(()=>l.value.focus(),250)},u=()=>{o.delete(route("current-user.destroy"),{preserveScroll:!0,onSuccess:()=>n(),onError:()=>l.value.focus(),onFinish:()=>o.reset()})},n=()=>{r.value=!1,o.reset()};return(U,d)=>(w(),y(k,null,{title:e(()=>[s(" Delete Account ")]),description:e(()=>[s(" Permanently delete your account. ")]),content:e(()=>[C,c("div",V,[t(m,{onClick:p},{default:e(()=>[s(" Delete Account ")]),_:1})]),t(x,{show:r.value,onClose:n},{title:e(()=>[s(" Delete Account ")]),content:e(()=>[s(" Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. "),c("div",$,[t(D,{ref_key:"passwordInput",ref:l,modelValue:a(o).password,"onUpdate:modelValue":d[0]||(d[0]=_=>a(o).password=_),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",autocomplete:"current-password",onKeyup:g(u,["enter"])},null,8,["modelValue","onKeyup"]),t(b,{message:a(o).errors.password,class:"mt-2"},null,8,["message"])])]),footer:e(()=>[t(v,{onClick:n},{default:e(()=>[s(" Cancel ")]),_:1}),t(m,{class:h(["ml-3",{"opacity-25":a(o).processing}]),disabled:a(o).processing,onClick:u},{default:e(()=>[s(" Delete Account ")]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{S as default};
