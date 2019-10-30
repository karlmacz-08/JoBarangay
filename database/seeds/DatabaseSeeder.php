<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        
        factory(App\Users::class, 'applicants', 10)->create();
        factory(App\Users::class, 'employers', 10)->create();
    }
}
