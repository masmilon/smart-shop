@extends('admin.layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Products</h1>
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
                            <strong>Products</strong>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Horizontal</strong> Form
                                </div>
                                <div class="card-body card-block">
                                    <form action="{{ url('admin/products') }}" method="post"
                                        enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Name</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="hf-email" name="name"
                                                    placeholder="Enter name..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hf-password" class=" form-control-label">
                                                    Category
                                                </label>
                                            </div>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">-- Please select --</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Description</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="hf-email"
                                                    name="description" placeholder="Enter description..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Stock</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="hf-email" name="stock"
                                                    placeholder="Enter stock..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Price</label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="hf-email" name="price"
                                                    placeholder="Enter price..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">discounted Price</label></div>
                                            <div class="col-12 col-md-9"><input type="number" id="hf-email"
                                                    name="discounted_price" placeholder="Enter discounted Price..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Featured image</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="hf-email"
                                                    name="featured_image" placeholder="Upload image..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Product extra image</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="hf-email"
                                                    name="others_images[]" placeholder="Upload image..."
                                                    class="form-control" multiple>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="hf-email"
                                                    class=" form-control-label">Size</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf-email" name="product_size[]"
                                                    placeholder="Product size 1" class="form-control" />
                                                <input type="text" id="hf-email" name="product_size[]"
                                                    placeholder="Product size 2" class="form-control" />
                                                <input type="text" id="hf-email" name="product_size[]"
                                                    placeholder="Product size 3" class="form-control" />
                                            </div>
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
