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
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display error message -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="blog-form">
        <form method="post" action="{{ route('admin.insertdata') }}" id="blog-form-content" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Title</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                </div>
            </div>
             <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Slug</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Image</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="file" name="image" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Author</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="author" class="form-control" placeholder="Author" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Category</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="category" id="category" class="form-control" placeholder="Category" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Published Date</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="date" name="published_date" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Content</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <textarea id="content" name="content" class="form-control" placeholder="Content"></textarea>
                </div>
            </div>
            <!-- Meta Title -->
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Meta Title</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" />
                </div>
            </div>
            <!-- Meta Description -->
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Meta Description</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <textarea name="meta_description" class="form-control" placeholder="Meta Description"></textarea>
                </div>
            </div>
            <!-- Meta Keywords -->
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Meta Keywords</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="meta_keywords" class="form-control" placeholder="Meta Keywords" />
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<script>
    // Initialize CKEditor
    CKEDITOR.replace('content');

    // Slug generation
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    $('#title').keyup(function () {
        var slug = $(this).val();
        $('#slug').val(slugify(slug));
    });
</script>

@endsection
