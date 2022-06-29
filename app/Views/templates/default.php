<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <title><?= $meta_title ?></title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"/>
        <script src="https://kit.fontawesome.com/db151b1a57.js" crossorigin="anonymous"></script>
        <link href="<?= base_url("public/theme/css/style.css") ?>" type="text/css" rel="stylesheet"/>
        <meta name="google-site-verification" content="JY-4eCKI_UKjtUl5hUHSPDwtqxEkHFDB69cNRNQILgw" />
        <meta name="author" content="Pradakshina Consulting Private Limited"/>
        <meta name="revisit-after" content="1 days"/>

    </head>
    <body>
        <header id="header " class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="<?= base_url("public/images/logo.png") ?>" alt="" width="275" >
                    </a>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color:#FFFFFF"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url("academic") ?>">Academic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url("administrative") ?>">Administrative</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://admin.deancoaryp.in/">Admin</a>
                            </li>



                            <?php

                            if (!session()->get('logged_in'))
                            {
                              ?>

                              <li class="nav-item">
                                  <a class="nav-link" href="<?= base_url("login/") ?>">Alumni</a>
                              </li>


                              <?php
                            }else
                            {
                              ?>

                              <li class="nav-item">
                                  <a class="nav-link" href="<?= base_url("/profile") ?>">Alumni</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= base_url("/logout") ?>">Logout</a>
                              </li>

                              <?php
                            }

                            ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url("contact") ?>">Contact</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

<div id="header_bottom">
Dean Faculty, College of Agriculture, Raipur (C.G.)

</div>


        </header>
        <section id="container">
            <?= $page ?>
        </section>
        <footer id="footer">
            <section id="footerBottom"></section>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-231942877-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-231942877-1');
  </script>

    </body>
</html>
