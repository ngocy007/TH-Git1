<?php

namespace App\Http\Controllers\y;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\Chuong;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class chuongController extends Controller
{


    public function show($id_truyen,$id_chuong,Request $request)
    {

       $history_novel = $request->cookie('history_novel');
       $chuong = Chuong::query()
           ->where('SoChuong',$id_chuong)
           ->where('MaTruyen',$id_truyen)
           ->firstOrFail();
       $truyen = Truyen::query()->find($id_truyen);
       $truyen->LuotXem++;
       $truyen->save();
       $maxChuong = $truyen->chuongs()->orderBy('SoChuong','desc')->first()->SoChuong;
       $commentsPaginate = $chuong->truyen->comments()->orderBy('created_at','desc')->paginate(10);

       if (Auth::check()) {

             $user = Auth::user();
                $user->history()->detach($chuong->id);
                $user->history()->attach(
                    $id_truyen, ['MaChuong' => $chuong->id]
                );
       }

       if (!is_null($history_novel)) {
          $temp = json_decode($history_novel, true);
       }

       $temp[$chuong->truyen->id] =  $id_chuong;
       $temp                      = json_encode($temp, JSON_THROW_ON_ERROR);
       $cookie                    = cookie('history_novel', $temp, 60);

       return Response(view('y.doctruyen',
           compact(
               'chuong','maxChuong','commentsPaginate'
           )))->withCookie($cookie);
    }

    function  create_comment($id_truyen,$id_chuong,Request $request)
    {
       $id_user = Auth::id();
       $truyen = Truyen::query()->findOrFail($id_truyen);

       BinhLuan::create([
           'NoiDungBL' => $request->input('content'),
           'MaTruyen' => $truyen->id,
           'MaNguoiDung' => $id_user,
       ]);

       $chuong = Chuong::query()
           ->where('SoChuong',$id_chuong)
           ->where('MaTruyen',$id_truyen)
           ->firstOrFail();

       $maxChuong = $truyen->chuongs()->orderBy('SoChuong','desc')->first()->SoChuong;
       $commentsPaginate = $chuong->truyen->comments()->orderBy('created_at','desc')->paginate(10);

       return Response(view('y.doctruyen',
           compact(
               'chuong','maxChuong','commentsPaginate'
           )));
    }

   public function removeComment($id,$id_chuong,)
   {

      $binhluan = BinhLuan::find($id);

      if (!Gate::allows('delete-post', $binhluan)) {
         abort(403);
      }

      $id = $binhluan->Truyen2->id;
      $truyen = Truyen::query()->find($id);

      $binhluan->delete();

      $chuong = Chuong::query()
          ->where('SoChuong',$id_chuong)
          ->where('MaTruyen',$truyen->id)
          ->firstOrFail();

      $maxChuong = $truyen->chuongs()->orderBy('SoChuong','desc')->first()->SoChuong;
      $commentsPaginate = $chuong->truyen->comments()->orderBy('created_at','desc')->paginate(10);

      return Response(view('y.doctruyen',
          compact(
              'chuong','maxChuong','commentsPaginate'
          )));
   }

}
