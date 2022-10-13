@extends('layout.master')

@section('content')
    @include('layout.menu')
    <div class="container table-responsive mt-2">
        <a class="btn btn-primary mb-3" href=" {{ route('kontrak.create') }} ">Add Kontrak</a>
        <p class="placeholder-glow" id="skleton">
            <span class="placeholder col-12"></span>
        </p>
        <table class="table table-striped" id="table_kontrak">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA PEGAWAI</th>
                    <th>KONTRAK</th>
                    <th>ALAMAT</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody id="module_kontrak"></tbody>
        </table>
    </div>
@endsection
