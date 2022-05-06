
function verifier(e)
{

/*if(document.getElementById("jours").value>100)
    {
    alert('Le nombre des jours est faux!');
   
    }*/
    alert('pas d envoi !!!');
    e.preventDefault();
}

var b=document.getElementById('submit');
b.addEventListener('click',verifier);

//b.addEventListener('click',stop(e));

