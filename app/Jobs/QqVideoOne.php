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
        $dom = \phpQuery::newDocumentFileHTML($url, 'gbk');
        $find = SpAlbum::where('title', $this->map['title'])->first();
        if(!is_null($find)){
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
        }
        //电影
        if($this->map['type_id'] == 1){
            SpVideo::create([
                'source_url' => $this->map['source_url'],
                'albums_id' => $find->id
            ]);
        }
        //电视剧
        elseif($this->map['type_id'] == 2){
            $contents = file_get_contents("compress.zlib://".$url);
            preg_match("/var COVER_INFO = (.+)\n/", $contents, $listMatch);
            $pathInfo = pathinfo($url);
            $json = json_decode($listMatch[1], true);
            $find = SpAlbum::where('title', $this->map['title'])->first();
            if(!is_null($find)){
                if(is_null($find->tags)){
                    $find->tags = implode(',', $json['subtype']);
                }
                if(is_null($find->descript)){
                    $find->descript = $json['description'];
                }
                $find->save();
            }
            foreach ($json['vip_ids'] as $key => $item){
                $map = [
                    'id' => $find->id,
                    'filename' => $pathInfo['filename'],
                    'item' => $item['V'],
                    'title' => ($key+1)
                ];
                dispatch(new QqvideoOneTv($map));
                /*$urls = 'https://v.qq.com/x/cover/'.$pathInfo['filename'].'/'.$item['V'].'.html';
                $data= [
                    'albums_id' => $find->id,
                    'title' => ($key+1),
                    'source_url' => $urls,
                ];
                $info = SpVideo::where($data)->first();
                if(is_null($info)){
                    $res = SpVideo::create($data);
                }*/
            }
        }elseif($this->map['type_id'] == 3){
            $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
            $scriptListInfo = $dom->find('script[r-notemplate="true"]')->html();
            preg_match("/var LIST_INFO = (.+)\n/", $scriptListInfo, $listMatch);
            $pathInfo = pathinfo($url);
            $json = json_decode($listMatch[1], true);
            $find = SpAlbum::where('title', $this->map['title'])->first();
            if(!is_null($find)){
                foreach ($json['vid'] as $key => $item){
                    $map = [
                        'id' => $find->id,
                        'filename' => $pathInfo['filename'],
                        'item' => $item,
                    ];
                    dispatch(new QqvideoOneDm($map));
                    /*$urls = 'https://v.qq.com/x/cover/'.$pathInfo['filename'].'/'.$item.'.html';
                    $doms = \phpQuery::newDocumentFileHTML($urls, 'gb2312');
                    $titles = $doms->find('title')->text();
                    $title = explode('_', $titles)[0];
                    $data= [
                        'albums_id' => $find->id,
                        'title' => $title,
                        'source_url' => $urls,
                    ];
                    $info = SpVideo::where($data)->first();
                    if(is_null($info)){
                        SpVideo::create($data);
                    }*/
                }
            }
        }
    }
}
