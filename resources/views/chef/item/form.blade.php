<div class="form-group">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" type="text" id="name" value="{{ $item->name or old('name')}}" >
    @if ($errors->has('name'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" name="description" type="description" id="description" value="{{ $item->description or old('description')}}" >
    @if ($errors->has('description'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
    @endif
</div>
@if($formMode === 'create')
<div class="form-group">
    <label for="category" class="control-label">{{ 'category' }}</label>
    <select name="category" id="category" class="custom-select">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
@else
<div class="form-group">
    <label for="category" class="control-label">{{ 'category' }}</label>
    <select name="category" id="category" class="custom-select">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ ($category->id == $item->category->id)? 'selected': '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>
@endif

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
