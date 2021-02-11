@extends('layouts.admin')

@section('content')
    <div style="margin: 0 15%;">
        @role('admin|receiver')
            <div class="card card-accent-primary mb-3 text-left" style="">
            <div class="card-header">Data Entry - File Receive</div>
            <div class="card-body text-primary">
                {!! Form::open(['route' => 'file_datas.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}

                {{csrf_field()}}
                <div class="row">

                    <div class="form-group col-6">
                        {{Form::label('lodgement_no', 'Lodgement No')}}
                        <div class="input-group mb-3">
                            <span style="padding-top: 5px;padding-right: 10px">{{date('Y')}} - </span> {{Form::text('lodgement_no', $next_lodgement_no, array('class' => 'form-control', 'placeholder' => 'Lodgement No', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('lodgement_date', 'Lodgement Date')}}
                        <div class="input-group mb-3">
                            {{Form::text('lodgement_date', $today, array('class' => 'form-control', 'id'=>'lodgement_date', 'placeholder' => 'Lodgement Date', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('manifest_no', 'Manifest No')}}
                        <div class="input-group mb-3">
                            {{Form::text('manifest_no', null, array('class' => 'form-control', 'placeholder' => 'Manifest No', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('manifest_date', 'Manifest Date')}}
                        <div class="input-group mb-3">
                            {{Form::text('manifest_date', $today, array('class' => 'form-control','id'=>'manifest_date', 'placeholder' => 'Manifest Date', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('agent_id', 'Select Agent')}}
                        <div class="input-group mb-3">
                            {{Form::select('agent_id', $agents, $lastagent, array('class' => 'opt_sel2 form-control', 'placeholder' => 'Select Agent', 'required'  ))}}

                            {{-- <select name="" id="">
                                @foreach ($agents as $item)
                                    <option value="{{$item->id}}">{{$item->name.' ('.$item->ain_no.')' }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('group', 'Group (Import/Export)')}}
                        <div class="input-group mb-3">
                            {{Form::text('group', null, array('class' => 'form-control', 'placeholder' => 'Group', 'required'  ))}}
                        </div>
                    </div>

                    <!-- Note Input Form -->
                    {{--            <div class="form-group">--}}
                    {{--                {{Form::label('note','Note:') }}--}}
                    {{--                {{Form::textarea('note', null, ['class' => 'form-control', 'rows' =>5, 'placeholder' => 'Note']) }}--}}
                    {{--            </div>--}}

                    <hr>

                    <div class="form-group col-12">
                        <div class="text-right">
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
        </div>
        @endrole

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.opt_sel2').select2();
        });

    </script>

@endsection
