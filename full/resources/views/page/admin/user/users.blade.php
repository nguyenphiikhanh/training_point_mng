@extends('page.layouts.layout')

@section('title')
    <title>Quản lí người dùng - Hệ thống Quản lí điểm rèn luyện</title>
@endsection

@section('css')
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Responsive tables start -->
        <div class="row" id="table-responsive">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Quản lý người dùng</h4>
              </div>
              <div class="card-body">
                <div class="text-end">
                  <button class="btn btn-md round btn-success" data-bs-toggle="modal"
                    data-bs-target="#add-user">Thêm người dùng</button>
                </div>
              </div>
              <div class="table-responsive">
                <div class="col-md-4">
                    <form action="" method="get" name="filter_by_khoa">
                        <label class="float-left" for="">Lọc theo khoa</label>
                        <select class="form-select" onchange="filter()" name="khoa_filter">
                            <option value="">---Không chọn---</option>
                            @foreach($list_khoa as $khoa)
                            <option value="{{$khoa->id}}" {{Request::get('khoa_filter') == $khoa->id ? 'selected' : ''}}>{{$khoa->ten_khoa}}</option>
                            @endforeach
                          </select>
                    </form>
                </div>
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="text-nowrap">STT</th>
                      <th scope="col" class="text-nowrap">Tên đăng nhập</th>
                      <th scope="col" class="text-nowrap">Họ tên</th>
                      <th scope="col" class="text-nowrap">Vai trò</th>
                      <th scope="col" class="text-nowrap">Khoa</th>

                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listUsers as $index => $user)
                    <tr>
                      <td class="text-nowrap">{{ $index + 1 }}</td>
                      <td class="text-nowrap">{{ $user->username }}</td>
                      <td class="text-nowrap">{{ $user->first_name. " ".$user->last_name  }}</td>
                      <td class="text-nowrap">{{ \App\Http\Utils\RoleUtils::getRoleName($user->role)}}</td>
                      <td class="text-nowrap">{{ $user->tenKhoa}}</td>

                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                            data-bs-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                              data-bs-target="#edit-user-{{$index}}">
                              <i data-feather="edit-2" class="me-50"></i>
                              <span>Sửa</span>
                            </a>
                            <a class="dropdown-item" href="#" onclick="deleteUser(`{{ route('page.user.delete',[$user->id]) }}`)">
                              <i data-feather="trash" class="me-50"></i>
                              <span>Xoá</span>
                            </a>
                          </div>
                        </div>
                      </td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @if ($listUsers->count())
            <div class="d-flex justify-content-center">{{$listUsers->links('pagination::bootstrap-4')}}</div>
            @else
            <div class="d-flex justify-content-center"><span>Không có dữ liệu</span></div>
            @endif
          </div>
        </div>
        <!-- Responsive tables end -->
        <!-- Modal -->
        <div class="modal fade" id="add-user" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thêm người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('page.user.store')}}" class="form form-vertical">
                    @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-1">
                        <label class="form-label">Họ và tên đệm</label>
                        <input type="text"  class="form-control" name="first_name"
                          placeholder="Họ và tên đệm" required/>
                      </div>
                      <div class="mb-1">
                        <label class="form-label">Tên</label>
                        <input type="text" class="form-control" name="last_name"
                          placeholder="Tên" required/>
                      </div>
                      <div class="mb-1">
                        <label class="form-label" for="userName">Tên đăng nhập</label>
                        <input type="text" id="userName" class="form-control" name="username"
                          placeholder="Tên đăng nhập" required/>
                      </div>
                        <div class="mb-1">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="Mật khẩu đăng nhập" required/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="role_flg">Vai trò</label>
                            <select class="form-select" id="role_flg" name="role">
                              <option value="">---Chọn vai trò---</option>
                              <option value="{{\App\Http\Utils\RoleUtils::ROLE_BCN_KHOA}}">{{\App\Http\Utils\RoleUtils::getRoleName(\App\Http\Utils\RoleUtils::ROLE_BCN_KHOA)}}</option>
                              <option value="{{\App\Http\Utils\RoleUtils::ROLE_QLSV}}">{{\App\Http\Utils\RoleUtils::getRoleName(\App\Http\Utils\RoleUtils::ROLE_QLSV)}}</option>
                              <option value="{{\App\Http\Utils\RoleUtils::ROLE_CVHT}}">{{\App\Http\Utils\RoleUtils::getRoleName(\App\Http\Utils\RoleUtils::ROLE_CVHT)}}</option>
                            </select>
                          </div>
                      <div class="mb-1">
                        <label class="form-label" for="id_khoa">Khoa</label>
                        <select class="form-select" id="id_khoa" name="id_khoa">
                          <option value="">---Chọn khoa---</option>
                          @foreach($list_khoa as $khoa)
                          <option value="{{$khoa->id}}">{{$khoa->ten_khoa}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" onclick="validInfo(event,'role_flg','id_khoa')" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Vertical modal end-->
        @foreach ($listUsers as $index => $user)
        <div class="modal fade" id="edit-user-{{$index}}" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Sửa thông tin người dùng</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ route('page.user.update',[$user->id])}}" class="form form-vertical">
                  @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="mb-1">
                      <label class="form-label">Họ và tên đệm</label>
                      <input type="text"  class="form-control" name="first_name"
                        placeholder="Họ và tên đệm" value="{{$user->first_name}}" required/>
                    </div>
                    <div class="mb-1">
                      <label class="form-label">Tên</label>
                      <input type="text" class="form-control" name="last_name"
                        placeholder="Tên" value="{{$user->last_name}}" required/>
                    </div>
                    <div class="mb-1">
                      <label class="form-label">Tên đăng nhập</label>
                      <input type="text" class="form-control" name="username"
                        placeholder="Tên đăng nhập" value="{{$user->username}}" required/>
                    </div>
                      <div class="mb-1">
                          <label class="form-label" for="role_flg_{{$index}}">Vai trò</label>
                          <select class="form-select" id="role_flg_{{$index}}" name="role">
                            <option value="">---Chọn vai trò---</option>
                            <option {{$user->role == \App\Http\Utils\RoleUtils::ROLE_BCN_KHOA ? 'selected' : ''}} value="{{\App\Http\Utils\RoleUtils::ROLE_BCN_KHOA}}">{{\App\Http\Utils\RoleUtils::getRoleName(\App\Http\Utils\RoleUtils::ROLE_BCN_KHOA)}}</option>
                            <option {{$user->role == \App\Http\Utils\RoleUtils::ROLE_QLSV ? 'selected' : ''}} value="{{\App\Http\Utils\RoleUtils::ROLE_QLSV}}">{{\App\Http\Utils\RoleUtils::getRoleName(\App\Http\Utils\RoleUtils::ROLE_QLSV)}}</option>
                            <option {{$user->role == \App\Http\Utils\RoleUtils::ROLE_CVHT ? 'selected' : ''}} value="{{\App\Http\Utils\RoleUtils::ROLE_CVHT}}">{{\App\Http\Utils\RoleUtils::getRoleName(\App\Http\Utils\RoleUtils::ROLE_CVHT)}}</option>
                          </select>
                        </div>
                    <div class="mb-1">
                      <label class="form-label" for="id_khoa_{{$index}}">Khoa</label>
                      <select class="form-select" id="id_khoa_{{$index}}" name="id_khoa">
                        <option value="">---Chọn khoa---</option>
                        @foreach($list_khoa as $khoa)
                        <option {{$user->id_khoa == $khoa->id ? 'selected' : ''}} value="{{$khoa->id}}">{{$khoa->ten_khoa}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" onclick="validInfo(event,'role_flg_{{$index}}','id_khoa_{{$index}}')" class="btn btn-primary">Lưu</button>
                  <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        function deleteUser(delete_domain) {
            Swal.fire({
                title: 'Chú ý, bạn không thể hoàn tác hành động này!',
                text: "Xoá người dùng này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Có, Xoá!',
                cancelButtonText: 'Huỷ'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = delete_domain;
                }
            })
        }

        @if (\Session::has('success'))
            Swal.fire({
                title: 'Thông báo!',
                text: `{!! \Session::get('success') !!}`,
                icon: 'success',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        @endif

        @if ($errors->any())
            Swal.fire({
                title: 'Lỗi!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        @elseif (\Session::has('error'))
            Swal.fire({
                title: 'Lỗi!',
                text: `{!! \Session::get('error') !!}`,
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        @endif
    </script>
    <script src="{{ asset('app-assets/js/customize/user.js')}}"></script>
@endsection
