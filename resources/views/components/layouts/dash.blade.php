<x-layouts.app :title="$title">
    <main class="dashboard">
        <div class="sidenav">
            <div class="sidenav__menu">
                <div class="sidenav__menu-logo">
                    <img src="{{asset('img/icons/internet.svg')}}" alt="logo">
                </div>
                <a href="{{route('dashboard')}}">
                    <img src="{{asset('img/icons/dashboard.svg')}}" alt="icon">
                    Dashboard
                </a>
                <a href="{{route('plans')}}">
                    <img src="{{asset('img/icons/plans.svg')}}" alt="icon">
                    Plans
                </a>
                <a href="{{route('summaryOrder')}}">
                    <img src="{{asset('img/icons/order.svg')}}" alt="icon">
                    Summary Order 
                </a>
                <a href="{{route('support')}}">
                    <img src="{{asset('img/icons/support.svg')}}" alt="icon">
                    Support
                </a>
                <a href="{{route('blog')}}">
                    <img src="{{asset('img/icons/blog.svg')}}" alt="icon">
                    Blog
                </a>
            </div>
    
            <div class="sidenav__contacts">
                <p class="sidenav__contacts-title">
                    Email communication
                </p>
                <p class="sidenav__contacts-subtitle">
                    mail@mail.com
                </p>
                <div class="sidenav__contacts-links">
                    <a href="#"><img src="{{asset('img/icons/contacts1.svg')}}" alt="contacts img"></a>
                    <a href="#"><img src="{{asset('img/icons/contacts2.svg')}}" alt="contacts img"></a>
                    <a href="#"><img src="{{asset('img/icons/contacts3.svg')}}" alt="contacts img"></a>
                </div>
            </div>
    
            <div class="sidenav__settings">
                <p class="sidenav__settings-email">
                    <img src="../../img/icons/avatar.svg" alt="avatar">
                    {{auth()->user()->email}}
                </p>
                <a href="{{route('user.profile')}}" class="sidenav__settings-btn">Account settings</a>
                <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="sidenav__settings-logout">
                        <img src="{{asset('img/icons/logout.svg')}}" alt="logout">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    
        
        {{$slot}}

    </main>
</x-layouts.app>