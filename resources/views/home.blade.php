@extends('layouts.admin')

@section('content')
    <link href="{{ asset('css/db.css') }}" rel="stylesheet">

    <div class="jumbotron">
        <div class="row w-100">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/file_datas">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color:  rgba(51, 105, 232, 0.1)">
                            <i class="fas fa-list" style="color:#3369e8"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Files
                                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                        </div>

                    </a>
                </div>
            </div>
            @role('receiver')

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/file_datas/create">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fas fa-cart-arrow-down" style="color:#16A085"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>New File
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
            @endrole
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/ie_datas">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color:  rgba(51, 105, 232, 0.1)">
                            <i class="fas fa-shopping-bag" style="color:#3369e8"> </i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Import / Export
                                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/agents">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fas fa-users" style="color:#16A085"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Agents
                                <div class="pull-right badge" id="WrControls"></div>
                            </h4>
                        </div>
                    </a>
                </div>
            </div>

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

