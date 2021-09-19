
function call_script(){
    const burgerAndBackground = document.querySelectorAll(".close")
    const line = document.querySelectorAll(".burger div")
    const menu = document.querySelectorAll(".navbar-burger")[0]
    const background = document.querySelectorAll(".background")[0]
    const onglets = document.querySelectorAll(".onglets button")
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
            onglets.forEach(function(y){
                y.classList.remove('selection')
            })
            e.classList.remove('selection')
            sectionCards.forEach(function(elem){
                 if(!elem.classList.contains(e.id)){
                     elem.style.display = 'none'
                                 
                }else{
                    elem.style.display = 'flex'
                    e.classList.add('selection')    
                    console.log(elem)
                }
            })
           
        }) 
    })
    
    cardsSelected.forEach(function (e){
        e.addEventListener('click', ()=>{
            articles.forEach(function (elem){
                if(elem.classList.contains('article-'+e.classList[1])&&elem.classList.contains(e.classList[0])){
                elem.style.cssText = 'transform: translate(0em,0em); '
                elem.classList.add('changeColor')

            }
                X.forEach(function (x){
                    x.addEventListener('click',()=>{
                        elem.style.cssText = 'transform: translate(200em,0em); background-color: none;'
                        elem.classList.remove('changeColor')
                    })
                })
            })
            
        
        })
            
    })
    
    
        
    
    
    
}