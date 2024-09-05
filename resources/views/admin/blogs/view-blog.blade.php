@extends('admin.layouts.master')
@section('title', 'Blog Management')
@section('admin')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button class="btn btn-primary " ><a href="{{ route('admin.addblog') }}" style="
    color: white;
    text-decoration: none;
">Create Blog</a></button>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Success Alert -->
                            <div class="alert alert-success" id="success-alert" style="display: none;">
                                Blog deleted successfully!
                            </div>
                            <!-- Blog List -->
                            <div id="blog-list">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 36%;">Title</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td><img src="http://localhost/afnobackend/{{ $blog->image }}" alt="" style="height: 100px; width: 100px;"></td>
                                            <td>{{ $blog->author }}</td>
                                            <td>{{ $blog->category }}</td>
                                            <td>
                                                <a href="{{ route('approved', $blog->id) }}" class="btn {{ $blog->status ? 'btn-success' : 'btn-danger' }}">
                                                    {{ $blog->status ? 'Active' : 'Inactive' }}
                                                </a>
                                                <a href="{{ route('admin.editblog', $blog->id) }}" class="btn btn-success">Edit</a>
                                                <a class="btn btn-danger" href="{{ route('admin.delete', $blog->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination Links -->
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endsection
