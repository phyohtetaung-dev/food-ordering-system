<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Linking -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <div class="highLightedContent" style="z-index: -1">
        <img src="{{ asset('images/highlightedContent1.jpg') }}" style="width: 100%; height: 100%;">
    </div>

    <div class="overlay">
        <div class="inform">
            <h1>E & E</h1>
            <label class='subtitle'>Order your favourite foods online within a second.</label>
            <div class="access">
                <span class='adminCreateAnAccount' id="adminCreateAnAccount" onclick="showCreateAnAccountDialog()">Create an account</span>
                <span class='adminLogin' id="adminLogin" onclick="showLoginDialog()">Login</span>
            </div>
            
            <!-- Create an account dialog -->
            <div id="createAnAccountDialog">
                <div class="login">
                    <div class="header">
                        <h1>Create Account <span class='close' onclick="hideCreateAnAccountDialog()">&times;</span></h1>
                    </div>
                    <div class="loginForm">
                        <form action="{{ route('admin.store-admin-data') }}" method="POST" id="adminCreateAnAccountError">
                            {{csrf_field()}}
                            <input type="text" name="username" id="create-username" placeholder="Username" autocomplete="off" required>
                            
                            <input type="email" name="email" id="create-email" placeholder="Email" autocomplete="off" required>
                            <input type="email" name="email2" id="create-confirm-email" placeholder="Confirm email" autocomplete="off" required>
                            
                            <input type="password" name="password" id="create-password" placeholder="Password" autocomplete="off" required>
                            <input type="password" name="password2" id="create-confirm-password" placeholder="Confirm password" autocomplete="off" required>

                            <input type="submit" name="submitButton" value="SUBMIT">
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Login dialog -->
            <div id="createLoginDialog">
                <div class="login">
                    <div class="header">
                        <h1>Login<span class='close' onclick="hideLoginDialog()">&times;</span></h1>
                    </div>
                    <div class="loginForm">
                        <form action="{{ route('admin.login-admin') }}" method="POST" id="adminLoginError">
                            {{csrf_field()}}
                            <input type="email" name="loginEmail" id="login-email" placeholder="Email" autocomplete="off" required>
                            <input type="password" name="loginPassword" id="login-password" placeholder="Password" autocomplete="off" required>
                            <input type="submit" name="submitButton" value="SUBMIT">
                        </form>
                    </div>
                    <div class='or'>
                        <span>--------------- OR ---------------</span>
                    </div>
                    <div>
                        <a href="{{ route('admin.redirect') }}" class="btn btn-facebook btn-block mb-3">
                            <i class="fa fa-facebook-official pr-2"></i> Login with Facebook
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('admin.google-redirect') }}" class="btn btn-google btn-block mb-3">
                            <i class="fa fa-google pr-2"></i> Login with Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::to('js/popupBox.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/validation.js') }}"></script>
@if(Session::has('exist_email'))
    <script>
        document.getElementById("createAnAccountDialog").style.display = "block";
        document.getElementById("adminCreateAnAccount").classList.add("disabled");
        document.getElementById("adminLogin").classList.add("disabled");
        swal("{{ Session::get('exist_email') }}", {
            button: false
        });
        <?php
            Session::remove('exist_email');
        ?>
    </script>
@endif

@if(Session::has('email_not_exist'))
    <script>
        document.getElementById("createLoginDialog").style.display = "block";
        document.getElementById("adminCreateAnAccount").classList.add("disabled");
        document.getElementById("adminLogin").classList.add("disabled");
        swal("{{ Session::get('email_not_exist') }}", {
            button: false
        });
        <?php
            Session::remove('email_not_exist');
        ?>
    </script>
@endif
</html>