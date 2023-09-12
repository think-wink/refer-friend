@props([
    'url',
    'color' => 'primary',
    'align' => 'center',
])
<tr>
    <td class="textCenter">
        <table align="center" class="button" cellpadding="10">
            <tr>
                <td>
                    <a href="{{ $url }}" target="_blank" rel="noopener">{{ $slot }}</a>
                </td>
            </tr>
        </table>
    </td>
</tr>