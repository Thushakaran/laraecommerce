@extends('admin.maindesign')

@section('page-title', 'Add Category')
@section('breadcrumb')
<li class="breadcrumb-item active">Add Category</li>
@endsection
@section('page-actions')
<a href="{{route('admin.viewcategory')}}" class="btn-action btn-secondary-action">
    <i class="fa fa-list"></i> View Categories
</a>
@endsection

@section('add_category')

@if(session('category_message') )
<div style="background-color: green; border: 1px solid #34d399; color: black; padding: 12px 16px; margin-bottom: 16px;">
    {{session('category_message')}};
</div>
@endif

<div class="container-fluid">
    <form action="{{route('admin.postaddcategory')}}" method="POST">
        @csrf
        <input type="text" name="category" placeholder="Enter Category">
        <input type="submit" name="submit" value="Add Category">
    </form>
</div>
@endsection