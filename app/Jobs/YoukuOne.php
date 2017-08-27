<?php

namespace App\Jobs;

use App\Models\SpAlbum;
use App\Models\SpVideo;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class YoukuOne implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $map;
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
        try{
            $dom = \phpQuery::newDocumentFile($this->map['source_url']);
        }catch (\Exception $e){
            Log::info("请求出错, title:".$this->map['title'].",id:".$this->map['id'].",url:".$this->map['source_url']);
            self::dispatch($this->map);
            return false;
        }
        $find = SpAlbum::find($this->map['id']);
        if(is_null($find)){
            Log::info("不存在的数据,ID:".$this->map['id'].",title:".$this->map['title']);
            return false;
        }
        $keywords = $dom->find('meta[name="keywords"]')->attr("content");
        $description = $dom->find('meta[name="description"]')->attr("content");
        $find->tags = $keywords;
        $find->descript = $description;
        $find->save();
        if($this->map['type_id'] == 1){
            SpVideo::firstOrCreate([
                'source_url' => $this->map['source_url'],
                'albums_id' => $find->id
            ]);
        }else{
            $listDom = $dom->find('div[name="tvlist"]');
            $count = $listDom->count();
            for($i = 1; $i <= $count; $i++){
                $map = pq($listDom->eq($count-$i));
                SpVideo::firstOrCreate([
                    'source_url' => $map->find('a')->attr('href'),
                    'title' => $map->find('a')->text(),
                    'albums_id' => $find->id
                ]);
            }
        }
    }
}
