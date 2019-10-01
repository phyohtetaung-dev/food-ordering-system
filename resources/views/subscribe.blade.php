<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- Linking -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/subscribe.css') }}">
    </head>
    <body>
        <!-- bgImgContainer1 -->
        <div class="bgImgContainer1" style="background-image: url('images/ordering16.jpg')">
            <div class="stripeContainer">
                <div class="stripeHeader">
                    <h1>Ready to get started?</h1>
                    <span>Subscribe today and learn how it can help your business.</span>
                </div>
                <div class="stripeBody">
                    <form action="{{ route('subscribe.store', [1]) }}" method="POST">
                        {{csrf_field()}}
                        <script
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="pk_test_NHbuIJf5nSjnKPS6JFkmvdZH004HcVBjn0"
                            data-name="E & E"
                            data-description="Monthly subscription"
                            data-amount="2000"
                            data-currency="usd"
                            data-panel-label=" "
                            data-label="1 month ($20)">
                        </script>
                    </form>
                    <form action="{{ route('subscribe.store', [2]) }}" method="POST">
                        {{csrf_field()}}
                        <script
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="pk_test_NHbuIJf5nSjnKPS6JFkmvdZH004HcVBjn0"
                            data-name="E & E"
                            data-description="Monthly subscription"
                            data-amount="2000"
                            data-currency="usd"
                            data-panel-label=" "
                            data-label="6 months ($110)">
                        </script>
                    </form>
                    <form action="{{ route('subscribe.store', [3]) }}" method="POST">
                        {{csrf_field()}}
                        <script
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="pk_test_NHbuIJf5nSjnKPS6JFkmvdZH004HcVBjn0"
                            data-name="E & E"
                            data-description="Monthly subscription"
                            data-amount="2000"
                            data-currency="usd"
                            data-panel-label=" "
                            data-label="1 year ($200)">
                        </script>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- infoContainer -->
        <div class="infoContainer">
            <!-- First Info -->
            <div class="firstInfo">
                <div class="infoText">
                    <h1>Why Ordering System?</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic consectetur omnis vero ullam a minus vel tempora, 
                        quo distinctio exercitationem quas doloremque soluta atque accusantium iste facilis sapiente inventore eaque! Possimus obcaecati soluta, 
                        ab fugit expedita nihil consequuntur necessitatibus sunt illum ipsa. Consequuntur unde error quibusdam. Magnam mollitia molestiae odit 
                        nemo. Cum ab voluptate odit nam repellendus officiis tenetur perferendis eum quibusdam fuga aspernatur totam et veritatis 
                        voluptatum unde perspiciatis dolorum nostrum dolor, doloribus a aliquid? Laborum, rerum soluta officiis ab libero at quod 
                        quibusdam possimus iusto. Et aliquam beatae quia hic totam. Doloribus porro distinctio veniam quas labore veritatis natus 
                        non eius cupiditate.
                    </p>
                </div>
                <div class="infoImg">
                    <img src="{{ asset('images/ordering2.png') }}" style="width: 100%; height: 100%;">
                </div>
            </div>
            <!-- Second Info -->
            <div class="secondInfo">
                <div class="infoImg">
                    <img src="{{ asset('images/time3.png') }}" style="width: 100%; height: 100%;">
                </div>
                <div class="infoText">
                    <h1>Website ordering in a few minutes</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas hic consectetur omnis vero ullam a minus vel tempora, 
                        quo distinctio exercitationem quas doloremque soluta atque accusantium iste facilis sapiente inventore eaque! Possimus obcaecati soluta, 
                        ab fugit expedita nihil consequuntur necessitatibus sunt illum ipsa. Consequuntur unde error quibusdam. Magnam mollitia molestiae odit 
                        nemo. Cum ab voluptate odit nam repellendus officiis tenetur perferendis eum quibusdam fuga aspernatur totam et veritatis 
                        voluptatum unde perspiciatis dolorum nostrum dolor, doloribus a aliquid? Laborum, rerum soluta officiis ab libero at quod 
                        quibusdam possimus iusto. Et aliquam beatae quia hic totam. Doloribus porro distinctio veniam quas labore veritatis natus 
                        non eius cupiditate.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- bgImgContainer1 -->
        <div class="bgImgContainer2" style="background-image: url('images/business.jpg')">
            <h1>One of the <b>BEST</b> online food ordering system in Myanmar</h1>
            <h2>Simplify the Food Ordering Process in your Game Shop</h2>
        </div>

        <!-- realTime -->
        <div class="realTimeContainer">
            <h1>Real Time Ordering System</h1>
            <span>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore soluta, 
                quidem quo fugit doloribus aut quaerat nisi ipsum tenetur.
            </span>
            <span>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, rerum?
            </span>
            <span>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi expedita animi tempore velit? Amet, ab.
            </span>
            <div class="realTimeWrap">
                <div class="realTimeImg">
                    <img src="{{ asset('images/realTimeOrdering.png') }}" alt="">
                </div>
            </div>
            
            <div class="realTimeText">
                
            </div>
        </div>
        
        <!-- commentContainer -->
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
            
        <!-- footer -->
        <div class="footer">
                    <!-- header -->
            <h1>Site Links</h1>
            
            <div class="footerItemsWrap">
                <div class="footerItems">
                    <a>Contact Us</a>
                    <a>About Us</a>
                    <a>Directions</a>
                    <a>Blog</a>
                </div>
                <div class="footerItems">
                    <a>Promotions</a>
                    <a>Partner</a>
                    <a>Careers</a>
                    <a>FAQs</a>
                </div>
                <div class="footerItems">
                    <a>Features</a>
                    <a>Privacy Policy</a>
                    <a>Terms & Conditions</a>
                </div>
            </div>
            
            <!-- line -->
            <hr style="background-color: rgba(0, 0, 0, 0.7)">
            
            <div class="footerItemsWrap">
            <div class="copyRight">
                    <span href="#" class="fa fa-copyright"> 2019 All rights reserved.</span>
                </div>
                <div class="followUs">
                    <h1>Follow Us</h1>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-google"></a>
                </div>
            </div>
        </div>
	</body>
</html>
