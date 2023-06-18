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
                                        <h3>Update class 
                                            <a href="{{ route('classes')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('updateClass', [$class->id])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>Class name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control form-control-lg" value="{{ $class->name }}" placeholder="Class name (i.e First year)" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Programme name<span class="text-danger">*</span></label>
                                                    <select name="programme" class="form-control selector">
                                                        <option value="">Select programme name</option>
                                                        @foreach($programmes as $programme)
                                                            <option value="{{ $programme->id }}" {{ $programme->id == $class->programme_id ? 'selected' : '' }}>{{ $programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('programme')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Academic year name<span class="text-danger">*</span></label>
                                                    <select name="year" class="form-control selector">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" {{ $year->id == $class->academic_year_id ? 'selected' : '' }}>{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('year')
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
        </section>
    </div> 
@include('includes.footer')