<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show(){
    $projects = DB::table('projects')->get();
    return view('welcome')->with('projects', $projects);
    }

    public function create(){
        echo "create";
    }

    public function store(){
        echo "store";
    }

    public function edit(){
        echo "edit";
    }

    public function update(){
        echo "update";
    }

    public function delete(){
        echo "delete";
    }

}