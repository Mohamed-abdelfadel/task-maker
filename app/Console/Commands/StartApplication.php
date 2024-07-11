<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the application with necessary setup steps';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Migrating the database...');
        $this->call('migrate');

        $this->info('Seeding the database (That may take time)...');
        $this->call('db:seed');

        $this->info('Starting the Laravel development server...');
        exec('php artisan serve');
    }
}
