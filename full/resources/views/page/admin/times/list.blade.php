@extends('page.layouts.layout')

@section('title')
    <title>Quản lí Xét duyệt - Hệ thống Quản lí điểm rèn luyện</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('app-assets/css/pages/app-todo.min.css')}}">
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
                  Thêm học kì
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
              <div class="app-fixed-search d-flex align-items-center">
                <div class="sidebar-toggle d-block d-lg-none ms-1">
                  <i data-feather="menu" class="font-medium-5"></i>
                </div>
                <div class="d-flex align-content-center justify-content-between w-100">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                    <input type="text" class="form-control" id="todo-search" placeholder="Tìm kiếm học kì"
                      aria-label="Search..." aria-describedby="todo-search" />
                  </div>
                </div>
              </div>
              <!-- Todo search ends -->

              <!-- Todo List starts -->
              <div class="todo-task-list-wrapper list-group">
                <ul class="todo-task-list media-list" id="todo-task-list">
                  <li class="todo-item">
                    <div class="todo-title-wrapper">
                      <div class="todo-title-area">
                        <div class="title-wrapper">
                          <div class="form-check">
                            <label class="form-check-label" for="customCheck1"></label>
                          </div>
                          <span class="todo-title">Học kì 1 năm học 2022-2023</span>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- Todo List ends -->
            </div>

            <!-- Right Sidebar starts -->
            <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
              <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                  <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                    <div class="modal-header align-items-center mb-1">
                      <h5 class="modal-title">Thêm học kì</h5>
                      <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                        <span class="todo-item-favorite cursor-pointer me-75"><i data-feather="star"
                            class="font-medium-2"></i></span>
                        <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                      </div>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                      <div class="action-tags">
                        <div class="mb-1">
                          <label for="todoTitleAdd" class="form-label">Nội dung</label>
                          <input type="text" id="todoTitleAdd" name="todoTitleAdd"
                            class="new-todo-item-title form-control" placeholder="nhập nội dung" />
                        </div>

                        <div class="mb-1">
                          <label for="task-due-date" class="form-label">Ngày hết hạn</label>
                          <input type="text" class="form-control task-due-date" id="task-due-date"
                            name="task-due-date" />
                        </div>
                      </div>
                      <div class="my-1">
                        <button type="submit" class="btn btn-primary d-none add-todo-item me-1">
                          Thêm
                        </button>
                        <button type="button" class="btn btn-outline-secondary add-todo-item d-none"
                          data-bs-dismiss="modal">
                          Hủy
                        </button>
                        <button type="button" class="btn btn-primary d-none update-btn update-todo-item me-1">
                          Update
                        </button>
                        <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
                          Delete
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Right Sidebar ends -->
          </div>
        </div>
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


    <script src="{{asset('app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/app-todo.min.js')}}"></script>
@endsection
