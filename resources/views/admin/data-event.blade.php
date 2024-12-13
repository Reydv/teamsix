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
    <link href='https://fonts.googleapis.com/css?family=Anonymous Pro' rel='stylesheet'>
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
    </script>
    <link rel="icon" href="{{ asset('dist/infiniteroom.svg') }}" type="image/x-icon">
    <title>DATA EVENT</title>
</head>

<body class="bg-black text-white">
    <div class="text-center mt-8">
        <p class="text-[#FF914D] text-[25px] leading-none font-ibm tracking-[0.13em]">SETTINGS</p>
        <p class="text-[#FF914D] text-[85px] leading-none font-ibm font-black tracking-[0.15em]">DATA EVENT</p>
    </div>
    <div class="grid grid-cols-5 gap-8 mx-36 mt-8">
        <a href="{{ route('createevent') }}" class="flex justify-center items-center w-[190px] bg-white/75 hover:bg-white/90 hover:ring-4 hover:ring-white rounded-xl">
            <p class="text-4xl text-center text-secondary font-anon font-black tracking-wider"> CREATE <br> EVENT</p>
        </a>
        @foreach ($admins as $index => $admin)
        <div class="relative w-[190px] h-[190px] border-2 rounded-[10px] bg-[#FFFFFF] text-center @if ($admin->count() < 4) mr-[12.6px] @endif">
            <a href="{{ route('editevent', $admin) }}">
                <img src="{{ asset('dist/editevent.svg') }}" alt="" class="absolute top-0 right-0 w-8">
            </a>
            <div class="mt-4">
                <p class="text-center text-[14.2px] text-[#22263E] font-saira tracking-[0.09em]"><b class="text-[#22263E] font-black">{{ \Carbon\Carbon::parse($admin->tanggal_dibuat)->format('d-m-Y') }}</b> <br> {{ $admin->nama_perusahaan }}</p>
            </div>
            <div>
                <p class="font-saira text-[8.7px] text-[#ED3237] tracking-[0.06em]">PASSCODE</p>
                <p class="font-black leading-none font-saira text-[16px] text-[#ED3237] tracking-[0.15em]">{{ $admin->passcode }}
                </p>
            </div>
            <div class="flex justify-center">
                <p class="text-[#22263E] text-[15px] font-saira tracking-[0.09em] mr-3 mt-[4px] font-light">OFF</p>
                <div>
                    <label class="mt-1 relative inline-flex items-center cursor-pointer">
                        <input onclick="{{ 'changeOnOff' . $index }}()" id="{{ "switch" . $index}}" type="checkbox" class="sr-only peer" @if ($admin->isOn == true) checked @endif>
                        <div class="w-11 h-6 ring-2 ring-slate-500 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-[#00D54F]">
                        </div>
                    </label>
                </div>
                <p class="text-[#22263E] text-[15px] font-saira tracking-[0.09em] ml-3 mt-[4px] font-light">
                    ON&nbsp;&nbsp;</p>
            </div>
            <div class="text-center font-saira text-[#22263E]">
                <div>
                    <img style="display: inline" src="{{ asset('dist/people.svg') }}" alt="people">
                    <p style="display: inline" class="font-bold ml-[10px]">{{ $admin->total_peserta }} PX</p>
                </div>
                <div class="text-center font-saira text-[#22263E] mt-[3px]">
                    <p style="display: inline" class="font-black ml-[10px] tracking-[0.085em]">{{ $admin->lokasi_event }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-end-6 w-[190px] h-[190px] leading-none text-center font-ibm text-white">
            <div class="flex justify-center items-center text-black w-full h-[58px]">
                {{ $admins->links('vendor.pagination.custom') }}
            </div>
            <!-- <button class="h-[58px] tracking-[0.09em] w-full mx-auto bg-[#545454] text-center hover:text-[#FF914D]">
                <p class="text-[19px]">NEXT <br> EVENTS</p>
            </button> -->
            <div class="flex justify-center items-center">
                <a href="{{ route('dashboard') }}" class="flex h-[58px] tracking-[0.09em] w-full bg-[#545454] text-[20.5px] items-center justify-center text-center hover:text-[#FF914D] mt-[4px] hover">
                    <p class="">
                        GENERAL
                    </p>
                </a>
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="h-[58px] tracking-[0.09em] w-full mx-auto bg-[#ED3237] text-center hover:text-[#FF914D] mt-[4px]">
                    <p class="text-[20.5px] ">LOGOUT</p>
                </button>
            </form>
        </div>


    </div>


    <div class="grid grid-cols-5 gap-8 mx-36 mt-8">

    </div>

    <script>

        @foreach($admins as $index => $admin)
            function {{ 'changeOnOff' . $index }}() {
                id = {{ $admin->id }};
                const value = document.getElementById('switch' + {{ $index }}).checked ? 1 : 0;
                const extendedUrl = '{{ route('fetch.on.off', ['admin' => $admin]) }}' + '?value=' + value;
                fetch(extendedUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Response tidak diterima dari server');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data['on-hold'] == 1) {
                            alert('on')
                        } else if (data['on-hold'] == 0) {
                            alert('off')
                        } else {
                            throw new Error('Response tidak dikenali : ' + data);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('error:' + error);
                    });
            }
        @endforeach
    </script>
</body>

</html>