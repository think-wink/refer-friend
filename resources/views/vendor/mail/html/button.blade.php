@props([
    'url',
    'color' => 'primary',
    'align' => 'center',
])

<tr>
    <td class="button">
        <a href="{{ $url }}" target="_blank" rel="noopener">{{ $slot }}</a>
    </td>
</tr>
