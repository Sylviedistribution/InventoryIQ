<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("vendors/images/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("vendors/images/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("vendors/images/favicon-16x16.png")}}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/styles/core.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/styles/icon-font.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("src/plugins/jquery-steps/jquery.steps.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/styles/style.css")}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="{{route("login")}}">
                <img src="{{asset("vendors/images/deskapp-logo.svg")}}" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="login">Se connecter</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{asset("vendors/images/register-page-img.png")}}" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="register-box bg-white box-shadow border-radius-10">
                    <div class="wizard-content">
                        <h5 class="text-center mb-5">Informations</h5>
                        <form method="POST" action="{{route("register.save")}}" class="login-box  wizard-circle ">
                            @csrf
                            <section>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nom d'utilisateur</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror">
                                            @error('nom')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Mot de passe</label>
                                        <div class="col-sm-8">
                                            <input type="password" name="password"
                                                   class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Confirmer mot de passe</label>
                                        <div class="col-sm-8">
                                            <input type="password" name="password_confirmation"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <button type="submit" class="btn btn-primary float-right">S'enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- success Popup html End -->
<!-- js -->
<script src="{{asset("vendors/scripts/core.js")}}"></script>
<script src="{{asset("vendors/scripts/script.min.js")}}"></script>
<script src="{{asset("vendors/scripts/process.js")}}"></script>
<script src="{{asset("vendors/scripts/layout-settings.js")}}"></script>
<script src="{{asset("src/plugins/jquery-steps/jquery.steps.js")}}"></script>
<script src="{{asset("vendors/scripts/steps-setting.js")}}"></script>
</body>

</html>
