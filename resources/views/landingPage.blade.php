<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('/css/style1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="header">
        <a href="#landingPage" class="logo">Wenda <span>Berutu</span></a>

        {{-- <i class='fas fa-bars' id="menu-icon"></i> --}}

        <nav class="navbar">
            <a href="#landingPage" class="active">Home</a>
            <a href="#education">Education</a>
            <a href="#portofolio">Portofolio</a>
            <a href="#kontak">Contact</a>
            <a href="{{ route('login') }}">Login</a>
        </nav>
    </header>

    <section class="home" id="home">
        <div class="home-content">
            <h1>Hello, It's <span> WENDA </span></h1>
            <h3 class="text-animation">I'm a <span></span></h3>
            <p>iiiiiiiiiiii</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="btn-group">
                <a href="#" class="btn">Hire</a>
                <a href="#contact" class="btn">Contact</a>
            </div>
        </div>

        <div class="home-img">
            <img src="{{ asset('/img/photo1.jpg') }}" alt="">
        </div>
    </section>
    <section class="education" id="education">
        <h2 class="heading ">Education</h2>
        <div class="timeline-items">
            <div class="timeline-dot">
                <div class="timeline-date">2019-2021</div>
            <div class="timeline-content">
                <h3>SMA N 1 STTU JULU</h3>
                <p>SMA STTU JULU merupakan salah satu SMA di desa singgabur 
                    saya sekolah disana dan menyelesaikan pendidikan saya di jurusan 
                    IPA. 
                </p>
            </div>
            </div>        </div>

    </section>
</body>
</html>
