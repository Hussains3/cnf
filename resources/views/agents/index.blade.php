@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>All Agents</h2>
        </div>
        <div class="col text-right">
            @role('admin')
            <a href="{{route('agents.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Agent
            </a>
            @endrole
        </div>
    </div>

    <div class="card-content">
        <table id="agent" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Ain No</th>
                <th>Agent Name</th>
                <th>Owner Name</th>
                <th>Photo</th>
                <th>Designation</th>
                <th>Office_address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>House / Station</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($agents as $agent)
                <tr>

                    <th>{{++$i}} </th>
                    <td>{{$agent->ain_no}}</td>
                    <td>{{$agent->name}}</td>
                    <td>{{$agent->owners_name}}</td>
                    <td><a target="_blank" href="/{{$agent->photo}}"><img src="/{{$agent->photo}}" alt="" width="40"></a></td>
                    <td>{{$agent->destination}}</td>
                    <td>{{$agent->office_address}}</td>
                    <td>{{$agent->phone}}</td>
                    <td>{{$agent->email}}</td>
                    <td>{{$agent->house}}</td>
                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                            @role('admin')
                            <a class="btn btn-info btn-sm" href="{{route('agents.edit', $agent->id)}}"><i class="far fa-edit"></i></a>
                            {{-- <a class="btn btn-danger btn-sm" href="{{route('agents.destroy',$agent->id)}}"><i class="fas fa-user-times"></i></a> --}}

                            <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}

                                {{-- <a class="btn btn-info" href="{{route('productModels.edit', $productModel->id)}}"> Edit</a> --}}
                                {{-- <a class="btn btn-danger btn-sm" href="{{route('agents.destroy',$agent->id)}}"><i class="fas fa-user-times"></i></a> --}}
                                {!! Form::submit('Deavtive', ['class'=>'btn btn-sm btn-danger']) !!}

                            </form>
                            @endrole


{{--                            <a class="btn btn-success" href="{{route('supplier_pay', $agent->id)}}"> Payment</a>--}}

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
        $('#agent').DataTable();
    </script>
@endsection
