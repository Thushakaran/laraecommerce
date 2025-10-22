@extends('admin.maindesign')

@section('view_category')
@if(session('product_delete_message') )
<div style="margin-bottom: 10px; color: black; background-color:orangered;padding: 12px 16px;">
    {{session('product_delete_message')}};
</div>
@endif
<table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Title</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Description</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Quantity</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Price</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Image</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Category</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$product->product_title}}</td>
            <td style="padding: 12px;">{{$product->product_description}}</td>
            <td style="padding: 12px;">{{$product->product_quantity}}</td>
            <td style="padding: 12px;">{{$product->product_price}}</td>
            <td style="padding: 12px;">
                <img style="width: 150px;" src="{{asset('products/'.$product->product_image)}}">
            </td>
            <td style="padding: 12px;">{{$product->product_category}}</td>
            <td style="padding: 12px;"><a href="{{route('admin.updateproduct',$product->id)}}" style="color:green;">Update</a></td>
            <td style="padding: 12px;"><a href="{{route('admin.deleteproduct',$product->id)}}" onclick="return confirm('Are You Sure')">Delete</a></td>
        </tr>
        @endforeach

        {{$products->links()}}

    </tbody>
</table>
@endsection