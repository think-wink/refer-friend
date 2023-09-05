@props(['header_cid', 'cover_cid','cover_text', 'pre_footer_cid_1', 'pre_footer_cid_2', 'footer_cid'])
<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :header_cid="$header_cid" :cover_cid="$cover_cid" :cover_text="$cover_text">
</x-mail::header>
</x-slot:header>
{{-- Body --}}
{!! $slot !!}
{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset
{{-- Footer --}}
<x-slot:footer>
<x-mail::footer :pre_footer_cid_1="$pre_footer_cid_1" :pre_footer_cid_2="$pre_footer_cid_2" :footer_cid="$footer_cid">
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>