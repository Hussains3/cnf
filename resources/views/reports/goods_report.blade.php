<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assesment Reports</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
    font-family: "Open Sans", 'Helvetica' 'Arial', sans-serif;
    line-height: 1.25;
    }
        #printDiv{
            max-width: 21cm;
            width: 100%;
            height: auto;
            margin: 0 auto;
            border: 1px solid darkgray;
        }
        table{
            max-width: 100%;
            width: 100%;
            padding: 5px;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
        }
        .text-center{
            text-align: center;
        }
        .name{text-align: left;}
        td, p {
            font-size: 14px;
            line-height: 1.5em;
            font-weight: normal;
            text-align: center;
        }
        .printHead{
            margin-bottom: 20px;
        }
        .printHead p{
            border-bottom: 1px solid darkgray;
            font-weight: 700;
        }
        tr td.name ,  tr th.name {
	padding-left: 5px;
}
            tr {
            	border-top: 1px solid darkgray;
	            line-height: 1.5rem;
}
.highlight{
    background: lightgray;
}
    </style>
</head>
<body>
<div id="printDiv">
    <div class="printHead text-center">

                <h2>Custom House Benapole, Jessore</h2>
                <h2>Assesment Report Per Day</h2>
                <h3>December-2020</h3>

    </div>
    <table id="print_report">
        <thead>
            <tr>

                <th scope="col"  class="name">Name</th>
                <th scope="col" >Date</th>
                <th scope="col" >Total File</th>
                <th scope="col" >Perishable </th>
                <th scope="col" >Wating G.F </th>
                <th scope="col" >(T - P)</th>
                <th scope="col" >{(T - P) - W.G.F}</th>
                <th scope="col" >Percentage</th>
            </tr>
        </thead>
        @foreach($reportItems as $reportItem)
        <tr class="@if($reportItem['name']  != $name)
        highlight
        @endif">


            <td  class="name">
                @if($reportItem['name']  != $name)
                {{ $name = $reportItem['name'] }}
                @endif
            </td>
            <td >{{$reportItem['lodgement_date']}}</td>
            <td >{{$reportItem['totalFiles']}}</td>
            <td >{{$reportItem['TotalPerishable']}}</td>
            <td >{{$reportItem['Waiting_G_F']}}</td>
            <td >{{$reportItem['tp']}}</td>
            <td >{{$reportItem['tpgf']}}</td>
            <td >{{$reportItem['percentage']}}</td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
