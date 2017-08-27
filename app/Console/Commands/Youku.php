<?php

namespace App\Console\Commands;

use App\Jobs\QqVideoOne;
use App\Jobs\YoukuOne;
use App\Models\SpAlbum;
use App\Models\SpThumb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Youku extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:youku {--first=true} {--type=0} {--page=0}';

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
        $optionType = $this->option('type');
        $optionPage = $this->option('page');
        $optionFirst = $this->option('first');
        if($optionType >= 3){
            echo "all finash\r\n";
            return false;
        }
        $type = self::getType($optionType);
        $url = 'http://list.youku.com/category/show/c_'.$type['type'].'_s_1_d_1_p_'.$optionPage.'.html';
        $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
        if($optionFirst){
            $pageTotal = $dom->find('.yk-pages li:eq(6)')->text();
            Artisan::call('video:youku', [
                '--first' => false,
                '--type' => $optionType,
                '--page' => $pageTotal
            ]);
            exit(0);
        }
        $listDom = $dom->find('.box-series>ul>li');
        $count = $listDom->count();
        echo "ing --type:".$optionType.", --offst:".$optionPage."\r\n";
        for($i = 1; $i <= $count; $i++){
            $map = pq($listDom->eq($count-$i));
            $url = $map->find('a:first')->attr('href');
            $url = (strpos($url, 'http') === false)?('http:'.$url):$url;
            $data = [
                'title' => $map->find('a:first')->attr('title'),
                'source_url' => $url,
                'type_id' => $type['id'],
            ];
            $find = SpAlbum::where($data)->first();
            if(is_null($find)){
                $info = SpAlbum::create($data);
                if($info){
                    $data['id'] = $info->id;
                    dispatch(new YoukuOne($data));
                    SpThumb::create([
                        'albums_id' => $info->id,
                        'thumb' => $map->find('img')->attr('_src')
                    ]);
                }
            }else{
                dispatch(new YoukuOne($data));
            }
        }
        echo "finash\r\n";
        if($optionPage <= 0){
            Artisan::call('video:youku', [
                '--first' => true,
                '--type' => $optionType+1,
                '--page' => 1
            ]);
            return false;
        }else{
            Artisan::call('video:youku', [
                '--first' => false,
                '--type' => $optionType,
                '--page' => $optionPage - 1
            ]);
            return false;
        }
    }

    private static function getType($item = 0){
        $map = [
            [
                'id' => 1,
                'type' => '96',
                'desc' => '电影'
            ],
            [
                'id' => 2,
                'type' => '97',
                'desc' => '电视剧'
            ],
            [
                'id' => 3,
                'type' => '100',
                'desc' => '动漫'
            ],
        ];
        return $map[$item];
    }
}
