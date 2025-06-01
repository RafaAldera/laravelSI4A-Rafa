@extends('layout.main')
@section('title', 'matakuliah')
@section('content')
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Tambah Mata Kuliah</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="{{ route('matakuliah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="{{ old('kode_mk') }}">
                                @error('kode_mk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
    <label for="prodi_id" class="form-label">Prodi</label>
    
    <select class="form-control" name="prodi_id" id="prodi_id">
        <option disabled selected>-- Pilih Prodi --</option>

        @foreach($prodi as $item)
            <option value="{{ $item->id }}" {{ old('prodi_id') == $item->id ? 'selected' : '' }}>
                {{ $item->nama }}
            </option>
        @endforeach
    </select>
    
    @error('prodi_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection