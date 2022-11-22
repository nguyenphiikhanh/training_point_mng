@extends('page.layouts.layout')

@section('title')
<title>Trang chủ - Hệ thống Quản lí điểm rèn luyện</title>
@endsection

@section('css')

@endsection

@php
    $user = Auth::user();
@endphp
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
                    <section id="dashboard-ecommerce">
                        <div class="my-3"><span class="h3">Xin chào {{$user->first_name." ".$user->last_name}}</span></div>
                    </section>
                    <!-- Dashboard Ecommerce ends -->

                </div>
            </div>
        </div>
        <!-- END: Content-->
@endsection

@section('js')

@endsection
