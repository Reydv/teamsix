<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\MissionConfig;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    public function dataEvent() 
    {
        $admins = Admin::query()->latest()->simplePaginate(8);
        return view('admin.data-event', compact('admins'));   
    }

    public function editMission($id) 
    {
        $admins = Admin::find($id);

        return view('admin.edit-event', compact('admins'));
    }

    public function editConfig() 
    {
        $timer = MissionConfig::all();

        $timer = MissionConfig::all()->first();
        $time = json_decode($timer->missions_timer, true);

        return view('admin.edit-mission', ['time' => $time]);
    }

    public function updateConfig() 
    {
        $missionTime0 = request('mission_0');
        $missionTime1 = request('mission_1');
        $missionTime2 = request('mission_2');
        $missionTime3 = request('mission_3');
        $missionTime4 = request('mission_4');
        $missionTime5 = request('mission_5');
        $missionTime6 = request('mission_6');
        $missionTime7 = request('mission_7');
        $missionTime8 = request('mission_8');
        $missionTime9 = request('mission_9');

        $timer = MissionConfig::all()->first();
        $time = json_decode($timer->missions_timer, true);
        
        $time[0] = $missionTime0;
        $time[1] = $missionTime1;
        $time[2] = $missionTime2;
        $time[3] = $missionTime3;
        $time[4] = $missionTime4;
        $time[5] = $missionTime5;
        $time[6] = $missionTime6;
        $time[7] = $missionTime7;
        $time[8] = $missionTime8;
        $time[9] = $missionTime9;

        $timer->missions_timer = $time;
        $timer->save();

        return view('admin.edit-mission', ['time' => $time, 'save' => 'Data Tersimpan']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_dibuat' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'total_peserta' => 'required',
            'lokasi_event' => 'required',
            'nama_perusahaan' => 'required',
            'passcode' => 'required|unique:admins',
            'teamsix' => 'required',
        ]);
        
        $nama = $request->nama;
        $tanggalDibuat = $request->tanggal_dibuat;
        $tanggalKadaluarsa = $request->tanggal_kadaluarsa;
        $total_peserta = $request->total_peserta;
        $lokasi_event = $request->lokasi_event;
        $nama_perusahaan = $request->nama_perusahaan;
        $passcode = $request->passcode;
        $misi_selesai = json_encode([]);
        $teamsix = $request->teamsix;

        $admin = new Admin();
        $admin->nama = $nama;
        $admin->tanggal_dibuat = $tanggalDibuat;
        $admin->tanggal_kadaluarsa = $tanggalKadaluarsa;
        $admin->total_peserta = $total_peserta;
        $admin->lokasi_event = $lokasi_event;
        $admin->nama_perusahaan = $nama_perusahaan;
        $admin->passcode = $passcode;
        $admin->misi_selesai = $misi_selesai;
        $admin->teamsix = $teamsix;
        $admin->save();

        return redirect()->route('dataevent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $isSuccess = request('isSuccess', '');
        
        $admins = Admin::find($id);
        $admins -> nama = $request->nama;
        $admins -> tanggal_dibuat = $request->tanggal_dibuat;
        $admins -> tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $admins -> total_peserta = $request->total_peserta;
        $admins -> lokasi_event = $request->lokasi_event;
        $admins -> nama_perusahaan = $request->nama_perusahaan;
        $admins -> passcode = $request->passcode;
        $admins -> misi_selesai = json_encode([]);
        $admins -> teamsix = $request->teamsix;

        $admins -> save();

        return view('admin.edit-event', ['isSuccess' => $isSuccess, 'admins' => $admins]);
        // return redirect() -> route('eventupdate', ['success' => $isSuccess]);
    }

    function onOff(Admin $admin){
        $isHold = request('value', false);

        $admin->isOn = $isHold;
        $admin->save();

        return response()->json(['on-hold' => $isHold]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
