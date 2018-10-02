<html>
<body>

<div id="paypal-button-container"></div>
<form method="POST" action="/status/{{Auth::user()->userID}}">
    {{ csrf_field() }}
    <button type="submit" class="positive" name="save" id="save" hidden="hidden">save</button>
    <input type="text" id="amount" name="amount" hidden="hidden" /><br>
    <input type="text" id="first_name"  name="first_name"hidden="hidden" />
    <input type="text" id="last_name" name="last_name" hidden="hidden" />
    <input type="text" id="email" name="email" hidden="hidden" />
    <input type="text" id="payer_id"  name="payer_id" hidden="hidden" />
    <input type="text" id="phone"  name="phone" hidden="hidden" />
</form>

<script src="<?php echo asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') ?>" type="text/javascript"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
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

@if( Auth::user()->typeID== '3')
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '169', currency: 'PHP' }
                        }
                    ]
                }
            });
        },
@else
payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '250', currency: 'PHP' }
                        }
                    ]
                }
            });
        },

@endif

        onAuthorize: function(data, actions) {
            return actions.payment.get().then(function(data) {
                var data1 = data.payer.payer_info;
                var data2 = data.transactions[0].amount;

                return actions.payment.execute().then(function() {

                $("#amount").val(data2.total);
                $("#first_name").val(data1.first_name);
                $("#last_name").val( data1.last_name);
                $("#email").val(data1.email);
                $("#payer_id").val(data1.payer_id);
                $("#phone").val(data1.phone);
                alert(data1.phone);
                $('#save').trigger("click");
                });

            });
        } //how to put a backend here

    }, '#paypal-button-container');

</script>

</body>
</html>
