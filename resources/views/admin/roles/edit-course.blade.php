@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('admin.includes.navbar') 

    @include('admin.includes.sidebar') 
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
                                        <h3>Update course 
                                            <a href="{{ route('courses')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/auth/courses/'.$course->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>Course title<span class="text-danger">*</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $course->title }}" placeholder="Course name" />
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Course code<span class="text-danger">*</label>
                                                    <input type="text" name="code" class="form-control" value="{{ $course->code }}" placeholder="Course code" />
                                                    @error('code')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Core or elective<span class="text-danger">*</label>
                                                    <select name="status" class="form-control selector">
                                                        <option value="">Select core or elective</option>
                                                            <option value="1" {{ $course->status == '1' ? 'selected': '' }}>Core</option>
                                                            <option value="0" {{ $course->status == '0' ? 'selected': '' }}>Optional</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label>Semester<span class="text-danger">*</span></label>
                                                    <select name="semester" class="form-control selector">
                                                        <option value="">Select semester name</option>
                                                        @foreach ($semesters as $semester)
                                                            <option value="{{ $semester->id}}" {{ $course->semester_id == $semester->id ? 'selected': '' }}>{{ $semester->name}} :: {{ $semester->academic_year->name}}</option>
                                                        @endforeach  
                                                    </select>
                                                    @error('semester')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label>Credit<span class="text-danger">*</label>
                                                    <input type="text" name="credit" class="form-control" value="{{ $course->credit }}" placeholder="Course credit" />
                                                    @error('credit')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div>
        <!-- /.content -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.includes.footer')