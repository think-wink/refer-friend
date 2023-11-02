import{l as S,T as k,c,w as t,i as o,o as i,S as T,d as e,b as a,e as _,g,A as v,f as F,t as U,h as B}from"./app-3f896bec.js";import{_ as N,P as R}from"./PopupButton-3dc6a011.js";import{_ as A}from"./AppLayout-ad3d542d.js";import{S as E,R as V,C as L,T as M,F as P}from"./FilterEnums-4e148edf.js";import H from"./UserRow-be71c17d.js";import{_ as D}from"./_plugin-vue_export-helper-c27b6911.js";import"./open-closed-f1df1f8f.js";import"./use-event-listener-608bd015.js";import"./index-335f8b63.js";import"./vue.runtime.esm-bundler-5fa238d2.js";import"./use-resolve-button-type-4f1ad198.js";import"./PrimaryButton-2f824b6e.js";import"./UpdateUser-488e38fc.js";import"./InputLabel-780cf443.js";import"./TextCell-093014e8.js";const j={components:{ConfirmationModel:N,PopupButton:R,AppLayout:A,SyncedTable:E,RowHeading:V,ColumnSelect:L,TextFilter:M,FilterEnums:P,UserRow:H},props:{table:Object,user_url:String,roles:Array},data(){return{table_key:S(0),show_create:!1,new_user_form:k({email:""})}},methods:{setCreate(d){this.show_create=d},createNewUser(){this.new_user_form.post("/dashboard/users/create",{preserveScroll:!0,onSuccess:()=>{this.setCreate(!1),this.table_key+=1}})}}},O={class:"flex flex-row"},q=a("p",null," Email: ",-1),z={key:0,class:"text-[red]"},G=a("th",null," Actions ",-1),I=a("div",{class:"text-white"}," Loading ...",-1);function J(d,r,K,Q,n,m){const f=o("ColumnSelect"),w=o("FilterEnums"),C=o("TextFilter"),p=o("PopupButton"),b=o("ConfirmationModel"),l=o("RowHeading"),h=o("UserRow"),x=o("SyncedTable"),y=o("AppLayout");return i(),c(y,{title:"users"},{fallback:t(()=>[I]),default:t(()=>[(i(),c(T,null,{default:t(()=>[(i(),c(x,{columns_url:"/dashboard/users/columns",data_url:"/dashboard/users/data",key:n.table_key},{actions:t(s=>[e(f,{initial_columns:s.state_data.columns,update:s.updateSelectedColumns},null,8,["initial_columns","update"]),e(w,{initial_filters:s.state_data.filters,update:s.updateFilters,columns:s.column_data},null,8,["initial_filters","update","columns"]),e(C,{update:s.updateFilters,column_name:"email"},null,8,["update"]),a("button",{class:"px-2 text-white bg-orange rounded my-2",onClick:r[0]||(r[0]=u=>m.setCreate(!0))}," New User "),e(b,{show:n.show_create,close:()=>m.setCreate(!1)},{title:t(()=>[_(" Create a new User ")]),body:t(()=>[a("div",O,[q,g(a("input",{"onUpdate:modelValue":r[1]||(r[1]=u=>n.new_user_form.email=u),class:"mx-3 px-2 text-primary border border-primary"},null,512),[[v,n.new_user_form.email]])]),n.new_user_form.errors.email?(i(),F("p",z,U(n.new_user_form.errors.email),1)):B("",!0)]),buttons:t(()=>[e(p,{onClick:m.createNewUser},{default:t(()=>[_(" Save ")]),_:1},8,["onClick"]),e(p,{onClick:r[2]||(r[2]=u=>m.setCreate(!1))},{default:t(()=>[_(" Cancel ")]),_:1})]),_:1},8,["show","close"])]),headings:t(()=>[e(l,{column_name:"id"}),e(l,{column_name:"name"}),e(l,{column_name:"email"}),e(l,{column_name:"updated_at"}),e(l,{column_name:"created_at"}),G]),row:t(s=>[e(h,{row:s.row},null,8,["row"])]),_:1}))]),_:1}))]),_:1})}const ue=D(j,[["render",J]]);export{ue as default};
