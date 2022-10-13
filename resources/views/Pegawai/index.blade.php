@extends('layout.master')

@section('content')
    @include('layout.menu')
    <div class="container table-responsive mt-2">
        <a class="btn btn-primary mb-3" href=" {{route('pegawai.create')}} ">Add Pegawai</a>
        <p class="placeholder-glow" id="skleton">
            <span class="placeholder col-12"></span>
        </p>
        <table class="table table-striped" id="table_pegawai">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA PEGAWAI</th>
                    <th>JENIS KELAMIN</th>
                    <th>ALAMAT</th>
                    <th>JABATAN</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody id="module_pegawai"></tbody>
        </table>
    </div>
@endsection
