import{g as V,h as x,o as h,n as w,d as l,b as a,F as v,q as y,t as i,u as U,a as C,c as M,w as u,r as p,e as d}from"./app-a830934e.js";import{_ as k,P as B}from"./PopupButton-2680bda9.js";import{_ as E}from"./TextInput-610d7b00.js";import{_ as I}from"./InputLabel-013a4cd4.js";import{_ as L}from"./AppLayout-a41f9bb5.js";import{_ as S}from"./_plugin-vue_export-helper-c27b6911.js";import"./open-closed-45b09712.js";import"./use-event-listener-62b961d9.js";import"./index-4f431aa7.js";import"./vue.runtime.esm-bundler-86ff56d6.js";import"./use-resolve-button-type-e5b08ff5.js";const F={key:0},N=["value","disabled"],R=["value"],P={class:"text-[red]"},T={__name:"EnumInput",props:{modelValue:[String,Number],options:Object,read_only:{type:Boolean,default:!1},error:String,label:String},emits:["update:modelValue"],setup(n,{expose:t}){const r=V(null);return x(()=>{r.value.hasAttribute("autofocus")&&r.value.focus()}),t({focus:()=>r.value.focus()}),(_,e)=>typeof n.modelValue<"u"?(h(),w("div",F,[l(I,{value:n.label},null,8,["value"]),a("select",{ref_key:"input",ref:r,value:n.modelValue,onInput:e[0]||(e[0]=s=>_.$emit("update:modelValue",s.target.value)),class:"bg-input border-0 p-4 text-white w-full",disabled:n.read_only},[(h(!0),w(v,null,y(n.options,(s,m)=>(h(),w("option",{key:s,value:typeof m=="string"?m:s},i(s),9,R))),128))],40,N),a("p",P,i(n.error),1)])):U("",!0)}},j={props:{row:Object,statusList:Object},components:{AppLayout:L,ConfirmationModel:k,TextInput:E,PopupButton:B,EnumInput:T},data(){return{update_form:{reward_status:"",email:"",phone_number:"",first_name:"",last_name:"",errors:{}},merge_form:{reward_status:"",merge_email:"",errors:{}},show_merge:!1,show_update:!1}},methods:{async update(n,t){try{const r={};Object.keys(n).forEach(e=>{n[e]&&(r[e]=n[e])});const _=await C.post(t,r);console.log(_),location.reload()}catch(r){r.response&&r.response.status===422?n.errors=r.response.data.errors:console.log(r)}finally{this.show_update=!1,this.show_merge=!0}},showUpdate(){this.show_update=!0},hideUpdate(){this.show_update=!1},showMerge(){this.show_merge=!0},hideMerge(){this.show_merge=!1}}},A={class:"text-white"},O=a("div",null," Update ",-1),q=a("div",null,[a("p",null," Update this referred friend")],-1),D=a("p",{class:"pt-5 text-white"}," Merge Referred Friend record into this record",-1),z=a("p",{class:"pt-5 text-white"},' This should be done to clean up friends with match_status of "failed"',-1),G=a("div",null," Merge ",-1),H=a("div",null,[a("p",null," Merge this referred friend")],-1);function J(n,t,r,_,e,s){const m=p("TextInput"),g=p("EnumInput"),f=p("PopupButton"),c=p("ConfirmationModel"),b=p("AppLayout");return h(),M(b,null,{default:u(()=>[a("div",A,[l(m,{class:"mt-3 text-white",modelValue:e.update_form.email,"onUpdate:modelValue":t[0]||(t[0]=o=>e.update_form.email=o),label:"New Email",error:e.update_form.errors.email},null,8,["modelValue","error"]),d(" "+i(r.row.data.email)+" ",1),l(g,{class:"mt-3 text-white",modelValue:e.update_form.reward_status,"onUpdate:modelValue":t[1]||(t[1]=o=>e.update_form.reward_status=o),options:r.statusList,label:"Reward Status",error:e.update_form.errors.reward_status},null,8,["modelValue","options","error"]),d(" "+i(r.row.data.reward_status)+" ",1),l(m,{class:"mt-3",modelValue:e.update_form.phone_number,"onUpdate:modelValue":t[2]||(t[2]=o=>e.update_form.phone_number=o),label:"Phone number",error:e.update_form.errors.phone_number},null,8,["modelValue","error"]),d(" "+i(r.row.data.phone_number)+" ",1),l(m,{class:"mt-3 text-white",modelValue:e.update_form.first_name,"onUpdate:modelValue":t[3]||(t[3]=o=>e.update_form.first_name=o),label:"First name",error:e.update_form.errors.first_name},null,8,["modelValue","error"]),d(" "+i(r.row.data.first_name)+" ",1),l(m,{class:"mt-3 text-white",modelValue:e.update_form.last_name,"onUpdate:modelValue":t[4]||(t[4]=o=>e.update_form.last_name=o),label:"Last name",error:e.update_form.errors.last_name},null,8,["modelValue","error"]),d(" "+i(r.row.data.last_name)+" ",1),a("button",{onClick:t[6]||(t[6]=o=>s.showUpdate()),class:"block border rounded border-orange p-1 align-middle mt-5 text-center text-orange bg-primary hover:bg-orange hover:text-white"},[O,l(c,{show:e.show_update,close:()=>s.hideUpdate()},{title:u(()=>[d(" Updating Referred Friend ")]),body:u(()=>[q]),buttons:u(()=>[l(f,{onClick:t[5]||(t[5]=()=>s.update(e.update_form,`/api/referred/${this.row.data.hidden_id}/update`))},{default:u(()=>[d(" Save ")]),_:1}),l(f,{onClick:s.hideUpdate},{default:u(()=>[d(" Cancel ")]),_:1},8,["onClick"])]),_:1},8,["show","close"])]),D,z,l(m,{class:"mt-3 text-white",modelValue:e.merge_form.merge_email,"onUpdate:modelValue":t[7]||(t[7]=o=>e.merge_form.merge_email=o),label:"Merge Email",error:e.merge_form.errors.merge_email},null,8,["modelValue","error"]),l(g,{class:"mt-3 text-white",modelValue:e.merge_form.reward_status,"onUpdate:modelValue":t[8]||(t[8]=o=>e.merge_form.reward_status=o),options:r.statusList,label:"Reward Status",error:e.merge_form.errors.reward_status},null,8,["modelValue","options","error"]),a("button",{onClick:t[11]||(t[11]=o=>s.showMerge()),class:"block border rounded border-orange p-1 align-middle mt-5 text-center text-orange bg-primary hover:bg-orange hover:text-white"},[G,l(c,{show:e.show_merge,close:()=>s.hideMerge()},{title:u(()=>[d(" Merging Referred Friend ")]),body:u(()=>[H]),buttons:u(()=>[l(f,{onClick:t[9]||(t[9]=()=>s.update(e.merge_form,`/api/referred/${this.row.data.hidden_id}/merge`))},{default:u(()=>[d(" Save ")]),_:1}),l(f,{onClick:t[10]||(t[10]=()=>s.hideMerge())},{default:u(()=>[d(" Cancel ")]),_:1})]),_:1},8,["show","close"])])])]),_:1})}const se=S(j,[["render",J]]);export{se as default};