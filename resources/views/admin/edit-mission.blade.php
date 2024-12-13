<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Saira Condensed' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans Condensed' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/seven-segment" rel="stylesheet">
    @vite('resources/css/app.css')

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
    <title>Mission Settings</title>
    <style>
        @layer base {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
</head>

<body class="bg-black text-white">
    <div class="text-center mt-3">
        <p class="text-[#FF914D] text-[25px] leading-none font-ibm tracking-[0.13em]">SETTINGS</p>
        <p class="text-[#FF914D] text-[85px] leading-none font-ibm font-black tracking-[0.15em]">MISSION SET</p>
    </div>
    <div class="w-[1100px] h-[400px] rounded-[17px] border-2 bg-white mx-auto mt-4 flex justify-center items-center font-saira">
        <div class="w-[92%] h-[87%]">
            <form action="{{ route('updateConfig') }}">
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-4">
                    <div class="flex w-[100%]">
                        <div class="flex w-[50%]">
                            <div class="w-[299px] text-[#22263E] flex items-center">
                                <p>M-0. Training Mission</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_0" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[0] }}" @endif>
                            </div>
                        </div>
                        <div class="flex w-[50%] ml-2">
                            <div class="w-[220px] text-[#22263E] flex items-center text-[17px]">
                                <p>M-1. Central Station</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_1" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[1] }}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-4">
                    <div class="flex w-[100%]">
                        <div class="flex w-[50%]">
                            <div class="w-[299px] text-[#22263E] flex items-center">
                                <p>M-2. Terminal</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_2" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[2] }}" @endif>
                            </div>
                        </div>
                        <div class="flex w-[50%] ml-2">
                            <div class="w-[220px] text-[#22263E] flex items-center">
                                <p>M-3. Elevator</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_3" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[3] }}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-4">
                    <div class="flex w-[100%]">
                        <div class="flex w-[50%]">
                            <div class="w-[299px] text-[#22263E] flex items-center">
                                <p>M-4. Rollercoaster</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_4" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[4] }}" @endif>
                            </div>
                        </div>
                        <div class="flex w-[50%] ml-2">
                            <div class="w-[220px] text-[#22263E] flex items-center">
                                <p>M-5. Subway</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_5" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[5] }}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-4">
                    <div class="flex w-[100%]">
                        <div class="flex w-[50%]">
                            <div class="w-[299px] text-[#22263E] flex items-center">
                                <p>M-6. Cruise Ship</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_6" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[6] }}" @endif>
                            </div>
                        </div>
                        <div class="flex w-[50%] ml-2">
                            <div class="w-[220px] text-[#22263E] flex items-center">
                                <p>M-7. Prison</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_7" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[7] }}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-4">
                    <div class="flex w-[100%]">
                        <div class="flex w-[50%]">
                            <div class="w-[299px] text-[#22263E] flex items-center">
                                <p>M-8. Bus</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_8" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[8] }}" @endif>
                            </div>
                        </div>
                        <div class="flex w-[50%] ml-2">
                            <div class="w-[220px] text-[#22263E] flex items-center">
                                <p>M-9. Bank</p>
                            </div>
                            <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="number" name="mission_9" class="text-center w-[100%] tracking-[0.08em] font-normal" @if(isset($time[0])) value="{{ $time[9] }}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="saveTextYes" class="w-[135px] flex justify-center items-center mt-[30px] text-[#A02B2D] text-[12.4px] font-black tracking-[0.04em]">
                    {{ isset($save) ? $save : '' }}
                </div>
                <div class="flex justify-between items-center mt-[3px] w-[450px]">
                    <button type="submit" class="bg-[#545454] w-[135px] h-[35px] flex justify-center items-center leading-none font-ibm tracking-[0.15em] font-black border-[#FF914D] hover:border-2">
                        SAVE
                    </button>
                    <a href="{{ route('dataevent') }}" class="bg-[#545454] w-[135px] h-[35px] flex justify-center items-center leading-none font-ibm tracking-[0.15em] font-black border-[#FF914D] hover:border-2">
                        DATA EVENT
                    </a>
                    <a href="{{ route('dashboard') }}" class="bg-[#545454] w-[135px] h-[35px] flex justify-center items-center leading-none font-ibm tracking-[0.15em] font-black border-[#FF914D] hover:border-2">
                        SETTINGS
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>