jQuery(function($){
    var frame = wp.media({
        title: 'Select or upload logo',
        button: {
            text: 'Use this media'
        },
        multiple: false
    });

    $('#wpdev_uploadLogoImgBtn').on('click', function(e){
        e.preventDefault();
        frame.open();
    });

    frame.on('select', function() {
        var attachment = frame.state().get('selection').first().toJSON();
        $('input[name=wpdev_inputLogoImg]').val(attachment.url);
    });
});
