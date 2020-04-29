@extends('backoffice/layout/layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Progetto Layout</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">dashboard</a></li>
                        <li class="breadcrumb-item active">Progetto Layout</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{$item->name}}</h3>
                        <div class="col-12">
                            <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg"
                                    alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Name project</h3>
                        <hr>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                            aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.
                        </p>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection