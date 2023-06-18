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
                                <h3>Academic year details 
                                    <a href="{{ route('academicYears')}}" class="btn btn-danger float-right">BACK</a> 
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('saveAcademicYear')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Academic year<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Academic year" />
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control form-control-lg">
                                                <option value="">Select status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="form-control-lg btn btn-primary">Save</button>
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