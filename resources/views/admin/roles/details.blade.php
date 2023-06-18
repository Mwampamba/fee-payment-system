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
                                    <h3>Role permissions
                                        <a href="{{ route('roles') }}" class="btn btn-danger float-right">BACK</a>
                                    </h3>
                                </div> 
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('attachPermissionsToRole', [$role->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label>Add permissions<span class="text-danger">*</span></label>
                                                        <select name="permissions[]" class="form-control selector" multiple="multiple"> 
                                                            @foreach($permissions as $permission)
                                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('permissions')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <button type="submit" class="btn btn-primary">Assign permission</button>
                                                    </div>
                                                </div>
                                            </form> 
                                            <table id="myDataTable" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Permission</th> 
                                                        <th>Action</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($role->permissions)
                                                        @foreach ($role->permissions as $index=> $role_permission)
                                                        <tr>  
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $role_permission->name }}</td>     
                                                            <td><a href="{{ route('removePermissionsToRole', [$role->id, $role_permission->id]) }}" onclick="return confirm('Are you sure you want to remove this permission?')" class="btn btn-danger">Remove</a></td>                                         
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
        </section>
    </div> 
    @include('includes.footer')



