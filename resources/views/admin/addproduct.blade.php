@extends('admin.maindesign')

@section('add_product')

@if(session('product_message') )
<div style="background-color: green; border: 1px solid #34d399; color: black; padding: 12px 16px; margin-bottom: 16px;">
    {{session('product_message')}};
</div>
@endif

<div class="container-fluid">
    <form action="{{route('admin.postaddproduct')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_title" placeholder="Enter Product Title!"> <br><br>
        <textarea name="product_description">
            Product Description!...
        </textarea> <br>
        <input type="number" name="product_quantity" placeholder="Enter Product quantity here!"> <br><br>
        <input type="number" name="product_price" placeholder="Enter Product Price here!"> <br><br>
        <input type="file" name="product_image" placeholder="Enter Product Price here!"> <br><br>
        <select name="product_category">
            @foreach($categories as $category)
            <option value="{{$category->category}}">{{$category->category}}</option>
            @endforeach
        </select> <br><br>
        <input type="submit" name="submit" value="Add Product">
    </form>
</div>
@endsection