<?php

namespace App\Http\Controllers\Dat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Chuong;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $truyens = Truyen::get()->sortByDesc('LuotXem')->take(8);
        $truyenmois = DB::table('Chuong')
            ->join('Truyen', 'Chuong.MaTruyen', '=', 'Truyen.id')
            ->orderByDesc('Chuong.id')
            ->select('Truyen.*','Truyen.id as id_truyen', 'Chuong.*')
            ->take(8)
            ->get();
        // danh gia cao
        $danhgiacaos = Truyen::get()->sortByDesc('DanhGiaTB')->take(8);
        // moi danh gia
        $danhgiamois = DB::table('binhluan')
            ->join('Truyen', 'binhluan.MaTruyen', '=', 'Truyen.id')
            ->join('users', 'binhluan.MaNguoiDung', '=', 'users.id')
            ->select('Truyen.*', 'Truyen.id as id_truyen', 'binhluan.*', 'users.*')
            ->orderByDesc('binhluan.id')
            ->take(4)
            ->get();
        // dang doc


       // if (Auth::check()) {
       //
       //    $user = Auth::user();
       //    $user->history()->detach($chuong->id);
       //    $user->history()->attach(
       //        $id_truyen, ['MaChuong' => $chuong->id]
       //    );
       // }

       $truyenh = null;
       $temp = [];
       $history_novel = $request->cookie('history_novel');
       if (!is_null($history_novel)) {
          $temp = json_decode($history_novel, true);
       }
       if (Auth::check()) {
          $user = Auth::user();
          foreach ($temp as $key => $value) {
             $user->history()->detach($key);
             $user->history()->attach(
                 $key, ['MaChuong' => $value]
             );
          }
          $cloneTemp = null;

          foreach ($user->history as $h) {
              $cloneTemp[$h->id] = $h->pivot->MaChuong;
          }

          $temp = $cloneTemp;
       }

             $temp_key = array_keys($temp);
             $truyenh = Truyen::query()->findMany($temp_key)->take(5);


        return view('home',
        compact(
            'truyens',
            'truyenmois',
            'danhgiacaos',
            'danhgiamois',
            'truyenh',
            'temp',
        ));
    }



}
