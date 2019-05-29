jQuery(document).ready(function ($) {
    jQuery('.post-content').each(function(index, element) {
        var string = $(this).html();
        $(this).html(string.substring(0, 500) + ' ...')
    })
});
