@extends('layouts.master')
@section('title','Categories')
@section('header-title','Categories/ Edit')


@section('content')

<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">@csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$category->name)}}">
        @if($errors->has('name'))
            <div class="error" style="color: red"> {{$errors->first('name')}}  </div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Category Parent</label>
        <select name="parent_id" class="form-control form-select">
            <option value="">Primary Category</option>
            @foreach($parents as $parent)
                <option value="{{$parent->id}}">{{$parent->name}}</option>
            @endforeach
        </select>
        @if($errors->has('parent_id'))
            <div class="error" style="color: red"> {{$errors->first('parent_id')}}   </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea type="text" name="description" class="form-control"> {{old('description',$category->description)}}</textarea>
        @if($errors->has('description'))
            <div class="error" style="color: red"> {{$errors->first('description')}}  </div>
        @endif

    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">
        @if($errors->has('image'))
            <div class="error" style="color: red"> {{$errors->first('image')}}  </div>
        @endif
        @if($category->image)
            <img src="{{asset('storage/'.$category->image)}} " height="60px">
        @endif
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" {{ old('status',$category->status) === 'active' ? 'checked' : '' }}>
                <label class="form-check-label">Active</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="archived"{{ old('status',$category->status) === 'archived' ? 'checked' : '' }}>
                <label class="form-check-label">Archived</label>
            </div>
            @if($errors->has('status'))
                <div class="error" style="color: red"> {{$errors->first('status')}}  </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


@endsection
