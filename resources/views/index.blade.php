<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="World In Need Baptist Church Missions Conference, October 2025!">
    <title>Missions Conference - World In Need Baptist Church Maguikay</title>
    <link rel="icon" type="image" href="{{ asset('assets/img/WINBC1.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <main class="container">
        <header class="homepage">
            <div class="home__title" role="banner">
                <p>Press On</p>
                <h1>In Missions</h1>
            </div>

            <div class="home__address">
                <p>World In Need Baptist Church Maguikay</p>
            </div>

            <div class="missions__date">
                <time datetime="2025-10">October 2025</time>
            </div>

            <div class="home__btn">
                <a href="{{route('register__now')}}" class="home__btn1 center__btn">Register Now!</a>
            </div>

            <h2 class="stats__heading" aria-live="polite">Number of People Registered</h2>

            <section class="statistics" aria-label="Registration statistics">
                <div class="form-group">
                    <span id="Pastor" aria-label="Registered Pastors" class="registered__label">0 Pastors</span>
                    <span id="Missionary" aria-label="Registered Missionaries" class="registered__label">0 Missionaries</span>
                    <span id="Pwife" aria-label="Registered Pastor's Wives" class="registered__label">0 Pastor's Wives</span>
                    <span id="Mwife" aria-label="Registered Missionary's Wives" class="registered__label">0 Missionary's Wives</span>
                    <span id="Churchworker" aria-label="Registered Church Workers" class="registered__label">0 Church Workers</span>
                    <span id="Biblestudent" aria-label="Registered Bible Students" class="registered__label">0 Bible Students</span>
                </div>
            </section>
        </header>
    </main>
</body>
</html>