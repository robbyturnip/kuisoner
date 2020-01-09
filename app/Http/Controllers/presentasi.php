<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;

class presentasi extends Controller
{
    public function home(){
        
        return View::make('myadmin.content.presentasi');
    }
}
