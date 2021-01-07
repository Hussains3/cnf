{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<title></title>
<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
.btn{
    padding: 5px 20px;
    margin: 5px;
    border: 1px  solid #B388EB;
    border-radius: 5px;
    background-color: #B388EB;
    color: white;
    font-size: 18px;
}
.btn:hover{
    border: 1px  solid #8093F1;
    border-radius: 5px;
    background-color: #8093F1;
    color: white;
}
#printDiv{
    width: 100%;
    max-width: 20.8cm;
    height: 100%;
    max-height: 15cm;
    overflow: hidden;
    background-image: url(/images/bg.jpg);
    background-size: cover;
    padding-top: 4.95cm;
    padding-left:5.7cm;

}
.w100{
    width: 100%;
    max-width: 100%;
    height: 1.2cm;
    max-height: 1.2cm;
    margin-bottom: .5cm;
    font-size: 18px;
    font-weight: bold;
}
.w50{
    width: 49%;
    display: inline-block;
}
.child1{
    /* padding-left: 0.5cm; */
}
.child2{
    text-align: right;
    padding-right: 2.5cm;
}
.child1,
.child2{
    line-height: 1.2cm;
}
@media print{
    @page{
        size: 20.8cm 15cm portrait;
    }
    .hidden-print{
        display: none;
    }
    #printDiv{
        padding-top: 4.5cm !important;
        padding-left:5.7cm !important;
    }
}
</style>
    <div id="invoice">
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button onclick="printDiv()" id="printInvoice" class="btn"><i class="fa fa-print"></i> Print</button>
                <a href="/file_datas" class="btn btn-dark">Back</a>
            </div>
            <hr>
        </div>
        <div id="printDiv">
            <main>
                <div class="w100">
                    <div class="w50 child1">
                        {{$file_data->lodgement_no}}
                    </div>
                    <div class="w50 child2" >
                        {{$file_data->lodgement_date}}
                    </div>

                </div>
                <div class="w100">
                    <div class="child1" >
                        {{$file_data->agent->name}}
                    </div>
                </div>

                <div class="w100" >
                    <div class="w50 child1">
                        {{$file_data->be_number}}
                    </div>
                    <div class="w50 child2" >
                        {{$file_data->be_date}}
                    </div>
                </div>
            </main>
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

