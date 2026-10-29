<?php
$phpVersion = htmlspecialchars(PHP_VERSION, ENT_QUOTES, 'UTF-8');
$serverApi = htmlspecialchars(PHP_SAPI, ENT_QUOTES, 'UTF-8');
$currentTime = htmlspecialchars(date('M j, Y g:i:s A'), ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#080d1d">
    <title>PHP App Preview</title>
    <style>
        :root {
            color-scheme: dark;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #080d1d;
            color: #e8efff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 24px;
            background: radial-gradient(ellipse at 50% -20%, #17254b 0, #080d1d 55%);
        }

        main {
            width: min(100%, 920px);
            margin: 0 auto;
        }

        .toolbar,
        .preview,
        .status-card,
        .info-card {
            border: 1px solid #25314b;
            background: #0b1225;
        }

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 14px 18px;
            border-radius: 14px 14px 0 0;
            color: #a9bbdb;
            font-size: 14px;
        }

        .toolbar strong {
            color: #fff;
            font-size: 15px;
        }

        .connected {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #b3c8e7;
        }

        .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #00d89a;
            box-shadow: 0 0 12px #00d89a80;
        }

        .preview {
            padding: 20px;
            border-radius: 0 0 14px 14px;
        }

        .status-card {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 26px 22px;
            border: 0;
            border-radius: 16px;
            background: linear-gradient(110deg, #063d50, #172957 78%);
        }

        .icon {
            display: grid;
            flex: 0 0 42px;
            width: 42px;
            height: 42px;
            place-items: center;
            border-radius: 50%;
            background: #08758b;
            color: #baf8ff;
            font-size: 20px;
            font-weight: 700;
        }

        h1 {
            margin: 0 0 5px;
            color: #fff;
            font-size: clamp(20px, 4vw, 25px);
            letter-spacing: -0.04em;
        }

        .subtitle {
            margin: 0;
            color: #31e6f0;
            font-size: 14px;
        }

        .status-line {
            margin: 12px 0 0;
            color: #d5e4fb;
            font-size: 14px;
        }

        .status-line .dot {
            display: inline-block;
            margin: 0 5px 0 3px;
            vertical-align: -1px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 20px;
        }

        .info-card {
            min-height: 94px;
            padding: 17px;
            border-radius: 12px;
        }

        .label {
            margin: 0 0 9px;
            color: #a9bbdb;
            font-size: 13px;
        }

        .value {
            margin: 0;
            color: #08d9e9;
            font-size: clamp(18px, 3vw, 24px);
            font-weight: 700;
        }

        .value.green {
            color: #00d89a;
        }

        .timestamp {
            margin: 18px 2px 0;
            color: #8294b3;
            font-size: 12px;
        }

        @media (max-width: 560px) {
            body {
                padding: 14px;
            }

            .toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .preview {
                padding: 13px;
            }

            .status-card {
                align-items: flex-start;
                padding: 20px 16px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main>
        <header class="toolbar">
            <strong>PHP App Preview</strong>
            <span class="connected"><span class="dot" aria-hidden="true"></span>Connected</span>
        </header>
        <section class="preview" aria-label="PHP application status">
            <div class="status-card">
                <span class="icon" aria-hidden="true">₱</span>
                <div>
                    <h1>PHP Application</h1>
                    <p class="subtitle">PHP page rendered successfully</p>
                    <p class="status-line">Status: <span class="dot" aria-hidden="true"></span>Running</p>
                </div>
            </div>
            <div class="cards">
                <article class="info-card">
                    <p class="label">PHP Version</p>
                    <p class="value"><?php echo $phpVersion; ?></p>
                </article>
                <article class="info-card">
                    <p class="label">Serving Runtime</p>
                    <p class="value green"><?php echo $serverApi; ?></p>
                </article>
            </div>
            <p class="timestamp">Page rendered at <?php echo $currentTime; ?></p>
        </section>
    </main>
</body>
</html>
