<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LanlordMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'landlord:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrating Landlord';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Start migrating Landlord');
        $this->info('--------------------------------------');
        Artisan::call('migrate --path=database/migrations/landlord/  --database=landlord');
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
