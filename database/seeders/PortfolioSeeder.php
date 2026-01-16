<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\Agenda;
use App\Models\Biography;
use App\Models\BookingInfo;
use App\Models\Film;
use App\Models\GalleryImage;
use App\Models\SiteSetting;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Site Settings
        SiteSetting::create([
            'site_name' => ['fr' => 'Fat Touré', 'en' => 'Fat Touré'],
            'site_title' => ['fr' => 'Actrice', 'en' => 'Actress'],
            'site_description' => ['fr' => 'Portfolio officiel de Fat Touré, actrice ivoirienne', 'en' => 'Official portfolio of Fat Touré, Ivorian actress'],
            'hero_title' => ['fr' => "Bienvenue\nsur le site de\nFat Touré", 'en' => "Welcome\nto the website of\nFat Touré"],
            'hero_subtitle' => ['fr' => 'Actrice', 'en' => 'Actress'],
        ]);

        // Biography
        Biography::create([
            'section_title' => ['fr' => 'Biographie', 'en' => 'Biography'],
            'block1_title' => ['fr' => 'Une actrice passionnée au talent reconnu internationalement', 'en' => 'A passionate actress with internationally recognized talent'],
            'block1_content' => [
                'fr' => '<p>Fat Touré est une actrice ivoirienne dont le talent a traversé les frontières. Avec une carrière remarquable dans le cinéma africain et international, elle s\'est imposée comme l\'une des figures incontournables du septième art sur le continent.</p><p>Son parcours exceptionnel l\'a menée des scènes locales aux productions internationales, où elle a su démontrer une polyvalence et une profondeur de jeu qui lui ont valu de nombreuses reconnaissances.</p>',
                'en' => '<p>Fat Touré is an Ivorian actress whose talent has crossed borders. With a remarkable career in African and international cinema, she has established herself as one of the essential figures of the seventh art on the continent.</p><p>Her exceptional journey has taken her from local stages to international productions, where she has demonstrated a versatility and depth of performance that has earned her numerous recognitions.</p>'
            ],
            'block2_title' => ['fr' => 'Un parcours jalonné de succès', 'en' => 'A journey marked by success'],
            'block2_content' => [
                'fr' => '<p>Formée aux meilleures écoles de théâtre, Fat Touré a su allier technique et émotion pour créer des personnages mémorables. Sa présence à l\'écran captive le public et sa capacité à incarner des rôles variés fait d\'elle une artiste complète.</p>',
                'en' => '<p>Trained at the best theater schools, Fat Touré has managed to combine technique and emotion to create memorable characters. Her screen presence captivates audiences and her ability to embody varied roles makes her a complete artist.</p>'
            ],
            'is_active' => true,
        ]);

        // Films
        $films = [
            [
                'title' => ['fr' => '3 Cold Dishes', 'en' => '3 Cold Dishes'],
                'year' => 2025,
                'role' => ['fr' => 'Dans le rôle de Nollywire', 'en' => 'As Nollywire'],
                'order' => 1,
            ],
            [
                'title' => ['fr' => 'Lagos Love Story', 'en' => 'Lagos Love Story'],
                'year' => 2024,
                'role' => ['fr' => 'Dans le rôle principal', 'en' => 'Lead role'],
                'order' => 2,
            ],
            [
                'title' => ['fr' => 'African Dreams', 'en' => 'African Dreams'],
                'year' => 2023,
                'role' => ['fr' => 'Dans le rôle de Amara', 'en' => 'As Amara'],
                'order' => 3,
            ],
        ];

        foreach ($films as $film) {
            Film::create(array_merge($film, ['is_active' => true]));
        }

        // Actualités
        $actualites = [
            [
                'title' => ['fr' => 'Afriff 2025 : Fat Touré, 1ère actrice francophone nominée dans la catégorie Meilleure actrice', 'en' => 'Afriff 2025: Fat Touré, 1st French-speaking actress nominated in the Best Actress category'],
                'excerpt' => ['fr' => 'Une reconnaissance historique pour le cinéma francophone africain avec cette nomination prestigieuse.', 'en' => 'A historic recognition for French-speaking African cinema with this prestigious nomination.'],
                'content' => ['fr' => '<p>Contenu complet de l\'article...</p>', 'en' => '<p>Full article content...</p>'],
                'published_at' => '2025-01-10',
                'source_name' => 'Variety Africa',
                'order' => 1,
            ],
            [
                'title' => ['fr' => 'Prix du Meilleur Film du Nigeria remporté par 3 COLD DISHES aux African Movie Academy Awards', 'en' => 'Best Nigerian Film Award won by 3 COLD DISHES at the African Movie Academy Awards'],
                'excerpt' => ['fr' => 'Le film 3 Cold Dishes continue sa moisson de prix à travers le continent africain.', 'en' => '3 Cold Dishes continues its harvest of awards across the African continent.'],
                'content' => ['fr' => '<p>Contenu complet de l\'article...</p>', 'en' => '<p>Full article content...</p>'],
                'published_at' => '2025-01-05',
                'source_name' => 'AMAA',
                'order' => 2,
            ],
            [
                'title' => ['fr' => 'Fat Touré, l\'actrice ivoirienne qui brille dans Nollywood', 'en' => 'Fat Touré, the Ivorian actress shining in Nollywood'],
                'excerpt' => ['fr' => 'Portrait d\'une artiste qui a su conquérir le cœur du public nigérian.', 'en' => 'Portrait of an artist who has won the hearts of Nigerian audiences.'],
                'content' => ['fr' => '<p>Contenu complet de l\'article...</p>', 'en' => '<p>Full article content...</p>'],
                'published_at' => '2024-12-20',
                'source_name' => 'Le Monde Afrique',
                'order' => 3,
            ],
        ];

        foreach ($actualites as $actualite) {
            Actualite::create(array_merge($actualite, ['is_active' => true]));
        }

        // Agenda
        $agendas = [
            [
                'title' => ['fr' => 'Avant-première du film 3 Cold Dishes à Lagos', 'en' => 'Premiere of 3 Cold Dishes in Lagos'],
                'description' => ['fr' => '<p>Rejoignez-nous pour la projection exclusive du film 3 Cold Dishes au Filmhouse Cinema de Lagos.</p>', 'en' => '<p>Join us for the exclusive screening of 3 Cold Dishes at Filmhouse Cinema in Lagos.</p>'],
                'event_date' => '2025-02-06',
                'location' => 'Lagos, Nigeria',
                'order' => 1,
            ],
            [
                'title' => ['fr' => 'Festival du Film d\'Abidjan', 'en' => 'Abidjan Film Festival'],
                'description' => ['fr' => '<p>Fat Touré sera présente au Festival du Film d\'Abidjan pour présenter ses derniers projets.</p>', 'en' => '<p>Fat Touré will be present at the Abidjan Film Festival to present her latest projects.</p>'],
                'event_date' => '2025-03-15',
                'location' => 'Abidjan, Côte d\'Ivoire',
                'order' => 2,
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create(array_merge($agenda, ['is_active' => true]));
        }

        // Booking Info
        BookingInfo::create([
            'section_title' => ['fr' => 'Booking', 'en' => 'Booking'],
            'description' => ['fr' => 'Pour toute demande de collaboration, casting ou événement, n\'hésitez pas à nous contacter.', 'en' => 'For any collaboration, casting or event request, please do not hesitate to contact us.'],
            'phones' => ['+33 X XXX XXX XX', '+225 X XXX XXX XX'],
            'email' => 'booking@fattoure.com',
            'is_active' => true,
        ]);

        // Social Links
        $socialLinks = [
            ['platform' => 'facebook', 'url' => 'https://facebook.com/fattoure', 'icon_class' => 'fa-brands fa-facebook-f', 'order' => 1],
            ['platform' => 'instagram', 'url' => 'https://instagram.com/fattoure', 'icon_class' => 'fa-brands fa-instagram', 'order' => 2],
            ['platform' => 'tiktok', 'url' => 'https://tiktok.com/@fattoure', 'icon_class' => 'fa-brands fa-tiktok', 'order' => 3],
            ['platform' => 'twitter', 'url' => 'https://twitter.com/fattoure', 'icon_class' => 'fa-brands fa-x-twitter', 'order' => 4],
        ];

        foreach ($socialLinks as $social) {
            SocialLink::create(array_merge($social, ['is_active' => true]));
        }

        $this->command->info('Portfolio data seeded successfully!');
    }
}
