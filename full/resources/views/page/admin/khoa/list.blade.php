@extends('page.layouts.layout')

@section('title')
    <title>Quản lí Khoa - Hệ thống Quản lí điểm rèn luyện</title>
@endsection

@section('css')
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Quản lý lớp học</h4>
                            </div>
                            <div class="card-body">

                                <div class="text-end">
                                    <button class="btn btn-md round btn-success" data-bs-toggle="modal"
                                        data-bs-target="#faculty-add">Thêm khoa/Ngành học</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                @if (!$faculties)
                                    <div class="mx-auto d-flex justify-content-center my-5"><span>Không có dữ liệu</span>
                                    </div>
                                @else
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 5%;" class="text-nowrap">STT</th>
                                                <th scope="col" style="width: 40%;" class="text-nowrap">Tên khoa</th>
                                                <th scope="col" style="width: 5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($faculties as $index => $faculty)
                                                <tr>
                                                    <td class="text-nowrap">{{ $index + 1 }}</td>
                                                    <td class="text-nowrap">{{ $faculty->ten_khoa }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                                data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#faculty-showUp{{ $index }}">
                                                                    <i data-feather="edit-2" class="me-50"></i>
                                                                    <span>Sửa</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="delete_faculty(`{{ route('page.faculty.destroy', ['id' => $faculty->id]) }}`)">
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
                                @endif
                            </div>
                        </div>
                        @if ($faculties)
                            <div class="mt-5 d-flex justify-content-center">{{ $faculties->links('pagination::bootstrap-4') }}</div>
                        @endif
                    </div>
                </div>
                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    </div>

    {{-- BEGIN:showUP --}}
    @foreach ($faculties as $index => $faculty)
        <div class="modal fade" id="faculty-showUp{{ $index }}" tabindex="-1"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Chỉnh sửa Khoa/Ngành học</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical" action="{{ route('page.faculty.update', ['id' => $faculty->id]) }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Tên khoa/Ngành học</label>
                                        <input type="text" class="form-control" name="faculty_name" required
                                            value="{{ $faculty->ten_khoa }}" placeholder="Nhập tên khoa/Ngành học" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="reset" class="btn btn-secondary">Reset </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- END: showUP --}}

    {{-- BEGIN: create --}}
    <div class="modal fade" id="faculty-add" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm khoa/Ngành học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" action="{{ route('page.faculty.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label">Tên khoa/Ngành học</label>
                                    <input type="text" class="form-control" name="faculty_name" required
                                        placeholder="Nhập tên khoa/Ngành học" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END: create --}}
    <!-- END: Content-->
@endsection

@section('js')
    <script>
        function delete_faculty(delete_domain) {
            Swal.fire({
                title: 'Chú ý, bạn không thể hoàn tác hành động này!',
                text: "Xoá Khoa/Ngành học sẽ xoá toàn bộ dữ liệu liên quan. Bạn có chắc chắn xoá không?",
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
