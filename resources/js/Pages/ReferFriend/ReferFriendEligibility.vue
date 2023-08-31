<script>
  import ReferFriendLayout from "../../Layouts/ReferFriendLayout.vue";
  export default {
    components: {
      ReferFriendLayout
    },
    data(){
      return {
      }
    },
    mounted() {
      window.addEventListener('message', this.handleIframeMessage);
    },
    methods: {
      handleIframeLoad() {
        const iframe = this.$refs.calculatorFrame;
        iframe.contentWindow.postMessage(
          { frameSrcHHC: window.location.href },
          '*'
        );
      },
      handleIframeMessage(event) {
        if (event.data) {
          const iframe = this.$refs.calculatorFrame;
          iframe.style.height = event.data;
        }
      },
    },
    beforeDestroy() {
      window.removeEventListener('message', this.handleIframeMessage);
    },
  }

</script>

<template>
  <ReferFriendLayout>
    <div class="mx-auto py-12">
      <div class="flex justify-center pt-5">
        <div class="text-center text-toolbar w-2/3">
          <h3 class="text-5xl font-bold font-merry">Find out if you're eligible</h3>
          <p class="my-4">
            Use our calculator to demonstrate how much home equity you could borrow and be one step closer to your reward.
          </p>
        </div>
      </div>
      <div class="flex justify-center pt-5">
        <div class="w-full">
          <iframe id="hhc-calculator-frame" @load="handleIframeLoad" ref="calculatorFrame"
            style="width: 100%; height: 462px;" src="https://householdcapital.com.au/wink-calculator-frame/" frameborder="0" scrolling="no">
          </iframe>
        </div>
      </div>
    </div>
  </ReferFriendLayout>
</template>