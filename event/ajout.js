var formulaire=document.getElementById('create-event')
//var errorElement=document.getElementById('error')
console.log(formulaire);
formulaire.addEventListener('submit', function(e) {
    var name=document.getElementById('nameEvent')
    var id=document.getElementById('idEvent')
    var lieu=document.getElementById('lieuEvent')
    var price=document.getElementById('priceEvent')
    var date=document.getElementById('dateEvent')
    var errorName=document.getElementById('errorName');
    var errorLieu=document.getElementById('errorLieu');
    var errorId=document.getElementById('errorId');
    var errorDate=document.getElementById('errorDate');
    var errorPrice=document.getElementById('errorPrice');
    if(name.value==="")
    {   
        
        errorName.innerHTML= "Le champs Event name est requis";
        errorName.style.color= 'red';
        e.preventDefault();
    }
    if(id.value==="")
    {   
        
        errorId.innerHTML= "Le champs Id Event est requis";
        errorId.style.color= 'red';
        e.preventDefault();
    }
    if(price.value==="")
    {   
        
        errorPrice.innerHTML= "Le champs Price Event est requis";
        errorPrice.style.color= 'red';
        e.preventDefault();
    }
    if(price.value==0)
    {
        errorPrice.innerHTML= "Le champs Price Event doit etre superieur a 0";
        errorPrice.style.color= 'red';
        e.preventDefault();
    }
    if(date.value==="")
    {   
        
        errorDate.innerHTML= "Le champs Date Event est requis";
        errorDate.style.color= 'red';
        e.preventDefault();
    }
    if(lieu.value==="")
    {
        errorLieu.innerHTML= "Le champs lieu d'evenement est requis";
        errorLieu.style.color= 'red';
        e.preventDefault();
    }  
})