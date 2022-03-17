(function () {
    var appellation = document.querySelectorAll('.appellation')
    var cepage = document.querySelectorAll('.cepage')
    for (i = 0; i<appellation.length; i++) {
        var text = appellation[i].innerHTML
        if (text.length > 13) {
            appellation[i].classList.add('long_appellation')
            cepage[i].classList.add('appellation_resp')
            console.log('Done')
        }
    }

    // var statue = 0 //0: mets, 1:regions, 2:millesime, 3:cepages

    // var mets = document.querySelectorAll('.mets')
    // var regions = document.querySelectorAll('.regions')
    // var cepages = document.querySelectorAll('.cepages')
    // regions.forEach((el) => {
    //     el.classList.remove('regions')
    // })
    // cepages.forEach((el) => {
    //     el.classList.remove('cepages')
    // })
    // console.log(regions)
    // console.log(cepages)
    // console.log(regions[0].classList)
    // console.log(cepages[0].classList) 
    
    var criteres = document.querySelectorAll('.nav_criteres a')
    for (var i = 0; i < criteres.length; i ++) {
        criteres[i].addEventListener('click', function(e){
            e.preventDefault()
            var li = this.parentNode
            var div = this.parentNode.parentNode.parentNode

            if (li.classList.contains('active')){
                console.log('False return')
                return false
            }

            div.querySelector('.nav_criteres.active').classList.remove('active')
            li.classList.add('active')
            
            // div.querySelector('.choice-button.active').classList.remove('active')
            var buttons_delete = div.querySelectorAll('.choice-button.active')
            for (var i = 0; i < buttons_delete.length; i++) {
                buttons_delete[i].classList.remove('active')
            }
            // div.querySelectorAll(this.getAttribute('href')).classList.add('active')
            var new_buttons = div.querySelectorAll(this.getAttribute('href'))
            for (var i = 0; i < new_buttons.length; i++) {
                new_buttons[i].classList.add('active')
            }
        })
    }
    
    var choices = document.querySelectorAll('.choice-button')
    var criteres = []
    var annees = []
    for (var i = 0; i < choices.length; i++) {
        choices[i].addEventListener('click', function(e){
            // console.log('e: ', e)
            console.log('choices : ',this)
            var current = this.id
            if (current != 'millesime'){

                var div = document.querySelector('.result')
                // console.log(this)
                // console.log(this.classList)
                var info = this.querySelector('h3').textContent
                info = info.replace(/ /g, '-')
                var selecteur = '.'
                selecteur = selecteur.concat(info)
                console.log(selecteur)
                if (this.classList.contains('select')) {
                    this.classList.remove('select')
                    for (var i = 0; i < criteres.length; i ++) {
                        if (criteres[i] == info){
                            if (i == 0){
                                criteres.shift();
                            }else {
                                criteres.splice(i,i);
                            }
                        }
                    }
                    var el = div.querySelectorAll(selecteur)
                    for (var i = 0; i < el.length; i++){
                        el[i].classList.remove('active-card')
                    }
    
                    if (criteres.length == 0 && annees.length == 0){
                        for (var i = 0; i < cards.length; i++) {
                            cards[i].classList.add('active-card')
                        } // cache toutes les bouteilles pour afficher que celles voulus 
                    }
                    
                    
                    console.log(criteres)
                    console.log('False return')
                    return false
                }
                if (criteres.length == 0){
                    for (var i = 0; i < cards.length; i++) {
                        cards[i].classList.remove('active-card')
                    } // cache toutes les bouteilles pour afficher que celles voulus
                }
                
                var el = div.querySelectorAll(selecteur)
                for (var i = 0; i < el.length; i++) {
                    el[i].classList.add('active-card')
                }
                
                var div = this.parentNode
                criteres.push(info)
                console.log('done')
                // console.log(div)
                this.classList.add('select')
            }else {

                var div = document.querySelector('.result')
                // console.log(this)
                // console.log(this.classList)
                var info = this.classList
                info = info[1]
                var current_year = new Date()
                current_year = current_year.getFullYear() 
                // info = info.replace(/ /g, '-')
                // var selecteur = '.'
                // selecteur = selecteur.concat(info)
                console.log(info)
                if (this.classList.contains('select')) {
                    this.classList.remove('select')
                    for (var i = 0; i < annees.length; i++) {
                        if (annees[i] == info) {
                            if (i == 0) {
                                annees.shift();
                            } else {
                                annees.splice(i, i);
                            }
                        }
                    }

                    switch (info) {
                        case '1':
                            console.log('case 1')
                            var el = div.querySelectorAll('.wine-card')
                            for (var i = 0; i < el.length; i++) {
                                y = el[i].querySelector('.millesime').textContent
                                if (current_year - y <= 5) {
                                    el[i].classList.remove('active-card')
                                }
                            }
                            break;
                        case '5':
                            var el = div.querySelectorAll('.wine-card')
                            for (var i = 0; i < el.length; i++) {
                                y = el[i].querySelector('.millesime').textContent
                                if (current_year - y >= 5 && current_year - y <= 10) {
                                    el[i].classList.remove('active-card')
                                }
                            }
                            break;
                        case '10':
                            var el = div.querySelectorAll('.wine-card')
                            for (var i = 0; i < el.length; i++) {
                                y = el[i].querySelector('.millesime').textContent
                                if (current_year - y >= 10 && current_year - y <= 20) {
                                    el[i].classList.remove('active-card')
                                }
                            }
                            break;
                        case '20':
                            var el = div.querySelectorAll('.wine-card')
                            for (var i = 0; i < el.length; i++) {
                                y = el[i].querySelector('.millesime').textContent
                                if (current_year - y >= 20) {
                                    el[i].classList.remove('active-card')
                                }
                            }
                            break;
                        default:
                            console.log('default')
                    }

                    if (criteres.length == 0 && annees.length == 0) {
                        for (var i = 0; i < cards.length; i++) {
                            cards[i].classList.add('active-card')
                        } // cache toutes les bouteilles pour afficher que celles voulus 
                    }


                    console.log(criteres)
                    console.log('False return')
                    return false
                }
                if (criteres.length == 0 && annees.length == 0) {
                    for (var i = 0; i < cards.length; i++) {
                        cards[i].classList.remove('active-card')
                    } // cache toutes les bouteilles pour afficher que celles voulus
                }

                console.log(current_year)
                console.log('info : ',info)

                switch (info){
                    case '1':
                        console.log('case 1')
                        var el = div.querySelectorAll('.wine-card')
                        for (var i = 0; i < el.length; i++) {
                            y = el[i].querySelector('.millesime').textContent
                            if (current_year-y <= 5){
                                el[i].classList.add('active-card')
                            }
                        }
                        break;
                    case '5':
                        var el = div.querySelectorAll('.wine-card')
                        for (var i = 0; i < el.length; i++) {
                            y = el[i].querySelector('.millesime').textContent
                            if (current_year - y >= 5 && current_year - y <= 10) {
                                el[i].classList.add('active-card')
                            }
                        }
                        break;
                    case '10':
                        var el = div.querySelectorAll('.wine-card')
                        for (var i = 0; i < el.length; i++) {
                            y = el[i].querySelector('.millesime').textContent
                            if (current_year - y >= 10 && current_year - y <= 20) {
                                el[i].classList.add('active-card')
                            }
                        }
                        break;
                    case '20':
                        var el = div.querySelectorAll('.wine-card')
                        for (var i = 0; i < el.length; i++) {
                            y = el[i].querySelector('.millesime').textContent
                            if (current_year - y >= 20) {
                                el[i].classList.add('active-card')
                            }
                        }
                        break;
                    default:
                        console.log('default')
                }



                var div = this.parentNode
                annees.push(info)
                this.classList.add('select')

            }

        })
    }
    // for (var i = 0; i < checkboxs.length; i ++){
    //     for (var i = 0; i < criteres.lenght; i ++){
    //         check = false
    //         if (checkboxs[i].getAttribute('name') == criteres[i]){
    //             check = true
    //         }
    //         if (check){
    //             checkboxs[i].checked = true
    //         }else {
    //             checkboxs[i].checked = false
    //             // form.submit()
    //         }
    //     }
    // }
    
    var wines = document.querySelectorAll('.wine-card')
    for (var i = 0; i < wines.length; i++ ){
        wines[i].addEventListener('click', function(e){
            console.log(this)
            if (this.classList.contains('wine-card_big')) {
                this.classList.add('wine-card')
                this.classList.remove('wine-card_big')
                console.log('False return')
                return false
            }
            this.classList.add('wine-card_big')
            this.classList.remove('wine-card')
        })
    }

    function test(){
        console.log('test')
    }
    
    // criteres.push("info")
    var choices = document.querySelectorAll('.choice-button')
    // for (var i = 0; i < choices.length; i ++){
    //     choices[i].addEventListener('click', function(e){
    //         for (var i = 0; i < cards.length; i++){
    //             cards[i].classList.remove('active-card')
    //         }
    //         console.log(criteres.length)
    //         var div = document.querySelector('.result')
    //         // console.log(div)
    //         console.log(criteres.length)
    //         if (criteres.length != 0){ 
    //             // console.log('criteres')
    //             var crit = this.innerText
    //             var crit = crit.replace(/ /g, '-')
    //             var selecteur = '.'
    //             selecteur = selecteur.concat(crit)
    //             console.log(selecteur)
    //             var el = div.querySelectorAll(selecteur)
    //             for (var i = 0; i < el.length; i++){
    //                 if (this.classList.contains('select')){
    //                     el[i].classList.add('active-card')
    //                 }else{
    //                     el[i].classList.remove('active-card')
    //                     if (criteres.length == 0) {
    //                         for (var i = 0; i < cards.length; i++){
    //                             cards[i].classList.add('active-card')
    //                         }
    //                     }
    //                 }
                    
    //             }
    //         }else {
    //             all = div.querySelectorAll('wine-card')
    //             for (var i = 0; i < all.length; i++){
    //                 all[i].classList.add('active-card')
    //             }
    //         }
            
    //     })
    // }

    var cards = document.querySelectorAll('.wine-card')
    for (var i = 0; i < cards.length; i++){
        if (criteres.length == 0) {
            cards[i].classList.add('active-card')
        }
    }

    var mill_buttons = document.querySelectorAll('#millesime')
    console.log(mill_buttons)
    for (var i = 0; i < mill_buttons.length; i++){
        if (mill_buttons[i].classList.contains('select')){
            var year = mill_buttons.classList
            console.log(year)
        }
    }

})()