$('#event-date').datepicker({
    format: "yyyy-mm-dd",
    orientation: "bottom left",
});
let form = document.getElementById('form-event');

form.addEventListener('submit',function(event) {
    $('#name-event-error').html('')
    $('#date-event-error').html('')
    $('#location-event-error').html('')
    $('#price-event-error').html('')
    let name = $('#event-name').val();
    let date = $('#event-date').val();
    let location = $('#event-location').val();
    let price = $('#event-price').val();
    if(name === '') {
        $('#name-event-error').html('name is required')
        $('#name-event-error').css('color','red')
        event.preventDefault();
    } else if(name.length < 2) {
        $('#name-event-error').html('name must be longer then 2 caracters')
        $('#name-event-error').css('color','red')
        event.preventDefault();
    }
    if(date === '') {
        $('#date-event-error').html('date is required')
        $('#date-event-error').css('color','red')
        event.preventDefault();
    }
    if(location === '') {
        $('#location-event-error').html('location is required')
        $('#location-event-error').css('color','red')
        event.preventDefault();
    }
    if(price === '') {
        $('#price-event-error').html('price is required')
        $('#price-event-error').css('color','red')
        event.preventDefault();
    } else if(price == 0) {
        $('#price-event-error').html('price must be higher then 0')
        $('#price-event-error').css('color','red')
        event.preventDefault();
    }
})