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

    public function myProfilePage() {        
        return view('admin.myprofile');
    }

    public function manageCategoryPage() {        
        return view('admin.managecategory');
    }

    public function manageProductsPage() {        
        return view('admin.manageproducts');
    }

    public function manageCustomerPage() {        
        return view('admin.managecustomer');
    }

    public function manageOrderPage() {        
        return view('admin.manageorder');
    }

  

    // Rules
    /**
     * Class - Capital first Later : MyControllerTwo (title case)
     * method - first later small camelCase - loadMyFunction
     * Variable - $abc, $myArray, $myArrayTwo
     */
}

