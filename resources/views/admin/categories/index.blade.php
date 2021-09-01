@extends('layouts.admin')

@section('title', 'جميع التصنيفات')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">car</li>
</ol>
@endsection

@section('content')
        @include('shared.msg')
   
   
   
   <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <a type="button" class="btn btn-primary" href="{{ route('categories.create') }}">إضافة <i class="fa fa-plus"></i> </a>
            </div>
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>إسم التصنيف</th>
                      <th>الترتيب</th>
                      <th>إسم الإب</th>
                      <th>الحالة</th>
                      <th>الإكشن</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categoreis as $category )
                    <tr>   
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->sequence }}</td>
                          <td>{{ $category->parent_name }}</td>
                        <td>
                          @if($category->status=='active')
                              <span class="btn btn-success btn-sm">مفعل</span>
                          @elseif($category->status=='draft')
                              <span class="btn btn-danger btn-sm">غير مفعل</span>
                          @endif
                        </td>
                        <td>   
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                            <a href="{{ route('category.delete', $category->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

@endsection