@extends('layouts.master')
@section('title','Categories')
@section('header-title','Categories/ Edit')


@section('content')

<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">@csrf
    @method('PUT')
    @include('dashboard.categories._form',[
    'button_lable' => 'Update'
])
</form>


@endsection
