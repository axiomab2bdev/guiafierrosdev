<div style="margin: 0 10% 0 10%">
    <table align="center" border="0" width="100%">
        <tr bgcolor="#cccccc">
            <th colspan="2">Query Debug Console (<?php echo $query_count; ?> queries)</th>
        </tr>
        <tr bgcolor="#cccccc">
            <td colspan="2">
                <b>Load Time:</b> <?php echo $page_load_time; ?>
            </td>
        </tr>
        <tr bgcolor="#cccccc">
            <td colspan="2">
                <b>Current Template:</b> <?php echo $this->escape($current_template); ?>
            </td>
        </tr>
        <tr bgcolor="#cccccc">
            <td colspan="2">
                <b>Language:</b> <?php echo $this->escape($current_language); ?>
            </td>
        </tr>
        <tr bgcolor="#cccccc">
            <td colspan="2">
                <b>Included page queries (load time in seconds):</b>
            </td>
        </tr>
        <?php foreach($query_list as $key=>$value) { ?>
            <tr bgcolor="<?php if($key % 2) { ?>#eeeeee<?php } else { ?>#fafafa<?php } ?>">
                <td width="75%">
                    <?php echo $value['query']; ?>
                </td>
                <td width="25%">
                    <font color="red"><b><i><?php echo $value['time']; ?> seconds</i></b></font>
                </td>
            </tr>
        <?php } ?>
        <tr bgcolor="#cccccc">
            <th colspan="2">Session Variables</th>
        </tr>
        <?php foreach($_SESSION as $key=>$value) { ?>
        <tr>
            <td><?php echo $key; ?>:
                <?php if(is_array($value)) { ?>
                <br>
                    <?php foreach($value as $key2=>$value2) { ?>
                        <?php echo $key2; ?> => <?php echo $this->escape($value2); ?><br>
                    <?php } ?>
                <?php } else { ?>
                    <?php echo $this->escape($value); ?>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <tr bgcolor="#cccccc">
            <th colspan="2">POST Variables</th>
        </tr>
        <?php foreach($_POST as $key=>$value) { ?>
        <tr>
            <td><?php echo $key; ?>:
                <?php if(is_array($value)) { ?>
                    <br>
                    <?php foreach($value as $key2=>$value2) { ?>
                        <?php echo $key2; ?> => <?php echo $this->escape($value2); ?><br>
                    <?php } ?>
                <?php } else { ?>
                    <?php echo $this->escape($value); ?>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        <tr bgcolor="#cccccc">
            <th colspan="2">COOKIE Variables</th>
        </tr>
        <?php foreach($_COOKIE as $key=>$value) { ?>
        <tr>
            <td><?php echo $key; ?>:
                <?php if(is_array($value)) { ?>
                    <br>
                    <?php foreach($value as $key2=>$value2) { ?>
                        <?php echo $key2; ?> => <?php echo $this->escape($value2); ?><br>
                    <?php } ?>
                <?php } else { ?>
                    <?php echo $this->escape($value); ?>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>