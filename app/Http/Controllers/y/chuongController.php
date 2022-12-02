<?php

namespace App\Http\Controllers\y;

use App\Http\Controllers\Controller;
use App\Models\Chuong;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class chuongController extends Controller
{


    public function show($id_truyen,$id_chuong,Request $request)
    {

       $history_novel = $request->cookie('history_novel');
       $chuong = Chuong::query()->where('SoChuong',$id_chuong)
           ->where('MaTruyen',$id_truyen)->firstOrFail();

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
               'chuong',
           )))->withCookie($cookie);
    }


}
