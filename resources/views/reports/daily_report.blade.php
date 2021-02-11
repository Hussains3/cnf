@extends('layouts.admin')

@section('content')

    <h2 id="tr" class="text-center">Daily Report</h2>
    <p class="text-center">{{$date}}</p>
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                {!! Form::open(['route' => 'get_daily_report', 'method' => 'post']) !!}
                @csrf
                <div class="form-row">
                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                        <label>Date</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::date('to_date', Carbon\Carbon::today(), ['id'=>'to_date', 'class'=>'form-control']) !!}
                    </div>

                    <div class="col-md-2 text-center">
                        {!! Form::submit('Filter', ['class'=>'btn btn-primary', 'style'=>'padding: .3rem 1rem;']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-2">
                @if (!empty($file_datas))
                    <button class="btn btn btn-secondary" onclick="printDiv('printMe')"> Print Report</button>
                @endif
            </div>
        </div>


    </div>
    @if($file_datas->isNotEmpty() )
    <div class="" id="printMe">
        <table id="daily_report" class="table table-striped table-bordered " style="width:100%">
            <thead>
                <tr>
                    <th>Sirial</th>
                    <th>Operator Name</th>
                    <th>Importer</th>
                    <th>Agent</th>
                    <th>B/E No</th>
                    <th>B/E Date</th>
                    <th>Taka</th>
                </tr>
            </thead>
            @foreach($file_datas as $file_data)
            <tr>
                <td>{{++$i}}</td>
                <td>{{ ( $file_data->operator->name ) ?? null }}</td>
                <td>{{ ( $file_data->ie_data->name ) ?? null }}</td>
                <td>{{$file_data->agent->name}}</td>
                <td>{{$file_data->be_number}}</td>
                <td>{{$file_data->be_date}}</td>
                <td>{{$file_data->fees}}</td>
            </tr>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Toral: B/E </th>
                <th>{{$total_file}}</th>
                <th>Toral Taka: </th>
                <th>{{$total_amount}}</th>
            </tr>


            <tfoot>

            <tr class="d-none">
                <th>ID</th>
                <th>Operator Name</th>
                <th>Importer</th>
                <th>Agent</th>
                <th>B/E No</th>
                <th>B/E Date</th>
                <th>Taka</th>
            </tr>
            </tfoot>
        </table>
    </div>

    @else
        <h2 class="text-center">No Data Found</h2>
        <p class="mt-2 text-center">
            <a class="btn btn-sm btn-info" href="/file_datas/create">Receive a new file</a>
        </p>
    @endif

@endsection


@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/filtering/row-based/range_dates.js"></script>

    <script>

        function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
    </script>


@endsection
