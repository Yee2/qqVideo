<?php
/**
 * Created by IntelliJ IDEA.
 * User: feizhugame
 * Date: 2017/9/5
 * Time: 12:26
 */

namespace App\Http\Controllers\Admin;


class Index extends Base
{
    public function index()
    {
        return view('admin.Index.index');
    }
}