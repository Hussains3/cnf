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
                    <select name="user_name" class="form-control" placeholder="Name" required id="">
                        @foreach ($users as $user)
                            <option class="text-capitalize" value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>

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


                <!-- Month Input Form -->
                <div class="form-group col-6">
                    {{Form::label('month','Month') }}
                    @php
                        $months = array();
                        for ($i = 0; $i < 12; $i++) {
                            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
                            $months[date('n', $timestamp)] = date('F', $timestamp);
                        }
                    @endphp
                    
                    <select name="month" class="form-control" id="month" required>
                        <?php
                            foreach ($months as $num => $name) {
                                printf('<option value="%u">%s</option>', $num, $name);
                            }
                        ?>
                    </select>

                    @error('month')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Destination Input Form -->
                <div class="form-group col-6">
                    {{Form::label('work_day','Working Day') }}

                    {{Form::text('work_day', 26, ['class' => 'form-control', 'placeholder' => 'Working day', 'required']) }}

                    @error('work_day')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Destination Input Form -->
                <div class="form-group col-6">
                    {{Form::label('sat_day','Saterday') }}

                    {{Form::number('sat_day', 4, ['class' => 'form-control', 'placeholder' => 'Working day', 'required']) }}

                    @error('sat_day')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Destination Input Form -->
                <div class="form-group col-6">
                    {{Form::label('leave','Leave/Absent') }}

                    {{Form::number('leave', 0, ['class' => 'form-control', 'placeholder' => 'Absent Day', 'required']) }}

                    @error('leave')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Destination Input Form -->
                <div class="form-group col-6">
                    {{Form::label('work_point','Workpoint') }}

                    {{Form::number('work_point', null, ['class' => 'form-control', 'placeholder' => 'Work point']) }}

                    @error('work_point')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Phone Number Input Form -->
                <div class="form-group col-6">
                    {{Form::label('parcent','Parcenteg') }}

                    {{Form::number('parcent', null, ['class' => 'form-control', 'placeholder' => 'Parcenteg']) }}

                    @error('parcent')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Email Input Form -->
                <div class="form-group col-6 ">
                    {{Form::label('add','Add:') }}

                    {{Form::number('add', null, ['class' => 'form-control', 'placeholder' => 'Add']) }}

                    @error('add')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <!-- Phone Number Input Form -->
                <div class="form-group col-6">
                    {{Form::label('final','Final') }}

                    {{Form::text('final', null, ['class' => 'form-control', 'placeholder' => 'Final']) }}

                    @error('final')
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
