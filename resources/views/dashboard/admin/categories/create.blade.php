@extends('layouts.master')
@section('title', 'Categories')
@section('header-title', 'Categories')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Category Information</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" method="POST"
                                    action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @include('dashboard.admin.categories._form')
                                </form>

                            </div>
                        </div>
                    @endsection
