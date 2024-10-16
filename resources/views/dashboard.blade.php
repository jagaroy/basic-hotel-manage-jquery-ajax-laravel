@extends('adminlte.app')
@section('content')
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}
    <!-- Main content -->
    <section class="content">
        <div class="col-xl-12">
            <div class="row" style="min-height--: 470px;">
                <div class="col-sm-12">
                    <div class="card card-info">
                        <div class="card-header with-border">
                            <h4 class="card-title">Dashboard</h4>
                        </div>
                        <div class="card-body">

                            <img class="img-responsive" src="{{ url('public/upload') }}/hotel-banner.jpg" alt="Banner" style="width: 500px; height: 350px" />
                        </div>
                        <!-- <div class="card-footer">

                        </div> -->
                    </div> 
                </div>

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
