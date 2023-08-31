<script>

  // import ReferFriendForm from "../Components/ReferFriend/ReferFriendForm.vue";
  // import ReferFriendEligible from "../Components/ReferFriend/ReferFriendEligible.vue";

  export default {
    // components: {ReferFriendForm, ReferFriendEligible},
    data() {
      return {
        current_page: '',
      }
    },
    methods:{
      setPage(){
        // let urlParts = window.location.href.split('/');
        // this.current_page = urlParts[urlParts.length - 1].split('?')[0];
      }
    },
    beforeMount() {
      this.setPage()
    }
  }

</script>

<template>
  <div class="h-screen w-screen font-mont">

    <div class="bg-toolbar text-white p-2 flex justify-end">

      <div class="flex justify-end items-center space-x-8 font-bold text-sm sectionSub">

        <div class="flex justify-end items-center space-x-8">
          <a href="https://householdcapital.com.au/about-us/" class="hover:underline decoration-gold">
            ABOUT US
          </a>
          <a href="https://householdcapital.com.au/frequently-asked-questions/" class="hover:underline decoration-gold">
            FAQ
          </a>
          <a href="https://householdcapital.com.au/about-us/customers/" class="hover:underline decoration-gold">
            CUSTOMER LOGIN
          </a>
          <a href="https://householdcapital.com.au/communications/" class="hover:underline decoration-gold">
            MEDIA
          </a>
        </div>

        <div class="ml-12 text-lg font-bold text-gold">
          <a href="#">
            1300 057 080
          </a>
        </div>
      </div>
    </div>

    <div class="bg-white">

      <div class="flex sectionSub py-5 link">

        <a href="https://householdcapital.com.au/">
          <img src="/img/household.svg" width="200px" alt="Household Image" />
        </a>

        <div class="p-4 flex space-x-12 font-bold">

          <div class="flex">
            <a href="https://householdcapital.com.au/loans/" class="hover:underline decoration-gold flex-grow">
              Products & Services
            </a>
            <a href="https://householdcapital.com.au/reverse-mortgage-interest-rates/" class="hover:underline decoration-gold flex-grow ml-4">
              Interest Rates
            </a>
            <a href="https://householdcapital.com.au/home-equity-calculators/" class="hover:underline decoration-gold flex-grow">
              Home Equity Calculator
            </a>
            <a href="https://householdcapital.com.au/publications/" class="hover:underline decoration-gold flex-grow">
              Guides, Publications & Testimonials
            </a>
            <a href="https://householdcapital.com.au/" class="hover:underline decoration-gold flex-grow">
              Professionals
            </a>
          </div>

          <div class="flex items-center">
            <a href="https://householdcapital.com.au/reverse-mortgage-calculator/">
              <button type="button" class="bg-gold rounded-full px-3 py-1 font-bold hover:bg-hover hover:text-white whitespace-nowrap">
                Get Started
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-toolbar pb-10 relative">
      <img alt="" :src=" '/img/' + (current_page === 'refer-friend-form' ? 'refer-page-form.jpg': 'refer-page-eligibility.jpg')" class="cover-image">

      <div class="absolute top-0 left-64 bottom-0 flex flex-col justify-center text-left text-white font-bold font-merry">
        <template v-if="current_page === 'refer-friend-eligibility'">
          <h3 class="text-6xl">You've been referred,</h3>
          <h3 class="text-6xl">now be rewarded</h3>
          <p class="text-xl">Check eligibility and apply today</p>
        </template>
        <template v-else>
          <h3 class="text-6xl">Refer your</h3>
          <h3 class="text-6xl">friends</h3>
          <p class="text-xl">Tell others and be rewarded</p>
        </template>
      </div>
    </div>

    <div class="w-full bg-white">
      <div class="sectionSub">
        <slot />
      </div>
    </div>

    <div class="bg-grey-light">

      <div class="sectionSub py-6">

        <h3 class="text-center mb-4 font-merry text-5xl">Find out more</h3>

        <div class="grid grid-cols-2 w-8/12 mx-auto">

          <div class="flex flex-row mr-5">
            <div class="flex">
              <img src="/img/footer-pic.png" alt="info icon" class="self-center" />
            </div>
            <div class="px-5">
              <h4>FAQs</h4>
              <p class="text-sm"> Learn More about referrals and view frequently asked questions</p>
            </div>
          </div>

          <div class="flex flex-row">
            <div class="flex">
              <img src="/img/footer-pic2.png" alt="info icon" class="self-center" />
            </div>
            <div class="px-5">
              <h4>Terms and Conditions</h4>
              <p class="text-sm">View the program Terms and Conditions</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-toolbar pt-6">
      <div class="sectionSub text-white mt-6">

        <div class="grid grid-cols-5">
          <div class="mr-8">
            <p class="text-xl font-bold">Loans</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-bold">
              <a href="https://householdcapital.com.au/household-loan/">Household Loan</a>
              <a href="https://householdcapital.com.au/refinance-home-loan/">Refinance Home Loan</a>
              <a href="https://householdcapital.com.au/loans/">Compare Loans</a>
              <a href="https://householdcapital.com.au/pension-loan-scheme-alt/">Home Equity Access Scheme</a>
            </div>
          </div>

          <div class="mr-8">
            <p class="text-xl font-bold">Uses</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-bold">
              <a href="https://householdcapital.com.au/lifestyle-expenses/">Live</a>
              <a href="https://householdcapital.com.au/refinance-home-loan/">Refinance Home Loan</a>
              <a href="https://householdcapital.com.au/superannuation-top-up/">Super Top Up</a>
              <a href="https://householdcapital.com.au/aged-care-funding/">Aged Care Funding</a>
              <a href="https://householdcapital.com.au/bank-mum-dad/">Bank of Mum & Dad</a>
            </div>
          </div>

          <div class="mr-8">
            <p class="text-xl font-bold">Information</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-bold">
               <a href="https://householdcapital.com.au/customer-testimonials/">Customer Testimonials</a>
               <a href="https://householdcapital.com.au/publications/">Guides</a>
               <a href="https://householdcapital.com.au/third-pillar-forum/">Three Pillars Forum</a>
               <a href="https://householdcapital.com.au/frequently-asked-questions/">FAQs</a>
            </div>
          </div>

          <div class="mr-8">
            <p class="text-xl font-bold">About</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-bold">
               <a href="https://householdcapital.com.au/contact/">Contact Us</a>
               <a href="https://householdcapital.com.au/about-us/">About Us</a>
               <a href="https://householdcapital.com.au/about-us/reviews/">Reviews</a>
               <a href="https://householdcapital.com.au/about-us/customers/">Customers</a>
               <a href="https://householdcapital.com.au/corporate/">Corporate</a>
               <a href="https://householdcapital.com.au/partners/advisers/">Financial Advisers & Professionals</a>
            </div>
          </div>

          <div class="font-bold text-center">
            <a href="https://householdcapital.com.au/schedule-a-call/">
              <button class="border-2 border-white px-8 py-1.5 rounded-full w-48 mt-8 mb-4 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap">
                Book a Call
              </button>
            </a>
            <a href="https://householdcapital.com.au/reverse-mortgage-calculator/">
              <button class="border-2 border-white px-8 py-1.5 rounded-full w-48 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap">
                Calculate Equity
              </button>
            </a>
          </div>
        </div>

        <div class="border-t border-grey p-2 mt-2 pb-4 flex flex-row">
          <div class="flex-1">
            <p class="p5 text-grey">
              Household Capital Pty Limited ACN 618 068 214  is the issuer of the information on this website.
              Household Capital Pty Limited is a credit representative (512757) of Mortgage Direct Pty Limited ACN 075 721 434, Australian Credit Licence 391876.
              HOUSEHOLD CAPITAL, HOUSEHOLD TRANSFER, LIVE WELL AT HOME and the Star Device are trademarks of Household Capital Pty Ltd.
            </p>
          </div>
          <div class="flex-1 flex justify-end">
            <div>
              <p class="text-xl font-bold">Connect</p>

              <div class="flex flex-row space-x-8 mt-2 ml-8">
                <a href="https://www.facebook.com/HouseholdCap?_gl=1*neqiq*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="https://householdcapital.com.au/wp-content/uploads/2020/08/social-media-facebook.png" alt="social-media-facebook" title="social-media-facebook" />
                </a>
                <a href="https://twitter.com/HouseholdCapit1?_gl=1*neqiq*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="https://householdcapital.com.au/wp-content/uploads/2020/08/social-media-twitter.png" alt="social-media-twitter" title="social-media-twitter" />
                </a>
                <a href="http://www.linkedin.com/company/household-capital/?_gl=1*17jo4h9*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="https://householdcapital.com.au/wp-content/uploads/2020/08/social-media-linkedin.png" alt="social-media-linkedin" title="social-media-linkedin" />
                </a>
                <a href="https://www.youtube.com/channel/UC0i5Trr2mDYi_T47LwcX4cQ?_gl=1*17jo4h9*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="https://householdcapital.com.au/wp-content/uploads/2020/08/social-media-youtube.png" alt="social-media-youtube" title="social-media-youtube" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="bg-footer">

      <div class="flex justify-center flex-col items-center sectionSub p-4 font-bold text-grey-dark">

        <div class="flex align-center whitespace-nowrap my-5 text-xs">

          <a class="p-1 underline" href="https://householdcapital.com.au/sitemap/">
            Sitemap
          </a>
          <p class="p-1">
            |
          </p>
          <a class="p-1 underline" href="https://householdcapital.com.au/website-privacy-policy/">
            Website Terms of Use
          </a>
          <p class="p-1">
            |
          </p>
          <a class="p-1 underline" href="https://householdcapital.com.au/privacy-credit-reporting-policy/">
            Privacy and Credit Reporting Policy
          </a>
          <p class="p-1">
            |
          </p>
          <a class="p-1 underline" href="https://householdcapital.com.au/wp-content/uploads/2023/03/HHC-Target-Market-Determination-Policy.pdf">
            Target Market Determination
          </a>
          <p class="p-1">
            |
          </p>
          <a class="p-1 underline" href="https://householdcapital.com.au/wp-content/uploads/2021/10/HHC-Public-Complaints-Policy.pdf">
            Public Complaints Policy
          </a>
        </div>

        <div class="text-sm">
          <p>
            Copyright Household Capital™ 2023
          </p>
        </div>

      </div>

    </div>

  </div>
</template>

<style>

  .sectionSub {
    margin-left: auto;
    margin-right: auto;
    min-width: 1200px;
    max-width: 1200px;
  }

  .link{
    color: #19263f;
  }

  .p5 {
    font-size: 10px;
    color: #fff;
  }

  h3 {
    font-size: 32px;
    font-weight: bold;
  }

  h4 {
    font-size: 20px;
    font-weight: bold;
  }

  h6 {
    font-size: 2em;
  }

  .cover-image{
    object-fit: cover;
    width: 100%;
    height: 521px;
  }

</style>