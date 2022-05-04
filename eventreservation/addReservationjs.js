let form = document.getElementById('form-event');

form.addEventListener('submit',function(event) {
    $('#lastname-eventreservation-error').html('')
    $('#firstname-eventreservation-error').html('')
    $('#email-eventreservation-error').html('')
    let lastName = $('#event-reservation-lastname').val();
    let firstName = $('#event-reservation-firstname').val();
    let email = $('#event-reservation-email').val();
    if(lastName === '') {
        $('#lastname-eventreservation-error').html('Lastname is required')
        $('#lastname-eventreservation-error').css('color','red')
        event.preventDefault();
    } else if(lastName.length < 2) {
        $('#lastname-eventreservation-error').html('name must be longer then 2 caracters')
        $('#lastname-eventreservation-error').css('color','red')
        event.preventDefault();
    }
    if(firstName === '') {
        $('#firstname-eventreservation-error').html('Firstname is required')
        $('#firstname-eventreservation-error').css('color','red')
        event.preventDefault();
    }
    if(email === '') {
        $('#email-eventreservation-error').html('Email is required')
        $('#email-eventreservation-error').css('color','red')
        event.preventDefault();
    }
})