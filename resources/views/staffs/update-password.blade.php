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
                                <h3>Update password
                                    <a href="{{ route('dashboard')}}" class="btn btn-danger float-right">BACK</a> 
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('changeStaffPassword')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="">Email address</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control form-control-lg" value="
                                                @if(Auth::check())
                                                {{ Auth::user()->email }}
                                                @endif" readonly />
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="">Old password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="old_password" class="form-control form-control-lg" placeholder="Old password"/>
                                            @error('old_password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="">New password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="new_password" class="form-control form-control-lg" placeholder="New password"/>
                                            @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="">Confirm password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm password"/>
                                            @error('confirm_password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="form-control-lg btn btn-primary">Change password</button>
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