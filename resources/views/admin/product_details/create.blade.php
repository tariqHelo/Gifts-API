@extends('layouts.admin')

@section('title', '')


@section('breadcrumb')
{{-- <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Country</li>
</ol> --}}
@endsection
            
    
@section('content')

<div class="col-md-12">
              @include('shared.msg')
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة ملف الإكسل </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('product_details.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.product_details._form',[
                  'button' => "إضافة"
                ])
              </form>
            </div>
            <!-- /.card -->
         </div>
@endsection