<?php

namespace CoreBlue\Moat\Commands;

use Illuminate\Console\Command;

class CreateMoat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moat:create';

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
        if(!env('MOAT_PASSWORD') && !env('MOAT_STATUS')) {
            $password = $this->secret('Enter a new password:');

            if ($this->confirm('Do you want to enable Moat now?')) {
                $status = 'enabled';
            } else {
                $status = 'disabled';
            }

            $path = base_path('.env');

            if (file_exists($path)) {

                $fileContents = file_get_contents($path);

                $fileContents .= PHP_EOL . 'MOAT_PASSWORD=' . $password . PHP_EOL;
                $fileContents .= 'MOAT_STATUS=' . $status;

                file_put_contents($path, $fileContents);

                $this->info('Moat has been successfully created.');
            } else {
                $this->error('Could not locate .env file');
            }
        } else {
            $this->error('Moat has already been created.');
        }
    }
}
