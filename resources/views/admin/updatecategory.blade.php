@extends('admin.maindesign')

@section('update_category')

@if(session('categoryupdated_message') )
<div style="background-color: blue; border: 1px solid #34d399; color: white; padding: 12px 16px; margin-bottom: 16px;">
    {{session('categoryupdated_message')}};
</div>
@endif

<div class="container-fluid">
    <form action="{{route('admin.postupdatecategory', $category->id)}}" method="POST">
        @csrf
        <input type="text" name="category" value="{{$category->category}}">
        <input type="submit" name="submit" value="Update Category">
    </form>
</div>
@endsection