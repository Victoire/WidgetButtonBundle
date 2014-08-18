//Init buttons and dependings fields
$vic(document).ready(function(){
    trackButtonTypeChange($vic('#victoire_widget_form_button_linkType'));
});

function trackButtonTypeChange(select) {
    var form = $vic(select).parents('form:first');

    if ($vic(select).val() == 'url') {
        $vic('.url-type', form).parents('div.vic-form-group').removeClass('vic-hidden');
        $vic('.page-type', form).parents('div.vic-form-group').addClass('vic-hidden');
        $vic('.route-type', form).parents('div.vic-form-group').addClass('vic-hidden');
    } else if ($vic(select).val() == 'page') {
        $vic('.page-type', form).parents('div.vic-form-group').removeClass('vic-hidden');
        $vic('.url-type', form).parents('div.vic-form-group').addClass('vic-hidden');
        $vic('.route-type', form).parents('div.vic-form-group').addClass('vic-hidden');
    } else if ($vic(select).val() == 'route') {
        $vic('.page-type', form).parents('div.vic-form-group').addClass('vic-hidden');
        $vic('.url-type', form).parents('div.vic-form-group').addClass('vic-hidden');
        $vic('.route-type', form).parents('div.vic-form-group').removeClass('vic-hidden');
    }
}
