<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>
</head>
<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">

        <tr>
            <td class="top-text">
                Having trouble viewing this email? <a href="https://www.google.com"> View Online </a>
            </td>
        </tr>

        <tr>
            <td>
                {{ $header ?? '' }}
            </td>
        </tr>

        <tr>
            <td class="body">
                {{ $slot }}
            </td>
        </tr>

        <tr>
            <td>
                {{ $footer ?? '' }}
            </td>
        </tr>

        <tr>
            <td class="bottom-text">
                <p>You're receiving this email because you opted-in for emails when you used our online calculator.</p>
                <p>You can update <a href="https://www.google.com">update your preferences</a> or</p>
                <p><a href="https://www.google.com">unsubscribe</a></p>
            </td>
        </tr>

    </table>
</body>
</html>
