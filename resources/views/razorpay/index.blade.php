<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: #442545;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-card {
            width: 100%;
            max-width: 480px;
            border-radius: 16px;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .heading {
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .btn-pay {
            background: linear-gradient(45deg, #3b82f6, #6366f1);
            border: none;
            padding: 12px;
            font-size: 17px;
            border-radius: 10px;
            width: 100%;
            color: #fff;
            transition: 0.3s;
        }

        .btn-pay:hover {
            background: linear-gradient(45deg, #2563eb, #4f46e5);
        }

        .label {
            font-weight: 600;
        }
    </style>

</head>

<body>

    <div class="payment-card">

        <h2 class="heading">💳 Razorpay Payment</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('payment'))
            <div class="alert alert-info">
                <strong>Payment Successful!</strong><br>
                Payment ID: {{ session('payment')->razorpay_payment_id }} <br>
                Amount: ₹{{ session('payment')->amount }}
            </div>
        @endif

        <form action="{{ route('razorpay.payment') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label label">Full Name</label>
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label class="form-label label">Email Address</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="example@gmail.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label label">Phone Number</label>
                <input type="text" name="phone" class="form-control form-control-lg" placeholder="10-digit mobile number" required>
            </div>

            <div class="mb-3">
                <label class="form-label label">Amount (INR)</label>
                <input type="number" name="amount" class="form-control form-control-lg" placeholder="Enter amount" required>
            </div>

            <button type="submit" class="btn btn-pay">Proceed to Pay</button>

        </form>

    </div>

</body>

</html>
