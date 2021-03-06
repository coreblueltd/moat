<?php

namespace CoreBlue\Moat\Commands;

use Illuminate\Console\Command;

class DisableMoat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moat:down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disables Moat';

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
        $path = base_path('.env');

        if (file_exists($path) && env('MOAT_STATUS')) {

            file_put_contents($path, str_replace(
                'MOAT_STATUS='. env('MOAT_STATUS'), 'MOAT_STATUS=disabled', file_get_contents($path)
            ));

            $this->info('Moat is now disabled.');
        } else {
            $this->error('Could not update Moat status. Have you run moat:create?');
        }
    }
}
