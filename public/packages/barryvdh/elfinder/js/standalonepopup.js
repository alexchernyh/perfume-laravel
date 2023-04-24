$(document).on('click','.js-popup-selector',function (event) {
    event.preventDefault();
    let homeUrl = $(this).attr('data-homeurl'); 
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/admin_panel/elfinder/popup/';
    // var elfinderUrl = 'http://localhost/perfume-aff/laravel/public/admin_panel/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = homeUrl + elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '70%',
        height: '50%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    let homeUrl = $('.js-popup-selector').attr('data-homeurl');
    let srcUrl = homeUrl + '/' + filePath;
    $('#' + requestingField).val(srcUrl).trigger('change');
    $('.js-img-uploaded').attr('src', srcUrl).trigger('change');
}
