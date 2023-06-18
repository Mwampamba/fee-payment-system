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
                                        <h3>Roles
                                            <a href="{{ route('createNewRole') }}" class="btn btn-success float-right" style="margin-right: 5px;">Add role</a>
                                        </h3>
                                    </div> 
                                        <div class="card-body">
                                            <div class="card">
                                                <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role name</th>  
                                                            <!-- <th>Action</th> -->
                                                            <th>Action</th> 
                                                            <th>Action</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($roles as $index=> $role)
                                                            <tr>  
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $role->name }}</td> 
                                                                <!-- <td><a href="{{ route('roleDetails', [$role->id]) }}" class="btn btn-secondary">View Permissions</a></td> -->
                                                                <td><a href="#" class="btn btn-warning">Update role</a></td>
                                                                <td><a href="#" onclick="return confirm('Are you sure you want to delete this role?')" class="btn btn-danger">Delete role</a></td>                                         
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



