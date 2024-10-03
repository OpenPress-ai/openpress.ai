<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeChrisEditor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Chris editor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', 'chris@openagents.com')->firstOrFail();
        $user->is_editor = true;
        $user->save();
    }
}
