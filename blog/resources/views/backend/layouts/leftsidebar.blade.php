<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ url('backend/assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ url('backend/assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('index') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ url('backend/assets/images/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ url('backend/assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('leftsidebar.show_full_sidebar') }}">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{ url('backend/assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42"
                     class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">{{ auth()->user()->name ?? __('leftsidebar.guest_user') }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">{{ __('leftsidebar.navigation_title') }}</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" aria-expanded="false" class="side-nav-link">
                    <i class="ri-home-4-line"></i>
                    <span> {{ __('leftsidebar.dashboard') }} </span>
                </a>
            </li>

            <li class="side-nav-title">{{ __('leftsidebar.management_title') }}</li>

            <li class="side-nav-item">
                <a href="{{ route('posts.index') }}" aria-expanded="false" class="side-nav-link">
                    <i class="ri-file-list-3-line"></i>
                    <span> {{ __('leftsidebar.posts') }} </span>
                </a>
            </li>

            @if(auth()->user() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')))
                <li class="side-nav-item">
                    <a href="{{ route('tags.index') }}" aria-expanded="false" class="side-nav-link">
                        <i class="ri-price-tag-3-line"></i>
                        <span> {{ __('leftsidebar.tags') }} </span>
                    </a>
                </li>
            @endif

            <li class="side-nav-item">
                <a href="{{ route('backend.categories.index') }}" aria-expanded="false" class="side-nav-link">
                    <i class="ri-folder-4-line"></i>
                    <span> {{ __('leftsidebar.categories') }} </span>
                </a>
            </li>

            @if(auth()->user() && auth()->user()->hasRole('admin'))
                <li class="side-nav-item">
                    <a href="{{ route('users.index') }}" aria-expanded="false" class="side-nav-link">
                        <i class="ri-user-3-line"></i>
                        <span> {{ __('leftsidebar.user_management') }} </span>
                    </a>
                </li>
            @endif

        </ul>

        <div class="clearfix"></div>
    </div>
</div>
