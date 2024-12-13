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
    <title>Create Event</title>
</head>

<body class="bg-black text-white">
    <div class="text-center mt-3">
        <p class="text-[#FF914D] text-[25px] leading-none font-ibm tracking-[0.13em]">SETTINGS</p>
        <p class="text-[#FF914D] text-[85px] leading-none font-ibm font-black tracking-[0.15em]">CREATE EVENT</p>
    </div>
    <div
        class="w-[1100px] h-[400px] rounded-[17px] border-2 bg-white mx-auto mt-4 flex justify-center items-center font-saira">
        <div class="w-[92%] h-[87%]">
            <form method="post" action="{{ route('postevent') }}">
            @csrf
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px]">
                    <div class="w-[220px] text-[#22263E] flex items-center">
                        <p>EVENT NAME</p>
                    </div>
                    <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                        <p>:</p>
                    </div>
                    <div class="w-[100%] h-[38px] text-center text-black flex justify-center items-center">
                        <input type="text" name="nama" class= "ml-[1px] w-[100%] tracking-[0.08em] font-normal">
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-[4px]">
                    <div class="flex w-[100%]">
                        <div class="flex w-[50%]">
                            <div class="w-[299px] text-[#22263E] flex items-center">
                                <p>EVENT DATE</p>
                            </div>
                            <div
                                class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="date" name="tanggal_dibuat" class="ml-[4px] w-[130px] tracking-[0.08em] uppercase font-normal">
                            </div>
                        </div>
                        <div class="flex w-[50%]">
                            <div class="w-[220px] text-[#22263E] flex items-center">
                                <p>EXPIRED DATE</p>
                            </div>
                            <div
                                class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                                <p>:</p>
                            </div>
                            <div class="w-[100%] h-[38px] text-center text-black flex justify-left items-center">
                                <input type="date" name="tanggal_kadaluarsa" class="w-[130px] tracking-[0.08em] uppercase font-normal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-[1px]">
                    <div class="w-[220px] text-[#22263E] flex items-center">
                        <p>COMPANY NAME</p>
                    </div>
                    <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                        <p>:</p>
                    </div>
                    <div class="w-[100%] h-[38px] text-center text-black flex justify-center items-center">
                        <input type="text" name="nama_perusahaan" class= "w-[100%] tracking-[0.08em] font-normal">
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-[1px]">
                    <div class="w-[220px] text-[#22263E] flex items-center">
                        <p>TOTAL PARTICIPANT</p>
                    </div>
                    <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                        <p>:</p>
                    </div>
                    <div class="w-[100%] h-[38px] text-center text-black flex justify-center items-center">
                        <input type="text" name="total_peserta" class= "w-[100%] tracking-[0.08em] font-normal">
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-[1px]">
                    <div class="w-[220px] text-[#22263E] flex items-center">
                        <p>EVENT LOCATION</p>
                    </div>
                    <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                        <p>:</p>
                    </div>
                    <div class="w-[100%] h-[38px] text-center text-black flex justify-center items-center">
                        <input type="text" name="lokasi_event" class= "w-[100%] tracking-[0.08em] font-normal">
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-[1px]">
                    <div class="w-[171px] text-[#22263E] flex items-center text-[#A02B2D]">
                        <p>PASSCODE</p>
                    </div>
                    <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                        <p>:</p>
                    </div>
                    <div class="w-[228px] h-[38px] text-center text-black flex items-center">
                        @for ($i = 1; $i <= 6; $i++)
                            <div id="{{ 'pass' . $i }}"
                                class="mr-2 w-[30px] h-[30px] border-[#22263E] border-2 rounded-[6px] bg-[#D9D9D9] flex items-center justify-center">
                            </div>
                        @endfor
                        <input id="passInput" name="passcode" type="text" class="absolute w-[220px] h-[30px] opacity-0"
                            inputmode="numeric"
                            onkeyup="
                            var start = this.selectionStart;
                            var end = this.selectionEnd;
                            this.value = this.value.toUpperCase();
                            this.setSelectionRange(start, end);
                            changeNumber();"
                            pattern=".{6,6}" maxlength="6">
                    </div>
                </div>
                <div class="flex justify-normal font-black leading-none tracking-[0.08em] text-[18px] mt-[1px]">
                    <div class="w-[220px] text-[#22263E] flex items-center">
                        <p>TEAM SIX VER</p>
                    </div>
                    <div class="w-[40px] text-center text-black flex justify-center items-center font-ibm leading-none">
                        <p>:</p>
                    </div>
                    <div class="w-[100%] h-[38px] text-center text-black flex items-center">
                        <div class="flex items-center w-[400px] h-[30px]">
                            <div class="flex w-[50%] h-[100%] font-normal items-center">
                                <label for="teamsix2" class="mr-[10px] select-none">TEAM SIX 2</label> 
                                <input id="teamsix2" type="radio" name="teamsix" value="2" class="w-[20px] h-[20px]">
                            </div>
                            <div class="flex w-[50%] h-[100%] font-normal items-center">
                                <label for="teamsix3" class="mr-[10px] select-none">TEAM SIX 3</label> 
                                <input id="teamsix3" type="radio" name="teamsix" value="3" class="w-[20px] h-[20px]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-[135px] flex justify-center items-center mt-[34px] text-[#A02B2D] text-[12.4px] font-black tracking-[0.04em]">
                    <p></p>
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

    <script>
        inputNum = document.getElementById('passInput');
        num1 = document.getElementById('pass1');
        num2 = document.getElementById('pass2');
        num3 = document.getElementById('pass3');
        num4 = document.getElementById('pass4');
        num5 = document.getElementById('pass5');
        num6 = document.getElementById('pass6');

        function changeNumber() {
            inputValue = inputNum.value.split('').map(char => char);

            const myArray = inputValue
                .map(char => (isNaN(parseInt(char)) ? undefined : char))
                .filter(value => value !== undefined);

            const mergedNumber = myArray.join('');

            inputNum.value = mergedNumber;

            console.log(inputValue);

            num1.innerHTML = (typeof myArray[0] === "undefined") ? '' : myArray[0];
            num2.innerHTML = (typeof myArray[1] === "undefined") ? '' : myArray[1];
            num3.innerHTML = (typeof myArray[2] === "undefined") ? '' : myArray[2];
            num4.innerHTML = (typeof myArray[3] === "undefined") ? '' : myArray[3];
            num5.innerHTML = (typeof myArray[4] === "undefined") ? '' : myArray[4];
            num6.innerHTML = (typeof myArray[5] === "undefined") ? '' : myArray[5];

        }
    </script>

</body>

</html>
