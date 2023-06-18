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
                                        <h3>Update student
                                            <a href="{{ route('students')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('updateStudent', [$student->id])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Student name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control form-control-lg" value="{{ $student->name }}" placeholder="Student name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Email address<span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control form-control-lg" value="{{ $student->email }}" readonly />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Registration number<span class="text-danger">*</span></label>
                                                    <input type="text" name="reg_no" class="form-control form-control-lg" value="{{ $student->reg_number }}" readonly />
                                                    @error('reg_no')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Programme of study<span class="text-danger">*</span></label>
                                                    <select name="programme" class="form-control form-control-lg selector">
                                                        <option value="">Please, select programme of study</option>
                                                        @foreach ($programmes as $programme)
                                                            <option value="{{ $programme->id }}" {{ $programme->id == $student->programme_id ? 'selected' : ''}}>{{ $programme->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('programme')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Class name<span class="text-danger">*</span></label>
                                                    <select name="class" class="form-control selector">
                                                        <option value="">Please, select class</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}" {{ $class->id == $student->class_id ? 'selected' : '' }}>{{ $class->name }} :: {{$class->programme->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('class')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>  
                                                <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
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
