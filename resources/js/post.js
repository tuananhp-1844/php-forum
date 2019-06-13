jQuery(document).ready(function ($) {
    var array = []
    jQuery('.post-content').find('h1, h2, h3, h4, h5, h6').each((index, element) => {
        jQuery(element).attr('id', index)
        switch (element.tagName) {
            case 'H1':
                array.push(element.innerHTML)
                break;
            case 'H2':
                array.push('&nbsp; &nbsp;' + element.innerHTML)
                break;
            case 'H3':
                array.push('&nbsp; &nbsp; &nbsp; &nbsp;' + element.innerHTML)
                break;
            case 'H4':
                array.push('&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;' + element.innerHTML)
                break;
            case 'H5':
                array.push('&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ' + element.innerHTML)
                break;
            case 'H6':
                array.push('&nbsp; 	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ' + element.innerHTML)
                break;

            default:
                break;
        }
    })

    var text = '';

    array.forEach((item, index) => {
        text += '<li class="related-item"><b><a href="#' + index + '">' + item + '</a></b></li>'
    })

    $('.table_content').html(text)
});
