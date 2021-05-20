Vue.component("v-autocompleter", {
    // <div>isActive: {{ isActive }}</div>
    // <div>focused : {{ focused }}</div>
    // <div>filteredCities : {{ filteredCities.length }}</div>
    // <div>inFocus : {{ inFocus }}</div>
    // <div>value: {{ value }}</div>
    template: `
    <div class="v-autocompleter">
        <input
        class="wpis"
        :value="value"
        @input="$emit('input', $event.target.value)"
        type="search"
        minlength="2048"
        maxlength="2048"
        title="Szukaj"
        v-on:click="ustaw()"
        ref="first"
        @focus="focused=true"
        @keyup.down="down()"
        @keyup.up="up()"
        @keyup.enter="enter()"/>
        
        <div class="auto">
            <div id="autocomplete"
                :class="[ value.length !== 0 && focused && filteredCities.length !== 0 ? \'autocompleter\' : \'bez\']">
                <ul class="wyniki">
                    <li
                        class="pojedynczy"
                        :class="{active: inFocus === index}"
                        v-for="(city, index) in filteredCities"
                        v-on:click="zmiana(city.name)">
                        <img class="lupaaa" src="magnifier_2.png">
                        <div class="kazdy" v-html="pogrubienie(city.name)"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>`,
    
    props: [
        /**
         * options to wartość wskazująca na listę miast
         */
        'options',
        /**
         * value to wartość wskazująca wpis z inputa
         */
        'value'
    ],

    data: function() {
        return {
            cities: window.cities,
            isActive: 0,
            control: 0,
    
            filteredCities:"",
            update_filteredCities:true,
            focused: false,
            change: false,
            inFocus: -1,
            searchedInput:''
        }
    },
    /**
     * funkcja updated() aktywuje bieżący element - ustawia focus
     */
    updated() {
        this.$nextTick(() => {
            if (this.value.length > 0) {        
                this.$el.focus();
            }
        });
    },
    watch:{
        /**
         * funkcja inFocus() wskazuje na obecnie wybraną wartość listy miast
         * i wpisuje ją do inputa
         */
        inFocus: function(newValue) {
            if (newValue < 0) {
                return;
            }
            this.update_filteredCities = false;

            this.$emit('input', this.filteredCities[this.inFocus].name);
        },
        /**
         * funkcja value() ustawia wartość wyszukiwania z inputa na określoną wartość
         */
        value: function() {
            this.createFilteredCities(this.update_filteredCities);
            this.update_filteredCities = true;
            this.focused = true;
            console.log(this.filteredCities);

            if(this.inFocus == -1) {
                this.searchedInput = this.value;
            }
        }
    },
    methods:{
        /**
         * funkcja zmiana() zmienia element, który został wpisany do inputa
         * na ten, który został wybrany
         */
        zmiana: function(a){
            if(this.isActive == 0) {
                this.isActive = 1;
                this.$emit('input', a);
                el2 = document.getElementById("autocom");
                el2.blur();
                this.control = 0;
            }
        },
        /**
         * funkcja zapisuje pogrubioną część wyszukiwania, 
         * która nie została wpisana w inputa,
         * a część wpisaną wypisuje stylem normalnym
         */
        pogrubienie: function(a)
        {
            wyszukaj = this.value;
            var pom = a.split(wyszukaj);
            for(i = 0; i < pom.length; i++)
            {
                a = a.replace(pom[i], pom[i].bold());
            }
            return a;
        },
        /**
         * funkcja ustaw() ustawia wybraną wartość
         */
        ustaw: function() {
            this.control = 1;
        },
        /**
         * funkcja enter() służy wybraniu miasta z listy za pomocą entera
         */
        enter: function() {
            this.update_filteredCities = true;
            this.change = true;
            this.focused = false;
            this.inFocus = -1;
            this.$emit('enter', this.value);
        },
        /**
         * funkcja down() obsługuje strzałkę w dół -
         * jej wywołanie skutkuje przesunięciem po liście
         * odpowiednio w dół po elementach oraz z ostatniego na pierwszy
         */
        down: function(){
            if(this.inFocus < this.filteredCities.length - 1) {
                this.inFocus++; 
            } else if(this.inFocus == this.filteredCities.length-1)  {
                this.inFocus = 0; 
            }
        },
        /**
         * funkcja up() obsługuje strzałkę w górę -
         * jej wywołanie skutkuje przesunięciem po liście
         * odpowiednio w górę po elementach oraz z pierwszego na ostatni
         */
        up: function(){
            if(this.inFocus > 0) {
                this.inFocus--; 
            } else if(this.inFocus == 0) {
                this.inFocus = this.filteredCities.length-1;
            }
        },
        /**
         * funkcja createFilteredCities() tworzy listę miast zawierających wpisaną
         * w input frazę
         */
        createFilteredCities: function(yes){
            if(yes) {
                let result = this.cities.filter(city => city.name.includes(this.value));
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