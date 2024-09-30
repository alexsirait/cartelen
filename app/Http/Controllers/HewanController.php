<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HewanController extends Controller
{
    public function listhewan()
    {
        // satuan
        $datahewan = DB::table('tbl_hewan')->get();

        return view('hewan', [
            "hewan" => $datahewan,
        ]);
    }

    public function addhewan(Request $r)
    {
        return view('addhewan');
    }


public function simpan_hewan(Request $r)
{
    $id = $r->id;
    $nama = $r->nama;
    $jenis = $r->jenis;

    DB::table('tbl_hewan')->insert([
        "id" => $id,
        "nama" => $nama,
        "jenis" => $jenis,
    ]);

    return response()->json('SUCCESS');
}
// delete
public function deletehewan(Request $r)
{
    $id = $r->id;

    DB::table('tbl_hewan')->where("id", $id)->delete();

    return response()->json('SUCCESS');
}


    // edit
    public function edithewan(Request $r)
    {
        $id = $r->id;

        $hehe = DB::table('tbl_hewan')->where("id", $id)->first();

        $data = [
            "data" => $hehe
        ];

        return view('edit_hewan', $data);
    }

    public function updatehewan(Request $r)
    {
        $id = $r->id;
        $nama = $r->nama;
        $jenis =$r->jenis;

        DB::table('tbl_hewan')->where("id", $id)->update([
            "nama" => $nama,
            "jenis" => $jenis
        ]);

        return response()->json('SUCCESS');
    }

    public function showHewan(Request $req)
    {
        try {
            $output = '';
            $data = DB::table('tbl_hewan')->get();

            $output .=
                '
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nama</th>
                        <th scope="col">jenis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
            ';

            foreach ($data as $us) {
                $output .= '
                    <tr>
                        <td>'.$us->id.'</td>
                        <td>'.$us->nama.'</td>
                        <td>'.$us->jenis.'</td>
                        <td>
                            <a class="btn btn-primary inibutonakinuntukbukamodal" data-id="'.$us->id.'" data-nama="'.$us->nama.'" data-jenis="'.$us->jenis.'">Edit</a>
                            <a class="btn btn-danger iniadalahbuttonuntukmelakukandelete" data-id="'.$us->id.'">Delete</a>
                        </td>
                    </tr>
                ';
            }

            $output .= '</tbody></table>';

            return $output;
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }
}
