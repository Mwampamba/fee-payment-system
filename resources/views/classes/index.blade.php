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
                                        <h3>Classes 
                                            <a href="{{route('addClass')}}" class="btn btn-success float-right">Add new class</a> 
                                        </h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Class | Programme of study</th>   
                                                        <th>Academic year</th> 
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($classes as $index=>$class)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $class->name }} :: {{ $class->programme->name }}</td>
                                                            <td>{{ $class->academic_year->name }}</td>
                                                            <td><a href="{{route('viewClassMembers', [$class->id])}}" class="btn btn-secondary">View class members</a></td>
                                                            <td><a href="{{route('editClass', [$class->id])}}" class="btn btn-warning">Update</a></td>
                                                            <td><a href="{{route('deleteClass', [$class->id])}}" onclick="return confirm('Are you sure you want to delete this class?')" class="btn btn-danger">Delete</a></td>

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