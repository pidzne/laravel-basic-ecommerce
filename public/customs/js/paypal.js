{/* <div id="paypal-button-container"></div> */}
// <!-- Replace "test" with your own sandbox Business account app client ID -->
// <script src="https://www.paypal.com/sdk/js?client-id=ARjx8s8Z5MJi7fYWHCTES5L-AFERBhjHtvNBm1FJ_b2-D6GEnbKnG2NKP9Mz3vWT9WmDeaIOLPlrg26E"></script>
paypal
    .Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [
                    {
                        amount: {
                            value: "{{Cart::totalFloat()}}", // Can also reference a variable or function
                        },
                    },
                ],
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function (orderData) {
                // Successful capture! For dev/demo purposes:
                console.log(
                    "Capture result",
                    orderData,
                    JSON.stringify(orderData, null, 2)
                );
                const transaction =
                    orderData.purchase_units[0].payments.captures[0];
                //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                var order_name = $(".name").val();
                var order_phone = $(".phone").val();
                var order_email = $(".email").val();
                var order_address = $(".address").val();
                var order_city = $(".city").val();
                var order_district = $(".district").val();
                var order_ward = $(".ward").val();
                var order_message = $(".message").val();
                var ship_cost = $(".shipcost").val();

                $.ajax({
                    method: "POST",
                    url: "{{ url('/place-order') }}",
                    data: {
                        order_name: order_name,
                        order_phone: order_phone,
                        order_email: order_email,
                        order_address: order_address,
                        order_city: order_city,
                        order_district: order_district,
                        order_ward: order_ward,
                        order_message: order_message,
                        shipping_cost: ship_cost,
                        payment_method: 1,
                        order_id: orderData.id,
                        _token: "{!! csrf_token() !!}",
                    },
                    success: function (response) {
                        window.location.href = "{{ url('/success-order') }}";
                    },
                    error: function (data) {
                        alert("Err!, try again!");
                    },
                });

                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        },
    })
    .render("#paypal-button-container");
