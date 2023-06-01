
$(document).ready(function () {
    //rss 1
    function trending_Area_Right(imageURL, link, title, pubDate, i) {
        var html = '';
        html += '<img src="' + imageURL + '" alt="">'
        html += '<div class="trend-top-cap trend-top-cap2">'
        html += '<h2><a href="' + link + '">' + title + '</a></h2>'
        html += '<p>' + pubDate + '</p>'
        html += '</div>'
        $("#trending_top_" + i).html(html);
    }
    var urlTrending_area = "https://vnexpress.net/rss/tin-moi-nhat.rss"
    $.getJSON("https://api.rss2json.com/v1/api.json?rss_url=" + urlTrending_area, function (data) {
        var n = 0;
        $.each(data.items, function (index, item) {
            var descriptionCDATA = item.description
            // Tạo một thẻ div ẩn để chứa đoạn mã CDATA
            var div = $("<div>").hide().html(descriptionCDATA);
            // Trích xuất URL hình ảnh từ thẻ img trong đoạn mã CDATA
            var imageURL = div.find("img").attr("src");
            if (n == 0) {
                var html = '';
                html += '<img src="' + imageURL + '" alt="">'
                html += '<div class="trend-top-cap">'
                html += '<h2> <a href="' + item.link + '" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">' + item.title + '</a></h2>'
                html += '<p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">' + item.pubDate + '</p>'
                html += '</div>'
                $("#trending_area_single").html(html)
            }
            if (n == 1 || n == 2) {
                trending_Area_Right(imageURL, item.link, item.title, item.pubDate, n)
            }
            if (n == 3) {
                return false;
            }
            n++;
        });
    });

    //rss 2
    var arrUrl_Whats_New = ["https://vnexpress.net/rss/the-gioi.rss",
        "https://vnexpress.net/rss/thoi-su.rss",
        "https://vnexpress.net/rss/kinh-doanh.rss",
        "https://vnexpress.net/rss/giai-tri.rss",
        "https://vnexpress.net/rss/the-thao.rss",
        "https://vnexpress.net/rss/tin-noi-bat.rss"];
    function left_Detail_Caption(imageURL, link, title, pubDate, i) {
        var html = '';
        html += '<div class="whates-img">'
        html += '<img src="' + imageURL + '" alt="">'
        html += '</div>'
        html += '<div class="whates-caption">'
        html += '<h4><a href="' + link + '">' + title + '</a></h4>'
        html += '<span>' + pubDate + '</span>'
        html += '</div>'
        $("#left_details_caption_" + i).html(html)
    }
    function right_Single_Caption(imageURL, link, title, pubDate, i) {
        var html = '';
        html += '<div class="whats-right-img">'
        html += '<img src="' + imageURL + '" alt="" style="width: 100%">'
        html += '</div>'
        html += '<div class="whats-right-cap">'
        html += '<h4><a href="' + link + '">' + title + '</a></h4>'
        html += '<p>' + pubDate + '</p>'
        html += '</div>'
        $("#right_single_caption_" + i).html(html)
    }
    for (let i = 0; i < arrUrl_Whats_New.length; i++) {
        $.getJSON("https://api.rss2json.com/v1/api.json?rss_url=" + arrUrl_Whats_New[i], function (data) {
            var n = 0;
            $.each(data.items, function (index, item) {
                var descriptionCDATA = item.description
                // Tạo một thẻ div ẩn để chứa đoạn mã CDATA
                var div = $("<div>").hide().html(descriptionCDATA);
                // Trích xuất URL hình ảnh từ thẻ img trong đoạn mã CDATA
                var imageURL = div.find("img").attr("src");
                if (n == 0) {
                    left_Detail_Caption(imageURL, item.link, item.title, item.pubDate, i)
                }
                if (n == 1 || n == 2 || n == 3 || n == 4) {
                    right_Single_Caption(imageURL, item.link, item.title, item.pubDate, i + "_" + n)
                }
                if (n == 5) {
                    return false;
                }
                n++;
            });
        });
    }

    //rss 3
    function most_recent_single(imageURL, link, title, pubDate, i) {
        var html = '';
        html += '<div class="most-recent-images">'
        html += '<img src="' + imageURL + '" alt="" style="width: 100%">'
        html += '</div>'
        html += '<div class="most-recent-capt">'
        html += '<h4><a href="' + link + '">' + title + '</a></h4>'
        html += '<p>' + pubDate + '</p>'
        html += '</div>'
        $("#most_recent_single_" + i).html(html);
    }
    var urlMost_Recent = "https://vnexpress.net/rss/suc-khoe.rss"
    $.getJSON("https://api.rss2json.com/v1/api.json?rss_url=" + urlMost_Recent, function (data) {
        var n = 0;
        $.each(data.items, function (index, item) {
            var descriptionCDATA = item.description
            // Tạo một thẻ div ẩn để chứa đoạn mã CDATA
            var div = $("<div>").hide().html(descriptionCDATA);
            // Trích xuất URL hình ảnh từ thẻ img trong đoạn mã CDATA
            var imageURL = div.find("img").attr("src");
            if (n == 0) {
                var html = '';
                html += '<img src="' + imageURL + '" alt="">'
                html += '<div class="most-recent-cap">'
                html += '<h4><a href="' + item.link + '">' + item.title + '</a></h4>'
                html += '<p>' + item.pubDate + '</p>'
                html += '</div>'
                $("#most_recent_area").html(html)
            }
            if (n == 1 || n == 2) {
                most_recent_single(imageURL, item.link, item.title, item.pubDate, n)
            }
            if (n == 3) {
                return false;
            }
            n++;
        });
    });

    //rss 4
    function most_popular(imageURL, link, title, pubDate, i) {
        var html = ''
        html += '<div class="weekly2-img">'
        html += '<img src="' + imageURL + '" alt="" style="width: 100%">'
        html += '</div>'
        html += '<div class="weekly2-caption">'
        html += '<h4><a href="' + link + '">' + title + '</a></h4>'
        html += '<p>' + pubDate + '</p>'
        html += '</div>'
        $("#most_popular_single_"+i).html(html)
    }
    var urlMost_Popular = "https://vnexpress.net/rss/du-lich.rss"
    $.getJSON("https://api.rss2json.com/v1/api.json?rss_url=" + urlMost_Popular, function (data) {
        var n = 0;
        $.each(data.items, function (index, item) {
            var descriptionCDATA = item.description
            // Tạo một thẻ div ẩn để chứa đoạn mã CDATA
            var div = $("<div>").hide().html(descriptionCDATA);
            // Trích xuất URL hình ảnh từ thẻ img trong đoạn mã CDATA
            var imageURL = div.find("img").attr("src");
            most_popular(imageURL, item.link, item.title, item.pubDate, n)
            n++;
            if (n == 10) {
                return false;
            }
        });
    });
    
});