
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('inputClient', 'Client:') !!}
                {!! Form::select('clientID', $clients, null, ['id' => 'clientID', 'class' => 'form-control select2', 'style' => 'width: 100%;']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputName', 'Name Contract:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputValue', 'Value:') !!}
                {!! Form::number('value', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('inputNote', 'Contract:') !!}
                {!! Form::textarea('note', null, ['id' => 'editor', 'size' => '80x10', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('inputObs', 'Obs:') !!}
                {!! Form::textarea('obs', null, ['size' => '20x5', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <a href="{{ route('panel.contracts') }}" class="btn btn-flat btn-danger"><i class="fa fa-mail-reply"></i> Back</a>
    <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Save</button>
</div>


@section('scripts')
<script type="text/javascript">
    //Editor Textarea CKEDITOR
    CKEDITOR.replace('editor');
</script>
@endsection