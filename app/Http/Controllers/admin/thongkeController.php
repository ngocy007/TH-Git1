<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truyen;
use Illuminate\Support\Facades\DB;

class thongkeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tk_t = DB::table('truyen')
            ->selectRaw('count(*) as truyen')
            ->first();
        $tk_c = DB::table('chuong')
            ->selectRaw('count(*) as chuong')
            ->first();
        $tk_u = DB::table('users')
            ->selectRaw('count(*) as user')
            ->first();
        $tk_b = DB::table('binhluan')
            ->selectRaw('count(*) as binhluan')
            ->first();
        $tk_tl = DB::table('theloaiController')
            ->selectRaw('count(*) as theloaiController')
            ->first();
        $tk_q = DB::table('Quyen')
            ->selectRaw('count(*) as quyen')
            ->first();
        return view('adminthongke.index',compact('tk_t','tk_c','tk_u','tk_b','tk_tl','tk_q'));
    }

    public function thongke_user()
    {

    }
    public function thongke_binhluan()
    {

    }


}
