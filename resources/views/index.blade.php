@extends('layout.main')

<section class="hero">
    <h1>An investment service built for</h1>
    <div class="typing-block"><span id="typed">&nbsp;</span></div>
    <div class="slideshow">
        <div class="screen time"></div>
        <div class="screen market"></div>
        <div class="screen retire"></div>
        <div class="screen fees"></div>
        <div class="screen dream"></div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Be an Investor.</h2>
                <p>You worked hard for your money. Now take the next step and let Simba Capital invest it for you. We offer sophisticated investment management & advice - without the hassle, high fees, or high account minimums.</p>
                <a href="/questionnaire" class="btn button-yellow">Invest now</a>
            </div>
            <div class="col-md-6 text-center"><img src="img/monitor.png" alt=""></div>
        </div>
    </div>
</section>
<section class="dark">
    <div class="container"><div id="perf-chart"></div></div>
</section>
<section class="safer">
    <div class="container">
        <div class="row vertically-centered">
            <div class="col-md-6">
                <h2>Your money is <span class="text-yellow">safer</span> with us.</h2>
                <ul class="advantages">
                    <li>Simba Capital has partnered with the largest US electronic broker, Interactive Brokers Group (IBG LLC).</li>
                    <li>All investment accounts opened by Simba Capital will be client segregated and held under custody of Interactive Brokers LLC.</li>
                    <li>Interactive Brokers is a member of SIPC. Securities in your account protected up to $500,000. For details, please see <span class="text-yellow">www.sipc.org </span></li>
                    <li>As an SEC- and FINRA-regulated company, Interactive Brokers follows a strict set of rules designed to protect our investors' accounts.</li>
                    <li>Cutting edge security means your personal data is safe.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="layers">
                    <div class="layer screenshot"></div>
                    <div class="layer sipc"></div>
                    <div class="layer finra"></div>
                    <div class="layer sec"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-left-10">
                <button id="strength" class="button-yellow font-small">STRENGTH AND STABILITY AT A GLANCE</button>
                <button id="handle" class="button-white font-small">HOW WE HANDLE CLIENT ASSETS</button>
            </div>
        </div>
    </div>
</section>
<section id="strength-popup">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Strength and stability at a glance.</h2>
                <ul>
                    <li>• Interactive Brokers LLC is rated <span class="text-yellow">'BBB+' Outlook Stable by Standard & Poor's.</span> 20X stronger then Africa’s leading bank</li>
                    <li>• Interactive Brokers Group equity capital exceeds $5 billion</li>
                    <li>• 20 consecutive years of solid positive earnings</li>
                    <li>• Rated best broker for the fourth consecutive year by <span class="text-yellow">Barron’s</span></li>
                    <li>• Largest US broker based on daily average revenue</li>
                    <li>• As a member of SIPC Interactive Brokers Group client funds are protected up to $500,000. See <span class="text-yellow">SIPC</span> for more details</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="handle-popup">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>How we handle client assets.</h2>
                <p>Customer money is segregated in special custody accounts, which are designated for the exclusive benefit of customers of Interactive Brokers LLC.  Simba Capital as your investment advisor has authorization to invest your money as mandated by you and nothing else. Transferring money in and out of a custody account can only be initiated by (accounts linked by the same name using state of the art two factor finger print authorization) the customer themselves using a special security key shipped to the customer independently by Interactive Brokers LLC. This protection (the SEC term is "reserve" and the CFTC term is "segregation") is a core principle of securities and commodities brokerage outlined by the US Securities and Exchange Commission. </p>
                <p>On top of the $500,000 SIPC account protection, Interactive Brokers LLC holds an excess amount of its own money in segregated accounts to ensure that there is more than enough cash to protect all customers in the event of a default by or bankruptcy of the broker.</p>
            </div>
        </div>
    </div>
</section>
<section class="dark">
    <div class="container">
        <div class="row vertically-centered">
            <div class="col-md-5"><img src="img/infographic.png" alt=""></div>
            <div class="col-md-7">
                <h2>Giving you benefits of diversification.</h2>
                <p>Don’t put all your eggs in one basket. With currencies and real estate underperforming there is no better time to diversify your investments. </p>
                <p>We employ ETFs (Exchange Traded Funds) that track indexes for all major asset classes around the globe. Each ETF is chosen by our investment team based on its relative cost, tracking error, market liquidity, and securities lending policy. We always tell you why we chose each ETF over its alternative.</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row vertically-centered">
            <div class="col-md-7">
                <h2>How quickly can you sell your investments to raise cash?</h2>
                <p>Almost universally undervalued, liquidity describes the degree to which an asset can be quickly bought or sold in the market without affecting the asset's price.</p>
                <p>Our ETF portfolios can be liquidated and in your bank account within 3 business days. By selection the ETFs we employ average daily transaction volumes in excess of $250 million (Vanguard VTI) giving you peace of mind that when you need your money you will have it.</p>
            </div>
            <div class="col-md-5"><img src="img/cash.jpg" alt=""></div>
        </div>
    </div>
</section>

<section class="calculator">
    <div class="container">
        <div class="fees-wrapper">
            <div class="fees-frame">
                <div class="card-front">
                    <div class="fees-headline">
                        <div class="fees-icon"></div>
                        <h3 class="fees-header">Invest for less then you think</h3>
                    </div>
                    <div class="fees-description">
                        Simba will manage your investment for as little as 0.025% a month. You’ll also pay no commissions or other account fees.
                        <br>
                        <button class="fees-disclosure-control">Read Disclosure</button>
                    </div>
                    <!--<button class="fees-disclosure-control">Read Disclosure</button>-->
                    <div class="calculator-heading">Monthly Fees Calculator</div>
                    <div class="calculator-value">$206.25</div>
                    <div class="calculator-control-heading">Account value of <span class="calculator-control-value">$1,000,000</span></div>
                    <div class="calculator-slider">
                        <input id="B" type="text" class="span2" value=""
                               data-slider-min="500" data-slider-max="1000000" data-slider-step="1" data-slider-value="100000"
                               data-slider-id="BC" data-slider-tooltip="hide"
                               data-slider-handle="round">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dark features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Investment features</h3>
            </div>
        </div>
        <div class="row features-wrapper">
            <div class="feature-box">
                <div class="feature-box-image"><img src="img/Icon-1-2x.png" alt="" width="100"></div>
                <div class="feature-box-title">
                    <h5>Simple Investment Options</h5>
                </div>
                <div class="feature-box-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sit soluta nemo nam, repellat accusamus nulla mollitia provident excepturi fuga?</p>
                </div>
            </div>
            <div class="feature-box">
                <div class="feature-box-image"><img src="img/Icon-2-2x.png" alt="" width="100"></div>
                <div class="feature-box-title">
                    <h5>Financial Strength and Stability</h5>
                </div>
                <div class="feature-box-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sit soluta nemo nam, repellat accusamus nulla mollitia provident excepturi fuga?</p>
                </div>
            </div>
            <div class="feature-box">
                <div class="feature-box-image"><img src="img/Icon-3-2x.png" alt="" width="100"></div>
                <div class="feature-box-title">
                    <h5>Diversify your Investments</h5>
                </div>
                <div class="feature-box-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sit soluta nemo nam, repellat accusamus nulla mollitia provident excepturi fuga?</p>
                </div>
            </div>
            <div class="feature-box">
                <div class="feature-box-image"><img src="img/Icon-4-2x.png" alt="" width="100"></div>
                <div class="feature-box-title">
                    <h5>Ample Liquidity</h5>
                </div>
                <div class="feature-box-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sit soluta nemo nam, repellat accusamus nulla mollitia provident excepturi fuga?</p>
                </div>
            </div>
            <div class="feature-box">
                <div class="feature-box-image"><img src="img/Icon-5-2x.png" alt="" width="100"></div>
                <div class="feature-box-title">
                    <h5>No Comission Fees</h5>
                </div>
                <div class="feature-box-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sit soluta nemo nam, repellat accusamus nulla mollitia provident excepturi fuga?</p>
                </div>
            </div>
            <div class="feature-box">
                <div class="feature-box-image"><img src="img/Icon-6-2x.png" alt="" width="100"></div>
                <div class="feature-box-title">
                    <h5>Hassle Free Investing</h5>
                </div>
                <div class="feature-box-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sit soluta nemo nam, repellat accusamus nulla mollitia provident excepturi fuga?</p>
                </div>
            </div>
        </div>
    </div>
</section>
