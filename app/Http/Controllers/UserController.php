<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function listuser()
    {
        // satuan
        $datauser = DB::table('tbl_user')->get();

        return view('user', [
            "user" => $datauser,
        ]);
    }

    public function adduser(Request $r)
    {
        return view('adduser');
    }

    public function simpan_user(Request $r)
    {
        $masuk_name = $r->name;
        $hp = $r->hp;
        $id = $r->id;

        DB::table('tbl_user')->insert([
            "name" => $masuk_name,
            "hp" => $hp,
            "id" => $id,
        ]);

        return response()->json('SUCCESS');
    }

    // delete
    public function delete_user(Request $r)
    {
        $id = $r->id;

        DB::table('tbl_user')->where("id", $id)->delete();

        return response()->json('SUCCESS');
    }





    // edit
    public function edit_user(Request $r)
    {
        $id = $r->id;

        $rasd = DB::table('tbl_user')->where("id", $id)->first();

        $data = [
            "data" => $rasd
        ];

        return view('edit_user', $data);
    }

    public function update_user(Request $r)
    {
        $id = $r->id;
        $name = $r->name;
        $hp = $r->hp;

        DB::table('tbl_user')->where("id", $id)->update([
            "name" => $name,
            "hp" => $hp,

        ]);

        return response()->json('SUCCESS');


    }

    public function showUser(Request $req)
    {
        try {
            $output = '';
            $data = DB::table('tbl_user')->get();

            $output .= '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">hp</th>
                        <th scope="col">id</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
            ';

            foreach ($data as $us) {
                $output .= '
                    <tr>
                        <td>'.$us->name.'</td>
                        <td>'.$us->hp.'</td>
                        <td>'.$us->id.'</td>
                        <td>
                            <a class="btn btn-primary inibutonakinuntukbukamodal" data-name="'.$us->name.'" data-hp="'.$us->hp.'" data-id="'.$us->id.'">Edit</a>
                            <a class="btn btn-danger iniadalahbuttonuntukmelakukandelete" data-id="'.$us->id.'">Delete</a>
                        </td>s
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

