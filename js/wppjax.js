jQuery(function() {
    jQuery(document).on('click', 'a[data-pjax]', function(event) {
        var container = jQuery(this).data('pjax')
        jQuery.pjax.click(event, {container: container})
    })
})