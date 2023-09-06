@props(['cover_image'])
<tr class="header-top">
    <td></td>
</tr>
<tr class="header-bottom">
    <td>
        <img src="cid:header.png" alt="company logo" />
    </td>
</tr>
@isset($cover_image)
<tr>
    <td class="cover">
        <table>
            <tr>
               <td class="cover-image">
                   <img src="cid:cover" alt="cover image"/>
               </td>
            </tr>
        </table>
    </td>
</tr>
@endif