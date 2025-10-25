@extends('maindesign')
<base href="/public">
@section('view_cart_products')
<div class="container">
    <a href="{{ route('index') }}" style="display:inline-block; margin-bottom:20px; color:#e74c3c; text-decoration:none; font-weight:500;">
        ← Back
    </a>
    <table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Title</th>
                <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Price</th>
                <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Image</th>
                <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $price = 0;
            @endphp

            @if(isset($cart) && $cart->count() > 0)
            @foreach($cart as $cart_product)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 12px;">{{$cart_product->product->product_title}}</td>
                <td style="padding: 12px;">{{$cart_product->product->product_price}}</td>
                <td style="padding: 12px;">
                    <img style="width: 150px;" src="{{asset('products/'.$cart_product->product->product_image)}}">
                </td>
                <td style="padding: 12px;"><a style="padding: 10px; background-color: red; color: white;" href="{{route('removecartproduct',$cart_product->id)}}">Remove</a></td>
            </tr>

            @php
            $price = $price + $cart_product->product->product_price;
            @endphp

            @endforeach
            @else
            <tr>
                <td colspan="4" style="text-align: center; padding: 20px;">Your cart is empty</td>
            </tr>
            @endif
            <br><br>
            <tr style="border-bottom: 1px solid #ddd; background-color: gray;">
                <td style="padding: 12px;">Total</td>
                <td style="padding: 12px;">Rs.{{$price}}</td>
                <td style="padding: 12px;"> </td>
                <td style="padding: 12px;"></td>
            </tr>
        </tbody>
    </table>
    @if(session('confirm_order') )
    <div style="background-color: green; border: 1px solid #34d399; color: white; padding: 12px 16px; margin-bottom: 16px;">
        {{session('confirm_order')}}
    </div>
    @endif
    <form action="{{route('confirmorder')}}" method="POST" style="margin: 30px auto; ">
        @csrf
        <input type="text" name="receiver_address" placeholder="Enter your address" required
            style="padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"> <br><br>

        <input type="text" name="receiver_phone" placeholder="Enter your phone number" required
            style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><br><br>

        <input class="btn btn-primary" type="submit" name="submit" value="Confirm Order"
            style="padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
    </form>

    <a href="{{route('stripe', $price)}}"
        class="btn btn-danger"
        style="background-color:#e74c3c; border:none;">
        Pay Now
    </a>

</div>
@endsection