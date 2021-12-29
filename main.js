let vm = new Vue({
    el: '#bottom',
    data: {
        message: "Welcome everybody",
        link: "https://vuejs.org/",
        cls: 'success',
        success: true,
        persons: ['Mathys', 'Cesar', 'Celian', 'Mattis'],
        // style: { background: '#3A961C'}
    },

    computed: {
        close: function () {
            this.success = false
            this.message = "fermé"
            return { background: '#3A961C' }    
        },

        style: function () {
            if (this.success) {
                return {background: '#00FF00'}
            }else {
                return {background: '#FF0000'}
            }
        },

        addPerson: function () {
            this.persons.push('Marion')
        }

        // st: function () {
        //     if (this.success == true) {
        //         return { backgroud: '#00FF00' }
        //     } else {
        //         return { background: '#FF0000' }
    
        // }
    }
})