@extends('layout.registration')

<div class="static-classiest-layout-component layout-component">
  <div class="static-registration-v2-component">
    <div class="static-funnel-progress-classiest-v2-component" data-app-id="" data-account-selections="null">
  <div class="container">
    <div class="horizontal">
      <div class="col-md-6 funnel-progress-classiest-v2-left-container small-text">
        <ul class="funnel-progress-classiest-v2-link-list">
          <li class="funnel-progress-classiest-v2-link-list-item funnel-progress-classiest-v2-left-title all-bold">
              Client Application
          </li>
        </ul>
      </div>
      <div class="col-md-6 small-text funnel-progress-classiest-v2-right-container">
        <ul class="funnel-progress-classiest-v2-link-list">
        </ul>
      </div>
    </div>
  </div>
  <script type="text/template" class="are-you-sure-modal-template">
    <div class="dashboard-are-you-sure-modal-component">
  <p class="are-you-sure-prompt"></p>
  <button type="button" class="btn btn-primary are-you-sure-modal-yes">Yes</button>
  <button type="button" class="btn btn-default are-you-sure-modal-no">No</button>
</div>

  </script>
</div>


    
<div class="pure-g-r wf-full-g-guttered">
  <div class="pure-u-1-2"></div>
  <div class="pure-u-1-2 signup-steps-classiest-v2-container">
    <nav class="signup-steps-classiest-v2">
      <ul class="signup-steps-classiest-v2-steps">
          <li class="signup-steps-classiest-v2-step step small-text all-bold signup-steps-classiest-v2-step-curr" data-href="/register/a/basics">
            Create
          </li>
          <li class="signup-steps-classiest-v2-step step small-text all-bold" data-href="/register/a/funding">
            Fund
          </li>
          <li class="signup-steps-classiest-v2-step step small-text all-bold" data-href="/register/a/review">
            Review
          </li>
      </ul>
      <div class="signup-steps-classiest-v2-progress-bar-container">
        <div class="signup-steps-classiest-v2-progress-bar" style="width: 0.0%;">
        </div>
      </div>
    </nav>
  </div>
</div>


    <div class="wf-full-g-guttered">
      <div class="pure-g-r">
        <div class="pure-u-1-6">
        </div>
        <div class="pure-u-2-3">
          <h2 class="ubersignup-v2-page-heading">Let's get started.</h2>
          
<div id="components" class="ubersignup">
  <form class="wform" id="ubersignup-form" data-model="abstract_signup_fields" action="/new-plan-user" accept-charset="UTF-8" method="post"><input name="utf8" value="✓" type="hidden"><input name="authenticity_token" value="RADRnk9DUY2Tl2UDJX9zhd76nZAMafFjxEZmQmK/1pNsAKkflWWeUCHm3smwPHgkEOAL8mdU7i5r0RvUcp1BTw==" type="hidden">

    <div class="pure-g-r ubersignup-v2-new-plan-user-form-container">
      <div class="pure-u-1-2">
          
<div class="name-fields">
  <div class="pure-g-r">
    <div class="pure-u-1-2 new-plan-user-first-name-container">
      <div class="new-plan-user-input-group">
        <label for="abstract_signup_fields_first_name" class="new-plan-user-label">First Name</label>
        <input class="new-plan-user-input kform-input-text kform-input-error" maxlength="30" size="30" name="abstract_signup_fields[first_name]" id="abstract_signup_fields_first_name" type="text">
      </div>
      <p style="display: block;" class="ubersignup-v2-input-feedback-message small-text ubersignup-v2-input-feedback-message-error" id="first-name-message">
        <i class="fa fa-check ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-success-icon"></i>
        <i class="fa fa-times ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-error-icon"></i>
        <span class="ubersignup-v2-input-feedback-message-text">First name is required</span>
      </p>
    </div>
    <div class="pure-u-1-2 new-plan-user-last-name-container">
      <div class="new-plan-user-input-group">
        <label for="abstract_signup_fields_last_name" class="new-plan-user-label">Last Name</label>
        <input class="new-plan-user-input kform-input-text kform-input-error" maxlength="30" size="30" name="abstract_signup_fields[last_name]" id="abstract_signup_fields_last_name" type="text">
      </div>
      <p style="display: block;" class="ubersignup-v2-input-feedback-message small-text ubersignup-v2-input-feedback-message-error" id="last-name-message">
        <i class="fa fa-check ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-success-icon"></i>
        <i class="fa fa-times ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-error-icon"></i>
        <span class="ubersignup-v2-input-feedback-message-text">Last name is required</span>
      </p>
    </div>
  </div>
</div>
  <p class="new-plan-user-info">Enter the same name you use to file taxes.</p>
<div style="clear:both"></div>


          





<p class="new-plan-user-info">Choose an address you check often.</p>
<p class="new-plan-user-input-group">
  <label for="abstract_signup_fields_email" class="new-plan-user-label">E-mail (this will be your username)</label>
    <input placeholder="your@email.com" class="new-plan-user-input kform-input-text kform-input-error" maxlength="40" size="40" name="abstract_signup_fields[email]" id="abstract_signup_fields_email" type="email">
</p>

<p style="display: block;" class="ubersignup-v2-input-feedback-message small-text ubersignup-v2-input-feedback-message-error" id="email-message">
  <i class="fa fa-check ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-success-icon"></i>
  <i class="fa fa-times ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-error-icon"></i>
  <span class="ubersignup-v2-input-feedback-message-text">Invalid email</span>
</p>

<p class="label-info new-plan-user-info">
  <span id="pw-assessment"></span>
</p>
<p class="new-plan-user-input-group" style="float:left">
  <label for="abstract_signup_fields_password" class="new-plan-user-label">Password (minimum 8 characters)</label>
  <input id="pw-new" autocomplete="off" class="zxcvbn new-plan-user-input kform-input-text kform-input-error" data-notify=".ubersignup-v2-password-strength" data-confirm="#pw-confirm" name="abstract_signup_fields[password]" type="password">
  <span style="display: none;" class="ubersignup-v2-password-strength-container small-text">
    <span class="ubersignup-v2-password-strength">Password must be at least 8 characters.</span>
  </span>
</p>
<p style="display: block;" class="ubersignup-v2-input-feedback-message small-text ubersignup-v2-input-feedback-message-error" id="pw-new-message">
  <i class="fa fa-check ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-success-icon"></i>
  <i class="fa fa-times ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-error-icon"></i>
  <span class="ubersignup-v2-input-feedback-message-text">Password must be at least 8 characters</span>
</p>
<div class="new-plan-user-confirm-password-container new-plan-user-confirm-password-container-hidden">
  <p class="new-plan-user-input-group" style="float:left;margin-left:10px">
    <label for="abstract_signup_fields_password_confirmation" class="new-plan-user-label">Re-type Password</label>
    <input id="pw-confirm" autocomplete="off" class="new-plan-user-input kform-input-text" name="abstract_signup_fields[password_confirmation]" type="password">
  </p>
  <p class="ubersignup-v2-input-feedback-message small-text" id="pw-confirm-message">
    <i class="fa fa-check ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-success-icon"></i>
    <i class="fa fa-times ubersignup-v2-input-feedback-message-icon ubersignup-v2-input-feedback-message-error-icon"></i>
    <span class="ubersignup-v2-input-feedback-message-text"></span>
  </p>
  <div style="clear:both"></div>
</div>

      </div>
      <div class="pure-u-1-2"></div>
    </div>

    <div class="ubersignup-v2-flow-buttons flow-buttons">
      <div class="pure-g">
          <div class="pure-u-1-2">
            <a href="/plan" class="ubersignup-v2-back-button btn-bare btn-s">
              <i class="fa fa-chevron-left classiest-chevron-left"></i> Risk Tolerance
            </a>
          </div>
        <div class="pure-u-1-2 ubersignup-v2-next-button-container">
          <button type="submit" class="ubersignup-v2-next-button btn-orange btn-s" id="new-plan-user-continue">
            Continue
          </button>
        </div>
      </div>
    </div>
</form></div>

        </div>
        <div class="pure-u-1-6">
        </div>
      </div>
    </div>

    <hr class="classiest-hr">
  </div>

  <div class="static-modal-component hidden">
  <div class="container-full-width">
    <div class="modal-background">
      <div class="modal-wrapper">
        <div class="modal">
          <div class="modal-close"></div>
          <div class="modal-content"></div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>