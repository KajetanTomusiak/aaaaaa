var apiKey = "AIzaSyBIvdkOX-8eN5gCBlv4R3uX4IzCz3p9QbE";
var channelId = "UCjcAr_73J0V-dFbKfRT_2sw";
var url = "https://www.googleapis.com/youtube/v3/channels?key=" + apiKey + "&id=" + channelId + "&part=statistics";

$.getJSON(url, function (data) {
    var subscribersCount = data.items[0].statistics.subscriberCount;
    $(".subscribers-count").text(subscribersCount);
});

setInterval(function () {
    $.getJSON(url, function (data) {
        var subscribersCount = data.items[0].statistics.subscriberCount;
        $(".subscribers-count").text(subscribersCount);
    });
}, 1000);