@extends('layouts.app')

@section('title', 'Contracts')
@section('breadcrumb', 'Contracts')

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <a href="{{ route('panel.contractNew') }}" type="button" class="btn bg-olive" title="Add New CLient"><i class="fa fa-plus"></i> New Contract</a>
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
                    <th class="no-sort text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $numOrder='1' @endphp
                @foreach($contracts AS $contract)
                <tr>
                    <td>{{ $numOrder++ }}.</td>
                    <td>{{ $contract->code }}</td>
                    <td>{{ $contract->client->firstname . ' ' . $contract->client->lastname }}</td>
                    <td>{{ $contract->contract }}</td>
                    <td>{{ $contract->status }}</td>
                    <td class="text-center">
                        <a href="{{ route('panel.contractEdit', $contract->contractID) }}" title="Edit"><span class="badge bg-blue"><i class="fa fa-edit"></i> </span></a>
                        {{--<a href="#" title="Delete"><span class="badge bg-red"><i class="fa fa-trash"></i> </span></a>--}}
                        <a href="#" title="Print Contract"><span class="badge bg-green"><i class="fa fa-print"></i> </span></a>
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
