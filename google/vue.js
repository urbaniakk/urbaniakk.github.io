var app = new Vue({
    el: "#app",
    data: {
        googleSearch: "",
    },
    updated() {

        this.$nextTick(() => {
        
        if (this.googleSearch.length > 0) {
        
        this.$refs.second.focus();
        
        } else {
        
        this.$refs.first.focus();
        
        }
        
        });
        
        }
});
