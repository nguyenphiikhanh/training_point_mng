@extends('page.layouts.layout')

@section('title')
    <title>Đổi mật khẩu</title>
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
                                <h4 class="card-title">Đổi mật khẩu</h4>
                            </div>
                            <div class="card-body ">
                                <form class="form form-horizontal" action={{ route('page.password.change.store') }} method="post">
                                    @csrf
                                  <div class="row d-flex justify-content-center">
                                    <div class="col-7">
                                      <div class="mb-1 row">
                                        <div class="col-sm-3">
                                          <label class="col-form-label" for="fname-icon">Mậu khẩu cũ</label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="lock"></i></span>
                                            <input
                                              type="password"
                                              id="old_password" required autofocus
                                              class="form-control"
                                              name="old_password"
                                              placeholder="Mật khẩu cũ"
                                            />
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-7">
                                        <div class="mb-1 row">
                                          <div class="col-sm-3">
                                            <label class="col-form-label" for="fname-icon">Mậu khẩu mới</label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                              <span class="input-group-text"><i data-feather="lock"></i></span>
                                              <input
                                                type="password"
                                                id="new_password" required autofocus
                                                class="form-control"
                                                name="new_password"
                                                placeholder="Mật khẩu mới"
                                              />
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-7">
                                        <div class="mb-1 row">
                                          <div class="col-sm-3">
                                            <label class="col-form-label" for="fname-icon">Xác nhận mật khẩu</label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                              <span class="input-group-text"><i data-feather="lock"></i></span>
                                              <input
                                                type="password"
                                                id="new_password_confirm" required autofocus
                                                class="form-control"
                                                name="new_password_confirm"
                                                placeholder="Nhập lại mật khẩu mới"
                                              />
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    <div class="col-sm-6 offset-sm-3">
                                      <button onclick="changePassword(event)" class="btn btn-primary me-1">Đổi mậu khẩu</button>
                                      <button type="reset" class="btn btn-outline-secondary">Nhập lại</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('js')
    <script src="{{ asset('app-assets/js/customize/changePassword.js') }}"></script>
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
@endsection
