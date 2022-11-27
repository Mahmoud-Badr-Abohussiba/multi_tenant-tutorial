<?php

namespace App\Console\Tenants\Commands;

use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantsMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tenants migration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tenants = Tenant::all();
        $tenants->each(function ($tenant){
            TenantService::switchToTenant($tenant);
            $this->info('Start migrating: ' .$tenant->domain);
            $this->info('--------------------------------------');
            Artisan::call('migrate --path=database/migrations/tenants/  --database=tenant');
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
