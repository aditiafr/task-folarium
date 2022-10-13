<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kontrak;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    public function list()
    {
        try {
            $list = Kontrak::join('tbl_pegawai', 'tbl_kontrak.nik', '=', 'tbl_pegawai.nik')->get();
            if ($list) :
                $response = [
                    'retcode'   => 0,
                    'status'    => 200,
                    'massage'   => 'success',
                    'data'      => $list
                ];
            else :
                $response = [
                    'retcod'    => 1,
                    'status'    => 404,
                    'massage'   => 'Not Found!'
                ];
            endif;

            return response()->json($response, $response['status']);

        } catch (RequestException $e) {
            $response = [
                'retcod'    => 1,
                'status'    => 422,
                'massage'   => $e
            ];

            return response()->json($response, 422);
        }
    }
}
