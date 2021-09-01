


<div class="form-group">
    <label class="required" for="title">إسم التخصيص</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('title', $personalization->name) }}" required>
</div>
<div class="form-group">
    <label for="status">الحالة</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status', $personalization->status) == 'active') checked @endif>
            <label class="form-check-label" for="status-active">
                Active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status', $personalization->status) == 'draft') checked @endif>
            <label class="form-check-label" for="status-draft">
                Draft
            </label>
        </div>
    </div>
    @error('status')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <button class="btn btn-info" type="submit">
        {{$button}}
    </button>
<a href="{{route('personalizations.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
</div>
   
