@extends('layout.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>FORM PEGAWAI</h3>
        </div>
        <form action=" {{ route('pegawai.store') }} " method="POST" name="form-pegawai" id="form-pegawai">
            @csrf


            <div class="mb-3">
                <label for="nik" class="form-label">NIK Pegawai</label>
                <input type="number" class="form-control" id="nik" name="nik"
                    placeholder="Masukan Nik Pegawai">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                    placeholder="Masukan Nama Pegawai">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
                    <option value="" selected>- Pilih Jenis Kelamin -</option>
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5" placeholder="Masukan Alamat Pegawai"></textarea>
            </div>

            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan</label>
                <select class="form-select js-example-basic-single" name="id_jabatan" id="id_jabatan" aria-label="Default select example">
                    <option value="" selected>- Pilih Jabatan -</option>
                    @foreach ($jabatan as $j)
                    <option value="{{$j->id_jabatan}}">{{$j->nama_jabatan}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
            </div>
        </form>
    </div>
    <script>
        if ($("#form-pegawai").length > 0) {
            $("#form-pegawai").validate({
                rules: {
                    nik: {
                        required: true,
                    },
                    nama_pegawai: {
                        required: true,
                    },
                    jenis_kelamin: {
                        required: true,
                    },
                    alamat: {
                        required: true,
                    },
                    id_jabatan: {
                        required: true,
                    },
                },
                messages: {
                    nik: {
                        required: "Masukan NIK Pegawai",
                    },
                    nama_pegawai: {
                        required: "Masukan Nama Pegawai",
                    },
                    jenis_kelamin: {
                        required: "Pilih Jenis Kelamin Pegawai",
                    },
                    alamat: {
                        required: "Masukan Alamat Pegawai",
                    },
                    id_jabatan: {
                        required: "Pilih Jabatan Pegawai",
                    },
                },
            })
        }
    </script>
@endsection
