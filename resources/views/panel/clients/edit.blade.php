@extends('layouts.app')

@section('title', 'Edit Client: ' . $client->firstname)
@section('breadcrumb', 'Edit Client')


@section('content')
<!-- Default box -->
<div class="box">
    {!! Form::model($client, ['route' => ['panel.clientUpdate', $client->clientID], 'method' => 'PUT', 'class' => 'pro-ajax']) !!}

    @include('panel.clients._form')

    {!! Form::close() !!}
</div>
<!-- /.box -->
@endsection
