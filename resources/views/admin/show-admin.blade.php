@extends('layouts/admin-master')

@section('content')
<div class="orderContainer">
    <div class="cartBody">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Pc no.</th>
                    <th scope="col">Total Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($orders as $order)
                <tr class="cartList">
                    <th scope="row" class='col-sm-2'><?= $i ?></th>
                    <td class='col-sm-3'>{{$order->customer->name}}</td>
                    <td class='col-sm-2'>{{$order->pc_no}}</td>
                    <td class='col-sm-3'>{{$order->price}}</td>
                    <td class='col-sm-2'> <a href="{{route('admin.order-detail', ['id' => $order->id])}}">Detail</a></td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
