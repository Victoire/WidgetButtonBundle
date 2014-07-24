$(document).ready(function(){
    $('#victoire_widget_form_button_link').parent().addClass('vic-hidden');
});

$(document).on('change', '#victoire_widget_form_button_linkType', function() {
    if($('#victoire_widget_form_button_linkType').val() == 'page') {
        $('#victoire_widget_form_button_page').parent().removeClass('vic-hidden');
        $('#victoire_widget_form_button_link').parent().addClass('vic-hidden');
    } else {
        $('#victoire_widget_form_button_page').parent().addClass('vic-hidden');
        $('#victoire_widget_form_button_link').parent().removeClass('vic-hidden');
    }
});