<?php

namespace App\Http\Controllers\Viet;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class timkiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        //$truyens = Truyen::query()->get()->partition(20);
        $theloai = TheLoai::get();
        //xu ly tim kiem
        if($request->filled('q')){
            $truyens = Truyen::search($request->q)->paginate(20)->appends(['q' => $q]);

        }else{
            $truyens = DB::table('Truyen')
                ->leftJoin('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,truyen.TenTacGia,count('MaNguoiDung') as theodoi"))
                ->groupBy('Truyen.id')
                ->paginate(20)->appends(['q' => $q]);
        }

        //$newtruyen =$truyens ->chuongs()->orderBy('SoChuong','desc')->first();
        return view('timkiem', compact('truyens','theloai'));
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
