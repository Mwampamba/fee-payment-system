@include('includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper"> 
    @include('includes.navbar') 
    @include('includes.sidebar') 
    <div class="content-wrapper"> 
        <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h5 class="m-0">Dashboard</h5>
                  </div> 
              </div> 
          </div> 
        </div>   
        <section class="content">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                  <i class="fas fa-copy"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    <a href="{{ route('getAllStudentPayments') }}">Payments</a></span>
                  <span class="info-box-number"> 
                  </span>
                </div> 
              </div> 
            </div>   
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-4">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><a href="{{ route('students') }}">Students</a></span>
                  <span class="info-box-number">
                  </span>
                </div> 
              </div> 
            </div> 
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1">
                  <i class="nav-icon fa fa-server"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><a href="{{ route('staffs') }}">Staffs</a></span>
                  <span class="info-box-number">
                  </span>
                </div> 
              </div> 
            </div> 
          </div>
        </section> 
    </div>
    @include('includes.footer')