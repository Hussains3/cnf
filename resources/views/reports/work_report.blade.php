@extends('layouts.admin')

@section('content')

    <h2 id="tr" class="text-center">B/E Branch (Association) Custom House, Benapole</h2>
    <h2 id="tr" class="text-center">Work Report Sheet Per Day</h2>
    <div class="card-header">
        <form action = "" >
            <div class="form-row">

                <div class="col-5">
                    <div class="input-daterange form-check form-inline">
                        {{-- <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly /> --}}
                        {{-- <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly /> --}}
                        {!! Form::label('target_date', 'Select Date') !!}
                        {!! Form::date('target_date', date('Y-m-d'), ['id'=>'target_date','class'=>'form-control lg']) !!}
                    </div>
                </div>

                <div class="col ">
                {{--{{Form::select('agent_id', $agents, null, ['id' => 'agent_id', 'class' => 'select2_op form-control','placeholder' => 'Select Agent', 'required'])}}--}}
                </div>

                <div class="col text-center">
                    <button type="button" name="filter" id="filter" class="btn btn-primary" style="padding: .3rem 1rem;">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-success" style="padding: .3rem 1rem;">Refresh</button>
                </div>
            </div>
        </form>
    </div>
    <table id="daily_report" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Date:</th>
                <th class="text-center">{{date('d-m')}}</th>
                <th class="text-center" colspan="2">{{date('Y')}}</th>
                <th class="text-center" colspan="4"></th>
                <th class="text-center">{{515}}</th>
                <th class="text-center">(+)</th>
                <th class="text-center">18</th>
                <th class="text-center">311</th>
                <th class="text-center" colspan="2">P/1</th>
                <th class="text-center"></th>
            </tr>
        </thead>
        @foreach($work_sheet as $file_data)
        <tr>
            <td class="text-center">No</td>
            <td class="text-center" colspan="13">{{$file_data->name}}</td>
            <td class="text-center">Total Item</td>
        </tr>
        <tr>
            <td class="text-center" rowspan="2" class="align-middle text-center align-items-center">{{$i++}}</td>
            <td class="text-center">Item 1</td>
            <td class="text-center" colspan="2">Item 2-4</td>
            <td class="text-center" colspan="2">Item 5-7</td>
            <td class="text-center" colspan="2">Item 8-9</td>
            <td class="text-center" colspan="2">Item 10 +</td>
            <td class="text-center" colspan="2">Note</td>
            <td class="text-center" colspan="2">Pages</td>
            <td class="text-center" rowspan="3">{{$totalFileData[] = $file_data->TotalItem}}</td>
        </tr>
        <tr>
            <td class="text-center">{{$file_data->item_1}}</td>
            <td class="text-center" colspan="2">{{$file_data->item_2_4}}</td>
            <td class="text-center" colspan="2">{{$file_data->item_5_7}}</td>
            <td class="text-center" colspan="2">{{$file_data->item_8_9}}</td>
            <td class="text-center" colspan="2">{{$file_data->item_10}}</td>
            <td class="text-center" colspan="2"></td>
            <td class="text-center" colspan="2">{{$totalFilePages[] = $file_data->total_pages}}</td>
        </tr>
        <tr>
            <td class="text-center" colspan="2" class="text-center">Item Numbers</td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
        </tr>
        @endforeach

        <tfoot>

        <tr class="">
            <th class="text-center"  colspan="2"></th>
            <th class="text-center"  colspan="3">Alltotal</th>
            <th class="text-center"  colspan="3">511</th>
            <th class="text-center"  >(+)</th>
            <th class="text-center" >16</th>
            <th class="text-center" >(=)</th>
            <th class="text-center"  colspan="4">{{array_sum($totalFilePages)}}</th>
            <th class="text-center" >{{array_sum($totalFileData)}}</th>
        </tr>
        </tfoot>
    </table>
@endsection


@section('scripts')
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/filtering/row-based/range_dates.js"></script>

    <script !src="">

        $('#daily_report').DataTable({
            dom: 'lBftip'
        });


        // date rang picker
        // $(function() {
        //     var start = moment().subtract(29, 'days');
        //     var end = moment();
        //     function cb(start, end) {
        //         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //         var from_date = start.format('YYYY-MM-DD');
        //         var to_date = end.format('YYYY-MM-DD');
        //         $("#from_date").val(from_date);
        //         $("#to_date").val(to_date);
        //         // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        //     }

        //     $('#reportrange').daterangepicker({
        //         startDate: start,
        //         endDate: end,
        //         ranges: {
        //             'Today': [moment(), moment()],
        //             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        //             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //             'This Month': [moment().startOf('month'), moment().endOf('month')],
        //             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //         }
        //     }, cb);
        //     cb(start, end);
        // });

        //ajux data with date range

        $(function() {
            var customer_name = '';
            load_data();

            function load_data(from_date = '', to_date = '', agent_id = '')
            {
                $('#all_report').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: 'lBftip',
                    buttons: [
                        {
                            extend: 'pdf',
                            messageTop: 'Operated File Report',
                            footer: true
                        },
                        'csv',
                        'excel',
                        {
                            extend: 'print',
                            messageTop: '<h2>File Operated File Report ' +customer_name+ '</h2>',
                            footer: true
                        }
                    ],
                    ajax: {
                        url:'{!! route("get_data_entry") !!}',
                        data:{from_date:from_date, to_date:to_date, agent_id:agent_id}
                    },
                    columns: [
                        {
                            title: "No",
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        { data: 'user.name', name: 'user.name'},
                        { data: 'file_data.lodgement_no', name: 'file_data.lodgement_no' },
                        { data: 'file_data.manifest_no', name: 'file_data.manifest_no' },
                        { data: 'file_data.page', name: 'file_data.page' },
                        { data: 'file_data.status', name: 'file_data.status' },
                    ],

                    "footerCallback": function(row, data, start, end, display) {
                        var api = this.api();
                        api.columns('.sum', { page: 'current' }).every(function () {
                            var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                            console.log(sum);
                            // Update footer
                            $(this.footer()).html('Total = '+sum);
                        });
                    }


                });

            }

            $('#filter').click(function(){
                var target_date = $('#target_date').val();


                if( target_date != '')
                {
                    $('#daily_report').DataTable().destroy();
                    load_data(target_date);
                }
                else
                {
                    alert('Date is required');
                }
            });

            $('#refresh').click(function(){
                $('#target_date').val('');
                $('#daily_report').DataTable().destroy();
                customer_name = '';
                document.getElementById("tr").innerHTML = 'Operated File Report '+customer_name;
                load_data();
            });

        });
    </script>


@endsection
