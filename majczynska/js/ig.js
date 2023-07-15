$(document).ready(function() {
    var instagramUsername = 'majczynskaa'; // Nazwa użytkownika Instagram

    // Wywołanie zapytania do usługi trzeciej
    $.ajax({
        url: 'https://example.com/instagram-followers-api?username=' + instagramUsername,
        dataType: 'json',
        success: function(data) {
            var followersCount = data.followers;

            $('#followersCount').text(followersCount);
        },
        error: function() {
            console.log('Błąd pobierania danych');
        }
    });
});