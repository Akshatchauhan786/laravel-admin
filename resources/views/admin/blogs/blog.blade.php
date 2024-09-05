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
            <button class="btn btn-primary" onclick="showCreateForm()">Create Blog</button>
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
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td><img src="http://localhost/afnobackend/{{ $blog->image }}" alt="" style="height: 100px; width: 100px;"></td>
                                            <td>{{ $blog->author }}</td>
                                            <td>{{ $blog->category }}</td>
                                            <td>
                                                <a href="" class="btn btn-success">Edit</a>
                                                <button class="btn btn-danger" onclick="confirmDelete({{ $blog->id }})">Delete</button>
                                                <form method="post" action="{{ route('delete.blog', $blog->id) }}" id="delete-form-{{ $blog->id }}" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination Links -->
                                {{ $blogs->links() }}
                            </div>
                            <!-- Create/Update Form -->
                            <div id="blog-form" style="display:none;">
                                <form method="post" action="{{ route('store.blog') }}" id="blog-form-content" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title" class="form-control" placeholder="Title" />
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
                                            <input type="text" name="category" class="form-control" placeholder="Category" />
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
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this blog?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteFormId = null;

    function confirmDelete(blogId) {
        deleteFormId = `delete-form-${blogId}`;
        $('#deleteModal').modal('show');
    }

    document.getElementById('confirm-delete-btn').addEventListener('click', function () {
        if (deleteFormId) {
            document.getElementById(deleteFormId).submit();
        }
    });

    function showCreateForm() {
        document.getElementById('blog-list').style.display = 'none';
        document.getElementById('blog-form').style.display = 'block';
        document.getElementById('blog-form-content').setAttribute('action', '{{ route('store.blog') }}');
    }

    function showUpdateForm(blogId) {
    document.getElementById('blog-list').style.display = 'none';
    document.getElementById('blog-form').style.display = 'block';
    document.getElementById('blog-form-content').setAttribute('action', `/admin/blog/${blogId}`);
}


    // Display success alert if session contains success message
    @if (session('success'))
        $(document).ready(function() {
            $('#success-alert').fadeIn();
            setTimeout(function() {
                $('#success-alert').fadeOut();
            }, 3000);
        });
    @endif

    CKEDITOR.replace('content');
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endsection
