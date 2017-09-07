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
        try{
            $dom = \phpQuery::newDocumentFileHTML($url, 'gbk');
        }catch (\Exception $e){
            dispatch(new self($this->map));
            return false;
        }
        $find = SpAlbum::where('id', $this->map['id'])->first();
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
            $find->descript = SpAlbum::trimall($description);
        }
        $find->save();
        $pathInfo = pathinfo($url);
        //电影
        if($this->map['type_id'] == SpAlbum::TypeMovie){
            $map = [
                'source_url' => $this->map['source_url'],
                'albums_id' => $find->id
            ];
            $info = SpVideo::where($map)->first();
            if(is_null($info)){
                if(SpVideo::create($map)){
                    $find->total_num++;
                    $find->save();
                }
            }
        }
        //电视剧、动漫
        elseif(in_array($this->map['type_id'], [SpAlbum::TypeTv, SpAlbum::TypeDm])){
            $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
            if($this->map['type_id'] === SpAlbum::TypeTv){
                try{
                    $contents = file_get_contents("compress.zlib://".$url);
                }catch (\Exception $e){
                    dispatch(new self($this->map));
                    return false;
                }
            }else{
                $contents = $dom->find('script[r-notemplate="true"]')->html();
            }
            preg_match("/var COVER_INFO = (.+)\n/", $contents, $listMatch);
            $json = json_decode($listMatch[1], true);
            foreach ($json['vip_ids'] as $key => $item){
                $subTitle = $key + 1;
                $title = ($subTitle < 10)?('0'.$subTitle):$subTitle;
                $sourceUrl = 'https://v.qq.com/x/cover/'.$pathInfo['filename'].'/'.$item['V'].'.html';
                $map = [
                    'albums_id' => $find->id,
                    'source_url' => $sourceUrl,
                    'title' => $title
                ];
                $info = SpVideo::where($map)->first();
                if(is_null($info)){
                    if(SpVideo::create($map)){
                        $find->total_num++;
                        $find->save();
                    }
                }
            }
        }
        return true;
    }
}