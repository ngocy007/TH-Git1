@extends('master')

@section('main')
    <div class="wrapper">
        <div class="container bg-indigo-500">
            <div id="listBook" class="page-content rounded-2" style="min-height: 800px;">
                <div class="row pt-2">
                    <div class="col-3">
                        <div class="list-group">
                            <a href="?sort=1" class="<?php
                            if (1 == $request->input('sort'))
                                echo "list-group-item list-group-item-action active";
                            else
                                echo "list-group-item list-group-item-action"
                            ?>">Top Lượt Xem</a>
                            <a href="?sort=2" class="<?php
                            if (2 == $request->input('sort'))
                                echo "list-group-item list-group-item-action active";
                            else
                                echo "list-group-item list-group-item-action"
                            ?>">Top Theo Dõi</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="list-group mb-2">
                            @if(count($data) > 0)

                                @foreach($data as $row)
                                    <div class="row">
                                        <div class="col-2 mb-1">
                                            <img src="{{$row->AnhDaiDien}}" class="img-fluid img-thumbnail"
                                                 style="height: 160px">
                                        </div>
                                        <div class="col-10 mb-6">
                                            <a href="{{route('xemtruyen',['id'=>$row->id])}}" class="list-group-item list-group-item-action rounded"
                                               aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $row->TenTruyen }}</h5>
                                                    <small>{{ $row->TrangThai }}</small>
                                                </div>
                                                <p class="mb-1 overflow-auto">{{ $row->MoTa }}</p>
                                                <small>Lượt xem: {{ $row->LuotXem }} Theo
                                                    dõi: {{ $row->theodoi }}</small>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Không có dữ liệu</h5>

                                    </div>
                                </a>
                            @endif
                        </div>
                        {!! $data->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

