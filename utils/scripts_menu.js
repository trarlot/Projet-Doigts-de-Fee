function call_script_menu(){
    const burgerAndBackground = document.querySelectorAll(".close")
    const body = document.querySelectorAll("body")
    const line = document.querySelectorAll(".burger div")
    const menu = document.querySelectorAll(".navbar-burger")[0]
    const background = document.querySelectorAll(".background")[0]
    burgerAndBackground.forEach(function(e){
         e.addEventListener('click', ()=>{
            if(background.classList.contains('toggle')){
                body[0].classList.remove('lock-scroll')
                background.classList.remove('toggle')
                menu.classList.remove('slide-down')
                line[0].classList.remove('cross1')
                line[1].classList.remove('disabled')
                line[2].classList.remove('cross2')
            }else{
                body[0].classList.add('lock-scroll')

                background.classList.add('toggle')
                menu.classList.add('slide-down')
                line[0].classList.add('cross1')
                line[1].classList.add('disabled')
                line[2].classList.add('cross2')
            }
        })
    })
}