<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use TNTSearch;


class IndexMP34 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:mp34';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index the MP3 and MP4 tables';

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
		$indexer = TNTSearch::createIndex('mp3s.index');
		$indexer->query('SELECT id, name, description FROM mp3s;');
		$indexer->run();

		$indexer = TNTSearch::createIndex('mp4s.index');
		$indexer->query('SELECT id, name, description FROM mp4s;');
		$indexer->run();
    	}
}
