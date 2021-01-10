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
                    {{Form::label('user_id','User Name') }}
                    {!! Form::select('user_id', $users, null, ['class'=>'form-control', 'required']) !!}

                    @error('user_id')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-6 ">
                    {{Form::label('year', 'Year')}}
                    <div class="input-group mb-3">
                        {{Form::text('year', date('Y'), array('class' => 'form-control','required'  ))}}
                        @error('year')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>
                </div>


                <!-- Month Input Form -->
                <div class="form-group col-6">
                    {{Form::label('month','Month') }}
                    <select name="month" class="form-control" id="month" required="">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>

                    @error('month')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Destination Input Form -->
                <div class="form-group col-6">
                    {{Form::label('working_days','Working Day') }}

                    {{Form::number('working_days', 26, ['class' => 'form-control', 'placeholder' => 'Working day', 'required']) }}

                    @error('working_days')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Destination Input Form -->
                <div class="form-group col-6">
                    {{Form::label('holiday','Leave/Absent') }}

                    {{Form::number('holiday', 0, ['class' => 'form-control', 'placeholder' => 'Absent Day', 'required']) }}

                    @error('holiday')
                    <span>{{ $message }}</span>
                    @enderror

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
