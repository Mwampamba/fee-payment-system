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
                                    <h3>Permission
                                        <a href="{{ route('permissions') }}" class="btn btn-danger float-right">BACK</a>
                                    </h3>
                                </div>  
                                    <div class="card">
                                        <div class="card-body">
                                            <table> 
                                                <tbody>
                                                    @if ($permission) 
                                                        <tr>   
                                                            <td>{{ $permission->name }}</td>     
                                                        </tr> 
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-header">
                                    <h3>Roles</h3>
                                </div>  
                                    @if($permission->roles)
                                        @foreach($permission->roles as $permission_role)
                                            <ul>
                                                <li>{{ $permission_role->name }}</li>
                                            </ul>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                </div> 
        </section>
    </div> 
    @include('includes.footer')



