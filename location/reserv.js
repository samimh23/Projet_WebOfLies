
function verifier()
{

if(document.getElementById("jours").value>100)
    alert('Le nombre des jours est faux!');
    
    var today = new Date();
        var dateNais =new Date(document.getElementById("date").value) ;
        if (today< dateNais) 
        {alert('True date');
            
        }


        else 
         {
             alert('False Date'); 

            }
}

var b=document.getElementById('submit');
b.addEventListener('click',verifier);