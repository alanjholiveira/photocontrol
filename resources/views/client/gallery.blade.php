@extends('layouts.app')

@section('title', 'Galleries: ')

@section('content')
<!-- Default box -->

<div class="row">
    @foreach($galleries as $gallery)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-camera"></i>

                <h3 class="box-title">{{ $gallery->title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{ route('client.photo', $gallery->galleryID) }}">
                    <img width="100%" src="http://www.homedetox.co.uk/wp-content/uploads/2013/10/addiction-intervention.jpg">
                </a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    @endforeach

</div>



@endsection

