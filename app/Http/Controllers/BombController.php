<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MissionConfig;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BombController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Admin $admin)
    {
        $passcode = (int)request('passcode');
        $teamSix = (int)request('teamsix');
        $uniqueSession = request('session', '');
        $failedMission = request('operationfailed', '');
        
        if ($teamSix != $admin->teamsix || $admin->passcode != $passcode || $admin->isOn != true) {
            abort('403');
        }
        
        if (!$uniqueSession) {
            abort('403');
        }
        
        $sessionData = session()->get($uniqueSession, '');
        if(!$sessionData) {
            abort('403');
        }
        
        if ($failedMission) {
            $sessionData['missionProgress'][$failedMission - 1] = 'gagal';
            session()->put($uniqueSession, $sessionData);
        }

        $missionCon = MissionConfig::all()->first();
        $time = json_decode($missionCon->missions_timer, true);
        
        $missionTime = [];
        for($i = 0; $i <= 9; $i++) {
            $missionTime[$i] = $this->retreiveMissionTimeName2($time[$i]);
        }

        $missionCom = $this->retrieveMissionCompleteArraySummary(json_decode($admin->misi_selesai, true));
        
        return view('defusethebomb/index', ['time' => $missionTime, 'passcode' => $passcode, 'teamsix' => $teamSix, 'admin' => $admin, 'session' => $uniqueSession, 'sessionData' => $sessionData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $missionNum = request('missionnum');
        $passcode = request('passcode');
        $teamSix = request('teamsix');
        $uniqueSession = request('session', '');
        
        if ($teamSix != $admin->teamsix || $admin->passcode != $passcode || $admin->isOn != true) {
            abort('403');
        }
        
        if (!$uniqueSession) {
            abort('403');
        }
        
        $sessionData = session()->get($uniqueSession, '');
        if(!$sessionData) {
            abort('403');
        }
        
        switch($missionNum) {
            case 2:
            case 4:
            case 6:
            case 8:
                if ($teamSix != 2){
                    abort('403');
                }
                break;
            case 1:
            case 3:
            case 5:
            case 7:
            case 9:
                if ($teamSix != 3){
                    abort('403');
                }
                break;
        }
        
        $time = $sessionData['missionTime'][$missionNum];
        $story = strtoupper(config('mission-config.story.' . $missionNum));
        $bomb = config('mission-config.bomb.' . $missionNum);
        $audio = config('mission-config.audio.' . $missionNum);
        $missionName = $this->retreiveMissionName($missionNum);
        $missionTime = $this->retreiveMissionTimeName($time);
        $bombNumber = $sessionData['missionBombNumber'][$missionNum];

        // dd($missionNum, $passcode, $teamSix, $missionCon, $time, $story, $bomb, $missionName);

        return view('defusethebomb/show', ['bombnumber' => $bombNumber, 'missionTime' => $missionTime, 'session' => $uniqueSession, 'missionNum' => $missionNum, 'missionName' => $missionName, 'time' => $time, '', 'story' => $story, 'bomb' => $bomb, 'teamsix' => $teamSix, 'passcode' => $passcode, 'admin' => $admin, 'audio' => $audio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    function teamSixCheck()
    {
        $passcode = 0;
        $teamSix = 0;

        $passcode = (int)request('passcode');
        $teamSix = (int)request('teamsix');

        $event = Admin::where('passcode', $passcode)
            ->where('teamsix', $teamSix)
            ->first();
        
        $missionCon = MissionConfig::all()->first();
        $time = json_decode($missionCon->missions_timer, true);
        foreach($time as $index => $t) {
            $time[$index] = $t * 100;
        }
        
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $uniqueSession = Str::random(15, $characters);
        
        session()->put($uniqueSession, [
            'missionProgress' => [
                '0' => false,
                '1' => false,
                '2' => false,
                '3' => false,
                '4' => false,
                '5' => false,
                '6' => false,
                '7' => false,
                '8' => false,
                '9' => false,
                ],
            'missionTime' => [
                '0' => $time[0],
                '1' => $time[1],
                '2' => $time[2],
                '3' => $time[3],
                '4' => $time[4],
                '5' => $time[5],
                '6' => $time[6],
                '7' => $time[7],
                '8' => $time[8],
                '9' => $time[9],
                ],
            'missionBombNumber' => [
                '0' => 1,
                '1' => 1,
                '2' => 1,
                '3' => 1,
                '4' => 1,
                '5' => 1,
                '6' => 1,
                '7' => 1,
                '8' => 1,
                '9' => 1,
                ]
            ]);
    
        if ($event) {
            switch ($event->teamsix) {
                case 2:
                case 3:
                    return redirect()->route('teamsix.index', ['passcode' => $event->passcode, 'teamsix' => $event->teamsix, 'admin' => $event, 'session' => $uniqueSession]);
                    break;

                default:
                    abort('400');
                    break;
            }
        } else {
            abort('404');
        }
    }

    function checkPasscode()
    {
        $passcode = 0;
        $teamSix = 0;

        try {
            $passcode = (int)request('passcode');
            $teamSix = (int)request('teamsix');
        } catch (Exception $e) {
            abort(400);
        }

        $event = Admin::where('passcode', $passcode)
            ->where('teamsix', $teamSix)
            ->first();

        if ($event && $event->isOn == true) {
            return true;
        }

        return false;
    }

    function successFetch(Admin $admin)
    {
        $isComplete = request('amp;complete');
        $missionNum = request('missionNum');
        $sessionName = request('amp;session', '');
        
        $sessionData = session()->get($sessionName);
        if ($sessionData) {
            if ($isComplete) {
                $sessionData['missionProgress'][$missionNum] = 'sukses';
                session()->put($sessionName, $sessionData);
            }
        }
        
        return true;
    }
    
    function bombNumberFetch(Admin $admin)
    {
        $bomb = request('amp;bombnumber');
        $missionNum = request('missionNum');
        $sessionName = request('amp;session', '');
        
        $sessionData = session()->get($sessionName);
        if ($sessionData) {
            if ($bomb) {
                $sessionData['missionBombNumber'][$missionNum] = $bomb;
                session()->put($sessionName, $sessionData);
            }
        }
        
        return true;
    }
    
    function timeFetch(Admin $admin)
    {
        $time = request('amp;time');
        $missionNum = request('missionNum');
        $sessionName = request('amp;session', '');
        
        $sessionData = session()->get($sessionName);
        if ($sessionData) {
            if ($time) {
                $sessionData['missionTime'][$missionNum] = $time;
                session()->put($sessionName, $sessionData);
            }
        }
        
        return true;
    }
    
    function answerFetch(Admin $admin)
    {
        $answer = request('amp;answer');
        $missionNum = request('missionNum');
        $sessionName = request('amp;session', '');
        $bombNum = request('amp;bombnumber');
        $bomb = config('mission-config.bomb.' . $missionNum);
        
        $sessionData = session()->get($sessionName);
        if ($sessionData) {
            if ($answer) {
                if ($answer == $bomb[$bombNum]) {
                    return true;
                } else {
                    return false;
                }
            } 
        }
        
        return false;
    }
    
    // function failedFetch(Admin $admin) {
    //     return request()->all();
    // }

    private function retreiveMissionName($missionnum)
    {
        if ($missionnum == 0) {
            return 'MISSION 0 - TRAINING MISSION';
        } elseif ($missionnum == 1) {
            return 'MISSION 1 - CENTRAL STATION';
        } elseif ($missionnum == 2) {
            return 'MISSION 2 - TERMINAL';
        } elseif ($missionnum == 3) {
            return 'MISSION 3 - ELEVATOR';
        } elseif ($missionnum == 4) {
            return 'MISSION 4 - ROLLERCOASTER';
        } elseif ($missionnum == 5) {
            return 'MISSION 5 - SUBWAY';
        } elseif ($missionnum == 6) {
            return 'MISSION 6 - CRUISE SHIP';
        } elseif ($missionnum == 7) {
            return 'MISSION 7 - PRISON';
        } elseif ($missionnum == 8) {
            return 'MISSION 8 - BUS';
        } elseif ($missionnum == 9) {
            return 'MISSION 9 - BANK';
        } else {
            return 'MISSION';
        }
    }

    private function retreiveMissionTimeName($missionTime)
    {
        $minute = (int)floor($missionTime / 60 / 100);
        $second = $missionTime % 60;

        $time = $minute . ' Menit';
        if ($second != 0) {
            $time = $minute . ' MENIT ' . $second . ' DETIK';
        }

        return $time;
    }
    
    private function retreiveMissionTimeName2($missionTime)
    {
        $minute = (int)floor($missionTime / 60);
        $second = $missionTime % 60;

        $time = $minute . ':00';
        if ($second != 0) {
            $time = $minute . ':' . $second . '';
        }

        return $time;
    }

    private function retrieveMissionCompleteArraySummary($array)
    {
        $completeArray = [];
        if (in_array(0, $array)) {
            $completeArray[0] = true;
        } 
        if (in_array(1, $array)) {
            $completeArray[1] = true;
        } 
        if (in_array(2, $array)) {
            $completeArray[2] = true;
        } 
        if (in_array(3, $array)) {
            $completeArray[3] = true;
        } 
        if (in_array(4, $array)) {
            $completeArray[4] = true;
        } 
        if (in_array(5, $array)) {
            $completeArray[5] = true;
        } 
        if (in_array(6, $array)) {
            $completeArray[6] = true;
        } 
        if (in_array(7, $array)) {
            $completeArray[7] = true;
        } 
        if (in_array(8, $array)) {
            $completeArray[8] = true;
        } 
        if (in_array(9, $array)) {
            $completeArray[9] = true;
        } 

        return $completeArray;
    }
}
