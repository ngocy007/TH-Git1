<?php

namespace App\Http\Controllers\Viet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truyen;
use Illuminate\Support\Facades\DB;


class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {   // luot xem
        $data = DB::table('Truyen')
            ->leftJoin('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
            ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,count('MaNguoiDung') as theodoi"))
            ->groupBy('Truyen.id')
            ->orderBy('truyen.LuotXem','desc')
            ->paginate(5)->appends(['sort' => '1']);
        // theo doi
        if(2 == $request->input('sort')){
            $data = DB::table('Truyen')
                ->join('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,count('MaNguoiDung') as theodoi"))
                ->groupBy('Truyen.id')
                ->orderBy('theodoi','desc')
                ->paginate(5)->appends(['sort' => '2']);
            //select `Truyen`.`id`,COUNT(`TheoDoi`.`MaNguoiDung`) as `theodoi`  from `Truyen`,`TheoDoi` WHERE `Truyen`.`id`=`TheoDoi`.`MaTruyen` group by `Truyen`.`id` ORDER by `Truyen`.`id`;
        }
        // moi cap nhat
        if(3 == $request->input('sort')){
            $data = DB::table('Truyen')
                ->join('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                ->join('Chuong', 'Truyen.id', '=', 'Chuong.MaTruyen')
                ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,count('MaNguoiDung') as theodoi"))
                ->groupBy('Chuong.id')
                ->orderBy('Chuong.id','desc')
                ->paginate(5)->appends(['sort' => '3']);
        }
        // danh gia cao
        if(4 == $request->input('sort')){
            $data = DB::table('Truyen')
                ->join('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,count('MaNguoiDung') as theodoi"))
                ->groupBy('Truyen.id')
                ->orderBy('Truyen.DanhGiaTB','desc')
                ->paginate(5)->appends(['sort' => '4']);
        }
        return view('leaderboard', compact('data','request'))->with('i', (\request()->input('page', 1)-1)*5);
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
