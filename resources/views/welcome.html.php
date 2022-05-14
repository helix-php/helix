<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp,notranslate,noimageindex"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i&amp;display=swap" rel="stylesheet">
    <title>Welcome to Helix</title>
    <!--
    <?php
    $hue ??= random_int(0, 360);
    $dark = static fn (float $alpha = 1): string => "hsla($hue, 20%, 45%, $alpha)";
    $light = static fn (float $alpha = 1): string => "hsla($hue, 10%, 95%, $alpha)";
    ?>
    -->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100vw;
            height: 100vh;
            font-family: Roboto, Helvetica, sans-serif;
            font-feature-settings "kern", "liga", "calt";
        }

        body {
            background: <?=$light()?>;
            color: rgba(255, 255, 255, .8);
            background: radial-gradient(ellipse at bottom, <?=$dark()?> 0%, hsl(<?=$hue?>, 20%, 13%) 100%);
            background-attachment: fixed;
            font: 16px/1.5 sans-serif;
        }

        h1, h2, h3 {
            font-family: Roboto, Helvetica, sans-serif;
            font-weight: 100;
        }

        a {
            color: <?=$light()?>;
            text-decoration: none;
        }

        .logo img {
            height: 200px;
            filter: drop-shadow(2px 0 10px rgba(0, 0, 0, .2));
            opacity: .8;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .content > svg {
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: -1;
            filter: blur(10px);
        }

        .status {
            padding-bottom: 4em;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        nav,
        .status code {
            border-radius: 4px;
            background: rgba(0, 0, 0, .3);
            box-shadow: 0 0 45px -15px hsl(<?=$hue?>, 20%, 2%);
            color: <?=$dark()?>;
            font-family: Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            align-items: center;
            padding-right: 20px;
            display: inline-flex;
            position: relative;
            word-wrap: break-word;
            z-index: 1;
        }

        nav {
            padding: 10px 20px;
            margin-bottom: 10px;
            background: rgba(0, 0, 0, .1);
        }

        .check {
            background: <?=$dark()?>;
            border-radius: 3px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 37px;
            margin: 6px 16px 6px 8px;
        }

        .check svg {
            overflow: hidden;
            vertical-align: text-bottom;
            fill: <?=$light()?>;
        }
    </style>
    <script>
        let refreshDuration = 10000;
        let refreshTimeout;
        let numPointsX;
        let numPointsY;
        let unitWidth;
        let unitHeight;
        let points;
        let svg;
        function load() {
            svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svg.setAttribute('width', window.innerWidth.toString());
            svg.setAttribute('height', window.innerHeight.toString());
            document.querySelector('#bg').appendChild(svg);

            let unitSize = (window.innerWidth + window.innerHeight) / 4;
            numPointsX = Math.ceil(window.innerWidth / unitSize) + 1;
            numPointsY = Math.ceil(window.innerHeight / unitSize) + 1;
            unitWidth = Math.ceil(window.innerWidth / (numPointsX - 1));
            unitHeight = Math.ceil(window.innerHeight / (numPointsY - 1));

            points = [];

            for (let y = 0; y < numPointsY; y++) {
                for (let x = 0; x < numPointsX; x++) {
                    points.push({x: unitWidth * x, y: unitHeight * y, originX: unitWidth * x, originY: unitHeight * y});
                }
            }

            randomize();

            for (let i = 0; i < points.length; i++) {
                if (
                    points[i].originX !== unitWidth * (numPointsX - 1) &&
                    points[i].originY !== unitHeight * (numPointsY - 1)
                ) {
                    let topLeftX = points[i].x;
                    let topLeftY = points[i].y;
                    let topRightX = points[i + 1].x;
                    let topRightY = points[i + 1].y;
                    let bottomLeftX = points[i + numPointsX].x;
                    let bottomLeftY = points[i + numPointsX].y;
                    let bottomRightX = points[i + numPointsX + 1].x;
                    let bottomRightY = points[i + numPointsX + 1].y;

                    let rand = Math.floor(Math.random() * 2);

                    for (let n = 0; n < 2; n++) {
                        let polygon = document.createElementNS(svg.namespaceURI, 'polygon');

                        if (rand === 0) {
                            if (n === 0) {
                                polygon.point1 = i;
                                polygon.point2 = i + numPointsX;
                                polygon.point3 = i + numPointsX + 1;
                                polygon.setAttribute('points', topLeftX + ',' + topLeftY + ' ' + bottomLeftX + ',' +
                                    bottomLeftY + ' ' + bottomRightX + ',' + bottomRightY);
                            } else if (n === 1) {
                                polygon.point1 = i;
                                polygon.point2 = i + 1;
                                polygon.point3 = i + numPointsX + 1;
                                polygon.setAttribute('points', topLeftX + ',' + topLeftY + ' ' + topRightX + ',' +
                                    topRightY + ' ' + bottomRightX + ',' + bottomRightY);
                            }
                        } else if (rand === 1) {
                            if (n === 0) {
                                polygon.point1 = i;
                                polygon.point2 = i + numPointsX;
                                polygon.point3 = i + 1;
                                polygon.setAttribute('points', topLeftX + ',' + topLeftY + ' ' + bottomLeftX + ',' +
                                    bottomLeftY + ' ' + topRightX + ',' + topRightY);
                            } else if (n === 1) {
                                polygon.point1 = i + numPointsX;
                                polygon.point2 = i + 1;
                                polygon.point3 = i + numPointsX + 1;
                                polygon.setAttribute('points', bottomLeftX + ',' + bottomLeftY + ' ' +
                                    topRightX + ',' + topRightY + ' ' + bottomRightX + ',' + bottomRightY);
                            }
                        }

                        polygon.setAttribute('fill', 'rgba(0,0,0,' + (Math.random() / 3) + ')');
                        let animate = document.createElementNS('http://www.w3.org/2000/svg', 'animate');
                        animate.setAttribute('fill', 'freeze');
                        animate.setAttribute('attributeName', 'points');
                        animate.setAttribute('dur', refreshDuration + 'ms');
                        animate.setAttribute('calcMode', 'linear');
                        polygon.appendChild(animate);
                        svg.appendChild(polygon);
                    }
                }
            }

            refresh();
        }
        function randomize() {
            for (let i = 0; i < points.length; i++) {
                if (points[i].originX !== 0 && points[i].originX !== unitWidth * (numPointsX - 1)) {
                    points[i].x = points[i].originX + Math.random() * unitWidth - unitWidth / 2;
                }
                if (points[i].originY !== 0 && points[i].originY !== unitHeight * (numPointsY - 1)) {
                    points[i].y = points[i].originY + Math.random() * unitHeight - unitHeight / 2;
                }
            }
        }
        function refresh() {
            randomize();
            for (let i = 0; i < svg.childNodes.length; i++) {
                let polygon = svg.childNodes[i];
                let animate = polygon.childNodes[0];
                if (animate.getAttribute('to')) {
                    animate.setAttribute('from', animate.getAttribute('to'));
                }
                animate.setAttribute('to', points[polygon.point1].x + ',' + points[polygon.point1].y + ' ' + points[polygon.point2].x + ',' + points[polygon.point2].y + ' ' + points[polygon.point3].x + ',' + points[polygon.point3].y);
                animate.beginElement();
            }
            refreshTimeout = setTimeout(() => refresh(), refreshDuration);
        }
        function resize() {
            svg.remove();
            clearTimeout(refreshTimeout);
            load();
        }
        window.onresize = resize;
        window.onload = load;
    </script>
</head>
<body>
<main class="content" id="bg">
    <section class="logo">
        <img src="data:image/png;base64,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" alt="logo" />
    </section>
    <h1>Welcome to <?=\htmlspecialchars(($name ?? 'Helix') ?: 'Helix')?></h1>
    <nav>
        <a href="<?=$route->generate('api.articles')?>">Articles</a>
    </nav>
    <section class="status">
        <code>
            <span class="check">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                </svg>
            </span>
            <span>
                Your application is now ready
            </span>
        </code>
    </section>
</main>
</body>
</html>
