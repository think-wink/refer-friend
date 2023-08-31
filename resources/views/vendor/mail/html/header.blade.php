@props(['url', 'cover_image_text', 'cover_image'])
<tr class="header-top">
    <td></td>
</tr>
<tr class="header-bottom">
    <td>
        <img src="{{ config('app.url') }}/img/household.svg" alt="company logo" />
    </td>
</tr>
<tr>
    <td class="cover">
        <table>
            <tr>
               <td class="cover-image">
                   <img src="{{ $cover_image }}" alt="cover image"/>
               </td>
            </tr>
            <tr class="cover-text">
                <td>
                    {!! html_entity_decode(html_entity_decode($cover_image_text)) !!}
                </td>
            </tr>
        </table>
    </td>
</tr>
