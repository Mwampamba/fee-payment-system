@include('includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('includes.navbar') 
    @include('includes.sidebar') 
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Students
                                @can('isAdmin') 
                                    <a href="{{ route('addStudent')}}" class="btn btn-success float-right" style="margin-right: 5px;">Register new student</a> 
                                @endcan
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <table id="myDataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student name</th>
                                            <th>Programme of study</th>
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $index=>$student)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->class->name }} :: {{ $student->programme->name }}</td>
                                            <td><a href="{{route('studentClassPayments', [$student->id])}}" class="btn btn-secondary">View Payment Details</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div> 
    @include('includes.footer')