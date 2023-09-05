@props(['header_cid', 'cover_cid', 'cover_text'])
<tr class="header-top">
    <td></td>
</tr>
<tr class="header-bottom">
    <td>
        <img src="{{ $header_cid }}" alt="company logo" />
    </td>
</tr>
@isset($cover_cid)
<tr>
    <td class="cover">
        <table>
            <tr>
               <td class="cover-image">
                   <img src="{{ $cover_cid }}" alt="cover image"/>
               </td>
            </tr>
            @isset($cover_text)
                <tr class="cover-text">
                    <td>
                        {!! html_entity_decode(html_entity_decode($cover_text)) !!}
                    </td>
                </tr>
            @endif
        </table>
    </td>
</tr>
@endif