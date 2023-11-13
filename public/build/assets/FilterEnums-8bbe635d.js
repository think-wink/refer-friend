import{l as O,B,o as r,f as l,b as s,C as $,F as f,r as v,a as N,i as _,d as m,w as h,t as b,c as x,h as C,g as A,D as F,A as V,v as H}from"./app-4d9f2a41.js";import{P as U}from"./PrimaryButton-f2959331.js";import{_ as w}from"./_plugin-vue_export-helper-c27b6911.js";import{A as z,a as T,P as j,B as I,H as k,b as J,c as M}from"./AppLayout-c50ac00a.js";async function E(t){return N.get(t).then(e=>e.data)}async function D(t,e){const o=JSON.parse(JSON.stringify(e));o.sort.descending=e.sort.descending?"1":"0",Object.keys(o.columns).forEach(c=>{o.columns[c]=o.columns[c]?"1":"0"});let n=await N.get(t,{params:o}).then(c=>c.data);typeof n=="string"&&(n=JSON.parse(n));const a=Object.keys(n.data),i=a.length>0?Object.keys(n.data[a[0]]):[];return{table_data:n.data,paginator:n.meta,keys:i}}async function L(t,e){sessionStorage.setItem(t,JSON.stringify(e))}function R(t){const e={},o={};return Object.keys(t).forEach(n=>{const a=t[n];e[n]=a.default,a.search!=="none"&&(o[n]="")}),{page:1,sort:{column:"id",descending:!1},columns:e,filters:o}}async function G(t,e){const o=sessionStorage.getItem(t);return o?JSON.parse(o):R(e)}const K={components:{PrimaryButton:U},props:{data_url:String,columns_url:String},async setup(t){const e=await E(t.columns_url),o=await G(t.data_url,e);return{data:O(await D(t.data_url,o)),columns:e,get_data_options:o}},methods:{async getNewData(t){L(this.data_url,t),this.data=await D(this.data_url,t)},async updateFilter(t,e){this.get_data_options.filters[t]=e,this.get_data_options.page=1,this.getNewData(this.get_data_options)},async updateSelectedColumns(t){this.get_data_options.columns=t,this.getNewData(this.get_data_options)},async updateSortColumn(t){t===this.get_data_options.sort.column?this.get_data_options.sort.descending=!this.get_data_options.sort.descending:this.get_data_options.sort.column=t,await this.getNewData(this.get_data_options)},async updatePageNumber(t){const e=t.match(/\d$/);this.get_data_options.page=e?e[0]:1,this.getNewData(this.get_data_options)}},data(){return{}},provide(){return{sort:B(()=>this.get_data_options.sort),updateSort:this.updateSortColumn,selected_columns:B(()=>this.data.keys)}}},Q={class:"text-white flex flex-row-reverse flex-wrap gap-2"},W={class:"w-full text-white text-left"},X={class:""},Y={class:"flex flex-wrap pt-5"},Z=["innerHTML"];function q(t,e,o,n,a,i){const c=_("PrimaryButton");return r(),l(f,null,[s("div",Q,[$(t.$slots,"actions",{column_data:n.columns,state_data:n.get_data_options,updateSelectedColumns:i.updateSelectedColumns,updateFilters:i.updateFilter})]),s("table",W,[s("thead",X,[s("tr",null,[$(t.$slots,"headings")])]),s("tbody",null,[(r(!0),l(f,null,v(n.data.table_data,d=>(r(),l("tr",{key:d.hidden_id,class:"border-b dark:bg-gray-900 dark:border-gray-700"},[$(t.$slots,"row",{row:d})]))),128))])]),s("div",Y,[(r(!0),l(f,null,v(n.data.paginator.links,d=>(r(),l("div",{key:d.label,class:"p-2"},[m(c,{onClick:g=>i.updatePageNumber(d.url),selected:d.active},{default:h(()=>[s("p",{innerHTML:d.label},null,8,Z)]),_:2},1032,["onClick","selected"])]))),128))])],64)}const Nt=w(K,[["render",q]]),tt={components:{ArrowUpIcon:z,ArrowDownIcon:T},props:{column_name:String},methods:{update(){this.updateSort(this.column_name)}},inject:["selected_columns","sort","updateSort"]},et={class:"flex flex-row"},ot={class:"capitalize mx-1"},st={key:0};function nt(t,e,o,n,a,i){const c=_("ArrowDownIcon"),d=_("ArrowUpIcon");return i.selected_columns.includes(o.column_name)?(r(),l("td",{key:0,onClick:e[0]||(e[0]=(...g)=>i.update&&i.update(...g)),class:"p-3"},[s("span",et,[s("span",ot,b(o.column_name.replaceAll("_"," ")),1),o.column_name===i.sort.column?(r(),l("span",st,[i.sort.descending?(r(),x(c,{key:0,class:"w-6 h-6 self-center text-white"})):(r(),x(d,{key:1,class:"w-6 h-6 self-center text-white"}))])):C("",!0)])])):C("",!0)}const jt=w(tt,[["render",nt]]),at={components:{Popover:j,PopoverButton:I,PopoverPanel:k,AdjustmentsHorizontalIcon:J},props:{initial_columns:Object,update:Function},data(){return{columns:this.initial_columns}}},rt={class:"flex flex-row bg-orange px-4 py-2 rounded my-2"},ct=s("p",{class:""},"Column Select",-1),lt={class:"flex flex-row p-2"},it=["onUpdate:modelValue","id"],dt={class:"text-[black]"};function ut(t,e,o,n,a,i){const c=_("AdjustmentsHorizontalIcon"),d=_("PopoverButton"),g=_("PopoverPanel"),P=_("Popover");return r(),x(P,{class:"relative"},{default:h(()=>[m(d,null,{default:h(()=>[s("div",rt,[m(c,{class:"self-center w-6 h-6 mr-1"}),ct])]),_:1}),m(g,{class:"absolute mt-3 z-10 right-0 w-44 rounded bg-white"},{default:h(()=>[(r(!0),l(f,null,v(a.columns,(y,u)=>(r(),l("div",{key:u},[s("div",lt,[A(s("input",{"onUpdate:modelValue":p=>a.columns[u]=p,class:"mt-1 mr-3 text-orange",type:"checkbox",id:u,onChange:e[0]||(e[0]=p=>o.update(a.columns))},null,40,it),[[F,a.columns[u]]]),s("p",dt,b(u.replaceAll("_"," ")),1)])]))),128))]),_:1})]),_:1})}const It=w(at,[["render",ut]]),_t={props:{column_name:String,update:Function,placeholder_text:{type:String,default:"Search here"}},data(){return{search_value:""}}},pt={class:"border border-[#999] rounded my-2 flex flex-row"},mt=["placeholder"],ht=s("button",{class:"bg-orange px-2"}," Search ",-1);function gt(t,e,o,n,a,i){return r(),l("div",pt,[A(s("input",{"onUpdate:modelValue":e[0]||(e[0]=c=>a.search_value=c),class:"bg-primary p-2",placeholder:o.placeholder_text,onChange:e[1]||(e[1]=c=>o.update(o.column_name,a.search_value))},null,40,mt),[[V,a.search_value]]),ht])}const kt=w(_t,[["render",gt]]),ft={components:{Popover:j,PopoverButton:I,PopoverPanel:k,AdjustmentsVerticalIcon:M},props:{initial_filters:Object,columns:Object,update:Function},data(){return{filters:this.initial_filters}}},vt={class:"flex flex-row bg-orange px-4 my-2 py-2 rounded"},wt=s("p",{class:""},"Filter",-1),bt={key:0,class:"grid grid-cols-2 p-2"},xt={class:"mt-2"},Pt=["id","onUpdate:modelValue","onChange"],yt=s("option",{value:""},"All Option ",-1),St=["value"];function $t(t,e,o,n,a,i){const c=_("AdjustmentsVerticalIcon"),d=_("PopoverButton"),g=_("PopoverPanel"),P=_("Popover");return r(),x(P,{class:"relative"},{default:h(()=>[m(d,null,{default:h(()=>[s("div",vt,[m(c,{class:"self-center w-6 h-6 mr-1"}),wt])]),_:1}),m(g,{class:"absolute mt-3 z-10 right-0 w-72 bg-white rounded text-[black]"},{default:h(()=>[(r(!0),l(f,null,v(o.columns,(y,u)=>(r(),l("div",{key:u},[y.search==="enum"?(r(),l("div",bt,[s("p",xt,b(u.replaceAll("_"," "))+": ",1),A(s("select",{id:u,class:"border border-orange text-black","onUpdate:modelValue":p=>a.filters[u]=p,onChange:p=>o.update(u,p.target.value)},[yt,(r(!0),l(f,null,v(y.levels,(p,S)=>(r(),l("option",{key:`${u}.${S}`,value:typeof S=="string"?S:p},b(p),9,St))),128))],40,Pt),[[H,a.filters[u]]])])):C("",!0)]))),128))]),_:1})]),_:1})}const Ot=w(ft,[["render",$t]]);export{It as C,Ot as F,jt as R,Nt as S,kt as T};