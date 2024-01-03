<div style="width: 100%;">
    <section class="content container">
        <h1 class="content__title"> Select Bundle or Individual Tools </h1>


        <h3 class="content__block-title">Package Plan</h3>

        <div class="plans">
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-3">
                        <div class="plans__block">
                            <p class="plans__block-title">{{$package['title']}}</p>
                            <p class="plans__block-price"><span>{{$package['currency_symbol']}}{{$package['price']}}</span>/mo</p>
                            @php
                                $isInCart = collect(session('cart'))->contains(function ($item) use ($package) {
                                    return $item['product_id'] === $package['product_id'];
                                });
                            @endphp

                            @if ($isInCart)
                                <a href="{{route('summaryOrder')}}" class="plans__block-btn">Go to the cart</a>
                            @else
                               <form action="{{ route('cart.add') }}" method="POST" x-data="{ submitted: false }" @submit="submitted = true">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{$package['product_id']}}">
                                    <input type="hidden" name="productType" value="Package">
                                    <button type="submit" class="plans__block-btn" :disabled="submitted">Add to cart</button>
                                </form>
                            @endif
                            <ul>
                                @foreach($package['tools_included'] as $tool)
                                    <li><img src="{{asset($tool->image)}}" alt="{{$tool->title}} logo">{{$tool->title}}</li>
                                @endforeach
                            </ul>
                            <a href="#" class="plans__block-view">View All Features <img src="../../img/icons/info.svg" alt="check"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <h3 class="content__block-title">Individual Tools</h3>

        <div class="plans">
            <div class="row">
                @foreach($tools as $tool)
                    <div class="col-md-3">
                        <div class="plans__block">
                            <div class="plans__block-img">
                                <img src="{{asset($tool['image'])}}" alt="plan-img">
                            </div>
                            <p class="plans__block-title">{{$tool['title']}}</p>
                            <p class="plans__block-price"><span>{{$tool['currency_symbol']}}{{$tool['price']}}</span>/mo</p>
                            @php
                                $isInCart = collect(session('cart'))->contains(function ($item) use ($tool) {
                                    return $item['product_id'] === $tool['product_id'];
                                });
                            @endphp
                            
                            @if ($isInCart)
                                <a href="{{route('summaryOrder')}}" class="plans__block-btn">Go to the cart</a>
                            @else
                                <form action="{{ route('cart.add') }}" method="POST" x-data="{ submitted: false }" @submit="submitted = true">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{$tool['product_id']}}">
                                    <input type="hidden" name="productType" value="{{'Tool'}}">
                                    <button  type="submit" class="plans__block-btn" :disabled="submitted">Add to cart</button>
                                </form>
                            @endif
                            <a href="#" class="plans__block-view">View All Features <img src="{{asset('/img/icons/info.svg')}}" alt="check"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="modal-overlay"></div>
        <div class="modal">
            <h3 class="modal__title">Detailed information <span>Basic Plan</span></h3>
            <h4 class="modal__subtitle">Advantages of this plan</h4>
            <h5 class="modal__descr">You save more than $50 by getting access to 6 tools and unlimited use for a whole month.</h5>
            <table>
                <tr>
                <th>Tools will be available to you</th>
                <th>Available plan</th>
                <th>Limits</th>
                </tr>
                <tr>
                <td>canva.com</td>
                <td>Pro Plan</td>
                <td>No Limits On Usage</td>
                </tr>
                <tr>
                <td>grammarly.com</td>
                <td>Premium Plan</td>
                <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>moz.com</td>
                    <td>Pro Plan </td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>semrush.com</td>
                    <td>Guru Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>ubersuggest.com</td>
                    <td>Agency Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>wordai.com</td>
                    <td>Paid Version 5</td>
                    <td>No Limits On Usage</td>
                </tr>
            </table>
            <div class="modal__price">
                <p class="modal__price-text">Monthly subscription price</p>
                <p class="modal__price-value">
                    <span>$10</span>/mo
                </p>
            </div>
            <div class="modal__btns">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal__btn blue">Choose</div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal__btn modal-close">Close</div>
                    </div>
                </div>
            </div>
            <a href="#" class="modal__link">Familiarize yourself with the rules for using the platform</a>
        </div>
        <div class="modal">
            <h3 class="modal__title">Detailed information<span>Medium Plan</span></h3>
            <h4 class="modal__subtitle">Advantages of this plan</h4>
            <h5 class="modal__descr">You save more than $50 by getting access to 6 tools and unlimited use for a whole month.</h5>
            <table>
                <tr>
                <th>Tools will be available to you</th>
                <th>Available plan</th>
                <th>Limits</th>
                </tr>
                <tr>
                <td>buzzsumo.com</td>
                <td>Pro Plan</td>
                <td>No Limits On Usage</td>
                </tr>
                <tr>
                <td>Spyfu.com</td>
                <td>Premium Plan</td>
                <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Canva.com</td>
                    <td>Pro Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>grammarly.com </td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>spamzilla.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Moz.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Quillbot.com </td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Majestic.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>semrush.com</td>
                    <td>Guru Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Ubersuggest.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>wordai.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
            </table>
            <div class="modal__price">
                <p class="modal__price-text">Monthly subscription price</p>
                <p class="modal__price-value">
                    <span>$15</span>/mo
                </p>
            </div>
            <div class="modal__btns">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal__btn blue">Choose</div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal__btn modal-close">Close</div>
                    </div>
                </div>
            </div>
            <a href="#" class="modal__link">Familiarize yourself with the rules for using the platform</a>
        </div>
        <div class="modal">
            <h3 class="modal__title">Detailed information<span>Elite Plan</span></h3>
            <h4 class="modal__subtitle">Advantages of this plan</h4>
            <h5 class="modal__descr">You save more than $50 by getting access to 6 tools and unlimited use for a whole month.</h5>
            <table>
                <tr>
                <th>Tools will be available to you</th>
                <th>Available plan</th>
                <th>Limits</th>
                </tr>
                <tr>
                <td>ahrefs.com</td>
                <td>Pro Plan</td>
                <td>30 Reports Per day, 10k Rows Export</td>
                </tr>
                <tr>
                <td>articleforge.com</td>
                <td>Premium Plan</td>
                <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>chat.openai.com</td>
                    <td>Pro Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>elements.envato.com</td>
                    <td>-</td>
                    <td>20 downloads Per day</td>
                </tr>
                <tr>
                    <td>freepik.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>helium10.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>indexification.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>instatext.io</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>junglescout.com</td>
                    <td>Guru Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>keepa.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>keywordtool.io</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>majestic.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>midjourney.com</td>
                    <td>-</td>
                    <td>50 Fast Generations Per day</td>
                </tr>
                <tr>
                    <td>murf.ai</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>pictory.ai</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>quillbot.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Semrush.com</td>
                    <td>Trends Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>semrush.com</td>
                    <td>Guru Plan</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>woorank.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>writesonic.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
            </table>
            <div class="modal__price">
                <p class="modal__price-text">Monthly subscription price</p>
                <p class="modal__price-value">
                    <span>$30</span>/mo
                </p>
            </div>
            <div class="modal__btns">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal__btn blue">Choose</div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal__btn modal-close">Close</div>
                    </div>
                </div>
            </div>
            <a href="#" class="modal__link">Familiarize yourself with the rules for using the platform</a>
        </div>
        <div class="modal">
            <h3 class="modal__title">Detailed information<span>Mega Plan</span></h3>
            <h4 class="modal__subtitle">Advantages of this plan</h4>
            <h5 class="modal__descr">You save more than $50 by getting access to 6 tools and unlimited use for a whole month.</h5>
            <table>
                <tr>
                    <th>Tools will be available to you</th>
                    <th>Available plan</th>
                    <th>Limits</th>
                </tr>
                <tr>
                    <td>ahrefs.com</td>
                    <td>Pro Plan</td>
                    <td>30 Reports Per day, 10k Rows Export</td>
                </tr>
                <tr>
                    <td>adspy.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>buzzsumo.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>canva.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>chat.openai.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>elements.envato.com</td>
                    <td>-</td>
                    <td>20 downloads Per day</td>
                </tr>
                <tr>
                    <td>freepik.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>helium10.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>indexification.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>instatext.io</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>junglescout.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>keepa.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>keywordtool.io</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>Mangools</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>majestic.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>midjourney.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>murf.ai</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>pickmonkey.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>pictory.ai</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>quillbot.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>SEMRush.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>serpstat.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>similarweb.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>skillshare.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>spamzilla.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>storyblocks.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>vistacreate.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>wordai.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>writesonic.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>ubersuggest.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
                <tr>
                    <td>zikanalytics.com</td>
                    <td>-</td>
                    <td>No Limits On Usage</td>
                </tr>
            </table>
            <div class="modal__price">
                <p class="modal__price-text">Monthly subscription price</p>
                <p class="modal__price-value">
                    <span>$49</span>/mo
                </p>
            </div>
            <div class="modal__btns">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal__btn blue">Choose</div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal__btn modal-close">Close</div>
                    </div>
                </div>
            </div>
            <a href="#" class="modal__link">Familiarize yourself with the rules for using the platform</a>
        </div>
    </div>
