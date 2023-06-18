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
                                    <h3>Staffs list
                                        @can('isAdmin')
                                            <a href="{{ route('addNewStaff') }}" class="btn btn-success float-right">Register new staff</a>
                                        @endcan
                                    </h3>
                                </div> 
                                    <div class="card-body">
                                        <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>  
                                                        <th>Email</th> 
                                                        @can('isAdmin') 
                                                        <th>Role</th>  
                                                        <th>Action</th>
                                                        <th>Action</th> 
                                                        @endcan
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($staffs as $index=> $staff)
                                                        <tr>  
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $staff->name }}</td> 
                                                            <td>{{ $staff->email }}</td> 
                                                            @can('isAdmin')  
                                                            <td>{{ $staff->role == '1' ? 'Admin' : 'Burser' }}</td>
                                                            <td><a href="{{route('editStaff',[$staff->id])}}" class="btn btn-warning">Update</a></td>                                        
                                                            <td><a href="#" onclick="return confirm('Are you sure you want to delete this staff?')" class="btn btn-danger">Delete</a></td> 
                                                            @endcan
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </section>
            </div> 
    @include('includes.footer')