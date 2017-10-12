<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(array(
            'name'  => 'All'
        ));


        Group::create(array(
            'name'  => 'test_group'
        ));

    }
}
