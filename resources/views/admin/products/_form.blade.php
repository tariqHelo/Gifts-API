
    <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                          <div class="form-group">
                              <label for="country_id">الدولة</label>
                               <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="الإسم" value="{{ old('name' , $product->name) }}">
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group">
                              <label for="country_id">الدولة</label>
                               <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="الإسم" value="{{ old('name' , $product->name) }}">
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group">
                              <label for="country_id">الدولة</label>
                               <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="الإسم" value="{{ old('name' , $product->name) }}">
                          </div>
                      </div>
                  </div>
                 <div class="form-group">
                    <label>إسم المنتج </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="الإسم" value="{{ old('name' , $product->name) }}">
                     @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1">
                      <label class="custom-control-label" for="customSwitch1">Toggle this custom switch element</label>
                    </div>
                  </div>
                  {{-- <div class="form-group">
                    <label>الترتيب </label>
                    <input type="string" class="form-control @error('sequence') is-invalid @enderror" name="sequence"  placeholder=" الترتيب" value="{{ old('sequence' , $category->sequence) }}">
                     @error('sequence')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label> إسم الإب  </label>
                      <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                        <option value="">No Parent</option>
                        @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" @if($parent->id == old('parent_id', $category->parent_id)) selected @endif>{{ $parent->name }}</option>
                        @endforeach
                    </select>
                    @error('basket_id')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                     <div class="form-group">
                        <label for=""> الصورة </label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @if($category->file)
                          <img src="{{asset("storage/public/".$category->file)}}" width='240' class='img-thumbnail'>
                       @endif
                        @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">الحالة</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status', $category->status) == 'active') checked @endif>
                                <label class="form-check-label" for="status-active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status', $category->status) == 'draft') checked @endif>
                                <label class="form-check-label" for="status-draft">
                                    Draft
                                </label>
                            </div>
                        </div>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('categories.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>

        