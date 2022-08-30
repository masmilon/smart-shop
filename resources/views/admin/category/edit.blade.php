@extends('admin.layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Create</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">UI Elements</a></li>
                            <li class="active">Badges</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">

        <div class="badges">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Category</strong>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Horizontal</strong> Form
                                </div>
                                <div class="card-body card-block">
                                    <form action="{{ url("admin/categories/$category->id") }}" method="post"
                                        class="form-horizontal">
                                        @csrf
                                        @method('PUT')
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Name</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="hf-email" name="name"
                                                    placeholder="Enter name..." class="form-control"
                                                    value="{{ $category->name }}">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf-password" class=" form-control-label">
                                                    Parent category
                                                </label>
                                            </div>
                                            <select name="parent_category_id" id="" class="form-control">
                                                <option value="">-- Please select --</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" {{ $category->parent_category_id ==
                                                    $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row form-group">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div><!-- /# card -->
                </div><!--  /.col-lg-6 -->

            </div> <!-- .badges -->

        </div><!-- .row -->
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
