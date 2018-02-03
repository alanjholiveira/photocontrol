@extends('layouts.app')

@section('title', 'Photos: ' . $gallery->title)

@section('content')
<!-- Default box -->
<div class="box">

    <div class="box-body">
        <form action="{{ route('client.savePhoto', $gallery->galleryID) }}" class="exampleone pro-ajax" method="post">
            <div class="row text-center text-lg-left">

                @foreach($gallery->photos as $photo )
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="d-block mb-4 h-100">
                            <img id="{{ $photo->filename }}" name="{{ $photo->photoID }}" class="img-fluid img-thumbnail selectable" src="data:image/jpeg;base64,{{ Helpers::getImageStorage($gallery->path, $photo->filename.'.'.$photo->extension, 400, 300) }}" alt="">
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn bg-navy btn-flat margin btn-lg"><i class="fa fa-save"></i> Confirm Selection</button>
                </div>
            </div>
        </form>

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('scripts')
    <script src="{{asset('assets/js/imgcheckbox.js')}}"></script>
    <script type="text/javascript">
        (function($) {

            var url = window.location.href;

            $("img.selectable").imgCheckbox({

                onload: function(){

                    $.ajax({
                        method: "get",
                        dataType: "json",
                        url: url + "/get",
                        cache: false,
                        contentType: "application/json; charset=utf-8",
                        success: function (photos) {
                            $.each(photos,function(i, data){
                                if(data.confirmation === 1) {
                                   $('#' + data.photoID).addClass("imgChked");
                                   $('input[name="'+ data.photoID + '"]').attr('value', 1);
                                }
                            });

                        }
                    });
                },

                onclick: function(el){
                    var isChecked = el.hasClass("imgChked"),
                        imgEl = el.children()[0],  // the img element
                        input = $('input[id="'+ imgEl.id + '"]');

                        if (isChecked) {
                            input.attr('value', 1);
                        } else {
                            input.attr('value', 0);
                        }
                }
            });

        })(jQuery);
    </script>

@endsection

