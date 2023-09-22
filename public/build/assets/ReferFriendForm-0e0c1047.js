import{R as k}from"./ReferFriendLayout-dd2ac07f.js";import{c as w,X as F}from"./index-16d20f81.js";import{c as C,w as V,r as f,o as t,b as e,n as o,x as d,y as _,t as i,u as c,F as U,q as N,B as x,N as p,d as b,e as h}from"./app-ea2858db.js";import{_ as I}from"./_plugin-vue_export-helper-c27b6911.js";import"./vue.runtime.esm-bundler-25f2d5a9.js";const R={props:["uuid"],components:{ReferFriendLayout:k,CheckBadgeIcon:w,XCircleIcon:F},data(){return{friendsCount:1,referrer_first_name:"",referrer_last_name:"",referees:[{first_name:"",last_name:"",phone_number:"",email:""}],terms:"",permission:"",errors:"",submitting:!1,show_success_message:!1}},methods:{incrementFriends(){this.friendsCount++,this.referees.push({first_name:"",last_name:"",phone_number:"",email:""})},removeFriend(m){this.friendsCount--,this.referees.splice(m,1)},async submitForm(){if(!this.submitting){this.submitting=!0;try{const m=await axios.post(`/api/referrer/${this.uuid}/referred/create`,{referrer_first_name:this.referrer_first_name,referrer_last_name:this.referrer_last_name,referees:this.referees,permission:this.permission,terms:this.terms});this.show_success_message=!0,this.referees=[],this.terms=!1,this.permission=!1,this.errors="",this.submitting=!1}catch(m){this.submitting=!1,m.response&&m.response.data?this.errors=m.response.data.errors?m.response.data.errors:m.response.data.error:this.errors="An error occurred while submitting the form."}}}}},B={class:"mx-auto py-12"},q=e("div",{class:"flex justify-center pt-5"},[e("div",{class:"text-center text-toolbar w-2/3"},[e("h3",{class:"text-5xl font-bold font-merry"},"Refer your friends to earn $250"),e("p",{class:"my-4"}," We’d love our valued customers to share their experience. We’re offering a referral reward for you and your friends if they also settle a loan with us. It’s simple to start the process. Just fill in the details below. ")])],-1),D={class:"flex justify-center pt-5"},L={key:0,class:"w-1/2"},E={class:"grid grid-cols-1 lg:grid-cols-2 place-content-between mb-8"},M={class:"flex flex-col lg:mr-5 my-1"},T=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Your First Name",-1),j={key:0,class:"text-red text-xs mt-1"},S={class:"flex flex-col my-1"},X=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Your Last Name",-1),P={key:0,class:"text-red text-xs mt-1"},A={class:"flex justify-between"},W={class:"font-medium text-toolbar text-lg"},Y=["onClick"],J={class:"grid grid-cols-1 lg:grid-cols-2 place-content-between lg:mb-2"},O={class:"flex flex-col lg:mr-5 my-1"},z=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's First Name",-1),G=["onUpdate:modelValue"],H={key:0,class:"text-red text-xs mt-1"},K={class:"flex flex-col my-1"},Q=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's Last Name",-1),Z=["onUpdate:modelValue"],$={key:0,class:"text-red text-xs mt-1"},ee={class:"grid grid-cols-1 lg:grid-cols-2"},re={class:"flex flex-col lg:mr-5 my-1"},se=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's Phone Number",-1),te=["onUpdate:modelValue"],oe={key:0,class:"text-red text-xs mt-1"},le={class:"flex flex-col my-1"},ne=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's Email",-1),ie=["onUpdate:modelValue"],ce={key:0,class:"text-red text-xs mt-1"},me={class:"flex flex-col mb-4"},ae={class:"flex items-center"},de=e("label",{class:"text-sm text-toolbar"},"I confirm that know the person listed above and have their permission to submit their personal contact details to this program.",-1),_e={key:0,class:"text-red text-xs mt-1"},ue={class:"flex flex-col"},fe={class:"flex items-center"},pe=e("label",{class:"required-label text-sm text-toolbar"},[h(" By providing your details, you agree to our "),e("a",{class:"underline",href:"https://householdcapital.com.au/website-privacy-policy/",target:"_blank"},"Terms of Use"),h(" and "),e("a",{class:"underline",href:"https://householdcapital.com.au/privacy-credit-reporting-policy/",target:"_blank"},"Privacy and Credit Reporting Policy.")],-1),he={key:0,class:"text-red text-xs mt-1"},xe={key:0,class:"p-2 pb-0 text-center"},be={class:"text-red text-xs mt-1"},ye={class:"flex space-x-2 justify-center flex-col md:flex-row items-center mt-4"},ge={key:1,class:"flex items-center text-success font-bold text-lg"},ve=e("p",null,"The form has been submitted successfully",-1);function ke(m,l,we,Fe,r,u){const y=f("XCircleIcon"),g=f("CheckBadgeIcon"),v=f("ReferFriendLayout");return t(),C(v,null,{default:V(()=>[e("div",B,[q,e("div",D,[r.show_success_message?(t(),o("div",ge,[b(g),ve])):(t(),o("div",L,[e("div",null,[e("div",E,[e("div",M,[T,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":l[0]||(l[0]=n=>r.referrer_first_name=n)},null,512),[[_,r.referrer_first_name]]),r.errors.referrer_first_name?(t(),o("p",j,i(r.errors.referrer_first_name[0]),1)):c("",!0)]),e("div",S,[X,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":l[1]||(l[1]=n=>r.referrer_last_name=n)},null,512),[[_,r.referrer_last_name]]),r.errors.referrer_last_name?(t(),o("p",P,i(r.errors.referrer_last_name[0]),1)):c("",!0)])]),(t(!0),o(U,null,N(r.friendsCount,(n,s)=>(t(),o("div",{key:s,class:"mb-5"},[e("div",A,[e("p",W,"Friend "+i(s===0?"":s+1)+" Details:",1),s!==0?(t(),o("button",{key:0,type:"button",class:"text-red px-2 py-1 text-xs flex items-center",onClick:p(a=>u.removeFriend(s),["prevent"])},[b(y,{class:"w-4 h-4"}),h(" Remove Friend ")],8,Y)):c("",!0)]),e("div",J,[e("div",O,[z,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>r.referees[s].first_name=a},null,8,G),[[_,r.referees[s].first_name]]),r.errors["referees."+s+".first_name"]?(t(),o("p",H,i(r.errors["referees."+s+".first_name"][0]),1)):c("",!0)]),e("div",K,[Q,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>r.referees[s].last_name=a},null,8,Z),[[_,r.referees[s].last_name]]),r.errors["referees."+s+".last_name"]?(t(),o("p",$,i(r.errors["referees."+s+".last_name"][0]),1)):c("",!0)])]),e("div",ee,[e("div",re,[se,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>r.referees[s].phone_number=a},null,8,te),[[_,r.referees[s].phone_number]]),r.errors["referees."+s+".phone_number"]?(t(),o("p",oe,i(r.errors["referees."+s+".phone_number"][0]),1)):c("",!0)]),e("div",le,[ne,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>r.referees[s].email=a},null,8,ie),[[_,r.referees[s].email]]),r.errors["referees."+s+".email"]?(t(),o("p",ce,i(r.errors["referees."+s+".email"][0]),1)):c("",!0)])])]))),128)),e("div",null,[e("div",me,[e("div",ae,[d(e("input",{type:"checkbox",class:"rounded-md border-grey mr-2","onUpdate:modelValue":l[2]||(l[2]=n=>r.permission=n)},null,512),[[x,r.permission]]),de]),r.errors.permission?(t(),o("p",_e,i(r.errors.permission[0]),1)):c("",!0)]),e("div",ue,[e("div",fe,[d(e("input",{type:"checkbox",class:"rounded-md border-grey mr-2","onUpdate:modelValue":l[3]||(l[3]=n=>r.terms=n)},null,512),[[x,r.terms]]),pe]),r.errors.terms?(t(),o("p",he,i(r.errors.terms[0]),1)):c("",!0)])])]),typeof r.errors=="string"?(t(),o("div",xe,[e("p",be,i(r.errors),1)])):c("",!0),e("div",ye,[e("button",{onClick:l[4]||(l[4]=p((...n)=>u.incrementFriends&&u.incrementFriends(...n),["prevent"])),class:"border-2 border-toolbar font-bold px-8 py-1.5 rounded-full my-2 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap md:w-1/2"}," + ADD MORE FRIENDS "),e("button",{type:"button",onClick:l[5]||(l[5]=p((...n)=>u.submitForm&&u.submitForm(...n),["prevent"])),class:"border-2 border-gold bg-gold font-bold px-8 py-1.5 rounded-full my-2 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap md:w-1/2"}," SUBMIT FRIENDS ")])]))])])]),_:1})}const Re=I(R,[["render",ke]]);export{Re as default};
