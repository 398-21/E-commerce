jQuery(document).ready(function ($) {
    $('.refund-button').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const orderId = button.data('order-id');

        // Disable the button and show "Processing..." text
        button.prop('disabled', true).text('Processing...');

        // Send AJAX request
        $.ajax({
            url: myAccountRefund.ajax_url,
            method: 'POST',
            data: {
                action: 'send_refund_to_make',
                order_id: orderId,
            },
            success: function (response) {
                if (response.success) {
                    // Replace button with "Refund in Progress"
                    button.replaceWith('<span class="text-gray-500">Refund in Progress</span>');
                } else {
                    // Show error and re-enable the button
                    alert(response.data || 'An error occurred.');
                    button.prop('disabled', false).text('Request Refund');
                }
            },
            error: function () {
                // Show error and re-enable the button
                alert('Failed to process refund.');
                button.prop('disabled', false).text('Request Refund');
            },
        });
    });
});
