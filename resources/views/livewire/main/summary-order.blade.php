<section class="content container">
    <h1 class="content__title"> Cart </h1>
    <h2 class="content__subtitle"> Items count: <span>{{count($items)}}</span></h2>

    <div class="summary">
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4" style="margin-top: 40px;">
                    <div class="summary__block">
                        <div class="summary__block-img">
                            @if ($item['product']['image'])
                                <img src="{{asset($item['product']['image'])}}" alt="logo">
                            @endif
                        </div>
                        <div class="summary__block-title">
                            {{$item['product']['title']}}
                            <form action="{{route('cart.remove')}}" method="POST">
                                @csrf
                                <input type="hidden" name="productId" value="{{$item['product_id']}}">
                                <button type="submit">
                                    <img src="{{asset('img/icons/delete.svg')}}" alt="delete">
                                </button>
                            </form>
                        </div>
                        <div class="summary__block-value">
                            $<span class="value">{{$item['product']['price']}}</span>
                            <span class="summary__block-value-gray">/mo</span>
                        </div>
                        <div class="summery__block-wrapper">
                            <div class="summery__block-counter">
                                <div class="summary__block-counter-btn summary-minus">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="1" width="19" height="19" rx="9.5" stroke="#131313"/>
                                        <path d="M4.66732 10.5007L15.334 10.5007" stroke="#131313" stroke-width="0.999258" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <span>1</span>
                                <div class="summary__block-counter-btn summary-plus">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="1" width="19" height="19" rx="9.5" stroke="#131313"/>
                                        <path d="M15.2887 10.5016H4.71289" stroke="#131313" stroke-width="0.999258" stroke-linecap="round"/>
                                        <path d="M10.0003 5.21418V15.79" stroke="#131313" stroke-width="0.999258" stroke-linecap="round"/>
                                    </svg>    
                                </div>
                            </div>
                            <div class="summery__block-result">$<span>{{$item['product']['price']}}</span></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <p class="summary__values total">Total item<br><br><span class="value">0</span></p>
            </div>
            <div class="col-md-4">
                <p class="summary__values subtotal">Subtotal<br><br><span class="value">0</span><span>$</span></p>
            </div>
            <div class="col-md-4">
                <p class="summary__values order-total">Order total<br><br><span class="value">0</span><span>$</span></p>
            </div>
        </div>

        @if(count($items))
            <h3 style="margin-top: 40px;">Pay via</h3>
            <form action="{{route('payment.razorpay')}}" method="POST">
                @csrf
                <button type="submit" class="summary__btn">
                    <img src="{{asset('img/payment/Razorpay.png')}}" style="width: 110px;">
                </button>
            </form>
        @endif
    </div>
</section>

@if (session('razorpay_subscription'))
    @pushOnce('scripts')
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            const options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "subscription_id": "{{ session('razorpay_subscription')->id }}", 
                "name": "{{ env('APP_NAME') }}", 
                "description": "Monthly Subscription", 
            };

            const rzp1 = new Razorpay(options);

            rzp1.open();
        </script>
    @endPushOnce
@endif
