<?php

namespace App\Jobs;

use App\Models\SpVideo;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class QqvideoOneTv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;
    private $map;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($map)
    {
        $this->map = $map;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $urls = 'https://v.qq.com/x/cover/'.$this->map['filename'].'/'.$this->map['item'].'.html';
        $data= [
            'albums_id' => $this->map['id'],
            'title' => $this->map['title'],
            'source_url' => $urls,
        ];
        $info = SpVideo::where($data)->first();
        if(is_null($info)){
            $res = SpVideo::create($data);
        }
    }
}
