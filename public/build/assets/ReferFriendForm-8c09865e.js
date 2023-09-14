import{R as k}from"./ReferFriendLayout-ff8d9be6.js";import{c as w,X as F}from"./index-f0515acb.js";import{c as C,w as V,r as f,o as t,b as e,n as o,x as d,y as _,t as i,u as c,F as U,q as N,B as x,N as p,d as b,e as h}from"./app-6671a1a6.js";import{_ as I}from"./_plugin-vue_export-helper-c27b6911.js";const R={props:["uuid"],components:{ReferFriendLayout:k,CheckBadgeIcon:w,XCircleIcon:F},data(){return{friendsCount:1,referrer_first_name:"",referrer_last_name:"",referees:[{first_name:"",last_name:"",phone_number:"",email:""}],terms:"",permission:"",errors:"",submitting:!1,show_success_message:!1}},methods:{incrementFriends(){this.friendsCount++,this.referees.push({first_name:"",last_name:"",phone_number:"",email:""})},removeFriend(m){this.friendsCount--,this.referees.splice(m,1)},async submitForm(){if(!this.submitting){this.submitting=!0;try{const m=await axios.post(`/api/referrer/${this.uuid}/referred/create`,{referrer_first_name:this.referrer_first_name,referrer_last_name:this.referrer_last_name,referees:this.referees,permission:this.permission,terms:this.terms});this.show_success_message=!0,this.referees=[],this.terms=!1,this.permission=!1,this.errors="",this.submitting=!1}catch(m){this.submitting=!1,m.response&&m.response.data?this.errors=m.response.data.errors?m.response.data.errors:m.response.data.error:this.errors="An error occurred while submitting the form."}}}}},B={class:"mx-auto py-12"},q=e("div",{class:"flex justify-center pt-5"},[e("div",{class:"text-center text-toolbar w-2/3"},[e("h3",{class:"text-5xl font-bold font-merry"},"Refer your friends to earn $250"),e("p",{class:"my-4"}," We’d love our valued customers to share their experience. We’re offering a referral reward for you and your friends if they also settle a loan with us. It’s simple to start the process. Just fill in the details below. ")])],-1),D={class:"flex justify-center pt-5"},L={key:0,class:"w-1/2"},E={class:"grid grid-cols-1 lg:grid-cols-2 place-content-between mb-8"},M={class:"flex flex-col lg:mr-5 my-1"},T=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Your First Name",-1),j={key:0,class:"text-red text-xs mt-1"},S={class:"flex flex-col my-1"},X=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Your Last Name",-1),P={key:0,class:"text-red text-xs mt-1"},A={class:"flex justify-between"},W={class:"font-medium text-toolbar text-lg"},Y=["onClick"],J={class:"grid grid-cols-1 lg:grid-cols-2 place-content-between lg:mb-2"},O={class:"flex flex-col lg:mr-5 my-1"},z=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's First Name",-1),G=["onUpdate:modelValue"],H={key:0,class:"text-red text-xs mt-1"},K={class:"flex flex-col my-1"},Q=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's Last Name",-1),Z=["onUpdate:modelValue"],$={key:0,class:"text-red text-xs mt-1"},ee={class:"grid grid-cols-1 lg:grid-cols-2"},se={class:"flex flex-col lg:mr-5 my-1"},re=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's Phone Number",-1),te=["onUpdate:modelValue"],oe={key:0,class:"text-red text-xs mt-1"},le={class:"flex flex-col my-1"},ne=e("label",{class:"required-label text-toolbar font-medium text-sm m-1"},"Friend's Email",-1),ie=["onUpdate:modelValue"],ce={key:0,class:"text-red text-xs mt-1"},me={class:"flex flex-col mb-4"},ae={class:"flex items-center"},de=e("label",{class:"text-sm text-toolbar"},"I confirm that know the person listed above and have their permission to submit their personal contact details to this program.",-1),_e={key:0,class:"text-red text-xs mt-1"},ue={class:"flex flex-col"},fe={class:"flex items-center"},pe=e("label",{class:"required-label text-sm text-toolbar"},[h(" By providing your details, you agree to our "),e("a",{class:"underline",href:"https://householdcapital.com.au/website-privacy-policy/",target:"_blank"},"Terms of Use"),h(" and "),e("a",{class:"underline",href:"https://householdcapital.com.au/privacy-credit-reporting-policy/",target:"_blank"},"Privacy and Credit Reporting Policy.")],-1),he={key:0,class:"text-red text-xs mt-1"},xe={key:0,class:"p-2 pb-0 text-center"},be={class:"text-red text-xs mt-1"},ye={class:"flex space-x-2 justify-center flex-col md:flex-row items-center mt-4"},ge={key:1,class:"flex items-center text-success font-bold text-lg"},ve=e("p",null,"The form has been submitted successfully",-1);function ke(m,l,we,Fe,s,u){const y=f("XCircleIcon"),g=f("CheckBadgeIcon"),v=f("ReferFriendLayout");return t(),C(v,null,{default:V(()=>[e("div",B,[q,e("div",D,[s.show_success_message?(t(),o("div",ge,[b(g),ve])):(t(),o("div",L,[e("div",null,[e("div",E,[e("div",M,[T,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":l[0]||(l[0]=n=>s.referrer_first_name=n)},null,512),[[_,s.referrer_first_name]]),s.errors.referrer_first_name?(t(),o("p",j,i(s.errors.referrer_first_name[0]),1)):c("",!0)]),e("div",S,[X,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":l[1]||(l[1]=n=>s.referrer_last_name=n)},null,512),[[_,s.referrer_last_name]]),s.errors.referrer_last_name?(t(),o("p",P,i(s.errors.referrer_last_name[0]),1)):c("",!0)])]),(t(!0),o(U,null,N(s.friendsCount,(n,r)=>(t(),o("div",{key:r,class:"mb-5"},[e("div",A,[e("p",W,"Friend "+i(r===0?"":r+1)+" Details:",1),r!==0?(t(),o("button",{key:0,type:"button",class:"text-red px-2 py-1 text-xs flex items-center",onClick:p(a=>u.removeFriend(r),["prevent"])},[b(y,{class:"w-4 h-4"}),h(" Remove Friend ")],8,Y)):c("",!0)]),e("div",J,[e("div",O,[z,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>s.referees[r].first_name=a},null,8,G),[[_,s.referees[r].first_name]]),s.errors["referees."+r+".first_name"]?(t(),o("p",H,i(s.errors["referees."+r+".first_name"][0]),1)):c("",!0)]),e("div",K,[Q,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>s.referees[r].last_name=a},null,8,Z),[[_,s.referees[r].last_name]]),s.errors["referees."+r+".last_name"]?(t(),o("p",$,i(s.errors["referees."+r+".last_name"][0]),1)):c("",!0)])]),e("div",ee,[e("div",se,[re,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>s.referees[r].phone_number=a},null,8,te),[[_,s.referees[r].phone_number]]),s.errors["referees."+r+".phone_number"]?(t(),o("p",oe,i(s.errors["referees."+r+".phone_number"][0]),1)):c("",!0)]),e("div",le,[ne,d(e("input",{type:"text",class:"rounded-2xl border-grey","onUpdate:modelValue":a=>s.referees[r].email=a},null,8,ie),[[_,s.referees[r].email]]),s.errors["referees."+r+".email"]?(t(),o("p",ce,i(s.errors["referees."+r+".email"][0]),1)):c("",!0)])])]))),128)),e("div",null,[e("div",me,[e("div",ae,[d(e("input",{type:"checkbox",class:"rounded-md border-grey mr-2","onUpdate:modelValue":l[2]||(l[2]=n=>s.permission=n)},null,512),[[x,s.permission]]),de]),s.errors.permission?(t(),o("p",_e,i(s.errors.permission[0]),1)):c("",!0)]),e("div",ue,[e("div",fe,[d(e("input",{type:"checkbox",class:"rounded-md border-grey mr-2","onUpdate:modelValue":l[3]||(l[3]=n=>s.terms=n)},null,512),[[x,s.terms]]),pe]),s.errors.terms?(t(),o("p",he,i(s.errors.terms[0]),1)):c("",!0)])])]),typeof s.errors=="string"?(t(),o("div",xe,[e("p",be,i(s.errors),1)])):c("",!0),e("div",ye,[e("button",{onClick:l[4]||(l[4]=p((...n)=>u.incrementFriends&&u.incrementFriends(...n),["prevent"])),class:"border-2 border-toolbar font-bold px-8 py-1.5 rounded-full my-2 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap md:w-1/2"}," + ADD MORE FRIENDS "),e("button",{type:"button",onClick:l[5]||(l[5]=p((...n)=>u.submitForm&&u.submitForm(...n),["prevent"])),class:"border-2 border-gold bg-gold font-bold px-8 py-1.5 rounded-full my-2 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap md:w-1/2"}," SUBMIT FRIENDS ")])]))])])]),_:1})}const Ie=I(R,[["render",ke]]);export{Ie as default};