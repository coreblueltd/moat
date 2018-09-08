<?php

namespace CoreBlue\Moat\Commands;

use Illuminate\Console\Command;

class SetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moat:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set a new Moat password';

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
        $password = $this->secret('Enter a new password:');

        $path = base_path('.env');

        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                'MOAT_PASSWORD='. env('MOAT_PASSWORD'), 'MOAT_PASSWORD=' . $password, file_get_contents($path)
            ));

            $this->info('Moat password successfully changed.');
        } else {
            $this->error('Could not update Moat password. Have you run moat:create?');
        }
    }
}
