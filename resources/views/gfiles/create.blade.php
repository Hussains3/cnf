@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Add Green File Report</div>
            <div class="card-body text-primary">

            {!! Form::open(['route' => 'gfiles.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}

            {{csrf_field()}}

            <div class="row">

                <div class="form-group col-12">
                    {{Form::label('assesmentDate','Assesment Date') }}
                    {!! Form::date('assesmentDate', null, ['class' => 'form-control','required']) !!}

                    @error('gfile_name')
                    <span>{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-12">
                    {{Form::label('greenFile','Green File') }}
                    {!! Form::number('greenFile', null, ['class' => 'form-control', 'placeholder' => '000', 'required']) !!}

                    @error('gfile_name')
                    <span>{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-12">
                    {{Form::label('waitingGreenFile','Waiting Green File') }}
                    {!! Form::number('waitingGreenFile', null, ['class' => 'form-control', 'placeholder' => '000', 'required']) !!}

                    @error('gfile_name')
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
