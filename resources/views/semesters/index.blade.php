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
                                    <h3>Semesters list
                                        <a href="{{ route('addSemester')}}" class="btn btn-success float-right">Add new semester</a>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <table id="myDataTable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Semester | Academic year</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($semesters as $index=>$semester)
                                                <tr>
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $semester->name }} :: {{ $semester->academic_year->name }}</td>
                                                    <td>{{ $semester->status == 1 ? 'Active' : 'Deactivated' }}</td>
                                                    <td><a href="{{ route('editSemester', $semester->id) }}" class="btn btn-warning">Edit</a></td>
                                                    <td><a href="{{ route('deactivateSemester', $semester->id) }}" onclick="return confirm('Are you sure you want to deactivate this semester?')" class="btn btn-danger">Deactivate</a></td>
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