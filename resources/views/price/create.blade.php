
@extends('layouts.master')
@section('css')
@endsection
@section('title')
    portFolio

@endsection
@section('page-header')

    <!-- breadcrumb -->
    <div class="page-title" xmlns:livewire="http://www.w3.org/1999/html" xmlns:livewire="http://www.w3.org/1999/html">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> price Model</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <livewire:price.price/>
                    <livewire:scripts/>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        window.addEventListener('close-modal', event => {

                            $('#priceModal').modal('hide');
                            $('#update').modal('hide');
                            $('#deleteslider').modal('hide');
                            $('#show').modal('hide');
                        })
                    </script>
                </div>


            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection









