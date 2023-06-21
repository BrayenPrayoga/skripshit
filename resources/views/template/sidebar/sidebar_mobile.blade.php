<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('image/logo.svg') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            {{-- <li>
                <a href="javascript:;.html" class="menu menu--active">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard <i data-lucide="chevron-down"
                            class="menu__sub-icon transform rotate-180"></i> </div>
                </a>
                <ul class="menu__sub-open">
                    <li>
                        <a href="side-menu-light-dashboard-overview-1.html" class="menu menu--active">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 1 </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 2 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 3 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-4.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 4 </div>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li>
                <a href="href="{{ route('dashboard.index') }}"" class="menu @if(Request::segment(1) == 'dashboard') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>
            @if(Auth::guard('users')->user()->role == 1)
            <li>
                <a href="{{ route('helpdesk.tiket.index') }}" class="menu @if(Request::segment(1) == 'helpdesk-tiket') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Tiket </div>
                </a>
            </li>
            @elseif(Auth::guard('users')->user()->role == 2)
            <li>
                <a href="{{ route('pic.tiket.index') }}" class="menu @if(Request::segment(1) == 'pic-tiket') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Tiket </div>
                </a>
            </li>
            <li>
                <a href="{{ route('pic.laporan.weekly.index') }}" class="menu @if(Request::segment(1) == 'pic-laporan-weekly') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Laporan Weekly </div>
                </a>
            </li>
            @elseif(Auth::guard('users')->user()->role == 3)
            <li>
                <a href="{{ route('maintenance.laporan.kegiatan.index') }}" class="menu @if(Request::segment(1) == 'maintenance-laporan-kegiatan') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Laporan Kegiatan </div>
                </a>
            </li>
            @elseif(Auth::guard('users')->user()->role == 4)
            <li>
                <a href="{{ route('manager.laporan.weekly.index') }}" class="menu @if(Request::segment(1) == 'manager-laporan-weekly') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Laporan Weekly </div>
                </a>
            </li>
            <li>
                <a href="{{ route('manager.laporan.kegiatan.index') }}" class="menu @if(Request::segment(1) == 'manager-laporan-kegiatan') menu--active @endif">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Laporan Kegiatan </div>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- END: Mobile Menu -->