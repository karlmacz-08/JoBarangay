<?php

use Illuminate\Database\Seeder;

use App\Users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new Users;

        $user1->mobile_number = '9068563348';
        $user1->password = bcrypt('kawaii');
        $user1->first_name = 'Karl';
        $user1->last_name = 'Last';
        $user1->birth_date = '1996-03-08';
        $user1->sex = 'Male';

        $user1->save();
    }
}
