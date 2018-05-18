<?php
/**
 * @file
 * Template to display a view as a table.
 *
 * Available variables:
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 *
 * @ingroup templates
 */
?>
<?php if ($responsive): ?>
<div class="table">
<?php endif; ?>
<table <?php if ($classes) { print 'class="'. $classes . '" '; } ?><?php print $attributes; ?>>
   <?php if (!empty($title) || !empty($caption)) : ?>
     <caption><?php print $caption . $title; ?></caption>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?>>
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
    <?php
     foreach ($rows as $row_count => $row): ?>
      <tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) .'"';  } ?>>
        <?php foreach ($row as $field => $content): ?>

          <td <?php if ($field_classes[$field][$row_count]) { print 'class="'. $field_classes[$field][$row_count] . '" '; } ?><?php print drupal_attributes($field_attributes[$field][$row_count]); ?>>
         
          <?php if($field=="field_campaign_date"){
              $date_campaign = strip_tags($content);

              // print "<pre>";
              // print_r($date_campaign);
              // print "</pre>";
              // if(!empty($date_campaign)){
                $split_date = explode('to', $date_campaign);
              //}
             
              if(!empty($split_date[1])){                 
                  $date_ca = changemakers_get_date_start_date_campaign_list($date_campaign);
                  print $date_ca[0]."- ".$date_ca[1]; 
              }else{
                $d = date('d',strtotime($split_date[0]));
                $m = intval(date('m',strtotime($split_date[0])));
                $y = date('Y',strtotime($split_date[0]))+543;
                $month = array('','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');
                print $d." ".$month[$m]." ".$y;

              }

            ?>
          <?php }else{?>
            <?php print $content; ?>
          <?php }?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if ($responsive): ?>
  </div>
<?php endif; ?>
