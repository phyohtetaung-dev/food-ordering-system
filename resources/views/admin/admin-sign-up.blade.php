@extends('layouts/master')

@section('content')
<div class='loginContainer'>
    <div class="login">
        <div class="header">
            <h1>Create Account</h1>
            <span>to get access to E & E</span>
        </div>
        <div class="loginForm">
            <form action="#" method="POST">

                <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                
                <input type="text" name="companyName" placeholder="Company name" autocomplete="off" required>

                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                <input type="email" name="email2" placeholder="Confirm email" autocomplete="off" required>

                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                <input type="password" name="password2" placeholder="Confirm password" autocomplete="off" required>

                <input type="submit" name="submitButton" value="SUBMIT">
            </form>
        </div>
                <a class="signInMessage" href="{{url('user/userSignIn/')}}">Already have an account? Sign in here!</a>
    </div>
</div>
@endsection
