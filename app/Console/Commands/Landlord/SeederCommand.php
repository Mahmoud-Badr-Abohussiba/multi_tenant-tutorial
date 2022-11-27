<?php

namespace App\Console\Commands\Landlord;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'landlord:seed {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding Landlord';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $class = $this->argument('class');
        $this->info('Start seeding');
        $this->info('--------------------------------------');
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\Landlord\\' . $class,
            '--database' => 'landlord',]);
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
