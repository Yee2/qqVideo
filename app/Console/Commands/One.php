<?php

/**
 * Created by IntelliJ IDEA.
 * User: tingfeng
 * Date: 2017/4/2
 * Time: 9:51
 */
namespace App\Console\Commands;

use App\Video;
use Illuminate\Console\Command;

class One extends Command
{
    protected $signature = 'se:one';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data = Video::whereNull('file_url')->select('file_url','source_url','id')->get();
        foreach ($data as $val)
        {
            echo $val->id."\r\n";
            try{
                $html = self::getUrlHtml($val->source_url);
                if(preg_match('/video=\["(.*)"\]/', $html, $match))
                {
                    $val->file_url = $match[1];
                    $val->save();
                }
            }catch (\Exception $e)
            {
                continue;
            }

        }
    }
    /**
     * 获取Url内容
     * @return bool|string
     */
    private static function getUrlHtml($url)
    {
        $fileName = 'pageOne.txt';
        $content = file_get_contents($url);
        $content = iconv("gb2312",
            "utf-8//IGNORE",
            str_replace('gb2312', 'utf-8', $content)
        );
        file_put_contents(storage_path($fileName), $content);
        $content = file_get_contents(storage_path($fileName));
        return $content;
    }
}