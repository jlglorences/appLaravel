<?php


use Illuminate\Database\Seeder;
use TeachMe\Entities\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $this->createAdmin();
        factory(User::class, 49)->create();
    }

    private function createAdmin()
    {
        User::create([
            'name'  => 'Jorge Lorences',
            'email' => 'jorge.lorences@bitcode.com',
            'password'  => bcrypt('admin')
        ]);
    }
}