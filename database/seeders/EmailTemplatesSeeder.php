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
                'type' => 'eligibility_email_1',
                'subject' => 'Eligibility Email 1',
                'greeting_text' => '<p>Hello {receiver_first_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'lower_text' => '<p>This is the lower text</p>',
            ],
            [
                'type' => 'eligibility_email_2',
                'subject' => 'Eligibility Email 2',
                'greeting_text' => '<p>Hello {receiver_first_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'lower_text' => '<p>This is the lower text</p>',
            ],
            [
                'type' => 'eligibility_email_3',
                'subject' => 'Eligibility Email 3',
                'greeting_text' => '<p>Hello {receiver_first_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'lower_text' => '<p>This is the lower text</p>',
            ],
            [
                'type' => 'eligibility_email_4',
                'subject' => 'Eligibility Email 4',
                'greeting_text' => '<p>Hello {receiver_first_name},</p>',
                'upper_text' => '<p>This is the upper text</p>',
                'lower_text' => '<p>This is the lower text</p>',
            ]
        ];

        DB::table('email_templates')->insert($email_jobs);
    }
}