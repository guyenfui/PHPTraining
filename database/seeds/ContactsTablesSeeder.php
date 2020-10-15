<?php

use Illuminate\Database\Seeder;
use App\Contact;
//use Illuminate\Database\Factories\ContactFactory;

class ContactsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name'    => 'グエンマン',
            'email'    => 'hung123@gmail.com',
            'phone'    => '07044774289',
            'address'    => '川崎',
            'type'    => '電話番号',
            'gender'    => '男',
            'message'    => '御社応募したい',

        ]);

        Contact::factory()
            ->times(50)->create();
    }
}
