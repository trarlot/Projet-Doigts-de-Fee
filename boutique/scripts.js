function call_script(){
    const burgerAndBackground = document.querySelectorAll(".close")
    const line = document.querySelectorAll(".burger div")
    const menu = document.querySelectorAll(".navbar-burger")[0]
    const background = document.querySelectorAll(".background")[0]
    const onglets = document.querySelectorAll(".onglets input")
    const sectionCards = document.querySelectorAll(".section-card")
    const cardsSelected = document.querySelectorAll(".section-card button")
    const articles = document.querySelectorAll(".article")
    const section = document.querySelectorAll("section")
    const X = document.querySelectorAll(".X")
    burgerAndBackground.forEach(function(e){
         e.addEventListener('click', ()=>{
            if(background.classList.contains('toggle')){
                background.classList.remove('toggle')
                menu.classList.remove('slide-down')
                line[0].classList.remove('cross1')
                line[1].classList.remove('disabled')
                line[2].classList.remove('cross2')
            }else{
                background.classList.add('toggle')
                menu.classList.add('slide-down')
                line[0].classList.add('cross1')
                line[1].classList.add('disabled')
                line[2].classList.add('cross2')
            }
        })
    })
    
    onglets.forEach(function(e){   
        e.addEventListener('click', ()=>{
            console.log(onglets)
                e.classList.add('selected')
           
        }) 
    })
    
   
}