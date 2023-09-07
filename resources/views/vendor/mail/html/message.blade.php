@props(['cover_image', 'referred_uuid'])
<x-mail::layout :referred_uuid="$referred_uuid">
{{-- Header --}}
<x-slot:header>
<x-mail::header :cover_image="$cover_image">
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
<x-mail::footer>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>