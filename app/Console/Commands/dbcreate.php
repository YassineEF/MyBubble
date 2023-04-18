<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create ur database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $schemaName = $this->argument('name') ?: config('database.connections.mysql.database');
        $chartset = config('database.connections.mysql.charset', 'utf8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        config(['database.connections.mysql.database' => null]);
        $query = "DROP DATABASE IF EXISTS $schemaName;";

        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $chartset COLLATE $collation;";

        DB::statement($query);

        echo "DATABASE $schemaName CREATED successfully !\n";

        config(['database.connections.mysql.database' => $schemaName]);
    }
}