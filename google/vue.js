var app = new Vue({
    el: "#app",
    data: {
        googleSearch: "",
        cities: window.cities
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
        }
});
