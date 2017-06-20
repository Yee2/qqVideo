<?php

namespace App\Console\Commands;

use App\Ip;
use App\UserAgent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Yiqiyin extends Command
{
    protected $signature = 'ads:yiqiyin';

    //protected $description = 'Command description';

    protected static $referer;
    protected static $userAgent;
    protected static $clientIp;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $house = date('Y', time());
        if($house > 13 && $house < 23)
        {
            $num = 1;
        }elseif ($house >= 23)
        {
            $num = 5;
        }elseif ($house > 0 && $house < 6)
        {
            $num = 8;
        }elseif ($house > 6 && $house <= 12)
        {
            $num = 10;
        }
        for ($i = 0; $i < $num; $i++)
        {
            $clientIp = Ip::orderBy(DB::Raw('rand()'))->value('ip_start');
            $userAgent = UserAgent::orderBy(DB::Raw('rand()'))->value('agent');
            $url = 'http://f.workbizs.com/g.jsp?uid=17220';
            self::$referer = 'http://mv.22st.top';
            self::$userAgent = $userAgent;
            self::$clientIp = $clientIp;
            $html = self::getUrlHtml($url);
            preg_match_all("/('|\")(http:\/\/|https:\/\/)(.*?)('|\");/uis", $html, $macth);
            foreach ($macth[0] as $key => $item)
            {
                $urls = str_replace("';",'',$item);
                $urls = str_replace("'", '', $urls);
                $htmlText = self::getUrlHtml($urls);
                if($htmlText != false)
                {
                    Log::info("成功请求URL：".$urls);
                }
            }
        }
    }

    private static function getUrlHtml($url)
    {
        $params = '';
        $opts = [
            'http'=> [
                'ignore_errors'=>true,
                'method'=>"get",
                'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
                    "Content-length:".strlen($params)."\r\n" .
                    "X-FORWARDED-FOR: ".self::$clientIp."\r\n" .
                    "CLIENT-IP: ".self::$clientIp."\r\n" .
                    "Referer: ".self::$referer."\r\n" .
                    "User-Agent: ".self::$userAgent."\r\n" .
                    "\r\n",
                'content' => $params,
            ]
        ];
        $context = stream_context_create($opts);
        $getUrlContents = @file_get_contents(
            $url,
            FALSE,
            $context
        );
        return $getUrlContents;
    }
}
