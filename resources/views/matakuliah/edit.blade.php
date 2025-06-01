@extends('layout.main')
@section('title', 'Mata Kuliah')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Ubah Mata Kuliah</div>
                </div>

                <form action="{{ route('matakuliah.update', ['matakuliah' => $matakuliah->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
        <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="{{ old('tahun_akademik') }}">
        @error('tahun_akademik')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="kode_smt" class="form-label">Kode Semester</label>
        <input type="text" class="form-control" id="kode_smt" name="kode_smt" value="{{ old('kode_smt') }}">
        @error('kode_smt')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas') }}">
        @error('kelas')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="sesi_id" class="form-label">Sesi</label>
        <select class="form-control" name="sesi_id" id="sesi_id">
            <option disabled selected>-- Pilih Sesi --</option>
            @foreach($sesi as $item)
                <option value="{{ $item->id }}" {{ old('sesi_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
        @error('sesi_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="matakuliah_id" class="form-label">Mata Kuliah</label>
        <select class="form-control" name="matakuliah_id" id="matakuliah_id">
            <option disabled selected>-- Pilih Mata Kuliah --</option>
        @foreach($matakuliahList as $item)
        <option value="{{ $item->id }}"
        {{ old('matakuliah_id', $matakuliah->matakuliah_id ?? '') == $item->id ? 'selected' : '' }}>
        {{ $item->nama }}
        </option>
@endforeach

        </select>
        @error('matakuliah_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
