@extends('layout.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>FORM KONTRAK</h3>
        </div>
        <form action=" {{ route('kontrak.update', $kontrak->id_kontrak) }} " method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nik" class="form-label">Nama Pegawai</label>
                <select class="form-select js-example-basic-single" id="nik" name="nik">
                    @foreach ($pegawai as $p)
                        <option value="{{ $p->nik }}" @if ($kontrak->nik == $p->nik) selected @endif>{{ $p->nama_pegawai }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="lama_kontrak" class="form-label">Berapa Lama Kontrak</label>
                <input type="text" class="form-control" id="lama_kontrak" name="lama_kontrak"
                    value="{{$kontrak->lama_kontrak}}">
            </div>

            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
            </div>
        </form>
    </div>
@endsection
