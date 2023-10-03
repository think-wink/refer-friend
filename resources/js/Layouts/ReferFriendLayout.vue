<script>
  import {Bars3Icon, ChevronRightIcon} from "@heroicons/vue/24/outline";

  export default {
    components: {Bars3Icon, ChevronRightIcon},
    data() {
      return {
        current_page: '',
        menu_active: false
      }
    },
    methods:{
      setPage(){
        let urlParts = window.location.href.split('/');
        this.current_page = urlParts[urlParts.length - 1].split('?')[0];
      }
    },
    beforeMount() {
      this.setPage()
    }
  }

</script>

<template>
  <div class="h-screen w-full font-mont">

    <div class="bg-toolbar text-white p-2 flex justify-end hidden lg:block">

      <div class="flex justify-end items-center space-x-8 font-medium text-sm sectionSub">

        <div class="flex justify-end items-center space-x-8 mr-20">
          <a href="https://householdcapital.com.au/about-us/" class="hover:underline decoration-gold underline-offset-4">
            ABOUT US
          </a>
          <a href="https://householdcapital.com.au/frequently-asked-questions/" class="hover:underline decoration-gold underline-offset-4">
            FAQ
          </a>
          <a href="https://householdcapital.com.au/about-us/customers/" class="hover:underline decoration-gold underline-offset-4">
            CUSTOMER LOGIN
          </a>
          <a href="https://householdcapital.com.au/communications/" class="hover:underline decoration-gold underline-offset-4">
            MEDIA
          </a>
        </div>

        <div class="text-lg font-medium text-gold px-8">
          <a href="#">
            1300 057 080
          </a>
        </div>
      </div>
    </div>

    <div class="bg-white">

      <div class="flex sectionSub py-5 px-4 justify-between lg:justify-center items-center mx-auto">
        <div class="lg:hidden block text-sm">
          <a href="tel:1300057080" class="font-bold">
            <img alt="call-icon" src="	https://householdcapital.com.au/wp-content/themes/hhctheme/images/call-icon.svg" width="24" height="24" />
            Call
          </a>
        </div>

        <a href="https://householdcapital.com.au/">
          <img src="/img/refer/header.png" class="w-52 lg:w-72" alt="Household Image" />
        </a>

        <div class="lg:hidden block font-bold text-sm" >
          <button type="button" @click.prevent="menu_active = !menu_active">
            <Bars3Icon class="w-8 h-8 stroke-2 mx-auto" />
            Menu
          </button>
        </div>

        <div class="hidden lg:block">
          <div class="p-4 flex flex-row flex-grow space-x-12 font-medium">
            <div class="flex">
              <a href="https://householdcapital.com.au/loans/" class="hover:underline decoration-gold px-2 underline-offset-2">
                Products & Services
              </a>
              <a href="https://householdcapital.com.au/reverse-mortgage-interest-rates/" class="hover:underline decoration-gold px-2 underline-offset-2">
                Interest Rates
              </a>
              <a href="https://householdcapital.com.au/home-equity-calculators/" class="hover:underline decoration-gold px-2 underline-offset-2">
                Home Equity Calculator
              </a>
              <a href="https://householdcapital.com.au/publications/" class="hover:underline decoration-gold px-2 underline-offset-2">
                Guides, Publications & Testimonials
              </a>
              <a href="https://householdcapital.com.au/" class="hover:underline decoration-gold px-2 underline-offset-2">
                Professionals
              </a>
            </div>

            <div class="flex items-top">
              <a href="https://householdcapital.com.au/reverse-mortgage-calculator/">
                <button type="button" class="bg-gold rounded-full px-3 py-2 font-bold hover:bg-hover hover:text-white whitespace-nowrap">
                  Get Started
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="menu" :class="menu_active ? '' : 'hidden'">
        <div>
          <div class="flex flex-col font-medium text-xl text-toolbar px-6 py-2">
            <a href="https://householdcapital.com.au/loans/" class="hover:underline decoration-gold py-3 flex items-center justify-between">
              Products & Services
              <ChevronRightIcon class="w-6 h-6 stroke-2" />
            </a>
            <a href="https://householdcapital.com.au/reverse-mortgage-interest-rates/" class="hover:underline decoration-gold py-3">
              Interest Rates
            </a>
            <a href="https://householdcapital.com.au/home-equity-calculators/" class="hover:underline decoration-gold py-3">
              Home Equity Calculator
            </a>
            <a href="https://householdcapital.com.au/publications/" class="hover:underline decoration-gold py-3 flex items-center justify-between">
              Guides, Publications & Testimonials
              <ChevronRightIcon class="w-6 h-6 stroke-2" />
            </a>
            <a href="https://householdcapital.com.au/" class="hover:underline decoration-gold py-3 flex items-center justify-between">
              Professionals
              <ChevronRightIcon class="w-6 h-6 stroke-2" />
            </a>
            <a href="https://householdcapital.com.au/contact/" class="hover:underline decoration-gold py-3">
              Contact Us
            </a>
          </div>
          <div class="flex flex-col bg-grey-light py-2">
            <a href="https://householdcapital.com.au/about-us/" class="hover:underline decoration-gold py-3 px-6">
              ABOUT US
            </a>
            <a href="https://householdcapital.com.au/frequently-asked-questions/" class="hover:underline decoration-gold py-3 px-6">
              FAQ
            </a>
            <a href="https://householdcapital.com.au/about-us/customers/" class="hover:underline decoration-gold py-3 px-6">
              CUSTOMER LOGIN
            </a>
            <a href="https://householdcapital.com.au/communications/" class="hover:underline decoration-gold py-3 px-6">
              MEDIA
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-toolbar pb-10 relative flex justify-center">
      <img alt="" :src="'/img/refer/' + (current_page === 'refer-friend-eligibility' ? 'refer-page-eligibility.jpg' : 'refer-page-form.jpg')" class="cover-image">

      <div class="absolute top-0 bottom-0 sectionSub flex flex-col justify-center items-center md:items-start text-white font-bold font-merry text-center">
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
      <div class="sectionSub mx-auto">
        <slot />
      </div>
    </div>

    <div class="bg-grey-light">

      <div class="sectionSub py-6 mx-auto text-toolbar">

        <h3 class="text-center mb-4 font-merry text-5xl font-bold">Find out more</h3>

        <div class="grid grid-cols-1 lg:grid-cols-2 w-8/12 mx-auto">

            <a href="/faqs" class="flex flex-row justify-center lg:justify-end lg:mr-5 mb-4 lg:mb-0">
              <div class="flex">
                <img src="/img/refer/pre-footer-1.png" alt="info icon" class="self-center" />
              </div>
              <div class="px-5">
                <h4 class="text-xl font-bold">FAQs</h4>
                <p class="text-sm"> Learn More about referrals and view frequently asked questions</p>
              </div>
            </a>

            <a href="/terms" class="flex flex-row justify-center lg:justify-end ">
              <div class="flex">
                <img src="/img/refer/pre-footer-2.png" alt="info icon" class="self-center" />
              </div>
              <div class="px-5">
                <h4 class="text-xl font-bold">Terms and Conditions</h4>
                <p class="text-sm">View the program Terms and Conditions</p>
              </div>
            </a>
        </div>
      </div>
    </div>

    <div class="bg-toolbar pt-6">
      <div class="sectionSub text-white mt-6 mx-auto">

        <div class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-4 text-center md:text-left">
          <div class="mx-8">
            <p class="text-xl font-medium">Loans</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-medium">
              <a href="https://householdcapital.com.au/household-loan/">Household Loan</a>
              <a href="https://householdcapital.com.au/refinance-home-loan/">Refinance Home Loan</a>
              <a href="https://householdcapital.com.au/loans/">Compare Loans</a>
              <a href="https://householdcapital.com.au/pension-loan-scheme-alt/">Home Equity Access Scheme</a>
            </div>
          </div>

          <div class="md:mr-8 mx-8">
            <p class="text-xl font-medium">Uses</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-medium">
              <a href="https://householdcapital.com.au/lifestyle-expenses/">Live</a>
              <a href="https://householdcapital.com.au/refinance-home-loan/">Refinance Home Loan</a>
              <a href="https://householdcapital.com.au/superannuation-top-up/">Super Top Up</a>
              <a href="https://householdcapital.com.au/aged-care-funding/">Aged Care Funding</a>
              <a href="https://householdcapital.com.au/bank-mum-dad/">Bank of Mum & Dad</a>
            </div>
          </div>

          <div class="md:mr-8 mx-8">
            <p class="text-xl font-medium">Information</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-medium">
               <a href="https://householdcapital.com.au/customer-testimonials/">Customer Testimonials</a>
               <a href="https://householdcapital.com.au/publications/">Guides</a>
               <a href="https://householdcapital.com.au/third-pillar-forum/">Three Pillars Forum</a>
               <a href="https://householdcapital.com.au/frequently-asked-questions/">FAQs</a>
            </div>
          </div>

          <div class="md:mr-8 mx-8">
            <p class="text-xl font-medium">About</p>
            <div class="flex flex-col mt-2 text-grey-subLight font-medium">
               <a href="https://householdcapital.com.au/contact/">Contact Us</a>
               <a href="https://householdcapital.com.au/about-us/">About Us</a>
               <a href="https://householdcapital.com.au/about-us/reviews/">Reviews</a>
               <a href="https://householdcapital.com.au/about-us/customers/">Customers</a>
               <a href="https://householdcapital.com.au/corporate/">Corporate</a>
               <a href="https://householdcapital.com.au/partners/advisers/">Financial Advisers & Professionals</a>
            </div>
          </div>

          <div class="font-medium text-center md:col-span-2 lg:col-span-1">
            <a href="https://householdcapital.com.au/schedule-a-call/" class="m-1">
              <button class="border-2 border-white px-8 py-1.5 rounded-full w-48 mt-8 mb-4 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap">
                Book a Call
              </button>
            </a>
            <a href="https://householdcapital.com.au/reverse-mortgage-calculator/" class="m-1">
              <button class="border-2 border-white px-8 py-1.5 rounded-full w-48 hover:bg-hover hover:font-white hover:border-hover whitespace-nowrap">
                Calculate Equity
              </button>
            </a>
          </div>
        </div>

        <div class="border-t border-grey p-2 mt-2 mx-6 pb-4 flex lg:flex-row flex-col">
          <div class="flex-1">
            <p class="text-grey text-xs">
              Household Capital Pty Limited ACN 618 068 214 is the issuer of the information on this website. Household Capital Pty Limited holds and Australian Credit Licence number of 545906 and is servicer for the credit provider Household Capital Services Pty Ltd. HOUSEHOLD CAPITAL, HOUSEHOLD TRANSFER, LIVE WELL AT HOME and the Star Device are trademarks of Household Capital Pty Ltd.
            </p>
          </div>
          <div class="flex-1 flex justify-center lg:justify-end mt-6 lg:mt-0">
            <div>
              <p class="text-xl font-medium">Connect</p>

              <div class="flex flex-row space-x-8 mt-2 ml-8">
                <a href="https://www.facebook.com/HouseholdCap?_gl=1*neqiq*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="/img/icons/facebook.png" alt="social-media-facebook" title="social-media-facebook" />
                </a>
                <a href="https://twitter.com/HouseholdCapit1?_gl=1*neqiq*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="/img/icons/twitter.png" alt="social-media-twitter" title="social-media-twitter" />
                </a>
                <a href="http://www.linkedin.com/company/household-capital/?_gl=1*17jo4h9*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="/img/icons/linkedin.png" alt="social-media-linkedin" title="social-media-linkedin" />
                </a>
                <a href="https://www.youtube.com/channel/UC0i5Trr2mDYi_T47LwcX4cQ?_gl=1*17jo4h9*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                  <img src="/img/icons/youtube.png" alt="social-media-youtube" title="social-media-youtube" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="bg-footer">

      <div class="flex justify-center flex-col items-center sectionSub p-4 font-medium text-grey-dark mx-auto">

        <div class="flex flex-col md:flex-row  align-center whitespace-nowrap my-5 text-xs text-center">

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
    min-width: 80%;
    max-width: 1200px;
  }

  .cover-image {
    height: 521px;
    width: 100%;
    object-fit: cover;
  }
</style>