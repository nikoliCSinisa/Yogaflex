jQuery(document).ready(function($){

    /* Media uploader function */

    var mediaUploader;

    $( '#upload-button' ).on('click', function(e){
        e.preventDefault();
        if(mediaUploader){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Profile Picture', 
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');
        });

        mediaUploader.open();

    });

    /* Contact form submission */

    $('#yogaflexForm').on('submit', function(e){

        e.preventDefault();

        var form = $(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            subject = form.find('#subject').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');
            
            if( name === '' || subject === '' || email === '' || message === ''){
                console.log('Required inputs are empty');
                return;
            }

        $.ajax({

            url : ajaxurl,
            type : 'post',
            data : {

            name : name,
            email : email,
            subject : subject,
            message : message,
            action : 'yogaflex_save_user_contact_form'

        },

        error : function( response ){
            console.log( 'Error' );
        },

        success : function( response ){
            if( response == 0 ){
                console.log('Unable to save your message, Please try again later')
            }
            else{
                console.log('Message saved')
            }
        }

        });
    });

});