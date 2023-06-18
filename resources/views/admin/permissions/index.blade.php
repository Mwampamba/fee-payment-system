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
                                        <h3>Permissions
                                            <a href="{{ route('createNewPermission') }}" class="btn btn-success float-right" style="margin-right: 5px;">Add permission</a>
                                        </h3>
                                    </div> 
                                        <div class="card-body">
                                            <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Permission name</th>  
                                                        <th>Action</th>
                                                        <th>Action</th> 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($permissions as $index=> $permission)
                                                        <tr>  
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $permission->name }}</td>  
                                                            <td><a href="{{ route('permissionDetails', [$permission->id]) }}" class="btn btn-secondary">View Roles</a></td>     
                                                            <td><a href="#" class="btn btn-warning">Update</a></td>
                                                            <td><a href="#" onclick="return confirm('Are you sure you want to delete this permission?')" class="btn btn-danger">Deactivate</a></td>                                         
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