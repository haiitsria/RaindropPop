<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    // Render the PayPal button
    paypal.Button.render({
// Set your environment
        env: 'sandbox', // sandbox | production

// Specify the style of the button
        style: {
            layout: 'vertical',  // horizontal | vertical
            size:   'responsive',    // medium | large | responsive
            shape:  'rect',      // pill | rect
            color:  'gold'       // gold | blue | silver | white | black
        },

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
        funding: {
            allowed: [
                paypal.FUNDING.CARD,
                paypal.FUNDING.CREDIT
            ],
            disallowed: []
        },

// Enable Pay Now checkout flow (optional)
        commit: true,

// PayPal Client IDs - replace with your own
// Create a PayPal app: https://developer.paypal.com/developer/applications/create
        client: {
            sandbox: 'AZCoPHNDBGabweMKTGKsngpWRDj5bbXErG_iMv_9lSq4ONJtxVsSO5jkcqjaOi2-TkkGY8-v2b2Az40Q',
            production: '<insert production client id>'
        },

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: {
                                total: <?php echo $total;?>,
                                currency: 'USD'
                            }
                        }
                    ]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute()
                .then(function () {
                    window.alert('Payment Complete!');
                });
        }
    }, '#paypal-button-container');
</script>


<?php
?>