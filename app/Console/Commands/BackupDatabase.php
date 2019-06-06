<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\BackupDatabase as Backup;
use Storage;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

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
        $dateTime = Carbon::now();
        $dateTimeString = $dateTime->format('Y_m_d_H_i_s');
        $fileName = 'database_' . $dateTimeString . '.sql.gz';
        $filePath = storage_path(config('asset.backup_database'));

        $database = env('DB_DATABASE');
        $userName = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');

        $shellCommand = 'mysqldump '
        . $database
        . ' --password=\'' . $password . '\''
        . ' --user=' . $userName
        . ' --host=' . $host
        . ' --single-transaction | gzip'
        . ' >' . $filePath . $fileName;

        $process = new Process($shellCommand);
        $process->mustRun();

        Backup::create([
            'name' => $fileName,
        ]);

        $this->destroyBackup();

        $this->info('Export database ' . $database . ' to file ' . $fileName . ' success!');
    }

    public function destroyBackup()
    {
        if(Backup::count() > 20) {
            $backup = Backup::all()->first();
            $backup->delete();
            Storage::delete(config('asset.backup_database') . $backup->name);
        }
        return false;
    }
}
