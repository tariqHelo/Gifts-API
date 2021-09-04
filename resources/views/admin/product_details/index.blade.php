@extends('layouts.admin')

@section('title', 'جميع قطع المنتجات')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">car</li>
</ol>
@endsection

@section('content')
        @include('shared.msg')

          <div class="card">
            <form action="{{route('product_details.store')}}" method="POST" enctype="multipart/form-data" class="card card-danger">
              @csrf
                <div class="card-header">
                  <h3 class="card-title-rtl">تحميل ملف الإكسل</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                     <div class="col-sm-10">
                      <input type="file" name="file" class="form-control" id="inputEmail3" placeholder="Email" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
               <div class="card-body">
                  {{-- <button type="submit" class="btn btn-primary">إضافة <i class="fas fa-upload"></i> </button> --}}
                <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>إضافة إكسل</span>
                      </button>
                      <a></a>
                      <a href="{{route('products.index')}}" class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>تحميل صور</span>
                      </a>
                      <button type="reset" class="btn btn-warning col fileinput-button">
                        <i class="fas fa-times-copy"></i>
                        <span>عدة منتجات</span>
                      </button>
                    </div>
                  </div>
                </div>
            </form>
            <div class="card-body">
              <table id="example1" class="table-responsive table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>إسم القطعة </th>
                    <th>رقم قطعة</th>
                    <th>نوع القطعة</th>
                    <th>باركود القطعة</th>
                    <th>كمية القطعة</th>
                    <th>سعر التكلفة</th>
                    <th>سعر الشراء</th>
                    <th>سعر الشراء</th>
                    <th>نوع التخصيص</th>
                    <th>نوع الماركة</th>
                    <th>الإجراءات </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <th>{{$product->name}}</th>
                        <td>{{$product->number}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->purchasing_price}}</td>
                        <td>{{$product->purchasing_price2}}</td>
                        <td>{{$product->personalization}}</td>
                        <td>{{$product->brand}}</td>
                        	<td>   
                              <a href="{{route('products.edit' , $product->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <th>#</th>
                  <th>إسم القطعة </th>
                  <th>رقم قطعة</th>
                  <th>نوع القطعة</th>
                  <th> باركود القطعة</th>
                  <th>كمية القطعة</th>
                  <th> سعر التكلفة</th>
                  <th>سعر الشراء</th>
                  <th> سعر الشراء</th>
                  <th>  نوع التخصيص</th>
                  <th> نوع الماركة</th>
                  <th>الإجراءات </th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection