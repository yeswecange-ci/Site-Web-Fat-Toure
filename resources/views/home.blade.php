<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--<link rel="stylesheet" href="css/owl.carousel.min.css">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Document</title>
</head>

<body>

    <!-- Navbar part -->
    <div class="navigation ">
        <div class="container">
            <button class="menu-toggle" id="menuToggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- **** -->

            <div class="menu" id="menu">
                <ul>
                    <li><a href="#biographie">Biographie</a></li>
                    <li><a href="#filmographie">filmographie</a></li>
                    <li><a href="#actualité">actualité</a></li>
                    <li><a href="#agenda">agenda</a></li>
                    <li><a href="#booking">Booking</a></li>
                </ul>

            </div>

            <ul class="mb-0">
                <li>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="lang-container">
                            <div class="lang-switcher" id="langSwitcher">
                                <span id="currentLang">FR ▼</span>
                                <div class="lang-options" id="langOptions">
                                    <a href="#" data-lang="FR">FR</a>
                                    <a href="#" data-lang="EN">EN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ***** -->


    <!--*****header******-->
    <div class="header">
        <div class="header--left wow fadeInLeft">
           <div class="container">
                <h1>Bienvenue <br> sur le site de <br> <span>Fat Touré</span></h1>
                <p class="act">Actrice </p>
           </div>
        </div>

        <div class="header--right wow fadeIn">
            <img src="images/1.png" alt="img">
        </div>
    </div>

    <!--*************************Biographyyyy*****************************-->
    <section class="biography" id="biographie">
        <div class="container">
            <h2 class="sect--title text-center wow fadeInLeft mb-5">Biographie</h2>

            <div class="biography--text1 wow fadeInRight">
                <h3>Donec iaculis Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, placeat!</h3>
                <p>Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque. Fermentum pellentesque sagittis consequat pellentesque in purus lorem ac. Eleifend et vitae tincidunt non et id tortor blandit. Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. </p>
            </div>

            <div class="floating-group floating-group1 ">
                <img src="images/Frame 4.png" alt="Image 1" class="delay-1">
            </div>

            <div class="biography--text2 wow fadeInLeft">
                <h3>Lorem ipsum dolor sit amet consectetur. Donec iaculis</h3>
                <p>Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque. Fermentum pellentesque sagittis consequat pellentesque in purus lorem ac. Eleifend et vitae tincidunt non et id tortor blandit. Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. </p>
            </div>

           <div class="floatImgs">
                <div class="floating-group floating-group2 ">
                    <img src="images/Frame 3.png" alt="Image 1" class="delay-2">
                </div>

                <div class="floating-group floating-group3">
                    <img src="images/Frame 5.png" alt="Image 1" class="delay-3">
                </div>
           </div>
        </div>
    </section>

    <!--**************************ActuPresse*************-->
    <section class="filmography" id="filmographie">
        <div class="container">
            <h2 class="sect--title text-center wow fadeInLeft mb-5">filmographie</h2>

            <div class="swiper filmography-swiper wow fadeInRight">
                <div class="swiper-wrapper mb-5">
                    <div class="swiper-slide">
                        <div class="filmographyPart">
                            <div class="filmographyPart--img">
                                <img src="images/14.jpg" alt="img">
                            </div>

                            <div class="filmographyPart--body">
                                <h3>3 Cold Dishes / 2025</h3>
                                <p>Dans le rôle de Nollywire</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="filmographyPart">
                            <div class="filmographyPart--img">
                                <img src="images/15.jpg" alt="img">
                            </div>

                            <div class="filmographyPart--body">
                                <h3>3 Cold Dishes / 2025</h3>
                                <p>Dans le rôle de Nollywire</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="filmographyPart">
                            <div class="filmographyPart--img">
                                <img src="images/16.png" alt="img">
                            </div>

                            <div class="filmographyPart--body">
                                <h3>3 Cold Dishes / 2025</h3>
                                <p>Dans le rôle de Nollywire</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="filmographyPart">
                            <div class="filmographyPart--img">
                                <img src="images/14.jpg" alt="img">
                            </div>

                            <div class="filmographyPart--body">
                                <h3>3 Cold Dishes / 2025</h3>
                                <p>Dans le rôle de Nollywire</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="navigation-buttons-swiper">
                    <div class="swiper-button-prev blog-prev"></div>
                    <div class="swiper-button-next blog-next"></div>
                </div>
            </div>
        </div>
    </section>

    <!--**************************ActuPresse*************-->
    <section class="actuPresse" id="actualité">

        <h2 class="sect--title text-center wow fadeInLeft mb-5">Actualité / presse</h2>

        <img src="images/10.png" alt="images" class="actuPresse-imgResp wow zoomIn">

        <div class="container">
            <img src="images/10.png" alt="images" class="actuPresse-imgDesk wow zoomIn">


            <div class="swiper actuPresse-swiper wow fadeInRight">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="actuPresseBlog">
                            <div class="actuPresseBlog--img">
                                <img src="images/11.png" alt="img">
                            </div>

                            <div class="actuPresseBlog--body">
                                <h3>Afriff 2025 : Fat Touré, 1ère actrice francophone nominée dans la catégorie Meilleure actrice </h3>
                                <p>Lorem Praesentium, ab! ipsum dolor sit amet consectetur. Eget at lacus quis pretium vitae ac non varius nec. Feugiat praesent facilisi neque sollicitudin amet. Massa scelerisque pellentesque condimentum . </p>
                                <a href="">
                                    <span>Lire la suite</span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div class="actuPresseBlog">
                            <div class="actuPresseBlog--img">
                                <img src="images/12.png" alt="img">
                            </div>

                            <div class="actuPresseBlog--body">
                                <h3>prix du Meilleur Film du Nigeria remporté par 3 COLD DISHES aux African Movie Academy Awards</h3>
                                <p>Lorem ipsum dolor sit amet consectetur. Eget at lacus quis pretium vitae ac non varius nec. Feugiat praesent facilisi neque sollicitudin amet. Massa scelerisque pellentesque condimentum .</p>
                                <a href="">
                                    <span>Lire la suite</span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div class="actuPresseBlog">
                            <div class="actuPresseBlog--img">
                                <img src="images/13.png" alt="img">
                            </div>

                            <div class="actuPresseBlog--body">
                                <h3>“ Fat Touré, l’actrice ivoirienne qui brille dans nollywwod “</h3>
                                <p>Lorem ipsum dolor sit amet consectetur. Eget at lacus quis pretium vitae ac non varius nec. Feugiat praesent facilisi neque sollicitudin amet. Massa scelerisque pellentesque condimentum .</p>
                                <a href="">
                                    <span>Lire la suite</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="navigation-buttons-swiper">
                    <div class="swiper-button-prev blog-prev"></div>
                    <div class="swiper-button-next blog-next"></div>
                </div>
            </div>
        </div>
    </section>

    <!--**************************Agenda*************-->
    <section class="agenda" id="agenda">
        <div class="container">
            <h2 class="sect--title text-center wow fadeInLeft text-white">Agenda</h2>

            <div class="part--agenda mt-5">
                <div class="part--agenda__list wow fadeInRight">
                    <div class="part--agenda__list--date">
                        <h3>06</h3>
                        <p>Nov.</p>
                    </div>

                    <div class="part--agenda__list--img">
                        <img src="images/8.png" alt="img">
                    </div>

                    <div class="part--agenda__list--infos">
                        <h3>Avant première  du film 3 cold dishes à lagos</h3>
                        <p>Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque.</p>
                    </div>
                </div>

                <div class="part--agenda__list wow fadeInRight">
                    <div class="part--agenda__list--date">
                        <h3>06</h3>
                        <p>Nov.</p>
                    </div>

                    <div class="part--agenda__list--img">
                        <img src="images/9.png" alt="img">
                    </div>

                    <div class="part--agenda__list--infos">
                        <h3>Avant première  du film 3 cold dishes à lagos</h3>
                        <p>Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis cras justo. Placerat viverra risus nunc cras interdum. Et bibendum tortor mauris et. Pretium risus vitae amet interdum quisque.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--***********************booking****-->
    <section class="booking" id="booking">
        <div class="container text-center">
            <h2 class="sect--title wow fadeInLeft">Booking</h2>
            <p class="my-5 wow fadeInRight">Proin dictum pellentesque tempor amet semper. Id suspendisse eu purus massa sagittis <br> cras justo. Placerat viverra risus nunc cras interdum.</p>

            <div class="booking--infos wow fadeInLeft">
                <h3>+33 x XXX XXX XX / +225 x XXX XXX XX</h3>
                <h3>email: fattouré@booking.com</h3>
            </div>
        </div>
    </section>
   
    <!--***************Footer************-->
    <div class="footer">
        <div class="">
            <div class="container">
                <h3 class="wow fadeInLeft">suivez-moi sur mes réseaux</h3>

                <div class="footer--icons wow fadeInRight">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>

            <div class="footer--gallery">
                <a href="images/2.png" data-fancybox="gallery">
                    <img class="wow zoomIn " src="images/2.png" alt="img">
                </a>

                <a href="images/3.png" data-fancybox="gallery">
                    <img class="wow zoomIn " src="images/3.png" alt="img">
                </a>

                <a href="images/4.png" data-fancybox="gallery">
                    <img class="wow zoomIn " src="images/4.png" alt="img">
                </a>

                <a href="images/5.png" data-fancybox="gallery">
                    <img class="wow zoomIn " src="images/5.png" alt="img">
                </a>

                <a href="images/6.png" data-fancybox="gallery">
                    <img class="wow zoomIn " src="images/6.png" alt="img">
                </a>

                <a href="images/7.png" data-fancybox="gallery">
                    <img class="wow zoomIn " src="images/7.png" alt="img">
                </a>
            </div>
        </div>
    </div>
      
    <!-- ********* -->
    <!--**************  -->
     <script src=" {{asset('js/jquery.min.js')}}"></script>
    <script src=" {{asset('js/bootstrap.min.js')}}" ></script>
    <script src=" {{asset('js/wow.min.js')}}"></script>
    <script src=" {{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
    <!-- <script src="js/owl.carousel.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- ********* -->
    <!-- ********** -->

    <script>
        new WOW().init();
    </script>

    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
        });
    </script>

    <script>
        new Swiper('.filmography-swiper', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            navigation: {
            nextEl: '.blog-next',
            prevEl: '.blog-prev',
            },
        });
    </script>

    <script>
        new Swiper('.actuPresse-swiper', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            navigation: {
            nextEl: '.blog-next',
            prevEl: '.blog-prev',
            },
        });
    </script>
    

</body>

</html>