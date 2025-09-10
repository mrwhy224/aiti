@extends('layouts.vuexy.layout')
@section('title', 'داشبورد')
@push('page_js')
<script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
@endpush
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">خانه</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">داشبورد
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
