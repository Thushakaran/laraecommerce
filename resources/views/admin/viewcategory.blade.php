@extends('admin.maindesign')

@section('page-title', 'View Categories')
@section('breadcrumb')
<li class="breadcrumb-item active">Categories</li>
@endsection
@section('page-actions')
<a href="{{route('admin.addcategory')}}" class="btn-action btn-primary-action">
    <i class="fa fa-plus"></i> Add Category
</a>
@endsection

@section('view_category')
@if(session('delete_message') )
<div style="margin-bottom: 10px; color: black; background-color:orangered;padding: 12px 16px;">
    {{session('delete_message')}};
</div>
@endif
<table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Category ID</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Category Name</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$category->id}}</td>
            <td style="padding: 12px;">{{$category->category}}</td>
            <td style="padding: 12px;"><a href="{{route('admin.updatecategory',$category->id)}}" style="color:green;">Update</a></td>
            <td style="padding: 12px;"><a href="{{route('admin.deletecategory',$category->id)}}" onclick="return confirm('Are You Sure')">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection