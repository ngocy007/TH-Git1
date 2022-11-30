<?php

namespace App\Http\Controllers\anchi;

use App\Http\Controllers\Controller;
use App\Models\CT_Loai;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Models\Truyen;
use Illuminate\Support\Facades\DB;

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
        $id = 1;

        //$truyens = Truyen::all();
        $truyens = Truyen::whereIn('MaNguoiDung', [$id])->paginate(5);

        $theloais = DB::table('CT_Loai')
            ->join('TheLoai', 'TheLoai.id', '=', 'CT_Loai.MaLoai')
            ->join('Truyen', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
            ->where('MaNguoiDung', '=' , $id)
            ->select('Truyen.id','Truyen.TenTruyen','TheLoai.TenLoai')
            ->get();
        //  dd($theloais);
        return view('truyen.index', ['truyens' => $truyens, "theloais" => $theloais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $theloais = TheLoai::all();
        return view('truyen.create', ["theloais" => $theloais]);
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

        $theloais = $request->input('theloai');
        //dd($theloais);
        foreach($theloais as $value){
            CT_Loai::create([
                'MaTruyen' => $truyen->id,
                'MaLoai' => $value
            ]);
        }

        //dd($truyen->id);

        return redirect('anchi-truyen');
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
        $post = Truyen::find($id);
        $post->delete();    
        return redirect('anchi-truyen');
    }
}
