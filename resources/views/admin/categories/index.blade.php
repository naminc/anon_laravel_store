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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                        <i class="fa fa-plus"></i> Add Category
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table id="categoryTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal thêm danh mục -->
<div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/category-product-list" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Tên danh mục</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nhập tên danh mục" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="category_description">Mô tả</label>
                        <textarea class="form-control" id="category_description" name="category_description" rows="3" placeholder="Nhập mô tả danh mục"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="add_category" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm danh mục</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal chỉnh sửa danh mục -->
<div class="modal fade" id="editCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/category-product-list" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_category_id" name="category_id">
                    <div class="form-group">
                        <label for="edit_category_name">Tên danh mục</label>
                        <input type="text" class="form-control" id="edit_category_name" name="category_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_category_description">Mô tả</label>
                        <textarea class="form-control" id="edit_category_description" name="category_description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="update_category" class="btn btn-primary"><i class="fa fa-save"></i> Lưu thay đổi</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
