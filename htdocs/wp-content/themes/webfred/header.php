<?php
$attorneys = new WP_Query(array(
    'post_type' => 'attorney'
));

$practices = new WP_Query(array(
    'post_type' => 'practice'
));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Webster & Frederickson, PLLC. Attorneys at Law</title>

    <!-- Libre-Baskerville font -->
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet'
          type='text/css'>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
    <header id="header" role="banner">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-xs big-brand" href="/"><p style="display: inline-block">W</p>EBSTER
                        &amp; <p style="display: inline-block">F</p>REDRICKSON, PLLC</a>
                    <a class="navbar-brand visible-xs little-brand" href="/"><p style="display: inline-block">W</p>
                        EBSTER &amp; <p style="display: inline-block">F</p>REDRICKSON, PLLC</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Practice Areas</span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Employment Law</a></li>
                                <li><a href="#">Bankruptcy Law</a></li>
                                <li><a href="#">Whistleblower Protection</a></li>
                                <li><a href="#">Commercial Law</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attorneys</span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                while ($attorneys->have_posts()) {
                                    $attorneys->the_post();
                                    ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>

                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="tel:1-202-659-8510">202-659-8510</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="container">