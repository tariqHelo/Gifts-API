@extends('layouts.admin')
@section('title', '')

@section('content')
@include('shared.msg')

      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة ماركة جديدة</h3>
            </div>

    <div class="card-body">
        <form method="POST" action="{{ route('brands.store') }}">
            @csrf
             @include('admin.brands._form',[
                  'button' => "إضافة"
                ])
            </div>
        </form>
    </div>



@endsection