<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class theloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $theloais['theloais']=TheLoai::paginate(4);
        return view('admintheloai.index',$theloais);

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
       return view('admintheloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       TheLoai::create($request->all());
       return redirect()->route('admintheloai.index')->with('thongbao','them thanh cong');
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
        $theloai=TheLoai::find($id);
        return view('admintheloai.edit',compact('theloai'));
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
       $theloai = TheLoai::find($id);
       $theloai->TenLoai = $request->TenLoai;
       $theloai->save();
       return redirect()->route('admintheloai.index')->with('thongbao','cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect()->route('admintheloai.index')->with('thongbao','Xóa thành công');
    }
}
