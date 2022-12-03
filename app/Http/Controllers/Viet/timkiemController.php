<?php

namespace App\Http\Controllers\Viet;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class timkiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $ts = $request->input('l');
        // debug $check= !$request->filled('l');
        $theloai = TheLoai::get();
        $theloais = null;
        $truyens = null;
        $status = null;
        //xu ly tim kiem theo ten
        if ($request->filled('q')) {
            $truyens = Truyen::search($request->q)//                ->paginate(20)
            ;

        }
        /*else{
            $truyens = DB::table('Truyen')
                ->leftJoin('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,truyen.TenTacGia,count('MaNguoiDung') as theodoi"))
                ->groupBy('Truyen.id');
                ->paginate(20)->appends(['q' => $q]);
        }*/
        // xu ly tim kiem theo the loai
        /*        SELECT `truyen`.`id`,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,truyen.TenTacGia,count('MaNguoiDung') as theodoi,ct_loai.MaLoai
        FROM `truyen`
        left JOIN `theodoi`
        ON `truyen`.id = theodoi.MaTruyen
        INNER JOIN `ct_loai`
        ON `truyen`.id = ct_loai.MaTruyen
        WHERE ct_loai.MaLoai='2'
        GROUP BY ct_loai.MaLoai,truyen.id;*/
        if ($request->filled('l') and $request->filled('q')) {
            //dd('filled both');
            $theloais = DB::table('TheLoai')
                ->select('*')
                ->where('id', '=', $ts)
                ->get();
            $truyens = DB::table('Truyen')
                ->leftJoin('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                ->leftJoin('CT_Loai', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
                ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,truyen.TenTacGia,count('MaNguoiDung') as theodoi,CT_Loai.MaLoai"))
                ->groupBy('CT_Loai.Maloai', 'truyen.id')
//                ->where('CT_Loai.MaLoai',"=",$ts)
                ->whereRaw("CT_Loai.MaLoai =" . $ts . " AND truyen.TenTruyen LIKE '%" . $q . "%' ")//                ->paginate(20)
            ;
            //dd('filled both and DB but not paginate');
        } else {
            if ($request->filled('l') and !$request->filled('q')) {
                //dd('filled l');
                $truyens = DB::table('Truyen')
                    ->leftJoin('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                    ->leftJoin('CT_Loai', 'Truyen.id', '=', 'CT_Loai.MaTruyen')
                    ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,truyen.TenTacGia,count('MaNguoiDung') as theodoi,CT_Loai.MaLoai"))
                    ->groupBy('CT_Loai.Maloai', 'truyen.id')
                    ->where('CT_Loai.MaLoai', "=", $ts)//                    ->paginate(20)
                ;
                $theloais = DB::table('TheLoai')
                    ->select('TenLoai')
                    ->where('id', '=', $ts)
                    ->get();
            } else {
                if (!$request->filled('l') and !$request->filled('q')) {
                    //dd('filled none');
                    $truyens = DB::table('Truyen')
                        ->leftJoin('TheoDoi', 'Truyen.id', '=', 'TheoDoi.MaTruyen')
                        ->select(DB::raw("Truyen.id,truyen.AnhDaiDien,truyen.TenTruyen,truyen.LuotXem,truyen.MoTa,truyen.TrangThai,truyen.TenTacGia,count('MaNguoiDung') as theodoi"))
                        ->groupBy('Truyen.id')//                        ->paginate(20)->appends(['q' => $q])
                    ;
                }
            }
        }
        if ($request->filled('sta')) {
            if ($request->input('sta') == 1)
                $truyens = $truyens->where('TrangThai', '=', 'Hoàn Thành');
            else {
                $truyens = $truyens->where('TrangThai', '=', 'Đang ra');
            }
        }
        /*else
            $truyens=$truyens->paginate(20);*/
        if ($request->filled('sort')) {
            if ($request->input('sort') == 1)
                $truyens = $truyens->orderBy('Truyen.updated_at','desc')->paginate(20);
            if ($request->input('sort') == 2)
                $truyens = $truyens->orderBy('Truyen.created_at','desc')->paginate(20);
            if ($request->input('sort') == 3)
                $truyens = $truyens->orderBy('truyen.LuotXem','desc')->paginate(20);
            if ($request->input('sort') == 4)
                $truyens = $truyens->orderBy('theodoi','desc')->paginate(20);
        } else
            $truyens = $truyens->paginate(20);

        //$newtruyen =$truyens ->chuongs()->orderBy('SoChuong','desc')->first();
        return view('timkiem', compact('truyens', 'theloai', 'request', 'theloais'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
