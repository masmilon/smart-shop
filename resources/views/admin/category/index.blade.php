@extends('admin.layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Category List</h1>
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
                            <strong>Categories</strong>
                        </div>
                        <div class="card-body">
                            <a href="{{ url("/admin/categories/create") }}" class="btn btn-success">Create new</a>

                            <table class="table table-bordered">
                                <tr>
                                    <td>SL</td>
                                    <td>Name</td>
                                    <td>Parent</td>
                                    <td>Action</td>
                                </tr>

                                @forelse ($categories as $item)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $item->name }}</td>
                                    {{-- <td>{{ $item->parent_category->name ?? "" }}</td> --}}
                                    <td>{{ $item->parent_category_id ? $item->parent_category->name : "" }}</td>
                                    <td>
                                        <a href="{{ url("/admin/categories/$item->id/edit") }}" class="btn
                                            btn-success">Edit</a>

                                        <form action="{{ url("admin/categories/$item->id") }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No data found</td>
                                </tr>
                                @endforelse
                            </table>
                        </div>
                    </div><!-- /# card -->
                </div><!--  /.col-lg-6 -->

            </div> <!-- .badges -->

        </div><!-- .row -->
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
