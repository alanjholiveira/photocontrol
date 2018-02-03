@extends('layouts.app')

@section('title', 'New Client')

@section('content')
<!-- Default box -->
<div class="box">
    {!! Form::open(['route' => 'panel.clientStore', 'method' => 'post', 'class' => 'pro-ajax']) !!}

    @include('panel.clients._form')

    {!! Form::close() !!}
</div>
<!-- /.box -->
@endsection
