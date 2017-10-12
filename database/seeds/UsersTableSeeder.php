<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create(array(
            'first_name'  => 'Jaan',
            'Last_name' => 'Petrik',
            'state' => '0',
            'email' => 'rowlinest90@gmail.com'
        ));

        User::create(array(
            'first_name'  => 'Alice',
            'Last_name' => 'Deep',
            'state' => '0',
            'email' => 'admin@admin.com'
        ));

        User::create(array(
            'first_name'  => 'Ded',
            'Last_name' => 'Alone',
            'state' => '0',
            'email' => 'ded_alone@gmail.com'
        ));
    }
}
