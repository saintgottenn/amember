<section class="content container">
            <h1 class="content__title"> Dashboard </h1>
            <h2 class="content__subtitle"> Your Current Plans and Invoices </h2>
            <h3 class="content__block-title">Package Plan</h3>

            @foreach ($packages as $package)
                <div class="content__block active">
                    <div class="content__block-wrapper">
                        <p class="content__block-subtitle">
                            <img src="{{asset('/img/icons/elitePlan.svg')}}" alt="img">
                            {{$package['product']['title']}}
                        </p>
                        <img class="arrow" src="{{asset('/img/icons/arrow.svg')}}" alt="arrow">
                        <img class="block" src="{{asset('/img/icons/none.svg')}}" alt="arrow">
                    </div>
                    <div class="content__block-inforamtion">
                        <div class="content__block-info">
                            Activation plan: <br>
                            <span>{{$package['started_at']}}</span>
                        </div>
                        <div class="content__block-info">
                            To expire: <br>
                            <span>{{$package['expires_at']}}</span>
                        </div>
                        <div class="content__block-info">
                            The remaining number of days: <br>
                            <span>{{$package['remaining_days']}}</span>
                        </div>
                        <div class="content__block-info">
                            Active tools<br>
                            <span>{{count($package['product']['tools_included'])}}</span>
                        </div>
                    </div>
                    <div class="content__block-inforamtion block">
                        <div class="content__block-info">
                            No information available
                        </div>
                    </div>
                    <div class="content__block-plans">
                        @foreach ($package['product']['tools_included'] as $tool)
                            <div class="content__block-plan">
                                <p class="content__block-subtitle content__block-plan-title">
                                    <img src="{{asset($tool->image)}}" alt="img">
                                    {{$tool->title}}
                                </p>
                                <div class="row" x-data="{ activeLink: '{{ $tool->main_link }}' }">
                                    @if ($tool->links)
                                        <div class="col-md-6">
                                            <div class="wrapper__block">
                                                <div class="wrapper__block-input wrapper__block-select">
                                                    <label for="language{{$tool->index}}">Choose a language</label>
                                                    <select id="language{{$tool->index}}" name="country" x-on:change="activeLink = $event.target.value">
                                                        <option value="{{$tool->main_link}}">No node selected</option>
                                                        @foreach(json_decode($tool->links, true) as $lang => $link)
                                                            <option value="{{$link}}">{{$lang}}</option>                                                        
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6 d-flex flex-column justify-content-center" style="    margin-top: 15px;">
                                        <div class="content__block-plan-wrapper">
                                            @if ($tool->main_link)
                                                <a x-bind:href="activeLink" class="content__block-plan-btn full">
                                                    <img src="{{asset('/img/icons/share1.svg')}}" alt="share">
                                                    Open link
                                                </a>
                                            @endif
                                            @if($tool->extension)
                                                <a href="{{route('download', ['path' => $tool->extension])}}" class="content__block-plan-btn black">
                                                    <img src="{{asset('/img/icons/share3.svg')}}" alt="share">
                                                    Install the extension
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <a href="#" class="content__explore">Explore Plans <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                <path d="M1 6.56392H9.44646" stroke="#0066FF" stroke-linecap="round"/>
                <path d="M7.75708 3.83691L10.291 6.56419L7.75708 9.29146" stroke="#0066FF" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <h3 class="content__block-title">Individual Tools</h3>
            @foreach ($tools as $tool)
                <div class="content__block active">
                    <div class="content__block-wrapper">
                        <p class="content__block-subtitle">
                            <img src={{asset($tool['product']['image'])}} alt="img">
                            {{$tool['product']['title']}}
                        </p>
                        <img class="arrow" src="{{asset('/img/icons/arrow.svg')}}" alt="arrow">
                        <img class="block" src="{{asset('/img/icons/none.svg')}}" alt="arrow">
                    </div>
                    <div class="content__block-inforamtion">
                        <div class="content__block-info">
                            Activation plan: <br>
                            <span>{{$tool['started_at']}}</span>    
                        </div>
                        <div class="content__block-info">
                            To expire: <br>
                            <span>{{$tool['expires_at']}}</span>
                        </div>
                        <div class="content__block-info">
                            The remaining number of days: <br>
                            <span>{{$tool['remaining_days']}}</span>
                        </div>
                    </div>
                    <div class="content__block-inforamtion block">
                        <div class="content__block-info">
                            No information available
                        </div>
                    </div>
                    <div class="content__block-plans">
                        <div class="content__block-plan">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="wrapper__block">
                                        <div class="wrapper__block-input wrapper__block-select">
                                            <label for="node1">Select node</label>
                                            <select id="node1" name="country">
                                                <option disabled selected>No node selected</option>
                                                <option value="USA">USA</option>
                                                <option value="France">France</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Mexico">Mexico</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wrapper__block">
                                        <div class="wrapper__block-input wrapper__block-select">
                                            <label for="language1">Choose a language</label>
                                            <select id="language1" name="country">
                                                <option disabled selected>No node selected</option>
                                                <option value="Chinese">Chinese</option>
                                                <option value="France">France</option>
                                                <option value="Italy">Italy</option>
                                                <option value="English">English</option>
                                                <option value="Japanesse">Japanesse</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content__block-plan-wrapper">
                                <a href="#" class="content__block-plan-btn full">
                                    <img src="../../img/icons/share1.svg" alt="share">
                                    Open link
                                </a>
                                <a href="#" class="content__block-plan-btn">
                                    <img src="../../img/icons/share2.svg" alt="share">
                                    Request to Update
                                </a>
                                <a href="#" class="content__block-plan-btn black">
                                    <img src="../../img/icons/share3.svg" alt="share">
                                    Install the extension
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="content__block">
                <div class="content__block-wrapper">
                    <p class="content__block-subtitle">
                        <img src="../../img/icons/plan2.svg" alt="img">
                        Instatext Plan
                    </p>
                    <img class="arrow" src="../../img/icons/arrow.svg" alt="arrow">
                    <img class="block" src="../../img/icons/none.svg" alt="arrow">
                </div>
                <div class="content__block-inforamtion">
                    <div class="content__block-info">
                        Activation plan: <br>
                        <span>2023-02-23 15:13</span>
                    </div>
                    <div class="content__block-info">
                        Activation plan: <br>
                        <span>2023-02-23 15:13</span>
                    </div>
                    <div class="content__block-info">
                        The remaining number of days: <br>
                        <span>20 days</span>
                    </div>
                    <div class="content__block-info">
                        Today’s quota: <br>
                        <span>0/10000</span>
                    </div>
                </div>
                <div class="content__block-inforamtion block">
                    <div class="content__block-info">
                        No information available
                    </div>
                </div>
                <div class="content__block-plans">
                    <div class="content__block-plan">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrapper__block">
                                    <div class="wrapper__block-input wrapper__block-select">
                                        <label for="node1">Select node</label>
                                        <select id="node1" name="country">
                                            <option disabled selected>No node selected</option>
                                            <option value="USA">USA</option>
                                            <option value="France">France</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Mexico">Mexico</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wrapper__block">
                                    <div class="wrapper__block-input wrapper__block-select">
                                        <label for="language1">Choose a language</label>
                                        <select id="language1" name="country">
                                            <option disabled selected>No node selected</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="France">France</option>
                                            <option value="Italy">Italy</option>
                                            <option value="English">English</option>
                                            <option value="Japanesse">Japanesse</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content__block-plan-wrapper">
                            <a href="#" class="content__block-plan-btn full">
                                <img src="../../img/icons/share1.svg" alt="share">
                                Open link
                            </a>
                            <a href="#" class="content__block-plan-btn">
                                <img src="../../img/icons/share2.svg" alt="share">
                                Request to Update
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="content__explore">Explore Plans <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                <path d="M1 6.56392H9.44646" stroke="#0066FF" stroke-linecap="round"/>
                <path d="M7.75708 3.83691L10.291 6.56419L7.75708 9.29146" stroke="#0066FF" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <div class="invoices">
                <div class="content__block-wrapper">
                    <p class="content__block-subtitle">
                        Invoices
                    </p>
                    <img class="arrow" src="../../img/icons/arrow.svg" alt="arrow">
                </div>
                <div class="content__block-plans">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Paid with</th>
                            <th>Amount</th>
                            <th>Product</th>
                            <th>Status</th>
                        </tr>
                        <tr><td>Dec 2, 2022</td><td>Paypal</td><td>$15</td><td>Advance plan</td><td>Paid</td></tr>
                        <tr><td>Nov 22, 2022</td><td>Visa</td><td>$3</td><td>Grammarly</td><td>Failure</td></tr>
                        <tr><td>Jan 1, 2023</td><td>Paysafecard</td><td>$3</td><td>Ahrefs</td><td>Paid</td></tr>
                        <tr><td>May 31, 2019</td><td>Paytm</td><td>$5</td><td>InstaText</td><td>Paid</td></tr>
                    </table>
                </div>
            </div>
        </section>