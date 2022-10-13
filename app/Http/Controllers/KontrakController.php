<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Pegawai;
use App\Traits\MyHelper;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    use MyHelper;

    public function ajaxKontrak()
    {
        $alamat_api = $this->url_api() . 'pegawai/kontrak';

        $header = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];

        $client = new Client([
            'headers' => $header
        ]);

        $response = $client->request('GET', $alamat_api);
        $response = $response->getBody()->getContents();
        $response = json_decode($response);

        if ($response->data) :
            $data = '';
            $no = 1;
            foreach ($response->data as $k) :
                $data .= '
                    <tr>
                        <td>' . $no++ . '</td>
                        <td>' . $k->nik . '</td>
                        <td>' . $k->nama_pegawai . '</td>
                        <td>' . $k->lama_kontrak . '</td>
                        <td>' . $k->alamat . '</td>
                        <td><a href="' . route('kontrak.edit', $k->id_kontrak) . '" class="btn btn-warning">Edit</a></td>
                        <td>
                        <a href="' . route('kontrak.delete', $k->id_kontrak) . '" class="btn btn-danger">Edit</a>
                        </td>
                    </tr>
                ';
            endforeach;

            $hasil = [
                'status' => 200,
                'listKontrak' => $data,
                'massages' => 'berhasil'
            ];

        else :

            $hasil = [
                'status' => 422,
                'listKontrak' => []
            ];

        endif;

        return $hasil;
    }

    public function index()
    {

        return view('Kontrak.index');
    }

    public function create()
    {
        $pegawai  = Pegawai::all();
        $data = [
            'pegawai' => $pegawai
        ];
        return view('Kontrak.create', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required',
            'lama_kontrak' => 'required'
        ]);

        $kontrak = new Kontrak;

        $kontrak->nik = $request->nik;
        $kontrak->lama_kontrak = $request->lama_kontrak;

        try {
            $DataKontrak = Kontrak::where('nik', $request->nik)->first();
            if ($DataKontrak) :
                return redirect('/kontrak/create')->with('error', 'Nama Kontrak Sudah Ada!');
            else :
                $kontrak->save();
                return redirect('/kontrak')->with('success', 'Data Kontrak Berhasil di Simpan');
            endif;
        } catch (Exception $e) {
            return redirect('/kontrak')->with('error', 'Data Kontrak Gagal');
        }
    }

    public function edit($id)
    {
        $kontrak = Kontrak::join('tbl_pegawai', 'tbl_kontrak.nik', '=', 'tbl_pegawai.nik')
            ->where('id_kontrak', $id)
            ->first();
        $pegawai = Pegawai::all();
        $data = [
            'kontrak' => $kontrak,
            'pegawai' => $pegawai
        ];
        return view('Kontrak.edit', $data);
    }


    public function update(Request $request, $id)
    {
        Kontrak::where('id_kontrak', $id)->update([
            'nik' => $request->nik,
            'lama_kontrak' => $request->lama_kontrak
        ]);

        return redirect('/kontrak')->with('success', 'Data Kontrak Berhasil di Update!');
    }

    public function delete($id)
    {
        $kontrak = Kontrak::where('id_kontrak', $id)->first();
        if ($kontrak) :
            Kontrak::where('id_kontrak', $id)->delete();
            return redirect('/kontrak')->with('success', 'Data Kontrak Berhasi di Hapus');
        else :
            return redirect('/kontrak')->with('error', 'Data Kontrak Gagal di Hapus!');
        endif;
    }
}
