const btns = document.querySelectorAll('.button')

btns.forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.classList.add('active')

        setTimeout(function() {
            btn.classList.remove('active')
        } , 800)

    })
})
