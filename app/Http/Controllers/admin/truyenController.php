<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;

class truyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truyens['truyens']=Truyen::paginate(4);
        return view('admintruyen.index',$truyens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        return view('admintruyen.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Truyen::create($request->all());
        return redirect()->route('admintruyen.index')->with('thongbao','Thêm thành công');
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
        $truyen=Truyen::find($id);
        return view('admintruyen.edit',compact('truyen'));
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
        $truyen=Truyen::find($id);
        $truyen->TenTruyen=$request->TenTruyen;
        $truyen->AnhDaiDien=$request->AnhDaiDien;
        $truyen->DanhGiaTB=$request->DanhGiaTB;
        $truyen->LuotXem=$request->LuotXem;
        $truyen->MoTa=$request->MoTa;
        $truyen->TrangThai=$request->TrangThai;
        $truyen->TenTacGia=$request->TenTacGia;
        $truyen->MaNguoiDung=$request->MaNguoiDung;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen=Truyen::find($id);
        $truyen->delete();
        return redirect()->route('admintruyen.index')->with('thongbao','Xóa thành công');
    }
}
