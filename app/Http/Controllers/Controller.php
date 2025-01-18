<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class IconController extends Controller
// {
//     /**
//      *
//      * Iconデータ一覧を表示
//      *
//      */
//     public function index(){
    
// 	    return view('icon.index');
//     }

//     /**
//      *
//      * Iconデータ新規登録画面を表示
//      *
//      */
//     public function create(){
    
//   	    return view('icon.create');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
