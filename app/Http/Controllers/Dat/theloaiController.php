<?php

namespace App\Http\Controllers\Dat;

use App\Http\Controllers\Controller;
use App\Models\CT_Loai;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class theloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id;
        $data = DB::table('CT_Loai')
            ->join('Truyen', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
            ->join('TheLoai','TheLoai.id', '=', 'CT_Loai.MaLoai')
            ->where('CT_Loai.MaLoai' ,'=',$id)
            ->select('Truyen.*', 'TheLoai.*')
            ->paginate(5);
        return view('Home.theloai',
            compact('data'
        ));
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
