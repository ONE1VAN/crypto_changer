$('#u_receive').on('change', function() {
    var u_receive = $('#u_receive').text();
    $('#u_receive').html(u_receive / 100 * 5);
    consol.log(u_receive / 100 * 5)
})