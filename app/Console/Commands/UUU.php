<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UUU extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:uuu {--type=} {--page=}';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $page = $this->option('page');
        $type = $this->option('type');
        $page = is_null($page)?'':'_'.$page;
        $type = is_null($type)?28:$type;
        $url = 'http://www.34ni.com/html/part/'.$type.$page.'.html';
        $dom = \phpQuery::newDocumentFile($url);
        $list = $dom->find('.main .list table a[href^="/html"]');
        foreach ($list as $key => $item)
        {
            $href = pq($item)->attr('href');
            $conUrl = 'http://www.34ni.com'.$href;
            $conHtml = file_get_contents($conUrl);
            $content = iconv("gb2312",
            "utf-8//IGNORE",
                str_replace('gb2312', 'utf-8', $conHtml)
            );
            $fileName = storage_path('26uuu.html');
            file_put_contents($fileName, $content);
            $content = file_get_contents($fileName);
            $domMap = new \IvoPetkov\HTML5DOMDocument();
            $domMap->loadHTML($content);
            $listContent = $domMap->querySelector('.n_bd')->outerHTML;
            $dom1 = \phpQuery::newDocument($listContent);
            $dom1->find('.n_bd div')->remove();
            $content = str_replace("
", '', $dom1->find('.n_bd')->html());
            Storage::disk('local')->put('1.txt', $content);
            dd($content);
            die;
        }
        //dd($list);
    }

    /**
     * 类型对应关系
     * @return array
     */
    private static function typeMap()
    {
        $type = [
            '28' => 1,//
            '30' => 3,//
            '31' => 2,//
            '36' => 4,//
        ];
        return $type;
    }
}
