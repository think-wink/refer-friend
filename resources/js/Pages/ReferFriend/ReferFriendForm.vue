<script>
  import ReferFriendLayout from "../../Layouts/ReferFriendLayout.vue";
  import {CheckBadgeIcon, XCircleIcon} from "@heroicons/vue/24/outline";

  export default {
    props: ['uuid'],
    components: {
      ReferFriendLayout, CheckBadgeIcon, XCircleIcon
    },
    data(){
      return {
        friendsCount: 1,
        referrer_first_name: '',
        referrer_last_name: '',
        referees: [
          {
            first_name: '',
            last_name: '',
            phone_number: '',
            email: '',
          }
        ],
        terms: '',
        permission: '',
        errors: '',
        submitting: false,
        show_success_message: false
      }
    },
    methods: {
      incrementFriends(){
        this.friendsCount++;
        this.referees.push({
            first_name: '',
            last_name: '',
            phone_number: '',
            email: '',
        });
      },
      removeFriend(index){
        this.friendsCount--;
        this.referees.splice(index, 1);
      },
      async submitForm() {
        if (this.submitting) {
            return;
        }
        this.submitting = true;
        try {
            const response = await axios.post(`/api/referrer/${this.uuid}/referred/create`, {
                referrer_first_name: this.referrer_first_name,
                referrer_last_name: this.referrer_last_name,
                referees: this.referees,
                permission: this.permission,
                terms: this.terms
            });
            this.show_success_message = true;
            this.referees = [];
            this.terms = false;
            this.permission = false;
            this.errors = '';
            this.submitting = false;
        } catch (error) {
          this.submitting = false;
          // Handle errors here
          if (error.response && error.response.data) {
              this.errors = error.response.data.errors ? error.response.data.errors : error.response.data.error;
          } else {
              this.errors = 'An error occurred while submitting the form.';
          }
        }
      }
    }
  }
</script>

<template>
  <ReferFriendLayout>
    <div class="mx-auto py-12">

      <div class="flex justify-center pt-5">
        <div class="text-center text-toolbar w-2/3">
          <h3 class="text-5xl font-bold font-merry">Refer your friends to earn $250</h3>

          <p class="my-4">
            We’d love our valued customers to share their experience. We’re offering a referral reward for you and your friends if they also settle a loan with us. It’s simple to start the process. Just fill in the details below.
          </p>
        </div>
      </div>

      <div class="flex justify-center pt-5">
        <div class="w-1/2" v-if="!show_success_message">

          <div>

            <div class="grid grid-cols-1 lg:grid-cols-2 place-content-between mb-8">
                <div class="flex flex-col lg:mr-5 my-1">
                  <label class="required-label text-toolbar font-medium text-sm m-1">Your First Name</label>
                  <input type="text" class="rounded-2xl border-grey" v-model="referrer_first_name" />
                  <p class="text-red text-xs mt-1" v-if="errors['referrer_first_name']">{{ errors['referrer_first_name'][0] }}</p>
                </div>

                <div class="flex flex-col my-1">
                  <label class="required-label text-toolbar font-medium text-sm m-1">Your Last Name</label>
                  <input type="text" class="rounded-2xl border-grey" v-model="referrer_last_name" />
                  <p class="text-red text-xs mt-1" v-if="errors['referrer_last_name']">{{ errors['referrer_last_name'][0] }}</p>
                </div>
            </div>

            <div v-for="(referee, index) in friendsCount" :key="index" class="mb-5">

              <div class="flex justify-between">
                  <p class="font-medium text-toolbar text-lg">Friend {{ index === 0 ? '' : index+1 }} Details:</p>

                  <button type="button" class="text-red px-2 py-1 text-xs flex items-center" @click.prevent="removeFriend(index)" v-if="index !== 0">
                    <XCircleIcon class="w-4 h-4 " /> Remove Friend
                  </button>
              </div>

              <div class="grid grid-cols-1 lg:grid-cols-2 place-content-between lg:mb-2">

                <div class="flex flex-col lg:mr-5 my-1">
                  <label class="required-label text-toolbar font-medium text-sm m-1">Friend's First Name</label>
                  <input type="text" class="rounded-2xl border-grey" v-model="referees[index].first_name" />
                  <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.first_name']">{{ errors['referees.'+index+'.first_name'][0] }}</p>
                </div>

                <div class="flex flex-col my-1">
                  <label class="required-label text-toolbar font-medium text-sm m-1">Friend's Last Name</label>
                  <input type="text" class="rounded-2xl border-grey" v-model="referees[index].last_name" />
                  <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.last_name']">{{ errors['referees.'+index+'.last_name'][0] }}</p>
                </div>
              </div>

              <div class="grid grid-cols-1 lg:grid-cols-2">

                <div class="flex flex-col lg:mr-5 my-1">
                  <label class="required-label text-toolbar font-medium text-sm m-1">Friend's Phone Number</label>
                  <input type="text" class="rounded-2xl border-grey" v-model="referees[index].phone_number" />
                  <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.phone_number']">{{ errors['referees.'+index+'.phone_number'][0] }}</p>
                </div>

                <div class="flex flex-col my-1">
                  <label class="required-label text-toolbar font-medium text-sm m-1">Friend's Email</label>
                  <input type="text" class="rounded-2xl border-grey" v-model="referees[index].email" />
                  <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.email']">{{ errors['referees.'+index+'.email'][0] }}</p>
                </div>

              </div>
            </div>

            <div>
              <div class="flex flex-col mb-4">
                <div class="flex items-center">
                  <input type="checkbox" class="rounded-md border-grey mr-2" v-model="permission" />
                  <label class="text-sm text-toolbar">I confirm that know the person listed above and have their permission to submit their personal contact detals to this program.</label>
                </div>
                <p class="text-red text-xs mt-1" v-if="errors['permission']">{{ errors['permission'][0] }}</p>
              </div>

              <div class="flex flex-col">
                <div class="flex items-center">
                  <input type="checkbox" class="rounded-md border-grey mr-2" v-model="terms" />
                  <label class="required-label text-sm text-toolbar">
                    By providing your details, you agree to our <a class="underline" href="#">Terms of Use</a> and <a class="underline" href="#">Privacy and Credit Reporting Policy.</a>
                  </label>
                </div>
                <p class="text-red text-xs mt-1" v-if="errors['terms']">{{ errors['terms'][0] }}</p>
              </div>
            </div>
          </div>

          <div v-if="typeof errors === 'string'" class="p-2 pb-0 text-center">
            <p class="text-red text-xs mt-1"> {{ errors }} </p>
          </div>

          <div class="flex space-x-2 justify-center flex-col md:flex-row items-center mt-4">
            <button @click.prevent="incrementFriends" class="border-2 border-toolbar font-bold px-8 py-1.5 rounded-full my-2 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap md:w-1/2">
              + ADD MORE FRIENDS
            </button>
            <button type="button" @click.prevent="submitForm" class="border-2 border-gold bg-gold font-bold px-8 py-1.5 rounded-full my-2 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap md:w-1/2">
              SUBMIT FRIENDS
            </button>
          </div>
        </div>

        <div v-else class="flex items-center text-success font-bold text-lg">
          <CheckBadgeIcon />
          <p>The form has been submitted successfully</p>
        </div>

      </div>
    </div>
  </ReferFriendLayout>
</template>