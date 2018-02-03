
<div class="box-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputFirstName', 'First Name:') !!}
                {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputLastName', 'Last Name:') !!}
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputCompanyName', 'Company Name:') !!}
                {!! Form::text('companyname', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputEmail', 'E-Mail:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputPhoneNumber', 'Phone Number:') !!}
                {!! Form::text('phonenumber', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputCity', 'City:') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputAddress1', 'Address 1:') !!}
                {!! Form::text('address1', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputAddress2', 'Address 2:') !!}
                {!! Form::text('address2', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('inputPostcode', 'Postcode:') !!}
                {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('inputNote', 'Note:') !!}
                {!! Form::textarea('note', null, ['size' => '30x5', 'class' => 'form-control']) !!}
            </div>
        </div>

    </div>



</div>
<!-- /.box-body -->

<div class="box-footer">
    <a href="{{ route('panel.clients') }}" class="btn btn-flat btn-danger"><i class="fa fa-mail-reply"></i> Back</a>
    <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Save</button>
</div>
