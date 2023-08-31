<x-mail::message :cover_image_text="$cover_image_text" :cover_image="$cover_image">
@isset($greeting_text)
{!! $greeting_text !!}
@endif
@isset($upper_text)
{!! $upper_text !!}
@endif
<x-mail::button :url="$button_url" color="success">
{!! $button_text !!}
</x-mail::button>
@isset($lower_text)
<tr>
<td class="body">
{!! $lower_text !!}
</td>
</tr>
@endif
</x-mail::message>