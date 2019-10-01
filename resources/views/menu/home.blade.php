@extends('layouts/menu-master')

@section('content')    
    <div id="slideshow">
        <div>
            <img src="{{ asset('images/highlightContent5.jpg') }}">
        </div>
        <div>
            <img src="{{ asset('images/highlightContent14.jpg') }}">
        </div>
        <div>
                <img src="{{ asset('images/highlightContent11.jpg') }}">
        </div>
    </div>
    <div class="availableMenusContainer">
        <h1>Available Menus</h1>
        <div class="availableMenus">
            @foreach($categories as $category)
                <div>
                    <img src="{{asset($category->image)}}" >
                    <span>{{$category->name}}</span>
                </div>
            @endforeach
        </div>
    </div>
   
    <div class="storyContainer">
        <div class="story" data-aos="flip-left" data-aos-duration="2200">
            <h1>Who we are?</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Consequuntur temporibus voluptate inventore impedit velit provident.
            </p>
        </div>
        <div class="story" data-aos="flip-left" data-aos-duration="2200">
            <h1>What we do?</h1>
            <p>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. 
               Vitae laborum maiores rem quibusdam ad quas dolores dolor?
               Similique asperiores nulla laborum maxime sed temporibus quisquam!
            </p>
        </div>
        <div class="story" data-aos="flip-left" data-aos-duration="2200">
            <h1>Start your experience</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus 
                dicta voluptate maxime porro eos a sequi sed quaerat, possimus, laborum 
                repellendus nesciunt nisi officiis rerum ducimus minus illo, aspernatur sapiente?
            </p> 
        </div>
    </div>
    <div class="enjoyFood">
        <img src="{{ asset('images/smile1.png') }}" data-aos="fade-right" data-aos-duration="2500">
        <label data-aos="fade-left" data-aos-duration="2500">Enjoy Your Food !!!</label>
    </div>
    <div class="commentContainer">
        <div class="commentHeader">
            <h1>What customers are saying</h1>
        </div>
        <div class="commentBodyContainer">
            <div class="commentBody">
                <div class="commentBodyImage">
                    <img src="{{ asset('images/user1.jpg') }}" alt="">
                </div>
                <div class="commentBodyText">
                    <span class="commenter">Hein Htat Aung</span>
                    <span class="commenterShop">King Panda Esport</span>
                    <p class="comment">
                        "My business has grown significantly with the sales optimized website. 
                        My sales have quadrupled since using it. 
                        It's the best online ordering system."
                    </p>
                </div>
            </div>
            <div class="commentBody">
                <div class="commentBodyImage">
                    <img src="{{ asset('images/user2.jpg') }}" alt="">
                </div>
                <div class="commentBodyText">
                    <span class="commenter">Ahkar Lwin</span>
                    <span class="commenterShop">Phoenix</span>
                    <p class="comment">
                        "We love the online sales results, we see higher sales revenue through the website, 
                        and the advantage of having all products visible for the client."
                    </p>
                </div>
            </div>
            <div class="commentBody">
                <div class="commentBodyImage">
                    <img src="{{ asset('images/user3.jpg') }}" alt="">
                </div>
                <div class="commentBodyText">
                    <span class="commenter">Wai Yan Phyoe</span>
                    <span class="commenterShop">SG Cyber Hub</span>
                    <p class="comment">
                        "Finally a revolutionary food ordering software that we have been dreaming of 
                        for so many years for online orders, easy to setup, low cost, fantastic support, 
                        thank you!"
                    </p>
                </div>
            </div>
            <div class="commentBody">
                <div class="commentBodyImage">
                    <img src="{{ asset('images/user4.jpg') }}" alt="">
                </div>
                <div class="commentBodyText">
                    <span class="commenter">Pyae Sone Aung</span>
                    <span class="commenterShop">House of Gamers</span>
                    <p class="comment">
                        "I was initially concerned your website but you have delivered excellent, 
                        prompt and understandable customer service."
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="access">
        <img src="{{ asset('images/access1.jpg') }}" alt="">
        <h1>Get  your own BEST food ordering system!</h1> <br>
        <a href="{{ url('/') }}">GET ACCESS NOW</a>
    </div>
@endsection

@section('script')    
    <script>
        $("#slideshow > div:gt(0)").hide();

        setInterval(function() { 
        $('#slideshow > div:first')
            .fadeOut(1300)
            .next()
            .fadeIn(1300)
            .end()
            .appendTo('#slideshow');
        },  4000);
    </script>
@endsection

