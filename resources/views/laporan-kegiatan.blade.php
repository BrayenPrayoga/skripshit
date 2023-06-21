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
        Data List Laporan Kegiatan
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
            <table class="table table-responsive" id="table-kegiatan" width="100%">
                <thead class="table-dark">
                    <tr>
                        <th class="whitespace-nowrap">No.</th>
                        <th class="whitespace-nowrap">Kegiatan</th>
                        <th class="whitespace-nowrap">Deskripsi</th>
                        <th class="whitespace-nowrap">Image</th>
                        <th class="whitespace-nowrap">Tanggal</th>
                        @if(Auth::guard('users')->user()->role != 4)
                        <th class="whitespace-nowrap">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan_kegiatan as $val)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $val->kegiatan }}</td>
                        <td>{{ $val->deskripsi }}</td>
                        <td>
                            @if(!empty($val->image))
                            <a href="{{ asset('upload/kegiatan/'.$val->image) }}" target="_blank" class="btn btn-dark mr-2 mb-2"> <i data-lucide="image" class="w-4 h-4"></i></a>
                            @else
                            <a href="#" class="btn btn-dark mr-2 mb-2"> <i data-lucide="image-off" class="w-4 h-4"></i></a>
                            @endif
                        </td>
                        <td>{{ tgl_indo($val->tanggal) }}</td>
                        @if(Auth::guard('users')->user()->role != 4)
                        <td>
                            <button class="btn btn-sm btn-primary" data-tw-toggle="modal" data-tw-target="#update-modal" onclick="updateData(this)" data-item="{{ $val }}"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="btn btn-sm btn-danger" data-tw-toggle="modal" data-tw-target="#delete-modal" onclick="DeleteData({{ $val->id }})"><i data-lucide="trash" class="w-4 h-4"></i></button>
                        </td>
                        @endif
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
                    <h2 class="font-medium text-base mr-auto">Tambah Kegiatan</h2>
                </div>
                <form method="POST" action="{{ route('maintenance.laporan.kegiatan.simpan') }}" enctype="multipart/form-data">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Kegiatan</label>
                            <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Tanggal</label>
                            <input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Deskripsi</label>
                            <textarea type="text" rows="5" class="form-control" name="deskripsi" id="deskripsi" placeholder="..." required></textarea>
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
                    <h2 class="font-medium text-base mr-auto">Tambah Kegiatan</h2>
                </div>
                <form method="POST" action="{{ route('maintenance.laporan.kegiatan.update') }}" enctype="multipart/form-data">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="e_id">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-6" class="form-label">Kegiatan</label>
                            <input type="text" class="form-control" name="kegiatan" id="e_kegiatan" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="e_image" placeholder="...">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-5" class="form-label">Tanggal</label>
                            <input type="text" class="form-control tanggal" name="tanggal" id="e_tanggal" placeholder="..." required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Deskripsi</label>
                            <textarea type="text" rows="5" class="form-control" name="deskripsi" id="e_deskripsi" placeholder="..." required></textarea>
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

    <!-- BEGIN: Delete Modal -->
    <div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('maintenance.laporan.kegiatan.delete') }}">
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
        $('#table-kegiatan').DataTable();
        
        flatpickr(".tanggal", {
            enableTime: true,
            dateFormat: "Y-m-d H:i"
        });
    });

    function updateData(obj){
        var item = $(obj).data('item');

        $('#e_id').val(item.id);
        $('#e_kegiatan').val(item.kegiatan);
        $('#e_deskripsi').val(item.deskripsi);
        $('#e_tanggal').val(item.tanggal);
    }
    
    function DeleteData(id){
        $('#id_delete').val(id);
    }
</script>
@endsection