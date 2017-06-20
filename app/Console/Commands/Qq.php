<?php
/**
 * Created by IntelliJ IDEA.
 * User: tingfeng
 * Date: 2017/6/3
 * Time: 18:51
 */

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Qq extends Command
{
    protected $signature = 'getVideo:qq {--type=} {--page=}';

    protected $description = '';
    private $cate = 10001;
    private $theatre = 1;
    private $pay = -1;
    private $offset = 0;
    private $listHost;
    private $types;

    public function __construct()
    {
        parent::__construct();
        $this->listHost = 'http://v.qq.com/x/list/';
        $this->types = [
            'movie' => 1,//电影
            'tv' => 2,//电视剧
            'cartoon' => 3,//动漫
            'variety' => 4,//综艺
            'children' => 3,//少儿
            'doco' => 5, //纪录片
        ];
    }

    public function handle()
    {
        $type = $this->getOption('type', 'movie');
        $page = $this->getOption('page', 0);
        $url = "{$this->listHost}{$type}?cate={$this->cate}&theatre={$this->theatre}".
            "&pay={$this->pay}&offset={$this->offset}";
        $html = file_get_contents($url);
        $dom = \phpQuery::newDocument($html);
        $liData = $dom->find('li.list_item');
        foreach ($liData as $key => $item)
        {
            $map = pq($item);
            $data[] = [
                'title' => $map->find('.figure_title')->text(),
                'thumb' => $map->find('img:first')->attr('r-lazyload'),
                'sub_title' => $map->find('.figure_info')->text(),
                'parse_type' => 'qq.com',
                'source_url' => $map->find('a:first')->attr('href'),
            ];
            //Storage::disk('local')->put('1.txt', $map->html());
            $path = pathinfo($data[0]['source_url']);
            dd($path);
        }

    }

    /**
     * 获取参数值，设置默认值
     * @param $key 键
     * @param $default 默认值
     * @return array|string
     */
    private function getOption($key, $default)
    {
        return is_null($this->option('type'))?$default:$this->option('type');
    }
}