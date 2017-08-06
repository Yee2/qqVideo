<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Kuaisan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caipiao:kuaisan';

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
        $url = 'http://shk3.icaile.com/?op=hzzs';
        $dom = \phpQuery::newDocumentFileHTML($url);
        $qh = $dom->find('td.chart-bg-qh');
        $kjhm = $dom->find('td.chart-bg-kjhm');
        foreach ($qh as $key => $item){
            $itemQh = pq($item)->text();
            $itemkjhm = pq($kjhm->eq($key))->text();
            $data[] = [
                'qh' => $itemQh,
                'kjhm' => $itemkjhm
            ];
        }
        dd($data);
    }
}
