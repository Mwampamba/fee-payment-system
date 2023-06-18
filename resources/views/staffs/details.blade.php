@include('includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('includes.navbar') 
    @include('includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header"> 
            <div class="card-header">
                <h4>Staff details
                    <a href="{{ route('staffs') }}" class="btn btn-danger float-right">BACK</a>
                </h4>
            </div> 
        </div> 
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12"> 
                        <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th>Name</th>  
                                    <th>Email</th> 
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->email }}</td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="card"> 
                            <div class="card-header">
                                <h4>Role(s)</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"> 
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    @if ($staff->roles) 
                                                        @forelse($staff->roles as $staff_role) 
                                                            <tr>
                                                                <td>{{ $staff_role->name }}</td> 
                                                                <td><a href="{{ route('removeRole', [$staff_role->id, $staff->id]) }}" onclick="return confirm('Are you sure you want to remove this role?')" class="btn btn-danger">Remove</a></td>
                                                            </tr> 
                                                        @empty
                                                        <p>This user has no role</p>
                                                        @endforelse 
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="card">
                                        <div class="card-body">
                                        <form action="{{ route('attachRole', [$staff->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label>Add a role<span class="text-danger">*</span></label>
                                                        <select name="role" class="form-control selector"> 
                                                            <option value="">Select role here</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('roles')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <button type="submit" class="btn btn-primary">Assign role</button>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="card"> 
                            <div class="card-header">
                                <h4>Permission(s)</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"> 
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    @if ($staff->permissions) 
                                                        @forelse($staff->permissions as $staff_permission) 
                                                            <tr>
                                                                <td>{{ $staff_permission->name }}</td> 
                                                                <td><a href="{{ route('removePermisssion', [$staff->id, $staff_permission->id]) }}" onclick="return confirm('Are you sure you want to remove this permission?')" class="btn btn-danger">Remove</a></td>
                                                            </tr> 
                                                        @empty
                                                        <p>This user has no permissions</p>
                                                        @endforelse 
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('givePermission', [$staff->id]) }}" method="POST" enctype="multipart/form-data">
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
                                                        <button type="submit" class="btn btn-primary">Assign permission(s)</button>
                                                    </div>
                                                </div>
                                            </form>  
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div> 
        </section>
    </div> 
    @include('includes.footer')



