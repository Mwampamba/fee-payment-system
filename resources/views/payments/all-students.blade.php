<div class="col-12 table-responsive">
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
                                <h3>Payments records
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <table id="myDataTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student name</th>
                                                <th>Amount paid</th>
                                                <th>Reference number</th>
                                                <th>Mode of Payment</th>
                                                <th>Payment Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($feesPaid as $index=>$fee)
                                            <tr>
                                                <td>{{ $index+1}}</td>
                                                <td>{{ $fee->studentName }}</td>
                                                <td>{{ number_format((($fee->amount) * 2388), 2, '.', ',') }} TZS</td>
                                                <td>{{ $fee->transaction }}</td>
                                                <td>{{ $fee->payment_mode }}</td>
                                                <td>{{ $fee->created_at->format('d-m-Y') }}</td>
                                                <td><a href="{{ route('individualStudentPayments', [$fee->studentId]) }}" class="btn btn-secondary">View Details</a></td> 
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
    @include('includes.footer')