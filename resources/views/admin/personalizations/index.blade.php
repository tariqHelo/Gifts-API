@extends('layouts.admin')

@section('title' , 'جميع التخصيصات')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">brands</li>
</ol>
@endsection

@section('content')
 @include('shared.msg')
  <div class="card">

              <div class="card-header">
                 <a type="button" class="btn btn-primary" href="{{ route('personalizations.create') }}">إضافة <i class="fa fa-plus"></i> </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>إسم الماركة</th>
                    <th>الحالة </th>
                    <th>الإجراءات</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($personalizations as $personalization)
                     <tr>
                      <td>{{$personalization->id}}</td>
                      <td>{{$personalization->name}}</td>
                      <td>
                          @if($personalization->status=='active')
                              <span class="btn btn-success btn-sm">مفعل</span>
                          @elseif($personalization->status=='draft')
                              <span class="btn btn-danger btn-sm">غير مفعل</span>
                          @endif
                        </td>
                        <td>   
                            <a href="{{ route('personalizations.edit', $personalization->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                            <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>إسم الماركة</th>
                    <th>الحالة </th>
                    <th>الإجراءات</th>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection