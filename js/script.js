jQuery(document).ready(function(){


$('.launch-modal').on('click' , function(e){
    e.preventDefault();
    $('#' + $(this).data('modal-id')).modal();

    });
});

// this is for displaying all registered members in database
