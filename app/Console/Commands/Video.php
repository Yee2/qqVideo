<?php
/**
 * Created by IntelliJ IDEA.
 * User: tingfeng
 * Date: 2017/5/30
 * Time: 20:02
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Video extends Command
{
    protected $signature = 'video:create';

    protected $description = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data = \App\Video::orderBy('id', 'desc')->limit(50)->get();
        $viewData = view('Video.index', compact('data'));
        file_put_contents(storage_path('github/index.html'), $viewData->__toString());
    }
}