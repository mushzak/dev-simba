<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Investment Management, Online Financial Advisor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.5/css/bootstrap-slider.min.css"> -->
    <link rel="stylesheet" href="/styles/reg.css">
    <link rel="stylesheet" href="/styles/main.min.css">
    <link rel="stylesheet" href="/styles/simba.css?{!! $ASSETS_REV !!}">
</head>
<body class="questionnaire-and-plan">
<header class="min-header">
    <div class="container">
        <nav class="main-nav col-md-9"><a href="/" class="logo"><img src="/img/simba-capital5-55-w.png" alt="Simba" height="55" width="253"></a></nav>
    </div>
</header>
<div class="min-header-pad"></div>

@yield('content', 'empty')

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
            <div class="col-md-4 logos"><img src="/img/Logo_1_2x.png" alt="" width="81" height="34"><img src="/img/Logo_2_2x.png" alt="" width="109" height="41"><img src="/img/Logo_3_2x.png" alt="" width="38" height="36"></div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('bottom-js')

</body>
</html>