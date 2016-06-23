<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simba</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.5/css/bootstrap-slider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.min.css">
    <link rel="stylesheet" href="styles/simba.css?{!! $ASSETS_REV !!}">
</head>
<body class="frontpage">
<header class="hero-header">
    <div class="container">
        <nav class="main-nav col-md-9"><a href="#" class="logo"><img src="img/Simba-Logo-2x_new.png" alt="Simba" width="54"></a><a href="#" class="main-nav__item">why simba capital</a><a href="#" class="main-nav__item">what we do</a><a href="#" class="main-nav__item">who we are</a><a href="#" class="main-nav__item">faq</a><a href="#" class="main-nav__item">blog</a></nav>
        <div class="login col-md-3"><a href="{!! $userLinkUrl !!}" class="main-nav__item">{!! $userLinkCaption !!}</a><a href="/questionnaire/" class="main-nav__item-button vertically-centered">invest now</a></div>
    </div>
</header>
<header class="main-header">
    <div class="container">
        <nav class="main-nav col-md-9"><a href="#" class="logo"><img src="img/Simba-Logo-2x.png" alt="Simba" width="54"></a><a href="#" class="main-nav__item">why simba capital</a><a href="#" class="main-nav__item">what we do</a><a href="#" class="main-nav__item">who we are</a><a href="#" class="main-nav__item">faq</a><a href="#" class="main-nav__item">blog</a></nav>
        <div class="login col-md-3"><a href="{!! $userLinkUrl !!}" class="main-nav__item">{!! $userLinkCaption !!}</a><a href="/questionnaire/" class="main-nav__item-button vertically-centered">invest now</a></div>
    </div>
</header>

@yield('content')

<section class="dark contacts">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><span>

            Questions? Visit the <a href="#" class="text-yellow">FAQ page</a>, or get in touch:</span><span><img src="img/cell-2x.png" alt="" width="16">1-888-428-9482</span><span><img src="img/email-2x.png" alt="" width="16"><a href="mailto:support@simba.capital">support@simba.capital</a></span><span><img src="img/chat-2x.png" alt="" width="16"><a href="#">Live Chat</a><small>(offline)</small></span></div>
        </div>
    </div>
</section>
<section class="dark bottom-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 space-between">
                <div class="col">
                    <h6>Who we are</h6>
                    <ul>
                        <li> <a href="#">Overview</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h6>What we do</h6>
                    <ul>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">Methodology</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h6>Blogs</h6>
                    <ul>
                        <li> <a href="#">Simba Capital Blog</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h6>Legal</h6>
                    <ul>
                        <li><a href="#">Client Agreement</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Copyright Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p>Simba Capital Ltd is a registered investment advisor. Securities in your account are protected up to $500,000. See sipc.org for more details. By using this website, you accept our <a href="#">Terms of Use </a>and <a href="#">Privacy Policy. </a>Past performance is no guarantee of future results. Any historical returns, expected returns, or probability projections may not reflect actual future performance. All securities involve risk and may result in loss. We do not provide financial planning services to individual investors. <a href="#">Full Disclosure</a></p>
                <p>© Copyright 2016 Simba Capital Ltd.</p>
            </div>
            <div class="col-md-4 logos"><img src="img/Logo_1_2x.png" alt="" width="81" height="34"><img src="img/Logo_2_2x.png" alt="" width="109" height="41"><img src="img/Logo_3_2x.png" alt="" width="38" height="36"></div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.5/bootstrap-slider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.3/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.5.3/numeral.min.js"></script>
<script src="scripts/typed.min.js"></script>
<script src="scripts/main.min.js"></script>
<script src="scripts/frontpage-charts.js?{!! $ASSETS_REV !!}"></script>

</body>
