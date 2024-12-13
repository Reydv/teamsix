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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="icon" href="{{ asset('dist/infiniteroom.svg') }}" type="image/x-icon">
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
    <title>TEAM SIX</title>
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
    <section id="present" class="w-[100vw] h-full md:h-[100vh] flex justify-center items-center">
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
            <div class="w-fit mx-auto">
                <button id="start" class="mt-36 px-16 py-4 bg-secondary rounded-xl text-white text-4xl font-ibm font-black tracking-widest hover:bg-secondary/75">
                    <h1>Team Six - Ready for Operation</h1>
                </button>
            </div>
        </div>
    </section>
    <section id="mainMenu" style="display: none;">
        <div class="h-4 w-[100%]"></div>
        <div class="flex justify-center md:flex md:justify-evenly mb-12 md:mb-0">
            <div class="md:flex-1">
            </div>
            <div class="flex-initial w-[650px]">
                <div class="flex justify-center items-center h-[80px]">
                    <img src="{{ asset('dist/infiniteroom.svg') }}" width="40px" height="40px" alt="logo">
                    <p class="ml-2 font-montserrat text-[35px] font-black">INFINITE ROOM</p>
                </div>
            </div>
            <div class="hidden md:flex md:flex-1 justify-center items-center">
                <button id="adminLogin" class="hover:border-2 w-[110px] h-[30px;] font-ibm bg-[#7C746C] rounded-[8px] font-black tracking-[0.05em]">
                    SETTINGS
                </button>
            </div>
        </div>
        <div class="w-fit md:w-[1000px] mx-auto font-saira font-black text-center">
            <p class="mb-4 md:mb-0 text-8xl md:text-[200px] leading-none">TEAM SIX</p>
            <p class="mb-8 text-3xl md:text-[35px] leading-none tracking-[0.08em]">COUNTERTERRORISM SPECIAL DETACHMENT</p>
        </div>
        <p class="mt-24 md:mt-0 text-2xl md:text-[38px] text-center font-black text-primary md:tracking-widest">PILIH MISI ANDA</p>
        <div class="mx-auto font-ibm text-center mt-8">
        </div>
        <div class="flex gap-8 w-fit mx-auto mt-2">
            <button id="six2Code" class="px-8 py-4 md:px-16 md:py-4 bg-secondary rounded-lg text-white text-xl md:text-5xl font-saira font-black leading-none hover:ring-2 hover:ring-gold hover:text-gold ease-in-out duration-200"> TEAM SIX 2 <br> <span class="text-base md:text-2xl font-ibm tracking-wide">THE BEGINNING</span>
            </button>
            <button id="six3Code" class="px-8 py-4 md:px-16 md:py-4 bg-secondary/75 rounded-lg text-white text-xl md:text-5xl font-saira font-black leading-none hover:ring-2 hover:ring-gold hover:text-gold ease-in-out duration-200"> TEAM SIX 3 <br> <span class="mt-px text-base md:text-2xl font-ibm tracking-wide">THE LAST TEST</span>
            </button>
        </div>

        <div id="passSection" style="display: none;" class="items-center justify-center absolute top-0 left-0 h-[100%] w-[100%] bg-[#22263E]/65 backdrop-brightness-[0.19] z-10 transition-all">
            <div class="text-center">
                <div class="mb-12 mt-[60px]">
                    <p class="text-primary font-ibm text-2xl md:text-[55px] font-black tracking-[0.085em]">INPUT YOUR PASSCODE</p>
                </div>
                <input id="passcode" type="text" class="text-2xl md:text-[50px] bg-black w-30 h-fit px-[24px] py-0 opacity-0 focus:placeholder:text-transparent" inputmode="numeric" onkeyup="
                var start = this.selectionStart;
                var end = this.selectionEnd;
                this.value = this.value.toUpperCase();
                this.setSelectionRange(start, end);
                changeNumber();" pattern=".{6,6}" maxlength="6">
                <div class="absolute flex items-center justify-center top-0 left-0 h-[100%] w-[100%] bg-inherit -z-10">
                    <div id="passcodeContainer" class="border-[#808080] bg-black flex mx-auto px-12 md:gap-0 gap-8 w-fit h-fit md:w-[618px] md:h-[70px] -mt-12">
                        @for ($i = 1; $i <= 6; $i++) <div id="{{ 'num' . $i }}" class="text-6xl md:text-[42px] text-secondary font-sSegment flex justify-center items-center w-fit h-fit md:w-[103px] md:h-[70Wpx] md:mt-5">
                            -
                    </div>
                    @endfor
                </div>
            </div>
            <div>
                <p class="md:mt-16 text-primary font-ibm font-black mt-12 text-[20px] tracking-widest">HUBUNGI ADMIN JIKA TIDAK
                    MEMILIKI PASSCODE</p>
            </div>
            <div class="flex justify-between mt-10 mx-auto w-[200px]">
                <button onclick="exit()" class="rounded-[8px] w-[55px] h-[55px] hover:w-100 bg-black">
                    <p class="hover:text-[50px] font-ibm text-[35px] text-[#ff001f] leading-none">X</p>
                </button>
                <button onclick="enterPasscode()" class="rounded-[8px] w-[55px] h-[55px] hover:w-100 hover:h-100 bg-black">
                    <img src="{{ asset('dist/enter.svg') }}" width="40px" height="40px" class="hover:w-[50px] mx-auto rotateimg180" alt="enter">
                </button>
            </div>
        </div>
        
        <div id="passSectionAdmin" style="display: none;" class="items-center justify-center absolute top-0 left-0 h-[100%] w-[100%] bg-[#22263E]/65 backdrop-brightness-[0.19] z-10 transition-all">
            <div class="text-center">
                <div class="mb-2 mt-[15px]">
                    <p class="text-[#FF914D] font-ibm text-[19px] font-black tracking-[0.13em]">HALAMAN KHUSUS ADMIN</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-2 mt-[2px]">
                        <p class="text-[#FF914D] font-ibm text-[55px] font-black tracking-[0.1em]">USER NAME</p>
                    </div>
                    <input id="usernameAdmin" type="text" name="email" class="hover:ring-2 text-[50px] bg-black w-[670px] h-30 opacity-1 focus:placeholder:text-transparent text-center caret-transparent leading-none tracking-[0.04em] font-saira">
                    <div class="mb-2 mt-[2px]">
                        <p class="text-[#FF914D] font-ibm text-[55px] font-black tracking-[0.123em]">PASSWORD</p>
                    </div>
                    <div>
                        <input id="passwordAdmin" type="password" name="password" class="hover:ring-2 text-[50px] bg-black w-[670px] h-30 opacity-1 focus:placeholder:text-transparent text-center caret-transparent leading-none tracking-[0.04em] font-saira">
                    </div>
                    <div class="flex justify-between mt-10 mx-auto w-[200px]">
                        <button onclick="exit()" class="rounded-[8px] w-[55px] h-[55px] hover:w-100 bg-black">
                            <p class="hover:text-[50px] font-ibm text-[35px] text-[#ff001f] leading-none">X</p>
                        </button>
                        <button type="submit" class="rounded-[8px] w-[55px] h-[55px] hover:w-100 hover:h-100 bg-black">
                            <img src="{{ asset('dist/enter.svg') }}" width="40px" height="40px" class="hover:w-[60px]" alt="enter">
                        </button>
                    </div>
                </form>
            </div>
            <form id="userForm" action="" class="">
            </form>
        </div>
    </section>
</body>

<script>
    let inputNum = document.getElementById('passcode');
    let inputNumCon = document.getElementById('passcodeContainer');
    let num1 = document.getElementById('num1');
    let num2 = document.getElementById('num2');
    let num3 = document.getElementById('num3');
    let num4 = document.getElementById('num4');
    let num5 = document.getElementById('num5');
    let num6 = document.getElementById('num6');
    let ps = document.getElementById("passSection");
    let psd = document.getElementById("passSectionAdmin");
    let usrd = document.getElementById("usernameAdmin");
    let pswd = document.getElementById("passwordAdmin");
    let currentSix = 0;
    const route = "{{ route('teamsix.check') }}";
    const route2 = "{{ route('teamsix.check.fetch') }}";
    
    document.getElementById('start').addEventListener("click", function() {
        document.getElementById('present').style.display = "none";
        document.getElementById('mainMenu').style.display = "block";
        ps.style.display = "none";
        
        let audio = new Audio('{{ asset('dist/introduction.mp3') }}');
        audio.play();
        audio.volume = 0.1;
        audio.loop = true;
    });

    document.getElementById('adminLogin').addEventListener("click", function() {
        ps.style.display = "flex";
        psd.style.display = "flex";
        console.log("admin");
    });
    
    document.getElementById('six2Code').addEventListener("click", function() {
       currentSix = 2;
       ps.style.display = "flex";
       
       console.log(currentSix);
    });
    
    document.getElementById('six3Code').addEventListener("click", function() {
       currentSix = 3;
       ps.style.display = "flex";
       
       console.log(currentSix);
    });

    inputNum.addEventListener('mouseover', function() {
        inputNumCon.classList.add('border-2')
    });

    inputNum.addEventListener('mouseout', function() {
        inputNumCon.classList.remove('border-2')
    });

    inputNum.addEventListener('click', function() {
        inputNumCon.classList.remove('border-2')
    });

    function changeNumber() {
        inputValue = inputNum.value.split('').map(char => char);

        const myArray = inputValue
            .map(char => (isNaN(parseInt(char)) ? undefined : char))
            .filter(value => value !== undefined);

        // console.log(myArray);

        const mergedNumber = myArray.join('');

        inputNum.value = mergedNumber;

        // console.log(mergedNumber);

        num1.innerHTML = (typeof myArray[0] === "undefined") ? '-' : myArray[0];
        num2.innerHTML = (typeof myArray[1] === "undefined") ? '-' : myArray[1];
        num3.innerHTML = (typeof myArray[2] === "undefined") ? '-' : myArray[2];
        num4.innerHTML = (typeof myArray[3] === "undefined") ? '-' : myArray[3];
        num5.innerHTML = (typeof myArray[4] === "undefined") ? '-' : myArray[4];
        num6.innerHTML = (typeof myArray[5] === "undefined") ? '-' : myArray[5];


    }

    function exit() {
        ps.style.display = "none";
        psd.style.display = "none";
        // psd.classList.add('hidden');

        document.getElementById('passcode').value = "";
        num1.innerHTML = '-';
        num2.innerHTML = '-';
        num3.innerHTML = '-';
        num4.innerHTML = '-';
        num5.innerHTML = '-';
        num6.innerHTML = '-';

        usrd.value = '';
        pswd.value = '';
        
        console.log("exit");
    }

    function enterPasscode() {
        if (inputNum.value.length == 6) {
            mergedNumber = inputNum.value.split('').map(char => char).join('');
            let currentRoute = `${route2}?passcode=${encodeURIComponent(mergedNumber)}&teamsix=${currentSix}`;
            fetch(currentRoute)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Response tidak diterima dari server');
                    }
                    return response.text();
                })
                .then(data => {
                    let nextRoute = `${route}?passcode=${encodeURIComponent(inputNum.value)}&teamsix=${currentSix}`;
                    if (data) {
                        form = document.getElementById('userForm');
                        form.action = nextRoute;
                        window.location.href = nextRoute;
                        // form.submit();
                    } else {
                        inputNumCon.classList.remove('bg-black');
                        inputNumCon.classList.add('bg-[#FF0000]');
                        setTimeout(function() {
                            inputNumCon.classList.remove('bg-[#FF0000]');
                            inputNumCon.classList.add('bg-black');
                            setTimeout(function() {
                                inputNumCon.classList.remove('bg-black');
                                inputNumCon.classList.add('bg-[#FF0000]');
                                setTimeout(function() {
                                    inputNumCon.classList.remove('bg-[#FF0000]');
                                    inputNumCon.classList.add('bg-black');
                                }, 100)

                            }, 100)
                        }, 100)

                    }
                })
                .catch(error => {
                    // console.error('Error:', error);
                    // alert('error:' + error);
                });
        } else {
            inputNumCon.classList.remove('bg-black');
            inputNumCon.classList.add('bg-[#FF0000]');
            setTimeout(function() {
                inputNumCon.classList.remove('bg-[#FF0000]');
                inputNumCon.classList.add('bg-black');
                setTimeout(function() {
                    inputNumCon.classList.remove('bg-black');
                    inputNumCon.classList.add('bg-[#FF0000]');
                    setTimeout(function() {
                        inputNumCon.classList.remove('bg-[#FF0000]');
                        inputNumCon.classList.add('bg-black');
                    }, 100)
                }, 100)
            }, 100)
        }
    }

    inputNum.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            if (inputNum.value.length == 6) {
                mergedNumber = inputNum.value.split('').map(char => char).join('');
                let currentRoute = `${route2}?passcode=${encodeURIComponent(mergedNumber)}&teamsix=${currentSix}`;
                fetch(currentRoute)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Response tidak diterima dari server');
                        }
                        return response.text();
                    })
                    .then(data => {
                        let nextRoute = `${route}?passcode=${encodeURIComponent(inputNum.value)}&teamsix=${encodeURIComponent(currentSix)}`;
                        if (data) {
                            form = document.getElementById('userForm');
                            form.action = nextRoute;
                            window.location.href = nextRoute;
                            // form.submit();
                        } else {
                            inputNumCon.classList.remove('bg-black');
                            inputNumCon.classList.add('bg-[#FF0000]');
                            setTimeout(function() {
                                inputNumCon.classList.remove('bg-[#FF0000]');
                                inputNumCon.classList.add('bg-black');
                                setTimeout(function() {
                                    inputNumCon.classList.remove('bg-black');
                                    inputNumCon.classList.add('bg-[#FF0000]');
                                    setTimeout(function() {
                                        inputNumCon.classList.remove('bg-[#FF0000]');
                                        inputNumCon.classList.add('bg-black');
                                    }, 100)

                                }, 100)
                            }, 100)

                        }
                    })
                    .catch(error => {
                        //console.error('Error:', error);
                        //alert('error:' + error);
                    });
            } else {
                inputNumCon.classList.remove('bg-black');
                inputNumCon.classList.add('bg-[#FF0000]');
                setTimeout(function() {
                    inputNumCon.classList.remove('bg-[#FF0000]');
                    inputNumCon.classList.add('bg-black');
                    setTimeout(function() {
                        inputNumCon.classList.remove('bg-black');
                        inputNumCon.classList.add('bg-[#FF0000]');
                        setTimeout(function() {
                            inputNumCon.classList.remove('bg-[#FF0000]');
                            inputNumCon.classList.add('bg-black');
                        }, 100)
                    }, 100)
                }, 100)
            }
        }
    });
</script>

</html>