@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>Importer/Exporter List</h2>
        </div>
        <div class="col text-right">

            <a href="{{route('ie_datas.create')}}" class="btn btn-primary">
                <i class="mdi mdi-account-edit"></i> New Importer/Exporter</a>
        </div>
    </div>

    <div class="card-content">
        <table id="agent" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>BIN No</th>
                <th>IE Type</th>
                <th>Importer / Exporter Name</th>
                <th>Owner / Manager Name</th>
                <th>Photo</th>
                <th>Designation</th>
                <th>Office Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>House</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($ie_datas as $ie_data)
                <tr>

                    <th>{{++$i}} </th>
                    <td>{{$ie_data->bin_no}}</td>
                    <td>{{$ie_data->ie}}</td>
                    <td>{{$ie_data->name}}</td>
                    <td>{{$ie_data->owners_name}}</td>
                    <td><a target="_blank" href="/{{$ie_data->photo}}"><img src="/{{$ie_data->photo}}" alt="" width="40"></a></td>
                    <td>{{$ie_data->destination}}</td>
                    <td>{{$ie_data->office_address}}</td>
                    <td>{{$ie_data->phone}}</td>
                    <td>{{$ie_data->email}}</td>
                    <td>{{$ie_data->house}}</td>
                    <td class="has-text-right">
                        {{-- <a class="btn btn-outline-success" href="{{route('purchase.show', $purchase->id)}}">View </a> --}}

                        <form action="{{ route('ie_datas.destroy',$ie_data->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                            @role('admin')
                            <a class="btn btn-info" href="{{route('ie_datas.edit', $ie_data->id)}}"> Edit</a>
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
