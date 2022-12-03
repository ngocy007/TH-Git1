<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quyen;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class quyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quyens['quyens']=Quyen::paginate(4);
        return view('adminquyen.index',$quyens);
    }
    public function index2()
    {

        return view('adminindex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminquyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Quyen::create($request->all());
        return redirect()->route('adminquyen.index')->with('thongbao','them thanh cong');
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
        $quyen=Quyen::find($id);
        return view('adminquyen.edit',compact('quyen'));
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
        $quyen = Quyen::find($id);
        $quyen->TenQuyen = $request->TenQuyen;
        $quyen->ChucNang = $request->ChucNang;
        $quyen->save();
        return redirect()->route('adminquyen.index')->with('thongbao','cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quyen = Quyen::find($id);
        $quyen->delete();
        return redirect()->route('adminquyen.index')->with('thongbao','Xóa thành công');
    }
}
