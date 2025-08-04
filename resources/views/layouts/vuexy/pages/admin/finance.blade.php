@extends('layouts.vuexy.layout')
@section('title', 'مالی')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">گزارش مالی</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">داشبورد </a></li>
                            <li class="breadcrumb-item active">مالی</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection