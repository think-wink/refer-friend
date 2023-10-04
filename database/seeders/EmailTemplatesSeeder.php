<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email_jobs = [
            [
                'type' => 'referrer_created',
                'subject' => 'Refer a friend and be rewarded',
                'cover_image' => '/img/refer-email/cover-image.png',
                'greeting_text' => '<p>Hello</p>',
                'upper_text' => '<p>We are pleased to have played a part in ensuring you enjoy the retirement you truly deserve. It brings us joy to hear stories from our customers, sharing their experiences as to how unlocking their home equity has positively impacted their retirement.</p><p>For many, a Household Loan provides a much needed boost to their income stream, offering financial security and peace of mind. For others, it’s a lump sum payment to renovate the home they love, buy a new car or take a much wished-for trip. A lot of our customers like to set aside a contingency fund, something for those  unexpected expenses (or surprise opportunities!) that can arise. Do you know someone who could benefit from a Household Loan?</p><p>You may have a friend or relative who’d like additional income to make the most of their retirement? Or someone who needs to renovate or modify their home to make it safe and comfortable for their future. Whatever the reason, our Household Loan could positively impact their lives.</p><p><b>Introducing our new ‘refer a friend\' program.</b></p><p>We’d love you to refer a friend or two! To express our gratitude, we’re offering you a $250 reward as a token of appreciation for each referral*. You can enjoy the benefit of helping your friends and family and be rewarded. No one likes to receive unsolicited emails, ensure you obtain your friends permission before sharing their details with us.</p><p>Simply visit <a href="'.config('app.url').'/refer-friend-form/{referrer_uuid}">rewards.householdcapital.com</a> for more information.</p><p><b>How does it work?</b></p><p>It’s a simple process:</p><ul><li>Visit <a href="'.config('app.url').'/refer-friend-form/{referrer_uuid}">rewards.householdcapital.com</a> and complete the form including contact information for your friend or family member. Make sure you have their permission to send us their details first.</li><li>Household Capital will contact your friend and provide them with relevant information. </li><li>Your friend or family member will have a meeting with a Household Capital retirement specialist and if deemed eligible, they can apply for a Household Loan. </li><li>Upon settlement of the loan, you will be sent your Digital Prepaid Mastercard via email.</li></ul><p>If you would like any further information, please call us on <a href="tel:1300 463 082">1300 463 082</a> or refer to the <a href="https://householdcapital.com.au/website-privacy-policy/">Terms & Conditions</a>. </p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'eligibility_email_1',
                'subject' => 'You\'ve been referred to Household Capital by {referrer_name}',
                'cover_image' => null,
                'greeting_text' => '<p>Hi {referred_name}</p>',
                'upper_text' => '<p>Are you ready to transform your retirement? We’re delighted to share that you have been recommended for a Household Loan by {referrer_name}.</p><p>We invite you to improve your retirement lifestyle and, if a Household Loan is right for you, we are offering a $500 reward upon settlement. Plus {referrer_name} will also be rewarded with $250.</p><p>Unlocking the wealth in your home can provide you with the retirement you’ve always wanted. Using your home equity means you can stay in the home you love and live your best life: renovate, travel, establish a contingency fund for the unexpected or simply have more in your pocket each week.</p><p><b>How does it work?</b></p><p>It’s a simple process:</p><ul><li>The first step is to visit <a href="'.config('app.url').'/refer-friend-eligibility">rewards.householdcapital.com</a> and complete our home equity calculator and provide your contact information; we’ll contact you to discuss your eligibility.</li><li>The second step is a personalised meeting with one of our retirement specialists.</li><li>The third step is the application process - there’s always someone available to help you along the way.</li></ul><p>Upon settlement of your Household Loan, you will be sent your $500 Digital Prepaid Mastercard via email.</p><p>We look forward to talking with you soon. If you have any questions, please call us on <a href="tel:1300 463 082">1300 463 082</a> or check the <a href="https://householdcapital.com.au/website-privacy-policy/">Terms & Conditions</a>.</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'eligibility_email_2',
                'subject' => 'Enhance your retirement and be rewarded',
                'cover_image' => null,
                'greeting_text' => '<p>Hi {referred_name},</p>',
                'upper_text' => '<p>Are you ready to unlock the wealth in your home? You have been recommended for a Household Loan by {referrer_name}.</p><p>Accessing your home equity can provide you with the retirement you’ve always hoped for. A Household Loan allows you to remain in the home you love while living your best life: renovate, travel, establish a contingency fund for the unexpected or simply have more in your pocket each week.</p><p>We invite you to improve your retirement lifestyle and, if a Household Loan is right for you, we are offering a $500 reward upon settlement. Plus {referrer_name} will also be rewarded.</p><p><b>Confirm eligibility</b></p><p>Use our online <a href="'.config('app.url').'/refer-friend-eligibility">calculator</a> to see your accessible Household Capital.</p><p><b>Personal Consultation</b></p><p>Experience one-on-one personalised service with a retirement specialist.</p><p><b>Application</b></p><p>We guide you through every step of the loan application process.</p><p>Upon settlement of your Household Loan, you will be sent a $500 Digital Prepaid Mastercard as your reward for joining Household Capital.</p><p>We look forward to talking with you soon. If you have any questions, please call us on <a href="tel:1300 463 082">1300 463 082</a> or check the <a href="https://householdcapital.com.au/website-privacy-policy/">Terms & Conditions</a>.</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'eligibility_email_3',
                'subject' => 'Retire better and be rewarded',
                'cover_image' => null,
                'greeting_text' => '<p>Hi {referred_name},</p>',
                'upper_text' => '<p>You have been recommended for a Household Loan by {referrer_name}. We invite you to enhance your retirement lifestyle and, if a Household Loan is right for you, we are offering a $500 reward upon settlement of your loan. Plus, your friend {referrer_name} will also be rewarded.</p><p><b>About Household Capital&trade;</b></p><p>Household Capital is a specialist financial firm that provides Australia’s retirees with access to home equity – their Household Capital&trade; – to improve long term retirement funding. Providing access to home equity enables us to help retired Australians Live Well At Home&trade;.</p><p><b>What is a Household Loan?</b></p><p>Along with your superannuation and pension entitlements, home equity is one of the three pillars of retirement funding. While many people access their home equity by selling their home or downsizing, doing so isn’t always necessary – and that’s where Household Capital comes in. As a homeowner aged 60 plus, you can use a reverse mortgage, one of the most popular equity release products, to fund a more comfortable retirement and give you confidence in your future. You can use it;</p><ul><li>As a regular income stream</li><li>To renovate or modify your home</li><li>To cover medical or dental costs</li><li>To replace your car or cover other significant purchases</li><li>To refinance an existing mortgage or other debt</li><li>As a contingency fund for any unexpected expenses.</li></ul><p><b>Here’s how it works</b></p><ol><li>The first step is to visit <a href="'.config('app.url').'/refer-friend-eligibility">rewards.householdcapital.com</a> and complete our home equity calculator and provide your contact information; we’ll contact you to discuss your eligibility.</li><li>The second step is a personalised meeting with one of our retirement specialists.</li><li>The third step is the application process - there’s always someone available to help you along the way.</li></ol><p>When you settle your Household Loan, you will be sent a $500 Digital Prepaid Mastercard as a reward for joining Household Capital.</p><p>We look forward to talking with you soon. If you’d like to speak to one of our retirement specialists or have any questions about the reward, please call us on <a href="tel:1300 463 082">1300 463 082</a> or check the <a href="https://householdcapital.com.au/website-privacy-policy/">Terms & Conditions</a>.</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type'=> 'eligibility_email_4',
                'subject' => 'You could be rewarded',
                'cover_image' => null,
                'greeting_text' => '<p>Hi {referred_name},</p>',
                'upper_text' => '<p>We are sending you a reminder that you have been recommended for a Household Loan by {referrer_name}.</p><p>We are offering a $500 reward upon settlement. Your friend {referrer_name} will also receive a reward!</p><p>We invite you to enhance your retirement lifestyle and, if a Household Loan is right for you, you will receive this reward as a Digital Prepaid Mastercard sent via email after settlement.</p><p>To get a reward, you need to complete the following simple steps.</p><ul><li>The first step is to visit <a href="'.config('app.url').'/refer-friend-eligibility">rewards.householdcapital.com</a> and complete our home equity calculator and provide your contact information; we’ll contact you to discuss your eligibility.</li><li>The second step is a personalised meeting with one of our retirement specialists.</li><li>The third step is the application process - there’s always someone available to help you along the way.</li></ul><p>Please call us on <a href="tel:1300 463 082">1300 463 082</a> or check the <a href="https://householdcapital.com.au/website-privacy-policy/">Terms & Conditions</a>.</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'nurture_cycle_email_1',
                'subject' => 'Thank You',
                'cover_image' => null,
                'greeting_text' => '<p>Hi there {referred_name}</p>',
                'upper_text' => '<p>Thank you for the time on the phone, we loved connecting with you recently and understanding more about your current retirement position.</p><p>If you are interested in further discussing how a Household Loan could benefit you in the future, we are always available to provide more information and assist you on your retirement journey.</p><p>A Household Loan can be used in so many ways, including:</p><ul><li>As a regular income stream</li><li>To renovate or modify your home to keep you safe and comfortable</li><li>To replace your car or cover other significant purchases</li><li>To refinance an existing mortgage or other debt</li><li>To cover medical or dental costs</li><li>As a contingency fund, to cover those unexpected expenses that can cause sleepless nights.</li></ul><p>Don’t forget, we are offering a reward of $500 if you settle a loan with us.</p><p>So, if you’ve been thinking you’d like to do more with your retirement, we can help. At Household Capital we assist older Australians access their home equity – what we like to call their Household Capital&trade; – to improve their quality of life and realise their retirement dreams.</p><p>Book a Call to Find out if a Household Loan is right for you</p>',
                'button_text'=> '<b>Schedule a Call</b>',
                'button_url' => 'https://calendly.com/household-capital/15-minute-discovery-call/',
                'lower_text' => '<p>What are you doing with your Household Capital&trade;?</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
            ],
            [
                'type' => 'nurture_cycle_email_2',
                'subject' => 'Unlock your homes potential and be rewarded',
                'cover_image' => null,
                'greeting_text' => '<p>Hi there {referred_name},</p>',
                'upper_text' => '<p>Just like your friend, {referrer_name} who recommended you, we help many Australians to unlock their Household Capital with us and enjoy a retirement they deserve.</p><p>While many people access their home equity by selling their home or downsizing, doing so isn’t always necessary – and that’s where Household Capital comes in.</p><p><b>What is a Household Loan?</b></p><p>Our <a href="https://householdcapital.createsend1.com/t/j-i-ydhiuhh-l-urt/">Household Loan</a> is an innovative type of reverse mortgage that’s been designed to meet the needs of Australian retirees and work within Australia’s retirement system. Home equity was recently identified by the government as the third pillar of retirement funding, alongside superannuation and the Age Pension.</p><p>If you’re aged 60+, a Household Loan allows you to access a portion of your home equity - what we like to call your <a href="https://householdcapital.createsend1.com/t/j-i-ydhiuhh-l-uri/">Household Capital&trade;</a> - to improve your retirement funding and meet your lifestyle needs.</p><p>A Household Loan can be used in so many ways, including:</p><ul><li>As a regular income stream</li><li>To renovate or modify your home to keep you safe and comfortable</li><li>To replace your car or cover other significant purchases</li><li>To refinance an existing mortgage or other debt</li><li>To cover medical or dental costs</li><li>As a contingency fund, to cover those unexpected expenses that can cause sleepless nights.</li></ul><p>If, like {referrer_name}, you wish to improve your retirement funding, expand the choices you can make and say yes to more in retirement, schedule a call with a retirement specialist or by calling <a href="tel:1300 117 129">1300 117 129</a> today. We will reward you with $500 if you settle a loan with us in 2023.</p>',
                'button_text'=> '<b>Schedule a Call</b>',
                'button_url' => 'https://calendly.com/household-capital/15-minute-discovery-call/',
                'lower_text' => '<p>What are you doing with your Household Capital&trade;?</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
            ],
            [
                'type' => 'nurture_cycle_email_3',
                'subject' => 'Secure a great retirement and be rewarded',
                'cover_image' => null,
                'greeting_text' => '<p>Hi there {referred_name},</p>',
                'upper_text' => '<p>We’d like to introduce you to these ladies from New South Wales.</p><p>Lynne, Raylene and Suzanne have been friends for more than 30 years and although they no longer live in neighbouring suburbs, they get together at least weekly to laugh, to talk and to sew. The three of them sew quilts to donate to aged care facilities, where they are gratefully received by the residents.</p><p>Lynne was the first to approach Household Capital; she needed a reliable car, although as a widow in her 70s, banks would not extend credit to her. Instead, Lynne used her home equity – what we like to call her Household Capital&trade; – to buy a new car, landscape her garden and to set up a contingency fund to draw on in the event of unexpected expenses.</p><p>She told her friends Raylene and Suzanne about Household Capital, as both wanted to increase their retirement income. Raylene and Suzanne have now used their home equity to establish regular income streams, and each has established a contingency fund, giving them confidence in their future and flexibility to meet their financial needs.</p><p><i>“I know I will feel wonderful,” Suzanne said. “It will just lift a lot of things off my shoulders and I\'ll be able to go along and do whatever I want to do, and the children are going to be fine.”</i></p><p><a href="https://www.youtube.com/watch?v=8Czho7sfH8I&list=PLU7rEcozozHH0JAIzNWkSNBGNGB1rjFoM&index=21">https://www.youtube.com/watch?v=8Czho7sfH8I&list=PLU7rEcozozHH0JAIzNWkSNBGNGB1rjFoM&index=21</a></p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => '<p>We are offering a reward if you settle a Household Loan with us. Upon settlement, you will be sent a $500 reward to spend as you please.</p><p>The next steps are...</p><p><b>Personal Consultation</b></p><p>Experience one-on-one personalised service with a retirement specialist.</p><p><b>Loan application</b></p><p>We guide you through every step of the application process.</p><p><b>Be rewarded</b></p><p>We will send you a $500 Digital Prepaid Mastercard  if you settle a loan with us.</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
            ],
        ];

        // Need complete templates for emails
         DB::table('email_templates')->insert($email_jobs);
    }
}