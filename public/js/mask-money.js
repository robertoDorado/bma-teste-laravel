var $j = jQuery.noConflict();

$j(document).ready(function () {
    $j('#salario').maskMoney({
        prefix: 'R$ ',
        decimal: ',',
        thousands: '.'
    });
});