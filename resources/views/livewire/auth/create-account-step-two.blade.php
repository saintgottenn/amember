<form action="{{route('auth.register')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="wrapper__block">
                <div class="wrapper__block-text">
                    <p class="wrapper__block-title">Choose Your Invoicing Choise</p>
                    <p class="wrapper__block-subtitle">Select Individual Plans or Opt for Our Bundle Offers.</p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper__block">
                        <div class="wrapper__block-input {{$errors->has('first_name') ? 'error' : ''}}">
                            <label for="first_name">First Name<span>*</span></label>
                            <input id="first_name" name="first_name" placeholder="First Name" type="text" value="{{old('first_name')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper__block">
                        <div class="wrapper__block-input {{$errors->has('last_name') ? 'error' : ''}}">
                            <label for="last_name">Last Name<span>*</span></label>
                            <input id="last_name" name="last_name" placeholder="Last Name" type="text" value="{{old('last_name')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper__block">
                        <div class="wrapper__block-input {{$errors->has('name') ? 'error' : ''}}">
                            <label for="username">Username<span>*</span></label>
                            <input id="username" name="name" placeholder="Username(should be unique)" type="text" value="{{old('name')}}" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper__block">
                        <div class="wrapper__block-input {{$errors->has('email') ? 'error' : ''}}">
                            <label for="email">Email<span>*</span></label>
                            <input id="email" name="email" placeholder="Email" type="email" value="{{old('email')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper__block">
                        <div class="wrapper__block-input {{$errors->has('phone_number') ? 'error' : ''}}">
                            <label for="phone_number">Phone Number<span>*</span></label>
                            <input id="phone_number" name="phone_number" placeholder="Phone Number" type="tel" value="{{old('phone_number')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper__block">
                        <div class="wrapper__block-input {{$errors->has('password') ? 'error' : ''}}">
                            <label for="password">Password<span>*</span></label>
                            <input id="password" name="password" class="password" placeholder="Password" type="password" autocomplete="off" value="{{old('password')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                <g clip-path="url(#clip0_23_2449)">
                                <path d="M5.99981 4.12402C4.68985 4.12402 3.62402 5.18985 3.62402 6.49981C3.62402 7.80978 4.68985 8.8756 5.99981 8.8756C7.30978 8.8756 8.3756 7.80978 8.3756 6.49981C8.3756 5.18985 7.30978 4.12402 5.99981 4.12402ZM5.99981 8.0756C5.13086 8.0756 4.42403 7.36876 4.42403 6.49981C4.42403 5.63086 5.13086 4.92403 5.99981 4.92403C6.86876 4.92403 7.5756 5.63086 7.5756 6.49981C7.5756 7.36876 6.86876 8.0756 5.99981 8.0756Z" fill="#131313"></path>
                                <path d="M6 2.5625C3.46503 2.5625 1.12498 4.04161 0.0386475 6.33087C-0.012915 6.43967 -0.012915 6.56584 0.0388425 6.67443C1.12869 8.96077 3.46854 10.4379 6 10.4379C8.53146 10.4379 10.8713 8.96076 11.9612 6.67443C12.0129 6.56583 12.0129 6.43966 11.9614 6.33087C10.875 4.0416 8.53497 2.5625 6 2.5625ZM6 9.63792C3.83945 9.63792 1.83748 8.41311 0.846465 6.50197C1.83455 4.58848 3.83632 3.3625 6 3.3625C8.16368 3.3625 10.1654 4.58848 11.1535 6.50197C10.1625 8.41311 8.16055 9.63792 6 9.63792Z" fill="#131313"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0_23_2449">
                                <rect width="12" height="12" fill="white" transform="translate(0 0.5)"></rect>
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
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
    </div>

    <div class="checkbox-block {{$errors->has('highload') ? 'error' : ''}}">
        <input id="highload0" name="highload" class="checkbox-custom" type="checkbox" {{ old('highload') ? 'checked' : '' }}>
        <label for="highload0" class="checkbox-custom-label">I have read and agree to Bundledseo's Terms and Conditions.</label>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="form-btn full">
                Next
            </button>
        </div>
    </div>
    <p class="login">
        Already have an account?
        <a href="{{route('auth.showLogin')}}">Login</a>
    </p>
</form>
