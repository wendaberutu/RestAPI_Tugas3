<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <h1>Verify OTP</h1>
    <form action="{{ route('auth.verifyOtp') }}" method="POST">
        @csrf
        <label>Enter OTP:</label>
        <input type="text" name="otp" required>
        <br>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
