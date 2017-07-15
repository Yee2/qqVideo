<?php

namespace App\Console\Commands;

use App\Jobs\QqVideoOne;
use App\Models\SpAlbum;
use App\Models\SpThumb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class QqVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:qqvideo {--type=0} {--offset=0}';

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
        $type = self::getType($optionType);
        $url = 'http://v.qq.com/x/list/'.$type['type'].'?offset='.$optionOffset;
        $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
        $listDom = $dom->find('.figures_list li>a');
        $pageTotal = $dom->find('.mod_pages span a:last')->text();
        $offsetTotal = ($pageTotal-1) * 30;
        echo "ing --type:".$optionType.", --offst:".$optionOffset."\r\n";
        foreach ($listDom as $item){
            $map = pq($item);
            $alt = $map->find('.figure_info')->text();
            if(($type['id'] != 1) && !preg_match('/^(全|更).+/', $alt, $match)) continue;
            $data = [
                'title' => $map->find('img')->attr('alt'),
                'source_url' => $map->attr('href'),
                'type_id' => $type['id'],
            ];
            $find = SpAlbum::where($data)->first();
            if(is_null($find)){
                $info = SpAlbum::create($data);
                if($info){
                    dispatch(new QqVideoOne($data));
                    SpThumb::create([
                        'albums_id' => $info->id,
                        'thumb' => $map->find('img')->attr('r-lazyload')
                    ]);
                }
            }
        }
        echo "finash\r\n";
        if($optionType != 3){
            if($offsetTotal >= $optionOffset){
                Artisan::call('video:qqvideo', [
                    '--type' => $optionType,
                    '--offset' => $optionOffset+30
                ]);
            }else{
                Artisan::call('video:qqvideo', [
                    '--type' => $optionType+1,
                    '--offset' => 0
                ]);
            }
        }
    }

    private static function getType($item = 0){
        $map = [
            [
                'id' => 1,
                'type' => 'movie',
                'desc' => '电影'
            ],
            [
                'id' => 2,
                'type' => 'tv',
                'desc' => '电视剧'
            ],
            [
                'id' => 3,
                'type' => 'cartoon',
                'desc' => '动漫'
            ],
        ];
        return $map[$item];
    }
}
