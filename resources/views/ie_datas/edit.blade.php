@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add Update</div>
            <div class="card-body text-primary">

    {{ Form::model($ie_data, ['route' => ['ie_datas.update', $ie_data->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}

                {{csrf_field()}}

                <div class="row">

                    <div class="form-group col-6">
                        {{Form::label('bin_no','BIN No:') }}

                        {{Form::text('bin_no', null, ['class' => 'form-control', 'placeholder' => 'BIN No', 'required']) }}

                        @error('bin_no')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>


                    <!-- Importer / Exporter Input Form -->
                    <div class="form-group col-6">
                        {{Form::label('ie','Importer / Exporter: ') }} <br>
                        <div class="radio radio-inline">
                            <span> </span>
                            <label>
                                {{Form::radio('ie', 'Importer', true)}} Importer
                            </label>
                            <label>
                                {{Form::radio('ie', 'Exporter')}} Exporter
                            </label>

                        </div>
                    </div>

                    <div class="form-group col-6 ">
                        {{Form::label('name', 'Importer / Exporter Name')}}
                        <div class="input-group mb-3">
                            {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Importer / Exporter Name', 'required'  ))}}
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
                        {{Form::label('destination','Destination:') }}

                        {{Form::text('destination', null, ['class' => 'form-control', 'placeholder' => 'Destination', 'required']) }}

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
                    <div class="form-group col-6">
                        {{Form::label('house','House') }}

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

