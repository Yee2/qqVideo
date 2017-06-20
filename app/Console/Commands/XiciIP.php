<?php
/**
 * Created by IntelliJ IDEA.
 * User: tingfeng
 * Date: 2017/5/11
 * Time: 21:48
 */

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class XiciIP extends Command
{

    protected $signature = 'xiciIp:get';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $url = "http://api.xicidaili.com/free2016.txt";
        $html = file_get_contents($url);
        $ips = explode('
', $html);
        foreach ($ips as $item)
        {
            $e = explode(':', $item);
            $data[] = [
                'ip' => $e[0],
                'port' => $e[1]
            ];
        }
        DB::table('xiciip')->delete();
        DB::table('xiciip')->insert($data);
        //dd($data);
    }
}