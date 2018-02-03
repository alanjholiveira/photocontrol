@extends('layouts.app')

@section('title', 'View Client: ' . $client->firstname)
@section('breadcrumb', 'View Client')

@section('content')
    <!-- Default box -->
    <div class="box">

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <dl>
                        <dt>Firstname:</dt>
                        <dd>{{ $client->firstname }}</dd>
                        <dt>Lastname:</dt>
                        <dd>{{ $client->lastname }}</dd>
                        <dt>E-Mail:</dt>
                        <dd><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></dd>
                        <dt>Phone Number:</dt>
                        <dd>{{ $client->phonenumber }}</dd>
                        <dt>Postcode:</dt>
                        <dd>{{ $client->postcode }}</dd>
                    </dl>

                </div>
                <div class="col-md-6">
                    <dl>
                        <dt>Companyname:</dt>
                        <dd>{{ $client->companyname }}</dd>
                        <dt>Address 1:</dt>
                        <dd>{{ $client->address1 }}</dd>
                        <dt>Address 2:</dt>
                        <dd>{{ $client->address2 }}</dd>
                        <dt>City:</dt>
                        <dd>{{ $client->city }}</dd>
                    </dl>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('panel.clients') }}" class="btn btn-flat btn-danger"><i class="fa fa-mail-reply"></i> Back</a>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
