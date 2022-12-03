@extends('master')

@section('main')
    @push('styles')

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css_phamanchi/truyen_index.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    @endpush

    <button type="button" class="btn btn-outline-primary waves-effect" class="themtruyen">
        <a id="themtruyen" href="anchi-truyen/create">
            <span id="icon-create">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-file-plus" viewBox="0 0 20 20">
                    <path
                        d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z" />
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                </svg>
            </span>
            <span>Thêm truyện mới</span>
        </a>
    </button>
    <h3>Truyện của tôi</h3>
    <p>Danh sách truyện đã đăng</p>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr style="text-align: center">
                                    <th><span>Ảnh</span></th>
                                    <th><span>Truyện</span></th>
                                    <th><span>Ngày tạo</span></th>
                                    <th class="text-center"><span>Trạng thái</span></th>
                                    <th><span>Số lượt xem</span></th>
                                    <th><span>Chức năng</span></th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" data-toggle="modal" data-target="#staticBackdrop" id="clickModal" hidden>
        
    </button>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Thông báo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Bạn có chắc chắn muốn xóa không ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"><a href="../" style="text-decoration: none; color: white">Quay lại</a></button>

              <form action="../../anchi-truyen/destroy/{{ $id }}"
                method="post" style="display: inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Xóa</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $("#clickModal").click();
        });
      </script>
@endsection
