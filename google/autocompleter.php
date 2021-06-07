<!--<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="pl">
    <head>
        <link rel="stylesheet" href="autocompleter.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&display=swap">    
        <link rel="icon" href="google.png">
        <title>Strona Google</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div id="app">
            <v-autocompleter :options="cities"></v-autocompleter>
        </div>
        <script src="cities.js" defer></script>
        <script src="autocompleter.js" defer></script>
        <script src="vue.js" defer></script>
    </body> 
</html>-->

<!DOCTYPE html>
<html>
<head>
    <title>My first Vue app</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://unpkg.com/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div id="app">
    {{ googleSearch }}
    <input type="text" v-model="googleSearch" @input="findResultsDebounced" />
    <div v-for="city in results" :key="city.name">
        <span class="name">{{ city.name }}</span>
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
                fetch(`http://localhost/search?name=${this.googleSearch}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data: ', data);
                        this.results = data;
                    });
            })
        }
    })
  </script>
</body>
</html>