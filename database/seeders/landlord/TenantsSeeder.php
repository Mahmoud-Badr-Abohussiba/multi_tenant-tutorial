<?php

namespace Database\Seeders\landlord;

use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = [
           [ 'name' => 'Tenant1', 'domain'=>'app1.multitenant.test', 'database'=>'tenant_one'],
           [ 'name' => 'Tenant2', 'domain'=>'app2.multitenant.test', 'database'=>'tenant_two'],
        ];
        foreach ($tenants as $tenant)
        {
            Tenant::create($tenant);
        }
    }
}
