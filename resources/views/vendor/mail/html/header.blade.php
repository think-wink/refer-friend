@props(['cover_image'])
<tr class="header-top">
    <td></td>
</tr>
<tr class="header-bottom">
    <td>
        <a href="https://householdcapital.com.au/">
            <img src="cid:header.png" onerror="this.onerror=null; this.src='{{ asset('/img/refer-email/header.png') }}'" width="600" alt="company logo" />
        </a>
    </td>
</tr>
@isset($cover_image)
<tr>
    <td class="cover">
        <table cellpadding="0" cellspacing="0">
            <tr>
               <td class="cover-image">
                   <img src="cid:cover" onerror="this.onerror=null; this.src='{{ asset($cover_image) }}'" width="600" alt="cover image"/>
               </td>
            </tr>
        </table>
    </td>
</tr>
@endif