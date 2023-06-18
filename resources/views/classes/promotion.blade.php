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
                                    <h3>Class promotion
                                        <a href="{{ route('dashboard')}}" class="btn btn-danger float-right">BACK</a> 
                                    </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Currect class name<span class="text-danger">*</span></label>
                                                    <select name="from_class_name" class="form-control form-control-lg selector">
                                                        <option value="">Select class name</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }} :: {{ $class->programme->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('from_class_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Currect programme of study<span class="text-danger">*</span></label>
                                                    <select name="from_programme_name" class="form-control form-control-lg selector">
                                                        <option value="">Select programme of study</option>
                                                        @foreach($programmes as $programme)
                                                            <option value="{{ $programme->id }}">{{ $programme->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('from_programme_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Current academic year<span class="text-danger">*</span></label>
                                                    <select name="from_year_name" class="form-control form-control-lg selector">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}">{{ $year->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('from_year_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Promote to class<span class="text-danger">*</span></label>
                                                    <select name="to_class_name" class="form-control form-control-lg selector">
                                                        <option value="">Select class name</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }} :: {{ $class->programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('to_class_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Promote to programme<span class="text-danger">*</span></label>
                                                    <select name="to_programme_name" class="form-control form-control-lg selector">
                                                        <option value="">Select programme of study</option>
                                                        @foreach($programmes as $programme)
                                                            <option value="{{ $programme->id }}">{{ $programme->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('to_programme_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label>Promote to academic year<span class="text-danger">*</span></label>
                                                    <select name="to_year_name" class="form-control form-control-lg selector">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}">{{ $year->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('to_year_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Promote class</button>
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