@php
    $current_page = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="#" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('backend/images/logo.png')}}"
                     srcset="{{asset('backend/images/logo2x.png')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('backend/images/logo-dark.png')}}"
                     srcset="{{asset('backend/images/logo-dark.png')}}" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{asset('backend/images/logo-dark2x.png')}}"
                     srcset="{{asset('backend/images/logo-small.png')}}" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @role(['admin'])
                @foreach($admin_side_menu as $menu)
                        @if($menu->appeardChildren->count()  == 0)
                            <li class="nk-menu-item {{$menu->id == getParentShowOf($current_page) ? 'active current-page' : null}}">
                                <a href="{{route('admin.'.$menu->as)}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em
                                            class="{{$menu->icon != '' ? $menu->icon : ''}}"></em></span>
                                    <span class="nk-menu-text">{{$menu->display_name}}</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @else
                            <li class="nk-menu-item  {{in_array($menu->parent_show, [getParentShowOf($current_page),getParentOf($current_page)]) ? 'active current-page' : null}}">
                                <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em
                                            class="{{$menu->icon != '' ? $menu->icon : ''}}"></em></span>
                                    <span class="nk-menu-text">{{$menu->display_name}}</span>
                                </a>
                                @if($menu->appeardChildren && $menu->appeardChildren->count()  > 0 !== null)
                                    <ul class="nk-menu-sub">
                                        @foreach($menu->appeardChildren as $sub_menu)
                                            <li class="nk-menu-item ">
                                                <a href="{{route('admin.'.$sub_menu->as)}}" class="nk-menu-link"><span
                                                        class="nk-menu-text">{{$sub_menu->display_name}}</span></a>
                                            </li>
                                        @endforeach
                                    </ul><!-- .nk-menu-sub -->
                                @endif
                            </li>
                        @endif
                    @endforeach
                    @endrole

                    @role('supervisor')
                    @foreach($admin_side_menu as $menu)
                        @permission($menu->name)

                        @if($menu->appeardChildren->count()  == 0)
                            <li class="nk-menu-item {{$menu->id == getParentShowOf($current_page) ? 'active current-page' : null}}">
                                <a href="{{route('admin.'.$menu->as)}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em
                                            class="{{$menu->icon != '' ? $menu->icon : ''}}"></em></span>
                                    <span class="nk-menu-text">{{$menu->display_name}}</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @else
                            <li class="nk-menu-item  {{in_array($menu->parent_show, [getParentShowOf($current_page),getParentOf($current_page)]) ? 'active current-page' : null}}">
                                <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em
                                            class="{{$menu->icon != '' ? $menu->icon : ''}}"></em></span>
                                    <span class="nk-menu-text">{{$menu->display_name}}</span>
                                </a>
                                @if($menu->appeardChildren && $menu->appeardChildren->count()  > 0 !== null)
                                    <ul class="nk-menu-sub">
                                        @foreach($menu->appeardChildren as $sub_menu)
                                @permission($sub_menu->name)
                                            <li class="nk-menu-item ">
                                                <a href="{{route('admin.'.$sub_menu->as)}}" class="nk-menu-link"><span
                                                        class="nk-menu-text">{{$sub_menu->display_name}}</span></a>
                                            </li>
                                            @endpermission
                                        @endforeach
                                    </ul><!-- .nk-menu-sub -->
                                @endif
                            </li>
                        @endif
                        @endpermission
                    @endforeach
                    @endrole
                </ul><!-- .nk-menu -->

            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
