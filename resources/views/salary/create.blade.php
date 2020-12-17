@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add Salary</div>
            <div class="card-body text-primary">

            {!! Form::open(['route' => 'salary.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}

            {{csrf_field()}}

            <div class="row">

                <div class="form-group col-6">
                    {{Form::label('user_name','User Name') }}

                    {{Form::text('user_name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}

                    @error('user_name')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-6 ">
                    {{Form::label('year', 'Year')}}
                    <div class="input-group mb-3">
                        {{Form::text('year', null, array('class' => 'form-control', 'placeholder' => '2020', 'required'  ))}}
                        @error('year')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>
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
