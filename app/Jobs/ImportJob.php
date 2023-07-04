<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    

    private $insertData;
    /**
     * Create a new job instance.
     */
    public function __construct($insertData)
    {
        
        $this->insertData = $insertData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
       DB::table('client_data')->insert($this->insertData);
    }
}
