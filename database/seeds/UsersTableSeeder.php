<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => '$2y$10$EqtyQpsZGrvnZs.VEmXUzec3WP0ZHNT4lC0to6Gf97/5G9qj/h.0e',
                'remember_token' => NULL,
                'created_at' => '2017-06-24 19:13:18',
                'updated_at' => '2017-06-24 19:13:18',
            ),
        ));
        
        
    }
}