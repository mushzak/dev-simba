@extends('layout.questionnaire')

<div class="investnow-subheader">
<ol class="breadcrumb">
    <li>Assess Your Risk Tolerance</li>
    <li class="active">View Your Plan</li>
    <li>Open Account</li>
</ol>
</div>

<section class="row wrapper">
    <div class="row"><div class="col-lg-12">

<form id="plan" class="validate wizard" action="/questionnaire/post" method="post">

    <input type="hidden" name="action" value="open">
    <input type="hidden" name="email">
    <input type="hidden" name="risk" value="{!! $riskValue !!}">

<fieldset id="plan-1">
    <legend>We are finding the optimal plan for your risk profile...</legend>
</fieldset>

<fieldset id="plan-2">
    <legend>Based on your answers, here is your diversified investment plan. <span class="glyphicon glyphicon-question-sign text-info tip" data-tip="tip-first" ></span></legend>

    <div class="row form-inline">
        <div class="col-lg-9"><a href="/questionnaire/">Change My Answers</a></div>
        <label for="tolerance-2" class="col-lg-2  control-label">Your risk tolerance</label>
        <span class="col-lg-1"><input id="tolerance-2" type="text" size="4" value="{!! $riskValue !!}"></span>
    </div>

    <div id="plan-bar-chart"></div>

<div class="wrapper category-descr" data-category="U.S. Stocks">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why U.S. Stocks?</h5>
                <p>U.S. Stocks are an ownership share in U.S.-based corporations. U.S. Stocks act as the core asset
                    class because history demonstrates that they offer significant returns over the long run.
                    While more volatile than bonds, U.S. Stocks offer a great risk-adjusted return.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div>
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="https://personal.vanguard.com/us/FundsSnapshot?FundId=0970&amp;FundIntExt=INT">VTI (Vanguard Total Stock Market ETF)</a></li>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/ITOT.htm">ITOT (iShares Core S&amp;P Total U.S. Stock Mkt ETF)</a></li>
                        <li><a target="_blank" href="https://www.csimfunds.com/public/csim/home/products/exchange_traded_funds/summary.html?symbol=SCHB">SCHB (Schwab U.S. Broad Market ETF)</a></li>
                    </ul>
                </div>
                <h5>VTI vs. ITOT</h5>
                <p>VTI has a similar expense ratio and higher liquidity than ITOT.</p>
                <h5>VTI vs. SCHB</h5>
                <p>VTI’s track record is much longer than SCHB’s and has higher liquidity. We expect Vanguard to more aggressively lower the expense ratio of its ETFs over time.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="Foreign Stocks">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why Foreign Stocks?</h5>
                <p>Foreign Stocks are an ownership share in foreign companies in developed economies like Europe, Australia and Japan. Foreign stocks differ from U.S. stocks in two important ways. First, because markets outside the U.S. react differently to economic situations, foreign stocks help reduce a portfolio's overall risk. Second, foreign stocks provide indirect exposure to currency fluctuations. The historical returns of foreign stocks are lower than U.S. stocks and have higher risk, so the main impetus for investing in foreign stocks are their diversifying qualities.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div>
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="https://personal.vanguard.com/us/funds/snapshot?FundId=0936&amp;FundIntExt=INT">VEA (Vanguard FTSE Developed Markets ETF)</a>
                        </li><li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/IXUS.htm">IXUS (iShares Core MSCI Total Intl Stk ETF)</a>
                        </li><li><a target="_blank" href="https://www.csimfunds.com/public/csim/home/products/exchange_traded_funds/summary.html?symbol=SCHF">SCHF (Schwab International Equity ETF)</a>
                        </li></ul>
                </div>
                <h5>VEA vs. IXUS</h5>
                <p>VEA has a lower expense ratio and higher liquidity than IXUS.</p>
                <h5>VEA vs. SCHF</h5>
                <p>VEA’s track record is much longer than SCHF’s and has higher liquidity. We expect Vanguard to more aggressively lower the expense ratio of its ETFs over time.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="Emerging Markets">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why Emerging Markets?</h5>
                <p>Emerging Markets Stocks are an ownership share in foreign companies in newly developing economies like Brazil, Russia, India and China. Emerging Markets Stocks offer additional diversification because these investments respond differently than foreign developed economies. The historical returns of Emerging Markets Stocks are higher than U.S. Stocks, with higher risk. Emerging Markets add the possibility of higher returns to a portfolio and additional diversification.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div>
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="https://personal.vanguard.com/us/FundsSnapshot?FundId=0964&amp;FundIntExt=INT">VWO (Vanguard FTSE Emerging Markets ETF)</a></li>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/IEMG.htm">IEMG (iShares Core MSCI Emerging Markets ETF)</a></li>
                        <li><a target="_blank" href="https://www.csimfunds.com/public/csim/home/products/exchange_traded_funds/summary.html?symbol=SCHE">SCHE (Schwab Emerging Markets Equity ETF)</a></li>
                    </ul>
                </div>
                <h5>VWO vs. IEMG</h5>
                <p>VWO has a similar expense ratio to IEMG but higher liquidity. We expect Vanguard to more aggressively lower the expense ratio of its ETFs over time.</p>
                <h5>VWO vs. SCHE</h5>
                <p>VWO’s track record is much longer than SCHE’s and has higher liquidity.  We expect Vanguard to more aggressively lower the expense ratio of its ETFs over time.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="Dividend Stocks">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why Dividend Growth Stocks?</h5>
                <p>Dividend Growth Stocks are U.S. stocks that have a history of increasing their dividend payouts over time. They tend to be large-cap well-run companies in less cyclical industries and thus less volatile. As of this writing, many companies in this asset class have higher dividend yields than their corporate bond yields and the yields on U.S. government bonds. In the current low interest rate environment, Dividend Growth Stocks emerge as an asset class that offers an income stream and capital growth potential.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="why-this-etf">
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="https://personal.vanguard.com/us/funds/snapshot?FundId=0920&amp;FundIntExt=INT">VIG (Vanguard Dividend Appreciation)</a></li>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/DVY.htm">DVY (iShares Dow Jones Select Dividend Index ETF)</a></li>
                        <li><a target="_blank" href="https://www.csimfunds.com/public/csim/home/products/exchange_traded_funds/performance.html?symbol=SCHD">SCHD (Schwab Dow Jones U.S. Dividend 100 Index)</a></li>
                    </ul>
                </div>
                <h5>VIG vs. DVY</h5>
                <p>VIG has a lower expense ratio and tracking error than DVY.</p>
                <h5>VIG vs. SCHD</h5>
                <p>VIG’s track record is much longer than SCHD’s and has higher liquidity. We expect Vanguard to more aggressively lower the expense ratio of its ETFs over time.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="Real Estate">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why Real Estate?</h5>
                <p>Real Estate represents investments in real estate companies that provide exposure to commercial properties, apartment complexes and retail space. Real Estate offers both recurring cash that is distributed to shareholders and an investment in the long-term value of the properties. Real Estate also acts as a hedge against inflation. Significantly different from both stocks and bonds, real estate is a powerful diversifier.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div>
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="https://personal.vanguard.com/us/FundsSnapshot?FundId=0986&amp;FundIntExt=INT">VNQ (Vanguard REIT ETF)</a></li>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/IYR.htm">IYR (iShares Dow Jones U.S. Real Estate ETF)</a></li>
                        <li><a target="_blank" href="https://www.csimfunds.com/public/csim/home/products/exchange_traded_funds/summary.html?symbol=SCHH">SCHH (Schwab U.S. REIT ETF)</a></li>
                    </ul>
                </div>
                <h5>VNQ vs. IYR</h5>
                <p>VNQ has a significantly lower expense ratio than IYR, and it also covers a broader index.</p>
                <h5>VNQ vs. SCHH</h5>
                <p>VNQ’s track record is much longer than SCHH’s and has higher liquidity. We expect Vanguard to more aggressively lower the expense ratio of its ETFs over time.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="TIPS">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why TIPS?</h5>
                <p>Treasury Inflation-Protected Securities (TIPS) are inflation-indexed bonds issued by the U.S. federal government. Unlike nominal bonds, TIPS' principal and coupons are adjusted periodically based on the Consumer Price Index (CPI). Although TIPS currently have historical low yields, their inflation-indexed feature and low volatility makes them the only asset class that can provide income generation and inflation protection to risk averse investors.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div>
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="https://www.csimfunds.com/public/csim/home/products/exchange_traded_funds/summary.html?symbol=SCHP">SCHP (Schwab Barclays Capital U.S. TIPS)</a></li>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/TIP.htm">TIP (iShares Barclays TIPS Bond ETF)</a></li>
                        <li><a target="_blank" href="https://www.spdrs.com/product/fund.seam?ticker=IPE">IPE (SPDR Barclays TIPS ETF)</a></li>
                    </ul>
                </div>
                <h5>SCHP vs. TIP</h5>
                <p>SCHP has a lower expense ratio than TIP.</p>
                <h5>SCHP vs. IPE</h5>
                <p>SCHP has a lower expense ratio than IPE.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="Corporate Bonds">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why Corporate Bonds?</h5>
                <p>Corporate Bonds are debt issued by U.S. corporations with investment-grade credit ratings to fund business activities. They offer higher yields than U.S. Government Bonds due to higher credit risk, illiquidity and callability. In contrast to the U.S. government, most companies have gone through a deleveraging process and strengthened their balance sheets.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div>
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/LQD.htm?fundSearch=true&amp;qt=LQD">LQD (iShares iBoxx IG Corp Bond)</a></li>
                        <li><a target="_blank" href="http://www.pimcoetfs.com/Funds/Pages/CORP.aspx">CORP (PIMCO Investment Grade Corp Bond Index ETF)</a></li>
                        <li><a target="_blank" href="http://www.invescopowershares.com/products/overview.aspx?ticker=PFIG">PFIG (Powershares Fundamental Investment Grade Corp Bond ETF)</a></li>
                    </ul>
                </div>
                <h5>LQD vs. CORP</h5>
                <p>LQD has a lower expense ratio and higher liquidity than CORP.</p>
                <h5>LQD vs. PFIG</h5>
                <p>LQD has a lower expense ratio, lower tracking error, and higher liquidity than PFIG.</p>
            </div>

        </div>
    </div>
</div>

<div class="wrapper category-descr" data-category="Emerging Market Bonds">
    <div class="row">
        <div class="col-lg-6">

            <div>
                <h5>Why Emerging Market Bonds?</h5>
                <p>Emerging Market Bonds are debt issued by governments and quasi-government organizations from emerging market countries. They offer higher yields than developed market bonds. Historically, Emerging Market Bonds had serial defaults in the 1980s, 1990s and even 2000s. However, the world has changed, where investors today worry about potential defaults from developed market bonds rather than emerging market bonds. Emerging market countries, with younger demographics, stronger economic growth, healthier balance sheets and lower debt-to-GDP ratios, have less risk than most investors realize with respect to borrowing money.</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="why-this-etf">
                <div>
                    <p>The three leading ETFs for this category are:</p>
                    <ul>
                        <li><a target="_blank" href="http://us.ishares.com/product_info/fund/overview/EMB.htm?fundSearch=true&amp;qt=EMB">EMB (iShares JPM EMBI Global Core)</a></li>
                        <li><a target="_blank" href="http://www.invescopowershares.com/products/overview.aspx?ticker=PCY">PCY (PowerShares DB EM USD Liquid Balanced)</a></li>
                        <li><a target="_blank" href="http://www.vaneck.com/funds/EMLC.aspx">EMLC (Market Vectors Emerging Markets Local Currency Bond ETF)</a></li>
                    </ul>
                </div>
                <h5>EMB vs. PCY</h5>
                <p>EMB has a significantly lower tracking error and higher liquidity than PCY.</p>
                <h5>EMB vs. EMLC</h5>
                <p>EMB has a significantly lower tracking error and higher liquidity than EMLC.</p>
            </div>

        </div>
    </div>
</div>

    <button type="button" name="details" id="plan-details" class="btn btn-default">More details</button>
    <button type="button" name="save2"   id="plan-save-2"  class="btn btn-default">Save your plan</button>
    <button type="submit" name="submit"  id="open-account" class="btn btn-primary">Open an account</button>
</fieldset>

<fieldset id="plan-3">
    <legend>Based on your answers, here is your diversified investment plan.
        <span class="glyphicon glyphicon-question-sign text-info tip" data-tip="tip-first" ></span>
    </legend>

    <div class="row main form-inline">

        <div class="detailed-left-sidebar col-lg-3 form-horizontal" style="text-align: center">
            <label for="tolerance-3">Your Risk Tolerance</label>
            <div id="detailed-gauge-chart"></div>
            <input id="tolerance-3" class="form-control" style="width: 55px" type="text" size="4" value="{!! $riskValue !!}">
            <div class="under-input-a"><a href="/questionnaire/">Change My Answers</a></div>

            <hr>

            <label for="amount-3">Amount to Invest</label>
            <br>
            <div class="input-group col-xs-6">
                <span class="input-group-addon">$</span>
                <input id="amount-3" type="text" class="form-control" placeholder="500 min"/>
            </div>
            <div class="under-input-a"><a class="tip" data-tip="tip-how-do-i">How do I decide</a></div>
        </div>

        <div class="detailed-main col-lg-7">
            <div class="row">
                <div class="detailed-pie col-lg-3">
                    <div id="plan-pie-chart"></div>
                    <ul>
                        <li><a class="tip" data-tip="tip-why-this">Why this mix?</a></li>
                        <li><a class="tip" data-tip="tip-can-i-change">Can I change it?</a></li>
                        <li><a class="tip" data-tip="tip-why-vanguard">Why Vanguard</a></li>
                    </ul>
                </div>
                <div class="detailed-assets col-lg-9">
                    <table id="assets-table" class="table">
                        <thead>
                        <tr><th>ASSET CLASS</th><th>INVESTMENT</th><th class="text-right">%</th><th class="text-right">AMOUNT</th></tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div id="bottom-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#projected" aria-controls="projected" role="tab" data-toggle="tab">Projected Performance</a></li>
                        <li role="presentation"><a href="#historical" aria-controls="historical" role="tab" data-toggle="tab">Historical Performance</a></li>
                        <li role="presentation"><a href="#costs" aria-controls="costs" role="tab" data-toggle="tab">Your Costs</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="projected">

                            <div id="projection-chart"></div>
                            <input type="text" id="slider" name="slider" class="form-control" value="30">

                            <p><small>This projection is net of all fees (our fee and ETF expenses) and includes
                            dividends. This chart is intended to show only an expected range of possible investment
                            outcomes and does not take into consideration the effects of taxes, changing risk profiles,
                            or future investment decisions. Past performance is no guarantee of future results.
                            </small></p>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="historical">
                            <span class="line" style="border-color:#7bc455"></span></span>Your Investment Plan
                            <span class="line" style="border-color:#ffa800"></span></span>Select a benchmark: <select id="benchmark-select">
                                <option value="">None</option>
                                <option value="US_STOCKS">U.S. Stocks</option>
                                <option value="INTL_DEVELOPED">Foreign Stocks</option>
                                <option value="INTL_EMERGING">Emerging Markets</option>
                                <option value="DIV_STOCKS">Dividend Stocks</option>
                                <option value="REAL_ESTATE">Real Estate</option>
                                <option value="COMMODITIES">Natural Resources</option>
                                <option value="BONDS">U.S. Government Bonds</option>
                                <option value="INFL_BONDS">TIPS</option>
                                <option value="MUNI_BONDS">Municipal Bonds</option>
                                <option value="CORP_BONDS">Corporate Bonds</option>
                                <option value="EM_BONDS">Emerging Market Bonds</option>
                            </select>

                            <div id="historical-chart"></div>

                            <p><small>The historical results displayed in this graphic are hypothetical, rely primarily
                            on index information rather than actual trading, and do not represent the results of an
                            actual client account. Several processes, assumptions and data sources were used to create
                            one possible approximation of how Simba’s recommendation might have performed in the
                            past. A different methodology may have resulted in a different outcome. Investors should
                            carefully consider the <a href="#">process and inherent limitations</a> associated with
                            creating this hypothetical performance before deciding to invest with Simba Capital. Past
                            performance is no guarantee of future results.</small></p>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="costs">
                            <div class="fee-details row">

                                <div class="fee-list col-lg-6">
                                    <h4>Simba Capital Fee</h4>
                                    <table class="fee-table"><tbody>
                                    <tr>
                                        <td>
                                            <div class="dot-legend-w"><span class="dot-legend-l">Advisory Fee</span></div>
                                        </td>
                                        <td>
                                            <span class="dot-legend-r">0.25% / year</span>
                                        </td>
                                    </tr>
                                    </tbody></table>

                                    <h4 class="third-party">Third-Party Fees</h4>
                                    <table class="fee-table"><tbody>
                                    <tr>
                                        <td>
                                            <div class="dot-legend-w"><span class="dot-legend-l">ETF Expenses</span></div>
                                        </td>
                                        <td>
                                            <span class="dot-legend-r"><span id="etf-fee">0.12%</span> / year</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="dot-legend-w"><span class="dot-legend-l">Commissions</span></div>
                                        </td>
                                        <td>
                                            <span class="dot-legend-r">$0.00</span>
                                        </td>
                                    </tr>
                                    </tbody></table>
                                </div>

                                <div class="fee-comparison col-lg-6">
                                    <div class="inner">
                                        <h4>Advisory Fee Waived<br>
                                        on Your First $10K</h4>
                                        <p>To help early savers get started, we only charge our advisory fee on the portion
                                        of&nbsp;an account over $10,000.</p>
                                        <p>So for a <span id="cost-amount">$500</span> investment,
                                        the&nbsp;advisory fee is effectively reduced to <b id="cost-effective">0.00%</b> / year.</p>
                                    </div>
                                    <div id="cost-leader"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="detailed-right-sidebar col-lg-2">
            <h5>What about:</h5>
            <ul>
                <li><a class="tip" data-placement="left" data-tip="tip-fees-faq">Fees?</a></li>
                <li><a class="tip" data-placement="left" data-tip="tip-rebalancing-faq">Rebalancing?</a></li>
                <li><a class="tip" data-placement="left" data-tip="tip-taxes-faq">Minimizing my taxes?</a>
                <li><a class="tip" data-placement="left" data-tip="tip-custodian-faq">My brokerage account?</a>
                <li><a class="tip" data-placement="left" data-tip="tip-house-faq">My house?</a>
                <li><a class="tip" data-placement="left" data-tip="tip-savings-faq">My savings?</a>
                <li><a class="tip" data-placement="left" data-tip="tip-play-money-faq">“Play" money”?</a>
                <li><a class="tip" data-placement="left" data-tip="tip-account-types-faq">Account types?</a>
                <li><a class="tip" data-placement="left" data-tip="tip-account-faq">Accounts under $5,000?</a>

                <div class="under-input-a"><a href="/faq">See more questions</a></div>
            </ul>
        </div>
    </div>

    <button type="button" name="details" id="plan-rough"     class="btn btn-default">Hide details</button>
    <button type="button" name="save3"   id="plan-save-3"    class="btn btn-default">Save your plan</button>
    <button type="submit" name="submit"  id="open-account-3" class="btn btn-primary">Open an account</button>
</fieldset>

</form>

</div></div>

</section>

@section('bottom-js')

<div class="modal fade" id="askEmail" tabindex="-1" role="dialog" aria-labelledby="askEmail" aria-hidden="true"
     data-toggle="modal" data-keyboard="true" data-sent="{!! $askEmail ? 'false' : 'true' !!}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="askEmailLabel">Save your plan</h4>
            </div>
            <div class="modal-body">
                <label for="modal-email">Enter your email address and we’ll send you a link for returning to this plan
                    at a later date.</label>
                <input id="modal-email" name="email" type="email" class="form-control" required>

                <input id="modal-subscribe" type="checkbox" name="modal-subscribe" checked>
                <label for="modal-subscribe" class="control-label">Send me periodic Simba Capital updates and news</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default get-plan">Save Plan</button>
                <div><small>We don’t spam! See our <a href="/legal/privacy">privacy policy</a>.</small></div>
            </div>
        </div>
    </div>
</div>

@include('questionnaire/tips')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.5/bootstrap-slider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.3/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.3/highcharts-more.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.3/modules/solid-gauge.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.5.3/numeral.min.js"></script>
<script src="/scripts/jquery.formtowizard.js"></script>
<script src="/scripts/bootstrap-spinedit.js"></script>
<script src="/scripts/forms.js?{!! $ASSETS_REV !!}"></script>
<script src="/scripts/plan-charts.js?{!! $ASSETS_REV !!}"></script>

@endsection
