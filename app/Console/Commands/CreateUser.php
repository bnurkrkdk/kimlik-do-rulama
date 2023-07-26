<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;


class CreateUser extends Command
{
    protected $signature = 'app:create-user';

    protected $description = 'Create a new user';

    public function handle()
    {
        // Kullanıcı bilgilerini burada elle girin
        $name = 'abc';
        $email = 'abc@abc.com';
        $password = 'abcabc';

        // Yeni kullanıcı oluşturun
        User::createUser($name, $email, $password);

        $this->info('Kullanıcı oluşturuldu!');
    }
}
