@extends('layouts/menu-master')

@section('content')
<div class="contactWrap">
    <div class="container contactContainer">
        <div class="contactHeader">
            <h1>Contact Us</h1>
            <hr>
            <h2>How may we help?</h2>
            <span>Our agents are available 24x7 to make sure that all your issues and inquires are resolved.</span>
        </div>
        <div class="contactBody">
            <div class="emailContact">
                <div class="emailContactHeader">
                    <h1>Write to us</h1>
                    <span>
                        You can fill the below contact form and we make sure to get back to you as soon as possible.
                    </span>
                </div>
                <div class="emailContactForm">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMobile">Mobile</label>
                            <input type="password" class="form-control" id="exampleInputMobile" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="physicalContact">
                <h1>Contact us</h1>
                <span>To get the quickest response, you may contact us through:</span>
                <ul>
                    <li>Phone - (09) 780698851</li>
                    <li>Address - No.208, 36th Street, Yangon.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

