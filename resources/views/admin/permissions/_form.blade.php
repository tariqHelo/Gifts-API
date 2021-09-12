


<div class="form-group">
    <label class="required" for="title">إسم الصلاحية</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  type="text" name="title" id="title" value="{{ old('title', $permission->title) }}" required>
</div>
<div class="form-group">
    <label>تفاصيل</label>
    <textarea class="form-control" name="note" rows="3" placeholder="أدخل ...">{{$permission->note}}</textarea>
    </div>
</div>
<div class="card-footer">
    <button class="btn btn-info" type="submit">
        {{$button}}
    </button>
<a href="{{route('permissions.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
</div>
   
