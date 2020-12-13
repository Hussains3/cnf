@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add Update</div>
            <div class="card-body text-primary">

    {{ Form::model($agent, ['route' => ['agents.update', $agent->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}

                {{csrf_field()}}

                <div class="row">

                    <div class="form-group col-6">
                        {{Form::label('ain_no','AIN No:') }}

                        {{Form::text('ain_no', null, ['class' => 'form-control', 'placeholder' => 'AIN No', 'required']) }}

                        @error('ain_no')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group col-6 ">
                        {{Form::label('name', 'Agent Name')}}
                        <div class="input-group mb-3">
                            {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Agent Name', 'required'  ))}}
                            @error('name')
                            <span>{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group col-6 ">
                        {{Form::label('owners_name', 'Owner / Manager Name')}}
                        <div class="input-group mb-3">
                            {{Form::text('owners_name', null, array('class' => 'form-control', 'placeholder' => 'Owner Name', 'required'  ))}}
                            @error('owners_name')
                            <span>{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <!-- Photo Input Form -->
                    <div class="form-group col-6">
                        {{Form::label('photo','Photo:') }}
                        {{Form::file('photo', null) }}
                        <p class="help-block"></p>
                        @error('photo')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Destination Input Form -->
                    <div class="form-group col-6">
                        {{Form::label('destination','Designation:') }}

                        {{Form::text('destination', null, ['class' => 'form-control', 'placeholder' => 'Designation', 'required']) }}

                        @error('destination')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Destination Input Form -->
                    <div class="form-group col-6">
                        {{Form::label('office_address','Agent / Office Address:') }}

                        {{Form::text('office_address', null, ['class' => 'form-control', 'placeholder' => 'Office Address', 'required']) }}

                        @error('office_address')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Phone Number Input Form -->
                    <div class="form-group col-6">
                        {{Form::label('phone','Phone Number:') }}

                        {{Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Agent Phone Number', 'required']) }}

                        @error('phone')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Email Input Form -->
                    <div class="form-group col-6 ">
                        {{Form::label('email','Email:') }}

                        {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}

                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Phone Number Input Form -->
                    <div class="form-group col-12">
                        {{Form::label('house','House / Station') }}

                        {{Form::text('house', null, ['class' => 'form-control', 'placeholder' => 'Station / House', 'required']) }}

                        @error('house')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>


                    <!-- Note Input Form -->
                    <div class="form-group col-12 d-none">
                        {{Form::label('note','Note:') }}
                        {{Form::textarea('note', null, ['class' => 'form-control', 'rows' =>5, 'placeholder' => 'Note']) }}
                    </div>

                    <hr>
                    <div class="col-12">
                        <div class="text-right">
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

    </div>
  </div>
 </div>

@endsection

@section('scripts')
    <script>

    </script>

@endsection

