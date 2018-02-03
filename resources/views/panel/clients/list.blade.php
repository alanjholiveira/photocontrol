@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <a href="{{ route('panel.clientNew') }}" type="button" class="btn bg-olive" title="Add New CLient"><i class="fa fa-user-plus"></i> Add New Client</a>
        <button type="button"  id="btn-del" name="btn-del" class="btn btn-danger submitbuttondel"><i class="fa fa-close"></i> Delete</button>
    </div>
    <div class="box-body">
        {!! Form::open(['route' => ['panel.clientDestroy'], 'method' => 'delete', 'class' => 'form-horizontal', 'id' =>'frmDelete']) !!}
        <table id="dataTable" class="display table table-condensed">
            <thead>
            <tr>
                <th class="no-sort" style="width: 20px;"><input type="checkbox" id="check-all" class="flat-purple"></th>
                <th>Name</th>
                <th>Phone</th>
                <th>E-Mail</th>
                <th class="no-sort" style="width: 100px; text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients AS $client)
                <tr>
                    <td><input type="checkbox" class="check flat-purple ids" name="table_recordsId[]" value="{{ $client->clientID }}"></td>
                    <td>{{ $client->firstname . ' ' . $client->lastname }}</td>
                    <td>{{ $client->phonenumber }}</td>
                    <td>{{ $client->email }}</td>
                    <td style="text-align: center">
                        <a href="{{ route('panel.clientEdit', $client->clientID) }}" title="Edit"><span class="badge bg-blue"><i class="fa fa-edit"></i> </span></a>
                        {{--<a href="#" title="Delete"><span class="badge bg-red"><i class="fa fa-trash"></i> </span></a>--}}
                        <a href="{{ route('panel.clientContract', $client->clientID) }}" title="Contracts"><span class="badge bg-yellow"><i class="fa fa-file-archive-o"></i> </span></a>
                        <a href="{{ route('panel.clientView', $client->clientID) }}" title="View"><span class="badge bg-black"><i class="fa fa-file-archive-o"></i> </span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        {{--{{ $clients->render() }}--}}
    </div>
    <!-- /.box-footer-->
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
