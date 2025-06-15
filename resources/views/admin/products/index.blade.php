@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Product Management</h1>
            <ol class="breadcrumb">
                <li><a href="/admin">Admin</a></li>
                <li class="active">Product</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Product List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#addProductModal">
                            <i class="fa fa-plus"></i> Add Product
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="productTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Images</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $i => $product)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><span class="badge bg-red">{{ $product->price }}$</span></td>
                                        <td>
                                            <img src="{{ asset($product->images) }}" alt="{{ $product->name }}"
                                                class="img-thumbnail" style="width: 90px; height: 90px;">
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <span class="badge bg-{{ $product->status == 'active' ? 'green' : 'red' }}">
                                                {{ $product->status }}
                                            </span>
                                        </td>
                                        <td><span
                                                class="badge bg-green">{{ $product->created_at->format('d-m-Y H:i:s') }}</span>
                                        </td>
                                        <td><span
                                                class="badge bg-blue">{{ $product->updated_at->format('d-m-Y H:i:s') }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#editProductModal" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                                data-description="{{ $product->description }}"
                                                data-status="{{ $product->status }}"
                                                data-category_id="{{ $product->category_id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST" style="display:inline-block">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirmDelete(event, this)"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($products->isEmpty())
                                    <tr>
                                        <td colspan="10" class="text-center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="addProductModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter product name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" step="0.01" class="form-control"
                                placeholder="Enter product price" value="{{ old('price') }}" required>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="images" class="form-control" placeholder="Enter product images"
                                accept="image/*" required>
                            @error('images')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="Enter product description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn bg-purple" type="submit"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProductModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.products.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit_product_id" name="product_id">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control" id="edit_category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" id="edit_name" placeholder="Enter product name"
                                class="form-control" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" id="edit_price" type="number" step="0.01"
                                placeholder="Enter product price" class="form-control" required>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image (replace)</label>
                            <input type="file" name="images" class="form-control" placeholder="Enter product images"
                                accept="image/*">
                            @error('images')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="edit_description" rows="3" class="form-control"
                                placeholder="Enter product description"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="edit_status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn bg-purple" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('components.confirm-delete')
    <script>
        $(document).ready(function() {
            $('#editProductModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                $('#edit_product_id').val(button.data('id'));
                $('#edit_name').val(button.data('name'));
                $('#edit_price').val(button.data('price'));
                $('#edit_description').val(button.data('description'));
                $('#edit_status').val(button.data('status'));
                $('#edit_category_id').val(button.data('category_id'));
            });
        });
    </script>
    @if ($errors->any() && session('form_error') === 'add')
        <script>
            $(document).ready(function() {
                $('#addProductModal').modal('show');
            });
        </script>
    @endif
    @if ($errors->any() && session('form_error') === 'update')
        <script>
            $(document).ready(function() {
                $('#editProductModal').modal('show');
            });
        </script>
    @endif
@endpush
