@extends('layout.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>FORM KONTRAK</h3>
        </div>
        <form action=" {{ route('kontrak.store') }} " method="POST" name="form-kontrak" id="form-kontrak">
            @csrf

            <div class="mb-3">
                <label for="nik" class="form-label">Nama Pegawai</label>
                <select class="form-select js-example-basic-single" id="nik" name="nik">
                    <option value="" selected>- Pilih Nama Pegawai -</option>
                    @foreach ($pegawai as $p)
                        <option value="{{ $p->nik }}">{{ $p->nama_pegawai }}</option>
                    @endforeach
                </select>
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lama_kontrak" class="form-label">Berapa Lama Kontrak</label>
                <input type="text" class="form-control" id="lama_kontrak" name="lama_kontrak"
                    placeholder="Masukan Berapa Lama Kontrak">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
            </div>
        </form>
    </div>
    <script>
        if ($("#form-kontrak").length > 0) {
            $("#form-kontrak").validate({
                rules: {
                    nik: {
                        required: true,
                    },
                    lama_kontrak: {
                        required: true,
                    },
                },
                messages: {
                    nik: {
                        required: "Pilih Nama Pegawai",
                    },
                    lama_kontrak: {
                        required: "Masukan Berapa Lama Kontrak",
                    },
                },
            })
        }
    </script>
@endsection
