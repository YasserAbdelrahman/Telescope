<?php

namespace App\Console\Commands;
// use Spatie\Multitenancy\Commands\Concerns\TenantAware;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Telescope_Entry;
use App\Models\Telescope_Entry_Tag;
use App\Models\Telescope_Monitoring;
use Spatie\Multitenancy\Models\Tenant;

use Illuminate\Support\Facades\DB;



class testTenant extends Command
{
    // use TenantAware;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testTenant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Telescope Logs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

       $tenants = Tenant::get();
       foreach($tenants as $tenant){

        $tenant->makeCurrent();
        // $users = \App\Models\User::whereDate('created_at', '<=', now()->subDays(2))->delete();
        Telescope_Entry_Tag::whereDate('created_at', '<=', now()->subDays(2))->delete();
        Telescope_Entry::whereDate('created_at', '<=', now()->subDays(2))->delete();
        Telescope_Monitoring::whereDate('created_at', '<=', now()->subDays(2))->delete();

       }
        return 'success';


    }
}
