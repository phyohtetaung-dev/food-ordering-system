@extends('layouts/menu-master')

@section('content')    
    <!-- categories -->
    <div class="categories">
        @foreach($categories as $category)
            <a href="{{ url('menu/show-menu/' . $category->id) }}">{{$category->name}}</a>
        @endforeach
    </div>
    
    <div class="activedCategory">
        <h1 data-aos="zoom-in" data-aos-duration="1200">{{$activedCategory}}</h1>
    </div>
    
    <!-- menus -->
    <div class="menus">
        @foreach($menus as $menu)
        <div class="menu" >
            <div class="imgContainer">
                <img src="{{asset($menu->image)}}" >
                <span class="waitingTime">Duration: {{$menu->waitingTime}}</span>
            </div>
            <div class="menuDetail">
                <h1>{{$menu->name}}</h1>
                <div class="ingredientsContainer">
                    <span class="ingredients">{{$menu->ingredients}}</span>
                </div>
                <span class="price">Available with: {{$menu->price}} Ks</span>
                <a href="{{ url('menu/add-to-cart/' . $menu->id) }}" class="addToCartBtn">Add To Cart</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
