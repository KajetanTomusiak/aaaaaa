var apiKey = "AIzaSyBIvdkOX-8eN5gCBlv4R3uX4IzCz3p9QbE";
var channelId = "UCjcAr_73J0V-dFbKfRT_2sw";
var maxResults = 50;
var url = "https://www.googleapis.com/youtube/v3/search?key=" + apiKey + "&channelId=" + channelId + "&part=snippet,id&order=date&maxResults=" + maxResults;

$.getJSON(url, function (data) {
    var videoContainer = $(".video-container");
    $.each(data.items, function (i, item) {
        if (item.id.kind === "youtube#video") {
            var videoItem = '<div class="video-item" data-id=""></div>';
            videoContainer.append(videoItem);
        }
    });

    $(".video-item").each(function () {
        if (!$(this).children().length) {
            $(this).remove();
        }
    });

    // Dodajemy filmy ręcznie
    var extraVideos = [
        {
            videoId: "fIR9L37F8tA",
            videoTitle: "bal",
            videoThumbnail: "https://i.ytimg.com/vi/fIR9L37F8tA/mqdefault.jpg"
        },
        {
            videoId: "GYJaJzi6mlA",
            videoTitle: "82B",
            videoThumbnail: "https://i.ytimg.com/vi/GYJaJzi6mlA/mqdefault.jpg"
        },
        {
            videoId: "G90yZM4FcMU",
            videoTitle: "koniec trasy",
            videoThumbnail: "https://i.ytimg.com/vi/G90yZM4FcMU/mqdefault.jpg"
        },
        {
            videoId: "J6fcYdl9sYM",
            videoTitle: "pamiętnik",
            videoThumbnail: "https://i.ytimg.com/vi/J6fcYdl9sYM/mqdefault.jpg"
        },
        {
            videoId: "3eTi-ELPeiY",
            videoTitle: "04:04",
            videoThumbnail: "https://i.ytimg.com/vi/3eTi-ELPeiY/mqdefault.jpg"
        },
        {
            videoId: "jQS2d2CNtLk",
            videoTitle: "wiele miejsc",
            videoThumbnail: "https://i.ytimg.com/vi/jQS2d2CNtLk/mqdefault.jpg"
        },
        {
            videoId: "DDOb6dcVqaY",
            videoTitle: "bal (dazzy remix)",
            videoThumbnail: "https://i.ytimg.com/vi/DDOb6dcVqaY/mqdefault.jpg"
        }
    ];

    extraVideos.forEach(function (extraVideo) {
        var videoItem = '<div class="video-item" data-id="' + extraVideo.videoId + '"><img src="' +
            // extraVideo.videoThumbnail + '"><h3 contenteditable="true">' + extraVideo.videoTitle + '</h3></div>';
            extraVideo.videoThumbnail + '"><h3 contenteditable="true">"' + extraVideo.videoTitle + '"</h3></div>';
        videoContainer.append(videoItem);
    });

    $(".video-item").click(function () {
        var videoId = $(this).data("id");
        var videoUrl = "https://www.youtube.com/watch?v=" + videoId;
        window.open(videoUrl, "_blank");
    });
});
