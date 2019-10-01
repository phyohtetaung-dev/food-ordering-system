@extends('layouts/user-master')

@section('content')
    <div class='loginContainer'>
        <div class="login">
            <div class="header">
                <h1>Sign up</h1>
                <span>to continue to E & E</span>
            </div>
            <div class="loginForm">
                <form action="{{ route('user.signUp') }}" method="POST" id="adminCreateAnAccountError">
                    {{csrf_field()}}
                    <input type="text" name="username" id="create-username" placeholder="Username" autocomplete="off" required>
                    
                    <input type="password" name="password" id="create-password" placeholder="Password" autocomplete="off" required>
                    <input type="password" name="password2" id="create-confirm-password" placeholder="Confirm password" autocomplete="off" required>

                    <input type="submit" name="submitButton" value="SUBMIT">
                </form>
            </div>
            <a class="signInMessage" href="{{url('user/user-sign-in/')}}">Already have an account? Sign in here!</a>
        </div>
    </div>
@endsection

@section('script')
    @if(Session::has('username_exist'))
        <script>
            swal("{{ Session::get('username_exist') }}", {
                button: false
            });
            <?php
                Session::remove('username_exist');
            ?>
        </script>
    @endif
    @if(Session::has('success'))
        <script>
            swal("{{ Session::get('success') }}", {
                button: false
            });
            <?php
                Session::remove('success');
            ?>
        </script>
    @endif
@endsection
