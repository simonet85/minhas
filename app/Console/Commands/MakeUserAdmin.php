<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creation d\'admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', 'abdul.grant@example.com')->first();
        dd($user);
        if ($user) {
            $user->update([
            $user->role => 'admin',
            $user->place => null,
            $user->membership => null,
            $user->job => null,
            $user->photo => 'storage/users/profile.png',
            $user->updated_at => null,
            $user->created_at => null,
            $user->password => '$2y$10$bnZP9UUKgXPyV/t8yDSMBuDVRIMDgds5kISA1CxbXuF7TbqOeOD/u', // password is "password"
            $user->email_verified_at => null,
            $user->name => 'admin',
        ]);
            $this->info('User with email "admin@example.com" has been set as an admin.');
        } else {
            $this->error('User with email "admin@example.com" does not exist.');
        }

    }
}
