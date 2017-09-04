<?php

namespace App\Console\Commands;

use App\Jobs\QqVideoOne;
use App\Models\SpAlbum;
use App\Models\SpThumb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class QqVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:qqvideo {--first=true} {--type=0} {--offset=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $optionType = $this->option('type');
        $optionOffset = $this->option('offset');
        $optionFirst = $this->option('first');
        if($optionType >= 3){
            echo "all finash\r\n";
            return false;
        }
        $type = SpAlbum::getTypeQq($optionType);
        $url = 'http://v.qq.com/x/list/'.$type['type'].'?offset='.$optionOffset;
        try{
            $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
        }catch (\Exception $e){
            Artisan::call('video:qqvideo', [
                '--type' => $optionType,
                '--offset' => $optionOffset,
                '--first' => $optionFirst,
            ]);
            exit(0);
        }
        $listDom = $dom->find('.figures_list li>a');
        $pageTotal = $dom->find('.mod_pages span a:last')->text();
        if($optionFirst){
            Artisan::call('video:qqvideo', [
                '--type' => $optionType,
                '--offset' => ($pageTotal - 1) * 30,
                '--first' => false,
            ]);
            exit(0);
        }
        echo "ing --type:".$optionType.", --offset:".$optionOffset."\r\n";
        $count = $listDom->count();
        for($i = 1; $i <= $count; $i++){
            $map = pq($listDom->eq($count-$i));
            if($i == 1) $count++;
            $alt = $map->find('.figure_info')->text();
            $mark = $map->find('.mark_v>img')->attr('alt');
            if(strpos($mark, '预告片') !== false) continue;
            $status = SpAlbum::StatusEd;
            if(($type['id'] != 1)){
                if(!preg_match('/^(全|更).+/', $alt, $match)) continue;
                if(empty($match)) continue;
                if(strpos($match[0], '更') !== false){
                    $status = SpAlbum::StatusIng;
                }
            }
            $data = [
                'title' => $map->find('img')->attr('alt'),
                'source_url' => $map->attr('href'),
                'parse_type' => 'qq',
                'type_id' => $type['id'],
            ];
            $find = SpAlbum::where($data)->first();
            if(is_null($find)){
                $info = SpAlbum::create($data);
                if($info){
                    $data['id'] = $info->id;
                    $data['status'] = $status;
                    dispatch(new QqVideoOne($data));
                    SpThumb::create([
                        'albums_id' => $info->id,
                        'thumb' => $map->find('img')->attr('r-lazyload')
                    ]);
                }
            }else{
                if($find->status == SpAlbum::StatusIng){
                    $data['id'] = $find->id;
                    dispatch(new QqVideoOne($data));
                    $find->status = $status;
                    $find->save();
                }
            }
        }
        echo "finash\r\n";
        if(0 < $optionOffset){
            Artisan::call('video:qqvideo', [
                '--type' => $optionType,
                '--offset' => $optionOffset-30,
                '--first' => false,
            ]);
        }else{
            Artisan::call('video:qqvideo', [
                '--type' => $optionType+1,
                '--offset' => 0
            ]);
        }
    }
}
