@props(['cover_image', 'preview'])
<tr class="header-top">
    <td></td>
</tr>
<tr class="header-bottom">
    <td>
        <a href="https://householdcapital.com.au/">
            <img src="{{ $preview ? asset('/img/refer-email/header.png') : 'cid:header.png' }}" width="600" alt="company logo" />
        </a>
    </td>
</tr>
@isset($cover_image)
<tr>
    <td class="cover">
        <table cellpadding="0" cellspacing="0">
            <tr>
               <td class="cover-image">
                   <img src="{{ $preview ? asset($cover_image) : 'cid:cover' }}" width="600" alt="cover image"/>
               </td>
            </tr>
        </table>
    </td>
</tr>
@endif