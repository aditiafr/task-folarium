@extends('layout.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>FORM UPDATE PEGAWAI</h3>
        </div>
        <form action=" {{ route('pegawai.update', $pegawai->nik) }} " method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nik" class="form-label">NIK Pegawai</label>
                <input type="number" class="form-control" id="nik" name="nik"
                    value="{{$pegawai->nik}}">
            </div>

            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                value="{{$pegawai->nama_pegawai}}">
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
                    <option value="" selected>- Pilih Jenis Kelamin -</option>
                    <option value="L" @if ($pegawai->jenis_kelamin == 'L') selected @endif>Laki - laki</option>
                    <option value="P" @if ($pegawai->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5">{{$pegawai->alamat}}</textarea>
            </div>

            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan</label>
                <select class="form-select js-example-basic-single" name="id_jabatan" id="id_jabatan" aria-label="Default select example">
                    {{-- <option value="" selected>- Pilih Jabatan -</option> --}}
                    @foreach ($jabatan as $j)
                    <option value="{{$j->id_jabatan}}" @if ($pegawai->id_jabatan == $j->id_jabatan) selected @endif>{{$j->nama_jabatan}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
            </div>
        </form>
    </div>
@endsection
