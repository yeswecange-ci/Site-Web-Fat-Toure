<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>{{ $settings->site_name ?? 'Fat Touré' }} - {{ $settings->site_title ?? 'Actrice' }}</title>
    <meta name="description" content="{{ $settings->site_description ?? '' }}">
    @if($settings->meta_image)
    <meta property="og:image" content="{{ asset('storage/' . $settings->meta_image) }}">
    @endif
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

            <div class="menu" id="menu">
                <ul>
                    <li><a href="#biographie">{{ app()->getLocale() === 'fr' ? 'Biographie' : 'Biography' }}</a></li>
                    <li><a href="#filmographie">{{ app()->getLocale() === 'fr' ? 'Filmographie' : 'Filmography' }}</a></li>
                    <li><a href="#actualité">{{ app()->getLocale() === 'fr' ? 'Actualité' : 'News' }}</a></li>
                    <li><a href="#agenda">{{ app()->getLocale() === 'fr' ? 'Agenda' : 'Events' }}</a></li>
                    <li><a href="#booking">Booking</a></li>
                </ul>
            </div>

            <ul class="mb-0">
                <li>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="lang-container">
                            <div class="lang-switcher" id="langSwitcher">
                                <span id="currentLang">{{ strtoupper(app()->getLocale()) }} ▼</span>
                                <div class="lang-options" id="langOptions">
                                    <a href="{{ route('locale.switch', 'fr') }}" data-lang="FR" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                                    <a href="{{ route('locale.switch', 'en') }}" data-lang="EN" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!--*****header******-->
    <div class="header">
        <div class="header--left wow fadeInLeft">
           <div class="container">
                @if($settings->hero_title)
                    <h1>{!! nl2br(e($settings->hero_title)) !!}</h1>
                @else
                    <h1>{{ app()->getLocale() === 'fr' ? 'Bienvenue' : 'Welcome' }} <br> {{ app()->getLocale() === 'fr' ? 'sur le site de' : 'to the website of' }} <br> <span>{{ $settings->site_name ?? 'Fat Touré' }}</span></h1>
                @endif
                <p class="act">{{ $settings->hero_subtitle ?? ($settings->site_title ?? 'Actrice') }}</p>
           </div>
        </div>

        <div class="header--right wow fadeIn">
            @if($settings->hero_image)
                <img src="{{ asset('storage/' . $settings->hero_image) }}" alt="{{ $settings->site_name ?? 'Fat Touré' }}">
            @else
                <img src="{{ asset('images/1.png') }}" alt="img">
            @endif
        </div>
    </div>

    <!--*************************Biographie*****************************-->
    @if($biography)
    <section class="biography" id="biographie">
        <div class="container">
            <h2 class="sect--title text-center wow fadeInLeft mb-5">{{ $biography->section_title }}</h2>

            <div class="biography--text1 wow fadeInRight">
                <h3>{{ $biography->block1_title }}</h3>
                <div>{!! $biography->block1_content !!}</div>
            </div>

            @if($biography->block1_image)
            <div class="floating-group floating-group1 ">
                <img src="{{ asset('storage/' . $biography->block1_image) }}" alt="{{ $biography->block1_title }}" class="delay-1">
            </div>
            @else
            <div class="floating-group floating-group1 ">
                <img src="{{ asset('images/Frame 4.png') }}" alt="Image 1" class="delay-1">
            </div>
            @endif

            @if($biography->block2_title || $biography->block2_content)
            <div class="biography--text2 wow fadeInLeft">
                <h3>{{ $biography->block2_title }}</h3>
                <div>{!! $biography->block2_content !!}</div>
            </div>

           <div class="floatImgs">
                @if($biography->block2_image1)
                <div class="floating-group floating-group2 ">
                    <img src="{{ asset('storage/' . $biography->block2_image1) }}" alt="{{ $biography->block2_title }}" class="delay-2">
                </div>
                @else
                <div class="floating-group floating-group2 ">
                    <img src="{{ asset('images/Frame 3.png') }}" alt="Image 1" class="delay-2">
                </div>
                @endif

                @if($biography->block2_image2)
                <div class="floating-group floating-group3">
                    <img src="{{ asset('storage/' . $biography->block2_image2) }}" alt="{{ $biography->block2_title }}" class="delay-3">
                </div>
                @else
                <div class="floating-group floating-group3">
                    <img src="{{ asset('images/Frame 5.png') }}" alt="Image 1" class="delay-3">
                </div>
                @endif
           </div>
           @endif
        </div>
    </section>
    @else
    <section class="biography" id="biographie">
        <div class="container">
            <h2 class="sect--title text-center wow fadeInLeft mb-5">{{ app()->getLocale() === 'fr' ? 'Biographie' : 'Biography' }}</h2>
            <div class="biography--text1 wow fadeInRight">
                <p class="text-center">{{ app()->getLocale() === 'fr' ? 'Contenu à venir...' : 'Content coming soon...' }}</p>
            </div>
        </div>
    </section>
    @endif

    <!--**************************Filmographie*************-->
    <section class="filmography" id="filmographie">
        <div class="container">
            <h2 class="sect--title text-center wow fadeInLeft mb-5">{{ app()->getLocale() === 'fr' ? 'Filmographie' : 'Filmography' }}</h2>

            <div class="swiper filmography-swiper wow fadeInRight">
                <div class="swiper-wrapper mb-5">
                    @forelse($films as $film)
                    <div class="swiper-slide">
                        <div class="filmographyPart">
                            <div class="filmographyPart--img">
                                @if($film->image)
                                    <img src="{{ asset('storage/' . $film->image) }}" alt="{{ $film->title }}">
                                @else
                                    <img src="{{ asset('images/14.jpg') }}" alt="{{ $film->title }}">
                                @endif
                            </div>

                            <div class="filmographyPart--body">
                                <h3>{{ $film->title }} / {{ $film->year }}</h3>
                                @if($film->role)
                                <p>{{ $film->role }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="filmographyPart">
                            <div class="filmographyPart--img">
                                <img src="{{ asset('images/14.jpg') }}" alt="Film">
                            </div>
                            <div class="filmographyPart--body">
                                <h3>{{ app()->getLocale() === 'fr' ? 'Films à venir...' : 'Films coming soon...' }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforelse
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

        <h2 class="sect--title text-center wow fadeInLeft mb-5">{{ app()->getLocale() === 'fr' ? 'Actualité / presse' : 'News / Press' }}</h2>

        <img src="{{ asset('images/10.png') }}" alt="images" class="actuPresse-imgResp wow zoomIn">

        <div class="container">
            <img src="{{ asset('images/10.png') }}" alt="images" class="actuPresse-imgDesk wow zoomIn">

            <div class="swiper actuPresse-swiper wow fadeInRight">
                <div class="swiper-wrapper">
                    @forelse($actualites as $actualite)
                    <div class="swiper-slide">
                        <div class="actuPresseBlog">
                            <div class="actuPresseBlog--img">
                                @if($actualite->image)
                                    <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
                                @else
                                    <img src="{{ asset('images/11.png') }}" alt="{{ $actualite->title }}">
                                @endif
                            </div>

                            <div class="actuPresseBlog--body">
                                <h3>{{ $actualite->title }}</h3>
                                <p>{{ $actualite->excerpt }}</p>
                                @if($actualite->source_link)
                                <a href="{{ $actualite->source_link }}" target="_blank">
                                    <span>{{ app()->getLocale() === 'fr' ? 'Lire la suite' : 'Read more' }}</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="actuPresseBlog">
                            <div class="actuPresseBlog--img">
                                <img src="{{ asset('images/11.png') }}" alt="News">
                            </div>
                            <div class="actuPresseBlog--body">
                                <h3>{{ app()->getLocale() === 'fr' ? 'Actualités à venir...' : 'News coming soon...' }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforelse
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
            <h2 class="sect--title text-center wow fadeInLeft text-white">{{ app()->getLocale() === 'fr' ? 'Agenda' : 'Events' }}</h2>

            <div class="part--agenda mt-5">
                @forelse($agendas as $agenda)
                <div class="part--agenda__list wow fadeInRight">
                    <div class="part--agenda__list--date">
                        <h3>{{ $agenda->event_date->format('d') }}</h3>
                        <p>{{ $agenda->event_date->locale(app()->getLocale())->translatedFormat('M') }}.</p>
                    </div>

                    <div class="part--agenda__list--img">
                        @if($agenda->image)
                            <img src="{{ asset('storage/' . $agenda->image) }}" alt="{{ $agenda->title }}">
                        @else
                            <img src="{{ asset('images/8.png') }}" alt="{{ $agenda->title }}">
                        @endif
                    </div>

                    <div class="part--agenda__list--infos">
                        <h3>{{ $agenda->title }}</h3>
                        <div>{!! $agenda->description !!}</div>
                    </div>
                </div>
                @empty
                <div class="part--agenda__list wow fadeInRight">
                    <div class="part--agenda__list--date">
                        <h3>--</h3>
                        <p>---</p>
                    </div>
                    <div class="part--agenda__list--img">
                        <img src="{{ asset('images/8.png') }}" alt="Event">
                    </div>
                    <div class="part--agenda__list--infos">
                        <h3>{{ app()->getLocale() === 'fr' ? 'Événements à venir...' : 'Events coming soon...' }}</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!--***********************booking****-->
    <section class="booking" id="booking">
        <div class="container text-center">
            <h2 class="sect--title wow fadeInLeft">{{ $booking->section_title ?? 'Booking' }}</h2>
            <p class="my-5 wow fadeInRight">{!! nl2br(e($booking->description ?? '')) !!}</p>

            <div class="booking--infos wow fadeInLeft">
                @if($booking->phones && count($booking->phones) > 0)
                <h3>{{ implode(' / ', $booking->phones) }}</h3>
                @endif
                @if($booking->email)
                <h3>email: {{ $booking->email }}</h3>
                @endif
            </div>
        </div>
    </section>

    <!--***************Footer************-->
    <div class="footer">
        <div class="">
            <div class="container">
                <h3 class="wow fadeInLeft">{{ app()->getLocale() === 'fr' ? 'Suivez-moi sur mes réseaux' : 'Follow me on social media' }}</h3>

                <div class="footer--icons wow fadeInRight">
                    @forelse($socialLinks as $social)
                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer" title="{{ ucfirst($social->platform) }}">
                        <i class="{{ $social->icon }}"></i>
                    </a>
                    @empty
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    @endforelse
                </div>
            </div>

            <div class="footer--gallery">
                @forelse($galleryImages as $image)
                <a href="{{ asset('storage/' . $image->image) }}" data-fancybox="gallery">
                    <img class="wow zoomIn" src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt ?? 'Gallery image' }}">
                </a>
                @empty
                @for($i = 2; $i <= 7; $i++)
                <a href="{{ asset('images/' . $i . '.png') }}" data-fancybox="gallery">
                    <img class="wow zoomIn" src="{{ asset('images/' . $i . '.png') }}" alt="img">
                </a>
                @endfor
                @endforelse
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        new WOW().init();
    </script>

    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {});
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
