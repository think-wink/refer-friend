<script>

  export default {

    data(){
      return {
        friendsCount: 1,
      }
    },
    methods: {
      incrementFriends(){
        this.friendsCount++;
      },
      submitForm(){
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
          <div v-for="(friend, index) in friendsCount" :key="index" class="mb-5">

            <p v-if="friend !== 1" class="font-bold text-toolbar: text-lg">Friend {{ friend }} Details:</p>

            <div class="grid grid-cols-2 place-content-between mb-2">

              <div class="flex flex-col mr-5">
                <label class="required-label text-toolbar font-bold text-sm">Friend's First Name</label>
                <input type="text" class="rounded-2xl border-grey"/>
              </div>

              <div class="flex flex-col">
                <label class="required-label text-toolbar font-bold text-sm">Friend's Last Name</label>
                <input type="text" class="rounded-2xl border-grey"/>
              </div>

            </div>

            <div class="grid grid-cols-2">

              <div class="flex flex-col mr-5">
                <label class="required-label text-toolbar font-bold text-sm">Friend's Phone Name</label>
                <input type="text" class="rounded-2xl border-grey"/>
              </div>

              <div class="flex flex-col">
                <label class="required-label text-toolbar font-bold text-sm">Friend's Email Name</label>
                <input type="text" class="rounded-2xl border-grey"/>
              </div>

            </div>
          </div>

          <div>
            <div class="mb-4 flex items-center">
              <input type="checkbox" class="rounded-md border-grey mr-2" />
              <label class="text-sm text-toolbar">I confirm that know the person listed above and have their permission to submit their personal contact detals to this program.</label>
            </div>

            <div class="flex items-center">
              <input type="checkbox" class="rounded-md border-grey mr-2" />
              <label class="required-label text-sm text-toolbar">By providing your details, you agree to our <a class="underline" href="#">Terms of Use</a> and <a class="underline" href="#">Privacy and Credit Reporting Policy.</a></label>
            </div>
          </div>

        </form>

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