<div class="row-fluid">
    <div class="span10">
        <table class="table table-bordered">
            <tr>
                <td><strong><?php echo $lang['admin_license_information_name']; ?>:</strong></td>
                <td><?php echo $this->escape($license_information['registeredname']); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $lang['admin_license_information_key']; ?>:</strong></td>
                <td><?php echo $this->escape($license_information['license']); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $lang['admin_license_information_date']; ?>:</strong></td>
                <td><?php echo $this->escape($license_information['regdate']); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $lang['admin_license_information_downloads_expire']; ?>:</strong></td>
                <td><?php echo $this->escape($license_information['downloads_expire']); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $lang['admin_license_information_domains']; ?>:</strong></td>
                <td>
                    <?php foreach($license_information['validdomain'] AS $domain) { ?>
                        <?php echo $this->escape($domain); ?><br />
                    <?php } ?>
                </td>
            </tr>
            <?php if(!empty($license_information['addons'])) { ?>
            <tr>
                <td><strong><?php echo $lang['admin_license_information_addons']; ?>:</strong></td>
                <td>
                    <?php foreach($license_information['addons'] AS $addon) { ?>
                        <?php if($addon != 'Download Access') { ?>
                            <?php echo $this->escape($addon); ?><br />
                        <?php } ?>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>