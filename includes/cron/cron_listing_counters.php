<?php
if(!IN_PMD) exit('File '.__FILE__.' can not be accessed directly.');

function cron_listing_counters($j) {
    global $PMDR, $db;

    $cron_data = array('status'=>false);

    if($PMDR->getConfig('show_indexes') OR $PMDR->getConfig('cat_empty_hidden')) {
        $db->Execute("UPDATE ".T_CATEGORIES." SET count=0, count_total=0");

        $db->Execute("UPDATE ".T_CATEGORIES." c,
        (SELECT cat.id AS id, COUNT(lc.list_id) AS count
        FROM ".T_CATEGORIES." AS cat, ".T_LISTINGS_CATEGORIES." AS lc, ".T_LISTINGS." AS l
        WHERE cat.id = lc.cat_id AND lc.list_id=l.id AND l.status='active' GROUP BY cat.id) cd
        SET c.count=cd.count WHERE c.id=cd.id");

        $db->Execute("UPDATE ".T_CATEGORIES." c,
        (SELECT parent.id AS id, SUM(node.count) as count
        FROM ".T_CATEGORIES." AS parent, ".T_CATEGORIES." AS node
        WHERE node.left_ BETWEEN parent.left_ AND parent.right_
        GROUP BY parent.id) cd
        SET c.count_total = cd.count WHERE c.id=cd.id");

        $cron_data['data']['listing_counts'] = 1;
        $cron_data['status'] = true;
    }

    if($PMDR->getConfig('loc_show_indexes') OR $PMDR->getConfig('loc_empty_hidden')) {
        $db->Execute("UPDATE ".T_LOCATIONS." SET count=0, count_total=0");

        $db->Execute("UPDATE ".T_LOCATIONS." lc,
        (SELECT loc.id AS id, COUNT(l.id) AS count
        FROM ".T_LOCATIONS." AS loc, ".T_LISTINGS." AS l
        WHERE loc.id=l.location_id AND l.status='active' GROUP BY loc.id) ld
        SET lc.count=ld.count WHERE lc.id=ld.id");

        $db->Execute("UPDATE ".T_LOCATIONS." l,
        (SELECT parent.id AS id, SUM(node.count) as count
        FROM ".T_LOCATIONS." AS parent, ".T_LOCATIONS." AS node
        WHERE node.left_ BETWEEN parent.left_ AND parent.right_
        GROUP BY parent.id) ld
        SET l.count_total = ld.count WHERE l.id=ld.id");

        $cron_data['data']['listing_counts'] = 1;
        $cron_data['status'] = true;
    }

    return $cron_data;
}
$cron['cron_listing_counters'] = array('day'=>-1,'hour'=>-1,'minute'=>0,'run_order'=>4);
?>