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
    <input type="hidden" name="acc-type" value="institutions">

    <div class="form-tearline">Let's get to know you</div>

<fieldset id="ind-2-1">
    <legend>Which one of our products are you interested in?</legend>

    <div class="spacing">
        <input id="answer-2-1-1" type="radio" name="answer-product" value="passive" required>
        <label for="answer-2-1-1">Passive funds</label>
        <div class="questionnaire-confirmation">Our main product let our advanced computer algorithms select and manage your
            investment portfolio based on Nobel Prize-winning Modern Portfolio Theory.</div>
    </div>

    <div class="spacing">
        <input id="answer-2-1-2" type="radio" name="answer-product" value="active">
        <label for="answer-2-1-2">Active funds</label>
        <div class="questionnaire-confirmation">Volatile markets somethimes demand more actively managed funds have a
            look at our performance</div>
    </div>

    <div class="spacing">
        <input id="answer-2-1-3" type="radio" name="answer-product" value="stockbroking">
        <label for="answer-2-1-3" >Stockbroking</label>
        <div class="questionnaire-confirmation">Invest in thousands of products in over one hundred market centers worldwide
            from Apple stock to Bharti Airtel India all in one place.</div>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-2-2">
    <legend>Which one of the following best describes your organization?</legend>

    <div class="spacing">
        <input id="answer-2-2-1" type="radio" name="answer-org-type" value="forprofit" required>
        <label for="answer-2-2-1">For- Profit</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-2" type="radio" name="answer-org-type" value="nonprofit">
        <label for="answer-2-2-2">Nonprofit</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-3" type="radio" name="answer-org-type" value="religious">
        <label for="answer-2-2-3">Religious organization</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-4" type="radio" name="answer-org-type" value="charity">
        <label for="answer-2-2-4">Charity</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-5" type="radio" name="answer-org-type" value="trade">
        <label for="answer-2-2-5">Trade and professional assotiation</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-6" type="radio" name="answer-org-type" value="corp">
        <label for="answer-2-2-6">Corporation</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-7" type="radio" name="answer-org-type" value="foundation">
        <label for="answer-2-2-7">Foundation and endowment</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-8" type="radio" name="answer-org-type" value="community">
        <label for="answer-2-2-8">Community group</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-9" type="radio" name="answer-org-type" value="service">
        <label for="answer-2-2-9">Service organization</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-10" type="radio" name="answer-org-type" value="school">
        <label for="answer-2-2-10">School and University</label>
    </div>

    <div class="spacing">
        <input id="answer-2-2-12" type="radio" name="answer-org-type" value="trust">
        <label for="answer-2-2-12">Trust account</label>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-2-3">
    <legend>What is your organization key priority?</legend>

    <div class="spacing">
        <input id="answer-2-3-1" type="radio" name="answer-priority" value="sustain" required>
        <label for="answer-2-3-1">Mission Sustainability</label>
        <div class="questionnaire-confirmation">Most organization seek a strategy that will ensure the continuation
            of their mission in perpetuity, and we share your dedication to serving the many stakeholders surrounding
            your organization - be they employees, customers, donors, members or benefeciaries of your services.</div>
    </div>

    <div class="spacing">
        <input id="answer-2-3-2" type="radio" name="answer-priority" value="consist">
        <label for="answer-2-3-2">Performance Consistency</label>
        <div class="questionnaire-confirmation">Strive to avoid significant losses while generating returns that are
            competetive in the global financial marketplace, making is easier for your organization to reach its
            investment goals, plan annual budgets, fund grants and support its mission.</div>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
</fieldset>

<fieldset id="ind-2-4">
    <legend>What is your Organization looking for in a financial advisor?</legend>
    <div class="tearline">Select all that apply</div>

    <div class="spacing">
        <input id="answer-2-4-1" type="checkbox" name="answer-looking-for[]" value="a" required>
        <label for="answer-2-4-1">We would like to create a diversified investment portfolio</label>
        <div class="questionnaire-confirmation">Simba Capital will create and manage a globally diversified portfolio
            of 7 or 8 asset classes based on your answers to this questionnaire.</div>
    </div>

    <div class="spacing">
        <input id="answer-2-4-2" type="checkbox" name="answer-looking-for[]" value="b">
        <label for="answer-2-4-2">We would like to avoid the high fees charged by banks on investment products</label>
        <div class="questionnaire-confirmation">With traditional bank charging upwards of 5% annually and herding
            investors into high-risk products (frontier market government bonds) you have an option now.</div>
    </div>

    <div class="spacing">
        <input id="answer-2-4-3" type="checkbox" name="answer-looking-for[]" value="c">
        <label for="answer-2-4-3">We would like investment professionals to manage our investments</label>
        <div class="questionnaire-confirmation">We have designed Simba Capital for organizations tha could not access
            sophisticated portfolio management advice. Once you open your account, we will handle the details of investing,
            rebalancing, and more for you.</div>
    </div>

    <div class="spacing">
        <input id="answer-2-4-4" type="checkbox" name="answer-looking-for[]" value="d">
        <label for="answer-2-4-4">We would like to match or beat the performance of the markets</label>
        <div class="questionnaire-confirmation">At Simba Capital, we believe the best way to match market performance is
            to make sure you pay low fees for your investments and minimize your taxes. Our fees are the lowest across
            traditional banks (at 0.25% of invested assets) our advanced computer algrithms will build and maintain
            personalised investment plan helping you to meet your goal as quickely as possible.</div>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose at least one of the choices above.</div>
</fieldset>

<fieldset id="ind-2-5">
    <legend>What is organization annual net income?</legend>

    <div class="input-group col-xs-3">
        <span class="input-group-addon">$</span>
        <input type="text" name="answer-pretax-income" class="questionnaire-money form-control" value="" required min="1">
    </div>
    <div class="questionnaire-error questionnaire-hide">Must be an amount greater than $0.</div>
</fieldset>

<fieldset id="ind-2-6">
    <legend>What is the total value of organization cash and liquid investments?</legend>
    <div class="tearline">e.g. savings, public stocks, bonds, mutual funds</div>

    <div class="input-group col-xs-3">
        <span class="input-group-addon">$</span>
        <input type="text" name="answer-lnw" class="questionnaire-money form-control" value="" required min="1">
    </div>

    <div class="questionnaire-error questionnaire-hide">$1 investment minimum.</div>
</fieldset>

<fieldset id="ind-2-7">
    <legend>The global stock market is often volatile.
        If your entire investment portfolio lost 10% of its value in a month during a market decline,
        what would you do?</legend>

    <div class="spacing">
        <input id="answer-2-7-1" type="radio" name="answer-response-to-loss" value="sellAll" required>
        <label for="answer-2-7-1">Sell all of your investments</label>
    </div>

    <div class="spacing">
        <input id="answer-2-7-2" type="radio" name="answer-response-to-loss" value="sellSome">
        <label for="answer-2-7-2">Sell some</label>
    </div>

    <div class="spacing">
        <input id="answer-2-7-3" type="radio" name="answer-response-to-loss" value="keepAll">
        <label for="answer-2-7-3">Keep all</label>
    </div>

    <div class="spacing">
        <input id="answer-2-7-4" type="radio" name="answer-response-to-loss" value="buyMore">
        <label for="answer-2-7-4">Buy more</label>
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