<?php

namespace CoreBlue\Moat\Commands;

use Illuminate\Console\Command;

class MoatStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moat:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows the current status of Moat';

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
        if(env('MOAT_STATUS')) {
            $this->info('Moat is currently ' . env('MOAT_STATUS') . '.');
        } else {
            $this->error('Could not indentify Moat status. Have you run moat:create?');
        }
    }
}
