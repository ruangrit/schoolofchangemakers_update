<tr class="even">
	<td class="views-field views-field-title"><?php print $fields['title']->content; ?></td>
	<td class="views-field views-field-title"><?php print $fields['field_project_image']->content; ?></td>
	<td class="views-field views-field-title"><?php print $fields['body']->content; ?></td>
	<td class="views-field views-field-title"><?php print $fields['field_project_date']->content; ?></td>
	<td class="views-field views-field-title"><a href="/node/<?php print strip_tags($fields['nid']->content); ?>/edit"><button class="btn">แก้ไข</button></a> </td>
</tr>
