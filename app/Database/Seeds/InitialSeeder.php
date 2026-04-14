<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategorySeeder');
        $this->call('MovieSeeder');
        $this->call('TagSeeder');
    }
}
