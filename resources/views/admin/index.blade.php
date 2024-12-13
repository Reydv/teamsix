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
    </script>
    <link rel="icon" href="{{ asset('dist/infiniteroom.svg') }}" type="image/x-icon">
    <title>Admin</title>
</head>
<body class="bg-black text-white">
    <div class="text-center mt-10">
        <p class="text-[#FF914D] text-[25px] leading-none font-ibm tracking-[0.13em]">SETTINGS</p>
        <p class="text-[#FF914D] text-[85px] leading-none font-ibm font-black tracking-[0.15em]">GENERAL</p>
    </div>
    <div class="flex justify-between items-center mx-auto w-[820px] mt-[70px] font-ibm text-[35px] font-black">
        <a href="{{ route('createevent') }}" class="rounded-[13px] w-[400px] h-[85px] bg-[#FF3131] flex justify-center items-center border-white tracking-[0.1em] hover:border-2">CREATE EVENT</a>
        <a href="{{ route('editConfig') }}" class="rounded-[13px] w-[400px] h-[85px] bg-[#FF3131] flex justify-center items-center border-white tracking-[0.1em] hover:border-2">
            MISSION SETTING
        </a>
    </div>
    <div class="flex justify-center items-center">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-[#545454] w-[160px] h-[60px] mt-[50px] leading-none tracking-[0.07em] font-ibm text-[20px] hover:border-2 border-white">
            LOGOUT
        </button>
        </form>
    </div>
</body>
</html>