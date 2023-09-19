@extends('layouts.master')
@section('title','Categories')
@section('header-title','Categories')


@section('content')
    <div class="mb-5">
        <a href="{{route('categories.create')}}" class="btn btn-sm btn-outline-primary">Create</a>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created At</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @forelse($categories as $category)
            <td></td>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->parent_id}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <a href="" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="" method="post">@csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align: center">
                    No Categories defined.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>



@endsection
