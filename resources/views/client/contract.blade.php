@extends('layouts.app')

@section('title', 'Contract')

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-body">
        <table class="table table-condensed">
            <tbody><tr>
                <th style="width: 100px">#</th>
                <th>Contract</th>
                <th style="width: 100px">Action</th>
            </tr>
            @foreach($contracts AS $contract)
            <tr>
                <td>{{ $contract->code }}</td>
                <td>{{ $contract->name }}</td>
                <td>
                    <a href="#"><span class="badge bg-red"><i class="fa fa-download"></i> Download</span></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
