
<section class="content container">
    <h1 class="content__title">Dashboard</h1>
    <h2 class="content__subtitle"> Your Current Plans and Invoices </h2>
    <h3 class="content__block-title">Package Plan</h3>
    @foreach ($packages as $package)
        <div class="content__block active">
            <div class="content__block-wrapper">
                <p class="content__block-subtitle">
                    {{-- <img src={{asset($package['product'])}} alt="img"> --}}
                    {{$package['product']['title']}}
                </p>
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
            
        </div>

    @endforeach
    <a href="{{route('plans')}}" class="content__explore">Explore Plans <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
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
        
        </div>
    @endforeach

    <a href="{{route('plans')}}" class="content__explore">Explore Plans <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
        <path d="M1 6.56392H9.44646" stroke="#0066FF" stroke-linecap="round"/>
        <path d="M7.75708 3.83691L10.291 6.56419L7.75708 9.29146" stroke="#0066FF" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</section>