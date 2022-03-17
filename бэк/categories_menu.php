<br><br>
<?
$global_tree = array();
$result = mysql_query("SELECT p.id, p.catname, g.side_group, g.side_sort, g.snap_combo, g.seo_name, g.url
FROM ".PRODCAT_TABLE." AS p
JOIN global_meta g ON g.side_group!=0 AND g.snap_category = p.id
ORDER BY g.side_group, g.side_sort");
echo mysql_error();
while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $global_tree[$row['side_group']][] = $row;   
}
?>
<div class="borderWhite" style="padding:0 10px 10px 10px;">
    <div class="blueTitle">Бассейны</div><?php
    foreach ($global_tree[1] as $key=>$nodes) {
        echo '<p><a href="'.($nodes['url']!=''?'/'.$nodes['url'].'/':'?s=categories&category='.$nodes['id']).'" class="bluecat">'.($nodes['seo_name']!=''?$nodes['seo_name']:$nodes['catname']).'</a></p>'; 
    }
    ?>
    <center><img alt="" src="images/basejn.png"></center>
</div>
<br>
<div class="borderWhite" style="padding:0 10px 10px 10px;">
    <div class="blueTitle">Надувная мебель</div><?php
    foreach ($global_tree[2] as $key=>$nodes) {
        echo '<p><a href="'.($nodes['url']!=''?'/'.$nodes['url'].'/':'?s=categories&category='.$nodes['id']).'" class="bluecat">'.($nodes['seo_name']!=''?$nodes['seo_name']:$nodes['catname']).'</a></p>'; 
    }
    ?>
    <center><img alt="" src="images/mebel.png"></center>
</div>
<br>
<div class="borderWhite" style="padding:0 10px 10px 10px;">
    <div class="blueTitle">Надувные лодки</div><?php
    foreach ($global_tree[3] as $key=>$nodes) {
        echo '<p><a href="'.($nodes['url']!=''?'/'.$nodes['url'].'/':'?s=categories&category='.$nodes['id']).'" class="bluecat">'.($nodes['seo_name']!=''?$nodes['seo_name']:$nodes['catname']).'</a></p>'; 
    }
    ?>
    <center><img alt="" src="images/lodka.png"></center>
</div>
<br>
<div class="borderWhite" style="padding:0 10px 10px 10px;">
    <div class="blueTitle">Обзоры</div><?php
    $query = "
    SELECT a.*, g.url as meta_url
    FROM articles a
    LEFT OUTER JOIN global_meta g ON g.snap_combo = CONCAT('?s=',a.url)
    WHERE cat_id ='-2' AND status =1 ORDER BY id ASC";
    $result = mysql_query($query);
    if($result) while ($row = mysql_fetch_array($result)) {
        if (!empty($row['meta_url'])) {
            echo '
            <p><a href="/'.$row['meta_url'].'/">'.$row['title'].'</a></p>';
		}
        else if (!empty($row['url'])) {
            echo '
            <p><a href="/?s='.$row['url'].'" class="bluecat">'.$row['title'].'</a></p>';
        }
        else {
            echo '
            <p><a href="/?s=view&id='.$row['id'].'" class="bluecat">'.$row['title'].'</a></p>';
        }
    }
    ?>
</div>
<br>
<?php
$query = "
SELECT a.*, g.url as meta_url
FROM articles a 
LEFT OUTER JOIN global_meta g ON g.snap_combo = CONCAT('?s=',a.url)
WHERE a.cat_id='".$category."'";
$result = mysql_query($query);
$articles = array();
if ($result)
while ($row = mysql_fetch_array($result)) {
    $articles[] = $row;
}  
if (!empty($articles)) {
?> 
    <div class="articles" style="padding:0 10px 10px 10px;"><?if ($category == 8 || $category == 6) {
    ?>
        <?php if ($category == 6) { ?>
            <div class="blueTitle">Выбираем надувные бассейны</div>
        <?php } if ($category == 8) { ?>
            <div class="blueTitle">Выбираем каркасные бассейны</div>
        <?php } ?>
    <?php
    }
    ?>          
            
            <?php foreach ($articles as $v) {
            ?>
            <div class="blueTitle"><?=$v['title']?></div>
            <div class="item"><?= $v['introtext'] ?>
                <?if (!empty($v['meta_url'])):?>
                <a href="<?=$v['meta_url']?>">Подробнее&gt;&gt;&gt;</a></div>
                <?else:?>
                <a href="?s=view&id=<?=$v['id'] ?><?=(!empty($v['category'])?'&category='.$v['category']:'')?>">Подробнее&gt;&gt;&gt;</a></div>
                <?endif;?>
            <?php
            }
            ?>
    </div>
<?php
}
ob_start("reparse");
?>
<div class="articles" style="padding:10px 10px 0 10px;">
<div class="blueTitle">Информация для покупателя</div>
</div>

<div class="borderWhite" style="padding:0 10px 10px 10px;">
    <p><a href="?s=terms" class="bluecat">Пользовательское соглашение</a></p>
    <p><a href="?s=terms-pd" class="bluecat">Политика в отношении обработки и защиты персональных данных</a></p>
    <p><a href="?s=terms-return" class="bluecat">Гарантия и возврат</a></p>
</div>
<?php
ob_end_flush();
?>
