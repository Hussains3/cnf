@extends('layouts.admin')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Users</h1>
      </div>
      <div class="column text-right">
        <a href="{{route('users.create')}}" class="btn btn-outline-primary">
            <i class="mdi mdi-account-edit"></i> Create New User</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow">
          <thead>
            <tr>
              <th>id</th>
              <th>Counter No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
              <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->counter}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td class="has-text-right"><a class="btn btn-outline-success" href="{{route('users.show', $user->id)}}">View </a> <a class="btn btn-outline-info" href="{{route('users.edit', $user->id)}}"> Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end of .card -->

    {{$users->links()}}
  </div>

@endsection
