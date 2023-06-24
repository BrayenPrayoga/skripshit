@extends('template.main')

@section ('css')
    <style>
        .hidden{
            display: none;
        }
    </style>
@endsection

@section ('content')
<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Data List Tiket
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#tambah-modal">Tambah</button>
            <div class="dropdown" style="display:none;">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-x-auto">
            @if (count($errors) > 0)
                <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert">
                    @foreach ($errors->all() as $error)
                    <i data-lucide="alert-circle" class="w-6 h-6 mr-2"></i> {{ $error }}
                    <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                    @endforeach
                </div>
            @endif
            <table class="table table-responsive" id="table-tiket" width="100%">
                <thead class="table-dark">
                    <tr>
                        <th class="whitespace-nowrap">No.</th>
                        @if(Auth::guard('users')->user()->role == 2)
                        <th class="whitespace-nowrap">Nama</th>
                        @endif
                        <th class="whitespace-nowrap">Transaksi Customer</th>
                        <th class="whitespace-nowrap">TT FLP</th>
                        <th class="whitespace-nowrap">Area</th>
                        <th class="whitespace-nowrap">Span Problem</th>
                        <th class="whitespace-nowrap">Ring</th>
                        <th class="whitespace-nowrap">CID</th>
                        <th class="whitespace-nowrap hidden">Span Length</th>
                        <th class="whitespace-nowrap hidden">Issue Category</th>
                        <th class="whitespace-nowrap hidden">Down Time</th>
                        <th class="whitespace-nowrap hidden">Clear Time</th>
                        <th class="whitespace-nowrap hidden">Duration</th>
                        <th class="whitespace-nowrap hidden">Root Cause</th>
                        <th class="whitespace-nowrap hidden">Problem Location</th>
                        <th class="whitespace-nowrap hidden">Vendor</th>
                        <th class="whitespace-nowrap hidden">Note</th>
                        <th class="whitespace-nowrap">Status</th>
                        <th class="whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tiket as $val)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        @if(Auth::guard('users')->user()->role == 2)
                        <td>{{ $val->Users->name }}</td>
                        @endif
                        <td>{{ $val->MasterTransaksiCustomer->nama }}</td>
                        <td>{{ $val->TT_FLP }}</td>
                        <td>{{ $val->MasterArea->nama }}</td>
                        <td>{{ $val->span_problem }}</td>
                        <td>{{ $val->ring }}</td>
                        <td>{{ $val->CID }}</td>
                        <td class="hidden">{{ $val->span_length }}</td>
                        <td class="hidden">{{ $val->MasterCategory->nama }}</td>
                        <td class="hidden">{{ $val->down_time }}</td>
                        <td class="hidden">{{ $val->clear_time }}</td>
                        <td class="hidden">{{ $val->duration }}</td>
                        <td class="hidden">{{ $val->root_cause }}</td>
                        <td class="hidden">{{ $val->problem_location }}</td>
                        <td class="hidden">{{ $val->MasterVendor->nama }}</td>
                        <td class="hidden">{{ $val->note }}</td>
                        <td>
                            @if($val->status == 1)
                            <span class="text-xs px-1 rounded-full bg-warning text-white mr-1">{{ $val->MasterStatusTiket->nama }}</span>
                            @else
                            <span class="text-xs px-1 rounded-full bg-success text-white mr-1">{{ $val->MasterStatusTiket->nama }}</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-tw-toggle="modal" data-tw-target="#view-modal" onclick="ViewData(this)" data-item="{{ $val }}"><i data-lucide="eye" class="w-4 h-4"></i></button>
                            @if(Auth::guard('users')->user()->role == 1 && $val->status == 1)
                            <button class="btn btn-sm btn-primary" data-tw-toggle="modal" data-tw-target="#update-modal" onclick="updateData(this)" data-item="{{ $val }}"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="btn btn-sm btn-danger" data-tw-toggle="modal" data-tw-target="#delete-modal" onclick="DeleteData({{ $val->id }})"><i data-lucide="trash" class="w-4 h-4"></i></button>
                            @endif
                            @if(Auth::guard('users')->user()->role == 2 && $val->status == 1)
                            <button class="btn btn-sm btn-primary" data-tw-toggle="modal" data-tw-target="#update-status-modal" onclick="updateStatusData(this)" data-item="{{ $val }}"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    
    <!-- BEGIN: Tambah Modal -->
    <div id="tambah-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Tambah Tiket</h2>
                </div>
                @if(Auth::guard('users')->user()->role == 1)
                <form method="POST" action="{{ route('helpdesk.tiket.simpan') }}">
                @else
                <form method="POST" action="{{ route('pic.tiket.simpan') }}">
                @endif
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">TR CUSTOMER</label>
                            <select class="form-select" name="id_master_transaksi_customer" required>
                                <option value="" selected>--PILIH TR CUSTOMER--</option>
                                @foreach($master_tr_customer as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-2" class="form-label">TT FLP</label>
                            <input type="number" class="form-control" name="TT_FLP" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Area</label>
                            <select class="form-select" name="id_master_area" required>
                                <option value="" selected>--PILIH AREA--</option>
                                @foreach($master_area as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-4" class="form-label">Span Problem</label>
                            <input type="text" class="form-control" name="span_problem" placeholder="..." required> </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ring</label>
                            <input type="number" class="form-control" name="ring" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">CID</label>
                            <input type="text" class="form-control" name="CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Span Length</label>
                            <input type="text" class="form-control" name="span_length" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Issue Category</label>
                            <select class="form-select" name="id_master_category" required>
                                <option value="" selected>--PILIH ISSUE CATEGORY--</option>
                                @foreach($master_category as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Down Time</label>
                            <input type="text" class="form-control" name="down_time" id="down_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Clear Time</label>
                            <input type="text" class="form-control" name="clear_time" id="clear_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Duration</label>
                            <input type="number" class="form-control" name="duration" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Root Cause</label>
                            <input type="text" class="form-control" name="root_cause" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Problem Location</label>
                            <input type="text" class="form-control" name="problem_location" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Vendor</label>
                            <select class="form-select" name="id_master_vendor" required>
                                <option value="" selected>--PILIH VENDOR--</option>
                                @foreach($master_vendor as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Note</label>
                            <textarea type="text" rows="5" class="form-control" name="note" placeholder="..." required></textarea>
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
    <!-- END: Tambah Modal -->

    <!-- BEGIN: Update Modal -->
    <div id="update-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Update Tiket</h2>
                </div>
                <form method="POST" action="{{ route('helpdesk.tiket.update') }}">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="e_id">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">TR CUSTOMER</label>
                            <select class="form-select" name="id_master_transaksi_customer" id="e_id_master_transaksi_customer" required>
                                <option value="" selected>--PILIH TR CUSTOMER--</option>
                                @foreach($master_tr_customer as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-2" class="form-label">TT FLP</label>
                            <input type="number" class="form-control" name="TT_FLP" id="e_TT_FLP" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Area</label>
                            <select class="form-select" name="id_master_area" id="e_id_master_area" required>
                                <option value="" selected>--PILIH AREA--</option>
                                @foreach($master_area as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-4" class="form-label">Span Problem</label>
                            <input type="text" class="form-control" name="span_problem" id="e_span_problem" placeholder="..." required> </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ring</label>
                            <input type="number" class="form-control" name="ring" id="e_ring" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">CID</label>
                            <input type="text" class="form-control" name="CID" id="e_CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Span Length</label>
                            <input type="text" class="form-control" name="span_length" id="e_span_length" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Issue Category</label>
                            <select class="form-select" name="id_master_category" id="e_id_master_category" required>
                                <option value="" selected>--PILIH ISSUE CATEGORY--</option>
                                @foreach($master_category as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Down Time</label>
                            <input type="text" class="form-control" name="down_time" id="e_down_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Clear Time</label>
                            <input type="text" class="form-control" name="clear_time" id="e_clear_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Duration</label>
                            <input type="number" class="form-control" name="duration" id="e_duration" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Root Cause</label>
                            <input type="text" class="form-control" name="root_cause" id="e_root_cause" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Problem Location</label>
                            <input type="text" class="form-control" name="problem_location" id="e_problem_location" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Vendor</label>
                            <select class="form-select" name="id_master_vendor" id="e_id_master_vendor" required>
                                <option value="" selected>--PILIH VENDOR--</option>
                                @foreach($master_vendor as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Note</label>
                            <textarea type="text" rows="5" class="form-control" name="note" id="e_note" placeholder="..." required></textarea>
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
    <!-- END: Update Modal -->
    
    
    <!-- BEGIN: Update Status Modal -->
    <div id="update-status-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">View Tiket</h2>
                </div>
                <form method="POST" action="{{ route('pic.tiket.update.status') }}">
                    <div class="modal-body grid gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="e_status_id">
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">TR CUSTOMER</label>
                            <label id="e_status_id_master_transaksi_customer"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">TT FLP</label>
                            <label id="e_status_TT_FLP"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Area</label>
                            <label id="e_status_id_master_area"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Span Problem</label>
                            <label id="e_status_span_problem"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Ring</label>
                            <label id="e_status_ring"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">CID</label>
                            <label id="e_status_CID"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Span Length</label>
                            <label id="e_status_span_length"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Issue Category</label>
                            <label id="e_status_id_master_category"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Down Time</label>
                            <label id="e_status_down_time"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Clear Time</label>
                            <label id="e_status_clear_time"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Duration</label>
                            <label id="e_status_duration"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Root Cause</label>
                            <label id="e_status_root_cause"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Problem Location</label>
                            <label id="e_status_problem_location"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Vendor</label>
                            <label id="e_status_id_master_vendor"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Note</label>
                            <label id="e_status_note"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Status</label>
                            <select class="form-select" name="id_master_status" id="e_status_id_master_status" required>
                                @foreach($master_status as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
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
    <!-- END: Update Status Modal -->

    <!-- BEGIN: View Modal -->
    <div id="view-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">View Tiket</h2>
                </div>
                <form method="POST">
                    <div class="modal-body grid gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">TR CUSTOMER</label>
                            <label id="v_id_master_transaksi_customer"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">TT FLP</label>
                            <label id="v_TT_FLP"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Area</label>
                            <label id="v_id_master_area"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Span Problem</label>
                            <label id="v_span_problem"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Ring</label>
                            <label id="v_ring"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">CID</label>
                            <label id="v_CID"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Span Length</label>
                            <label id="v_span_length"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Issue Category</label>
                            <label id="v_id_master_category"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Down Time</label>
                            <label id="v_down_time"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Clear Time</label>
                            <label id="v_clear_time"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Duration</label>
                            <label id="v_duration"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Root Cause</label>
                            <label id="v_root_cause"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Problem Location</label>
                            <label id="v_problem_location"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Vendor</label>
                            <label id="v_id_master_vendor"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Note</label>
                            <label id="v_note"></label>
                        </div>
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Status</label>
                            <label id="v_status"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: View Modal -->
    
    <!-- BEGIN: Delete Modal -->
    <div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('helpdesk.tiket.delete') }}">
                    {{ csrf_field() }}
                    <div class="modal-body p-0">
                        <input type="hidden" name="id" id="id_delete">
                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete these records? <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Delete Modal -->

</div>
<!-- END: Content -->
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        $('#table-tiket').DataTable();

        flatpickr("#down_time", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#clear_time", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#e_down_time", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#e_clear_time", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });
    });

    function updateData(obj){
        var item = $(obj).data('item');

        $('#e_id').val(item.id);
        $('#e_id_master_transaksi_customer').val(item.id_master_transaksi_customer);
        $('#e_TT_FLP').val(item.TT_FLP);
        $('#e_id_master_area').val(item.id_master_area);
        $('#e_span_problem').val(item.span_problem);
        $('#e_ring').val(item.ring);
        $('#e_CID').val(item.CID);
        $('#e_span_length').val(item.span_length);
        $('#e_id_master_category').val(item.id_master_category);
        $('#e_down_time').val(item.down_time);
        $('#e_clear_time').val(item.clear_time);
        $('#e_duration').val(item.duration);
        $('#e_root_cause').val(item.root_cause);
        $('#e_problem_location').val(item.problem_location);
        $('#e_id_master_vendor').val(item.id_master_vendor);
        $('#e_note').val(item.note);
    }

    function updateStatusData(obj){
        var item = $(obj).data('item');

        $('#e_status_id').val(item.id);
        $('#e_status_id_master_status').val(item.status);
        
        $('#e_status_id_master_transaksi_customer').text(': '+item.master_transaksi_customer.nama);
        $('#e_status_TT_FLP').text(': '+item.TT_FLP);
        $('#e_status_id_master_area').text(': '+item.master_area.nama);
        $('#e_status_span_problem').text(': '+item.span_problem);
        $('#e_status_ring').text(': '+item.ring);
        $('#e_status_CID').text(': '+item.CID);
        $('#e_status_span_length').text(': '+item.span_length);
        $('#e_status_id_master_category').text(': '+item.master_category.nama);
        $('#e_status_down_time').text(': '+item.down_time);
        $('#e_status_clear_time').text(': '+item.clear_time);
        $('#e_status_duration').text(': '+item.duration);
        $('#e_status_root_cause').text(': '+item.root_cause);
        $('#e_status_problem_location').text(': '+item.problem_location);
        $('#e_status_id_master_vendor').text(': '+item.master_vendor.nama);
        $('#e_status_note').text(': '+item.note);
    }

    function ViewData(obj){
        var item = $(obj).data('item');

        $('#v_id_master_transaksi_customer').text(': '+item.master_transaksi_customer.nama);
        $('#v_TT_FLP').text(': '+item.TT_FLP);
        $('#v_id_master_area').text(': '+item.master_area.nama);
        $('#v_span_problem').text(': '+item.span_problem);
        $('#v_ring').text(': '+item.ring);
        $('#v_CID').text(': '+item.CID);
        $('#v_span_length').text(': '+item.span_length);
        $('#v_id_master_category').text(': '+item.master_category.nama);
        $('#v_down_time').text(': '+item.down_time);
        $('#v_clear_time').text(': '+item.clear_time);
        $('#v_duration').text(': '+item.duration);
        $('#v_root_cause').text(': '+item.root_cause);
        $('#v_problem_location').text(': '+item.problem_location);
        $('#v_id_master_vendor').text(': '+item.master_vendor.nama);
        $('#v_note').text(': '+item.note);
        $('#v_status').text(': '+item.master_status_tiket.nama);
    }
    
    function DeleteData(id){
        $('#id_delete').val(id);
    }
</script>
@endsection