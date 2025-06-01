@extends('layout.main')
@section('title', 'sesi')
@section('content')
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Tambah Sesi</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action={{ route('sesi.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Waktu</label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                            </div>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    
                        </div>

                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!-- /.card -->
        </div>
    @endsection