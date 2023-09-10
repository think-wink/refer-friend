<x-mail::message :mail_uuid="$mail_uuid" :cover_image="$cover_image" :receiver_type="$receiver_type" :receiver_uuid="$receiver_uuid" :preview="$preview">
@isset($greeting_text)
{!! $greeting_text !!}
@endif
@isset($upper_text)
{!! $upper_text !!}
@endif
@isset($button_url)
<x-mail::button :url="$button_url" color="success">
{!! $button_text ? $button_text : 'Open Link' !!}
</x-mail::button>
@endif
@isset($lower_text)
<tr>
<td class="body">
{!! $lower_text !!}
</td>
</tr>
@endif
</x-mail::message>