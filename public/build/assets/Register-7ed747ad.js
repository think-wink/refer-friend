import{B as y,g as h,D as k,M as o,o as g,f as p,P as w,T as v,d as s,w as n,F as x,Z as b,b as t,e as m,h as V,z as P,E as C,O as $}from"./app-4d9f2a41.js";import{A as B}from"./AuthenticationCard-d90d6a58.js";import{_ as U}from"./AuthenticationCardLogo-3c91ecce.js";import{_ as i}from"./InputError-2f8d23e8.js";import{_ as d}from"./InputLabel-0bd0c07b.js";import{P as q}from"./PrimaryButton-f2959331.js";import{_ as u}from"./TextInput-9f1bef10.js";import"./_plugin-vue_export-helper-c27b6911.js";const A=["value"],N={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{type:String,default:null}},emits:["update:checked"],setup(c,{emit:e}){const f=c,l=y({get(){return f.checked},set(r){e("update:checked",r)}});return(r,a)=>h((g(),p("input",{"onUpdate:modelValue":a[0]||(a[0]=_=>w(l)?l.value=_:null),type:"checkbox",value:c.value,class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"},null,8,A)),[[k,o(l)]])}},F=["onSubmit"],R={class:"mt-4"},S={class:"mt-4"},T={class:"mt-4"},E={key:0,class:"mt-4"},M={class:"flex items-center"},j={class:"ml-2"},z=["href"],D=["href"],I={class:"flex items-center justify-end mt-4"},W={__name:"Register",setup(c){const e=v({name:"",email:"",password:"",password_confirmation:"",terms:!1}),f=()=>{e.post(route("register"),{onFinish:()=>e.reset("password","password_confirmation")})};return(l,r)=>(g(),p(x,null,[s(o(b),{title:"Register"}),s(B,null,{logo:n(()=>[s(U)]),default:n(()=>[t("form",{onSubmit:$(f,["prevent"])},[t("div",null,[s(d,{for:"name",value:"Name"}),s(u,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=a=>o(e).name=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(i,{class:"mt-2",message:o(e).errors.name},null,8,["message"])]),t("div",R,[s(d,{for:"email",value:"Email"}),s(u,{id:"email",modelValue:o(e).email,"onUpdate:modelValue":r[1]||(r[1]=a=>o(e).email=a),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),s(i,{class:"mt-2",message:o(e).errors.email},null,8,["message"])]),t("div",S,[s(d,{for:"password",value:"Password"}),s(u,{id:"password",modelValue:o(e).password,"onUpdate:modelValue":r[2]||(r[2]=a=>o(e).password=a),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(i,{class:"mt-2",message:o(e).errors.password},null,8,["message"])]),t("div",T,[s(d,{for:"password_confirmation",value:"Confirm Password"}),s(u,{id:"password_confirmation",modelValue:o(e).password_confirmation,"onUpdate:modelValue":r[3]||(r[3]=a=>o(e).password_confirmation=a),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(i,{class:"mt-2",message:o(e).errors.password_confirmation},null,8,["message"])]),l.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature?(g(),p("div",E,[s(d,{for:"terms"},{default:n(()=>[t("div",M,[s(N,{id:"terms",checked:o(e).terms,"onUpdate:checked":r[4]||(r[4]=a=>o(e).terms=a),name:"terms",required:""},null,8,["checked"]),t("div",j,[m(" I agree to the "),t("a",{target:"_blank",href:l.route("terms.show"),class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"},"Terms of Service",8,z),m(" and "),t("a",{target:"_blank",href:l.route("policy.show"),class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"},"Privacy Policy",8,D)])]),s(i,{class:"mt-2",message:o(e).errors.terms},null,8,["message"])]),_:1})])):V("",!0),t("div",I,[s(o(P),{href:l.route("login"),class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"},{default:n(()=>[m(" Already registered? ")]),_:1},8,["href"]),s(q,{class:C(["ml-4",{"opacity-25":o(e).processing}]),disabled:o(e).processing},{default:n(()=>[m(" Register ")]),_:1},8,["class","disabled"])])],40,F)]),_:1})],64))}};export{W as default};