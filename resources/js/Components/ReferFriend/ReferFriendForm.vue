<script>
  export default {
    // props: ['uuid'],
    data(){
      return {
        uuid: '',
        friendsCount: 1,
        referees: [
          {
            first_name: '',
            last_name: '',
            phone_number: '',
            email: '',
          }
        ],
        terms: '',
        errors: '',
      }
    },
    beforeMount() {
        let urlParts = window.location.href.split('/');
        this.uuid = urlParts[urlParts.length - 1].split('?')[0];
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

        // Remove objects by name, the error messages

      },
      async submitForm(){
        axios
            .post(`/api/referrer/${this.uuid}/referred/create`, {
              referees: this.referees,
              terms: this.terms
            })
            .then((response) => {
            //  this.errors = '';
            })
            .catch((errors) => {
              this.errors = errors.response.data.errors ? errors.response.data.errors : errors.response.data.error;
            })
      }
    }

  }

</script>

<template>
  <div class="mx-auto py-12">

    <div class="flex justify-center pt-5">
      <div class="text-center text-toolbar w-2/3">
        <h3 class="text-5xl font-bold font-merry">Refer your friends to earn up to $500</h3>

        <p class="my-4">
          Refer as many friends as you like and if they are approved for a Household Loan, you'll both receive up to $500 to spend on whatever you like!
        </p>
        <p class="my-6">
          Simply provide your friends details below and we'll take care of the rest. It's that simple!
        </p>
      </div>
    </div>

    <div class="flex justify-center pt-5">
      <div class="w-1/2">

        <form>
          <div v-for="(referee, index) in friendsCount" :key="index" class="mb-5">

            <div v-if="index !== 0" class="flex justify-between">
                <p class="font-bold text-toolbar: text-lg">Friend {{ index+1 }} Details:</p>

                <button type="button" class="border-2 border-red rounded-full px-2 py-1 text-xs text-toolbar" @click.prevent="removeFriend(index)">Remove Friend</button>
            </div>

            <div class="grid grid-cols-2 place-content-between mb-2">

              <div class="flex flex-col mr-5">
                <label class="required-label text-toolbar font-bold text-sm">Friend's First Name</label>
                <input type="text" class="rounded-2xl border-grey" v-model="referees[index].first_name" />
                <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.first_name']">{{ errors['referees.'+index+'.first_name'][0] }}</p>
              </div>

              <div class="flex flex-col">
                <label class="required-label text-toolbar font-bold text-sm">Friend's Last Name</label>
                <input type="text" class="rounded-2xl border-grey" v-model="referees[index].last_name" />
                <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.last_name']">{{ errors['referees.'+index+'.last_name'][0] }}</p>
              </div>

            </div>

            <div class="grid grid-cols-2">

              <div class="flex flex-col mr-5">
                <label class="required-label text-toolbar font-bold text-sm">Friend's Phone Number</label>
                <input type="text" class="rounded-2xl border-grey" v-model="referees[index].phone_number" />
                <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.phone_number']">{{ errors['referees.'+index+'.phone_number'][0] }}</p>
              </div>

              <div class="flex flex-col">
                <label class="required-label text-toolbar font-bold text-sm">Friend's Email</label>
                <input type="text" class="rounded-2xl border-grey" v-model="referees[index].email" />
                <p class="text-red text-xs mt-1" v-if="errors['referees.'+index+'.email']">{{ errors['referees.'+index+'.email'][0] }}</p>
              </div>

            </div>
          </div>

          <div>
            <div class="mb-4 flex items-center">
              <input type="checkbox" class="rounded-md border-grey mr-2" />
              <label class="text-sm text-toolbar">I confirm that know the person listed above and have their permission to submit their personal contact detals to this program.</label>
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
        </form>

        <div v-if="typeof errors === 'string'" class="p-2 pb-0 text-center">
          <p class="text-red text-xs mt-1"> {{ errors }} </p>
        </div>

        <div class="flex space-x-2 justify-center">

          <button @click.prevent="incrementFriends" class="border-2 border-toolbar font-bold px-8 py-1.5 rounded-full mt-8 mb-4 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap">
            + ADD MORE FRIENDS
          </button>

          <button @click.prevent="submitForm()" class="border-2 border-gold bg-gold font-bold px-8 py-1.5 rounded-full mt-8 mb-4 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap">
            SUBMIT FRIENDS
          </button>

        </div>

      </div>

    </div>

  </div>
</template>