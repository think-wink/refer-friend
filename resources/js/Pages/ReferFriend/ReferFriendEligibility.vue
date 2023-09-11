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

          <p class="mt-4 mb-8">
            Household Capital is a specialist financial firm that provides Australia’s retirees with access to home equity – their Household CapitalTM – to improve long term retirement funding. Providing access to home equity enables us to execute on our mission; to help retired Australians Live Well At HomeTM. Using your Household CapitalTM, you can access capital, an income stream, or a mix of the two. In short, you can tailor your retirement funding to best suit your requirements. This provides you with the flexibility, confidence and choice to meet your retirement needs and make decisions about your lifestyle. Your family home can be both the best place to live and the right way to fund retirement.
          </p>

          <p class="my-8">
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
      <div class="my-8 text-center">
        <h3 class="text-xl">Here’s how Lynne and her friends have used their home equity to achieve a comfortable retirement and be financially secure.</h3>
        <div>
          <iframe class="mx-auto my-8" width="560" height="315" src="https://www.youtube.com/embed/8Czho7sfH8I?si=37_3qkXK1Rt3qKyB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </ReferFriendLayout>
</template>