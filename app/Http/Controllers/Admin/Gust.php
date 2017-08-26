<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 2017/8/26
 * Time: 17:50
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class Gust
{
    public function __construct()
    {
        
    }

    public function login(Request $request)
    {
        if($request->ajax()){

        }
        return view('admin.login');
    }
}