<form action="{{route('auth.businessPurchase')}}" method="POST" class="col-md-12">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('full_name') ? 'error' : ''}}">
                    <label for="full_name">Full Name<span>*</span></label>
                    <input id="full_name" name="full_name" placeholder="Full Name" type="text" value="{{old('full_name')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('vat_number') ? 'error' : ''}}">
                    <label for="vat_number">VAT Number<span>*</span></label>
                    <input id="vat_number" name="vat_number" placeholder="VAT Number" type="text" value="{{old('vat_number')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('company') ? 'error' : ''}}">
                    <label for="company">Company name<span>*</span></label>
                    <input id="company" name="company_name" placeholder="Company name" type="text" value="{{old('company_name')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('address') ? 'error' : ''}}">
                    <label for="address">Address<span>*</span></label>
                    <input id="address" name="address" placeholder="Address" type="text" value="{{old('address')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('town_city') ? 'error' : ''}}">
                    <label for="town_city">Town/City<span>*</span></label>
                    <input id="town_city" name="town_city" placeholder="Town/City" type="text" value="{{old('town_city')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('state_country') ? 'error' : ''}}">
                    <label for="state_country">State/County<span>*</span></label>
                    <input id="state_country" name="state_country" placeholder="State/County" type="text" value="{{old('state_country')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input {{$errors->has('postcode') ? 'error' : ''}}">
                    <label for="postcode">Postcode<span>*</span></label>
                    <input id="postcode" name="postcode" placeholder="Postcode" type="text" value="{{old('postcode')}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-input wrapper__block-select {{$errors->has('country') ? 'error' : ''}}">
                    <label for="country">Country<span>*</span></label>
                    <select id="country" name="country">
                        <option disabled selected>Country enter</option>
                        <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                        <option value="France" {{ old('country') == 'France' ? 'selected' : '' }}>France</option>
                        <option value="Italy" {{ old('country') == 'Italy' ? 'selected' : '' }}>Italy</option>
                        <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                        <option value="Mexico" {{ old('country') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="wrapper__block-drop">
            <p class="wrapper__block-title">Summary Order</p>
            <img src="../../img/icons/arrow.svg" class="arrow" alt="arrow">
        </div>
        <div class="wrapper__block-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper__block-content-title">
                        <img src="../../img/icons/plan.svg" alt="plan">
                        <p>Bundledseo’s Advance Plan</p>
                    </div>
                    <div class="wrapper__block-content-value">
                        <p>$<span class="result">30</span></p>
                        <div class="wrapper__block-content-counter">
                            <span class="value">1</span>
                            <div class="wrapper__block-content-btns">
                                <div class="plus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                        <path d="M12.5 8.3999L6.5 3.5999L0.5 8.3999" stroke="#131313" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="minus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                        <path d="M0.5 3.6001L6.5 8.4001L12.5 3.6001" stroke="#131313" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper__block-content-title">
                        <img src="../../img/icons/gramm.svg" alt="plan">
                        <p>Grammarly Individual Plan</p>
                    </div>
                    <div class="wrapper__block-content-value">
                        <p>$<span class="result">3</span></p>
                        <div class="wrapper__block-content-counter">
                            <span class="value">1</span>
                            <div class="wrapper__block-content-btns">
                                <div class="plus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                        <path d="M12.5 8.3999L6.5 3.5999L0.5 8.3999" stroke="#131313" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="minus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                        <path d="M0.5 3.6001L6.5 8.4001L12.5 3.6001" stroke="#131313" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="form-btn full" name="businessPurchase">
                Submit
            </button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="form-btn" name="continue">
                Continue
            </button>
        </div>
    </div>
</form>