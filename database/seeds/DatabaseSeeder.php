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
        // $this->call(UsersTableSeeder::class);

        $this->call(CarrerasSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TipoClienteSeeder::class);
        $this->call(DiagnosticoRuffierSeeder::class);
    }
}
