<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gifts </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  {{-- @yield('csc') --}}
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css')}}">

  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
    @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">@yield('title', 'Dashboard' )</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          @yield('breadcrumb')
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
        <!-- /.content-header -->

    <!-- Main content -->
    @if(View::hasSection('content'))
            @yield('content')
        @else
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
         <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
       </div>  
    @endif    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><a href="#"></a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Frame Dash</b> V1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/js/demo.js')}}"></script>

    @yield('script')

    @stack('js')

    <script>
      $(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$("body").on("click" , ".add-new-row" , function(){
				console.log(index);
				var index = parseInt($(this).attr("data-index")) + 1;
				$(this).attr("data-index" , index);
				$(".mt-repeater-item").append(`
		       <div class="row">
                      <div class="col-md-1">
                          <label class="control-label"> الإسم</label>
                          <input  name="data[${index}][name]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> الرقم </label>
                          <input  name="data[${index}][number]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> النوع</label>
                          <input  name="data[${index}][type]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> باركود</label>
                          <input  name="data[${index}][barcode]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">الكمية</label>
                          <input  name="data[${index}][qty]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">التكلفة <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[${index}][price]"  class="form-control input-lg selectsize prevname">
                          <option value="">نص حر</option>
                          <option value="name"> الإسم</option>
                          <option value="numberId"> رقم الهوية</option>
                          <option value="email">  الإيميل</option>
                          <option value="mobile"> رقم الجوال</option>
                          <option value="class"> الصف </option>
                          <option value="school">  المدرسة</option>

                        </select>
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> الشراء</label>
                          <input  name="data[${index}][purchasing_price]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">الشراء2</label>
                          <input  name="data[${index}][purchasing_price2]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">صورة</label>
                          <input  name="data[${index}][image]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">التخصيص <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[${index}][personalization]" class="form-control input-lg selectsize prevname">
                          <option value="">نص حر</option>
                          <option value="name" > الإسم</option>
                          <option value="numberId"> رقم الهوية</option>

                        </select>
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">الماركة <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[${index}][brand]" class="form-control input-lg selectsize prevname">
                          <option value="">أجنبي</option>
                          <option value="name"> دولي</option>
                          <option value="numberId"> رقم</option>

                        </select>
                      </div>
                      <div class="col-md-1" style="margin: 30px 0">
                          <a href="javascript:;" data-repeater-delete class="delete-row btn btn-danger btn-sm btn-icon btn-circle mt-repeater-delete">
                            <i class="fa fa-trash"></i>
                          </a>
                      </div>
                  </div>
				`);
			});
			$("body").on("click" , ".delete-row" , function(){
				$(this).parents(".row").remove();
			});
		});
    </script>
<script>
  	
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
     
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
