Vue.component("v-autocompleter", {

    template: '<div class="wyszukiwanie"><img class="lupa" src="magnifier.png"><input class="wpis" v-model="googleSearch" type="search" minlength="2048" maxlength="2048" title="Szukaj" v-on:click="ustaw()" ref="first" @focus="focused = true" @keyup.down="down()" @keyup.up="up()" @keyup.enter="enter()"/><img class="klaw_mik" src="key_mic.png" title="Narzędzia do wprowadzania tekstu"><br><div class="auto"><div id="autocomplete" :class="[ googleSearch.length != 0 && focused && filteredCities.length != 0 ? \'autocompleter\' : \'bez\']"><ul class="wyniki"><li class="pojedynczy" v-for="city in filteredCities" v-on:click="zmiana(city.name)"><img class="lupaaa" src="magnifier_2.png"><div class="kazdy" v-html="pogrubienie(city.name)"></div></li></ul></div></div></div>',   
    props: ['options'],

    data: function()
    {
      return
      {
        googleSearch: ''
        control: 0
      }
    },

    computed: 
    {
        filteredCities: function () 
        {
            if (this.googleSearch.length == 0) 
            {
                return
            }

            let result = this.cities.filter(city => city.name.includes(this.googleSearch))
            if (result.length > 10) 
            {
                result = result.slice(0, 10)
            }
            return result
        }
    },

    methods: 
    {
        handleClick: function (a) 
        {
            this.googleSearch = a;
            this.isActive = 1;
            this.$emit('enter', this.googleSearch)
        },
        highlight: function (a) 
        {
            wyszukaj = this.googleSearch;
            var pom = a.split(wyszukaj);
            for(i = 0; i < pom.length; i++)
            {
                a = a.replace(pom[i], pom[i].bold());
            }
            return a;
            return a.replaceAll(this.googleSearch, '<span class="highlight">' + this.googleSearch + '</span>')
        },
        zmien: function () {
            this.$emit('enter', this.googleSearch)
        },
        signalChange: function () 
        {
            this.$emit('input')
        },
    },
});