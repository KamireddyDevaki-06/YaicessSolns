<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Tech Innovation 2025</title>
    <link rel="stylesheet" href="hari.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="payment-section">
        <div class="container">
            <h1 class="section-title">Payment Details</h1>
            <p class="section-subtitle">Choose your preferred payment method.</p>

            <div class="payment-options">
                <div class="payment-card" onclick="openPaymentModal('card')">
                    <i class="fas fa-credit-card"></i>
                    <h3>Credit/Debit Card</h3>
                    <p>Visa, MasterCard, American Express</p>
                </div>
                <div class="payment-card" onclick="openPaymentModal('upi')">
                    <i class="fas fa-qrcode"></i>
                    <h3>UPI / QR Code</h3>
                    <p>Paytm, Google Pay, PhonePe, Bhim</p>
                </div>
                <div class="payment-card" onclick="openPaymentModal('netbanking')">
                    <i class="fas fa-university"></i>
                    <h3>Net Banking</h3>
                    <p>All major Indian banks supported</p>
                </div>
                <div class="payment-card" onclick="openPaymentModal('wallet')">
                    <i class="fas fa-wallet"></i>
                    <h3>Digital Wallets</h3>
                    <p>Freecharge, MobiKwik, OlaMoney</p>
                </div>
            </div>

            <div id="payment-modal-card" class="payment-modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closePaymentModal()">×</span>
                    <h2>Credit/Debit Card Payment</h2>
                    <form id="cardPaymentForm" onsubmit="event.preventDefault(); submitPaymentForm('card');">
                        <div class="form-group">
                            <label for="cardName">Name:</label>
                            <input type="text" id="cardName" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="cardEmail">Email:</label>
                            <input type="email" id="cardEmail" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Card Number:</label>
                            <input type="text" id="cardNumber" placeholder="xxxx xxxx xxxx xxxx" required>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date:</label>
                            <input type="text" id="expiryDate" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" placeholder="123" required>
                        </div>
                        <button type="submit" class="modal-submit-btn">Pay with Card</button>
                    </form>
                </div>
            </div>

            <div id="payment-modal-upi" class="payment-modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closePaymentModal()">×</span>
                    <h2>UPI / QR Code Payment</h2>
                    <form onsubmit="event.preventDefault(); submitPaymentForm('upi');">
                        <div class="form-group">
                            <label for="upiId">UPI ID:</label>
                            <input type="text" id="upiId" placeholder="yourname@bankupi" required>
                        </div>
                        <p class="qr-code-placeholder">Or Scan QR Code (Simulated)</p>
                        <button type="submit" class="modal-submit-btn">Pay with UPI</button>
                    </form>
                </div>
            </div>

            <div id="payment-modal-netbanking" class="payment-modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closePaymentModal()">×</span>
                    <h2>Net Banking Payment</h2>
                    <form onsubmit="event.preventDefault(); submitPaymentForm('netbanking');">
                        <div class="form-group">
                            <label for="bankSelect">Select Bank:</label>
                            <select id="bankSelect" required>
                                <option value="">-- Select your Bank --</option>
                                <option value="sbi">State Bank of India</option>
                                <option value="icici">ICICI Bank</option>
                                <option value="hdfc">HDFC Bank</option>
                                <option value="axis">Axis Bank</option>
                            </select>
                        </div>
                        <button type="submit" class="modal-submit-btn">Proceed to Bank</button>
                    </form>
                </div>
            </div>

            <div id="payment-modal-wallet" class="payment-modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closePaymentModal()">×</span>
                    <h2>Digital Wallet Payment</h2>
                    <form onsubmit="event.preventDefault(); submitPaymentForm('wallet');">
                        <div class="form-group">
                            <label for="walletSelect">Select Wallet:</label>
                            <select id="walletSelect" required>
                                <option value="">-- Select your Wallet --</option>
                                <option value="paytm">Paytm</option>
                                <option value="gpay">Google Pay</option>
                                <option value="phonepe">PhonePe</option>
                            </select>
                        </div>
                        <button type="submit" class="modal-submit-btn">Pay with Wallet</button>
                    </form>
                </div>
            </div>

            <div id="payment-status" class="payment-status" style="display: none;">
                <i class="fas fa-check-circle success-icon"></i>
                <h2>Payment Completed Successfully!</h2>
                <p>Thank you for registering for Tech Innovation 2025.</p>
                <p>A confirmation email has been sent to your registered email ID.</p>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        function openPaymentModal(type) {
            // Hide the main payment options and subtitle
            document.querySelector('.payment-options').style.display = 'none';
            document.querySelector('.section-subtitle').style.display = 'none';
            document.querySelector('.section-title').innerText = 'Complete Your Payment'; // Change main title

            // Show the specific modal
            document.getElementById('payment-modal-' + type).style.display = 'flex';
        }

        function closePaymentModal() {
            // Hide all modals
            document.querySelectorAll('.payment-modal').forEach(modal => {
                modal.style.display = 'none';
            });
            // Restore main payment options and subtitle (if not completed)
            document.querySelector('.payment-options').style.display = 'grid';
            document.querySelector('.section-subtitle').style.display = 'block';
            document.querySelector('.section-title').innerText = 'Payment Details'; // Reset main title
        }

        function submitPaymentForm(type) {
            // Simulate form submission and validation (very basic)
            let formIsValid = true;
            let name = '', email = '';
            if (type === 'card') {
                name = document.getElementById('cardName').value.trim();
                email = document.getElementById('cardEmail').value.trim();
                let inputs = document.querySelectorAll(`#payment-modal-card input`);
                inputs.forEach(input => {
                    if (input.hasAttribute('required') && input.value.trim() === '') {
                        formIsValid = false;
                        input.style.borderColor = 'red'; // Simple visual cue for missing field
                    } else {
                        input.style.borderColor = ''; // Reset border color
                    }
                });
            }
            // ...add similar logic for other payment types if needed...
            if (!formIsValid) {
                alert('Please fill in all required fields.');
                return;
            }
            // AJAX to process_payment.php
            fetch('process_payment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&method=${type}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closePaymentModal();
                    document.getElementById('payment-status').style.display = 'block';
                    document.querySelector('.section-title').innerText = 'Registration Confirmed!';
                } else {
                    alert('Payment error: ' + data.message);
                }
            })
            .catch(() => {
                alert('Payment error: Could not connect to server.');
            });
        }
    </script>
</body>
</html>