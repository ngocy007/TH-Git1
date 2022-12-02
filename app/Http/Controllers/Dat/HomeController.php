<?php

namespace App\Http\Controllers\Dat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Chuong;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $truyens = Truyen::get()->sortByDesc('LuotXem')->take(8);
        $truyenmois = DB::table('Chuong')
            ->join('Truyen', 'Chuong.MaTruyen', '=', 'Truyen.id')
            ->select('Truyen.*', 'Chuong.*')
            ->orderByDesc('Chuong.id')
            ->take(8)
            ->get();
        // danh gia cao
        $danhgiacaos = Truyen::get()->sortByDesc('DanhGiaTB')->take(8);
        // moi danh gia
        $danhgiamois = DB::table('binhluan')
            ->join('Truyen', 'binhluan.MaTruyen', '=', 'Truyen.id')
            ->join('users', 'binhluan.MaNguoiDung', '=', 'users.id')
            ->select('Truyen.*', 'binhluan.*', 'users.*')
            ->orderByDesc('binhluan.id')
            ->take(4)
            ->get();
        return view('home',
        compact(
            'truyens',
            'truyenmois',
            'danhgiacaos',
            'danhgiamois'
        ));
    }



}
