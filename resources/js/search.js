jQuery(document).ready(function ($) {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('search');
    var src_str = $(".question-desc").html();
    var title = $(".title").html();
    var term = myParam;
    term = term.replace(/(\s+)/, "(<[^>]+>)*$1(<[^>]+>)*");
    var pattern = new RegExp("(" + term + ")", "gi");

    src_str = src_str.replace(pattern, "<mark>$1</mark>");
    src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4");

    title = title.replace(pattern, "<mark>$1</mark>");
    title = title.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/, "$1</mark>$2<mark>$4");

    $(".question-desc").html(src_str);
    $(".title").html(title);
});
