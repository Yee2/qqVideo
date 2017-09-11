<?php

namespace App\Console\Commands;

use App\Jobs\QqVideoOne;
use App\Jobs\YoukuOne;
use App\Models\SpAlbum;
use Illuminate\Console\Command;

class NotCollect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:not';

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
        $data = SpAlbum::where('total_num', 0)->get();
        foreach ($data as $item){
            $data = [
                'title' => $item->title,
                'source_url' => $item->source_url,
                'parse_type' => $item->parse_type,
                'status' => $item->status,
                'type_id' => $item->type_id,
            ];
            if($item->parse_type == 'youku'){
                dispatch(new YoukuOne($data));
            }elseif ($item->parse_type == 'qq'){
                dispatch(new QqVideoOne($data));
            }
            echo "finash id: {$item->id}, type: {$item->type_id}, parse_type: {$item->parse_type}\r\n";
        }
    }
}
