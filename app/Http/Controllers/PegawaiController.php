<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Traits\MyHelper;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    use MyHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function ajaxPegawai()
    {

        $alamat_api = $this->url_api() . 'pegawai/list';

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
            foreach ($response->data as $p) :
                $jenisKelamin = $p->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
                $data .= '
                    <tr>
                        <td>' . $no++ . '</td>
                        <td>' . $p->nik . '</td>
                        <td>' . $p->nama_pegawai . '</td>
                        <td>' . $jenisKelamin . '</td>
                        <td>' . $p->alamat . '</td>
                        <td>' . $p->nama_jabatan . '</td>
                        <td>
                            <a href="'. route('pegawai.edit', $p->nik) .'" class="btn btn-warning mr-3">Edit</a>
                            <a href="' . route('pegawai.delete', $p->nik) . '" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                ';
            endforeach;

            $hasil = [
                'status'    => 200,
                'listPegawai'      =>  $data,
                'messages'  => 'berhasil'
            ];

        else :

            $hasil = [
                'status'    => 422,
                'listPegawai'      => []
            ];

        endif;

        return $hasil;
    }

    public function index()
    {
        return view('Pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $data = [
            'jabatan' => $jabatan
        ];

        return view('Pegawai.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'id_jabatan' => 'required'
        ]);

        $pegawai = new Pegawai;

        $pegawai->nik = $request->nik;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->id_jabatan = $request->id_jabatan;

        try {
            $DataPegawai = Pegawai::where('nik', $request->nik)->first();
            if($DataPegawai) :
                return redirect('/pegawai/create')->with('error', 'NIK Pegawai Sudahh ada!');
            else:
                $pegawai->save();
                return redirect('/')->with('success', 'Data Pegawai Berhasil di Simpan');
            endif;
        } catch (Exception $e) {

            return redirect('/')->with('error', 'Data Pegawai Gagal!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::join('tbl_jabatan', 'tbl_pegawai.id_jabatan', '=', 'tbl_pegawai.id_jabatan')
            ->where('nik', $id)
            ->first();
        $jabatan = Jabatan::all();
        $data = [
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
        ];
        return view('/pegawai/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::where('nik', $id)->update([
            'nik' => $request->nik,
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'id_jabatan' => $request->id_jabatan
        ]);

        return redirect('/')->with('success', 'Data Pegawai Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pegawai = Pegawai::where('nik', $id)->first();
        if($pegawai) :
            Pegawai::where('nik', $id)->delete();
            return redirect('/')->with('success', 'Data Pegawai Behasil di Hapus');
        else :
            return redirect('/')->with('error', 'Data Pegawai Gagal di hapus!');
        endif;
    }
}
