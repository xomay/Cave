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
})()