@extends('layouts.app')

@section('title', 'New Contract')
@section('breadcrumb', 'New Contract')

@section('content')
<!-- Default box -->
<div class="box">
    {!! Form::open(['route' => 'panel.contractStore', 'method' => 'post', 'class' => 'pro-ajax']) !!}

    @include('panel.contracts._form')

    {!! Form::close() !!}
</div>
<!-- /.box -->
@endsection
