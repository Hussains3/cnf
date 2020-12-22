@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>File Data List</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('file_datas.create')}}" class="btn btn-primary d-none">
                <i class="mdi mdi-account-edit"></i>File Data</a>
        </div>
    </div>

    <div class="card-content">
        <table id="suppliers" class="table is-narrow">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Manifest No</th>
                    <th>Manifest Date</th>
                    <th>Lodgement No</th>
                    <th>Lodgement Date</th>
                    @role('admin|operator|deliver')
                    <th>Agent Name</th>
                    <th>Importer / Exporter</th>
                    @endrole
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($file_datas as $file_data)
                <tr>
                    <th>{{++$i}} </th>
                    <td>{{$file_data->manifest_no}}</td>
                    <td>{{$file_data->manifest_date}}</td>
                    <td>{{$file_data->lodgement_no}}</td>
                    <td>{{$file_data->lodgement_date}}</td>
                    @role('admin|operator|deliver')
                    <td>{{$file_data->agent->name}}</td>
                    <td>{{$file_data->ie_data->name ?? ''}}</td>
                    @endrole

                    <td>{{$file_data->status}}</td>

                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}
                        <form action="{{ route('file_datas.destroy',$file_data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                            @if($file_data->status != 'Delivered')
                            <a class="btn btn-info" href="{{route('file_datas.edit', $file_data->id)}}">
                                @role('admin|receiver')
                                Edit
                                @endrole
                                @role('operator')
                                    @if($file_data->status == 'Operated' || $file_data->status == 'Delivered')
                                        Edit
                                    @else
                                        Operate
                                    @endif
                                @endrole
                                @role('deliver')
                                    @if($file_data->status == 'Delivered')
                                        Edit
                                    @else
                                        Deliver
                                    @endif
                                @endrole
                            </a>
                            @endif

                            @role('deliver')
                            @if($file_data->status == 'Delivered' || $file_data->status == 'Printed')
                                <a class="btn btn-danger" target="_blank" href="{{route('file_datas.show', $file_data->id)}}">Print </a>
                            @endif
                            @endrole
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script>
        $('#suppliers').DataTable();
    </script>
@endsection
