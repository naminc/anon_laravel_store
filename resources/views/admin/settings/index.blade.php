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
                <div class="box-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- Cột trái --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $setting->title }}" placeholder="Enter website title">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keyword">Keyword</label>
                                    <input type="text" class="form-control" name="keyword"
                                        value="{{ $setting->keyword }}" placeholder="Enter keyword, separated by commas">
                                    @error('keyword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="3"
                                        placeholder="Enter website description">{{ $setting->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="text" class="form-control" name="logo"
                                        value="{{ $setting->logo }}" placeholder="Enter logo path (VD: assets/images/logo.png)">
                                    @if (!empty($setting->logo))
                                        <img src="{{ $setting->logo }}" alt="Logo Preview" style="max-width: 90px; margin-top: 10px;">
                                    @endif
                                    @error('logo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control" name="icon"
                                        value="{{ $setting->icon }}" placeholder="Enter icon path (VD: assets/images/favicon.ico)">
                                    @if (!empty($setting->icon))
                                        <img src="{{ $setting->icon }}" alt="Icon Preview" style="max-width: 80px; margin-top: 10px;">
                                    @endif
                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                    
                            {{-- Cột phải --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" name="author"
                                        value="{{ $setting->author }}" placeholder="Enter author">
                                    @error('author')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="domain">Domain</label>
                                    <input type="text" class="form-control" name="domain"
                                        value="{{ $setting->domain }}" placeholder="Enter domain (Ex: naminc.io)">
                                    @error('domain')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ $setting->phone ?? '' }}" placeholder="Enter phone number">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $setting->email ?? '' }}" placeholder="Enter contact email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" rows="3"
                                        placeholder="Enter contact address">{{ $setting->address ?? '' }}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="maintenance_mode">Maintenance Mode (Only applies to users, admin accounts are not affected.)</label>
                                    <select class="form-control" name="maintenance_mode">
                                        <option value="off" {{ $setting->maintenance_mode == 'off' ? 'selected' : '' }}>OFF</option>
                                        <option value="on" {{ $setting->maintenance_mode == 'on' ? 'selected' : '' }}>ON</option>
                                    </select>
                                    @error('maintenance_mode')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn bg-purple"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>
    </div>
@endsection