<!-- payment.stripe.blade.php -->
<form id="stripe-payment-form">
    <div id="card-element"></div>
    <button id="pay-now-button">Pay Now</button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51NM27YD5ToURDKeD5ldHCq3IFuZXEzZJHD58mU8gv2KIEb5ZoATo00waQruRA13Ue2W6cA9ezSqf94Yazm0xyd8E00WJx54ScY');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('stripe-payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.confirmCardPayment('{{ $clientSecret }}', {
            payment_method: {
                card: cardElement,
            }
        }).then(function(result) {
            if (result.error) {
                // Xử lý lỗi thanh toán
            } else {
                // Đã thanh toán thành công, lưu thông tin đặt tour và chuyển hướng người dùng
                window.location.href = '{{ route("book-tour.index") }}';
            }
        });
    });
</script>
