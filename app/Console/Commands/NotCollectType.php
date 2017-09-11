<?php

namespace App\Console\Commands;

use App\Models\SpAlbum;
use Illuminate\Console\Command;

class NotCollectType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:notype';

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
        $qqNotCollectCount = SpAlbum::where([
            'total_num' => 0,
            'parse_type' => 'qq'
        ])->count('id');
        $youkuNotCollectCount = SpAlbum::where([
            'total_num' => 0,
            'parse_type' => 'youku'
        ])->count('id');
        echo "qq: {$qqNotCollectCount}, youku: {$youkuNotCollectCount}\r\n";
    }
}
