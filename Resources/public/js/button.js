//Init buttons and dependings fields
$vic(document).ready(function(){
    trackButtonTypeChange($vic('#victoire_widget_form_button_linkType'));
});

function trackButtonTypeChange(elem) {
    var form = $vic('#' + $vic(elem).attr('id')).parents('form');

    if ($vic(elem).val() == 'url') {
        $vic('.url-type', form).parents('div.form-group').removeClass('vic-hidden');
        $vic('.page-type', form).parents('div.form-group').addClass('vic-hidden');
        $vic('.route-type', form).parents('div.form-group').addClass('vic-hidden');
    } else if ($vic(elem).val() == 'page') {
        $vic('.page-type', form).parents('div.form-group').removeClass('vic-hidden');
        $vic('.url-type', form).parents('div.form-group').addClass('vic-hidden');
        $vic('.route-type', form).parents('div.form-group').addClass('vic-hidden');
    } else if ($vic(elem).val() == 'route') {
        $vic('.page-type', form).parents('div.form-group').addClass('vic-hidden');
        $vic('.url-type', form).parents('div.form-group').addClass('vic-hidden');
        $vic('.route-type', form).parents('div.form-group').removeClass('vic-hidden');
    }
}
