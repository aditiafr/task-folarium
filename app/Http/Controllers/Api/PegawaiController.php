<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    function list()
    {
        try{
            $list = Pegawai::leftjoin('tbl_jabatan', 'tbl_jabatan.id_jabatan', '=', 'tbl_pegawai.id_jabatan')
            ->get();
            if($list) :
                $response = [
                    'retcode'   => 0,
                    'status'    => 200,
                    'message'   => 'success',
                    'data'      => $list
                ];
            else :
                $response = [
                    'retcode'   => 1,
                    'status'    => 404,
                    'message'   => 'Not Found!',
                ];
            endif;

            return response()->json($response, $response['status']);

        } catch(RequestException $e) {
            $response = [
                'retcode'   => 1,
                'status'    => 422,
                'message'  => $e
            ];

            return response()->json($response, 422);
        }
    }
}
