<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class deleteuser extends Command
{
    protected $signature = 'delete:user {userId}';
    protected $description = 'deletes a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('userId');

        $user = User::find($userId);

        if (!$user) {
            $this->error('Kullanıcı bulunamadı!');
            return;
        }

        $user->delete();

        $this->info('Kullanıcı başarıyla silindi!');
    }
}
