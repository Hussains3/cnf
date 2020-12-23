@extends('layouts.admin')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Users</h1>
      </div>
      <div class="column text-right">
        <a href="{{route('gfiles.create')}}" class="btn btn-outline-primary">
            <i class="mdi mdi-account-edit"></i> Create GF Report</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow">
          <thead>
            <tr>
              <th>id</th>
              <th>Assesment Date</th>
              <th>Green File</th>
              <th>Waiting Green file</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($gfiles as $gfile)
              <tr>
                <th>{{$gfile->id}}</th>
                <td>{{$gfile->assesmentDate }}</td>
                <td>{{$gfile->greenFile}}</td>
                <td>{{$gfile->waitingGreenFile}}</td>
                <td class="has-text-right">
                    <a class="btn btn-outline-info" href="{{route('gfiles.edit', $gfile->id)}}"> Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end of .card -->

    {{-- {{$gfiles->links()}} --}}
  </div>

@endsection
