@props(['preview'])
<tr>
    <td class="preFooter">
        <h2>Find out more</h2>
    </td>
</tr>
<tr>
    <td class="preFooter">
        <table class="tableFooter" width="90%" cellspacing="4" align="center">
            <tr>
                <td width="50%" class="tableLeft">
                    <table width="100%">
                        <tr>
                            <td>
                                <img src="{{ $preview ? asset('/img/refer-email/pre-footer-1.png') : 'cid:pre-footer-1.png' }}" alt="Faqs image" width="60 "/>
                            </td>
                            <td>
                                <h4>FAQs</h4>
                                <p>Learn more about referrals and view Frequently Asked Questions</p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="50%" class="tableRight">
                    <table width="100%">
                        <tr>
                            <td>
                                <img src="{{ $preview ? asset('/img/refer-email/pre-footer-2.png') : 'cid:pre-footer-2.png' }}" alt="T&C image" width="60" />
                            </td>
                            <td>
                                <h4>Terms and Conditions</h4>
                                <p>View the Program Terms and Conditions</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td class="footer">
        <table class="tableFooter" width="90%" cellspacing="4" align="center">
            <tr>
                <td width="50%" class="tableLeft">
                     <a href="https://householdcapital.com.au/">
                        <img src="{{ $preview ? asset('/img/refer-email/footer.png') : 'cid:footer.png' }}" alt="company logo" width="200" />
                     </a>
                </td>
                <td width="50%" class="tableRight">
                    <table cellpadding="3" width="100%">
                        <tr>
                            <td colspan="4" class="textWhite">CONNECT</td>
                        </tr>
                        <tr class="footerRight">
                            <td>
                                <a href="https://www.facebook.com/HouseholdCap?_gl=1*neqiq*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                                  <img src="{{ $preview ? asset('/img/icons/facebook.png') : 'cid:facebook.png' }}" alt="social-media-facebook" title="social-media-facebook" />
                                </a>
                            </td>
                            <td>
                                <a href="https://twitter.com/HouseholdCapit1?_gl=1*neqiq*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                                  <img src="{{ $preview ? asset('/img/icons/linkedin.png') : 'cid:linkedin.png' }}" alt="social-media-twitter" title="social-media-twitter" />
                                </a>
                            </td>
                            <td>
                                <a href="http://www.linkedin.com/company/household-capital/?_gl=1*17jo4h9*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                                  <img src="{{ $preview ? asset('/img/icons/twitter.png') : 'cid:twitter.png' }}" alt="social-media-linkedin" title="social-media-linkedin" />
                                </a>
                            </td>
                            <td>
                                <a href="https://www.youtube.com/channel/UC0i5Trr2mDYi_T47LwcX4cQ?_gl=1*17jo4h9*_ga*MTExNzkxMTA1NC4xNjkzMjgzNzc5*_ga_0LYY798T8J*MTY5MzI4ODEyMS4yLjEuMTY5MzI4ODc1NC4wLjAuMA.." title="" target="_blank">
                                  <img src="{{ $preview ? asset('/img/icons/youtube.png') : 'cid:youtube.png' }}" alt="social-media-youtube" title="social-media-youtube" />
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="colOne">
                <td width="50%" class="tableLeft tableBottomLeft">
                    <table width="100%">
                        <tr>
                            <td>
                               <h4>Household Capital Pty Ltd</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <p>PO Box 4232, Fitzroy South, VIC 3065</p>
                            </td>

                        </tr>
                        <tr>
                           <td>
                               <p>Copyright © Household Capital 2021</p>
                           </td>
                        </tr>
                    </table>
                </td>
                <td width="50%" class="tableRight tableBottomRight">
                    <table width="100%" align="right">
                        <tr>
                            <td>
                               <a href="https://householdcapital.com.au/privacy-credit-reporting-policy/">Privacy Policy</a>
                            </td>
                        </tr>
                        <tr>
                           <td>
                               <a href="https://householdcapital.com.au/privacy-credit-reporting-policy/">Credit Reporting Policy</a>
                           </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="footerBottom">
                   <p>
                        Applications for credit are subject to eligibility and lending criteria. Fees and charges are payable and terms and conditions apply (available upon request).
                        Household Capital pty Limited is a credit representative (51 757) of Mortgage Direct Ptu Limited ACN 075 121 434 Australian Credit License
                        391876 HOUSEHOLD CAPITAL the Star Device and Household Capital and the Star Device or trademarks of Household Capital Pty Ltd
                    </p>
                </td>
            </tr>
        </table>
    </td>
</tr>