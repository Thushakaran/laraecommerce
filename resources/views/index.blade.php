@extends('maindesign')

@section('index')
<div class="container">
    <div class="heading_container heading_center">
        <h2>
            Latest Products
        </h2>
    </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <a href="{{route('product_details',$product->id)}}">
                    <div class="img-box">
                        <img src="{{asset('products/'.$product->product_image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>
                            {{$product->product_title}}
                        </h6>
                        <h6>
                            Price
                            <span>
                                {{$product->product_price}}
                            </span>
                        </h6>
                    </div>
                    <div class="new">
                        <span>
                            New
                        </span>
                    </div>
                </a>
                {{-- Add to Cart Form --}}
                <form action="{{ route('addtocard', $product->id) }}" method="POST" style="margin-top: 10px; text-align:center;">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-primary"
                        style="
                            background-color: #f7444e;
                            color: #fff;
                            border: none;
                            padding: 8px 14px;
                            border-radius: 15px;
                            font-weight: 500;
                            transition: 0.3s;
                            cursor: pointer;">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="btn-box">
        <a href="{{route('viewallproducts')}}">
            View All Products
        </a>
    </div>
</div>

@endsection