@extends('maindesign')
<base href="/public">
@section('product_details')
<div class="container">
    @if(session('cart_message') )
    <div style="background-color: green; border: 1px solid #34d399; color: white; padding: 12px 16px; margin-bottom: 16px;">
        {{session('cart_message')}}
    </div>
    @endif

    <a href="{{ route('index') }}" style="display:inline-block; margin-bottom:20px; color:#e74c3c; text-decoration:none; font-weight:500;">
        ← Back to Shop
    </a>
    <div class="heading_container heading_center">
        <h2>Product Details</h2>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="img-box">
                <img style="width:100%; border-radius:10px;" src="{{ asset('products/' . $product->product_image) }}" alt="{{ $product->product_title }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="detail-box">
                <h3>{{ $product->product_title }}</h3>
                <p style="margin-top:10px;">{{ $product->product_description }}</p>
                <h4 style="margin-top:20px;">Price: <span style="color: #e74c3c;">${{ $product->product_price }}</span></h4>
                <h5>Available Quantity: {{ $product->product_quantity }}</h5>
                <p>Category: <strong>{{ $product->product_category }}</strong></p>

                <form action="{{ route('addtocard', $product->id) }}" method="POST" style="margin-top:20px;">
                    @csrf
                    <div class="form-group">
                        <label>Quantity:</label>
                        <input type="number" name="quantity" min="1" value="1" style="width:60px;">
                    </div>
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection