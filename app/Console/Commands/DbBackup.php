<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'We are creating database backup';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = "backup_" .strtotime(now()) . ".sql";
        $command = "C:\xampp\mysql\bin --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > " .storage_path() . "/app/backups" .$filename  ;
        exec($command);
    }
}
