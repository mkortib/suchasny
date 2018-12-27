(function ($) {
    $(document).ready(function () {

        $(document).on('click', '.cbr__table input:checkbox', function () {
            var status = $(this).attr('checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: '/wp-admin/admin-ajax.php',
                data: {
                    action: 'change_status',
                    status: status,
                    id: id
                }
            });
        });

    });
})(jQuery);