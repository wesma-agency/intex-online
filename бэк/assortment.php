<?  // вывод одного товара подробно, на собственной странице товара.

$id = $_GET['id'];
$result = mysql_query("SELECT * from ".ASSORTMENT_TABLE." WHERE uninumber='$id' && price > 0");

$wasFoundGoods = false;
while ($row = mysql_fetch_array($result)) {
           $wasFoundGoods = true;
	$id=$row['id'];
	$catid=$row['catid'];
    $subcatid=$row['subcatid'];
	$uninumber_n=$row['uninumber'];
    $uninumberNew=$row['uninumber_new'];
           
           
           
	$_SESSION['href'] = '/?s=assortment&id='.$uninumber_n;
	$productname=$row['productname'];
	$price=$row['price'];
	$oldPrice=$row['oldprice'];
	$about1=$row['about1'];
	$about2=$row['about2'];
    $coming = $row['coming'];
	$f1=$row['flag1'];
	$f2=$row['flag2'];
	$f3=$row['flag3'];
	$related = $row['related'];
	$video['title'] = $row['video_title'];
	$video['desc'] = $row['video_desc'];
	$video['code'] = $row['video_code'];
    $analog=$row['analog'];
    $share=$row['share'];
    $hit=$row['hit'];
    $rowId=$row['id'];

    // todo:test-share-coupon удалить как будет готово
    if (empty($_SESSION['test-share-coupon'])) {
        $share = 0;
    }


    if ($coming > 0) {
        $f1 = 0;
    }
}

if (!$wasFoundGoods) {
    header("Location: /");
    exit;
}

$related = explode(',', $related);

foreach($related as $id => $value)
	$related[$id] = "'".trim($value)."'";

$related = implode(',', $related);



$result = mysql_query("
SELECT a.uninumber, a.uninumber_new, a.flag1, a.productname, a.price, g.url
FROM ".ASSORTMENT_TABLE." a
LEFT OUTER JOIN global_meta g ON g.snap_s = 'assortment' AND g.snap_id = a.uninumber
WHERE a.uninumber IN(".$related.") && a.price > 0
ORDER BY FIELD(a.uninumber, ".$related.")");

$related = array();

$relatedNewUni = array();
while($row = mysql_fetch_assoc($result)) {
    if ($row['flag1'] == 0) {
        $related[] = $row;
    }
    else if (!empty($row['uninumber_new'])) {
        $relatedNewUni[] = $row['uninumber_new'];
    }
}

if (!empty($relatedNewUni)) {

    $relatedAdditional = implode(',', $relatedNewUni);
    $result = mysql_query('SELECT uninumber, productname, price FROM ' . ASSORTMENT_TABLE . ' WHERE flag1=0 && price > 0 && uninumber IN(' . $relatedAdditional . ')');
    while($row = mysql_fetch_assoc($result))
        $related[] = $row;
}



$about1 = str_replace("\n", "<br>", $about1);
$about2 = str_replace("\n", "<br>", $about2);
?>
<h1 class="whitecat"><?=$productname?></h1>
<div class="borderWhite2">

<div class="orderLeft">
<div class="rc5 main">

<center><a href="<?=ASSORTMENT_URL?>/<?=$uninumber_n?>-b.jpg" class="gallery2" rel="group"  title="<?=$productname?>">
        <?php if ($hit == 1) {?>
            <i class="hit"></i>
        <?php }?>

<?php if ($catid == 8 || $catid == 6 || $catid == 10 || $catid == 17 || $catid == 11 || $catid == 12) { ?>
	<img src="/<?=ASSORTMENT_URL?>/<?=$uninumber_n?>-s.jpg" title="<?=$productname?>"  alt="<?=$productname?>" border="0"  width="240" height="150">
<?php } else if ($catid == 86 && $share == 1) {?>
    <img src="http://pyroblast.ru/assortment/n/<?=$rowId?>.png"  border="0"  width="240" height="150" title="<?=$productname?>"
         alt="<?= $productname ?>">
<? } else {?>
	<img src="/<?=ASSORTMENT_URL?>/<?=$uninumber_n?>-s.jpg" title="<?=$productname?>"  alt="<?=$productname?>" border=0>
<? } ?>

</a> </center>
</div>

<?php
	$inx = 1;
	$fotosRs = mysql_query( "select * from  ".PICTURES_TABLE." where uninumber ='$uninumber_n'" );
	if ( !empty( $fotosRs ) ) {
		while( $row = mysql_fetch_assoc( $fotosRs ) ) {

		    if (empty($row['file'])) continue;

		$file = SERVER_DOCUMENT_ROOT.'/'.ASSORTMENT_DIR.'/'. $row['file'];
		$url = '/'.ASSORTMENT_URL.'/'.$row['file'];
        ?>

		<div class="rc5" style="background-color :#fff; width:115px; height:101px;margin:10px 0 0 21px;float:left;">
			<center>
			<a href="<?=$url?>" class="gallery2" rel="group"  title="<?=$productname?>">
			<img width="100" height="100" src="<?=$url?>" title="<?=$productname?>"  alt="<?=$productname?>" border="0">
			</a>
			</center>
		</div>
		<?
	}
	echo '<div style="clear:both;height:15px;"></div>';
	}
	if (!empty($video) && !empty($video['code'])) {
			$video['code'] = htmlspecialchars_decode($video['code']);
			$video['code'] = preg_replace("/width=\"\d+?\"/", 'width="250"', $video['code']);
			$video['code'] = preg_replace("/height=\"\d+?\"/", 'height="150"', $video['code']);

			$href = "#";
			$classIframe = "";
			if (preg_match("/youtube/", $video['code']) && preg_match("/src=\"(.*?)\"/", $video['code'], $m)) {
					$href = $m[1].'?autoplay=1';
					$classIframe = 'class="various fancybox.iframe"';
			}
			else if (preg_match("/video\.yandex\.ru/", $video['code']) && preg_match("/src=\"(.*?)\"/", $video['code'], $m)) {
				$href = $m[1];
				$classIframe = 'class="various fancybox.iframe"';
			}
// 			echo htmlspecialchars_decode($video['code']);
// 			$href = "http://video.yandex.ru/iframe/intex-online/6c0pn9ykg4.4714";
// 			$classIframe = 'class="various fancybox.iframe"';
			echo '<div style="margin-left: 21px;">
				<a href="'.$href.'"  '.$classIframe.' style="font-size:12px;" title="'.$video['desc'].'">'.$video['title'].'</a>
				<p style="margin-top:5px;">
				<a href="'.$href.'"  '.$classIframe.' style="font-size:12px;" title="'.$video['desc'].'"><img style="cursor:pointer;" border="0" src="/images/play_btn.png" alt="'.$video['title'].'"  ></a></p>';
			echo '</div>';
	}
?>


<?php
	$inx = 1;
	$docsRs = mysql_query( "select * from ".DOCS_TABLE." where uninumber ='$uninumber_n'" );
	$docsRsCount = mysql_query( "select count(*) as c from ".DOCS_TABLE." where uninumber ='$uninumber_n' && `file` is not null " );
	$docsCount = mysql_fetch_assoc( $docsRsCount );

	if ( !empty( $docsCount['c'] ) ) { ?>
<div class="rc5" style="margin:10px 0 0 21px;float:left;">
<p style="text-align:center;color:#fff;">Инструкции:</p>

	<?
        $instructionList = array();
        $instruction_html = '';
        $file = SERVER_DOCUMENT_ROOT.'/'.ASSORTMENT_DIR.'/docs/';
//        echo $file;
		while( $row = mysql_fetch_assoc( $docsRs ) ) {

            if (!empty($row['html'])) {
                $instruction_html = $row['html'].'<p><br/><br/></p>';
            }
//            echo $file.$row['file'];
		    if ( !empty($row['file']) && file_exists( $file.$row['file'] ) ) {
                $instructionList[$row['id']] = $row['file'];
	        }
        }



    if (!empty($instructionList)) {?>
        <p style="text-align: center"></p>
        <ul style="color:#fff; list-style-type: none;padding: 0;margin:0;">
        <?php foreach ($instructionList as $instructionId => $instructionFile) {?>
        <li style="text-align: center"><a style="color:#fff" href="getfile.php?id=<?=$instructionId?>"> <img src="/images/doc-ico2.png" width="100"/><br>Скачать</a></li>
        <?php }?>
        </ul>
    <?php }?>

    <?php if ($instruction_html != '') {?>
    <a href="#instructions" class="fancybox-html">Просмотр инструкции в онлайн</a>
    <div style="display: none">
        <div id="instructions"><?php echo $instruction_html;?></div>
    </div>
    <script>$(".fancybox-html").fancybox();</script>
    <?php }?>
</div>
<? } 


// проверяем есть ли новый артикул в наличии
if ($uninumberNew) {
    $uninumberNewRs = mysql_query( "select flag1,oldprice,price from ".ASSORTMENT_TABLE." where price > 0 && uninumber ='$uninumberNew'" );
    
    if ($uninumberNewRs) {
        $uninumberNewrow = mysql_fetch_assoc( $uninumberNewRs );
        if ($uninumberNewrow['flag1'] == 1) {
            $uninumberNew = null;
        }
    }
}


?>

    


</div>
<div class="orderText">
<div style="float:left; width:420px;">
    
    <?php if ($uninumberNew && $f1=="1") {?> 
    <div class="clear"></div>
    <div class="borderWhite new-articul" >
        <div class="blueTitle">Внимание</div>
        
        <p>У этого товара изменился артикул на <span><?=$uninumberNew?></span></p>
        
        <a onclick="cart_add_form('<?=$uninumberNew?>', this);return false; " href="#" class="buy-btn"></a>
    </div>
    <div class="clear"></div>
    <?php }
    // ?s=order-proc&assortment=<?=$uninumberNew
    // только если есть новый артикул и товара нет в наличии, то берем цены и артикул с нового товара.
    if ($uninumberNew && $f1=="1") {
        $price = $uninumberNewrow['price'];
        $oldPrice = $uninumberNewrow['oldprice'];
//        $uninumber_n = $uninumberNew;
    }?>

    <?php if (!empty($analog)) {?>
        <div class="borderWhite new-articul">
            <p>
            <a href="/?s=analog&id=<?php echo $analog;?>&assortment=<?php echo $uninumber_n;?>">Посмотреть Аналоги</a>
            </p>
        </div>
    <?php }?>
    
<span class="textWhite">Описание</span><br><?=$about2?>

<div class="asortLeft" style="width:420px; margin:21px 0 0 0; border-top:1px solid #fff;">



<div class="orderArt">Артикул: <?=$uninumber_n?></div><br>


    <?php if ($price < $oldPrice) {?>
            <span class="discount">Скидка: </span><span class="discount"><?=intval(100-($price/$oldPrice*100))?>%</span><br>
            <span class="cina">Старая цена: </span><span class="cina"><s><?=$oldPrice?> р.</s></span><br>
    <?php } ?>
    <span class="cina">Цена: </span><span class="cina3b"><?=$price?> р.</span>

    <?php if (!$uninumberNew && $coming > 0) {?>
        <br>
        <span class="cina">Дата прихода на склад:</span> <b><?=date("d.m.Y", $coming)?></b>
    <?php }?>
    <div class="credit assort">
        <a href="#" onclick="cart_add_credit('<?=(($uninumberNew && $f1=="1")?$uninumberNew:$uninumber_n);?>', this);return false;">В кредит</a>
    </div>
    <br>
</div>
<?
if ($uninumberNew && $f1=="1") { ?>

    <div class="buy">
        <a href="#" onclick="cart_add_form('<?=$uninumberNew;?>', this);return false; ">Купить</a>
    </div>
    <div class="buy quick">
        <a class="quick-by-click-btn" data-id="<?=$uninumberNew?>" <?=($share == 1?'data-share="1"':'')?> data-type="2">Заказ в 1 клик</a>
    </div>
    <div class="buy rnp">
        <a class="rnp-btn" href="#" onclick="cart_add_rnp('<?=$uninumberNew;?>', this);return false;">Заказ наложенным платежом</a>
    </div>
    <div class="credit r">
        <a href="#" onclick="cart_add_credit('<?=$uninumberNew;?>', this);return false;">В кредит</a>
    </div>
<? }
else if ($f1=="1") {
?>
    <div style="margin-top:50px">нет в наличии</div>
<?
}
else {
?>
    <div class="buy">
    <a href="#" onclick="cart_add_form('<?=$uninumber_n;?>', this);return false; ">Купить</a>
    </div>

    <div class="buy quick">
        <a class="quick-by-click-btn" data-id="<?=$uninumber_n?>" <?=($share == 1?'data-share="1"':'')?> data-type="2">Заказ в 1 клик</a>
    </div>

    <div class="buy rnp-btn assort">
        <a href="" onclick="cart_add_rnp('<?=$uninumber_n;?>', this);return false;">
            Наложенным<br>
            платежом
        </a>
    </div>
    <br>

<?
}
?>

</div>
<div class="orderContactBlock">
<a href="/kontakty/">
    

СДЕЛАТЬ ЗАКАЗ МОЖНО ПО ТЕЛЕФОНУ <span class="orderTel"><span class="na-phone">8 (495) 104-57-93</span></span></a>
    <br/><br/>
    <?php require_once "sn-buttons.php";?>
</div>

<div class="clear"></div>

</div>
</div>



<?if(is_array($related) && sizeof($related) || !empty($_SESSION['admin_login_id'])):?>


<br><br><br>
<div class="borderWhite2 related" style="margin:0;padding:0 0 20px 0;">
<div class="blueTitle">Также&nbsp;рекомендуем&nbsp;купить:</div>

<div class="clear"></div>
<? $cols = 0; ?>

<div id="sortable" data-id="<?php echo $uninumber_n;?>">
<?for($i=0,$item=$related[$i];$i<sizeof($related);$i++,$item=$related[$i]):?>
<div class="asortment">	
<div class="asortTitle">
<a href="<?=($item['url']!=''?'/'.$item['uninumber'].'/':'/?s=assortment&id='.urlencode($item['uninumber']))?>"><?=$item['productname']?></a>
</div>	
<div class="rc8" style="background-color :#fff; width:190px; height:115px;margin-left:21px;"> <center>
<a href="<?=($item['url']!=''?'/'.$item['uninumber'].'/':'/?s=assortment&id='.urlencode($item['uninumber']))?>"><img border="0" height="115px" alt="<?=$item['productname']?>" title="<?=$item['productname']?>" src="/<?=ASSORTMENT_URL?>/<?=$item['uninumber'];?>-s.jpg"></a> </center></div><div class="hidn"> </div>
<div class="asortLeft">
<div class="orderArt">Артикул: <?=$item['uninumber'];?></div>
<span class="cina">цена: </span><span class="cina2"><?=$item['price'];?> р.</span>

    <?php if (UserDB::allowManageRelated()) {?>
        <p>
            <input type="hidden" class="related-sort" name="related_sort[]" value="<?=$item['uninumber'];?>">
            <div class="related-sort-btn" title="Переместить">Сортировка</div>
            <a href="/related.php?action=2&assortment=<?php echo $uninumber_n;?>&item_id=<?=$item['uninumber'];?>">+Удалить из<br>рекомендуемых</a></p>

    <?php }?>

</div>

<div class="buy">
<a href="#" onclick="cart_add_form('<?=$item['uninumber'];?>', this);return false;">Купить</a>
</div>
</div>
<? $cols++; if ($cols == 3) {?>
<? $cols = 0; }  ?>
<?endfor;?>
</div>

    <div class="clear10"></div>
    <?php if (UserDB::allowManageRelated()) {?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <p class="add-related-item">
            <a href="/related.php?action=1&assortment=<?php echo $uninumber_n;?>" class="various fancybox.iframe">+Добавить товар</a>
        </p>
        <script>
            function relatedReload() {
                jQuery.fancybox.close();
                location.reload();
            }

            $("#sortable").sortable({
                items: '.asortment',
                handle: '.related-sort-btn',
                update: function() {
                    $.ajax({
                        url: '/related.php?action=4',
                        type: 'post',
                        data: $('.related-sort').serialize() + '&assortment=' + $("#sortable").data('id')
                    });
                }

            });




        </script>
    <?php }?>

	</div>	

<?endif;?>

<?php

?>
