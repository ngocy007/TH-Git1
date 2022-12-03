<?php

namespace App\Http\Controllers\AnChi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chuong;
use App\Models\Truyen;
use Illuminate\Support\Facades\DB;


class AnChiChuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTruyen)
    {
        //
        //
        $chuongs = Chuong::whereIn('MaTruyen', [$idTruyen])->paginate(20);

        $truyen = Truyen::whereIn('id', [$idTruyen])->get();
        // dd($truyen);

        return view('anchi-chuong.index', ['chuongs' => $chuongs, "idTruyen" => $idTruyen, "truyen" => $truyen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idTruyen)
    {
        //
        return view('anchi-chuong.create', ["idTruyen" => $idTruyen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idTruyen,Request $request)
    {
        //
        //
        $number_chuong = DB::table('Chuong')
            ->where('MaTruyen', '=' , $idTruyen)
            ->select('id')
            ->count();
        Chuong::create([
            'MaTruyen' => $idTruyen,
            'SoChuong' => $number_chuong+1,
            'TenChuong' => $request->input('TenChuong'),
            'NoiDung' => $request->input('NoiDung'),
        ]);


        return redirect('anchi-chuong/'.$idTruyen);
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
    public function edit($idTruyen, $id)
    {
        //
        $chuong = DB::table('Chuong')
        ->where('id', $id)
        ->where('MaTruyen' , $idTruyen)->get();

        return view('anchi-chuong.edit', ['id' => $id, 'idTruyen' => $idTruyen, "chuong" => $chuong[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTruyen, $id)
    {
        //
        DB::table('Chuong')->where('id', $id)->where('MaTruyen', $idTruyen)->update([
            'TenChuong' => $request->input('TenChuong'),
            'NoiDung' => $request->input('NoiDung'),
        ]);


        return redirect('anchi-chuong/'.$idTruyen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTruyen)
    {
        //
        $number_chuong = DB::table('Chuong')
            ->where('MaTruyen', '=' , $idTruyen)
            ->select('id')
            ->count();

        DB::table('Chuong')
        ->where('SoChuong', $number_chuong)
        ->where('MaTruyen', $idTruyen)->delete();
        
        return redirect('anchi-chuong/'.$idTruyen);
    }
}
