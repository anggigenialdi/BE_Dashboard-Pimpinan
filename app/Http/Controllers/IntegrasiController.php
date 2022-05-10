<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AppUser;
use Illuminate\Http\Request;
class IntegrasiController extends Controller
{
    public function users(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Master Data Users',
            'data' =>  AppUser::OrderBy('id', 'DESC')->paginate(5),
        ], 200);
    }
    public function usersLogin(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://suratonline.bandung.go.id/api/index.php/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $request->email, 'password' => $request->password, 'regid' => $request->password),
        ));

        $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;

        $data = json_decode($response);

        $users = $data;

        $email = $users->data->email;
        $password = $users->data->password;
        $token = $users->data->token;

        $dataUser = AppUser::where('email', $email)->first();

        if ($dataUser !== null) {
            $dataUser->update([
                'token' => $token
            ]);
        } else {
            $dataUser = new AppUser;
            $dataUser->id = $users->data->id;
            $dataUser->email = $email;
            $dataUser->password = $password;
            $dataUser->token = $token;
            $dataUser->id_role = $users->data->id_role;
            $dataUser->id_skpd = $users->data->id_skpd;
            $dataUser->id_unit_kerja = $users->data->id_unit_kerja;
            $dataUser->nama = $users->data->nama;
            $dataUser->nama_jabatan = $users->data->nama_jabatan;
            $dataUser->nip = $users->data->nip;
            $dataUser->nik = $users->data->nik;
            $dataUser->pangkat = $users->data->pangkat;
            $dataUser->telp = $users->data->telp;
            $dataUser->ttd_image = $users->data->ttd_image;
            $dataUser->email = $users->data->email;
            $dataUser->password = $users->data->password;
            $dataUser->foto = $users->data->foto;
            $dataUser->token = $users->data->token;
            $dataUser->token_android = $users->data->token_android;
            $dataUser->android_regid = $users->data->android_regid;
            $dataUser->web_regid = $users->data->web_regid;
            $dataUser->verifikasi_email = $users->data->verifikasi_email;
            $dataUser->aktif = $users->data->aktif;
            $dataUser->cuti = $users->data->cuti;
            $dataUser->dibuat_oleh = $users->data->dibuat_oleh;
            $dataUser->dibuat_pada = $users->data->dibuat_pada;
            $dataUser->diubah_oleh = $users->data->diubah_oleh;
            $dataUser->diubah_pada = $users->data->diubah_pada;
            $dataUser->save();
        }

        return response()->json([
            'data' => $data,
            // 'save' => $dataUser,
        ], 201);
    }
    public function vaksinTerkini()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://data.bandung.go.id/service/index.php/vaksinasi/terkini',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        header("Access-Control-Allow-Origin: *");

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function agendaKegiatan(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://suratonline.bandung.go.id/api/index.php/agenda',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('token' => $request->token, 'start' => $request->start, 'end' => $request->end),
        ));
        header("Access-Control-Allow-Origin: *");
        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function cuaca(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://mantra.bandung.go.id/mantra/json/diskominfo/cuaca/sekarang',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function covid(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://covid19.bandung.go.id/ajax/chart-summary',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}