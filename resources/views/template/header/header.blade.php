<!-- BEGIN: Top Bar -->
<div
    class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('image/logo.svg') }}">
            <span class="text-white text-lg ml-3">  </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Request::segment(1); }}</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        @if(Auth::guard('users')->user()->role == 2 || Auth::guard('users')->user()->role == 4)
        <!-- BEGIN: Notifications -->
        @php
            $countNotifikasi = getNotifikasi('count');
            $getNotifikasi = getNotifikasi('get');
        @endphp
        <div class="intro-x dropdown mr-4 sm:mr-6">
            <div class="dropdown-toggle notification @if($countNotifikasi > 0) notification--bullet @endif cursor-pointer" role="button"
                aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell"
                    class="notification__icon dark:text-slate-500"></i> </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-content">
                    <div class="notification-content__title">Notifications</div>
                    @foreach($getNotifikasi as $key=>$item)
                    <div class="cursor-pointer relative flex items-center @if($key != 0) mt-5 @endif"
                    @if($item->status == 0 && Auth::guard('users')->user()->role == 2)
                    onclick="window.location='{{ url('pic-laporan-weekly?id='.$item->id) }}';"
                    @else
                    onclick="window.location='{{ url('manager-laporan-weekly?id='.$item->id) }}';"
                    @endif
                    >
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('image/profile-2.jpg') }}">
                            <div
                                class="w-3 h-3 @if($item->status == 0) bg-danger @else bg-success @endif absolute right-0 bottom-0 rounded-full border-2 border-white">
                            </div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">{{ ($item->id_dari == 0) ? 'System' : $item->Users->name }}</a>
                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ date("H:i", strtotime($item->created_at)) }}</div>
                            </div>
                            <div class="w-full truncate text-slate-500 mt-0.5">{{ $item->keterangan }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END: Notifications -->
        @endif
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <button type="button" class="btn btn-sm btn-danger" data-tw-toggle="modal" data-tw-target="#atp-modal">REMINDER ATP</button>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Midone - HTML Admin Template" src="{{ asset('image/profile-9.jpg') }}">
            </div>
            <div class="dropdown-menu w-56">
                <ul
                    class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ Auth::guard('users')->user()->name }}</div>
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ getRole(Auth::guard('users')->user()->role) }}</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    {{-- <li>
                        <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                class="w-4 h-4 mr-2"></i> Profile </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit"
                                class="w-4 h-4 mr-2"></i> Add Account </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock"
                                class="w-4 h-4 mr-2"></i> Reset Password </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                                class="w-4 h-4 mr-2"></i> Help </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li> --}}
                    <li>
                        <a href="{{ route('login.logout') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right"
                                class="w-4 h-4 mr-2"></i> Logout </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->

<!-- BEGIN: Reminder ATP Modal -->
<div id="atp-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Reminder ATP</h2>
            </div>
            <form method="POST" action="{{ route('reminder.simpan') }}">
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    {{ csrf_field() }}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-6" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal_atp" placeholder="..." required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-5" class="form-label">Noted</label>
                        <textarea rows="4" class="form-control" name="noted" id="noted" placeholder="..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Reminder ATP Modal -->