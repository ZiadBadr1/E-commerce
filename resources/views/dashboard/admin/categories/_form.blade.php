<div class="mb-4 row align-items-center">
    <label class="form-label-title col-sm-3 mb-0">Category
        Name</label>
    <div class="col-sm-9">
        <input class="form-control" name="name" type="text" placeholder="Category Name"
            value="{{ old('name', $category->name) }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-4 row align-items-center">
    <label class="col-sm-3 col-form-label form-label-title">Parent ID</label>
    <div class="col-sm-9">
        <select name="parent_id" class="form-control form-select">

            <option value="">Primary Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}"
                    {{ old('parent_id', $category->parent_id) === $parent->id ? 'selected' : '' }}>{{ $parent->name }}
                </option>
            @endforeach
        </select>
        @error('parent_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>


<div class="d-flex align-items-center mb-4 row">
    <label class="form-label-title col-sm-3 mb-0">
        Description</label>
    <div class="col-sm-9">
        <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-4 row align-items-center">
    <label class="col-sm-3 col-form-label form-label-title">Status</label>
    <div class="col-sm-9">
        <select class="js-example-basic-single w-100" name="is_active">
            <option disabled>Status</option>
            <option value="1" {{ old('is_active', $category->is_active) ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('is_active', !$category->is_active) ? 'selected' : '' }}>Archived</option>
        </select>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-4 row align-items-center">
    <label class="col-sm-3 col-form-label form-label-title">Images</label>
    <div class="col-sm-9">
        <input class="form-control form-choose" name="image" type="file" id="formFile" multiple>
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        @if ($category->image)
            <img src="{{ asset('storage/' . $category->image) }} " height="60px">
        @endif


    </div>
</div>

<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-solid mt-4">{{ $button_lable ?? 'Save' }}</button>
</div>
