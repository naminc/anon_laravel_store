@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                System Management
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">System</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">System Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    {{-- <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              
                    </div> --}}


                    <form action="/admin/system-info" method="POST">
                        <div class="form-group">
                            <label for="site_title">Title</label>
                            <input type="text" class="form-control" name="site_title"
                                value="{{ $setting->title }}" placeholder="Enter website title">
                        </div>

                        <div class="form-group">
                            <label for="site_keyword">Keyword</label>
                            <input type="text" class="form-control" name="site_keyword"
                                value="{{ $setting->keyword }}" placeholder="Enter keyword, separated by commas">
                        </div>

                        <div class="form-group">
                            <label for="site_description">Description</label>
                            <textarea class="form-control" name="site_description" rows="3"
                                placeholder="Enter website description">{{ $setting->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="site_logo">Logo</label>
                            <input type="text" class="form-control" name="site_logo"
                                value="{{ $setting->logo }}" placeholder="Enter logo link (VD: assets/images/logo.png)">
                            @if (!empty($setting->logo))
                            <img src="{{ $setting->logo }}" alt="Logo Preview" style="max-width: 100px; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="shortcut_icon">Icon</label>
                            <input type="text" class="form-control" name="shortcut_icon"
                                value="{{ $setting->icon }}"
                                placeholder="Enter icon link (VD: assets/images/favicon.ico)">
                            @if (!empty($setting->icon))
                            <img src="{{ $setting->icon }}" alt="Icon Preview" style="max-width: 100px; margin-top: 10px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="site_domain">Domain</label>
                            <input type="url" class="form-control" name="site_domain"
                                value="{{ $setting->domain }}" placeholder="Enter domain (Ex: naminc.io)">
                        </div>

                        <div class="form-group">
                            <label for="site_author">Author</label>
                            <input type="text" class="form-control" name="author"
                                value="{{ $setting->author }}" placeholder="Enter author">
                        </div>

                        <div class="form-group">
                            <label for="maintenance_mode">Maintenance Mode</label>
                            <select class="form-control" name="maintenance_mode">
                                <option value="off" {{ $setting->maintenance_mode == 'off' ? 'selected' : '' }}>OFF</option>
                                <option value="on" {{ $setting->maintenance_mode == 'on' ? 'selected' : '' }}>ON</option>
                            </select>
                        </div>

                        <button type="submit" name="save_settings" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
    </div>
@endsection