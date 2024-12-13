<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Saira Condensed' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Style for disabled link */
        .disabled-link {
          pointer-events: none; /* Disable click events */
          text-decoration: none; /* Remove underline or other decorations */
          cursor: not-allowed; /* Set cursor to not-allowed */
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        montserrat: ["Montserrat", "sans-serif"],
                        saira: ['Saira Condensed', "sans-serif"],
                        ibm: ['IBM Plex Sans Condensed', 'sans-serif'],
                        sSegment: ['Seven Segment', 'sans-serif'],
                        anon: ['Anonymous Pro', 'sans-serif']
                    },
                    colors: {
                        primary: '#FF914D',
                        secondary: '#ED3237',
                        gray: '#545454',
                        gold: '#FFFF00',
                    }
                },
            },
        }
        // $teamsix [2/3]
        // $passcode (kirim ketika mau main)
        // $admin (kirim ketika mau main)
    </script>
    <link rel="icon" href="{{ asset('dist/infiniteroom.svg') }}" type="image/x-icon">
    <title>TEAM SIX 2</title>
</head>
<body class="bg-black">
    <!-- <h1 class="text-4xl text-white">{{ $teamsix }}</h1> -->
    <h1 class="mt-8 text-4xl md:text-8xl text-primary text-center font-ibm font-black tracking-widest">PILIHAN MISI</h1>
    <div class="md:grid md:grid-cols-4 md:gap-8 mt-4 md:mt-12 mx-4 md:mx-16">
        <div class="@if($teamsix == '2') bg-secondary @else bg-secondary/75 @endif max-md:mb-2 px-4 py-2 md:py-6 rounded-xl">
            <h1 class="max-md:hidden text-lg text-white text-left font-ibm tracking-wide">@if($teamsix == '2') THE BEGINNING @else THE LAST TEST @endif</h1>
            <h1 class="max-md:hidden text-4xl text-white text-left font-ibm font-black tracking-widest">TEAM SIX @if($teamsix == '2') 2 @else 3 @endif</h1>
            <h1 class="md:hidden text-xl text-white text-center font-ibm font-black tracking-widest">@if($teamsix == '2') THE BEGINNING - TEAM SIX 2 @else THE LAST TEST - TEAM SIX 3 @endif</h1>
        </div>
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '2') md:opacity-50 @endif @if ($sessionData['missionProgress']['1'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['1'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['0'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['0'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 1</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">CENTRAL STATION</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['1'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['1'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 0</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">TRAINING MISSION</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['0'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['0'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">3 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[1] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[0] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="md:bg-slate-500 rounded-full border-2 md:border-0 border-slate-500 w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '3')
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '1' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['1'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['1'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['1'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['1'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @endif
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '0' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['0'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['0'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['0'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['0'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '3') md:opacity-50 @elseif ($teamsix == '2') max-md:opacity-50 @endif @if ($sessionData['missionProgress']['4'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['4'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['1'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['1'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 4</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">ROLLER COASTER</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['4'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['4'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 1</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">CENTRAL STATION</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['1'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['1'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[4] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[1] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="md:bg-slate-500 rounded-full border-2 md:border-0 border-slate-500 w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '2') 
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '4' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['4'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['4'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['4'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['4'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @endif
            @if($teamsix == '3')
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '1' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['1'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['1'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['1'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['1'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '3') max-md:opacity-50 @elseif ($teamsix == '2') md:opacity-50 @endif @if ($sessionData['missionProgress']['7'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['7'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['2'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['2'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 7</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">PRISON</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['7'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['7'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 2</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">TERMINAL</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['2'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['2'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[7] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[2] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="md:bg-slate-500 rounded-full border-2 md:border-0 border-slate-500 w-4 h-4"></div>
                <div class="md:bg-slate-500 rounded-full border-2 md:border-0 border-slate-500 w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '3')
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '7' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['7'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['7'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['7'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['7'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @endif
            @if($teamsix == '2')
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '2' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['2'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['2'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['2'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['2'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '2') max-md:opacity-50 @endif @if ($sessionData['missionProgress']['0'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['0'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['3'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['3'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 0</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">TRAINING MISSION</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['0'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['0'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 3</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">ELEVATOR</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['3'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['3'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">3 BOMB</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[0] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[3] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 md:bg-transparent border-0 md:border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 md:bg-transparent border-0 md:border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '0' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['0'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['0'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['0'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['0'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @if($teamsix == '3')
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '3' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['3'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['3'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['3'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['3'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '3') opacity-50 @endif @if ($sessionData['missionProgress']['2'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['2'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['4'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['4'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 2</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">TERMINAL</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['2'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['2'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 4</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">ROLLERCOASTER</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['4'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['4'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[2] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[4] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 md:bg-transparent border-0 md:border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '2')
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '2' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['2'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['2'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['2'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['2'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '4' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['4'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['4'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['4'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['4'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '2') opacity-50 @endif @if ($sessionData['missionProgress']['5'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['5'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['5'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['5'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="flex justify-between relative">
                <div class="w-[80%] h-[100%]">
                    <h1 class="text-sm text-black font-ibm tracking-wide">MISSION 5</h1>
                    <h1 class=" -mt-1 text-base text-black font-ibm font-black tracking-widest">SUBWAY</h1>
                </div>
                <div class="w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['5'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['5'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[5] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '3')
            <div class="justify-end flex">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '5' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['5'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['5'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['5'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['5'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '3') opacity-50 @endif @if ($sessionData['missionProgress']['8'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['8'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['6'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['6'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 8</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">BUS</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['8'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['8'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 6</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">CRUISE SHIP</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['6'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['6'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[8] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[6] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-transparent md:bg-slate-500 rounded-full border-2 md:border-0 border-slate-500 w-4 h-4"></div>
            </div>
            @if($teamsix == '2')
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '8' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['8'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['8'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['8'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['8'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '6' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['6'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['6'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['6'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['6'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        <div class="">
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '2') opacity-50 @endif @if ($sessionData['missionProgress']['3'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['3'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['7'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['7'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 3</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">ELEVATOR</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['3'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['3'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 7</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">PRISON</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['7'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['7'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[3] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[7] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 md:bg-transparent border-0 md:border-2 border-slate-500 rounded-full w-4 h-4"></div>
                <div class="border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '3')
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '3' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['3'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['3'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['3'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['3'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '7' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['7'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['7'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['7'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['7'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '3') opacity-50 @endif @if ($sessionData['missionProgress']['6'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['6'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['8'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['8'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="max-md:hidden flex justify-between relative">
                <div class="max-md:hidden w-[80%] h-[100%]">
                    <h1 class="max-md:hidden text-sm text-black font-ibm tracking-wide">MISSION 6</h1>
                    <h1 class="max-md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">CRUISE SHIP</h1>
                </div>
                <div class="max-md:hidden w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['6'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['6'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="md:hidden flex justify-between items-center relative">
                <div class="md:hidden w-[80%] h-[100%]">
                    <h1 class="md:hidden text-sm text-black font-ibm tracking-wide">MISSION 8</h1>
                    <h1 class="md:hidden -mt-1 text-base text-black font-ibm font-black tracking-widest">BUS</h1>
                </div>
                <div class="md:hidden w-[22%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['8'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['8'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="max-md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[6] }}</h1>
                <h1 class="md:hidden ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[8] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 md:bg-transparent border-0 md:border-2 border-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '2')
            <div class="justify-end flex max-md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '6' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['6'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['6'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['6'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['6'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            <div class="justify-end flex md:hidden">
                <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '8' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['8'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['8'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                    <p>@if ($sessionData['missionProgress']['8'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['8'] == 'gagal') FAILED @else PLAY @endif</p>
                </a>
            </div>
            @else
            <div class="md:hidden mb-8"></div>
            @endif
        </div>
        
        
        <div class="bg-white max-md:mb-2 px-4 py-3 rounded-xl @if($teamsix == '2') opacity-50 @endif @if ($sessionData['missionProgress']['9'] == 'sukses') md:border-2 md:border-[#85d75e] @elseif ($sessionData['missionProgress']['9'] == 'gagal') md:border-2 md:border-[#ff0606] @endif @if ($sessionData['missionProgress']['9'] == 'sukses') max-md:border-2 max-md:border-[#85d75e] @elseif ($sessionData['missionProgress']['9'] == 'gagal') max-md:border-2 max-md:border-[#ff0606] @endif">
            <div class="flex justify-between relative">
                <div class="w-[80%] h-[100%]">
                    <h1 class="text-sm text-black font-ibm tracking-wide">MISSION 9</h1>
                    <h1 class="-mt-1 text-base text-black font-ibm font-black tracking-widest">BANK</h1>
                </div>
                <div class="w-[32%] h-[100%] absolute bottom-0 right-0 flex justify-center items-center">
                    @if ($sessionData['missionProgress']['9'] == 'sukses') 
                        <img src="{{ asset('dist/complete-green.svg') }}" alt="success" class="h-auto max-w-full">
                    @elseif ($sessionData['missionProgress']['9'] == 'gagal') 
                        <img src="{{ asset('dist/fail-red.svg') }}" alt="failed" class="h-auto max-w-full">
                    @endif         
                </div>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/bomb.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">5 BOMB</h1>
            </div>
            <div class="flex mb-1">
                <img src="{{ asset('dist/time.svg') }}" alt="">
                <h1 class="ml-2 text-sm text-slate-500 font-ibm font-bold">{{ $time[9] }}</h1>
            </div>
            <div class="flex w-fit -mb-6 gap-[1px]">
                <img src="{{ asset('dist/difficulty.svg') }}" alt="">
                <div class="ml-2 bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
                <div class="bg-slate-500 rounded-full w-4 h-4"></div>
            </div>
            @if($teamsix == '3')
                <div class="justify-end flex">
                    <a href="{{ route('teamsix.show', ['admin' => $admin, 'missionnum' => '9' , 'passcode' => $passcode, 'teamsix' => $teamsix, 'session' => $session]) }}" class="@if ($sessionData['missionProgress']['9'] == 'sukses') disabled-link bg-[#85d75e] @elseif ($sessionData['missionProgress']['9'] == 'gagal') disabled-link bg-[#ff0606] @else bg-secondary @endif mr-0 w-fit px-4 py-1 rounded-lg text-base text-white font-ibm font-bold tracking-widest hover:bg-secondary/75"> 
                        <p>@if ($sessionData['missionProgress']['9'] == 'sukses') DONE @elseif ($sessionData['missionProgress']['9'] == 'gagal') FAILED @else PLAY @endif</p>
                    </a>
                </div>  
            @else
                <div class="md:hidden mb-8"></div>
            @endif
        </div>
    </div>
<script>
function windowLoad() {
    setTimeout(function() {
        let audio = new Audio('{{ asset('dist/selectMission.mp3') }}');
        audio.play();
        audio.volume = 0.3;
        audio.loop = true;
    }, 1000);
}
window.onload = windowLoad();
</script>
</body>
</html>