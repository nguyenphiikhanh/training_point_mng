@extends('page.layouts.layout')

@section('title')
    <title>Quản lí Lớp - Hệ thống Quản lí điểm rèn luyện</title>
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
                    data-bs-target="#exampleModalCenter">Thêm người dùng</button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="text-nowrap">STT</th>
                      <th scope="col" class="text-nowrap">Tên đăng nhập</th>
                      <th scope="col" class="text-nowrap">Họ và tên</th>
                      <th scope="col" class="text-nowrap">Ngày sinh</th>
                      <th scope="col" class="text-nowrap">Giới tính</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td class="text-nowrap">1</td>
                        <td class="text-nowrap">695105006</td>
                        <td class="text-nowrap">Nguyên Thị A</td>
                        <td class="text-nowrap">05/05/2001</td>
                        <td class="text-nowrap">Nữ</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                              data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                                <i data-feather="edit-2" class="me-50"></i>
                                <span>Edit</span>
                              </a>
                              <a class="dropdown-item" href="#" onclick="delete_class(`{{ route('page.class.list') }}`)">
                                <i data-feather="trash" class="me-50"></i>
                                <span>Delete</span>
                              </a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">1</td>
                        <td class="text-nowrap">695105006</td>
                        <td class="text-nowrap">Nguyên Thị A</td>
                        <td class="text-nowrap">05/05/2001</td>
                        <td class="text-nowrap">Nữ</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                              data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                                <i data-feather="edit-2" class="me-50"></i>
                                <span>Edit</span>
                              </a>
                              <a class="dropdown-item" href="#" onclick="delete_class(`{{ route('page.class.list') }}`)">
                                <i data-feather="trash" class="me-50"></i>
                                <span>Delete</span>
                              </a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">1</td>
                        <td class="text-nowrap">695105006</td>
                        <td class="text-nowrap">Nguyên Thị A</td>
                        <td class="text-nowrap">05/05/2001</td>
                        <td class="text-nowrap">Nữ</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                              data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                                <i data-feather="edit-2" class="me-50"></i>
                                <span>Edit</span>
                              </a>
                              <a class="dropdown-item" href="#" onclick="delete_class(`{{ route('page.class.list') }}`)">
                                <i data-feather="trash" class="me-50"></i>
                                <span>Delete</span>
                              </a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">1</td>
                        <td class="text-nowrap">695105006</td>
                        <td class="text-nowrap">Nguyên Thị A</td>
                        <td class="text-nowrap">05/05/2001</td>
                        <td class="text-nowrap">Nữ</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                              data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                                <i data-feather="edit-2" class="me-50"></i>
                                <span>Edit</span>
                              </a>
                              <a class="dropdown-item" href="#" onclick="delete_class(`{{ route('page.class.list') }}`)">
                                <i data-feather="trash" class="me-50"></i>
                                <span>Delete</span>
                              </a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">1</td>
                        <td class="text-nowrap">695105006</td>
                        <td class="text-nowrap">Nguyên Thị A</td>
                        <td class="text-nowrap">05/05/2001</td>
                        <td class="text-nowrap">Nữ</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                              data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                                <i data-feather="edit-2" class="me-50"></i>
                                <span>Edit</span>
                              </a>
                              <a class="dropdown-item" href="#" onclick="delete_class(`{{ route('page.class.list') }}`)">
                                <i data-feather="trash" class="me-50"></i>
                                <span>Delete</span>
                              </a>
                            </div>
                          </div>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Responsive tables end -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="form form-vertical">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-1">
                        <label class="form-label" for="userName">Tên đăng nhập</label>
                        <input type="text" id="userName" class="form-control" name="userName"
                          placeholder="Nhập tên đăng nhập"/>
                      </div>
                      <div class="mb-1">
                        <label class="form-label" for="fullName">Họ và tên</label>
                        <input type="text" id="fullName" class="form-control" name="fullName"
                          placeholder="Nhập họ và tên"/>
                      </div>
                      <div class="mb-1">
                        <label class="form-label" for="dob">Ngày sinh</label>
                        <input type="date" id="dob" class="form-control" name="dob"
                          placeholder="dd/MM/yyyy"/>
                      </div>
                      <div class="demo-inline-spacing mb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male"
                                value="option1" checked />
                            <label class="form-check-label" for="male">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female"
                                value="option2" />
                            <label class="form-check-label" for="female">Nữ</label>
                        </div>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="Nhập mật khẩu đăng nhập" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basicSelect">Role</label>
                            <select class="form-select" id="basicSelect">
                              <option>Chọn role</option>
                              <option>Blade Runner</option>
                              <option>Thor Ragnarok</option>
                              <option>Blade Runner</option>
                              <option>Thor Ragnarok</option>
                            </select>
                          </div>
                      <div class="mb-1">
                        <label class="form-label" for="basicSelect">Khoa</label>
                        <select class="form-select" id="basicSelect">
                          <option>Chọn khoa</option>
                          <option>Blade Runner</option>
                          <option>Thor Ragnarok</option>
                          <option>Blade Runner</option>
                          <option>Thor Ragnarok</option>
                        </select>
                      </div>
                      <div class="mb-1">
                        <label class="form-label" for="basicSelect">Lớp</label>
                        <select class="form-select" id="basicSelect">
                          <option>Chọn Lớp</option>
                          <option>Blade Runner</option>
                          <option>Thor Ragnarok</option>
                          <option>Blade Runner</option>
                          <option>Thor Ragnarok</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Vertical modal end-->
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        function delete_class(delete_domain) {
            console.log(delete_domain);
            Swal.fire({
                title: 'Chú ý, bạn không thể hoàn tác hành động này!',
                text: "Xoá lớp học sẽ xoá toàn bộ dữ liệu liên quan. Bạn có chắc chắn xoá không?",
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
@endsection
