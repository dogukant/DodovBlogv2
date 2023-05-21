<link href="{{asset('back/')}}/css/login.css" rel="stylesheet">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form method="post" action="{{route('admin.logingiris')}}">
    @csrf
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="{{asset('back/')}}/img/IMG_4965.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form>
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Giriş">
        </form>
    </div>
</div>

</form>
