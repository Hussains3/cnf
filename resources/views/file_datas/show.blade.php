<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="{{ asset('css/inv.css') }}" rel="stylesheet">
<title>BENAPOLE CUSTOMS C&F AGENTS ASSOCIATION</title>
    <div id="invoice">
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button onclick="printDiv()" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
{{--                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>--}}
            </div>
            <hr>
        </div>
        <div id="printDiv" class="invoice overflow-auto">
            <div style="width: 20.6cm; height:14.8cm;background-image: url(/memo.jpg); background-size: cover">
                <main style="padding-left:5.7cm; padding-top: 5.3cm">
                    <div class="row">
                        <div class="col-6">
                            {{$file_data->lodgement_no}}
                        </div>
                        <div class="col-6" style="padding-left: 2.5cm">
                            {{$file_data->lodgement_date}}
                        </div>
                        <div class="col-12" style="padding-top: 1cm">
                            {{$file_data->agent->name}}
                        </div>
                    </div>
                    <div class="row" style="padding-top: 1.2cm">
                        <div class="col-6">
                            {{$file_data->be_number}}
                        </div>
                        <div class="col-6" style="padding-left: 2.5cm">
                            {{$file_data->be_date}}
                        </div>
                    </div>

                </main>
{{--                <footer>--}}
{{--                    SoftxLtd--}}
{{--                </footer>--}}
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>
    <script !src="">
        function printDiv() {
            Popup($('#printDiv').outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        }
    </script>

