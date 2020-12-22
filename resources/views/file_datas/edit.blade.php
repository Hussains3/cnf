@extends('layouts.admin')

@section('content')

    <div style="margin: 0 15%;">

        <div class="card card-accent-primary mb-3 text-left mt-5" style="">
            <div class="card-header">Data Entry -
                @role('receiver')
                    Receiver Part
                @endrole
                @role('operator')
                    Operator Part
                @endrole
                @role('deliver')
                    Delivery Part
                @endrole
            </div>
            <div class="card-body text-primary">
                {{ Form::model($file_data, ['route' => ['file_datas.update', $file_data->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}

                {{csrf_field()}}
                <div class="row">
                    @role('admin|receiver|operator|deliver')
                    <div class="form-group col-6">
                        {{Form::label('lodgement_no', 'Lodgement No')}}
                        <div class="input-group mb-3">
                            <span style="padding-top: 5px;padding-right: 10px">2020 - </span>{{Form::text('lodgement_no', null, array('class' => 'form-control', 'placeholder' => 'Lodgement No', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('lodgement_date', 'Lodgement Date')}}
                        <div class="input-group mb-3">
                            {{Form::date('lodgement_date', \Carbon\Carbon::now(), array('class' => 'form-control', 'placeholder' => 'Lodgement Date', 'required'  ))}}
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
                            {{Form::date('manifest_date', \Carbon\Carbon::now(), array('class' => 'form-control', 'placeholder' => 'Manifest Date', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('agent_id', 'Select Agent')}}
                        <div class="input-group mb-3">
                            {{Form::select('agent_id', $agents, null, array('class' => 'form-control', 'placeholder' => 'Select Agent', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-6">
                        {{Form::label('group', 'Group (Import/Export)')}}
                        <div class="input-group mb-3">
                            {{Form::text('group', null, array('class' => 'form-control', 'placeholder' => 'Group', 'required'  ))}}
                        </div>
                    </div>

                    {{--   End of receive part--}}
                    @endrole

                    @role('admin|operator|deliver')
                    <div class="card-accent-primary col-12 mb-3"></div>

                    <!-- Import / Export Input Form -->
                    <div class="form-group col-4">
                        {{Form::label('ie_type','File Type (Import / Export:) ') }} <br>
                        <div class="radio radio-inline">
                            <span> </span>
                            <label>
                                {{Form::radio('ie_type', 'Import', true)}} Import
                            </label>
                            <label>
                                {{Form::radio('ie_type', 'Export')}} Export
                            </label>

                        </div>
                    </div>

                    <div class="form-group col-4">
                        {{Form::label('bin_no','BIN No:') }}

                        {{Form::text('bin_no', $file_data->ie_data->bin_no ?? null, ['class' => 'form-control', 'placeholder' => 'BIN No', 'required']) }}

                        @error('bin_no')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>


                    <div class="form-group col-4 ">
                        {{Form::label('name', 'Importer / Exporter Name')}}
                        <div class="input-group mb-3">
                            {{Form::text('name', $file_data->ie_data->name ?? '', array('class' => 'form-control', 'placeholder' => 'Importer / Exporter Name', 'required'  ))}}
                            @error('name')
                            <span>{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group col-4 ">
                        {{Form::label('owners_name', 'Owner / Manager Name')}}
                        <div class="input-group mb-3">
                            {{Form::text('owners_name', $file_data->ie_data->owners_name ?? '', array('class' => 'form-control', 'placeholder' => 'Owner Name'))}}
                            @error('owners_name')
                            <span>{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <!-- Photo Input Form -->
                    <div class="form-group col-4">
                        {{Form::label('photo','Photo:') }}
                        {{Form::file('photo', null) }}
                        <p class="help-block"></p>
                        @error('photo')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Destination Input Form -->
                    <div class="form-group col-4">
                        {{Form::label('destination','Designation:') }}

                        {{Form::text('destination', $file_data->ie_data->destination ?? '', ['class' => 'form-control', 'placeholder' => 'Destination']) }}

                        @error('destination')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Destination Input Form -->
                    <div class="form-group col-8">
                        {{Form::label('office_address','Agent / Office Address:') }}

                        {{Form::text('office_address', $file_data->ie_data->office_address ?? '', ['class' => 'form-control', 'placeholder' => 'Office Address']) }}

                        @error('office_address')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Phone Number Input Form -->
                    <div class="form-group col-4">
                        {{Form::label('phone','Phone Number:') }}

                        {{Form::text('phone', $file_data->ie_data->phone ?? '', ['class' => 'form-control', 'placeholder' => 'Agent Phone Number', 'required']) }}

                        @error('phone')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Email Input Form -->
                    <div class="form-group col-4 ">
                        {{Form::label('email','Email:') }}

                        {{Form::email('email', $file_data->ie_data->email ?? '', ['class' => 'form-control', 'placeholder' => 'Email']) }}

                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Phone Number Input Form -->
                    <div class="form-group col-8">
                        {{Form::label('house','House / Station') }}

                        {{Form::text('house','Benapol', ['class' => 'form-control', 'placeholder' => 'Benapol', 'required']) }}

                        @error('house')
                        <span>{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="card-accent-primary col-12 mb-3"></div>

{{--                    <div class="form-group col-4 d-none">--}}
{{--                        {{Form::label('ie_data_id', 'Select Importer / Exporter')}}--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            {{Form::select('ie_data_id', $ie_datas, null, array('class' => 'form-control', 'placeholder' => 'Select Importer / Exporter', 'required'  ))}}--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="form-group col-4">
                        {{Form::label('goods_name', 'Goods Name')}}
                        <div class="input-group mb-3">
                            {{Form::text('goods_name', null, array('class' => 'form-control', 'placeholder' => 'Goods Name'))}}
                        </div>
                    </div>

                    <div class="form-group col-4">
                        {{Form::label('goods_type', 'Goods Type')}}
                        <div class="input-group mb-3">
                            {{-- {{Form::select('goods_type', ['Perishable'=>'Perishable','Non-Perishable'=>'Non-Perishable'], null, array('class' => 'form-control', 'placeholder' => 'Goods Type', 'required'  ))}} --}}
                            
                            {{Form::radio('goods_type', 'Perishable', true,['class' => 'form-control','required'])}}
                            {{Form::label('Perishable')}}
                            
                            {{Form::radio('goods_type', 'Non-Perishable', true,['class' => 'form-control','required'])}}
                            {{Form::label('Non-Perishable')}}
                        </div>
                    </div>

                    <div class="form-group col-4">
                        {{Form::label('be_number', 'B/E Number')}}
                        <div class="input-group mb-3">
                            {{Form::text('be_number', $next_be_number, array('class' => 'form-control', 'placeholder' => 'B/E Number', 'required'  ))}}
                            
                        </div>
                    </div>

                    <div class="form-group col-4">
                        {{Form::label('be_date', 'B/E Date')}}
                        <div class="input-group mb-3">
                            {{Form::date('be_date', \Carbon\Carbon::now(), array('class' => 'form-control', 'placeholder' => 'be_date'))}}
                        </div>
                    </div>


                    <div class="form-group col-4">
                        {{Form::label('page', 'Pages')}}
                        <div class="input-group mb-3">
                            {{Form::number('page', null, array('class' => 'form-control', 'placeholder' => 'Pages', 'required'  ))}}
                        </div>
                    </div>

                    <div class="form-group col-4">
                        {{Form::label('fees', 'Fees /=')}}
                        <div class="input-group mb-3">
                            {{Form::number('fees', '230', array('class' => 'form-control', 'placeholder' => '230/='))}}
                        </div>
                    </div>

                    @endrole

                    <hr>

                    <div class="form-group col-12">
                        <div class="text-right">
                            {{Form::submit('Deliver', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
        </div>



        {{--   End of Oprator part--}}

    </div>

@endsection

@section('scripts')
<script>

@endsection


