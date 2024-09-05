@extends('admin.layouts.master')
@section('title', 'Edit Blog')
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div id="blog-form">
        <form method="post" action="{{ url('admin/update-blog') }}/{{$singledata->id}}" id="blog-form-content" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Display success message -->
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
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

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Title</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="title" class="form-control" value="{{ old('title', $singledata->title) }}" placeholder="Title" />
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Slug</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $singledata->slug) }}" placeholder="Enter Slug" />
                    @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Image</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="file" name="image" class="form-control" />
                    @if ($singledata->image)
                        <img src="{{ url($singledata->image) }}" alt="" style="height: 100px; width: 100px;">
                    @endif
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Author</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="author" class="form-control" value="{{ old('author', $singledata->author) }}" placeholder="Author" />
                    @error('author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Category</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="category" class="form-control" value="{{ old('category', $singledata->category) }}" placeholder="Category" />
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Published Date</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="date" name="published_date" class="form-control" value="{{ old('published_date', $singledata->published_date) }}" />
                    @error('published_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Content</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <textarea id="content" name="content" class="form-control" placeholder="Content">{{ old('content', $singledata->content) }}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Meta Title -->
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Meta Title</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $singledata->meta_title) }}" placeholder="Meta Title" />
                    @error('meta_title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Meta Description -->
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Meta Description</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <textarea name="meta_description" class="form-control" placeholder="Meta Description">{{ old('meta_description', $singledata->meta_description) }}</textarea>
                    @error('meta_description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Meta Keywords -->
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Meta Keywords</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $singledata->meta_keywords) }}" placeholder="Meta Keywords" />
                    @error('meta_keywords')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
</script>

@endsection
