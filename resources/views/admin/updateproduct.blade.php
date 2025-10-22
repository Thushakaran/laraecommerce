@extends('admin.maindesign')

<base href="/public">@section('add_product')

@if(session('product_update_message') )
<div style="background-color: blue; border: 1px solid #34d399; color: white; padding: 12px 16px; margin-bottom: 16px;">
    {{session('product_update_message')}};
</div>
@endif

<div class="container-fluid">
    <form action="{{route('admin.postupdateproduct', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_title" value="{{$product->product_title}}"> <br><br>
        <textarea name="product_description" value="{{$product->product_description}}">
            Product Description!...
        </textarea> <br>
        <input type="number" name="product_quantity" value="{{$product->product_quantity}}"> <br><br>
        <input type="number" name="product_price" value="{{$product->product_price}}"> <br><br>
        <img style="width: 150px;" src="{{asset('products/'.$product->product_image)}}" alt="">
        <input type="file" name="product_image"> <br><br>
        <select name="product_category">
            <option value="{{$product->product_category}}">
                {{$product->product_category}}
            </option>
            @foreach($categories as $category)
            <option value="{{$category->category}}">{{$category->category}}</option>
            @endforeach
        </select> <br><br>
        <input type="submit" name="submit" value="Update Product">
    </form>
</div>
@endsection