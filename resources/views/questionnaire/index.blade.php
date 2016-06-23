@extends('layout.questionnaire')

<div class="investnow-subheader">
<ol class="breadcrumb">
    <li class="active">Assess Your Risk Tolerance</li>
    <li>View Your Plan</li>
    <li>Open Account</li>
</ol>
</div>

<div class="row wrapper" id="progress"><div id="progress-complete"></div></div>

<section class="row wrapper">
    <div class="col-lg-12">

<form id="questionnaire" class="validate" action="/questionnaire/post" method="post">

    <input type="hidden" name="action" value="choose">

    <div class="form-tearline">Let's get to know you</div>

    <fieldset>
    <legend>What account type are you looking to open?</legend>

    <div class="spacing">
    <input id="ans=0-1" type="radio" name="target" value="individuals" checked required>
    <label for="ans=0-1">For Individuals</label>
    <div class="questionnaire-confirmation">Whether you are investing to build wealth, retire or plan a major purchase
        in the future we can help.</div>
    </div>

    <div class="spacing">
    <input id="ans-0-2" type="radio" name="target" value="institutions">
    <label for="ans-0-2">For Institutions</label>
    <div class="questionnaire-confirmation">We can provide the expertise you need to manage your cash reserves,
        whether you need is to produce additional current income or grow your cash reserves for the future use.</div>
    </div>

    <div class="questionnaire-error questionnaire-hide">Please choose one of the choices above.</div>
    </fieldset>

    <button type="submit" id="submit-form" class="btn btn-primary" name="submit">Continue</button>

</form>

    </div>
</section>
