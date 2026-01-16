<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Agenda;
use App\Models\Biography;
use App\Models\BookingInfo;
use App\Models\Film;
use App\Models\GalleryImage;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first() ?? SiteSetting::instance();
        $biography = Biography::active()->first();
        $films = Film::active()->ordered()->get();
        $actualites = Actualite::active()->ordered()->get();
        $agendas = Agenda::active()->ordered()->get();
        $booking = BookingInfo::first() ?? BookingInfo::instance();
        $socialLinks = SocialLink::active()->ordered()->get();
        $galleryImages = GalleryImage::active()->ordered()->get();

        return view('home', compact(
            'settings',
            'biography',
            'films',
            'actualites',
            'agendas',
            'booking',
            'socialLinks',
            'galleryImages'
        ));
    }

    public function switchLocale(Request $request, string $locale)
    {
        if (in_array($locale, config('app.available_locales', ['fr', 'en']))) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return redirect()->back();
    }
}
