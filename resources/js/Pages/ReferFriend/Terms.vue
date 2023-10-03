<script>
  import ReferFriendLayout from "../../Layouts/ReferFriendLayout.vue";

  export default {
    props: ['type', 'uuid'],
    components: {
      ReferFriendLayout,
    },
    data(){
      return {

      }
    },
  }
</script>

<template>
  <ReferFriendLayout>
   <div class="mx-auto py-12">

      <div class="flex justify-center pt-5">
        <div class="text-center text-toolbar w-2/3">
          <h3 class="text-5xl font-bold font-merry">Terms & Conditions</h3>

          <div class="text-left mt-8">

            <ol class="list-decimal flex flex-col gap-3">

              <h4 class="text-lg font-bold">Administrators of the program</h4>

              <div class="ml-8">
                <li>
                  The Program is administered by Think Wink Pty Ltd (‘Wink’) (ABN 56 062 426) on behalf of Household Capital Pty Ltd trading as Household Capital (ACN 618 068 214) (‘Household Capital’). Household Capital Pty Limited is a credit representative (512757) of Mortgage Direct Pty Limited ACN 075 721 434, Australian Credit Licence 391876.
                </li>
                <li>
                  Household Capital and Wink may at any time, and at its absolute discretion (on provision of reasonable notice) choose to amend, alter or conclude the Program.
                </li>
              </div>

              <h4 class="text-lg font-bold">Refer a Friend Program</h4>

              <div class="ml-8">

                <li>
                  <div>An individual is eligible for the referral reward as part of the Refer a Friend program if they meet all the following criteria: </div>
                  <ol class="list-alpha pl-10">
                    <div class="underline">Referrer: </div>
                    <li>A referrer has settled a Household Loan with Household Capital in the past.</li>
                    <li>A referrer must acknowledge they know the person they are referring to Household Capital and have received permission to refer their friend or family member and provide their contact details.</li>
                    <li>The referrer’s friend, the ‘referee’, settles a Household Loan with household Capital after meeting the eligibility criteria.</li>
                    <div class="underline">Referee: </div>
                    <li>Is above 60 years old.</li>
                    <li>Lives in an <a class="text-link underline" href="#"> eligible postcode</a>  in Australia.</li>
                    <li>House value is a minimum of $600,000.</li>
                    <li>A referee settles a Household Loan with Household Capital after being referred by</li>
                  </ol>
                </li>

                <li> A participant must be an individual and not a company or organisation </li>
                <li>
                  <div class="underline">Household Capital Household Loan </div>
                  <div>Referrer: $150 </div>
                  <div>Referee: $500 </div>
                </li>
                <li>
                  <div class="underline">Pension Boost Home Equity Access Scheme </div>
                  <div>Referrer: $50 </div>
                  <div>Referee: $50 </div>
                </li>
              </div>

              <h4 class="text-lg font-bold">Household Capital Customers (‘Referrer’) can -</h4>

              <div class="ml-8">
                <li>Refer multiple friends, these friends must be new to Household Capital, this means they have never secured a loan with Household Capital before.  </li>
                <li>When the ‘referee’ settles a loan with Household Capital, the ‘referrer’ will receive a $150 Digital Prepaid Mastercard, delivered via SMS.  </li>
              </div>

              <h4 class="text-lg font-bold">Referred Friends can (‘Referee’) can -</h4>

              <div class="ml-8">
                <li> Join Household Capital via the Refer a Friend program if they have not secured a loan with Household Capital previously or join Pension Boost to access the Home Equity Access Scheme (HEAS).  </li>
                <li> Receive a $500 Digital Prepaid Mastercard upon settlement of Household Loan with Household Capital or $50 Digital Prepaid Mastercard upon acquisition of a HEAS . </li>
                <li> Refer their own friend via the Refer a Friend program after they have settled a Household Loan. </li>
                <li> Participants must not be an employee of (or spouse, parent, child or sibling, whether full, half, step or by adoption, of an employee of the Promoters or any of its related corporations or any of their agencies associated with the program.  </li>
              </div>

              <h4 class="text-lg font-bold">Claiming your Household Capital branded Digital Prepaid Mastercard</h4>
              <div class="ml-8">
                <li> Once a ‘referee’ (individual who has been referred) has settled a Household Loan, they will be issued a reward of a $500 Digital Prepaid Mastercard. This will be sent via email for the individual to redeem.   </li>
                <li>Once a ‘referee’ settles a loan, the ‘referrer’ (who referred their friend) will be issued a reward of a $150 Digital Prepaid Mastercard. This will be sent via email for the individual to redeem.   </li>
                <li>If a ‘referee’ does not settle a Household Loan with Household Capital, but they join the Home Equity Access Scheme (HEAS) with Pension Boost they are eligible for a $50 reward.  </li>
                <li>Individual claim submissions will be reviewed against the eligibility requirements. All entries in the Program will be reviewed by a representative of the Promoter. </li>
                <li>Successful individuals will receive their Digital Prepaid Mastercard via email from The Card Network within five business days of being deemed successful.   </li>
                <li>The referral reward will only be issued via a Household Capital Branded Digital Prepaid Mastercard and will not be redeemable in any other format. </li>
                <li>Household Capital has the right to audit, verify and refuse loans where we have reasonable grounds to suspect a Refer a Friend referral or order is being made under fraudulent details. </li>
                <li>Individuals are responsible for ensuring that all details provided are correct. The Promoter will not be liable for any costs associated with re-delivery of a referral reward, should the delivery details provided be incorrect. </li>
                <li>
                  The Refer a Friend program complies with Household Capital’s
                  <a class="text-link underline" href="https://householdcapital.com.au/privacy-credit-reporting-policy/">Privacy and Credit Reporting Policy </a>
                  and
                  <a class="text-link underline" href="https://householdcapital.com.au/website-privacy-policy/"> Website Terms of Use. </a>
                </li>
              </div>


              <h4 class="text-lg font-bold">Use of Digital Prepaid Mastercard’s</h4>
              <div class="ml-8">
                <li>Upon receiving a Digital Prepaid Mastercard, individuals must download and activate the card within three months. Upon activation, the Digital Prepaid Mastercard will be valid for 12 months. </li>
                <li>Digital Prepaid Mastercard’s can be used anywhere Mastercard is accepted.   </li>
                <li>Any ancillary costs associated with redeeming a Digital Prepaid Mastercard are not included. Any unused balance of a Digital Prepaid Mastercard will not be returned.  </li>
                <li>Redemption of a Digital Prepaid Mastercard is subject to any terms and conditions of the issuer including those specified on the Digital Prepaid Mastercard. </li>
                <li>Full terms and conditions for the use of Digital Prepaid Mastercard can be found at <a class="text-link underline" href="https://www.thinkwink.com.au/tos">https://www.thinkwink.com.au/tos</a> </li>
              </div>

              <h4 class="text-lg font-bold">Privacy</h4>
              <div class="ml-8">
                <li>Personal information will only be used and disclosed to third parties including, without limitation, Household Capital, Wink and any Wink appointed technology or supplier partners relevant to the Household Capital Refer a Friend Program. </li>
                <li>To conduct this Program, distributing, and providing the Reward (including but not limited to using an eligible individual’s email address or mobile number to send them emails about this Program and to send them a Digital Prepaid Mastercard(s)), updating records and keeping Eligible individuals contact details up to date, and any related or ancillary purposes.  </li>
                <li>Wink will otherwise handle participants personal information in accordance with the terms herein or its Privacy Policy at:<a class="text-link underline" href="https://www.thinkwink.com.au/privacy"> https://www.thinkwink.com.au/privacy</a>. </li>
              </div>

              <h4 class="text-lg font-bold">Miscellaneous</h4>
              <div class="ml-8">
                <li>Entering this program is deemed to be acceptance of these Terms and Conditions and Schedule. </li>
                <li>No reward is transferable or exchangeable, nor can it be redeemed for cash. In the event for any reason an individual does not take an element of any reward at the time stipulated by the Promoters then that element of the reward will be forfeited by the individual and cash will not be supplied for that element of the reward.  </li>
                <li>The promoter takes no responsibility for lost, misplaced, destroyed or stolen rewards once they are claimed.  </li>
                <li>The promoter reserves the right to refuse participation in the Program of non-compliance with these conditions of claim. If there is a dispute concerning the conduct of program, the decision of the promoter will be final, and no further correspondence will be entered. </li>
                <li>Notwithstanding any other provision in these Terms and Conditions, Household Capital may: </li>
                <ul class="list-dash flex flex-col gap-3">
                  <li>Suspend or withdraw all or any part of this Program for any reason and at any time; and/or  </li>
                  <li>Vary the terms or content of all or any part of this Program including (without limitation) any time or date in this Program and these Terms and Conditions. </li>
                  <li>Household Capital may not provide a Reward to an Eligible Customer who has not fully complied with these Terms and Conditions; and </li>
                  <li>To the extent permitted by law, Household Capital will not be liable to any person for any cost, loss, damage, liability, expense, or claim arising, whether directly or indirectly, in connection with the Program, including anything purchased with the Digital Prepaid Mastercard.</li>
                </ul>
                <li> These terms and conditions should be interpreted in accordance with the laws of New South Wales, Australia and are subject to the non-exclusive jurisdiction of the courts of New South Wales, Australia. </li>
              </div>

            </ol>
          </div>
        </div>
      </div>
    </div>
  </ReferFriendLayout>
</template>