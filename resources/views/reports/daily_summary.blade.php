@extends('layouts.admin')

@section('content')
<style>
    @media print {
        *{margin:0;padding:0;}
        .pdn {
            display: none;
        }
        .pbg{
            background-color: gray;
        }
        .date{
            text-align: left !important;
        }
    }
</style>

<div class="print" id="print">
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h4>BENAPOLE CUSTOMS C&F AGENTS ASSOCIATION</h4>
        </div>
        <hr>
        <div class="col-12 text-center mb-5">
            <h5 class="pbg">DAILY REPORT</h5>
        </div>
        <div class="col-12 date text-center">Date: {{$date}}</div>

    </div>
    <div class="row card pdn">
        <div class="card-header">
            {!! Form::open(['route' => 'get_daily_summary', 'method' => 'post']) !!}
            @csrf
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group form-inline m-0">
                            {!! Form::label('date','Date') !!}
                            {!! Form::date('date', $date , ['class'=>'form-control mx-2']) !!}
                            {!! Form::submit('Filter', ['class'=>'btn btn-primary mx-2','style'=>'padding: .3rem 1rem;']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <table id="data" class="table is-narrow table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Total B/E</th>
                    <th class="text-center">Total Taka</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th class="text-center">{{$total_file}}</th>
                    <th class="text-center">{{$total_amount}}</th>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-4"></div>

    </div>
    <hr>
<button class="pdn btn btn-info text-center" style="" onclick="printDiv()">Print</button>
</div>


@endsection

@section('scripts')
    <script>
        function printDiv() {
            Popup($('#print').outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        }
    </script>
@endsection
