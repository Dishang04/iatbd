<?php

namespace App\Console\Commands;
use DB;

use Illuminate\Console\Command;

class DeleteExpiredAnimalProfile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-animal-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('animals')
        ->where('when', '<', now()) 
        ->where('available','==', true)
        ->delete();
    }
}
