(function () {
    var width = window.screen.availWidth

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

    function application(card, criteres, annees) {
        var current_year = new Date()
        current_year = current_year.getFullYear() 

        if (!criteres.length == 0){
            for (var j = 0; j < criteres.length; j++) {
                if (!card.classList.contains(criteres[j])) {
                    return false
                }
            }
        }
        if (!annees.length == 0){
            if (annees.includes('1') && annees.length == 1){
                //cas -5 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff > 5) {
                    return false
                }
            }else if (annees.includes('5') && annees.length == 1) {
                //cas 5-10 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff < 5 || diff > 10) {
                    return false
                }
            }else if (annees.includes('10') && annees.length == 1) {
                //cas 10-20 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                console.log(diff)
                if (diff < 10 || diff > 20) {
                    console.log('false')
                    return false
                }
            }
            else if (annees.includes('20') && annees.length == 1) {
                //cas +20 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff < 20) {
                    return false
                }
            }else if (annees.includes('1') && annees.includes('5') && annees.length == 2) {
                //cas moins de 10 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff > 10) {
                    return false
                }
            }else if (annees.includes('1') && annees.includes('5') && annees.includes('10') &&
             annees.length == 3) {
                 //cas -20 ans
                 y = card.querySelector('.millesime').textContent
                 var diff = current_year - y
                 if (diff > 20) {
                     return false
                    }
            }else if (annees.includes('5') && annees.includes('10') &&
                annees.length == 2) {
                //cas 5-20 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff > 20 || diff < 5) {
                    return false
                }
            }else if (annees.includes('5') && annees.includes('10') && annees.includes('20') &&
                annees.length == 3) {
                //cas 5 +20 ans
                console.log('cas +20')
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff < 5) {
                    return false
                }
            }
            else if (annees.includes('10') && annees.includes('20') &&
                annees.length == 2) {
                //cas 10 +20 ans
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                if (diff < 10) {
                    return false
                }
            }
            else if (annees.includes('1') && annees.includes('5') && annees.includes('10') &&
            annees.includes('20') && annees.length == 2) {
                // console.log('cas tous les ans')
                y = card.querySelector('.millesime').textContent
                var diff = current_year - y
                //Toutes les bouteilles sont comprises
            }else{
                return false
            }
        }
        card.classList.add('active-card')
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
                                criteres.shift();//supprime le 1er el du tableau
                            }else {
                                criteres.splice(i,i);
                            }
                        }
                    }

                    
                    for (var i = 0; i < cards.length; i++) {
                        cards[i].classList.remove('active-card')
                        application(cards[i], criteres,annees);
                    }

                    // var el = div.querySelectorAll(selecteur)
                    // for (var i = 0; i < el.length; i++){
                    //     el[i].classList.remove('active-card')
                    // }
    
                    if (criteres.length == 0 && annees.length == 0){
                        for (var i = 0; i < cards.length; i++) {
                            cards[i].classList.add('active-card')
                        } // cache toutes les bouteilles pour afficher que celles voulus 
                    }
                    
                    
                    console.log("criteres : ", criteres)
                    console.log("annees : ", annees)
                    console.log('False return')
                    return false
                }


                // if (criteres.length == 0){
                //     for (var i = 0; i < cards.length; i++) {
                //         cards[i].classList.remove('active-card')
                //     } // cache toutes les bouteilles pour afficher que celles voulus
                // }
                
                // var el = div.querySelectorAll(selecteur)
                // for (var i = 0; i < el.length; i++) {
                //     el[i].classList.add('active-card')
                // }
                
                var div = this.parentNode
                criteres.push(info)
                for (var i = 0; i < cards.length; i++) {
                    cards[i].classList.remove('active-card')
                    application(cards[i], criteres, annees);
                }
                console.log('done')
                console.log("criteres : ", criteres)
                console.log("annees : ", annees)
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
                    console.log("annees : ", annees)
                    console.log("criteres : ", criteres)

                    if (criteres.length == 0 && annees.length == 0) {
                        for (var i = 0; i < cards.length; i++) {
                            cards[i].classList.add('active-card')
                        }
                    }else{
                        for (var i = 0; i < cards.length; i++) {
                            cards[i].classList.remove('active-card')
                            application(cards[i], criteres, annees);
                        }
                    }


                    console.log("criteres : ", criteres)
                    console.log("annees : ", annees)
                    console.log('False return')
                    return false //ne fait pas la suite (remplace le else)
                }

                if (criteres.length == 0 && annees.length == 0) {
                    for (var i = 0; i < cards.length; i++) {
                        cards[i].classList.remove('active-card')
                    } // cache toutes les bouteilles pour afficher que celles voulus
                }

                console.log(current_year)
                console.log('info : ',info)

                var div = this.parentNode
                annees.push(info)

                for (var i = 0; i < cards.length; i++) {
                    cards[i].classList.remove('active-card')
                    application(cards[i], criteres, annees);
                }

                this.classList.add('select')
                console.log("criteres : ", criteres)
                console.log("annees : ", annees)

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

    var verif = false

    var body = document.querySelector('body')
    body.addEventListener('click', function (e) {
        if (verif == true) {
            if (width > 925){
            console.log('click', e)
            verif = false
            var current = document.querySelector('.wine-card_big')
            current.classList.add('wine-card')
            current.classList.remove('wine-card_big')
            var top = current.querySelector('.top-card_big')
            top.classList.add('top-card')
            top.classList.remove('top-card_big')
            var main_image = current.querySelector('.main-bouteille_big')
            main_image.classList.add('main-bouteille')
            main_image.classList.remove('main-bouteille_big')
            var star = current.querySelector('.star_big')
            star.classList.add('star')
            star.classList.remove('star_big')
            var bouteille = current.querySelector('.bouteille_big')
            bouteille.classList.add('bouteille')
            bouteille.classList.remove('bouteille_big')
            var note = current.querySelector('.note')
            note.classList.remove('hide')
            var nombre = current.querySelector('.nombre')
            nombre.classList.remove('hide')
            var all_millesime = current.querySelector('.all_millesime')
            all_millesime.classList.add('hide')
            var domaine = current.querySelector('.domaine')
            domaine.classList.remove('hide')
            var millesime = current.querySelector('.millesime')
            millesime.classList.remove('hide')
            var vol_content = current.querySelector('.vol-content')
            vol_content.classList.add('hide')
            var choice_millesime = current.querySelector('.millesime_choice')
            choice_millesime.classList.add('hide')
            var btn = current.querySelector('.dropbtn')
            btn.classList.remove('current')
            var infos = current.querySelector('.infos')
            infos.classList.add('hide')
            var container = current.querySelector('.container')
            container.classList.add('hide')
            var bottom = current.querySelector('.bottom-card_big')
            bottom.classList.add('bottom-card')
            bottom.classList.remove('bottom-card_big')
            var domaine_bottom = current.querySelector('.domaine_bottom')
            domaine_bottom.classList.add('hide')
            var appellation = current.querySelector('.appellation_big')
            appellation.classList.add('appellation')
            appellation.classList.remove('appellation_big')
            var appellation = current.querySelector('.appellation')
            appellation.classList.remove('hide')
            var cepage = current.querySelector('.cepage')
            cepage.classList.remove('hide')
            var take_button = current.querySelector('.take-button')
            take_button.classList.add('hide')
            document.querySelector('body').classList.remove('no_scroll')
        }
        // if (width <= 925){
            //     var close = current.querySelector('.close')
            //     close.classList.add('hide')
            // }
        }
    })

    var close = document.querySelectorAll('.close')
    console.log(close)
    for (var i = 0; i < close.length; i++) {
        close[i].addEventListener('click', function (e) {
            console.log(verif)
            if (verif == true) {
                if (width <= 925) {
                    e.stopPropagation()
                    console.log('click', e)
                    var current = this.parentNode.parentNode
                    console.log(current)
                    current.classList.add('wine-card')
                    current.classList.remove('wine-card_big')
                    var top = current.querySelector('.top-card_big')
                    top.classList.add('top-card')
                    top.classList.remove('top-card_big')
                    var main_image = current.querySelector('.main-bouteille_big')
                    main_image.classList.add('main-bouteille')
                    main_image.classList.remove('main-bouteille_big')
                    var star = current.querySelector('.star_big')
                    star.classList.add('star')
                    star.classList.remove('star_big')
                    var bouteille = current.querySelector('.bouteille_big')
                    bouteille.classList.add('bouteille')
                    bouteille.classList.remove('bouteille_big')
                    var note = current.querySelector('.note')
                    note.classList.remove('hide')
                    var nombre = current.querySelector('.nombre')
                    nombre.classList.remove('hide')
                    var all_millesime = current.querySelector('.all_millesime')
                    all_millesime.classList.add('hide')
                    var domaine = current.querySelector('.domaine')
                    domaine.classList.remove('hide')
                    var millesime = current.querySelector('.millesime')
                    millesime.classList.remove('hide')
                    var vol_content = current.querySelector('.vol-content')
                    vol_content.classList.add('hide')
                    var choice_millesime = current.querySelector('.millesime_choice')
                    choice_millesime.classList.add('hide')
                    var btn = current.querySelector('.dropbtn')
                    btn.classList.remove('current')
                    var infos = current.querySelector('.infos')
                    infos.classList.add('hide')
                    var container = current.querySelector('.container')
                    container.classList.add('hide')
                    var bottom = current.querySelector('.bottom-card_big')
                    bottom.classList.add('bottom-card')
                    bottom.classList.remove('bottom-card_big')
                    var domaine_bottom = current.querySelector('.domaine_bottom')
                    domaine_bottom.classList.add('hide')
                    var appellation = current.querySelector('.appellation_big')
                    appellation.classList.add('appellation')
                    appellation.classList.remove('appellation_big')
                    var appellation = current.querySelector('.appellation')
                    appellation.classList.remove('hide')
                    var cepage = current.querySelector('.cepage')
                    cepage.classList.remove('hide')
                    var take_button = current.querySelector('.take-button')
                    take_button.classList.add('hide')
                    document.querySelector('body').classList.remove('no_scroll')
                    var close = current.querySelector('.close')
                    close.classList.add('hide')
                    verif = false
                }
            }
        })
    }
    
    var wines = document.querySelectorAll('.wine-card')
    var main = document.querySelector('main')
    console.log(main)
    for (var i = 0; i < wines.length; i++ ){
        wines[i].addEventListener('click', function(e){
            // console.log(this)
            if (this.classList.contains('wine-card_big')) {
                e.stopPropagation() 
                console.log('False return')
                return false
            }
            if (verif == false){
                
                e.stopPropagation()

                console.log(this)
                var year = this.querySelector('.active-mill').firstChild.getAttribute('href').substr(1)
                // var vol = this.querySelector('.vol.active-vol').firstChild.getAttribute('href').substr(1)
                var new_mill = this.querySelectorAll(`[id='${year}']`)
                for (var i = 0; i < new_mill.length; i++) {
                    if (new_mill[i].classList.contains('25cl')) {
                        this.querySelector('.little').classList.add('show-vol')
                    }
                    if (new_mill[i].classList.contains('75cl')) {
                        this.querySelector('.medium').classList.add('show-vol')
                    }
                    if (new_mill[i].classList.contains('150cl')) {
                        this.querySelector('.large').classList.add('show-vol')
                    }
                }
                var put_active = this.querySelectorAll('.show-vol')
                put_active[0].classList.add('active-vol')
                var vol = put_active[0].firstChild.getAttribute('href').substr(1)
                for (var i = 0; i < new_mill.length; i++) {
                    if (new_mill[i].classList.contains(vol)) {
                        new_mill[i].classList.add('info-active')
                    }
                }
                
                // vol_dispo = []
                // var put_active = this.querySelectorAll('.show-vol')
                // put_active[0].classList.add('active-vol')
                // var vol = put_active[0].firstChild.getAttribute('href').substr(1)
                // var new_vol = this.querySelectorAll(`[id='${year}']`)
                // console.log('current : ', new_vol)
                // for (var i = 0; i < new_vol.length; i++) {
                //     if (new_vol[i].classList.contains('info-active')) {
                //         new_vol[i].classList.remove('info-active')
                //     }
                // }
                // for (var i = 0; i < new_vol.length; i++) {
                //     if (new_vol[i].classList.contains(vol)) {
                //         new_vol[i].classList.add('info-active')
                //     }
                // }

                this.classList.add('wine-card_big')
                this.classList.remove('wine-card')
                var top = this.querySelector('.top-card')
                top.classList.add('top-card_big')
                top.classList.remove('top-card')
                var main_image = this.querySelector('.main-bouteille')
                main_image.classList.add('main-bouteille_big')
                main_image.classList.remove('main-bouteille')
                var star = this.querySelector('.star')
                star.classList.add('star_big')
                star.classList.remove('star')
                var bouteille = this.querySelector('.bouteille')
                bouteille.classList.add('bouteille_big')
                bouteille.classList.remove('bouteille')
                var note = this.querySelector('.note')
                note.classList.add('hide')
                var nombre = this.querySelector('.nombre')
                nombre.classList.add('hide')
                var all_millesime = this.querySelector('.all_millesime')
                all_millesime.classList.remove('hide')
                var domaine_top = this.querySelector('.domaine')
                domaine_top.classList.add('hide')
                var millesime = this.querySelector('.millesime')
                millesime.classList.add('hide')
                var vol_content = this.querySelector('.vol-content')
                vol_content.classList.remove('hide')
                var choice_millesime = this.querySelector('.millesime_choice')
                choice_millesime.classList.remove('hide')
                var btn = this.querySelector('.dropbtn')
                btn.classList.add('current')
                var infos = this.querySelector('.infos')
                infos.classList.remove('hide')
                var container = this.querySelector('.container')
                container.classList.remove('hide')
                var bottom = this.querySelector('.bottom-card')
                bottom.classList.add('bottom-card_big')
                bottom.classList.remove('bottom-card')
                var domaine_bottom = this.querySelector('.domaine_bottom')
                domaine_bottom.classList.remove('hide')
                var appellation = this.querySelector('.appellation')
                appellation.classList.add('appellation_big')
                appellation.classList.remove('appellation')
                var cepage = this.querySelector('.cepage')
                cepage.classList.add('hide')
                var take_button = this.querySelector('.take-button')
                take_button.classList.remove('hide')
                document.querySelector('body').classList.add('no_scroll')
                if (width <= 925) {
                    var close = this.querySelector('.close')
                    close.classList.remove('hide')
                }
                verif = true
            }
            // main.classList.add('blur')
        })
    }
    
    

    function test(){
        console.log('test')
    }
    // criteres.push("info")
    var choices = document.querySelectorAll('.choice-button')

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

    var btn = document.querySelectorAll('#btn')
    for (var i=0; i < btn.length; i ++){
        btn[i].addEventListener('click', function(e){
            console.log('over there : ',btn[i])
            e.preventDefault
            console.log('this ; ',this)
            var card = this.parentNode.parentNode
            card.querySelector('.vol-content').classList.toggle('hide')
            var content = this.parentNode.querySelector('.drop-content')
            console.log('content ; ', content)
            content.classList.toggle('drop-hide')
            console.log('done')
        })
    }

    var millbtn = document.querySelectorAll('.mill a')
    console.log('btn : ',millbtn)
    var vol_dispo = []
    for (var i = 0; i < millbtn.length; i++) {
        millbtn[i].addEventListener('click', function (e) {
            e.preventDefault()
            console.log('mill click')
            var li = this.parentNode
            var div = this.parentNode.parentNode.parentNode
            var card = div.parentNode.parentNode
    
            if (li.classList.contains('active-mill')) {
                console.log('False')
                return false
            }
    
            div.querySelector('.mill.active-mill').classList.remove('active-mill')
            li.classList.add('active-mill')
    
            // div.querySelector('.choice-button.active').classList.remove('active')
            var mill_delete = document.querySelectorAll('.infos_mill.info-active')
            for (var i = 0; i < mill_delete.length; i++) {
                mill_delete[i].classList.remove('info-active')
            }
            // div.querySelectorAll(this.getAttribute('href')).classList.add('active')
            reset = document.querySelectorAll('.vol.show-vol')
            for (var i = 0; i < reset.length; i++){
                reset[i].classList.remove('show-vol')
                if (reset[i].classList.contains('active-vol')){
                    reset[i].classList.remove('active-vol')
                }
            }
            var year = this.getAttribute('href').substr(1)
            console.log(year)
            var new_mill = card.querySelectorAll(`[id='${year}']`)
            console.log(new_mill)
            vol_dispo = []
            for (var i = 0; i < new_mill.length; i++) {
                new_mill[i].classList.add('info-active')
                if (new_mill[i].classList.contains('25cl')){
                    vol_dispo.push('25cl')
                    card.querySelector('.little').classList.add('show-vol')
                }
                if (new_mill[i].classList.contains('75cl')) {
                    vol_dispo.push('75cl')
                    card.querySelector('.medium').classList.add('show-vol')
                }
                if (new_mill[i].classList.contains('150cl')) {
                    vol_dispo.push('150cl')
                    card.querySelector('.large').classList.add('show-vol')
                }
            }
            var put_active = card.querySelectorAll('.show-vol')
            put_active[0].classList.add('active-vol')
            var vol = put_active[0].firstChild.getAttribute('href').substr(1)
            var new_vol = card.querySelectorAll(`[id='${year}']`)
            console.log('current : ',new_vol)
            for (var i = 0; i < new_vol.length; i++) {
                if (new_vol[i].classList.contains('info-active')) {
                    new_vol[i].classList.remove('info-active')
                }
            }
            for (var i = 0; i < new_vol.length; i++) {
                if (new_vol[i].classList.contains(vol)) {
                    new_vol[i].classList.add('info-active')
                }
            }
            console.log(vol_dispo)
        })
    }

    var volbtn = document.querySelectorAll('.vol a')
    console.log('btn : ', volbtn)
    for (var i = 0; i < volbtn.length; i++) {
        volbtn[i].addEventListener('click', function (e) {
            e.preventDefault()
            console.log('vol click')
            var li = this.parentNode
            var div = this.parentNode.parentNode.parentNode
            var card = div.parentNode.parentNode

            if (li.classList.contains('active-vol')) {
                console.log('False')
                return false
            }

            div.querySelector('.vol.active-vol').classList.remove('active-vol')
            li.classList.add('active-vol')

            // div.querySelector('.choice-button.active').classList.remove('active')
            // var mill_delete = document.querySelectorAll('.infos_mill.info-active')
            // for (var i = 0; i < mill_delete.length; i++) {
            //     mill_delete[i].classList.remove('info-active')
            // }
            // div.querySelectorAll(this.getAttribute('href')).classList.add('active')
            var year = card.querySelector('.active-mill').firstChild.getAttribute('href').substr(1)
            var vol = this.getAttribute('href').substr(1)
            console.log(vol)
            var new_vol = card.querySelectorAll(`[id='${year}']`)
            console.log(new_vol)
            for (var i = 0; i < new_vol.length; i++) {
                if (new_vol[i].classList.contains('info-active')) {
                    new_vol[i].classList.remove('info-active')
                }
            }
            for (var i = 0; i < new_vol.length; i++) {
                if (new_vol[i].classList.contains(vol)) {
                    new_vol[i].classList.add('info-active')
                }
            }
        })
    }

    var take_btn = document.querySelectorAll('.main-button')
    for (var i = 0; i < take_btn.length; i++){
        take_btn[i].addEventListener('click', function(e){
            e.preventDefault
            console.log('take click')
            var card = this.parentNode.parentNode.parentNode
            var id = card.getAttribute('id')
            var vol = card.querySelector('.active-vol').firstChild.getAttribute('href').substr(1)
            var year = card.querySelector('.active-mill').firstChild.getAttribute('href').substr(1)
            var note = card.querySelector('.info-active').querySelector('.note_big').textContent
            var nombre = card.querySelector('.info-active').querySelector('.nombre_big').textContent
            var demande = card.querySelector('.nb-input').value
            if (demande > 0 && demande <= nombre){
                console.log(id, vol, year, note, nombre, demande)
                document.getElementById('id_bouteille').value = id
                document.getElementById('volume').value = vol
                document.getElementById('annee').value = year
                document.getElementById('note').value = note
                document.getElementById('demande').value = demande 
                document.getElementById('form_values').submit();

            }else {
                window.alert('Demande incorrect !')
            }
        })
    }

    var dragbox = document.querySelector('.dragbox')
    dragbox.addEventListener('click', function(e){
        var content = document.querySelector('#content')
        var next = document.querySelector('.next')
        var choice = document.querySelector('.choice')
        if (content.classList.contains('content')){
            console.log('enter')
            content.classList.add('content-big')
            content.classList.remove('content')
            next.classList.remove('hide_resp')
            choice.classList.remove('hide_resp')
        }else {
            content.classList.remove('content-big')
            content.classList.add('content')
            next.classList.add('hide_resp')
            choice.classList.add('hide_resp')
        }
    })


})()


// this.classList.add('wine-card_big')
// this.classList.remove('wine-card')
// var top = this.querySelector('.top-card')
// top.classList.add('top-card_big')
// top.classList.remove('top-card')
// var main_image = this.querySelector('.main-bouteille')
// main_image.classList.add('main-bouteille_big')
// main_image.classList.remove('main-bouteille')
// var star = this.querySelector('.star')
// star.classList.add('star_big')
// star.classList.remove('star')
// var bouteille = this.querySelector('.bouteille')
// bouteille.classList.add('bouteille_big')
// bouteille.classList.remove('bouteille')
// var note = this.querySelector('.note')
// note.classList.add('note_big')
// note.classList.remove('note')
// var nombre = this.querySelector('.nombre')
// nombre.classList.add('nombre_big')
// nombre.classList.remove('nombre')
// var domaine = this.querySelector('.domaine')
// domaine.classList.add('domaine_big')
// domaine.classList.remove('domaine')
// var millesime = this.querySelector('.millesime')
// millesime.classList.add('hide')
// var choice_millesime = this.querySelector('.millesime_choice')
// choice_millesime.classList.remove('hide')
// var appellation_big = this.querySelector('.appellation-big')
// appellation_big.classList.remove('hide')
// var cepage_big = this.querySelector('.cepage-big')
// cepage_big.classList.remove('hide')
// var infos = this.querySelector('.infos')
// infos.classList.remove('hide')
// var bottom = this.querySelector('.bottom-card')
// bottom.classList.add('bottom-card_big')
// bottom.classList.remove('bottom-card')
// var appellation = this.querySelector('.appellation')
// appellation.classList.add('hide')
// var cepage = this.querySelector('.cepage')
// cepage.classList.add('hide')
// var take_button = this.querySelector('.take-button')
// take_button.classList.remove('hide')
// document.querySelector('body').classList.add('no_scroll')
// verif = true