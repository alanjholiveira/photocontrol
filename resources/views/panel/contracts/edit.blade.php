@extends('layouts.app')

@section('title', 'Edit Contract: ' . $contract->code . ' Client: ' . $contract->client->full_name)
@section('breadcrumb', 'Edit Contract')


@section('content')
<!-- Default box -->
<div class="box">
    {!! Form::model($contract, ['route' => ['panel.contractUpdate', $contract->contractID], 'method' => 'PUT', 'class' => 'pro-ajax']) !!}

    @include('panel.contracts._form')

    {!! Form::close() !!}
</div>
<!-- /.box -->
@endsection
