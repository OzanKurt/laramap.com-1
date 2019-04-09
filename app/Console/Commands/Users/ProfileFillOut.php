<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use App\Notifications\Users\ProfileFilloutNotification;
use Illuminate\Console\Command;

class ProfileFillOut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:empty-profiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies users about their empty profiles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all()
             ->where('linkedin_link', null);

        foreach ($users as $user) {
            $user->notify(new ProfileFilloutNotification($user));
        }
    }
}
