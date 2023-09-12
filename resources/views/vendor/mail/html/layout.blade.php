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
            @media only screen and (max-width: 650px) {
                .wrapper {
                    width: 100% !important;
                }

                .header-bottom img {
                    width: 100% !important;
                }

                /* Footer Styling */

                .footer, .tableBottomLeft, .tableBottomRight {
                    text-align: center !important;
                }

                .tableLeft {
                    width: 100%;
                    display: block;
                }

                .tableRight {
                    width: 100%;
                    display: block;
                }
            }
        </style>
    </head>
    <body>
        <table class="wrapper" width="600" cellpadding="0" cellspacing="0" role="presentation" align="center">
            <tr>
                <td class="textOutside">
                    Having trouble viewing this email? <a href="{{ config('app.url') }}/mail-preview/{{ $mail_uuid }}"> View Online </a>
                </td>
            </tr>
            <tr>
                <td>
                    {{ $header ?? '' }}
                </td>
            </tr>
            <tr>
                <td class="body" width="100%">
                    {{ $slot }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ $footer ?? '' }}
                </td>
            </tr>
            <tr>
                <td class="textOutside">
                    <p>You're receiving this email because you opted-in for emails when you used our online calculator.</p>
                    <p><a href="{{ config('app.url') }}/unsubscribe/{{ $receiver_type }}/{{ $receiver_uuid }}">unsubscribe</a></p>
                </td>
            </tr>
        </table>
    </body>
</html>