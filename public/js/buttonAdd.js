const btns = document.querySelectorAll('.button')
console.log(btns)

btns.forEach((btn) => {
    console.log(btn)
    btn.addEventListener("click", () => {
        btn.classList.add('active')

        setTimeout(function() {
            btn.classList.remove('active')
        } , 800)
       
    })
})
