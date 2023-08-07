<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateUser extends Command
{
    protected $signature = 'update:user {userId},{name?}';
    protected $description = 'Update a user\'s name, email, password';

    public function handle()
    {
        $userId = $this->argument('userId');
        $name = $this->ask('Yeni Kullanıcı Adı: ');
        $email = $this->ask(' Yeni E-posta: ');
        $password = $this->secret('Yeni Şifre: ');
        
        $user = User::find($userId);

        if (!$user) {
            $this->error('Kullanıcı bulunamadı!');
            return;
        }

        if ($name) {
            $user->name = $name;
        }

        if ($email) {
            $user->email = $email;
        }

        $user->save();

        $this->info('Kullanıcı başarıyla güncellendi!');
    }
}


