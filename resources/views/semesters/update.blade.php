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
                                        <h3> Update semester
                                            <a href="{{ route('semesters')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('updateSemester', $semester->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Semester name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" value="{{ $semester->name }}" placeholder="Enter semester name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Select academic year<span class="text-danger">*</span></label>
                                                    <select name="year" class="form-control selector">
                                                        <option value="">Select academic year</option>
                                                        @foreach($years as $year)
                                                            <option value="{{ $year->id }}" {{ $year->id == $semester->academic_year_id ? 'selected' : '' }}>{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="">Description</label>
                                                    <textarea name="description" class="form-control" rows="5">{{ $semester->description }}</textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Status<span class="text-danger">*</span></label>
                                                    <select name="status" class="form-control selector">
                                                        <option value="">Select status</option>
                                                        <option value="1" {{ $semester->status == '1' ? 'selected':'' }}>Active</option>
                                                        <option value="0" {{ $semester->status == '0' ? 'selected':'' }}>Deactivated</option>
                                                    </select>
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
        </section>
    </div> 
    @include('admin.includes.footer')