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
                        @foreach($fees as $fee)
                            <h3>Student payments details 
                                <a href="{{ route('generateExaminationNumber', [$fee->studentRegNumber])}}" class="btn btn-danger float-right">Generate examination number</a> 
                            </h3>
                            @endforeach
                        </div>
                            <?php       
                                (int)$totalPaidFee = 0;
                                (int)$pendingAmount = 0;
                                
                                foreach ($feesPaid as $fee) {
                                    $totalPaidFee += (int)($fee->amount);
                                }   
                            ?>

                        <div class="card-body">
                            <div class="card">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Registration number</th>
                                            <th>Programme</th>
                                            <th>Fee per semester</th>
                                            <th>Total paid</th>
                                            <th>Pending amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fees as $fee)
                                        <tr>
                                            <td>{{ $fee->studentName }}</td>
                                            <td>{{ $fee->studentRegNumber }}</td>
                                            <td>{{ $fee->programmeName }}</td>
                                            <td>{{ number_format((($fee->programmeFee) / 2), 2, '.', ',') }} TZS</td>
                                            <td><?php echo number_format(($totalPaidFee * 2388), 2, '.', ',') . ' TZS'; ?></td>
                                            <td>{{ $fee->programmeFee }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <th>Amount paid</th>
                                            <th>Reference number</th>
                                            <th>Mode of Payment</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($feesPaid as $index=>$fee)
                                        <tr>
                                            <td>{{ $index+1}}</td>
                                            <td>{{ number_format((($fee->amount) * 2388), 2, '.', ',') }} TZS</td>
                                            <td>{{ $fee->transaction }}</td>
                                            <td>{{ $fee->payment_mode }}</td>
                                            <td>{{ $fee->created_at->format('d-m-Y') }}</td>
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