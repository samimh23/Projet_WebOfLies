
let form = document.getElementById('form_log');

form.addEventListener('submit',function(log) {
    $('#code_logjs').html('')
    $('#type_logjs').html('')
    $('#datedebutjs').html('')
    $('#nbjoursjs').html('')
    $('#emailjs').html('')
    let code = $('#code_log').val();
    let type = $('#type_log').val();
    let date= $('#datedebutjs').val();
    let joursnb = $('#nb_jours').val();
    let email = $('#email').val();
    if(code === '') {
        $('#code_logjs').html('code is required')
        $('#code_logjs').css('color','red')
        log.preventDefault();
    } else if(code.length < 2) {
        $('#code_logjs').html('code must be longer then 2 caracters')
        $('#code_logjs').css('color','red')
        log.preventDefault();
    }
    if(date === '') {
        $('#date-event-error').html('date is required')
        $('#date-event-error').css('color','red')
        event.preventDefault();
    }
    if(type === '') {
        $('#type_logjs').html('type is required')
        $('#type_logjs').css('color','red')
        log.preventDefault();
    }
    if(joursnb == 0) {
        $('#nbjoursjs').html('nombre de jour is required')
        $('#nbjoursjs').css('color','red')
        log.preventDefault();
    } else if(joursnb === '') {
        $('#nbjoursjs').html('nombre de jour is required')
        $('#nbjoursjs').css('color','red')
        log.preventDefault();
    }
    if(email == '') {
        $('#emailjs').html('email is required')
        $('#emailjs').css('color','red')
        log.preventDefault();
    }if(date === '') {
        $('#datedebutjs').html('date is required')
        $('#datedebutjs').css('color','red')
        log.preventDefault();
    }
})
