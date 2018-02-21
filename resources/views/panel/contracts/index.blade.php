@extends('layouts.app')

@section('title', 'Contracts')
@section('breadcrumb', 'Contracts')

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <a href="{{ route('panel.contractNew') }}" type="button" class="btn bg-olive" title="New Contract"><i class="fa fa-plus"></i> New Contract</a>
        <a href="#" type="button" class="btn bg-yellow" title="Templates Contracts"><i class="fa fa-file-text"></i> Templates Contract</a>
    </div>
    <div class="box-body">
        <table id="dataTable" class="display table table-condensed">
            <thead>
                <tr>
                    <th class="no-sort" style="width: 10px">#</th>
                    <th>Code</th>
                    <th>Client</th>
                    <th>Contract</th>
                    <th>Status</th>
                    <th class="no-sort text-center" style="width: 120px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $numOrder='1' @endphp
                @foreach($contracts AS $contract)
                <tr>
                    <td>{{ $numOrder++ }}.</td>
                    <td>{{ $contract->code }}</td>
                    <td>{{ $contract->client->firstname . ' ' . $contract->client->lastname }}</td>
                    <td>{{ $contract->name }}</td>
                    <td>{{ $contract->status }}</td>
                    <td class="text-center">
                        <a href="{{ route('panel.contractEdit', $contract->contractID) }}" title="Edit" class="btn bg-blue btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('panel.contractPdf', $contract->code) }}" target="_blank" title="Print Contract" class="btn bg-green btn-flat btn-sm"><i class="fa fa-print"></i></a>
                        <meta name="token" content="{{ csrf_token() }}">
                        <button class="btn bg-red btn-flat btn-sm remove" data-action="{{ route('panel.contractCancel', $contract->contractID) }}">
                            <i class="fa fa-close"></i>
                        </button>
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

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable({
                "order": [],
                "columnDefs": [ {
                    "targets"  : 'no-sort',
                    "orderable": false
                }]
            });
        } );
    </script>
@endsection
