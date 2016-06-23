@extends('layout.questionnaire')

<div class="investnow-subheader">
<ol class="breadcrumb">
    <li class="active">Assess Your Risk Tolerance</li>
    <li>View Your Plan</li>
    <li>Open Account</li>
</ol>
</div>

<div class="row wrapper" id="progress"><div id="progress-complete"></div></div>

<section class="wrapper">
    <div class="row"><div class="col-lg-12">

<form id="questionnaire" class="validate wizard" action="/questionnaire/post" method="post">
    <input type="hidden" name="action" value="plan">
    <input type="hidden" name="acc-type" value="individuals">

    <div class="form-tearline">Let's get to know you</div>

<fieldset id="ind-1-1">
    <legend>Which one of our products are you interested in?</legend>

    <div class="spacing">
    <input id="answer-1-1-1" type="radio" name="answer-product" value="passive" required>
    <label for="answer-1-1-1">Passive funds</label>
    <div class="questionnaire-confirmation">Our main product let our advanced computer algorithms select and manage your
        investment portfolio based on Nobel Prize-winning Modern Portfolio Theory.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-1-2" type="radio" name="answer-product" value="active">
    <label for="answer-1-1-2">Active funds</label>
    <div class="questionnaire-confirmation">Volatile markets somethimes demand more actively managed funds have a
        look at our performance</div>
    </div>

    <div class="spacing">
    <input id="answer-1-1-3" type="radio" name="answer-product" value="stockbroking">
    <label for="answer-1-1-3" >Stockbroking</label>
    <div class="questionnaire-confirmation">Invest in thousands of products in over one hundred market centers worldwide
        from Apple stock to Bharti Airtel India all in one place.</div>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-1-2">
    <legend>What is your primary reason for investing?</legend>

    <div class="spacing">
    <input id="answer-1-2-1" type="radio" name="answer-investment-type" value="general-savings" required>
    <label for="answer-1-2-1">General savings</label>
    <div class="questionnaire-confirmation">Often you do not have a specific goal you are saving for or you’re unsure of
        what your future goals might be—but you understand investing is necessary for capital growth. The General
        Investing goal allows for this flexibility.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-2-2" type="radio" name="answer-investment-type" value="retirement">
    <label for="answer-1-2-2">Retirement</label>
    <div class="questionnaire-confirmation">Retirement is both the largest future liability most people will have and
        the one that differs most from other investing goals. At Simba Capital, a Retirement goal can be used as a
        regular investment account. </div>
    </div>

    <div class="spacing">
    <input id="answer-1-2-3" type="radio" name="answer-investment-type" value="safety">
    <label for="answer-1-2-3">Safety net</label>
    <div class="questionnaire-confirmation">A Safety Net goal is one of the highest priority goals we recommend for
        investors. Our Safety Net goal type is slightly different from other goals in that we assume the money may
        never be needed—but when it is, we assume a substantial portion of the balance will be liquidated all at
        once.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-2-4" type="radio" name="answer-investment-type" value="purchase">
    <label for="answer-1-2-4">Planning a major purchase in the future</label>
    <div class="questionnaire-confirmation">The Major Purchases goal should be used by investors who have very a
        specific goal or purchase they are saving for, like a home down payment, future tuition, or any other event
        with a specific timetable.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-2-5" type="radio" name="answer-investment-type" value="other">
    <label for="answer-1-2-5">Other</label>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-1-3">
    <legend>What are you looking for in a financial advisor?</legend>

    <div class="spacing">
    <input id="answer-1-3-1" type="checkbox" name="answer-looking-for[]" value="a" required>
    <label for="answer-1-3-1">I would like to create a diversified investment portfolio</label>
    <div class="questionnaire-confirmation">Simba Capital will create and manage a globally diversified portfolio of 7 or 8 asset classes based on your answers to this questionnaire.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-3-2" type="checkbox" name="answer-looking-for[]" value="b">
    <label for="answer-1-3-2">I would like to avoid the high fees charged by banks on investment products</label>
    <div class="questionnaire-confirmation">Sophisticated portfolio management used to be reserved for the wealthiest investors. Not anymore, now Simba Capital makes professional advisory services available to anymore with $10,000 to invest.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-3-3" type="checkbox" name="answer-looking-for[]" value="c">
    <label for="answer-1-3-3">I would like someone to completely manage my investments, so that I don't have to</label>
    <div class="questionnaire-confirmation">Fantastic! We have designed Simba Capital as a hassle-free service. Once you open your account, we will handle the details of investing, rebalancing, and more for you.</div>
    </div>

    <div class="spacing">
    <input id="answer-1-3-4" type="checkbox" name="answer-looking-for[]" value="d">
    <label for="answer-1-3-4">I would like to match or beat the performance of the markets</label>
    <div class="questionnaire-confirmation">At Simba Capital, we believe the best way to match market performance is to make sure you pay low fees for your investments and minimize your taxes. Our fees are the lowest across traditional banks (at 0.25% of invested assets) our advanced computer algrithms will build and maintain  personalised investment plan helping you to meet your goal as quickely as possible.</div>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose at least one of the choices above.</div>
</fieldset>

<fieldset id="ind-1-4">
    <legend>What is your current age?</legend>

    <div class="input-group col-xs-2">
        <input type="text" class="questionnaire-integer form-control" name="answer-age" value="" required min="18">
    </div>
    <div class="questionnaire-error questionnaire-hide">Clients must be 18 or over.</div>
</fieldset>

<fieldset id="ind-1-5">
    <legend>What is your annual pre-tax income?</legend>

    <div class="input-group col-xs-3">
        <span class="input-group-addon">$</span>
        <input type="text" name="answer-pretax-income" class="questionnaire-money form-control" value="" required min="1">
    </div>
    <div class="questionnaire-error questionnaire-hide">Must be an amount greater than $0.</div>
</fieldset>

<fieldset id="ind-1-6">
    <legend>Which of the following best describes your household</legend>

    <div class="spacing">
    <input id="answer-1-6-1" type="radio" name="answer-household" value="single-no-dependents" required>
    <label for="answer-1-6-1">Single income, no dependents</label>
    </div>

    <div class="spacing">
    <input id="answer-1-6-2" type="radio" name="answer-household" value="single-with-dependents">
    <label for="answer-1-6-2">Single income, at least one dependent</label>
    </div>

    <div class="spacing">
    <input id="answer-1-6-3" type="radio" name="answer-household" value="dual-no-dependents">
    <label for="answer-1-6-3">Dual income, no dependents</label>
    </div>

    <div class="spacing">
    <input id="answer-1-6-4" type="radio" name="answer-household" value="dual-with-dependents">
    <label for="answer-1-6-4">Dual income, at least one dependent</label>
    </div>

    <div class="spacing">
    <input id="answer-1-6-5" type="radio" name="answer-household" value="retired-or-independent">
    <label for="answer-1-6-5">Retired or financially independent</label>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-1-7">
    <legend>What is the total value of your cash and liquid investments?</legend>
    <div class="tearline">e.g. savings, public stocks, bonds, mutual funds</div>

    <div class="input-group col-xs-3">
        <span class="input-group-addon">$</span>
        <input type="text" name="answer-lnw" class="questionnaire-money form-control" value="" required min="1">
    </div>

    <div class="questionnaire-error questionnaire-hide">$1 investment minimum.</div>
</fieldset>

<fieldset id="ind-1-8">
    <legend>When deciding how to invest your money, which do you care more about?</legend>

    <div class="spacing">
    <input id="answer-1-8-1" type="radio" name="answer-concern" value="gain" required>
    <label for="answer-1-8-1">Maximizing gains</label>
    </div>

    <div class="spacing">
    <input id="answer-1-8-2" type="radio" name="answer-concern" value="loss">
    <label for="answer-1-8-2">Minimizing losses</label>
    </div>

    <div class="spacing">
    <input id="answer-1-8-3" type="radio" name="answer-concern" value="both">
    <label for="answer-1-8-3">Both equally</label>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-1-9">
    <legend>The global stock market is often volatile.
        If your entire investment portfolio lost 10% of its value in a month during a market decline,
        what would you do?</legend>

    <div class="spacing">
    <input id="answer-1-9-1" type="radio" name="answer-response-to-loss" value="sellAll" required>
    <label for="answer-1-9-1">Sell all of your investments</label>
    </div>

    <div class="spacing">
    <input id="answer-1-9-2" type="radio" name="answer-response-to-loss" value="sellSome">
    <label for="answer-1-9-2">Sell some</label>
    </div>

    <div class="spacing">
    <input id="answer-1-9-3" type="radio" name="answer-response-to-loss" value="keepAll">
    <label for="answer-1-9-3">Keep all</label>
    </div>

    <div class="spacing">
    <input id="answer-1-9-4" type="radio" name="answer-response-to-loss" value="buyMore">
    <label for="answer-1-9-4">Buy more</label>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<a id="before-form" class="btn btn-default" href="/questionnaire/">&lt; Back</a>
<button type="submit" id="submit-form" class="btn btn-primary">Submit form</button>

</form>

    </div></div>
</section>

@section('bottom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="/scripts/jquery.formtowizard.js?{!! $ASSETS_REV !!}"></script>
    <script src="/scripts/forms.js?{!! $ASSETS_REV !!}"></script>
@endsection