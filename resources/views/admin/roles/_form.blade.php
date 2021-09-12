

    <div class="form-group">
        <label class="required" for="title">إسم الرول</label>
        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $role->title) }}" required>
    </div>
    <div class="form-group">
        <label class="required" for="permissions">إختيار الصلاحيات</label>
        <select class="select2 form-control  {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
            @foreach($permissions as $id => $permissions)
            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
            @endforeach
        </select>
        @if($errors->has('permissions'))
            <div class="invalid-feedback">
                {{ $errors->first('permissions') }}
            </div>
        @endif
    </div>
    <div class="form-group">
     <label>تفاصيل</label>
     <textarea class="form-control" name="note" rows="3" placeholder="أدخل ...">{{$role->note}}</textarea>
     </div>
   </div>
    <div class="card-footer">
        <button class="btn btn-info" type="submit">
            {{$button}}
        </button>
        <a href="{{route('roles.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
    </div>
</div>
