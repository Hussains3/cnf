@extends('layouts.admin')

@section('content')
    <style>
        @media print {


            table {
                border-collapse: separate;
                border: 0px solid #000000 !important;
                border-spacing: 0;
                font-size: 11pt;
                width: 100%;
                border-color: #000000;
                border-right: 1px solid !important;

            }

            tr {
                border-color: #000000 !important;
                border-style: none;
                border-width: 0;
            }

            td {
                border-color: #000000 !important;
                border-left: 1px solid !important;
                border-bottom: 1px solid !important;
            }

            th {
                border-color: #000000 !important;
                border-left: 1px solid !important;
                border-top: 1px solid !important;
                border-bottom: 1px solid !important;
            }
        }
    </style>

<div id="print" style="margin-left: 40%;">

    <div class="row">
        <div class="col">
            <h2 class="ml-4 mb-5">DAILY REPORT</h2>
        </div>
        <hr>
        <div class="col-12">Date: {{\Carbon\Carbon::now()}}</div>

    </div>
    <div class="row">
        <table id="data" class="table is-narrow" style="width: 40%">
            <thead>
            <tr>
                <th>Total B/E</th>
                <th>Total Taka</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th>{{$total_file}}</th>
                <th>{{$total_amount}}</th>

            </tr>

            </tbody>
        </table>
    </div>
</div>
    <hr>
<button class="btn btn-info text-center" style="margin-left: 60%" onclick="printDiv()">Print</button>


@endsection

@section('scripts')
    <script>
        function printDiv() {
            var divContents = document.getElementById("print").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h2> <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
