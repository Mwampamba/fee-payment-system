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
                                    <h3 class="m-0">Update programme 
                                        <a href="{{ route('programmes')}}" class="btn btn-danger float-right">BACK</a> 
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('updateProgramme', $programme->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="">Programme name<span class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $programme->name }}" class="form-control form-control-lg" placeholder="Programme name" />
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 
                                            <div class="col-md-12 mb-3">
                                                    <label>Fee<span class="text-danger">*</span></label>
                                                    <input type="number" name="fee" value="{{ $programme->fee }}" min="1" class="form-control form-control-lg" placeholder="Programme fee" />
                                                    @error('fee')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            <div class="col-md-12 mb-3">
                                            <button type="submit" class="form-control-lg btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </section>
    </div>
    @include('includes.footer')