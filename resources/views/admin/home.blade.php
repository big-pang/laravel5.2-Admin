@extends('admin.layouts.base')

@section('title','控制面板')

@section('pageHeader','控制面板')

@section('pageDesc','DashBoard')

@section('content')

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        .page-content {
            height: 100%;
        }

        .page-content {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>


    @include('admin.partials.errors')
    @include('admin.partials.success')

    <div class="container">
        <div class="content">
            <div class="title">HOME</div>
        </div>
    </div>


@stop

@endsection


@section('js')

@endsection