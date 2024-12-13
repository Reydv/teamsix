<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Saira Condensed' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/seven-segment" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    </script>
    <link rel="icon" href="{{ asset('dist/infiniteroom.svg') }}" type="image/x-icon">
    <title>DEFUSE THE BOMB</title>
</head>

<body class="bg-black">
    <div id="present" class="w-[100vw] h-full md:h-[100vh] flex justify-center items-center">
        <div class="mt-32 md:mt-0">
            <div class="flex mx-auto w-fit h-fit">
                <img src="{{ asset('dist/infiniteroom.svg') }}" width="40px" height="40px" alt="logo">
                <p class="ml-2 text-white font-montserrat text-[35px] font-black">INFINITE ROOM</p>
            </div>
            <h1 class="my-4 text-white text-base text-center font-montserrat font-black tracking-widest">PRESENT</h1>
            <div class="mx-auto font-saira font-black text-center">
                <p class="text-9xl md:text-[200px] text-white leading-none tracking-tight md:tracking-normal">TEAM SIX</p>
                <p class="text-[35px] text-white leading-none tracking-[0.08em]">COUNTERTERRORISM SPECIAL DETACHMENT</p>
            </div>
        </div>
    </div>
    <div id="attention" class="w-fit h-full mx-0 md:mx-16 my-9" style="display: none;">
        <h1 class="mt-16 text-white text-center text-xl font-ibm tracking-widest">
            {{ $missionName }}
        </h1>
        <h1 class="text-primary text-center text-6xl md:text-8xl font-ibm font-black tracking-widest">PERHATIAN</h1>
        <h1 class="w-[80%] mx-auto mt-4 text-primary text-center text-xl md:text-2xl leading-6 font-ibm tracking-widest uppercase">{{ $story }}</h1>
        <h1 class="w-[80%] mx-auto mt-8 text-primary text-center leading-0 font-ibm tracking-widest">DETAIL MISI :</h1>
        <h1 class="w-[80%] mx-auto text-primary text-center leading-0 font-ibm tracking-widest">JUMLAH BOMB @if ($missionNum == 0) 3 @else 5 @endif</h1>
        <h1 class="w-[80%] mx-auto text-primary text-center leading-0 font-ibm tracking-widest">WAKTU : {{ $missionTime }}</h1>
        <h1 class="w-[80%] mx-auto text-primary text-center leading-0 font-ibm tracking-widest">TINGKAT KESULITAN: @if($missionNum == 0) 1 @elseif($missionNum <= 2) 2 @elseif($missionNum <= 5) 3 @elseif($missionNum <= 7) 4 @else 5 @endif / 5 </h1>
        <h1 class="w-[80%] mx-auto text-primary text-center leading-0 font-ibm tracking-widest">Waktu akan dimulai disaat Anda menekan tombol mulai. Bersedia?</h1>
        <div class="flex justify-center md:justify-end">
            <button id="startMission" class="mt-16 justify-center md:justify-end px-16 py-6 bg-secondary rounded-xl text-white text-6xl font-ibm font-black tracking-wider hover:bg-secondary/75 hover:ring-4 hover:ring-secondary">START</button>
        </div>
    </div>
    <div id="bombMissionStart" class="md:mx-16 md:my-9" style="display: none;">
        <div class="grid grid-cols-4 md:grid-cols-7 gap-1 mb-1">
            <div id="exit" class="bg-gray flex items-center hover:bg-gray/75">
                <button class="w-full h-full my-1 md:my-4 text-white text-lg font-ibm" tabindex="-1">EXIT</button>
            </div>
            <div class="max-md:hidden bg-gray py-4">
            </div>
            <div class="max-md:hidden bg-gray py-4">
            </div>
            <div class="bg-gray flex items-center hover:bg-gray/75">
                <button id="replayAudio" class="w-full h-full my-1 md:my-4 text-white text-lg font-ibm" tabindex="-1">AUDIO <br>REPLAY</button>
            </div>
            <div class="">
                <input type="checkbox" id="muteAudio" class="hidden peer/muted">
                <label for="muteAudio" class="w-full h-full mx-auto bg-gray flex justify-center items-center text-center text-white text-lg font-ibm cursor-pointer hover:bg-gray/75 peer-checked/muted:bg-red-700">
                    MUSIC<br>ON/OF
                </label>
            </div>
            <div class="flex justify-center items-center md:col-span-2 bg-gray flex items-center hover:bg-gray/75">
                <h1 id="" class="flex items-center justify-center w-full h-full my-1 md:my-4 text-white text-lg font-ibm" tabindex="-1">HINTS</h1>
            </div>
        </div>
        <div id="timerClockMobile" class="md:hidden flex bg-black mb-4 pt-8 md:py-10 justify-center items-center">
            <div class="">
                <h1 id="timerMobile" class="-mt-4 text-6xl text-primary text-center font-sSegment font-bold tracking-wide"></h1>
                <div class="flex justify-center gap-4 mt-4 mx-auto w-full">
                    @for ($i = 1; $i <= ($missionNum == 0 ? 3 : 5); $i++)
                    <img id="bombMobile-{{ $i }}" src="{{ asset('dist/bombred.svg') }}" alt="">
                    @endfor
                </div>
            </div>
        </div>
        <input id="bombCode" type="text" inputmode="numeric" class="max-md:hidden absolute opacity-0 w-[65%] text-9xl" pattern=".{5,5}" maxlength="5" onkeyup="
            var start = this.selectionStart;
            var end = this.selectionEnd;
            this.value = this.value.toUpperCase();
            this.setSelectionRange(start, end);
            bomba();">
        <div class="grid grid-cols-5 md:grid-cols-7 md:gap-1 mb-1 max-md:border-2 border-slate-500">
            <div id="codebg1" class="bg-zinc-900 border-0 ring-0 md:py-6">
                <div id="code-1" type="text" placeholder="8" class="w-full bg-transparent text-8xl md:text-9xl text-primary text-center border-0 ring-0 font-sSegment">
                    -
                </div>
            </div>
            <div id="codebg2" class="bg-zinc-900 border-0 ring-0 md:py-6">
                <div id="code-2" type="text" placeholder="8" class="w-full bg-transparent text-8xl md:text-9xl text-primary text-center border-0 ring-0 font-sSegment">
                    -
                </div>
            </div>
            <div id="codebg3" class="bg-zinc-900 border-0 ring-0 md:py-6">
                <div id="code-3" type="text" placeholder="8" class="w-full bg-transparent text-8xl md:text-9xl text-primary text-center border-0 ring-0 font-sSegment">
                    -
                </div>
            </div>
            <div id="codebg4" class="bg-zinc-900 border-0 ring-0 md:py-6">
                <div id="code-4" type="text" placeholder="8" class="w-full bg-transparent text-8xl md:text-9xl text-primary text-center border-0 ring-0 font-sSegment">
                    -
                </div>
            </div>
            <div id="codebg5" class="bg-zinc-900 border-0 ring-0 md:py-6">
                <div id="code-5" type="text" placeholder="8" class="w-full bg-transparent text-8xl md:text-9xl text-primary text-center border-0 ring-0 font-sSegment">
                    -
                </div>
            </div>
            <div id="timerClock" class="max-md:hidden flex col-span-2 bg-black py-10 justify-center items-center">
                <div class="">
                    <h1 id="timer-1" class="-mt-4 text-5xl text-primary text-center font-sSegment font-bold tracking-wide"></h1>
                    <div class="flex justify-center gap-4 mt-4 mx-auto w-full">
                        @for ($i = 1; $i <= ($missionNum == 0 ? 3 : 5); $i++)
                           <img id="bomb-{{ $i }}" src="{{ asset('dist/bombred.svg') }}" alt="">
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-7 gap-1 mb-1">
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="b1" value="1" class="w-full h-full my-2 md:my-4 text-9xl mdLtext-9xl text-white font-sSegment" tabindex="-1">1</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="b2" value="2" class="w-full h-full my-2 md:my-4 text-9xl mdLtext-9xl text-white font-sSegment" tabindex="-1">2</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="b3" value="3" class="w-full h-full my-2 md:my-4 text-9xl mdLtext-9xl text-white font-sSegment" tabindex="-1">3</button>
            </div>
            <div class="max-md:hidden bg-secondary flex items-center rounded-3xl hover:bg-secondary/75">
                <button id="b4" value="4" class="w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">4</button>
            </div>
            <div class="max-md:hidden bg-secondary flex items-center rounded-3xl hover:bg-secondary/75">
                <button id="b5" value="5" class="w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">5</button>
            </div>
            <div class="max-md:hidden col-span-2 bg-secondary flex items-center rounded-3xl hover:bg-secondary/75">
                <button id="delete" class="w-full h-full my-4 text-8xl text-white font-sSegment tracking-widest" tabindex="-1">DEL</button>
            </div>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-7 gap-1 mb-1">
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="b6" value="6" class="max-md:hidden w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">6</button>
                <button id="bmobile4" value="4" class="md:hidden w-full h-full my-2 md:my-4 text-8xl mdLtext-9xl text-white font-sSegment" tabindex="-1">4</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="b7" value="7" class="max-md:hidden w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">7</button>
                <button id="bmobile5" value="5" class="md:hidden w-full h-full my-2 md:my-4 text-8xl mdLtext-9xl text-white font-sSegment" tabindex="-1">5</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="b8" value="8" class="max-md:hidden w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">8</button>
                <button id="bmobile6" value="6" class="md:hidden w-full h-full my-2 md:my-4 text-8xl mdLtext-9xl text-white font-sSegment" tabindex="-1">6</button>
            </div>
            <div class="max-md:hidden bg-secondary flex items-center rounded-3xl hover:bg-secondary/75">
                <button id="b9" value="9" class="w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">9</button>
            </div>
            <div class="max-md:hidden bg-secondary flex items-center rounded-3xl hover:bg-secondary/75">
                <button id="b0" value="0" class="w-full h-full my-4 text-9xl text-white font-sSegment" tabindex="-1">0</button>
            </div>
            <div class="max-md:hidden  col-span-2 bg-secondary flex items-center rounded-3xl hover:bg-secondary/75">
                <button id="defuse" class="w-full h-full my-4 text-8xl text-white font-sSegment tracking-widest" tabindex="-1">OK</button>
            </div>
        </div>
        <div class="md:hidden grid grid-cols-3 gap-1 mb-1">
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="bmobile7" value="7" class=" w-full h-full my-2 text-8xl text-white font-sSegment" tabindex="-1">7</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="bmobile8" value="8" class=" w-full h-full my-2 text-8xl text-white font-sSegment" tabindex="-1">8</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="bmobile9" value="9" class=" w-full h-full my-2 text-8xl text-white font-sSegment" tabindex="-1">9</button>
            </div>
        </div>
        <div class="md:hidden grid grid-cols-3 gap-1 mb-1">
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="deleteMobile" class=" w-full h-full my-2 text-6xl text-white font-sSegment" tabindex="-1">DEL</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="bmobile10" value="0" class=" w-full h-full my-2 text-8xl text-white font-sSegment" tabindex="-1">0</button>
            </div>
            <div class="bg-secondary flex items-center md:rounded-3xl hover:bg-secondary/75">
                <button id="defuseMobile" class=" w-full h-full my-2 text-6xl text-white font-sSegment" tabindex="-1">OK</button>
            </div>
        </div>
    </div>
    <div id="hint" class="md:mx-16 md:my-9" style="display: none;">
        <div class="grid grid-cols-3 md:grid-cols-7 gap-1 mb-1">
            <div class="max-md:hidden bg-gray py-4">
            </div>
            <div class="max-md:hidden bg-gray py-4">
            </div>
            <div class="max-md:hidden bg-gray py-4">
            </div>
            <div class="bg-gray flex items-center">
                <button id="prevHint" class="w-full h-full my-4 text-white text-lg font-ibm" style="display: none;" tabindex="-1">PREVIOUS</button>
            </div>
            <div class="bg-gray flex items-center">
                <button id="nextHint" class="w-full h-full my-4 text-white text-lg font-ibm" tabindex="-1">NEXT</button>
            </div>
            <div class="md:col-span-2 bg-gray flex items-center">
                <button id="returnToBomb" class="w-full h-full my-4 text-white text-lg font-ibm" tabindex="-1">RETURN</button>
            </div>
        </div>
        <div id="hints" class="">
            <div id="hint-1" class="">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 1 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-2" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 2 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-3" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 3 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-4" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 4 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-5" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 5 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-6" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 6 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-7" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 7 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
            <div id="hint-8" class="" style="display: none;">
                <h1 class="mt-4 text-primary text-center md:text-left text-6xl font-ibm font-black tracking-widest">HINT 8 <span class="text-primary/75">OF 8</span></h1>
                <h1 class="mt-4 text-primary text-center md:text-left text-lg md:text-4xl font-ibm font-black tracking-widest uppercase">Pakar kami di lokasi menyarankan bahwa ini sepertinya tentang alfabet morse. harusNYA ada tabel terjemahanNYA di dokumen ANDA SEKARANG!</h1>
            </div>
        </div>
        <div id="timerClock" class="flex bg-black py-10 justify-center md:justify-end items-end opacity-75">
            <div class="">
                <h1 id="timerHint" class="-mt-4 text-6xl text-primary text-center font-sSegment font-bold tracking-wide"></h1>
                <div class="flex justify-center gap-4 mt-4 mx-auto w-full">
                    @for ($i = 1; $i <= ($missionNum == 0 ? 3 : 5); $i++)
                    <img id="bombHint-{{ $i }}" src="{{ asset('dist/bombred.svg') }}" alt="">
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div id="failed" class="mx-16 my-9" style="display: none;">
        <h1 class="mt-48 text-primary text-6xl text-center font-ibm font-black tracking-widest">MISI GAGAL</h1>
        <!-- <h1 id="failedBombCount" class="mt-12 text-primary text-center text-2xl font-ibm font-black tracking-widest"></h1> -->
        <div class="flex justify-center">
            <a href="{{ route('teamsix.index', ['admin' => $admin, 'teamsix' => $teamsix, 'passcode' => $passcode, 'session' => request('session'), 'operationfailed' => $missionNum + 1]) }}" class="mt-36 px-16 py-4 bg-secondary rounded-xl text-white text-4xl font-ibm font-black tracking-widest">
                KEMBALI
            </a>
        </div>
    </div>
    <div id="succes" class="mx-16 my-9" style="display: none;">
        <h1 class="mt-48 text-primary text-6xl text-center font-ibm font-black tracking-widest">MISI BERHASIL</h1>
        <h1 class="mt-12 text-primary text-center text-2xl font-ibm font-black tracking-widest">Bom Dijinakan = {{ count($bomb) }}</h1>
        <h1 id="timeLeft" class="text-primary text-center text-2xl font-ibm font-black tracking-widest"></h1>
        <div class="flex justify-center">
            <a href="{{ route('teamsix.index', ['admin' => $admin, 'teamsix' => $teamsix, 'passcode' => $passcode, 'session' => request('session')]) }}" class="mt-36 px-16 py-4 bg-secondary rounded-xl text-white text-4xl font-ibm font-black tracking-widest hover:bg-secondary/75 hover:ring-4 hover:ring-secondary">
                MISI BARU
            </a>
        </div>
    </div>
    <div id="surrender" class="mx-16 my-9" style="display: none;">
        <h1 class="mt-24 text-primary text-6xl text-center font-ibm font-black tracking-widest">Anda Ingin Menyerah?</h1>
        <div id="timerClock" class="flex bg-black py-10 justify-center md:justify-center items-center">
            <div class="">
                <h1 id="timerSurrender" class="mt-12 text-6xl text-primary text-center font-sSegment font-bold tracking-wide"></h1>
                <div class="flex justify-center gap-4 mt-4 mx-auto w-full">
                    @for ($i = 1; $i <= ($missionNum == 0 ? 3 : 5); $i++)
                    <img id="bombSurrender-{{ $i }}" src="{{ asset('dist/bombred.svg') }}" alt="">
                    @endfor
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-12">
            <button id="notSurrender" class="mt-24 px-16 py-4 bg-secondary rounded-xl text-white text-4xl font-ibm font-black tracking-widest hover:bg-secondary/75 hover:ring-4 hover:ring-secondary"> KEMBALI
            </button>
            <button class="mt-24 px-16 py-4 bg-secondary rounded-xl text-white text-4xl font-ibm font-black tracking-widest hover:bg-secondary/75 hover:ring-4 hover:ring-secondary">
                <h1 id="surrenderText">MENYERAH (5)</h1>
                <a id="surrenderLast" href="{{ route('teamsix.index', ['admin' => $admin, 'teamsix' => $teamsix, 'passcode' => $passcode, 'session' => request('session'), 'operationfailed' => $missionNum + 1]) }}" style="display: none;">MENYERAH</a>
            </button>
        </div>
    </div>
    <script>
        var num1 = document.getElementById("code-1");
        var num2 = document.getElementById("code-2");
        var num3 = document.getElementById("code-3");
        var num4 = document.getElementById("code-4");
        var num5 = document.getElementById("code-5");
        var bomb = document.getElementById("bombCode");
        var j = 1;
        var timer;
        var hint = 1;
        var sendTimeFetch;
        var count = {{ $time }};
        var muteAudio = document.getElementById("muteAudio");
        var replayAudio = document.getElementById("replayAudio");
        let bombNumber = {{ isset($bombnumber) ? $bombnumber : 1 }};
        let pin = {{ isset($bombnumber) ? $bombnumber : 1 }};
        let audio = new Audio('{{ asset($audio) }}');
        let audioPlay = new Audio('{{ asset('dist/playMission.mp3') }}');
        let audioLost = new Audio('{{ asset('dist/faliedMission.wav') }}');
        let audioWin = new Audio('{{ asset('dist/successMission.mp3') }}');
        
        if (bombNumber != 1 && bombNumber != 0) {
            let counter = bombNumber - 1;
            for (let i = 1; i <= counter; i++) {
                document.getElementById('bomb-' + i).src = '{{ asset('dist/bombwhite.svg') }}';
                document.getElementById('bombMobile-' + i).src = '{{ asset('dist/bombwhite.svg') }}';
                document.getElementById('bombHint-' + i).src = '{{ asset('dist/bombwhite.svg') }}';
            }
        }

        function windowLoad() {
            let audioLoading = new Audio('{{ asset('dist/loadingMission.wav') }}');
            audioLoading.play();
            audioLoading.volume = 0.8;
            setTimeout(function() {
                audio.play();
                document.getElementById('present').style.display = "none";
                document.getElementById('attention').style.display = "block";
                document.getElementById('startMission').addEventListener("click", function() {
                   audio.mute = true; 
                });
            }, 3000);
        }

        window.onload = windowLoad();

        document.getElementById('startMission').addEventListener("click", function() {
            audio.pause();
            audioPlay.play();
            audioPlay.loop = true;
            audioPlay.volume = 0.3;
            document.getElementById('attention').style.display = "none";
            document.getElementById('bombMissionStart').style.display = "block";
            timerStart(j);
            
            sendTimeFetch = setInterval(function() {
                let dynamicUrl = '{{ route('teamsix.time.fetch', ['admin' => $admin, 'missionNum' => $missionNum, 'time' => 'COUNT_VALUE', 'session' => request('session')]) }}';
                dynamicUrl = dynamicUrl.replace('COUNT_VALUE', count);
                
                fetch(dynamicUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });
            }, 2000);
            
            function timerStart(i) {

                var timeSpent = 0;
                clearInterval(timer)
                timer = setInterval(function() {
                    count--;
                    timeSpent++;
                    var minutes = Math.floor(count / (60 * 100));
                    var seconds = Math.floor((count - minutes * 60 * 100) / 100);
                    var milisec = count - Math.floor(count / 100) * 100;
                    mi = (minutes < 10) ? "0" + minutes : minutes;
                    sc = (seconds < 10) ? "0" + seconds : seconds;
                    ms = (milisec < 10) ? "0" + milisec : milisec;
                    document.getElementById("timer-" + i).innerHTML = mi + " : " + sc + " : " + ms;
                    document.getElementById("timerMobile").innerHTML = mi + " : " + sc + " : " + ms;
                    document.getElementById("timerHint").innerHTML = mi + " : " + sc + " : " + ms;
                    document.getElementById("timerSurrender").innerHTML = mi + " : " + sc + " : " + ms;
                    if (count === 0) {
                        clearInterval(timer);
                        document.getElementById('bombMissionStart').style.display = "none";
                        document.getElementById('failed').style.display = "block";
                        // document.getElementById('failedBombCount').innerHTML = "Bom Dijinakan = " + bombNumber;
                        
                        audioPlay.pause();
                        audioLost.play();
                        audioLost.volume = 1;
                    }
                }, 10);

                function defuse() {
                    let code = document.getElementById('bombCode').value;
                    
                    function codeFalse() {
                        document.getElementById('bombCode').value = "";
                        num1.innerHTML = "-";
                        num2.innerHTML = "-";
                        num3.innerHTML = "-";
                        num4.innerHTML = "-";
                        num5.innerHTML = "-";
                        
                        let timerClock = document.getElementById('timerClock', 'timerClockMobile');
                        
                        timerClock.classList.remove('bg-black');
                        timerClock.classList.add('bg-red-700');
                        
                        for (let x = 1; x <= 5; x++) {
                                document.getElementById('codebg' + x).classList.remove('bg-zinc-900')
                                document.getElementById('codebg' + x).classList.add('bg-red-700')
                            }
                        
                        setTimeout(function() {
                            timerClock.classList.remove('bg-red-700');
                            timerClock.classList.add('bg-black');
                            
                            for (let x = 1; x <= 5; x++) {
                                document.getElementById('codebg' + x).classList.add('bg-zinc-900')
                                document.getElementById('codebg' + x).classList.remove('bg-red-700')
                            }
                            setTimeout(function() {
                                timerClock.classList.remove('bg-black');
                                timerClock.classList.add('bg-red-700');
                                
                                for (let x = 1; x <= 5; x++) {
                                    document.getElementById('codebg' + x).classList.remove('bg-zinc-900')
                                    document.getElementById('codebg' + x).classList.add('bg-red-700')
                                }
                                setTimeout(function() {
                                    timerClock.classList.remove('bg-red-700');
                                    timerClock.classList.add('bg-black');
                                    
                                    for (let x = 1; x <= 5; x++) {
                                        document.getElementById('codebg' + x).classList.add('bg-zinc-900')
                                        document.getElementById('codebg' + x).classList.remove('bg-red-700')
                                    }
                                }, 100)
                            }, 100)
                        }, 100)
                    }

                    function nextBomb() {
                        document.getElementById('bombCode').value = "";
                        num1.innerHTML = "-";
                        num2.innerHTML = "-";
                        num3.innerHTML = "-";
                        num4.innerHTML = "-";
                        num5.innerHTML = "-";
                        document.getElementById('bomb-' + bombNumber).src = '{{ asset('dist/bombwhite.svg') }}';
                        document.getElementById('bombMobile-' + bombNumber).src = '{{ asset('dist/bombwhite.svg') }}';
                        document.getElementById('bombHint-' + bombNumber).src = '{{ asset('dist/bombwhite.svg') }}';
                        bombNumber += 1;
                        
                        let dynamicUrl = '{{ route('teamsix.bombnumber.fetch', ['admin' => $admin, 'missionNum' => $missionNum, 'bombnumber' => 'BOMB_VALUE', 'session' => request('session')]) }}';
                        dynamicUrl = dynamicUrl.replace('BOMB_VALUE', bombNumber);
                        
                        fetch(dynamicUrl)
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Response tidak diterima dari server');
                                        }
                                        return response.text();
                                    })
                                    .then(data => {
                                    })
                                    .catch(error => {
                                        console.error(error);
                                        alert(error);
                                    });
                        
                        let timerClock = document.getElementById('timerClock', 'timerClockMobile');
                        
                        timerClock.classList.remove('bg-black');
                        timerClock.classList.add('bg-green-700');
                        
                        for (let x = 1; x <= 5; x++) {
                                document.getElementById('codebg' + x).classList.remove('bg-zinc-900')
                                document.getElementById('codebg' + x).classList.add('bg-green-700')
                            }
                        
                        setTimeout(function() {
                            timerClock.classList.remove('bg-green-700');
                            timerClock.classList.add('bg-black');
                            
                            for (let x = 1; x <= 5; x++) {
                                document.getElementById('codebg' + x).classList.add('bg-zinc-900')
                                document.getElementById('codebg' + x).classList.remove('bg-green-700')
                            }
                            setTimeout(function() {
                                timerClock.classList.remove('bg-black');
                                timerClock.classList.add('bg-green-700');
                                
                                for (let x = 1; x <= 5; x++) {
                                    document.getElementById('codebg' + x).classList.remove('bg-zinc-900')
                                    document.getElementById('codebg' + x).classList.add('bg-green-700')
                                }
                                setTimeout(function() {
                                    timerClock.classList.remove('bg-green-700');
                                    timerClock.classList.add('bg-black');
                                    
                                    for (let x = 1; x <= 5; x++) {
                                        document.getElementById('codebg' + x).classList.add('bg-zinc-900')
                                        document.getElementById('codebg' + x).classList.remove('bg-green-700')
                                    }
                                }, 100)
                            }, 100)
                        }, 100)
                    }

                    function winGame() {
                        clearInterval(timer);
                        clearInterval(sendTimeFetch);

                        fetch('{{ route('teamsix.success.fetch', ['admin' => $admin, 'missionNum' => $missionNum, 'complete' => true, 'session' => request('session')]) }}')
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });

                        document.getElementById('bombMissionStart').style.display = "none";
                        document.getElementById('succes').style.display = "block";
                        var minutesFinish = Math.floor(timeSpent / (60 * 100));
                        var secondsFinish = Math.floor((timeSpent - minutesFinish * 60 * 100) / 100);
                        document.getElementById('timeLeft').innerHTML = "Waktu yang digunakan = " + minutesFinish + " Menit " + secondsFinish + " Detik"
                        
                        audioPlay.pause();
                        audioWin.play();
                        audioWin.volume = 0.3;
                    }

                    let dynamicUrl = '{{ route('teamsix.answer.fetch', ['admin' => $admin, 'missionNum' => $missionNum, 'answer' => 'ANSWER_VALUE', 'bombnumber' => 'BOMB_VALUE', 'session' => request('session')]) }}';
                    dynamicUrl = dynamicUrl.replace('ANSWER_VALUE', code);
                    dynamicUrl = dynamicUrl.replace('BOMB_VALUE', bombNumber);

                    if (bombNumber == 1) {
                        fetch(dynamicUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                                if (data == true && typeof data !== 'undefined' && pin == 1) {
                                    pin += 1;
                                    nextBomb();
                                } else {
                                    codeFalse();
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });
                    } else if (bombNumber == 2) {
                        fetch(dynamicUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                                if (data == true && typeof data !== 'undefined' && pin == 2) {
                                    pin += 1;
                                    nextBomb();
                                } else {
                                    codeFalse();
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });
                    } else if (bombNumber == 3) {
                        fetch(dynamicUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                                if (data == true && typeof data !== 'undefined' && pin == 3) {
                                    if ('{{ $missionNum }}' == '0') {
                                       winGame();
                                    } else {
                                        pin += 1;
                                        nextBomb();
                                    }
                                } else {
                                    codeFalse();
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });
                    } else if (bombNumber == 4) {
                        fetch(dynamicUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                                if (data == true && typeof data !== 'undefined' && pin == 4) {
                                    pin += 1;
                                    nextBomb();
                                } else {
                                    codeFalse();
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });
                    } else if (bombNumber == 5) {
                        fetch(dynamicUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Response tidak diterima dari server');
                                }
                                return response.text();
                            })
                            .then(data => {
                                if (data == true && typeof data !== 'undefined'  && pin == 5) {
                                    pin += 1;
                                    winGame();
                                } else {
                                    codeFalse();
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                alert(error);
                            });
                    }
                }

                document.getElementById("defuse").addEventListener("click", function() {
                    defuse();
                });

                document.getElementById("defuseMobile").addEventListener("click", function() {
                    defuse();
                });

                function deleteCode() {
                    document.getElementById('bombCode').value = "";
                    num1.innerHTML = '-';
                    num2.innerHTML = '-';
                    num3.innerHTML = '-';
                    num4.innerHTML = '-';
                    num5.innerHTML = '-';
                }

                document.getElementById("delete").addEventListener("click", function() {
                    deleteCode();
                });

                document.getElementById("deleteMobile").addEventListener("click", function() {
                    deleteCode();
                });
            }

            for (let x = 0; x <= 9; x++) {
                document.getElementById('b' + x).addEventListener('click', function() {
                    var curVal = document.getElementById('bombCode').value;
                    bombValue = 0;
                    if (curVal.length < 5) {
                        bombValue = document.getElementById('bombCode').value += document.getElementById('b' + x).value;
                        var bomb = bombValue;
                        console.log(bombValue);
                    }
                    bombValue.split('').map(char => char);
                    num1.innerHTML = (typeof bombValue[0] === "undefined") ? '-' : bombValue[0];
                    num2.innerHTML = (typeof bombValue[1] === "undefined") ? '-' : bombValue[1];
                    num3.innerHTML = (typeof bombValue[2] === "undefined") ? '-' : bombValue[2];
                    num4.innerHTML = (typeof bombValue[3] === "undefined") ? '-' : bombValue[3];
                    num5.innerHTML = (typeof bombValue[4] === "undefined") ? '-' : bombValue[4];
                });
            }

            for (let x = 4; x <= 10; x++) {
                document.getElementById('bmobile' + x).addEventListener('click', function() {
                    var curVal = document.getElementById('bombCode').value;
                    bombValue = 0;
                    if (curVal.length < 5) {
                        bombValue = document.getElementById('bombCode').value += document.getElementById('bmobile' + x).value;
                        var bomb = bombValue;
                        console.log(bombValue);
                    }
                    bombValue.split('').map(char => char);
                    num1.innerHTML = (typeof bombValue[0] === "undefined") ? '-' : bombValue[0];
                    num2.innerHTML = (typeof bombValue[1] === "undefined") ? '-' : bombValue[1];
                    num3.innerHTML = (typeof bombValue[2] === "undefined") ? '-' : bombValue[2];
                    num4.innerHTML = (typeof bombValue[3] === "undefined") ? '-' : bombValue[3];
                    num5.innerHTML = (typeof bombValue[4] === "undefined") ? '-' : bombValue[4];
                });
            }


        });
        
        replayAudio.addEventListener("click", function() {
           audio.pause();
           audio.currentTime = 0;
           audio.play();
        });

        muteAudio.addEventListener("click", function() {
            if(muteAudio.checked) {
                audioPlay.volume = 0;
            } else {
                audioPlay.volume = 0.3;
            }
        });
        
        function bomba() {
            inputValue = bomb.value.split('').map(char => char);

            const myArray = inputValue
                .map(char => (isNaN(parseInt(char)) ? undefined : char))
                .filter(value => value !== undefined);

            const mergedNumber = myArray.join('');

            bomb.value = mergedNumber;

            console.log(inputValue);

            num1.innerHTML = (typeof myArray[0] === "undefined") ? '-' : myArray[0];
            num2.innerHTML = (typeof myArray[1] === "undefined") ? '-' : myArray[1];
            num3.innerHTML = (typeof myArray[2] === "undefined") ? '-' : myArray[2];
            num4.innerHTML = (typeof myArray[3] === "undefined") ? '-' : myArray[3];
            num5.innerHTML = (typeof myArray[4] === "undefined") ? '-' : myArray[4];
        }

        // document.getElementById('hintButton').addEventListener("click", function() {
        //     document.getElementById('bombMissionStart').style.display = "none";
        //     document.getElementById('hint').style.display = "block";
        // });

        document.getElementById('returnToBomb').addEventListener("click", function() {
            document.getElementById('bombMissionStart').style.display = "block";
            document.getElementById('hint').style.display = "none";
        });

        document.getElementById('nextHint').addEventListener("click", function() {
            document.getElementById('prevHint').style.display = "block";
            document.getElementById('hint-' + hint).style.display = "none";
            hint += 1;
            document.getElementById('hint-' + hint).style.display = "block";
            if (hint == 8) {
                document.getElementById('nextHint').style.display = "none";
            }
        });

        document.getElementById('prevHint').addEventListener("click", function() {
            document.getElementById('nextHint').style.display = "block";
            document.getElementById('hint-' + hint).style.display = "none";
            hint -= 1;
            document.getElementById('hint-' + hint).style.display = "block";
            if (hint == 1) {
                document.getElementById('prevHint').style.display = "none";
            }
        });
        
        document.getElementById('exit').addEventListener("click", function() {
            document.getElementById('surrender').style.display = "block"
            document.getElementById('bombMissionStart').style.display = "none"
            var surrenderCount = 5;
            surrenderTimer = setInterval(function() {
                surrenderCount--;
                document.getElementById("surrenderText").innerHTML = "MENYERAH (" + surrenderCount + ")";
                if (surrenderCount === 0) {
                    clearInterval(surrenderTimer);
                    document.getElementById('surrenderText').style.display = "none";
                    document.getElementById('surrenderLast').style.display = "block";
                }
            }, 1000);
        });
        
        document.getElementById('notSurrender').addEventListener("click", function() {
            clearInterval(surrenderTimer);
            document.getElementById('surrender').style.display = "none";
            document.getElementById('bombMissionStart').style.display = "block";
        })
    </script>
</body>

</html>