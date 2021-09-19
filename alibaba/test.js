function callScript() {
    const month_Select = document.getElementById('mois')
    month_Select.addEventListener('click',is30Month)
    console.log(day)
    
    function is30Month(){
        const Selectday = document.getElementById('day').getElementsByTagName("option")
        const day = document.getElementById('day')
        const months= ['Février','Avril', 'Juin', 'Septembre','Novembre'];
        if(months.includes(monthSelected())){ // vérifie si le mois selectionée est un mois coprenat 30j ou moins
            if(monthSelected()=='Février'){ 
                Selectday[30].disabled = true
                Selectday[29].disabled = true
                Selectday[28].disabled = true

            }else{
                Selectday[29].disabled = false
                Selectday[28].disabled = false
                Selectday[30].disabled = false    
            }
            Selectday[30].disabled = true        //On désactive le 31ème jour
            day.value= '1'
        }
        else{
            Selectday[30].disabled = false
            Selectday[29].disabled = false
            Selectday[28].disabled = false
        }

    }
    

    function monthSelected() {
        select = document.getElementById("mois");
        choice = select.selectedIndex  // Récupération de l'index du <option> choisi
        month = select.options[choice].text; //Récupération du mois sélectioné
        return month;
    }


    

}