@extends('layouts.admin')

@section('content')

    <h2 id="tr" class="text-center">Monthly Final Report</h2>

    <table id="monthly_final_report" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
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
            @foreach ($userSalary as $item)


            <tr>
                @php
                $file = $item->totalFile;
                $page = $item->totalPage;
                    $day = $item->day - $item->holiday;
                    $average = ($item->totalFile)/$day;
                    $avgTotal = ($average * $item->holiday) + $item->totalFile;
                    $wp = ((((($page / $day) * $item->holiday) + $page) - $avgTotal)/2) + $avgTotal;
                    $parcent = (100 * $wp) / $totalWorkPoint;
                @endphp
                <th>{{$item->name}}</th>
                <th>{{$day}}</th>
                <th>{{$file}}</th>
                <th>{{$page}}</th>
                <th>{{round($average,2)}}</th>
                <th>{{$item->holiday}}</th>
                <th>{{round($avgTotal,2)}}</th>
                <th>{{round($wp,2)}}</th>
                <th>{{round($parcent,2)}}</th>
                <th>{{80}}</th>
                <th>{{round($parcent + 80,2)}}</th>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th>Total</th>
                <th></th>
                <th>total file</th>
                <th>total page</th>
                <th></th>
                <th></th>
                <th></th>
                <th>{{ round($totalWorkPoint,2)}}</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>

    <div class="sig-sec mt-5">
        <h5>Signeture Of Working Person</h5>
        <table class="table table-striped table-bordered " style="width:50%">
            <thead>
                <tr>
                    <th>Se. No</th>
                    <th>Name</th>
                    <th>Result</th>
                    <th colspan="2">Signeture</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rankList as $key => $rankItem)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$rankItem['name']}}</td>
                    <td>
                        @if ($key == 0)
                            {{$key + 1}}st
                        @elseif($key == 1)
                            {{$key + 1 }}nd
                        @elseif($key == 2)
                            {{$key + 1}}rd
                        @else
                            {{$key + 1}}th
                        @endif
                    </td>
                    <td colspan="2"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection


@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/filtering/row-based/range_dates.js"></script>

    <script !src="">

    </script>


@endsection
