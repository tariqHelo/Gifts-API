@extends('layouts.admin')

@section('title', '')


@section('breadcrumb')
{{-- <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">car</li>
</ol> --}}
@endsection

@section('content')
  @include('shared.msg')

          <div class="card">
            <div  class="card card-danger">
              @csrf
                <div class="card-header">
                  <h3 class="card-title-rtl">جميع قطع المنتجات</h3>
                </div>
                {{-- <div class="card-body">
                  <div class="row">
                     <div class="col-sm-10">
                      <input type="file" name="file" class="form-control" id="inputEmail3" placeholder="Email" required>
                    </div>
                  </div>
                </div> --}}
                <!-- /.card-body -->
                <div class="card-body">
                      <div class="btn-group w-100">
                        <a href="{{route('product_details.create')}}" type="button" class="btn btn-primary col start">
                          <i class="fas fa-upload"></i>
                          <span>إضافة إكسل</span>
                        </a>
                        <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-success col fileinput-button">
                          <i class="fas fa-plus"></i>
                          <span>تحميل صور</span>
                        </button>
                        <button data-toggle="modal" data-target="#exampleModal1" class="btn btn-warning col fileinput-button">
                          <i class="fas fa-times-copy"></i>
                          <span>عدة منتجات</span>
                        </button>
                      </div>
                </div>
            </div>

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
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة صور منتجات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('image')}}"  method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                          {{-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                          </div> --}}
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <input type="file" name="filenames[]" required class="form-control" multiple id="recipient-name">
                          </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">إضافة </button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
          </div>
          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة المنتجات </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('products.store')}}"  method="post">
                          @csrf
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <input type="text" onmouseover="this.focus();" name="barcode" id="barcode" class="form-control" placeholder="Type Product Name...">
                          </div>
                           <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th style="width: 40px">barcode</th>
                                  <th style="width: 40px">name</th>
                                </tr>
                              
                              </thead>
                              <tbody id="test">
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="form" class="btn btn-primary">update</button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
          </div>
@section('script')
<script type="text/javascript">
(function() {
      let arr = [];

      // Fetching items
    $('#barcode').on('keyup', function (e) {
        e.preventDefault();
      	let val = $(this).val();
        $.ajax({
             url: '{{route('barcode')}}',
                type: 'POST',
		          	data:{val:val,_token:'{{ csrf_token() }}'},
                dataType:"JSON",
                success:function(data){
                  if(data !== []){
                    arr.push(data)
                  }
                  var rows='';
                 console.log(data) 
                 data.barcods.forEach(barcod => {
                    rows += 
                       '<tr>'+
                          '<td>'+barcod.barcode+'</td>'+
                          '<td>'+barcod.name+'</td>'+
                       '</tr>'
                       	
                  });
                  $("#test").append(rows);
                
                }
        });
    });
    
    document.getElementById('form').addEventListener('click' , function(e){
       e.preventDefault();
          $.ajax({
              type: "POST",
              url: "{{ route('products.store') }}",
              dataType: "json",
              data:{arr:arr,_token:'{{ csrf_token() }}'},
              success: function(data){
                    alert("Data Save: " + data);
              },
              error: function(data){
                  alert("Error")
              }
          });
    })


})();  

</script>  
@endsection
        
@endsection