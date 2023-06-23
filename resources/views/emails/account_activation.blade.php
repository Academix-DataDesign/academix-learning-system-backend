<!DOCTYPE html>
<html>
<head>
    <title>Account Activation</title>
</head>
<body>
    <p>Hello <strong>{{ $user->name }}</strong>,</p>

    <p>Thank you for registering. Please click the following link to activate your account:</p>

    <p><a href="{{ route('activate', ['token' => $user->confirmation_token]) }}">Activate Account</a></p>

    <p>If you didn't register on our site, you can ignore this email.</p>
</body>
</html>
