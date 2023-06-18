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
                                    <h3>Programmes list
                                        <a href="{{ route('addProgramme') }}" class="btn btn-success float-right">Add new programme</a>
                                    </h3>
                                </div> 
                                    <div class="card-body">
                                        <div class="card">
                                            <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Programme name</th> 
                                                            <th>Programme fee</th>                                   
                                                            <th>Action</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programmes as $index=>$programme)
                                                            <tr>
                                                                <td>{{ $index+1 }}</td>
                                                                <td>{{ $programme->name }}</td>
                                                                <td>{{ number_format($programme->fee, 2, '.', ',') }} TZS</td> 
                                                                <td><a href="{{ route('editProgramme', [$programme->id]) }}" class="btn btn-warning">Update</a></td>
                                                                <td><a href="{{ route('deleteProgramme', [$programme->id]) }}" onclick="return confirm('Are you sure you want to delete this programme')" class="btn btn-danger">Delete</a></td>
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