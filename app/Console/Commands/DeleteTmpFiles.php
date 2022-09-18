<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class DeleteTmpFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:tmp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will clean all temp files in storage/tmp/uploads that user uploaded but not used';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $file = new Filesystem;
        $file->cleanDirectory(storage_path('tmp/uploads'));
        
        $this->info("Start cleaning tmp files");
    }
}
