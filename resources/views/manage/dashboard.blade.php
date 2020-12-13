@extends('layouts.admin')

@section('content')

    @role('administrator')
            <p>This is visible to users with the admin role. Gets translated to
            \Laratrust::hasRole('admin')</p>
    @endrole

    @role('countermanager')
            <p>This is visible to users with the admin role. Gets translated to
            \Laratrust::hasRole('admin')</p>
    @endrole

    


@endsection
