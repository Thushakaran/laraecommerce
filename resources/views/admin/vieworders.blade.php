@extends('admin.maindesign')

@section('view_orders')
<table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Customer Name</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Address</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Phone</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Product</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Price</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Image</th>
            <th style="padding:12px; text-align: Left; border-bottom:1px solid #ddd">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{$order->user->name}}</td>
            <td style="padding: 12px;">{{$order->receiver_address}}</td>
            <td style="padding: 12px;">{{$order->receiver_phone}}</td>
            <td style="padding: 12px;">{{$order->product->product_title}}</td>
            <td style="padding: 12px;">{{$order->product->product_price}}</td>
            <td style="padding: 12px;">
                <img style="width: 150px;" src="{{asset('products/'.$order->product->product_image)}}">
            </td>
            <td style="padding: 12px;">
                <form action="{{route('admin.changestatus',$order->id)}}" method="POST" style="display: flex; align-items: center; gap: 8px; margin: 8px 0;">
                    @csrf
                    <select name="status" style="padding: 6px 10px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="{{$order->status}}">{{$order->status}}</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <input
                        type="submit"
                        name="submit"
                        value="Submit"
                        onclick="return confirm('Are You Sure?')"
                        style="background-color: #007bff; color: white; border: none; border-radius: 4px; padding: 6px 12px; cursor: pointer;">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection