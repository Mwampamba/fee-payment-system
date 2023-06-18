@include('includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('includes.student.navbar')
    @include('includes.student.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div> 
                </div> 
            </div> 
        </div> 
        <section class="content">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-6 col-6"> 
                        <div class="small-box bg-info">
                            <div class="inner">
                            <p>Fee payment records</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-copy"></i>
                            </div>
                            <a href="{{ route('studentPayments') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> 
                    <div class="col-lg-6 col-6"> 
                        <div class="small-box bg-danger">
                            <div class="inner"> 
                                <p>Update password</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-server"></i>
                            </div>
                            <a href="{{ route('getPasswordUpdateForm') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> 
                </div> 
            </div> 
        </section> 
    </div> 
    @include('includes.footer')