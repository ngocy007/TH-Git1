<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truyen;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$id = Auth::user()->id;
        $id = 18;

        //$truyens = Truyen::all();
        $truyens = Truyen::whereIn('MaNguoiDung', [$id])->get();
        return view('truyen.index', ['truyens' => $truyens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('truyen.create');
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
        $urlImage = 'image'.time().'-'.$request->TenTruyen.'.'.$request->AnhDaiDien->extension();
        $request->AnhDaiDien->move(public_path('images'), $urlImage);

        $truyen = Truyen::create([
                'TenTruyen' => $request->input('TenTruyen'),
                'AnhDaiDien' => $urlImage,
                'DanhGiaTB' => 0,
                'LuotXem' => 0,     
                'MoTa' => $request->input('MoTa'),
                'TrangThai' => $request->input('TrangThai'),
                'TenTacGia' => $request->input('TenTacGia'),
                'MaNguoiDung' => $request->input('MaNguoiDung'),
        ]);
        $truyen->save();
        return redirect('truyen');
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
