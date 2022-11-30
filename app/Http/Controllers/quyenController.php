<?php

namespace App\Http\Controllers;

use App\Models\quyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class quyenController extends Controller
{
    public function index()
    {
       $quyens = quyen::query()->get();
       return view('quyens.index',['quyen'=>$quyens]);
    }
}
