@extends('component.layout')

@section('css-link')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

     <!-- Bootstrap Color Picker -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
     <!-- BS Stepper -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
     <!-- dropzonejs -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">

@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }} </h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form id="quickForm" method="post" action="{{ route('admin.drivers_store') }}"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            @include('conducteurs.form')
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.drivers') }}">
                                <button type="button" class="btn btn-danger">
                                    Annuler
                                </button>
                            </a>
                            <button type="submit" class="btn btn-info float-right">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.col (left) -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
    </div>
    @endsection




