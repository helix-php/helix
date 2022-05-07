<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>

    <title>An Error Occurred: <?=$code->getReasonPhrase()?></title>

    <style>
        html, body {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            margin: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            letter-spacing: .05em;
            text-transform: uppercase;
            color: rgb(100, 85, 143);
            min-height: 100vh;
            background: #eff2f7 url(data:image/svg+xml;base64,<?=base64_encode(file_get_contents(__DIR__ . '/bg.svg'))?>) bottom center no-repeat;
            background-size: 100vw auto;
            font-size: 1.4em;
        }

        main {
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .code,
        .message {
            width: auto;
            padding: 10px 0;
        }

        .code {
            font-size: 200%;
        }

        .message {
            border-top: rgba(117, 104, 155, .3) 1px solid;
            padding: 20px 30px;
        }
    </style>
</head>
<body>
    <main>
        <section class="code"><?=$code->getCode()?></section>
        <section class="message"><?=$code->getReasonPhrase()?></section>
    </main>
</body>
</html>
