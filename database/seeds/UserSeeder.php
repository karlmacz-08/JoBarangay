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
        $user1->last_name = 'Macz';
        $user1->birth_date = '1996-03-08';
        $user1->type = 'Employer';
        $user1->sex = 'Male';

        $user1->save();

        $user2 = new Users;

        $user2->mobile_number = '9068490198';
        $user2->password = bcrypt('Nani');
        $user2->first_name = 'Mack Perry';
        $user2->last_name = 'Co';
        $user2->birth_date = '2000-09-11';
        $user2->type = 'Applicant';
        $user2->sex = 'Male';
        $user2->educational_attainment = 'College Graduate';

        $user2->save();
    }
}
