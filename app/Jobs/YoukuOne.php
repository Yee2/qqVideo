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
            return false;
        }
        $keywords = $dom->find('meta[name="keywords"]')->attr("content");
        $description = $dom->find('meta[name="description"]')->attr("content");
        $find->tags = $keywords;
        $find->descript = SpAlbum::trimall($description);
        $find->save();
        if($this->map['type_id'] == SpAlbum::TypeMovie){
            SpVideo::firstOrCreate([
                'source_url' => $this->map['source_url'],
                'albums_id' => $find->id
            ]);
            $find->total_num += 1;
            Log::info("id:".$find->id.",total_num:".$find->total_num);
            $find->save();
        }else{
            $listDom = $dom->find('div[name="tvlist"]');
            $count = $listDom->count();
            for($i = 1; $i <= $count; $i++){
                $map = pq($listDom->eq($count-$i));
                $href = $map->find('a')->attr('href');
                $url = (strpos($href, 'http') === false)?('http:'.$href):$href;
                SpVideo::firstOrCreate([
                    'source_url' => $url,
                    'title' => $map->find('a')->text(),
                    'albums_id' => $find->id
                ]);
                $find->total_num += 1;
                Log::info("id:".$find->id.",total_num:".$find->total_num);
                $find->save();
            }
        }
    }
}
