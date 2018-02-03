@extends('layouts.app')

@section('title', 'Photos: ')

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

        <div id="gallery" style="display:none;">
            @foreach($gallery->photos as $photo )
            <img alt="{{ $photo->filename }}"
                 src="data:image/jpeg;base64,{{ Helpers::getStorage('public/photos/01/', $photo->filename) }}"
                 data-image="data:image/jpeg;base64,{{ Helpers::getStorage('public/photos/01/', $photo->filename) }}"
                 data-description="{{ $photo->filename }}">
            @endforeach
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        Footer
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->
@endsection

@section('scripts')
    <script src="{{asset('assets/vendor/unitegallery/js/unitegallery.js')}}"></script>
    <script src="{{asset('assets/vendor/unitegallery/themes/default/ug-theme-default.js')}}"></script>
    <script type="text/javascript">

        jQuery(document).ready(function(){

            jQuery("#gallery").unitegallery({
                gallery_width: 'auto',
                gallery_height:500
            });

        });

    </script>
@endsection

@section('styles')
    <link href="{{ asset('assets/vendor/unitegallery/css/unite-gallery.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendor/unitegallery/themes/default/ug-theme-default.css') }}" rel="stylesheet"/>
@endsection
