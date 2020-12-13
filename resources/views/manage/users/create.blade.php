@extends('layouts.admin')

@section('content')

<h1>Create New User</h1>
<hr>

  {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}
  {{csrf_field()}}
  <div class="row">

    <div class="col-md-7">

      {{Form::label('name', 'Full Name')}}
      <div class="input-group mb-3">        
        {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Full Name'))}}
      </div>

      {{Form::label('email', 'Your Email')}}
      <div class="input-group mb-3">
        {{Form::email('email', null, array('class' => 'form-control','placeholder' => 'example@mail.com'))}}
      </div>

      {{Form::label('password', 'Password')}}
      <div class="input-group mb-3">
        {{Form::text('password', null, ['class' => 'form-control','placeholder' => 'Password'])}}
      </div>
    </div>
    <div class="col-md-1">
      
    </div>
    <div class="col-md-4">
        <label for="roles">Roles</label>
        <hr>

        @foreach ($roles as $role)
          <div class="input-group mb-3 ml4">
              {{Form::checkbox('roles', $role->id, ['class' => 'form-check-input'] )}} &nbsp; {{ $role->display_name}}
          </div>
        @endforeach
        
    </div>
  </div>  
  <hr>
  <div class="btnsub text-right">
    {{Form::submit('Create User', ['class' => 'btn btn-primary'])}}
  </div>
{{ Form::close() }}
@endsection

