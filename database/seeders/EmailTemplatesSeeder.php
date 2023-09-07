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
                'greeting_text' => '<p>Hello</p>',
                'upper_text' => '<p>We are pleased to have played a part in ensuring you enjoy the retirement you truly deserve. It brings us joy to hear stories from our customers, sharing their experiences as to how unlocking their home equity has positively impacted their retirement.</p><p>For many, a Household Loan provides a much needed boost to their income stream, offering financial security and peace of mind. For others, it’s a lump sum payment to renovate the home they love, buy a new car or take a much wished-for trip. A lot of our customers like to set aside a contingency fund, something for those  unexpected expenses (or surprise opportunities!) that can arise. Do you know someone who could benefit from a Household Loan?</p><p>You may have a friend or relative who’d like additional income to make the most of their retirement? Or someone who needs to renovate or modify their home to make it safe and comfortable for their future. Whatever the reason, our Household Loan could positively impact their lives.</p><p><b>Introducing our new ‘refer a friend\' program.</b></p><p>We’d love you to refer a friend or two! To express our gratitude, we’re offering you a $XXX reward as a token of appreciation for each referral*. You can enjoy the benefit of helping your friends and family and be rewarded.</p><p>Simply visit <a href=\"http://rewards.householdcapital.com/\">&lt;rewards.householdcapital.com&gt;</a> for more information.</p><p><b>How does it work?</b></p><p>It’s a simple process:</p><ul><li>Visit <a href=\"http://rewards.householdcapital.com/\">&lt;rewards.householdcapital.com&gt;</a> and complete the form including contact information for your friend or family member. </li><li>Household Capital will contact your friend and provide them with relevant information. </li><li>Your friend or family member will have a meeting with a Household Capital retirement specialist and if deemed eligible, they can apply for a Household Loan. </li><li>Upon settlement of the loan, you will be sent your Digital Prepaid Mastercard via email.</li></ul><p>If you would like any further information, please call us on <a href=\"tel:1300 463 082\">1300 463 082</a> or refer to the Terms & Conditions. </p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'eligibility_email_1',
                'subject' => 'You’ve been referred to us',
                'greeting_text' => '<p>Hi {referred_name}</p>',
                'upper_text' => '<p>Are you ready to transform your retirement? We’re delighted to share that you have been recommended for a Household Loan by {referrer_name}.</p><p>Unlocking the wealth in your home can provide you with the retirement you’ve always wanted. Using your home equity means you can stay in the home you love and live your best life: renovate, travel, establish a contingency fund for the unexpected or simply have more in your pocket each week.</p><p>We invite you to improve your retirement lifestyle and, if a Household Loan is right for you, we are offering a $500 reward upon settlement. Plus {referrer_name} will also be rewarded.</p><p><b>How does it work?</b></p><p>It’s a simple process:</p><ul><li>The first step is to visit <a href=\"http://rewards.householdcapital.com/\">&lt;rewards.householdcapital.com&gt;</a> and complete our home equity calculator and provide your contact information; we’ll contact you to discuss your eligibility. </li><li>The second step is a personalised meeting with one of our retirement specialists.</li><li>The third step is the application process - there’s always someone available to help you along the way. </li></ul><p>Upon settlement of your Household Loan, you will be sent your $500 Digital Prepaid Mastercard via email.</p><p>We look forward to talking with you soon. If you have any questions, please call us on <a href=\"tel:1300 463 082\">1300 463 082</a> or check the Terms & Conditions.</p><p>Warm regards</p><p>Jay Sewell</p><p>Customer & Operations Lending Director</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'eligibility_email_2',
                'subject' => 'Eligibility Email 2',
                'greeting_text' => '<p>Hello {referred_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'eligibility_email_3',
                'subject' => 'Eligibility Email 3',
                'greeting_text' => '<p>Hello {referred_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type'=> 'eligibility_email_4',
                'subject' => 'Eligibility Email 4',
                'greeting_text' => '<p>Hello {referred_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'nurture_cycle_email_1',
                'subject' => 'Thank You ',
                'greeting_text' => '<p>Hi there {referred_name}</p>',
                'upper_text' => '<p>Thank you for the time on the phone, we loved connecting with you recently and understanding more about your current retirement position.</p><p>If you are interested in further discussing how a Household Loan could benefit you in the future, we are always available to provide more information and assist you on your retirement journey.</p><p>A Household Loan can be used in so many ways, including:</p><ul><li>As a regular income stream</li><li>To renovate or modify your home to keep you safe and comfortable</li><li>To replace your car or cover other significant purchases</li><li>To refinance an existing mortgage or other debt</li><li>To cover medical or dental costs</li><li>As a contingency fund, to cover those unexpected expenses that can cause sleepless nights.</li></ul><p>Don’t forget, we are offering a reward of $500 if you settle a loan with us.</p><p>So, if you’ve been thinking you’d like to do more with your retirement, we can help. At Household Capital we assist older Australians access their home equity – what we like to call their Household CapitalTM – to improve their quality of life and realise their retirement dreams.</p><p>Book a Call to Find out if a Household Loan is right for you</p>',
                'button_text'=> 'Schedule a Call',
                'button_url' => 'https://calendly.com/household-capital/15-minute-discovery-call/',
                'lower_text' => '<p>What are you doing with your Household CapitalTM?</p>\n<p>Warm regards</p>\n<p>Jay Sewell</p>\n<p>Customer & Operations Lending Director</p>',
            ],
            [
                'type' => 'nurture_cycle_email_2',
                'subject' => 'Nurture Cycle Email 2',
                'greeting_text' => '<p>Hello {referred_name},</p>',
                'upper_text' => 'This is nurture cycle email 2',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
            [
                'type' => 'nurture_cycle_email_3',
                'subject' => 'Nurture Cycle Email 3',
                'greeting_text' => '<p>Hello {referred_name},</p>',
                'upper_text' => 'This is nurture cycle email 3',
                'button_text'=> null,
                'button_url' => null,
                'lower_text' => null,
            ],
        ];

        // Need complete templates for emails
         DB::table('email_templates')->insert($email_jobs);
    }
}