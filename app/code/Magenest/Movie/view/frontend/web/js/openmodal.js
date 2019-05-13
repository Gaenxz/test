require([
    'jquery',
    'jquery/ui',
    'Magento_Ui/js/modal/alert',
    'Magento_Ui/js/modal/modal'
],function ($,ui,alert,modal) {
    "use strict";
    $("input[name='open_modal']").on('click', function () {
        alert({
            title:'zxc',
            content:'asdsad',
        })
    });

    var options = {
        type: 'popup',
        responsive: true,
        innerScroll: true,
        title: 'Login Modal',
        buttons:[{
            text: $.mage.__('Close'),
            class: '',
            click: function(){
                this.closeModal();
            }
        }]
    };

    var popup = modal(options,$('#popup-form'));

    $("input[name='open_custom_login_modal']").on('click',function () {
       $("#popup-form").modal("openModal");
    });
});
// Alert



