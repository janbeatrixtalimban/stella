@extends('layouts.registerapp')

<title>@yield('pageTitle') Stella Admin </title>


@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">

    @if (count($audit) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading m-3 text-center">
                            <h3>Audit Log</h3>
                        </div>

                        <div class="panel-body table-responsive">
                            <table class="table table-hover table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                    
                                    <th>User ID</th>
                                    <th>Log Type</th>
                                    <th>Date Registered</th>
                                    
                                    <th></th>
                                    <th></th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($audit as $audit)
                                        <tr>
                                           
                                            <td class="table-text">
                                                <div>{{ $audit->userID }}</div>
                                            </td>
                                            
                                            <td class="table-text">
                                                <div>{{ $audit->logType }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $audit->created_at }}</div>
                                            </td>
                                            
                                            
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
            
               @endif

</body>

@endsection