<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GitCommitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commit {message : Commit message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all changes, dump database, and commit with a given message';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = $this->argument('message');

        // Run mysqldump to create a database backup
        $dumpCommand = 'mysqldump -h 192.168.88.60 -u homestead -psecret chill_booking > chill_booking_backup.sql';
        $dumpResult = shell_exec($dumpCommand);
        $this->info('Database backup created.');

        // Run git add -A
        $addResult = shell_exec('git add -A');
        $this->info($addResult);

        // Run git commit -m
        $commitResult = shell_exec("git commit -m \"$message\"");
        $this->info($commitResult);

        return 0;
    }
}
