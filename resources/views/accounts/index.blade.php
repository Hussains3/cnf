@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col">
            <h2>Account List</h2>
        </div>

    </div>

    <div class="card-content">
        <table id="purchases" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
                <th>Reason</th>
                <th>Note</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{++$i}} </td>
                    <td>{{$account->date}}</td>
                    <td>{{$account->debit}}</td>
                    <td>{{$account->credit}}</td>
                    <td>{{$account->balance}}</td>
                    <td>{{$account->reason}}</td>
                    <td>{{$account->note}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>


    <script>
        $('#purchases').DataTable({
            dom: 'lBftip'
        });
    </script>

    <script !src="">

        function deleteform(id){
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "It will permanently deleted !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result=> {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    $("#deleteForm"+id).submit();
                }
            })
        }

    </script>
@endsection
