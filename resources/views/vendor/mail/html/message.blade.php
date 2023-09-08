@props(['mail_uuid', 'cover_image', 'receiver_type', 'receiver_uuid', 'preview'])
<x-mail::layout :mail_uuid="$mail_uuid" :receiver_type="$receiver_type" :receiver_uuid="$receiver_uuid">
{{-- Header --}}
<x-slot:header>
<x-mail::header :cover_image="$cover_image" :preview="$preview">
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
<x-mail::footer :preview="$preview">
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>