@extends('layouts/user-master')

@section('content')
    <div class="loginContainer">
        <div class="login">
            <div class="header">
                <h1>Sign in</h1>
                <span>to continue to E & E</span>
            </div>
            <div class="loginForm">
                <form action="{{ route('user.signIn') }}" method="POST" id="adminLoginError">
                    {{csrf_field()}}
                    <input type="text" name="loginUsername" id="login-username" placeholder="Username" autocomplete="off" required>
                    <input type="password" name="loginPassword" id="login-password" placeholder="Password" autocomplete="off" required>
                    <input type="submit" name="submitButton" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if(Session::has('username_not_exist'))
        <script>
            swal("{{ Session::get('username_not_exist') }}", {
                button: false
            });
            <?php
                Session::remove('username_not_exist');
            ?>
        </script>
    @endif
@endsection
