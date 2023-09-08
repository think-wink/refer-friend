@props(['cover_image', 'preview'])
<tr class="header-top">
    <td></td>
</tr>
<tr class="header-bottom">
    <td>
        <a href="https://householdcapital.com.au/">
            <img src="{{ $preview ? asset('/img/refer-email/header.png') : 'cid:header.png' }}" alt="company logo" />
        </a>
    </td>
</tr>
@isset($cover_image)
<tr>
    <td class="cover">
        <table>
            <tr>
               <td class="cover-image">
                   <img src="{{ $preview ? asset($cover_image) : 'cid:cover' }}" alt="cover image"/>
               </td>
            </tr>
        </table>
    </td>
</tr>
@endif