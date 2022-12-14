<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function categories(){
        return view('Dashboard.categories.index');
    }

    public function createCategory(){
        return view('Dashboard.categories.create');
    }

    public function editCategory($id){
        return view('Dashboard.categories.edit');
    }

    public function tables(){
        return view('Dashboard.tables.index');
    }

    public function createTable(){
        return view('Dashboard.tables.create');
    }

    public function editTable($id){
        return view('Dashboard.tables.edit');
    }
}
