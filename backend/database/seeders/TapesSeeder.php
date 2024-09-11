<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tape;

class TapesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tape::factory()
            ->count(17)
            ->sequence(...[[
                'title' => 'Cagayake! Girls',
                'artist' => 'HTT',
                'description' => '"Cagayake! Girls" is a single used as the opening theme for the first season of the anime K-ON!. Sung by Aki Toyosaki as Yui Hirasawa on vocals with Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki as backup, it was released on April 22, 2009 in Japan by Pony Canyon where it debuted at fourth in the rankings on the Oricon weekly singles chart, selling approximately 62,000 copies.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://m.media-amazon.com/images/I/81wfdoHvJDL._AC_UF1000,1000_QL80_.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2009,
            ],
            [
                'title' => 'Don\'t say "lazy',
                'artist' => 'HTT',
                'description' => '"Don\'t say "lazy"" is a single used as the ending theme for the first season of the anime K-ON!. Sung by Yōko Hikasa as Mio Akiyama on vocals with Aki Toyosaki as Yui Hirasawa, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki as backup, it was released on April 22, 2009 in Japan by Pony Canyon where it debuted at second in the rankings on the Oricon weekly singles chart, selling 67,000 copies.[1] It was also awarded the Best Theme Song at the 2009 (14th) Animation Kobe Awards.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://m.media-amazon.com/images/I/71zaG7LthOL._AC_UF894,1000_QL80_.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2009,
            ],
            [
                'title' => 'Go! Go! Maniac',
                'artist' => 'HTT',
                'description' => '"Go! Go! Maniac" is a single used as the first opening theme for the second season of the anime K-ON!!. Sung by Aki Toyosaki as Yui Hirasawa on vocals with Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano as backup, it was released on April 28, 2010 in Japan by Pony Canyon where it debuted at first in the rankings on the Oricon weekly singles chart, selling approximately 83,000 copies. "Go! Go! Maniac" became the first anime image song to ever top the singles chart and the band also became the first female vocalists to occupy the top two spots with "Listen!!" on the singles chart in 26 years since Seiko Matsuda in 1983. It also topped the Billboard Japan Hot 100.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://m.media-amazon.com/images/I/718axNali6L._UF1000,1000_QL80_.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2010,
            ],
            [
                'title' => 'Listen!!',
                'artist' => 'HTT',
                'description' => '"Listen!!" is a single used as the first ending theme for the second season of the anime K-ON!!. Sung by Yōko Hikasa as Mio Akiyama on vocals with Aki Toyosaki as Yui Hirasawa, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano as backup, it was released on April 28, 2010 in Japan by Pony Canyon where it debuted at second in the rankings on the Oricon weekly singles chart, selling approximately 76,000 copies. It also placed second on the Japan Hot 100.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://cdns-images.dzcdn.net/images/cover/4d5fbb8fc09d1f882cd798ccdd7cc6df/500x500.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2010,
            ],
            [
                'title' => 'Utauyo!! Miracle',
                'artist' => 'HTT',
                'description' => '"Utauyo!! Miracle" is a single used as the second opening theme for the second season of the anime K-ON!!. Sung by Aki Toyosaki as Yui Hirasawa on vocals with Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano as backup, it was released on August 4, 2010 in Japan by Pony Canyon where it debuted at third in the rankings on the Oricon weekly singles chart, selling approximately 85,000 copies.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://m.media-amazon.com/images/I/51E49s4PH4L._UF894,1000_QL80_.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2010,
            ],
            [
                'title' => 'No, Thank You!',
                'artist' => 'HTT',
                'description' => '"No, Thank You!" is a single used as the second ending theme for the second season of the anime K-ON!!. Sung by Yōko Hikasa as Mio Akiyama on vocals with Aki Toyosaki as Yui Hirasawa, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano as backup, it was released on August 4, 2010 in Japan by Pony Canyon where it debuted at second in the rankings on the Oricon weekly singles chart, selling approximately 87,000 copies, only being beaten by SMAP\'s single, "This is Love". The song’s name comes from all of the first letters of their name, T-ainaka Ritsu, H-irasawa Yui, A-kiyama Mio, N-akano Azusa and K-otobuki Tsumugi.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://i1.sndcdn.com/artworks-000016082891-cze4i6-t1080x1080.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2010,
            ],
            [
                'title' => 'Unmei♪wa♪Endless!',
                'artist' => 'HTT',
                'description' => '"Unmei♪wa♪Endless!" is a single used as the opening theme for the K-ON! film. Sung by Aki Toyosaki as Yui Hirasawa on vocals with Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano as backup, it was released on December 7, 2011 in Japan by Pony Canyon where it debuted at fifth in the rankings on the Oricon weekly singles chart.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://m.media-amazon.com/images/I/71RTR2nVTkL._UF894,1000_QL80_.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2011,
            ],
            [
                'title' => 'Singing!',
                'artist' => 'HTT',
                'description' => '"Singing!" is a single used as the ending theme for the K-ON! film. Sung by Yōko Hikasa as Mio Akiyama on vocals with Aki Toyosaki as Yui Hirasawa, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano as backup, it was released on December 7, 2011 in Japan by Pony Canyon where it debuted at fourth in the rankings on the Oricon weekly singles chart.',
                'price' => 12.99,
                'stock' => 100,
                'url' => 'https://images5.fanpop.com/image/photos/27400000/Mugi-K-ON-The-Movie-Singing-k-on-27498507-500-500.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2011,
            ],
            [
                'title' => 'Fuwa Fuwa Time',
                'artist' => 'HTT',
                'description' => '"Fuwa Fuwa Time" (ふわふわ時間タイム, Fuwa Fuwa Taimu) is performed by Aki Toyosaki as Yui Hirasawa, Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, and Minako Kotobuki as Tsumugi Kotobuki.',
                'price' => 10.5,
                'stock' => 30,
                'url' => 'https://images.genius.com/c54b2c68a9dc7a17b884b0957b5b744a.1000x992x1.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2009,
            ],
            [
                'title' => 'Pure Pure Heart',
                'artist' => 'HTT',
                'description' => '"Pure Pure Heart" (ぴゅあぴゅあはーと, Pyua Pyua Hāto) is performed by Aki Toyosaki as Yui Hirasawa, Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, Minako Kotobuki as Tsumugi Kotobuki, and Ayana Taketatsu as Azusa Nakano.',
                'price' => 10.5,
                'stock' => 30,
                'url' => 'https://lastfm.freetls.fastly.net/i/u/ar0/5cd15022aae9436dbcf5d5dee1d0ef1e.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2010,
            ],
            [
                'title' => 'Gohan wa Okazu',
                'artist' => 'HTT',
                'description' => '"Gohan wa Okazu" (ごはんはおかず) / "U & I" is performed by Aki Toyosaki as Yui Hirasawa on vocals with Yōko Hikasa as Mio Akiyama, Satomi Satō as Ritsu Tainaka, Minako Kotobuki as Tsumugi Kotobuki and Ayana Taketatsu as Azusa Nakano.',
                'price' => 10.5,
                'stock' => 30,
                'url' => 'https://lastfm.freetls.fastly.net/i/u/ar0/683881c2d61d498919635ad6fd6b3e81.jpg',
                'genre' => 'J-pop, rock',
                'released' => 2010,
            ],
            [
                'title' => 'A Cruel Angels Thesis',
                'artist' => 'Yoko Takahashi',
                'description' => '"A Cruel Angels Thesis" (残酷な天使のテーゼ, Zankoku na Tenshi no Tēze, "Zankoku na Tenshi no These" in Japan), performed by Yoko Takahashi, is the theme song used in the anime. Two instrumental versions of the song were played in the finale, "Take care of yourself". Those versions were named "The Heady Feeling of Freedom" and "Good, or Dont Be", and scored for violin, piano and guitar.[3] The single was released on 25 October 1995. It reached a peak rank 17 in the Oricon album database, in which it has appeared 61 times.',
                'price' => 15.50,
                'stock' => 200,
                'url' => 'https://is1-ssl.mzstatic.com/image/thumb/Music113/v4/86/e6/cb/86e6cb24-3c67-e699-f989-6708a7c64849/195039122820_cover.jpg/600x600bf-60.jpg',
                'genre' => 'Pop rock',
                'released' => 1995,
            ],
            [
                'title' => 'Souls Refrain',
                'artist' => 'Yoko Takahashi',
                'description' => '"Tamashii no Refrain" (魂のルフラン, Tamashī no Rufuran, "Souls Refrain") was the theme song used for the first film in the Neon Genesis Evangelion franchise, Evangelion: Death and Rebirth. It was performed by Yoko Takahashi and released as a single on 21 February 1997. It ranked third on the Oricon charts, selling more than 800 thousand copies.',
                'price' => 15.50,
                'stock' => 200,
                'url' => 'https://images.genius.com/de7ff44223220930a5089ed71e9f4300.425x425x1.png',
                'genre' => 'J-pop',
                'released' => 1997,
            ],
            [
                'title' => 'Fly Me to the Moon',
                'artist' => 'Yoko Takahashi',
                'description' => 'Fly Me to the Moon" is one of the theme songs in the TV series Neon Genesis Evangelion. Originally, "Fly Me to the Moon" was a pop standard song written by Bart Howard in 1954. "In Other Words" was the original title for the song and Felicia Sanders introduced it in cabarets. The song became popularly known as "Fly Me to the Moon" from its first line and, after a few years, the publishers changed the title to that one officially.',
                'price' => 15.50,
                'stock' => 200,
                'url' => 'https://m.media-amazon.com/images/I/51Fap-qaQLL._UF1000,1000_QL80_.jpg',
                'genre' => 'Jazz',
                'released' => 1995,
            ],
            [
                'title' => 'Neon Genesis Evangelion (Original Series Soundtrack)',
                'artist' => 'Shiro Sagisu',
                'description' => 'This is the official soundtrack to the legendary anime series Neon Genesis Evangelion on limited edition with music by Shiro Sagisu featuring the opening track "A Cruel Angels Thesis" and the song "Fly My To The Moon" featuring Yoko Takahashi.',
                'price' => 70,
                'stock' => 25,
                'url' => 'https://images.squarespace-cdn.com/content/v1/642fe9d50ff3d476932fc101/b09fceec-362b-418b-9203-119792c4d0c1/eva4.jpg',
                'genre' => 'OST',
                'released' => 2019,
            ],
            [
                'title' => 'Pokemon The First Movie Soundtrack Cassette Tape Complete',
                'artist' => 'M2M',
                'description' => 'Pokémon: The First Movie: Music From and Inspired By the Motion Picture is the soundtrack to the first Pokémon film in the North American markets. Two songs were featured in the animated short Pikachus Vacation and eight songs were exclusive to the album, not being featured in either the short or the movie. The CD contains extra features, such as Pokémon videos and a screensaver. When it was released, it included a promotion to send in a proof of purchase for an exclusive Jigglypuff card from the Pokémon TCG.',
                'price' => 5.25,
                'stock' => 50,
                'url' => 'https://ladygeekgirl.wordpress.com/wp-content/uploads/2015/06/pokemon_the_first_movie.jpg',
                'genre' => 'OST',
                'released' => 1999,
            ],
            [
                'title' => 'Bishoujo Senshi Sailor Moon Music Collection',
                'artist' => 'DALI',
                'description' => 'This first soundtrack released for Sailor Moon includes numerous themes that would continue to be used in R, S and SuperS.',
                'price' => 11,
                'stock' => 200,
                'url' => 'https://i.discogs.com/VBrgNrtXewc9CW_B_9CZfSYFtmlVcGuuOn0J6SGPhnU/rs:fit/g:sm/q:90/h:600/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTE1Nzkw/NTQwLTE1OTc4NDc0/MzEtNzcwOC5qcGVn.jpeg',
                'genre' => 'J-pop',
                'released' => 1992,
            ],])->create();
    }
}
