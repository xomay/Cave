let vm = new Vue({
    el: "#choice",
    data: {
        valid: false,
    },

    methods: {
        check: function () {
            if (this.valid) {
                console.log(this.valid)
                this.valid = false
                console.log('set false')
            }else {
                console.log(this.valid)
                this.valid = true 
                console.log('set true')
            }
        },

    },
})
