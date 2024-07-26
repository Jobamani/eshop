<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {        
        return view('admin.dashboard');
    }

    public function loadBlankPage() {        
        return view('admin.blank');
    }

    public function categoryPage() {        
        return view('admin.category');
    }



    // Rules
    /**
     * Class - Capital first Later : MyControllerTwo (title case)
     * method - first later small camelCase - loadMyFunction
     * Variable - $abc, $myArray, $myArrayTwo
     */
}

