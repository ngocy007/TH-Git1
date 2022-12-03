<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BTTHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BTTH.array-string-function');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BTTH.phpform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function phpsql(Request $request)
    {
        return view('BTTH.phpmysql');
    }
    public function store(Request $request)
    {
        return view('BTTH.phpmysql');
    }
    public function btarray1(Request $request)
    {
        return view('BTTH.btarray1');
    }
    public function btarray2(Request $request)
    {
        return view('BTTH.btarray2');
    }
    public function btarray3(Request $request)
    {
        return view('BTTH.btarray3');
    }
    public function btarray4(Request $request)
    {
        return view('BTTH.btarray4');
    }
    public function btarray5(Request $request)
    {
        return view('BTTH.btarray5');
    }
    public function btarray6(Request $request)
    {
        return view('BTTH.btarray6');
    }
    public function btarray7(Request $request)
    {
        return view('BTTH.btarray7');
    }
    public function bai1pf(Request $request)
    {
        return view('BTTH.bai1pf');
    }public function bai2pf(Request $request)
    {
        return view('BTTH.bai2pf');
    }public function bai3pf(Request $request)
    {
        return view('BTTH.bai3pf');
    }public function bai4pf(Request $request)
    {
        return view('BTTH.bai4pf');
    }public function bai5pf(Request $request)
    {
        return view('BTTH.bai5pf');
    }
    public function bai6_7pf(Request $request)
    {
        return view('BTTH.bai6_7.bai6pf');
    }public function bai6_7pf1(Request $request)
    {
        return view('BTTH.bai6_7.pheptoan');
    }
    public function bai8pf(Request $request)
    {
        return view('BTTH.bai8.form');
    }
    public function bai8pf1(Request $request)
    {
        return view('BTTH.bai8.configpf');
    }
    public function pm2_1(Request $request)
    {
        return view('BTTH.2_1');
    }public function pm2_2(Request $request)
    {
        return view('BTTH.2_2');
    }public function pm2_3(Request $request)
    {
        return view('BTTH.2_3');
    }public function pm2_4(Request $request)
    {
        return view('BTTH.2_4');
    }public function pm2_5(Request $request)
    {
        return view('BTTH.2_5');
    }public function pm2_6(Request $request)
    {
        return view('BTTH.2_6');
    }public function pm2_71(Request $request)
    {
        return view('BTTH.2_7_1');
    }public function pm2_72(Request $request)
    {
        return view('BTTH.2_7_2');
    }public function pm2_8(Request $request)
    {
        return view('BTTH.2_8');
    }public function pm2_9(Request $request)
    {
        return view('BTTH.2_9');
    }public function pm2_10(Request $request)
    {
        return view('BTTH.2_10');
    }public function pm2_11(Request $request)
    {
        return view('BTTH.2_11');
    }public function pm2_121(Request $request)
    {
        return view('BTTH.2_12_1');
    }public function pm2_122(Request $request)
    {
        return view('BTTH.2_12_2');
    }
    public function pm2_123(Request $request)
    {
        return view('BTTH.2_12_3');
    }public function conect(Request $request)
    {
        return view('BTTH.conect');
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
