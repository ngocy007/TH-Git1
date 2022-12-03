<?php

namespace App\Http\Controllers\AnChi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CT_Loai;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnChiTruyenController extends Controller
{





   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
    public function index()
    {

       $idND = Auth::id();


        $truyens = Truyen::whereIn('MaNguoiDung', [$idND])->orderBy('updated_at','desc')->paginate(5);

        $theloais = DB::table('CT_Loai')
            ->join('TheLoai', 'TheLoai.id', '=', 'CT_Loai.MaLoai')
            ->join('Truyen', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
            ->where('MaNguoiDung', '=' , $idND)
            ->select('Truyen.id','Truyen.TenTruyen','TheLoai.TenLoai')
            ->get();
        //  dd($theloais);
        return view('anchi-truyen.index', ['truyens' => $truyens, "theloais" => $theloais]);
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
        return view('anchi-truyen.create', ["theloais" => $theloais]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $idND = Auth::id();

        if($request->file('AnhDaiDien') != null){
            $urlImage = 'image'.time().'.'.$request->AnhDaiDien->extension();
            $request->AnhDaiDien->move(public_path('images'), $urlImage);
        }
        else{
            $urlImage='null.png';
        }

        $truyen = Truyen::create([
                'TenTruyen' => $request->input('TenTruyen'),
                'AnhDaiDien' => $urlImage,
                'DanhGiaTB' => 0,
                'LuotXem' => 0,     
                'MoTa' => $request->input('MoTa'),
                'TrangThai' => $request->input('TrangThai'),
                'TenTacGia' => $request->input('TenTacGia'),
                'MaNguoiDung' => $idND,
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

       $idND = Auth::id();

        $truyen = Truyen::find($id);
        $theloais = TheLoai::all();
        $getloai = DB::table('CT_Loai')
            ->join('TheLoai', 'TheLoai.id', '=', 'CT_Loai.MaLoai')
            ->join('Truyen', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
            ->where('MaNguoiDung', '=' , $idND)
            ->where('MaTruyen', '=' , $id)
            ->select('TheLoai.id')
            ->get();
        return view('anchi-truyen.edit', ['truyen' => $truyen, 'theloais' => $theloais, 'getloai' => $getloai]);
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

       $idND = Auth::id();

        if($request->file('AnhDaiDien') != null){
            // $truyenImg=Truyen::whereIn('id', $id)->get();
            // // $folderPath=public_path($truyenImg->AnhDaiDien);
            // // File::deleteDirectory($folderPath);
            // $dd = Storage::disk('local')->delete('public/images/'.$truyenImg->AnhDaiDien);
            // dd($dd);

            $urlImage = 'image'.time().'-'.$request->TenTruyen.'.'.$request->AnhDaiDien->extension();
            $request->AnhDaiDien->move(public_path('images'), $urlImage);

            $truyen = Truyen::where('id', $id)->update([
                'TenTruyen' => $request->input('TenTruyen'),
                'AnhDaiDien' => $urlImage,
                'MoTa' => $request->input('MoTa'),
                'TrangThai' => $request->input('TrangThai'),
                'TenTacGia' => $request->input('TenTacGia'),
            ]);
        }
        else{
            $truyen = Truyen::where('id', $id)->update([
                'TenTruyen' => $request->input('TenTruyen'),
                'MoTa' => $request->input('MoTa'),
                'TrangThai' => $request->input('TrangThai'),
                'TenTacGia' => $request->input('TenTacGia'),
            ]);
        }

        $getloai = DB::table('CT_Loai')
            ->join('TheLoai', 'TheLoai.id', '=', 'CT_Loai.MaLoai')
            ->join('Truyen', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
            ->where('MaNguoiDung', '=' , $idND)
            ->where('MaTruyen', '=' , $id)
            ->select('TheLoai.id')
            ->get();

        foreach($getloai as $idloai){
            $delete_theloai = DB::table('CT_Loai')
            ->where('MaLoai',  (int)$idloai->id)
            ->where('MaTruyen' , $id);
            $delete_theloai->delete();
        }

        $theloai = $request->input('theloai');
        foreach($theloai as $value){
            CT_Loai::create([
                'MaTruyen' => $id,
                'MaLoai' => $value
            ]);
        }
        return redirect('anchi-truyen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submit_delete($id){
        return view('anchi-truyen.submit-xoa', ["id" => $id]);
    }
    public function destroy($id)
    {
        //
        $post = Truyen::find($id);
        $post->delete();    
        return redirect('anchi-truyen');
    }
}
