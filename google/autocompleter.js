Vue.component('v-autocompleter', {
    data: function () {
        return {
            googleSearch: '',
            isActive: 0,
            cities: window.cities,
            filteredCities:"",
            inFocus: -1,
        }
    },
    methods: {
        zmiana: function(a)
        {
            if(this.isActive == 0)
            {
                this.isActive = 1;
                this.googleSearch = a;
                el2 = document.getElementById("autocom");
                el2.blur();
                this.control = 0;
            }
        },
        pogrubienie: function(a)
        {
            wyszukaj = this.googleSearch;
            var pom = a.split(wyszukaj);
            for(i = 0; i < pom.length; i++)
            {
                a = a.replace(pom[i], pom[i].bold());
            }
            return a;
        },
    },
    
    computed: {
        createFilteredCities: function(yes){
            if(yes)
            {
                let result = this.cities.filter(city => city.name.includes(this.googleSearch));
                if(result.length > 10)
                {
                    this.filteredCities = result.slice(1, 11);
                }
                else
                {
                    this.filteredCities = result;
                }
                this.inFocus = -1;
            }   
        }

      },
})