<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="pl">
    <head>
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="autocompleter.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&display=swap">    
        <link rel="icon" href="google.png">
        <title>Strona Google</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!--<script src="https://cdnjs.com/libraries/jquery-throttle-debounce"></script>-->
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="wrapper" id="app" :class="[isInResults ? 'results' : '']">
            <div class="zerowy">
                <div class="mini_logo">
                    <image src="mini_logo.png" alt="Google" width="178" height="73">
                </div>
                <div class="wyszukiwanie_01">
                    <img class="lupa_01" src="magnifier.png">
                    <input class="wpis_01" v-model="googleSearch" type="search" minlenght="2000" maxlength="2048" title="Szukaj" v-on:click="ustaw()" ref="second">
                    <img class="klaw_mik_01" src="key_mic.png" title="Narzędzia do wprowadzania tekstu"><br>
                </div>
                <div class="pierwszy">
                    <a class="gmail" data-pid="23" href="https://mail.google.com/mail/&amp;ogbl" target="_top">Gmail</a>
                    <a class="grafika" data-pid="2" href="https://www.google.pl/imghp?hl=pl&amp;ogbl" target="_top">Grafika</a>
                    <div class="kropki"><image src="dots.png" alt="Dots" width="23" height="23"></div>
                    <button class="button1"><a class="but" href="https://accounts.google.com/signin/v2/identifier?hl=pl&passive=true&continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dgoogle%26oq%3Dgoogle%26aqs%3Dchrome.0.69i59j0i433l3j69i60l4.678j0j4%26sourceid%3Dchrome%26ie%3DUTF-8&ec=GAZAAQ&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Zaloguj się</a></button>
                </div>  
            </div>
            <div class="pierwszy_01">
                <div class="pasek">
                    <a class="text" href="https://www.youtube.com/watch?v=lRVTVB94zTg&list=RDjb-i_ARlumQ&index=3">Wszystko</a>
                    <a class="text" href="https://www.youtube.com/watch?v=pRfmrE0ToTo&list=RDjb-i_ARlumQ&index=4">Wiadomości</a>
                    <a class="text" href="https://www.youtube.com/watch?v=wInJlp8rviw&list=RDjb-i_ARlumQ&index=5">Grafika</a>
                    <a class="text" href="https://www.youtube.com/watch?v=Td2bsJIaC5M&list=RDjb-i_ARlumQ&index=6">Mapy</a>
                    <a class="text" href="https://www.youtube.com/watch?v=AIYpdjQVidc&list=RDjb-i_ARlumQ&index=7">Wideo</a>
                    <a class="text" href="https://www.youtube.com/watch?v=p1godKRBeZc&list=RDjb-i_ARlumQ&index=8">Więcej</a>
                    <a class="text" href="https://www.youtube.com/watch?v=73_DOquGBD4&list=RDjb-i_ARlumQ&index=9">Ustawienia</a>
                    <a class="text" href="https://www.youtube.com/watch?v=QZ5GzGYgWJw&list=RDjb-i_ARlumQ&index=10">Narzędzia</a>
                </div>
            </div>
            <hr class="linia">
            <div class="cities">
                <!-- <ul v-for="city in filteredCities">
                </ul> -->
            </div>
            <div class="tresc">
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=yrJ7CVeiFvo&list=RDjb-i_ARlumQ&index=19">Halo? Odbierz!</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            Click to listen to Beyoncé on Spotify: https://open.spotify.com/artist/6vWDO...​<br>
                            As featured on I Am... Sasha Fierce. Click to buy the track or album via iTunes:<br>
                            https://music.apple.com/us/album/i-am...
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=mYFaghHyMKc">Can't you see?</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            Jason Mraz - I'm Yours:<br>
                            Stream: https://open.spotify.com/track/3S0OXQ...<br>
                            But I won't hesitate<br>
                            No more, no more.<br>
                            It cannot wait,<br>
                            I'm yours.
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=mWRsgZuwf_8&list=RDjb-i_ARlumQ&index=21">They live in us, look around</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            Get Origins, ft. Natural, Zero, Machine and Bad Liar, out now: http://smarturl.it/OriginsID​<br>
                            Shop Imagine Dragons: http://smarturl.it/ImagineDragonsShop​<br>
                            Sign up for email updates: http://smarturl.it/ID_Email​<br>
                            Listen to Imagine Dragons on Spotify: http://smarturl.it/ID_Discography​<br>
                            Catch Imagine Dragons on tour: http://imaginedragonsmusic.com/tour​
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=jW3aJ-3SEVU&list=RDjb-i_ARlumQ&index=23">Nobody, actually...</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            Music video by Demi Lovato performing Anyone (Lyric Video). © 2020 Island Records, a division of UMG Recordings, Inc.​
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=-tJ0ckX8-WQ">I am lost, now the rainbow is gone.</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            Provided to YouTube by IDOL - In This Shirt · The Irrepressibles (From the Circus to the Sea)<br>
                            ℗ Of Naked Design Recordings, Released on: 2009-01-01, Composer: Jamie McDermott<br>
                            Auto-generated by YouTube
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=o_1aF54DO60">What about old and beautiful at heart?</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            The real question is will we still love ourselves when we're no longer young and beautiful?<br>
                            if nostalgia was a song.<br>
                            Lana makes me feel like a sad rich girl who’s in a white satin dress in her room, on the balcony during a windy night, looking up at the moon and stars and thinking about her true love.
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=FWDXwrgdm9w">Praca wre, śmiem twierdzić</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            Bo czy noc nie jest piękna?<br>
                            Głębia księżyca, rozgwieżdżone niebo, głowa pełna marzeń, a jednym z nich Ty.<br>
                            Najpiękniejszym, najprawdziwszym, najważniejszym. W zakamarkach, zakazane... Świat dziwny jest.
                        </span>
                    </div>
                </div>
    
                <div class="wynik">
                    <div class="naglowek">
                        <div class="hiperlacze">
                            <div class="adres">
                                <cite class="skrot">
                                    www.youtube.com
                                    <span class="rodzaj"> › watch</span>
                                </cite>
                            </div>
                            <a class="tytul" href="https://www.youtube.com/watch?v=95HqlWRFrAk">They are killing, every day, in your head</a>
                        </div>
                    </div>
    
                    <div class="streszczenie">
                        <span class="opis">
                            🖖 And they didn't say goodbye... As we didn't and won't.
                        </span>
                    </div>
                </div>
            </div>
            <div class="drugi">
                <div class="logo">
                    <image src="logo.png" alt="Google" width="276" height="226">
                </div>
            </div>
            <div class="trzeci">
                <div class="wyszukiwanie">
                    <img class="lupa" src="magnifier_2.png">
                    
                    <!--<v-autocompleter v-model="googleSearch" @enter="autocompleterSubmit" :options="cities"></v-autocompleter>-->

                    <div id="app">
                        {{ googleSearch }}
                        <input type="text" v-model="googleSearch" @input="findResultsDebounced" />
                        <div v-for="city in results" :key="city.name">
                            <span class="name">{{ city.name }}</span>
                        </div>
            	    </div>

                    <img class="klaw_mik" src="key_mic.png" title="Narzędzia do wprowadzania tekstu"><br>
                </div>
                <div class="przyciski">
                    <button class="button2"><a class="but2" href="https://www.youtube.com/watch?v=2-AmAO_lXGo">Szukaj w Google</a></button>
                    <button class="button3"><a class="but3" href="https://www.youtube.com/watch?v=5NV6Rdv1a3I">Szczęśliwy traf</a></button>
                </div>
            </div>
            <div class="czwarty">
                Korzystaj z Google w tych językach: <a class="eng" href="https://www.youtube.com/watch?v=d27gTrPPAyk">English</a>
            </div>
            <div class="piąty">
                <div class="kraj">Polska</div>
                <div class="linki">
                    <div class="pasek1">
                        <a class="text" href="https://www.youtube.com/watch?v=ClU3fctbGls">O nas</a>
                        <a class="text" href="https://www.youtube.com/watch?v=AHU-8yb11CQ">Reklamuj się</a>
                        <a class="text" href="https://www.youtube.com/watch?v=gdx7gN1UyX0">Dla firm</a>
                        <a class="text" href="https://www.youtube.com/watch?v=HL1UzIK-flA">Jak działa wyszukiwarka</a>
                    </div>
                    <div class="pasek2">
                        <img class="leaf" src="leaf.png">
                        <a class="text_charcoal" href="https://www.youtube.com/watch?v=hIlauccaH88">Neutralność węglowa od 2007 roku</a>                        

                    </div>
                    <div class="pasek3">
                        <a class="text" href="https://www.youtube.com/watch?v=IAX8rVcbUIQ">Prywatność</a>
                        <a class="text" href="https://www.youtube.com/watch?v=CwpARGF4Zmk">Warunki</a>
                        <a class="text" href="https://www.youtube.com/watch?v=xALCpLXcIYY">Ustawienia</a>    
                    </div>
                </div>
                <div class="linki2">
                    <div class="pasek4">
                        <a class="text" href="https://www.youtube.com/watch?v=qVdPh2cBTN0">Pomoc</a>
                        <a class="text" href="https://www.youtube.com/watch?v=vk_xq1P7vIU">Prześlij opinię</a>
                        <a class="text" href="https://www.youtube.com/watch?v=nCkpzqqog4k">Prywatność</a>
                        <a class="text" href="https://www.youtube.com/watch?v=pB-5XG-DbAA">Warunki</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
    var app = new Vue({
        el: '#app',
        data: {
            googleSearch: '',
            results: []
        },
        methods : {
            findResultsDebounced : Cowboy.debounce(100, function findResultsDebounced() {
                console.log('Fetch: ', this.googleSearch)
                console.log(`http://localhost:8080/search?name=${this.googleSearch}`);
                fetch(`http://localhost:8080/search?name=${this.googleSearch}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data: ', data);
                        this.results = data;
                    });
            })
        }
    })
  	</script>        
        <!--<script src="cities.js" defer></script>-->
        <script src="autocompleter.js" defer></script>
        <script src="vue.js" defer></script>
    </body> 
</html>