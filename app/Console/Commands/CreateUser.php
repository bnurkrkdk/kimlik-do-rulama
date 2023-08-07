<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;


class CreateUser extends Command
{
    protected $signature = 'create:user';
    protected $description = 'Create a new user';
    public function handle()
{
    $name = $this->ask('Kullanıcı Adı: ');
    $email = $this->ask('E-posta: ');
    $password = $this->secret('Şifre: ');

    User::createUser($name, $email, $password);

    $this->info('Kullanıcı oluşturuldu!');
}

}


