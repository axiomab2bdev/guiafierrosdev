<?php
/* @var $this ContactController */
/* @var $data Contact */
?>
<?php
/* @var $this LeadController */
/* @var $data Lead */
header ('Content-type: text/html; charset=utf-8');
?>
<tr>
    <td><?php echo $data->lead->name; ?></td>
    <td><?php echo $data->lead->mail; ?></td>
    <td><?php echo $data->lead->phone; ?></td>
</tr>
