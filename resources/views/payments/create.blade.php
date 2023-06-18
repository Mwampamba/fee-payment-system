<div class="col-12 table-responsive">
@include('includes.student.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('includes.student.navbar') 
    @include('includes.student.sidebar') 
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
                                <h3>Make Payment 
                                    <a href="{{ route('studentPayments')}}" class="btn btn-danger float-right">BACK</a> 
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('savePayment') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Enter Amount <span class="text-danger">*</span></label>
                                            <input type="number" name="amount" min="1" step=".01" class="form-control form-control-lg" placeholder="Enter Amount" required />
                                            @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="form-control-lg btn btn-primary">Confirm Payment</button>
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