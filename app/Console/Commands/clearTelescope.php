<?php

namespace App\Console\Commands;
use Spatie\Multitenancy\Commands\Concerns\TenantAware;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


class clearTelescope extends Command
{
    use TenantAware;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearTelescope {--tenant=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // return $this->line('The tenant is '. Tenant::current()->name);
        Artisan::call('telescope:prune');
        // command('telescope:prune')-

        return $this->line('The tenant is '. app('currentTenant')->name);



    }
}
