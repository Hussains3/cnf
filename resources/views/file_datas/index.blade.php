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

                    @role('admin|operator')

                    <th>Lodgement Date</th>
                    @endrole

                    @role('deliver')
                    <th>B/E No</th>
                    <th>B/E Date</th>
                    @endrole
                    <th>Agent Name</th>

                    @role('admin|operator|deliver')
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


                    @role('admin|operator')
                    <td>{{$file_data->lodgement_date}}</td>
                    @endrole

                    @role('deliver')
                    <td>{{$file_data->be_number}}</td>
                    <td>{{$file_data->be_date}}</td>
                    @endrole
                    <td>
                        @if ($file_data->agent)
                        {{$file_data->agent->name}}
                        @endif
                    </td>

                    @role('admin|operator|deliver')
                    <td>{{$file_data->ie_data->name ?? ''}}</td>
                    @endrole

                    <td>{{$file_data->status}}</td>

                    <td class="has-text-right">
                        <form action="{{ route('file_datas.destroy',$file_data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            @role('admin')
                                <a class="btn btn-info" href="{{route('file_datas.edit', $file_data->id)}}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('file_datas.destroy', $file_data->id) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $file_data->id }}').submit();">
                                <i class="far fa-trash-alt"></i>
                                </a>

                                <form id="delete-form-{{ $file_data->id }}" action="{{ route('file_datas.destroy', $file_data->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            @endrole

                            @role('operator')
                                @if($file_data->status == 'Operated' || $file_data->status == 'Received')

                                    <a class="btn btn-info" href="{{route('file_datas.edit', $file_data->id)}}">
                                            @if($file_data->status == 'Operated')
                                                Edit
                                            @else
                                                Operate
                                            @endif
                                    </a>

                                @endif
                            @endrole

                            @role('deliver')
                                @if ($file_data->status != 'Received')
                                    @if($file_data->status == 'Operated')
                                        <a class="btn btn-info" href="{{route('file_datas.edit', $file_data->id)}}">Deliver</a>
                                    @elseif($file_data->status == 'Printed')
                                        <a class="btn btn-danger" href="{{route('file_datas.show', $file_data->id)}}">Print </a>
                                    @endif
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
