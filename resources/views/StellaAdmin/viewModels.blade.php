@extends('layouts.registerapp')

<title>@yield('pageTitle') Stella Admin </title>


@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">

    @if (count($user) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading m-3 text-center">
                            <h3>Models</h3>
                        </div>

                        <div class="panel-body table-responsive">
                            <table class="table table-hover table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Registered</th>
                                    <th></th>
                                    <th></th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($user as $user)
                                        <tr>
                                           
                                            <td class="table-text">
                                                <div>{{ $user->firstName }}</div>
                                            </td>
                                            
                                            <td class="table-text">
                                                <div>{{ $user->lastName }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->emailAddress }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->status }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->created_at }}</div>
                                            </td>
                                            <td><a href="#">View</a></td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
            
               @endif

</body>

@endsection