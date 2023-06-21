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
        Data List Laporan Weekly
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @if(Auth::guard('users')->user()->role != 4)
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#tambah-modal">Tambah</button>
            @endif
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
            <table class="table table-responsive" id="table-person" width="100%">
                <thead class="table-dark">
                    <tr>
                        <th class="whitespace-nowrap">No.</th>
                        <th class="whitespace-nowrap">Nomer</th>
                        <th class="whitespace-nowrap">Date</th>
                        <th class="whitespace-nowrap">Week</th>
                        <th class="whitespace-nowrap">Area</th>
                        <th class="whitespace-nowrap">PIC Area</th>
                        <th class="whitespace-nowrap">TT Number</th>
                        {{-- <th class="whitespace-nowrap">Customer</th>
                        <th class="whitespace-nowrap">Segment ID</th>
                        <th class="whitespace-nowrap">CID</th>
                        <th class="whitespace-nowrap">TR ID</th>
                        <th class="whitespace-nowrap">Span</th> --}}
                        <th class="whitespace-nowrap">Status</th>
                        <th class="whitespace-nowrap">Status PIC</th>
                        <th class="whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($person_in_charge as $val)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $val->no }}</td>
                        <td>{{ tgl_indo($val->date) }}</td>
                        <td>{{ $val->week }}</td>
                        <td>{{ $val->area }}</td>
                        <td>{{ $val->area_pic }}</td>
                        <td>{{ $val->TT_NUMBER }}</td>
                        <td>
                            @if($val->status == 1)
                            <span class="text-xs px-1 rounded-full bg-warning text-white mr-1">{{ $val->MasterStatusTiket->nama }}</span>
                            @else
                            <span class="text-xs px-1 rounded-full bg-success text-white mr-1">{{ $val->MasterStatusTiket->nama }}</span>
                            @endif
                        </td>
                        <td>
                            @if($val->status_pic == 3)
                            <span class="text-xs px-1 rounded-full bg-warning text-white mr-1">{{ $val->MasterStatusTiketPIC->nama }}</span>
                            @elseif($val->status_pic == 4)
                            <span class="text-xs px-1 rounded-full bg-warning text-white mr-1">{{ $val->MasterStatusTiketPIC->nama }}</span>
                            @else
                            <span class="text-xs px-1 rounded-full bg-success text-white mr-1">{{ $val->MasterStatusTiketPIC->nama }}</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-tw-toggle="modal" data-tw-target="#view-modal" onclick="ViewData(this)" data-item="{{ $val }}"><i data-lucide="eye" class="w-4 h-4"></i></button>
                            <button class="btn btn-sm btn-dark" data-tw-toggle="modal" data-tw-target="#view-tiket-modal" onclick="ViewTiketData({{ $val->id }})"><i data-lucide="ticket" class="w-4 h-4"></i></button>
                            @if(Auth::guard('users')->user()->role != 4)
                            <button class="btn btn-sm btn-primary" data-tw-toggle="modal" data-tw-target="#update-modal" onclick="updateData(this)" data-item="{{ $val }}"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="btn btn-sm btn-danger" data-tw-toggle="modal" data-tw-target="#delete-modal" onclick="DeleteData({{ $val->id }})"><i data-lucide="trash" class="w-4 h-4"></i></button>
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
                    <h2 class="font-medium text-base mr-auto">Tambah Person In Charge</h2>
                </div>
                <form method="POST" action="{{ route('pic.laporan.weekly.simpan') }}">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Nomer</label>
                            <input type="number" class="form-control" name="no" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Date</label>
                            <input type="text" class="form-control" name="date" id="date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Week</label>
                            <input type="number" class="form-control" name="week" id="week" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Area</label>
                            <input type="text" class="form-control" name="area" id="area" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Area PIC</label>
                            <input type="text" class="form-control" name="area_pic" id="area_pic" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">TT Number</label>
                            <input type="number" class="form-control" name="TT_NUMBER" id="TT_NUMBER" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Customer</label>
                            <input type="text" class="form-control" name="customer" id="customer" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">SEGMENT ID</label>
                            <input type="text" class="form-control" name="SEGMENT_ID" id="SEGMENT_ID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">CID</label>
                            <input type="number" class="form-control" name="CID" id="CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">TR CID</label>
                            <input type="number" class="form-control" name="TR_CID" id="TR_CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Span</label>
                            <input type="text" class="form-control" name="span" id="span" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">FO CUT</label>
                            <select class="form-select" name="id_fo_cut" required>
                                <option value="" selected>--PILIH FO CUT--</option>
                                @foreach($master_category as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">NE IMPACT</label>
                            <input type="text" class="form-control" name="NE_IMPACT" id="NE_IMPACT" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">IMPACT TT</label>
                            <input type="number" class="form-control" name="IMPACT_TT" id="IMPACT_TT" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ring</label>
                            <input type="text" class="form-control" name="ring" id="ring" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Start Time</label>
                            <input type="number" class="form-control" name="start_time" id="start_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Stop Clock</label>
                            <input type="number" class="form-control" name="stop_clock" id="stop_clock" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">End Time</label>
                            <input type="number" class="form-control" name="end_time" id="end_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Start Date</label>
                            <input type="text" class="form-control" name="start_date" id="start_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">End Date</label>
                            <input type="text" class="form-control" name="end_date" id="end_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Root Cause</label>
                            <input type="text" class="form-control" name="root_cause" id="root_cause" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="" selected>--PILIH STATUS--</option>
                                @foreach($master_status as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Status PIC</label>
                            <select class="form-select" name="status_pic" required>
                                <option value="" selected>--PILIH STATUS PIC--</option>
                                @foreach($master_status_pic as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Aging Time</label>
                            <input type="number" class="form-control" name="aging_time" id="aging_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Remark</label>
                            <input type="text" class="form-control" name="remark" id="remark" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ceklis</label>
                            <input type="number" class="form-control" name="ceklis" id="ceklis" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Note</label>
                            <textarea type="text" rows="5" class="form-control" name="note" id="note" placeholder="..." required></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Type Kabel</label>
                            <select class="form-select" name="id_type_kabel" required>
                                <option value="" selected>--PILIH STATUS PIC--</option>
                                @foreach($master_type_kabel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Tikor</label>
                            <input type="number" class="form-control" name="tikor" id="tikor" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Time Travel</label>
                            <input type="text" class="form-control" name="time_travel" id="time_travel" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Time Tracking</label>
                            <input type="number" class="form-control" name="time_tracking" id="time_tracking" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Join Cut Point</label>
                            <input type="number" class="form-control" name="join_cut_point" id="join_cut_point" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">SLA TROUBLESHOOT</label>
                            <input type="number" class="form-control" name="SLA_TROUBLESHOOT" id="SLA_TROUBLESHOOT" placeholder="..." required>
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
                    <h2 class="font-medium text-base mr-auto">Update Person In Charge</h2>
                </div>
                <form method="POST" action="{{ route('pic.laporan.weekly.update') }}">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="e_id">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Nomer</label>
                            <input type="number" class="form-control" name="no" id="e_no" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Date</label>
                            <input type="text" class="form-control" name="date" id="e_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Week</label>
                            <input type="number" class="form-control" name="week" id="e_week" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Area</label>
                            <input type="text" class="form-control" name="area" id="e_area" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Area PIC</label>
                            <input type="text" class="form-control" name="area_pic" id="e_area_pic" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">TT Number</label>
                            <input type="number" class="form-control" name="TT_NUMBER" id="e_TT_NUMBER" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Customer</label>
                            <input type="text" class="form-control" name="customer" id="e_customer" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">SEGMENT ID</label>
                            <input type="text" class="form-control" name="SEGMENT_ID" id="e_SEGMENT_ID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">CID</label>
                            <input type="number" class="form-control" name="CID" id="e_CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">TR CID</label>
                            <input type="number" class="form-control" name="TR_CID" id="e_TR_CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Span</label>
                            <input type="text" class="form-control" name="span" id="e_span" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">FO CUT</label>
                            <select class="form-select" name="id_fo_cut" id="e_id_fo_cut" required>
                                <option value="" selected>--PILIH FO CUT--</option>
                                @foreach($master_category as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">NE IMPACT</label>
                            <input type="text" class="form-control" name="NE_IMPACT" id="e_NE_IMPACT" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">IMPACT TT</label>
                            <input type="number" class="form-control" name="IMPACT_TT" id="e_IMPACT_TT" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ring</label>
                            <input type="text" class="form-control" name="ring" id="e_ring" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Start Time</label>
                            <input type="number" class="form-control" name="start_time" id="e_start_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Stop Clock</label>
                            <input type="number" class="form-control" name="stop_clock" id="e_stop_clock" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">End Time</label>
                            <input type="number" class="form-control" name="end_time" id="e_end_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Start Date</label>
                            <input type="text" class="form-control" name="start_date" id="e_start_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">End Date</label>
                            <input type="text" class="form-control" name="end_date" id="e_end_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Root Cause</label>
                            <input type="text" class="form-control" name="root_cause" id="e_root_cause" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Status</label>
                            <select class="form-select" name="status" id="e_status" required>
                                <option value="" selected>--PILIH STATUS--</option>
                                @foreach($master_status as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Status PIC</label>
                            <select class="form-select" name="status_pic" id="e_status_pic" required>
                                <option value="" selected>--PILIH STATUS PIC--</option>
                                @foreach($master_status_pic as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Aging Time</label>
                            <input type="number" class="form-control" name="aging_time" id="e_aging_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Remark</label>
                            <input type="text" class="form-control" name="remark" id="e_remark" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ceklis</label>
                            <input type="number" class="form-control" name="ceklis" id="e_ceklis" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Note</label>
                            <textarea type="text" rows="5" class="form-control" name="note" id="e_note" placeholder="..." required></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Type Kabel</label>
                            <select class="form-select" name="id_type_kabel" id="e_id_type_kabel" required>
                                <option value="" selected>--PILIH STATUS PIC--</option>
                                @foreach($master_type_kabel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Tikor</label>
                            <input type="number" class="form-control" name="tikor" id="e_tikor" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Time Travel</label>
                            <input type="text" class="form-control" name="time_travel" id="e_time_travel" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Time Tracking</label>
                            <input type="number" class="form-control" name="time_tracking" id="e_time_tracking" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Join Cut Point</label>
                            <input type="number" class="form-control" name="join_cut_point" id="e_join_cut_point" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">SLA TROUBLESHOOT</label>
                            <input type="number" class="form-control" name="SLA_TROUBLESHOOT" id="e_SLA_TROUBLESHOOT" placeholder="..." required>
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

    <!-- BEGIN: View Modal -->
    <div id="view-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">View Person In Charge</h2>
                </div>
                <form method="POST" action="{{ route('pic.laporan.weekly.simpan') }}">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Nomer</label>
                            <input type="number" class="form-control" name="no" id="v_no" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Date</label>
                            <input type="text" class="form-control" name="date" id="v_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Week</label>
                            <input type="number" class="form-control" name="week" id="v_week" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Area</label>
                            <input type="text" class="form-control" name="area" id="v_area" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Area PIC</label>
                            <input type="text" class="form-control" name="area_pic" id="v_area_pic" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">TT Number</label>
                            <input type="number" class="form-control" name="TT_NUMBER" id="v_TT_NUMBER" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Customer</label>
                            <input type="text" class="form-control" name="customer" id="v_customer" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">SEGMENT ID</label>
                            <input type="text" class="form-control" name="SEGMENT_ID" id="v_SEGMENT_ID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">CID</label>
                            <input type="number" class="form-control" name="CID" id="v_CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">TR CID</label>
                            <input type="number" class="form-control" name="TR_CID" id="v_TR_CID" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Span</label>
                            <input type="text" class="form-control" name="span" id="v_span" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">FO CUT</label>
                            <select class="form-select" name="id_fo_cut" id="v_id_fo_cut" required>
                                <option value="" selected>--PILIH FO CUT--</option>
                                @foreach($master_category as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">NE IMPACT</label>
                            <input type="text" class="form-control" name="NE_IMPACT" id="v_NE_IMPACT" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">IMPACT TT</label>
                            <input type="number" class="form-control" name="IMPACT_TT" id="v_IMPACT_TT" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ring</label>
                            <input type="text" class="form-control" name="ring" id="v_ring" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Start Time</label>
                            <input type="number" class="form-control" name="start_time" id="v_start_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Stop Clock</label>
                            <input type="number" class="form-control" name="stop_clock" id="v_stop_clock" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">End Time</label>
                            <input type="number" class="form-control" name="end_time" id="v_end_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Start Date</label>
                            <input type="text" class="form-control" name="start_date" id="v_start_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">End Date</label>
                            <input type="text" class="form-control" name="end_date" id="v_end_date" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Root Cause</label>
                            <input type="text" class="form-control" name="root_cause" id="v_root_cause" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Status</label>
                            <select class="form-select" name="status" id="v_status" required>
                                <option value="" selected>--PILIH STATUS--</option>
                                @foreach($master_status as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Status PIC</label>
                            <select class="form-select" name="status_pic" id="v_status_pic" required>
                                <option value="" selected>--PILIH STATUS PIC--</option>
                                @foreach($master_status_pic as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Aging Time</label>
                            <input type="number" class="form-control" name="aging_time" id="v_aging_time" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Remark</label>
                            <input type="text" class="form-control" name="remark" id="v_remark" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Ceklis</label>
                            <input type="number" class="form-control" name="ceklis" id="v_ceklis" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Note</label>
                            <textarea type="text" rows="5" class="form-control" name="note" id="v_note" placeholder="..." required></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Type Kabel</label>
                            <select class="form-select" name="id_type_kabel" id="v_id_type_kabel" required>
                                <option value="" selected>--PILIH STATUS PIC--</option>
                                @foreach($master_type_kabel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Tikor</label>
                            <input type="number" class="form-control" name="tikor" id="v_tikor" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Time Travel</label>
                            <input type="text" class="form-control" name="time_travel" id="v_time_travel" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Time Tracking</label>
                            <input type="number" class="form-control" name="time_tracking" id="v_time_tracking" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Join Cut Point</label>
                            <input type="number" class="form-control" name="join_cut_point" id="v_join_cut_point" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">SLA TROUBLESHOOT</label>
                            <input type="number" class="form-control" name="SLA_TROUBLESHOOT" id="v_SLA_TROUBLESHOOT" placeholder="..." required>
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

    
    <!-- BEGIN: View Tiket Modal -->
    <div id="view-tiket-modal" class="modal" tabindex="-1" aria-hidden="true" data-tw-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">View Tiket</h2>
                </div>
                <div class="modal-body grid gap-4 gap-y-3">
                    <table class="table table-responsive" id="table-tiket" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="whitespace-nowrap">No.</th>
                                <th class="whitespace-nowrap">Transaksi Customer</th>
                                <th class="whitespace-nowrap">TT FLP</th>
                                <th class="whitespace-nowrap">Area</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: View Tiket Modal -->
    
    <!-- BEGIN: Delete Modal -->
    <div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('pic.laporan.weekly.delete') }}">
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
        $('#table-person').DataTable();
        $('#table-tiket').DataTable();

        flatpickr("#date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#start_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#end_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        
        flatpickr("#e_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#e_start_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });

        flatpickr("#e_end_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });
    });

    function updateData(obj){
        var item = $(obj).data('item');

        $('#e_id').val(item.id);
        $('#e_no').val(item.no);
        $('#e_date').val(item.date);
        $('#e_week').val(item.week);
        $('#e_area').val(item.area);
        $('#e_area_pic').val(item.area_pic);
        $('#e_TT_NUMBER').val(item.TT_NUMBER);
        $('#e_customer').val(item.customer);
        $('#e_SEGMENT_ID').val(item.SEGMENT_ID);
        $('#e_CID').val(item.CID);
        $('#e_TR_CID').val(item.TR_CID);
        $('#e_span').val(item.span);
        $('#e_id_fo_cut').val(item.id_fo_cut);
        $('#e_NE_IMPACT').val(item.NE_IMPACT);
        $('#e_IMPACT_TT').val(item.IMPACT_TT);
        $('#e_ring').val(item.ring);
        $('#e_start_time').val(item.start_time);
        $('#e_stop_clock').val(item.stop_clock);
        $('#e_end_time').val(item.end_time);
        $('#e_start_date').val(item.start_date);
        $('#e_end_date').val(item.end_date);
        $('#e_root_cause').val(item.root_cause);
        $('#e_status').val(item.status);
        $('#e_aging_time').val(item.aging_time);
        $('#e_remark').val(item.remark);
        $('#e_note').val(item.note);
        $('#e_status_pic').val(item.status_pic);
        $('#e_ceklis').val(item.ceklis);
        $('#e_id_type_kabel').val(item.id_type_kabel);
        $('#e_tikor').val(item.tikor);
        $('#e_time_travel').val(item.time_travel);
        $('#e_time_tracking').val(item.time_tracking);
        $('#e_join_cut_point').val(item.join_cut_point);
        $('#e_SLA_TROUBLESHOOT').val(item.SLA_TROUBLESHOOT);
    }

    function ViewData(obj){
        var item = $(obj).data('item');

        $('#v_no').val(item.no);
        $('#v_date').val(item.date);
        $('#v_week').val(item.week);
        $('#v_area').val(item.area);
        $('#v_area_pic').val(item.area_pic);
        $('#v_TT_NUMBER').val(item.TT_NUMBER);
        $('#v_customer').val(item.customer);
        $('#v_SEGMENT_ID').val(item.SEGMENT_ID);
        $('#v_CID').val(item.CID);
        $('#v_TR_CID').val(item.TR_CID);
        $('#v_span').val(item.span);
        $('#v_id_fo_cut').val(item.id_fo_cut);
        $('#v_NE_IMPACT').val(item.NE_IMPACT);
        $('#v_IMPACT_TT').val(item.IMPACT_TT);
        $('#v_ring').val(item.ring);
        $('#v_start_time').val(item.start_time);
        $('#v_stop_clock').val(item.stop_clock);
        $('#v_end_time').val(item.end_time);
        $('#v_start_date').val(item.start_date);
        $('#v_end_date').val(item.end_date);
        $('#v_root_cause').val(item.root_cause);
        $('#v_status').val(item.status);
        $('#v_aging_time').val(item.aging_time);
        $('#v_remark').val(item.remark);
        $('#v_note').val(item.note);
        $('#v_status_pic').val(item.status_pic);
        $('#v_ceklis').val(item.ceklis);
        $('#v_id_type_kabel').val(item.id_type_kabel);
        $('#v_tikor').val(item.tikor);
        $('#v_time_travel').val(item.time_travel);
        $('#v_time_tracking').val(item.time_tracking);
        $('#v_join_cut_point').val(item.join_cut_point);
        $('#v_SLA_TROUBLESHOOT').val(item.SLA_TROUBLESHOOT);
    }

    function ViewTiketData(id){
        var html = '';
        var table = $('#table-tiket').DataTable();
        $.get("{{ URL::to('pic-laporan-weekly/get-tiket') }}",{id:id},function(res){
            $.each(res, function(i, val){
                var no = i+1;
                table.row.add([
                    no,
                    val.master_transaksi_customer.nama,
                    val.TT_FLP,
                    val.master_area.nama
                ]);
            })
            table.draw();
        })
    }
    
    function DeleteData(id){
        $('#id_delete').val(id);
    }
</script>
@endsection