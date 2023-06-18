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
                                        <h3>Update staff 
                                            <a href="{{ route('staffs')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h3>
                                    </div> 
                                    <div class="card-body">
                                        <form action="{{ route('updateStaff', [$staff->id])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" value="{{ $staff->name }}" class="form-control form-control-lg" placeholder="Name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Email<span class="text-danger">*</span></label>
                                                    <input type="email" name="email" value="{{ $staff->email }}" class="form-control form-control-lg" readonly />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                            <label for="">Status<span class="text-danger">*</span></label>
                                            <select name="role" class="form-control form-control-lg">
                                                <option value="">Select status</option>
                                                <option value="1" {{ $staff->role == '1' ? 'selected': '' }}>Admin</option>
                                                <option value="0" {{ $staff->role == '0' ? 'selected': '' }}>Bursar</option>
                                            </select>
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