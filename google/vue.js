var app = new Vue({
    el: "#app",
    data: {
        googleSearch: "",
        cities: window.cities,
        isActive: 0,
        control: 0,

        filteredCities:"",
        update_filteredCities:true,
        focused: false,
        change: false,
        inFocus: -1,
        searchedInput:''
    },
    updated() {
        this.$nextTick(() => {
        if (this.googleSearch.length > 0) 
        {        
            this.$refs.second.focus();
        } 
        else
        {
            this.$refs.first.focus();
        }
        });
    },
    /*computed: {
        filteredCities: function() {
            let m = this.cities.filter(city => city.name.includes(this.googleSearch))
            if(m.length > 10)
            {
                return m.slice(0,11);
            }
            return m
        }
    },*/

    watch:{
        inFocus: function () 
        {
            this.update_filteredCities = false;
            this.googleSearch=this.filteredCities[this.inFocus].name;
        },
        googleSearch: function()
        {
            this.createFilteredCities(this.update_filteredCities);
            this.update_filteredCities=true;
            console.log(this.filteredCities);

            if(this.inFocus == -1)
            {
                this.searchedInput=this.googleSearch;
            }
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
        },
        enter: function(){
            this.update_filteredCities = true;
            this.change = true;
            this.inFocus = -1;
            this.focused = false;
        },
        down: function(){
            if(this.inFocus < this.filteredCities.length-1)
            {
                this.inFocus += 1; 
            }
            if(this.inFocus == this.filteredCities.length-1)
            {
                this.inFocus = 0; 
            }
        },
        up: function(){
            if(this.inFocus > 0)
            {
                this.inFocus -= 1; 
            }
            if(this.inFocus == 0)
            {
                this.inFocus = this.filteredCities.length-1;
            }
        },
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
    }
});