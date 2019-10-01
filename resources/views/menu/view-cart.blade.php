@extends('layouts/menu-master')

@section('content')
    @if(Session::has('cart'))
        <div class="cartBody">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $i = 1 ?>
                    
                    @foreach($menus as $menu)
                        <tr class="cartList">
                            <th scope="row" class="col-sm-1"> <?= $i ?></th>
                            <td class="col-sm-2"><img src="{{asset($menu['item']['image'])}}" width="80px" height="80px"></td>
                            <td class="col-sm-2">{{$menu['item']['name']}}</td>
                            <td class="col-sm-2">{{$menu['qty']}}</td>
                            <td class="col-sm-2">{{$menu['price']}} Ks</td>
                            <td class="col-sm-1">
                                <a href="{{ route('menu.addQty', ['id' => $menu['item']['id']]) }}" >Add</a>
                            </td>
                            <td class="col-sm-1">
                                <a href="{{ route('menu.subQty', ['id' => $menu['item']['id']]) }}" > Sub</a>
                            </td>
                            <td class="col-sm-1">
                                <a href="{{ route('menu.deleteItem', ['id' => $menu['item']['id']]) }}">Delete</a>
                            </td>
                        </tr>
                        
                    <?php $i++ ?>
                    
                    @endforeach
                    <!-- <tr class="cartButton">
                        <td colspan="6">
                            <div class="checkoutAndClear">
                                <a href="{{ route('menu.checkout') }}" class="checkout"> Checkout </a>
                                <a href="{{ route('menu.deleteCart') }}" class="clear"> Clear All </a>
                            </div>
                        </td>
                        <td>Total:</td>
                        <td>{{ $totalPrice }} Ks</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="cartButton">
            <div class="checkoutAndClear">
                <a href="{{ route('menu.checkout') }}" class="checkout"> Checkout </a>
                <a href="{{ route('menu.deleteCart') }}" class="clear"> Clear All </a>
            </div>
            <div class="totalPrice">
                <b>Total:</b> {{ $totalPrice }} Ks
            </div>
        </div>
    @else
         <div class="noItems">
            <img src="{{asset('images/cart.png')}}">
            <span>No items in cart !</span> 
         </div>
    @endif

@endsection

@section('script')
    @if(Session::has('pc_not_found'))
        <script>
            swal("{{ Session::get('pc_not_found') }}", {
                button: false
            });
            <?php
                Session::remove('pc_not_found');
            ?>
        </script>
    @endif
    @if(Session::has('member_fees_not_enough'))
        <script>
            swal("{{ Session::get('member_fees_not_enough') }}", {
                button: false
            });
            <?php
                Session::remove('member_fees_not_enough');
            ?>
        </script>
    @endif
@endsection
