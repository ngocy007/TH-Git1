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
        $theloai = TheLoai::all();
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
            'theloai',
            'truyens',
            'truyenmois',
            'danhgiacaos',
            'danhgiamois'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
