@extends('layouts/admin-master')

@section('content')

<div class="orderDetailContainer">
    <div class="orderDetailDeliver">
        <h1>Customer's Order Detail</h1>
        <h2>Total Price: {{$totalPrice}} Ks</h2>
        <a href="{{route('admin.deliver', ['id' => $order_id])}}" class="deliver"> Deliver </a>
    </div>
    <div class="orderDetailLists">
            @foreach($order_details as $order_detail)
            <div class="orderDetailList">
                <div class="orderDetailImg">
                    <img src="{{asset($order_detail->menu->image)}}">
                </div>
                <div class="orderDetailText" >
                    <span><b>Menu name: </b>{{$order_detail->menu->name}}</span>
                    <span><b>Quantity: </b>{{$order_detail->qty}}</span>
                    <span><b>Price: </b>{{$order_detail->menu->price}} Ks</span>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
