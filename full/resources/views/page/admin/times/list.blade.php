@extends('page.layouts.layout')

@section('title')
    <title>Quản lí Xét duyệt - Hệ thống Quản lí điểm rèn luyện</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('app-assets/css/pages/app-todo.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection

@section('content')
<div class="app-content content todo-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper container-xxl p-0">
      <div class="sidebar-left">
        <div class="sidebar">
          <div class="sidebar-content todo-sidebar">
            <div class="todo-app-menu">
              <div class="add-task">
                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                  data-bs-target="#new-task-modal">
                  Mở xét duyệt
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-right">
        <div class="content-wrapper container-xxl p-0">
          <div class="content-header row"></div>
          <div class="content-body">
            <div class="body-content-overlay"></div>
            <div class="todo-app-list">
              <!-- Todo search starts -->
                <form action="" method="get">
                    @csrf
                    <div class="app-fixed-search d-flex align-items-center">
                        <div class="sidebar-toggle d-block d-lg-none ms-1">
                          <i data-feather="menu" class="font-medium-5"></i>
                        </div>
                        <div class="d-flex align-content-center justify-content-between w-100">
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                            <input type="text" class="form-control" name="details" id="todo-search" value="{{Request::get('details') ? Request::get('details') : '' }}"
                            placeholder="Tìm kiếm" />
                              <button class="btn btn-primary">Tìm</button>
                          </div>
                        </div>
                      </div>
                </form>
              <!-- Todo search ends -->

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nội dung</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($times as $time)
                             @if (\Illuminate\Support\Carbon::now()->lt($time->deadline))
                            <tr class="table-success">
                                <td colspan="1">
                                    <span class="fw-bold">{{$time->name}}</span>
                                </td>
                                <td colspan="1">
                                    <span class="fw-bold">{{\Illuminate\Support\Carbon::parse($time->created_at)->format('H:i - d/m/Y')}}</span>
                                </td>
                                <td colspan="1">
                                    <span class="fw-bold">{{\Illuminate\Support\Carbon::parse($time->deadline)->format('H:i - d/m/Y')}}</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-success me-1">Đang diễn ra...</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#update-time-{{$time->id}}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Sửa</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Xoá</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             @else
                             <tr class="table-active">
                                <td colspan="1">
                                    <span class="fw-bold">{{$time->name}}</span>
                                </td>
                                <td colspan="1">
                                    <span class="fw-bold">{{\Illuminate\Support\Carbon::parse($time->created_at)->format('H:i - d/m/Y')}}</span>
                                </td>
                                <td colspan="1">
                                    <span class="fw-bold">{{\Illuminate\Support\Carbon::parse($time->deadline)->format('H:i - d/m/Y')}}</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-secondary me-1">Đã kết thúc</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#update-time-{{$time->id}}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Sửa</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Xoá</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($times->count())
                <div class="d-flex justify-content-center">{{$times->links('pagination::bootstrap-4')}}</div>
                @else
                <div class="d-flex justify-content-center"><span>Không có dữ liệu</span></div>
                @endif
            </div>

            <!-- Right Sidebar starts -->
            <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
              <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                  <form id="form-modal-todo" method="post" action="{{route('page.time.store')}}" class="todo-modal">
                      @csrf
                    <div class="modal-header align-items-center mb-1">
                      <h5 class="modal-title">Mở đợt xét duyệt mới</h5>
                      <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                        <span class="todo-item-favorite cursor-pointer me-75"></span>
                        <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                      </div>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                      <div class="action-tags">
                        <div class="mb-1">
                          <label for="time_content" class="form-label">Nội dung</label>
                          <input type="text" id="time_content" name="time_content"
                            class="new-todo-item-title form-control" required placeholder="Nhập nội dung" />
                        </div>

                        <div class="mb-1">
                          <label for="end_time" class="form-label">Thời gian kết thúc</label>
                          <input type="text" placeholder="Thời gian kết thúc" class="form-control task-due-date" id="end_time"
                            name="end_time" />
                        </div>
                      </div>
                      <div class="my-1">
                        <button onclick="endtime_valid(event)" class="btn btn-primary add-todo-item me-1">
                          Mở
                        </button>
                        <button type="reset" class="btn btn-info add-todo-item me-1">
                            Nhập lại
                          </button>
                        <button type="button" class="btn btn-outline-secondary add-todo-item"
                          data-bs-dismiss="modal">
                          Hủy
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Right Sidebar ends -->

            @foreach ($times as $time)
            <div class="modal modal-slide-in sidebar-todo-modal fade" id="update-time-{{$time->id}}">
                <div class="modal-dialog sidebar-lg">
                  <div class="modal-content p-0">
                    <form id="form-modal-todo" method="post" action="{{route('page.time.update',['id' => $time->id])}}" class="todo-modal">
                        @csrf
                      <div class="modal-header align-items-center mb-1">
                        <h5 class="modal-title">Chỉnh sửa xét duyệt</h5>
                        <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                          <span class="todo-item-favorite cursor-pointer me-75"></span>
                          <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                        </div>
                      </div>
                      <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                        <div class="action-tags">
                          <div class="mb-1">
                            <label for="time_content" class="form-label">Nội dung</label>
                            <input type="text" name="time_content" value="{{$time->name}}"
                              class="new-todo-item-title form-control" required placeholder="Nhập nội dung" />
                          </div>

                          <div class="mb-1">
                            <label for="end_time" class="form-label">Thời gian kết thúc</label>
                            <input type="text" placeholder="Thời gian kết thúc" value="{{\Illuminate\Support\Carbon::parse($time->deadline)->format('d/m/Y H:i')}}" class="form-control task-due-date"
                              name="end_time" />
                          </div>
                        </div>
                        <div class="my-1">
                          <button onclick="endtime_valid(event)" class="btn btn-primary add-todo-item me-1">
                            Lưu
                          </button>
                          <button type="reset" class="btn btn-info add-todo-item me-1">
                              Nhập lại
                            </button>
                          <button type="button" class="btn btn-outline-secondary add-todo-item"
                            data-bs-dismiss="modal">
                            Hủy
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>

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


    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/customize/vn.js')}}"></script>
    <script src="{{asset('app-assets/js/customize/dotXetDuyet.js')}}"></script>
@endsection
