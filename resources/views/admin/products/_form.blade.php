
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">الإسم</label>
      <input type="string" name="name" class="form-control"  placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label>التصنيف</label>
        <select class="form-control select2" name="category_id" style="width: 100%;">
          <option value="">No Parent</option>
            @foreach ($categories as $id => $category)
              <option value="{{ $id }}" @if($id== old('category_id', $product->category_id)) selected @endif>{{ $category }}</option>
            @endforeach  
        </select>
    </div>
    <div class="form-group">
      <label for="status">الحالة</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status') == 'active') checked @endif>
              <label class="form-check-label" for="status-active">
                  Active
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status') == 'draft') checked @endif>
              <label class="form-check-label" for="status-draft">
                  Draft
              </label>
          </div>
    </div>
     <div class="form-group">
      <label>ملاحظات</label>
      <textarea class="form-control" name="desc" rows="2" placeholder="Enter ..."></textarea>
    </div>
     <div class="form-group">
        <table class="table table-striped table-bordered table-hover table-responsive">
        <!-- BEGIN FORM-->
          <div class="form-horizontal form-row-seperated">
            <div class="form-body">
              <div style="border: 1px #cccccc solid;padding: 5px;border-radius: 4px">
                <div class="mt-repeater-item">
                    <div class="row">
                      <div class="col-md-1">
                          <label class="control-label"> الإسم</label>
                          <input  name="data[0][name]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> الرقم </label>
                          <input  name="data[0][number]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> النوع</label>
                          <input  name="data[0][type]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> باركود</label>
                          <input  name="data[0][barcode]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">الكمية</label>
                          <input  name="data[0][qty]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">التكلفة <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[0][price]"  class="form-control input-lg selectsize prevname">
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
                          <input  name="data[0][purchasing_price]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">الشراء2</label>
                          <input  name="data[0][purchasing_price2]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">صورة</label>
                          <input  name="data[0][image]"  class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">التخصيص <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[0][personalization]" class="form-control input-lg selectsize prevname">
                          <option value="">نص حر</option>
                          <option value="name" > الإسم</option>
                          <option value="numberId"> رقم الهوية</option>

                        </select>
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">الماركة <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[0][brand]" class="form-control input-lg selectsize prevname">
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
                </div>
              </div>

              </tbody>
            </table>
            <button type="button" class="btn btn-primary add-new-row" data-index="0"><i class="fa fa-plus"></i> </button>
          </div>
    </div>
         
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
<!-- /.card -->
  
 
 

{{-- <div class="card-body">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">الإسم</label>
      <div class="col-sm-10">
          <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="الإسم" value="{{ old('name' , $product->name) }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">التصنيف</label>
      <div class="col-sm-10">
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">No Parent</option>
            @foreach ($categories as $id => $category)
              <option value="{{ $id }}" @if($id== old('category_id', $product->category_id)) selected @endif>{{ $category }}</option>
            @endforeach  
      </div>
    </div>
    <div class="form-group">
      <label for="status">الحالة</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status') == 'active') checked @endif>
              <label class="form-check-label" for="status-active">
                  Active
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status') == 'draft') checked @endif>
              <label class="form-check-label" for="status-draft">
                  Draft
              </label>
          </div>
        @error('status')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
      <label>ملاحظات</label>
      <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
        <table class="table table-striped table-bordered table-hover table-responsive">
        <!-- BEGIN FORM-->
          <div class="form-horizontal form-row-seperated">
            <div class="form-body">
              <div style="border: 1px #cccccc solid;padding: 5px;border-radius: 4px">
                <div class="mt-repeater-item">
                    <div class="row">
                      <div class="col-md-1">
                          <label class="control-label"> الإسم</label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> الرقم </label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> النوع</label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label"> باركود</label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">الكمية</label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">التكلفة <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[0][settitle]" class="form-control input-lg selectsize prevname">
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
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">الشراء2</label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                          <label class="control-label">صورة</label>
                          <input  name="data[0][font_color]" class="form-control" type="string">
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">التخصيص <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[0][settitle]" class="form-control input-lg selectsize prevname">
                          <option value="">نص حر</option>
                          <option value="name"> الإسم</option>
                          <option value="numberId"> رقم الهوية</option>

                        </select>
                      </div>
                      <div class="col-md-1">
                        <label class="control-label">الماركة <span class="oldprename" style="color: #ccc"></span></label>
                        <select name="data[0][settitle]" class="form-control input-lg selectsize prevname">
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
                    
                </div>
              </div>

              </tbody>
            </table>
            <button type="button" class="btn btn-primary add-new-row" data-index="0"><i class="fa fa-plus"></i> </button>
          </div>
    </div>
	</div> --}}
      
{{--
<div class="card-footer">
  <button type="submit" class="btn btn-primary">{{$button}}</button>
  <a href="{{route('products.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
</div> --}}

 {{-- <tr role="row">   
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="text" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="number" class="form-control form-filter input-sm" name="order_id">
                      </td>
                      <td>
                        <input type="text" class="form-control form-filter input-sm" name="order_id">
                      </td>
</tr> --}}        