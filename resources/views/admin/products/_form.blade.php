
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">الإسم</label>
      <input type="string" name="name" class="form-control"  placeholder="Enter Name" value="{{old('name' , $product->name)}}">
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
              <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status' ,  $product->status) == 'active') checked @endif>
              <label class="form-check-label" for="status-active">
                  Active
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status' , $product->status) == 'draft') checked @endif>
              <label class="form-check-label" for="status-draft">
                  Draft
              </label>
          </div>
    </div>
     <div class="form-group">
      <label>ملاحظات</label>
      <textarea class="form-control" name="desc" rows="2" placeholder="Enter ...">{{$product->description}}</textarea>
    </div>
     <div class="form-group">
        <table class="table table-striped table-bordered table-hover table-responsive">
        <!-- BEGIN FORM-->
          <div class="form-horizontal form-row-seperated">
            <div class="form-body">
              <div style="border: 1px #cccccc solid;padding: 5px;border-radius: 4px">
                <div class="mt-repeater-item">
                  @if(isset($items))
                      @foreach ($items as $i => $obj)
                        <div class="row">
                          <div class="col-md-1">
                              <label class="control-label"> الإسم</label>
                              <input  name="data[{{$i}}][name]" value="{{ $obj['name'] }}"  class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label"> الرقم </label>
                              <input  name="data[{{$i}}][number]" value="{{ $obj['number'] }}"  class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label"> النوع</label>
                              <input  name="data[{{$i}}][type]" value="{{ $obj['type'] }}"   class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label"> باركود</label>
                              <input  name="data[{{$i}}][barcode]" value="{{ $obj['barcode'] }}"  class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label">الكمية</label>
                              <input  name="data[{{$i}}][qty]" value="{{ $obj['qty'] }}"   class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                            <label class="control-label">التكلفة <span class="oldprename" style="color: #ccc"></span></label>
                            <select name="data[{{$i}}][price]" value="{{ $obj['price'] }}"  class="form-control input-lg selectsize prevname">
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
                              <input  name="data[{{$i}}][purchasing_price]" value="{{ $obj['purchasing_price'] }}"  class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label">الشراء2</label>
                              <input  name="data[{{$i}}][purchasing_price2]" value="{{ $obj['purchasing_price2'] }}"  class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label">صورة</label>
                              <input  name="data[{{$i}}][image]"  value="{{ $obj['image'] }}" class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                            <label class="control-label">التخصيص <span class="oldprename" style="color: #ccc"></span></label>
                            <select name="data[{{$i}}][personalization]" value="{{ $obj['personalization'] }}" class="form-control input-lg selectsize prevname">
                              <option value="">نص حر</option>
                              <option value="name" > الإسم</option>
                              <option value="numberId"> رقم الهوية</option>

                            </select>
                          </div>
                          <div class="col-md-1">
                            <label class="control-label">الماركة <span class="oldprename" style="color: #ccc"></span></label>
                            <select name="data[{{$i}}][brand]" value="{{ $obj['brand'] }}" class="form-control input-lg selectsize prevname">
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
                     @endforeach
                  @else
                  <div class="row">
                          <div class="col-md-1">
                              <label class="control-label"> الإسم</label>
                              <input  name="data[0][name]" class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label"> الرقم </label>
                              <input  name="data[0][number]"   class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label"> النوع</label>
                              <input  name="data[0][type]"    class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label"> باركود</label>
                              <input  name="data[0][barcode]"  class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label">الكمية</label>
                              <input  name="data[0][qty]"    class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                            <label class="control-label">التكلفة <span class="oldprename" style="color: #ccc"></span></label>
                            <select name="data[0][price]"   class="form-control input-lg selectsize prevname">
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
                              <input  name="data[0][purchasing_price]"   class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label">الشراء2</label>
                              <input  name="data[0][purchasing_price2]"   class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                              <label class="control-label">صورة</label>
                              <input  name="data[0][image]"   class="form-control" type="string">
                          </div>
                          <div class="col-md-1">
                            <label class="control-label">التخصيص <span class="oldprename" style="color: #ccc"></span></label>
                            <select name="data[0][personalization]"  class="form-control input-lg selectsize prevname">
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
                  @endif
                </div>
              </div>

              </tbody>
            </table>
            @if(isset($items))
            <button type="button" class="btn btn-primary add-new-row" data-index="{{ count($items) - 1 }}"><i class="fa fa-plus"></i></button>
            @else
            <button type="button" class="btn btn-primary add-new-row" data-index="0"><i class="fa fa-plus"></i> </button>
            @endif
          </div>
    </div>
         
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">{{$button}}</button>
        <a href="{{route('products.index')}}" class="btn btn-danger" type="button"> إلغاء</a>

  </div>
<!-- /.card -->
  
 
 
