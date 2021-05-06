<head>
    <title><?php $title; ?></title>
    <meta charset="utf-8"></meta>
    <meta name="author" content="Cayce Kelley"></meta>
    <meta name="author" content="Caleb Cluett"></meta>
    <meta name="author" content="James West"></meta>
    <meta name="decription" content="CS312 Term project">
    <meta name="keywords" content="HTML,CSS,JavaScript,PHP,CS312,Term project,CSU,Colorado State University">
    <meta rel="icon" href="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSIJcIPLUfwthUz2dUZVpXbx-Kd_9tECeCX7Xs-9zX2wsDVGAXu0TObCfJ_P93D5g&usqp=CAc">
    <!--- No need for dynamic CSS pages -->
    <?php echo Asset::css('default.css') ?>
    <!--- <?php echo Asset::css($css) ?> -->
</head>
<body>
    <header>
        <ul>
            <li><a href="https://cs.colostate.edu:4444/~cayce/m2/index/m1">Home</a></li>
            <li><a href="https://cs.colostate.edu:4444/~cayce/m2/index/m1/about/">About</a></li>
            <li><a href="https://cs.colostate.edu:4444/~cayce/m2/index/m1/color/">Color</a></li>
        </ul>
    </header>

    <main>
        <h1>Welcome to our site</h1>
        ----------------------------------------------------------------------------------------<br>
        <?php echo $content ?>
    </main>

    <footer>
        ----------------------------------------------------------------------------------------<br>
        Term project for learning CSS/HTML/PHP <br>
    </footer>
</body>