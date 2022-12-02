<?php

namespace App\Http\Controllers\y;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\CT_Loai;
use App\Models\LichSu;
use App\Models\TheLoai;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class truyenController extends Controller
{

    public function show($id,Request $request)
    {

            $truyens = Truyen::query()->findOrFail($id);
            $newtruyen =$truyens ->chuongs()->orderBy('SoChuong','desc')->first();

            $truyenSam = Truyen::query()->where('TenTacGia',$truyens->TenTacGia)->get();
            if (Auth::check())
            {
               //chạy 1 lần khi đăng nhập k biết bỏ đâu
               $history_novel = $request->cookie('history_novel');
               if (!is_null($history_novel)) {
                  $temp = json_decode($history_novel, true);
                  $user = Auth::user();

                  foreach ($temp as $key => $value)
                  {
                     $user->history()->detach($key);
                     $user->history()->attach(
                         $key , ['MaChuong' => $value]
                     );
                  }
               }
            ////////////////////////////////


              $chuong = $temp[$id] ?? 0 ;

               $f = 0;
               foreach ($truyens->users as $u)
               {
                  if ($u->id === Auth::id())
                  {
                     $f = 1;
                     break;
                  }
               }


               return view('y.truyen',compact(
                   'truyens', 'f', 'chuong', 'newtruyen','truyenSam'
               ));
            }

       $history_novel = $request->cookie('history_novel');

             $chuong = 0;
            if (!is_null($history_novel))
            {
               $temp = json_decode($history_novel, true);
               if (array_key_exists($truyens->id,$temp))
               {
                  $chuong = $temp[$truyens->id];
               }
            }


       return view('y.truyen',compact(
           'truyens', 'chuong', 'newtruyen','truyenSam'
       ));
    }

    public  function follow($id)
    {
         $id_user = Auth::id();
       $truyens = Truyen::query()->find($id);
       $truyens->User()->toggle($id_user);
       return redirect(route('xemtruyen',['id'=>$truyens->id]));
    }

   public  function create_comment($id,Request $request)
   {
      $id_user = Auth::id();
      $truyens = Truyen::query()->findOrFail($id);

      BinhLuan::create([
          'NoiDungBL' => $request->content,
          'MaTruyen' => $truyens->id,
          'MaNguoiDung' => $id_user,
      ]);

      return redirect(route('xemtruyen',['id'=>$truyens->id]));
   }


}
