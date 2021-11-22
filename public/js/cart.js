$(document).ready(function () {
    $('#number_item').change(function () {
        var number = $('#number_item').val();
        var item_id = $('#id_item').val();
        $.post(
            '../CartController/update_item',
            { id: item_id, input: number },
            function (data) {
                location.reload(data);
            }
        );
    });

    $('.checkout-cta').click(function () {
        $.post('../CartController/insert_to_order', {}, function (data) {
            if (data) {
                var id = $('#_id_order').val();
                var total = $('#_final_total').val();
                window.location = `http://localhost/web211/vnpay_php/?id=${id}&total=${total}`;
                return;
            } else {
                window.location =
                    'http://localhost/web211/CartController/index';
                return;
            }
        });
    });
});
