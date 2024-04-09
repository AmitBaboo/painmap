@extends('setup')

@section('content')

<!-- Content Header (Page header) -->
<style>
    .StripeElement {
        background-color: white;
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">

            <div class="card card-outline card-primary mt-3">
                <form action="{{ route('subscription.create') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-group">
                        <div class="card-header">
                            <h4 class="font-weight-light" for="card-element">
                                Enter your credit card information
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label for="card-holder-name">Name on Card</label>
                                <input class="form-control" id="card-holder-name" type="text" placeholder="Name on Card" required>
                            </div>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <input type="hidden" name="plan" value="{{ $plan->id }}" />
                            <!-- <input type="hidden" name="intent" value="{{-- $intent --}}" /> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="card-button" class="btn btn-outline-primary shadow" type="submit" data-secret="{{ $intent->client_secret }}"> Pay ({{ number_format($plan->cost, 2) }}) </button>
                        <label id="card-errors" class="text-danger font-weight-light float-right mt-1" role="alert"></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: 'CeraPro,"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('{{ env("STRIPE_KEY") }}', {
        locale: 'en'
    }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', {
        style: style
    }); // Create an instance of the card Element.

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    const cardDiv = document.getElementById('card-element');
    const originalButtonLabel = cardButton.innerText;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    cardButton.addEventListener('click', async (event) => {
        event.preventDefault();

        // Disable the card button to prevent resubmission. Because the payment takes some time.
        cardButton.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Just a moment ...'
        cardButton.disabled = true;

        // Disable the card-element div
        cardDiv.disabled = true;

        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        );

        if (error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
            // Enable the form and button
            cardDiv.disabled = false;
            cardButton.disabled = false;
            // Change the button label to the original
            cardButton.innerText = originalButtonLabel;
        } else {
            // Send the token to your server.
            stripeTokenHandler(setupIntent.payment_method);
        }

        // stripe
        //     .handleCardSetup(clientSecret, cardElement, {
        //         payment_method_data: {
        //             billing_details: {
        //                 name: cardHolderName.value
        //             }
        //         }
        //     })
        //     .then(function(result) {
        //         console.log(result);
        //         if (result.error) {
        //             // Inform the user if there was an error.
        //             var errorElement = document.getElementById('card-errors');
        //             errorElement.textContent = result.error.message;
        //         } else {
        //             console.log(result);
        //             // Send the token to your server.
        //             stripeTokenHandler(result.setupIntent.payment_method);
        //         }
        //     });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(paymentMethod) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', paymentMethod);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
@endpush

@endsection