@extends('layouts.admin')

@section('content')

    <h2 id="tr" class="text-center">Monthly Final Report</h2>

    <table id="monthly_final_report" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Day</th>
                <th>Files</th>
                <th>Pages</th>
                <th>Avarage</th>
                <th>Holiday</th>
                <th>Ave. Total</th>
                <th>Work Point</th>
                <th>%</th>
                <th>Add</th>
                <th>Final%</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{$i++}}</th>
                <th>Name</th>
                <th>Day</th>
                <th>Files</th>
                <th>Pages</th>
                <th>Avarage</th>
                <th>Holiday</th>
                <th>Ave. Total</th>
                <th>Work Point</th>
                <th>%</th>
                <th>Add</th>
                <th>Final%</th>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Day</th>
                <th>Files</th>
                <th>Pages</th>
                <th>Avarage</th>
                <th>Holiday</th>
                <th>Ave. Total</th>
                <th>Work Point</th>
                <th>%</th>
                <th>Add</th>
                <th>Final%</th>
            </tr>
        </tfoot>
    </table>
@endsection


@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/filtering/row-based/range_dates.js"></script>

    <script !src="">

    </script>


@endsection
