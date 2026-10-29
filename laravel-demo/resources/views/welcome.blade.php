<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090909">
    <title>Get started with Laravel</title>
    <style>
        :root {
            color-scheme: dark;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #090909;
            color: #f5f5f4;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
        }

        * {
            box-sizing: border-box;
        }

        body {
            display: grid;
            min-height: 100vh;
            margin: 0;
            padding: 32px;
            place-items: center;
            background: #090909;
        }

        .welcome {
            display: grid;
            width: min(100%, 800px);
            min-height: 346px;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            border: 1px solid #37352f;
            border-radius: 7px;
            background: #171714;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: clamp(26px, 5vw, 58px);
        }

        .eyebrow {
            margin: 0 0 12px;
            color: #f0eee9;
            font-size: 13px;
            font-weight: 650;
        }

        .intro {
            max-width: 290px;
            margin: 0 0 18px;
            color: #aaa9a1;
            font-size: 13px;
            line-height: 1.65;
        }

        .links {
            display: grid;
            gap: 12px;
        }

        .links a,
        .version a {
            color: #f04438;
            text-decoration-color: #9d2922;
            text-underline-offset: 3px;
        }

        .links a {
            font-size: 13px;
            font-weight: 550;
        }

        .links a:hover,
        .version a:hover {
            color: #ff7468;
        }

        .deploy {
            display: inline-flex;
            min-height: 37px;
            align-items: center;
            margin-top: 30px;
            padding: 0 17px;
            border: 1px solid #e7e5df;
            border-radius: 4px;
            background: #f1f0eb;
            color: #22211f;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .deploy:hover {
            background: #fff;
        }

        .version {
            margin: 34px 0 0;
            color: #85847d;
            font-size: 12px;
        }

        .brand {
            position: relative;
            display: grid;
            min-width: 0;
            overflow: hidden;
            align-content: start;
            border-left: 1px solid #f04438;
            background: #260707;
            color: #f04438;
        }

        .brand-name {
            z-index: 1;
            margin: 9px 0 0 -7px;
            font-size: clamp(52px, 8vw, 94px);
            font-weight: 750;
            letter-spacing: -0.085em;
            line-height: 1.12;
        }

        .brand-art {
            position: absolute;
            inset: 30% 0 0;
            width: 100%;
            height: 70%;
        }

        .brand-version {
            position: absolute;
            right: -14px;
            bottom: -99px;
            color: transparent;
            font-size: clamp(270px, 41vw, 430px);
            font-weight: 750;
            letter-spacing: -0.11em;
            line-height: 1;
            -webkit-text-stroke: 1px #e54835;
        }

        .brand-version::before,
        .brand-version::after {
            position: absolute;
            inset: 14px 13px;
            border: 1px solid #a93a29;
            content: "";
            transform: translate(-13px, -11px);
        }

        .brand-version::after {
            transform: translate(-26px, -22px);
        }

        @media (max-width: 560px) {
            body {
                padding: 18px;
            }

            .welcome {
                grid-template-columns: 1fr;
            }

            .content {
                min-height: 310px;
                padding: 34px;
            }

            .brand {
                min-height: 220px;
                border-top: 1px solid #f04438;
                border-left: 0;
            }

            .brand-name {
                margin-left: 14px;
                font-size: 58px;
            }

            .brand-art {
                inset: 25% 0 0;
                height: 75%;
            }

            .brand-version {
                right: -5px;
                bottom: -135px;
                font-size: 300px;
            }
        }
    </style>
</head>
<body>
    <main class="welcome">
        <section class="content" aria-labelledby="welcome-title">
            <h1 class="eyebrow" id="welcome-title">Laravel</h1>
            <p class="intro">With so many options available to you, we suggest you start with the following:</p>
            <nav class="links" aria-label="Laravel resources">
                <a href="https://laravel.com/docs">Read the Documentation ↗</a>
                <a href="https://laracasts.com">Watch video tutorials at Laracasts ↗</a>
            </nav>
            <a class="deploy" href="https://forge.laravel.com">Deploy now</a>
            <p class="version">v{{ \Illuminate\Foundation\Application::VERSION }} &nbsp; <a href="https://laravel.com/docs/12.x/releases">View changelog ↗</a></p>
        </section>
        <aside class="brand" aria-label="Laravel {{ \Illuminate\Foundation\Application::VERSION }}">
            <span class="brand-name">Laravel</span>
            <svg class="brand-art" viewBox="0 0 400 240" preserveAspectRatio="none" aria-hidden="true">
                <path d="M0 0H400V240H0z" fill="#260707"/>
                <path d="M24 0v240M52 0v240M80 0v240M108 0v240M136 0v240" stroke="#dc4a32" stroke-opacity=".7"/>
                <path d="M0 54h136v30H0m0 54h136v30H0" fill="none" stroke="#dc4a32" stroke-opacity=".72"/>
                <path d="M260 24c-62 0-98 31-98 75 0 29 18 47 50 56-38 8-61 25-61 51 0 30 33 49 91 49 68 0 111-29 111-72 0-29-19-48-53-57 34-10 53-29 53-55 0-29-32-47-87-47h-6Z" fill="none" stroke="#ef4b35" stroke-width="2"/>
                <path d="M257 38c-47 0-74 22-74 56 0 25 18 40 51 49-41 8-64 23-64 48 0 22 25 37 67 37 50 0 83-22 83-56 0-25-18-41-52-50 34-9 53-24 53-46 0-24-24-38-64-38Z" fill="none" stroke="#f08a39" stroke-width="2"/>
                <path d="M256 54c-31 0-49 14-49 38 0 19 13 32 41 41-33 7-51 19-51 37 0 16 17 26 45 26 34 0 55-15 55-38 0-18-12-30-38-39 24-8 39-20 39-37 0-18-15-28-42-28Z" fill="none" stroke="#ed4c35" stroke-width="2"/>
            </svg>
            <span class="brand-version" aria-hidden="true">12</span>
        </aside>
    </main>
</body>
</html>
