@extends('layouts.admin')

@section('content')

<h1>Edit This User</h1>
<hr>
{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}
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
            {{Form::text('password', '', ['class' => 'form-control','placeholder' => 'Password'])}}
          </div>
        </div>
        <div class="col-md-1">
          
        </div>
        <div class="col-md-4">
            <label for="roles">Roles</label>
            <hr>
    
            @foreach ($roles as $role)
              <div class="input-group mb-3 ml4">
                  {{Form::checkbox('roles', $role->id, true )}} &nbsp; {{ $role->display_name}}
              </div>
            @endforeach
        </div>
      </div>  
      <hr>
      <div class="btnsub text-right">
        {{-- <button class="btn btn-primary" style="width: 250px;">Upadate User</button> --}}
        {{Form::submit('Update User', ['class' => 'btn btn-primary'])}}
      </div>
    {{ Form::close() }}
@endsection

{{-- <script type="text/javascript">

  $(function() {
    var result = $('input[type="radio"]:checked');
      if (result.length > 0) {
          $('#divResult').html(result.val() + " is checked");
      }
      else {
          $('#divResult').html("No radio button checked");
      }
});
</script> --}}
