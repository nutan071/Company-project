
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thank You for Your Purchase</div>
                    <div class="card-body">
                        <p>Your order has been successfully placed.</p>
                        <p>Payment Method: {{ $method }}</p>
                        <p >Total Amount: ${{$totalPrice}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    
    function handleFormSubmission(form, url) {
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(), 
            success: function(response) {
               
                $('#payment-method').text(response.method);
                $('#total-amount').text(response.totalPrice);
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }




    $('form#pay-on-delivery').on('submit', function(e) {
        e.preventDefault(); 
        handleFormSubmission($(this), $(this).attr('action'));
    });

 
    $('form#cash-on-delivery').on('submit', function(e) {
        e.preventDefault(); 
        handleFormSubmission($(this), $(this).attr('action'));
    });
});
</script>
@endsection
