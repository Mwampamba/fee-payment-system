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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>New permission 
                                            <a href="{{ route('permissions')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveNewPermission')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>Permission name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Permission name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div> 
        </section>
    </div> 
    @include('includes.footer')