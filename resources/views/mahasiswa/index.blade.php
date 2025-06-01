@extends('layout.main')
@section('title', 'Mahasiswa')
@section('content')
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Mahasiswa</h3>
            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-collapse"
                title="Collapse"
              >
                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
              </button>
              <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-remove"
                title="Remove"
              >
                <i class="bi bi-x-lg"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
               <table class="table table-bordered table-striped">
               <thead>
                <tr>
                    <th>foto</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Asal Sma</th>
                    <th>Prodi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </thead>
                </tr>

                @foreach ($mahasiwa as $item)
                    <tr>
                        <td><img src ="images/{{ $item->foto }}" width="80px"/></td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->npm }}</td>
                        <td>{{ $item->jk }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->asal_sma}}</td>
                        <td>{{ $item->prodi->nama ?? '-'}}</td>
                        <td>{{ $item->foto}}</td>
                        <td>
                          <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-info">Show</a>
                          <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger show_confirm" data-nama="{{ $item->nama }}"
                                data-toggle="tooltip" title='Delete'>Delete</button>
                        </td>
                     </tr>
                     @endforeach
            </table>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!--end::Row-->
@endsection