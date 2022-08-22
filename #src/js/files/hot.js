document.addEventListener('DOMContentLoaded', function () { 

    let close_btns = document.querySelectorAll(".predl .close")    

    close_btns.forEach(element => {
        element.onclick = (e) => { 
            e.preventDefault()
            let id_close = element.dataset.howclose
            let win = document.getElementById(id_close)

            if (win) win.style.display = "none"

        }
    })

})