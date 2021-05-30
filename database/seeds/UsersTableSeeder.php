<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //o comando para rodar é o:
        // php artisan db:seed
        
        // User::create([
        //     'name' => 'Danielly B',
        //     'email' => 'dany@mail.com',
        //     'password' => bcrypt('123456')
        // ]);

        // criando registros fakes com Factories, 
        // o primeiro parâmetro é qual tabela/classe eu quero gerar esses dados fakes;
        // o segundo parâmetro (10) é a quantidade de registros que quero gerar, nesse caso coloquei apenas 10;
        // o comando para se rodar é o: php artisan db:seed --class=UsersTableSeeder
        factory(User::class, 10)->create();
    }
}
