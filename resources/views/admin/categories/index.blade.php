@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Categories Management</h1>
            <ol class="breadcrumb">
                <li><a href="/admin">Admin</a></li>
                <li class="active">Categories</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Categories List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#addCategoryModal">
                            <i class="fa fa-plus"></i> Add Category
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="categoryTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $i => $category)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td><span
                                            class="badge bg-black">{{ $category->created_at->format('d-m-Y H:i:s') }}</span>
                                    </td>
                                    <td><span
                                            class="badge bg-black">{{ $category->updated_at->format('d-m-Y H:i:s') }}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#editCategoryModal" 
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}"
                                            data-description="{{ $category->description }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                            style="display:inline-block">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirmDelete(event, this)"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($categories->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No data found</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="name"
                                placeholder="Enter category name" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_description">Description</label>
                            <textarea class="form-control" id="category_description" name="description" rows="3"
                                placeholder="Enter category description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-purple"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.categories.update') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Category</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_id" id="edit_category_id">
                        <div class="form-group">
                            <label for="edit_category_name">Category Name</label>
                            <input type="text" class="form-control" id="edit_category_name" name="name"
                                placeholder="Enter category name" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_category_description">Description</label>
                            <textarea class="form-control" id="edit_category_description" name="description" rows="3"
                                placeholder="Enter category description"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-purple"><i class="fa fa-save"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('components.confirm-delete')
    <script>
        $(document).ready(function () {
            $('#editCategoryModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const name = button.data('name');
                const description = button.data('description');
                $('#edit_category_id').val(id);
                $('#edit_category_name').val(name);
                $('#edit_category_description').val(description);
            });
        });
    </script>
    @if ($errors->any() && session('form_error') === 'add')
    <script>
        $(document).ready(function() {
            $('#addCategoryModal').modal('show');
        });
    </script>
    @endif
    @if ($errors->any() && session('form_error') === 'update')
    <script>
        $(document).ready(function() {
            $('#editCategoryModal').modal('show');
        });
    </script>
    @endif
@endpush