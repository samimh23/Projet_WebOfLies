
let form = document.getElementById('form_log');

form.addEventListener('submitjs',function(log) {
    $('#typejs').html('')
    $('#etoilejs').html('')
    $('#prixjs').html('')
    let type = $('#typejs').val();
    let etoile = $('#etoilejs').val();
    let prix= $('#prixjs').val();
    l
    if(type=== '') {
        $('#typejs').html('type is required')
        $('#typejs').css('color','red')
        log.preventDefault();
    } else if(type < 5) {
        $('#typejs').html('type must be longer then 5 caracters')
        $('#typejs').css('color','red')
        log.preventDefault();
    }
   
    
    if(prix == 0) {
        $('#prixjs').html('type is required')
        $('#prixjs').css('color','red')
        log.preventDefault();
    }
    if(etoile == 0) {
        $('#etoilejs').html('type is required')
        $('#etoilejs').css('color','red')
        log.preventDefault();
    }
   
})
