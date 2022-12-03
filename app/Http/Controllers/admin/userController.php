<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quyen;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users['users']=User::paginate(4);
        return view('adminuser.index',$users);

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
        $quyens['quyens']=Quyen::all();
        return view('adminuser.create',$quyens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('adminuser.index')->with('thongbao','Thêm thành công');
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
        $user=User::find($id);
        $quyen=Quyen::all();
        return view('adminuser.edit',compact('user','quyen'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        //$user->email_verified_at = $request->email_verified_at;
        $user->password = password_hash($request->password,PASSWORD_DEFAULT);
        //$user->password = $request->password;
       // $user->two_factor_secrect = $request->two_factor_secrect;
        $user->NickName = $request->NickName;
        $user->SDT = $request->SDT;
        $user->MaQuyen = $request->MaQuyen;
        $user->save();
        return redirect()->route('adminuser.index')->with('thongbao','cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('adminuser.index')->with('thongbao','Xóa thành công');
    }
}
