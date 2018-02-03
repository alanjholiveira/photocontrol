@extends('layouts.app')

@section('title', 'Contracts Client: ' . $client->firstname)
@section('breadcrumb', 'Contracts')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <table class="table table-striped">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 100px">Code</th>
                    <th>Contract</th>
                    <th style="width: 200px">Status</th>
                    <th style="width: 80px">Action</th>
                </tr>
                @php $numOrder='1' @endphp
                @foreach($client->contracts as $contract)
                <tr>
                    <td>{{ $numOrder++ }}.</td>
                    <td>{{ $contract->code }}</td>
                    <td>{{ $contract->contract }}</td>
                    <td>{{ $contract->status }}</td>
                    <td>
                        <a href="#" title="Edit"><span class="badge bg-blue"><i class="fa fa-edit"></i> </span></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('panel.clients') }}" class="btn btn-flat btn-danger"><i class="fa fa-mail-reply"></i> Back</a>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
