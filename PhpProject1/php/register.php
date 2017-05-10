

<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>HEAVEN</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/layout.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css">
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/cufon-yui.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/sprites.js"></script>
        <script type="text/javascript" src="../js/gSlider.js"></script>
        <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>

    </head>
    <body id="page7">
        <div id="main">
            <header>
                <nav>
                    <ul>
                        <li><a href="../index.html">O nas</a></li>
                        <li><a href="../index-1.html">Audio</a></li>
                        <li><a href="../index-2.html">Video</a></li>
                        <li><a href="../index-3.html">Galeria</a></li>
                        <li><a href="../index-4.html">Kontakt</a></li>
                        <li><a href="../index-5.php">Goście</a></li>
                        <li class="active"><a href="../panel_admin.php">Admin</a></li>
                    </ul>
                </nav>


            </header>
            <article id="content">
                <div class="col-1">
                    <div class="p2">
                        <h2>Nowe Zdjęcia</h2>
                        <img src="../images/col-1-img.jpg" class="p1" alt=""> <a href="../index-3.html" class="more">Więcej</a></div>
                    <div class="p2">
                        <h2>Nowy Film</h2>
                        <a href="../video/video_AS3.swf?width=512&amp;height=288&amp;fileVideo=temp_video.flv" rel="prettyPhoto"><img class="p1" src="../images/col1-video-thumb1.jpg" alt=""></a>
                        <div class="alc"><a href="../index-2.html">Więcej Filmów</a></div>
                    </div>
                </div>
                <div class="col-2">
                    <!-- audio player begin -->

                    <!-- audio player end -->

                    <div class="table-border">

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {

                            $login = $_POST['login'];
                            $password = $_POST['password'];
                            $email = $_POST['email'];

                            if (empty($login) || empty($password) || empty($email)) {
                                return '<p>Wypełnij wszystkie dane.</p>';
                            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                return '<p>Nie poprawny adres E-mail.</p>';
                            } else {
                                if (file_exists('config.php')) {
                                    include_once('config.php');
                                } else {
                                    return 'config.php file not found.';
                                }
                                $mysqli = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);
                                if ($mysqli->connect_error) {
                                    return '<p>Problem z połączeniem się z bazą danych:' . $mysqli->connect_error . '[' . $mysqli->connect_errno . ']</p>';
                                } else {
                                    $login = trim(strip_tags($mysqli->real_escape_string($login)));
                                    $password = hash('sha256', trim(strip_tags($mysqli->real_escape_string($password))));
                                    $email = trim(strip_tags($mysqli->real_escape_string($email)));
                                    $ip = $_SERVER['REMOTE_ADDR'];
                                    $stmt = $mysqli->prepare("INSERT INTO `user`(`id_user`, `login`,`password`,`email`,`added`,`ip`) VALUES('', ? , ? , ? , now(), ?)");
                                    $stmt->bind_param('ssss', $login, $password, $email, $ip);
                                    $stmt->execute();
                                    if ($stmt->affected_rows == 1) {
                                        echo '<p>Zostałeś pomyślnie zarejestrowany</p>';
                                    } else {
                                        echo '<p>Błąd podczas rejestracji</p>';
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="col-3">
                    <h2>Ostatnie Wpisy</h2>
                    <div class="und">
                        <p>Coś tam coś tam, do uzupełnienia<br>
                            <a href="../index-5.php">1h temu</a></p>
                        <p>Coś tam coś tam, do uzupełnienia<br>
                            <a href="../index-5.php">23h temu</a></p>
                        <p>Coś tam coś tam, do uzupełnienia<br>
                            <a href="../index-5.php">2d 7h temu</a></p>
                        <p>Coś tam coś tam, do uzupełnienia<br>
                            <a href="../index-5.php">15d 7h temu</a></p>
                        <p>Coś tam coś tam, do uzupełnienia<br>
                            <a href="../index-5.php">25d 7h temu</a></p>
                    </div>

                    <h2>ZNAJDŹ NAS!</h2>
                    <ul class="soc-ico">
                        <li><a href="https://www.facebook.com/grupaheaven?fref=ts"><img src="../images/facebook.png" alt=""></a></li>
                        <li><a href="#"><img src="../images/twitter.png" alt=""></a></li>
                        <li><a href="#"><img src="../images/myspace.png" alt=""></a></li>
                        <li><a href="#"><img src="../images/linkedin.png" alt=""></a></li>
                    </ul>
                </div>
            </article>
            <div class="af clear"></div>
        </div>
        <footer>
            <span>
                <a>GRUPA MUZYCZNA HEAVEN. grupaheaven@go2.pl tel. 608 330 811</a><br>
                <a>Dumnie wspierane przez WordPressa</a>
            </span>
        </footer>
        <script type="text/javascript">Cufon.now();
            $(function () {
                $('nav,.more,.header-more').sprites();

                $('.header-slider').gSlider({
                    prevBu: '.hs-prev',
                    nextBu: '.hs-next'
                });
            });
            $(window).load(function () {
                $('.tumbvr')._fw({tumbvr: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }})
                        .bind('click', function () {
                            location = "index-3.html";
                        });

                $('a[rel=prettyPhoto]').each(function () {
                    var th = $(this),
                            pb;
                    th
                            .append(pb = $('<span class="playbutt"></span>').css({opacity: .7}));
                    pb
                            .bind('mouseenter', function () {
                                $(this)
                                        .stop()
                                        .animate({opacity: .9});
                            })
                            .bind('mouseleave', function () {
                                $(this)
                                        .stop()
                                        .animate({opacity: .7});
                            });
                })
                        .prettyPhoto({theme: 'dark_square'});
            });
        </script>
    </body>
</html>
<?php
ob_end_flush();
?>