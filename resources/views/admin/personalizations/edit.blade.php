@extends('layouts.admin')
@section('title', '')

@section('content')
@include('shared.msg')

    <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title-rtl">تعديل التخصيص</h3>
            </div>

    <div class="card-body">
        <form method="POST" action="{{ route('personalizations.update' , $personalization->id) }}">
            @csrf
            @method('PATCH')
             @include('admin.personalizations._form',[
                    'button' => 'تعديل'
                ])
            </div>
        </form>
    </div>
@endsection