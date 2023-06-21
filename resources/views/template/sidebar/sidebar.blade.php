<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        {{-- <li>
            <a href="javascript:;.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="side-menu-light-dashboard-overview-1.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li>
            <a href="{{ route('dashboard.index') }}" class="side-menu @if(Request::segment(1) == 'dashboard') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        @if(Auth::guard('users')->user()->role == 1)
        <li>
            <a href="{{ route('helpdesk.tiket.index') }}" class="side-menu @if(Request::segment(1) == 'helpdesk-tiket') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Tiket </div>
            </a>
        </li>
        @elseif(Auth::guard('users')->user()->role == 2)
        {{-- <li>
            <a href="#" class="side-menu @if(Request::segment(1) == 'master-area') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Master
                    <div class="side-menu__sub-icon"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="" style="display: none;">
                <li>
                    <a href="#" class="side-menu @if(Request::segment(1) == 'master-area') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master Area </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu @if(Request::segment(1) == 'master-category') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master Category </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu @if(Request::segment(1) == 'master-status') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master Status </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu @if(Request::segment(1) == 'master-tr-customer') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master TR Customer </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu @if(Request::segment(1) == 'master-vendor') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master Vendor </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu @if(Request::segment(1) == 'master-fo-cut') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master FO CUT </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="side-menu" @if(Request::segment(1) == 'master-type-kabel') side-menu--active @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Master Type Kabel </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li>
            <a href="{{ route('pic.tiket.index') }}" class="side-menu @if(Request::segment(1) == 'pic-tiket') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Tiket </div>
            </a>
        </li>
        <li>
            <a href="{{ route('pic.laporan.weekly.index') }}" class="side-menu @if(Request::segment(1) == 'pic-laporan-weekly') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Laporan Weekly </div>
            </a>
        </li>
        @elseif(Auth::guard('users')->user()->role == 3)
        <li>
            <a href="{{ route('maintenance.laporan.kegiatan.index') }}" class="side-menu @if(Request::segment(1) == 'maintenance-laporan-kegiatan') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Laporan Kegiatan </div>
            </a>
        </li>
        @elseif(Auth::guard('users')->user()->role == 4)
        <li>
            <a href="{{ route('manager.laporan.weekly.index') }}" class="side-menu @if(Request::segment(1) == 'manager-laporan-weekly') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Laporan Weekly </div>
            </a>
        </li>
        <li>
            <a href="{{ route('manager.laporan.kegiatan.index') }}" class="side-menu @if(Request::segment(1) == 'manager-laporan-kegiatan') side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Laporan Kegiatan </div>
            </a>
        </li>
        @endif
    </ul>
</nav>
<!-- END: Side Menu -->