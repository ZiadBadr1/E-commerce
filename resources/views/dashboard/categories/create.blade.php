@extends('layouts.master')
@section('title','Categories')
@section('header-title','Categories')


@section('content')

<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">@csrf

    @include('dashboard.categories._form')

</form>


@endsection
