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

class QqVideoOne implements ShouldQueue
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
        $url = $this->map['source_url'];
        $pathInfo = pathinfo($url);
        $find = SpAlbum::where('id', $this->map['id'])->first();
        $dom = \phpQuery::newDocumentFileHTML($url, 'gbk');
        if(is_null($find)) return false;
        if(is_null($find->tags)){
            $video_tags = $dom->find('.video_tags a[_stat]');
            try{
                foreach ($video_tags as $item){
                    $map = pq($item);
                    $tags[] = $map->text();
                }
                $find->tags = implode(',', $tags);
            }catch (\Exception $e){}
        }
        if(is_null($find->descript)){
            $description = $dom->find('meta[name="description"]')->attr('content');
            $find->descript = $description;
        }
        $find->save();

        //电视剧
        /*if($this->map['type_id'] == SpAlbum::TypeTv){
            $contents = file_get_contents("compress.zlib://".$url);
            preg_match("/var LIST_INFO = (.+)\n/", $contents, $listMatch);
            $json = json_decode($listMatch[1], true);
            foreach ($json['vip'] as $key => $item){
                $map = [
                    'id' => $find->id,
                    'filename' => $pathInfo['filename'],
                    'item' => $item,
                    'title' => $json['data'][$item]['title']
                ];
                dispatch(new QqvideoOneTv($map));
            }
            return true;
        }*/

        //电影
        if($this->map['type_id'] == SpAlbum::TypeMovie){
            SpVideo::firstOrCreate([
                'source_url' => $this->map['source_url'],
                'albums_id' => $find->id
            ]);
        }

        elseif(in_array($this->map['type_id'], [SpAlbum::TypeCartoon,SpAlbum::TypeTv])){
           // $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
            if($this->map['type_id'] == SpAlbum::TypeTv){
                $contents = file_get_contents("compress.zlib://".$url);
            }else{
                $contents = $dom->find('script[r-notemplate="true"]')->html();
            }

            preg_match("/var LIST_INFO = (.+)\n/", $contents, $listMatch);
            $json = json_decode($listMatch[1], true);
            dd($url, $json, count($json['vid']));
            foreach ($json['vid'] as $key => $item){
                $map = [
                    'id' => $find->id,
                    'filename' => $pathInfo['filename'],
                    'item' => $item,
                    'title' => $json['data'][$item]['title']
                ];
                dispatch(new QqvideoOneTv($map));
            }
        }
    }
}
