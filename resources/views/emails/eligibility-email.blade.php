<?php
    $header_cid = $message->embed(public_path('/img/header-image.svg'));
    $cover_cid = $cover_image ? $message->embed(public_path($cover_image)) : null;
    $pre_footer_cid_1 = $message->embed(public_path('/img/pre-footer-image-1.png'));
    $pre_footer_cid_2 = $message->embed(public_path('/img/pre-footer-image-2.png'));
    $footer_cid = $message->embed(public_path('/img/footer-image.png'));
?>
<x-mail::message
:header_cid="$header_cid"
:cover_cid="$cover_cid"
:cover_text="$cover_text"
:pre_footer_cid_1="$pre_footer_cid_1"
:pre_footer_cid_2="$pre_footer_cid_2"
:footer_cid="$footer_cid"
>
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