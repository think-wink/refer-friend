@props(['mail_uuid', 'receiver_type', 'receiver_uuid'])
<!DOCTYPE>
<html>
    <head>
        <title>{{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">
        <style>
            @media only screen and (max-width: 600px) {

                 .table2 {
                    display: block !important;
                    margin-bottom: 1em !important;
                }

                .footer-image {
                    text-align: center !important;
                }

                .footer-top td {
                    display: block !important;
                    text-align: center !important;
                }

                .footer-icons {
                    text-align: center !important;
                }

                .footer-mid td {
                    display: block !important;
                    text-align: center !important;
                    padding-top: 1em !important;
                }

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
                    Having trouble viewing this email? <a href="{{ config('app.url') }}/mail-preview/{{ $mail_uuid }}"> View Online </a>
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
                    <p><a href="{{ config('app.url') }}/unsubscribe/{{ $receiver_type }}/{{ $receiver_uuid }}">unsubscribe</a></p>
                </td>
            </tr>
        </table>
    </body>
</html>