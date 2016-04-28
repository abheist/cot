<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>404 | COTANZ</title>
    <!-- Behavioral Meta Data -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/styles/css/styles.css" />
    <link rel="favicon" href="logo.png">
    <link rel="icon" href="logo.png">
</head>

<body>
    <div id="fb-root"></div>
    <div id="container" class="wrapper">
        <ul id="scene" class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15">
            <li class="layer" data-depth="0.00"></li>
            <li class="layer" data-depth="0.10">
                <div class="background"></div>
            </li>
            <li class="layer" data-depth="0.10">
                <div class="light orange b phase-4"></div>
            </li>
            <li class="layer" data-depth="0.10">
                <div class="light purple c phase-5"></div>
            </li>
            <li class="layer" data-depth="0.10">
                <div class="light orange d phase-3"></div>
            </li>
            <li class="layer" data-depth="0.15">
                <ul class="rope depth-10">
                    <li><img src="assets/images/rope.png" alt="Rope"></li>
                    <li class="hanger position-2">
                        <div class="board cloud-2 swing-1"></div>
                    </li>
                    <li class="hanger position-4">
                        <div class="board cloud-1 swing-3"></div>
                    </li>
                    <li class="hanger position-8">
                        <div class="board birds swing-5"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.20">
                <h1 style="font-size: 150px; font-weight: bold; margin-top: 50px;">404</h1>
            </li>
            <li class="layer" data-depth="0.20">
                <h1 style="font-size: 150px; font-weight: bold; margin-top: 270px;">COTANZ</h1>
            </li>
            <li class="layer" data-depth="0.30">
                <ul class="rope depth-30">
                    <li><img src="assets/images/rope.png" alt="Rope"></li>
                    <li class="hanger position-1">
                        <div class="board cloud-1 swing-3"></div>
                    </li>
                    <li class="hanger position-5">
                        <div class="board cloud-4 swing-1"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.30">
                <div class="wave paint depth-30"></div>
            </li>
            <li class="layer" data-depth="0.40">
                <div class="wave plain depth-40"></div>
            </li>
            <li class="layer" data-depth="0.50">
                <div class="wave paint depth-50"></div>
            </li>
            <li class="layer" data-depth="0.60">
                <div class="lighthouse depth-60"></div>
            </li>
            <li class="layer" data-depth="0.60">
                <ul class="rope depth-60">
                    <li><img src="assets/images/rope.png" alt="Rope"></li>
                    <li class="hanger position-3">
                        <div class="board birds swing-5"></div>
                    </li>
                    <li class="hanger position-6">
                        <div class="board cloud-2 swing-2"></div>
                    </li>
                    <li class="hanger position-8">
                        <div class="board cloud-3 swing-4"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.60">
                <div class="wave plain depth-60"></div>
            </li>
            <li class="layer" data-depth="0.80">
                <div class="wave plain depth-80"></div>
            </li>
            <li class="layer" data-depth="1.00">
                <div class="wave paint depth-100"></div>
            </li>
        </ul>
    </div>
    <!-- Scripts -->
    <script src="assets/scripts/js/libraries.min.js"></script>
    <script src="deploy/jquery.parallax.js"></script>
    <script>
    // jQuery Selections
    var $html = $('html'),
        $container = $('#container'),
        $prompt = $('#prompt'),
        $toggle = $('#toggle'),
        $about = $('#about'),
        $scene = $('#scene');

    // Hide browser menu.
    (function() {
        setTimeout(function() {
            window.scrollTo(0, 0);
        }, 0);
    })();

    // Setup FastClick.
    FastClick.attach(document.body);

    // Add touch functionality.
    if (Hammer.HAS_TOUCHEVENTS) {
        $container.hammer({
            drag_lock_to_axis: true
        });
        _.tap($html, 'a,button,[data-tap]');
    }

    // Add touch or mouse class to html element.
    $html.addClass(Hammer.HAS_TOUCHEVENTS ? 'touch' : 'mouse');

    // Resize handler.
    (resize = function() {
        $scene[0].style.width = window.innerWidth + 'px';
        $scene[0].style.height = window.innerHeight + 'px';
        if (!$prompt.hasClass('hide')) {
            if (window.innerWidth < 600) {
                $toggle.addClass('hide');
            } else {
                $toggle.removeClass('hide');
            }
        }
    })();

    // Attach window listeners.
    window.onresize = _.debounce(resize, 200);
    window.onscroll = _.debounce(resize, 200);

    function showDetails() {
        $about.removeClass('hide');
        $toggle.removeClass('i');
    }

    function hideDetails() {
        $about.addClass('hide');
        $toggle.addClass('i');
    }

    // Listen for toggle click event.
    $toggle.on('click', function(event) {
        $toggle.hasClass('i') ? showDetails() : hideDetails();
    });

    // Pretty simple huh?
    $scene.parallax();

    // Check for orientation support.
    setTimeout(function() {
        if ($scene.data('mode') === 'cursor') {
            $prompt.removeClass('hide');
            if (window.innerWidth < 600) $toggle.addClass('hide');
            $prompt.on('click', function(event) {
                $prompt.addClass('hide');
                if (window.innerWidth < 600) {
                    setTimeout(function() {
                        $toggle.removeClass('hide');
                    }, 1200);
                }
            });
        }
    }, 1000);
    </script>
</body>

</html>
