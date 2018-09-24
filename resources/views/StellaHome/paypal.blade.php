
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div id="paypal-button-container"></div>

<script>

    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            layout: 'vertical',  // horizontal | vertical
            size:   'large',    // medium | large | responsive
            shape:  'rect',      // pill | rect
            color:  'gold'       // gold | blue | silver | black
        },

        // Specify allowed and disallowed funding sources
        //
        // Options:
        // - paypal.FUNDING.CARD
        // - paypal.FUNDING.CREDIT
        // - paypal.FUNDING.ELV

        funding: {
            allowed: [ paypal.FUNDING.CARD, paypal.FUNDING.CREDIT ],
            disallowed: [ ]
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'ARBbJgoZr3GbjwrE4cttzQIFlDAAcn8HJdBWf9B5D3R8c4jm5a06MDXERRhO_9VPRgr-ML8KW6f3Bgur', //CHANGE TO SANDBOX CLIENTID
            production: 'Af1oYB1c0b3wL5b0Dcakc9gXSiCO3q89bGb4KaaYaOoL-H6II0qoP4CJRib55sLx04ZpSJo_PIYajKqK' //CHANGE TO LIVE CLIENTID
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
            });
        }

    }, '#paypal-button-container');

</script>
