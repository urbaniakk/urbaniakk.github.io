var app = new Vue({
    el: "#app",
    data: {
        googleSearch: "",
        cities: window.cities,
        isActive: 0,
        control: 0
    },
    updated() {
        this.$nextTick(() => {
        if (this.googleSearch.length > 0) {        
        this.$refs.second.focus();
        } else {
        this.$refs.first.focus();
        }
        });
        },
    computed: {
        filteredCities: function() {
            let m = this.cities.filter(city => city.name.includes(this.googleSearch))
            if(m.length > 10){
                return m.slice(0,11);
            }
            return m
            }
        },

    methods:{
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
        ustaw: function()
        {
            this.control = 1;
        }
    }
});
