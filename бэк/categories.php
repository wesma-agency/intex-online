<?php
if (!empty($_REQUEST['a']) && $_REQUEST['a'] == 'search-ajax') {
	// ajax поиск
    $query_string = getCategoryFilterQuery();
    $query_string = str_replace("`sort_id`", "`analog`", $query_string);
    $result = mysql_query("SELECT DISTINCT (analog) from ".ASSORTMENT_TABLE." WHERE price > 0 && ".$query_string);
    ob_clean();
    echo '<option value="">Любой</option>';
    while ($row = mysql_fetch_array($result)) {
        $row['analog'] = trim($row['analog'], "\r");
        if (!empty($row['analog']) && $row['analog'] != '') {
            echo '<option value="' . $row['analog'] . '">' . $row['analog'] . '</option>';
        }
    }
    exit;
}
else if (!empty($_REQUEST['a']) && $_REQUEST['a'] == 'search') {
	// обычный поиск
	// todo: оптимизация
    $query_string = getCategoryFilterQuery();
    $resultСount = mysql_query("SELECT count(*) as c from ".ASSORTMENT_TABLE." WHERE price > 0 && ".$query_string);
    $rowCount = mysql_fetch_array($resultСount);
	?>
	<br>
    <div class="borderWhite2">
        <div class="blueTitle">Результаты (<?=$rowCount['c']?>)</div><?php
        if ($rowCount['c'] == 0) {
            echo '</br></br></br>';
        }
        else {
            $i = 0;
            $result = mysql_query("SELECT * from ".ASSORTMENT_TABLE." WHERE price > 0 && ".$query_string);
            while ($row = mysql_fetch_array($result)) {
                if ($i == 0) {
                    echo '<ul style="margin:0;padding:0;">';
                }
                $i++;
				$uninumber = $row['uninumber'];
                echo "<li style='width: 238px; overflow: hidden; float: left; '>";
                include("includes/goods-work.php");
                echo "</li>";
                if ($i == 3) {
                    echo "</ul><div class='clear'></div>";
                    $i = 0;
                }
            }
            if ($i != 3) {
                echo "</ul><div class='clear'></div>";
                $i = 0;
            }
        }
        ?>
    </div>
    <?php
    return;
}
else if ($category == 8) {
	// каркасные бассейны, слайдеры
	?>
	<h1 class="whitecat"><?=($global_meta['seo_h1']!=''?$global_meta['seo_h1']:$cat_name)?></h1>
	<br>
    <div class="borderWhite2">
		<div class="blueTitle" style="width: 315px">Круглые каркасные бассейны</a></div>
		<div class="bw"><?php
		$result_t = mysql_query("SELECT * FROM ".ASSORTMENT_TABLE." WHERE price > 0 && (flag1=0 || coming != 0) and (catid in (60))");
		?>
		<button class="prev-btn prev">&nbsp;</button>
		<button class="next-btn next">&nbsp;</button>
		<div class="carusel-1 carusel">
			<ul><?php
				$visible = 0;
				while ($row_t = mysql_fetch_array($result_t)) {
					$id=$row_t['id'];
					$visible++;
					$uninumber_n=$row_t['uninumber'];
					$productname=$row_t['productname'];
					$price=$row_t['price'];
					$oldPrice=$row_t['oldprice'];
					$flag1=$row_t['flag1'];
					$notfull = true;
					?>
					<li style="width:32%;margin:0;padding:0;"><?php
					include("includes/goods-work.php"); ?>
					<!--<div class="borderright"></div>-->
					</li>
				<?php
				}
				if ($visible > 3) $visible = 3;
				?>
			</ul>
		</div>
        <div class="clear10"></div>
		<script type="text/javascript">
			$(function() {
				$(".carusel-1").jCarouselLite({
					btnNext: ".next",
					btnPrev: ".prev",
					visible: 3,
					scroll: 1
				});
			});
		</script>
		</div>
	</div>
    <br><br>
	<div class="borderWhite2" >
		<div class="blueTitle" style="width: 315px">Прямоугольные каркасные бассейны</a></div>
		<div class="bw"><?php
        $result_t = mysql_query("SELECT * FROM ".ASSORTMENT_TABLE." WHERE price > 0 && (flag1=0 || coming != 0) and (catid in (61))" );
        ?>
        <button class="prev-btn prev-2">&nbsp;</button>
        <button class="next-btn next-2">&nbsp;</button>
        <div class="carusel-2 carusel">
            <ul><?php
                $visible = 0;
                while ($row_t = mysql_fetch_array($result_t)) {
                    $id=$row_t['id'];
                    $visible++;
                    $uninumber_n=$row_t['uninumber'];
                    $productname=$row_t['productname'];
                    $price=$row_t['price'];
                    $oldPrice=$row_t['oldprice'];
                    $flag1=$row_t['flag1'];
                    $notfull = true;
                    ?>
                    <li style="width:32%;margin:0;padding:0;"><?php
					include("includes/goods-work.php"); ?>
                    <!--<div class="borderright"></div>-->
					</li>
                <?php
				}
                if ($visible > 3) $visible = 3;
                ?>
            </ul>
        </div>
        <script type="text/javascript">
            $(function() {
                $(".carusel-2").jCarouselLite({
                    btnNext: ".next-2",
                    btnPrev: ".prev-2",
                    visible: 3,
                    scroll: 1
                });
            });
        </script>
        <div class="clear10"></div>
		</div>
	</div><?php
	include_once "karkasnie-bassein.php";
	return;	
}

// if ($category != 48 || $category != 40) {
// }
/*
 * ресурсоемкий запрос подкатегорий
$subcats_rs = mysql_query("SELECT * FROM ".PRODCAT_TABLE." WHERE type = '1' ORDER BY oreder ASC");
$subcats = array();
while ($row = mysql_fetch_array($subcats_rs)){
	$subcats[$row['id']] = $row['catname'];
}
*/

/*
if ($category == 6) {?>
	<p class="right-align">&nbsp;</p>
<?}
else if ($category == 8) {?>
	<p class="right-align">&nbsp;</p>
<?}
*/

// $category = intval($_GET['category']);
$_SESSION['href'] ='?s=categories&category='.$category;

// запрос текущей категории
list($cat_id,$cat_name,$f1,$f2,$cat_type,$cat_root) = mysql_fetch_row(mysql_query("SELECT id, catname, flag1, flag2, type, rootcat FROM ".PRODCAT_TABLE." WHERE id='".$category."' LIMIT 1"));

$start_good = 0;
$info_lines = 3; 
$subcats = array();
// иерархический запрос подкатегорий
$subcats_rs = mysql_query("SELECT p.id, p.catname, g.url
FROM ".PRODCAT_TABLE." p
JOIN ".ASSORTMENT_TABLE." a ON a.subcatid = p.id AND (a.flag1=0 OR a.coming!=0 OR a.uninumber_new!='')
LEFT OUTER JOIN global_meta g ON g.snap_s = 'categories' AND g.snap_category=p.id
WHERE a.price > 0 && p.rootcat='".$category."' AND p.id!='59'
GROUP BY p.id
ORDER BY p.oreder ASC");
while ($row = mysql_fetch_array($subcats_rs)){
	$subcats[$row['id']] = array(
		'name'=>$row['catname'],
		'url'=>$row['url']
	);
}
// echo '<pre>'.$category.'<br>'.print_r($subcats,true).'</pre>';
?>
<h1 class="whitecat"><?=($global_meta['seo_h1']!=''?$global_meta['seo_h1']:$cat_name)?></h1><?php
if (count($subcats)>0) {
	echo '
	<ul class="sublevels">';
	foreach ($subcats as $sk=>$sv) {
		echo '
		<li><a href="'.($sv['url']!=''?'/'.$sv['url'].'/':'?s=categories&category='.$sk).'">'.$sv['name'].'</a></li>';
	}
	echo '
	</ul>';
}
?>
<div class="borderWhite2"><?php
    // не выводить товары которы нет в наличии.
//    $query_flag = "(g.flag1=0 OR g.coming!=0 OR g.uninumber_new!='')";
    $query_flag = "(g.flag1=0 OR g.coming!=0)";
	if ($category == 60 || $category == 61) {
		// костыль сборки для каркасных бассейнов
		$subcats[59] = 'Сборка каркасных бассейнов';
	}
	if ($cat_type) {
		// находимся на 2 уровне
		// ищем подуровни через рекурсию
		$tree = array($category);
		retree($category,$tree);
		$q = "SELECT g.*, p.id as pcat, p.catname
		FROM ".ASSORTMENT_TABLE." g
		LEFT OUTER JOIN ".PRODCAT_TABLE." p ON p.id=g.subcatid
		WHERE g.price > 0 && ".$query_flag." AND g.subcatid IN (".implode(',',$tree).")
		ORDER BY IF(p.oreder IS NULL,1,0), p.oreder ASC, g.sort_id ASC";
		$result = mysql_query($q);		
		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_array($result)) {
				if ($row['pcat']!=$start_sub) {
					$start_good = 0;
					if ($start_sub!=-1) {
						echo '</ul>
						<div class="clear"></div>';
					}
					echo ($row['catname']==''?'
					<div class="mezhrazdel" style="color:#fff;height:20px;font-size:18px;">Без категории</div>':'
					<div class="mezhrazdel-2">'.$row['catname'].'</div>').'
					<ul style="margin:0;padding:0;">';
					$start_sub = $row['pcat'];
				}
				$subtitle = '';
				if (!empty($subcats[$row['subcatid']])) {
					$subtitle = $subcats[$row['subcatid']];
				}
				$uninumber = $row['uninumber'];
				echo '<li style="width: 238px; overflow: hidden; float: left;">';
				include("includes/goods-work.php");
				echo '</li>';
				$start_good++;
				if ($start_good>=$info_lines) {
					echo '
					</ul>
					<div class="clear"></div>
					<div class="mezhrazdel"></div>
					<ul style="margin:0;padding:0;">';
					$start_good = 0;
				}
			}
			echo '
			</ul>
			<div class="clear"></div>';
		}			
	}
	else {
		// находимся на 1 уровне
		// распарсить дочерние категории
		$start_sub  = -1;
		$show_subcats = true;
		switch ($category) {
			case 107:
				$q = "
				SELECT g.*, p.id as pcat, p.catname
				FROM ".ASSORTMENT_TABLE." g
				LEFT OUTER JOIN ".PRODCAT_TABLE." p ON p.id=g.subcatid
				WHERE g.price > 0 && ".$query_flag." AND g.catid IN (8,60,61) AND g.productname LIKE '%песч%'
				ORDER BY IF(p.oreder IS NULL,1,0), p.oreder ASC, g.sort_id ASC";	
				$show_subcats = false;		
			break;

			case 106:
				$q = "
				SELECT g.*, p.id as pcat, p.catname
				FROM ".ASSORTMENT_TABLE." g
				LEFT OUTER JOIN ".PRODCAT_TABLE." p ON p.id=g.subcatid
				WHERE g.price > 0 && ".$query_flag." AND g.catid IN (8,60,61) AND g.productname LIKE '%хлор%'
				ORDER BY IF(p.oreder IS NULL,1,0), p.oreder ASC, g.sort_id ASC";
				$show_subcats = false;
			break;

			default:
				// стандартный вывод категорий
				$parentcat = ($category == 60 || $category == 61?$category.',8':$category);
				$q = "
				SELECT g.*, p.id as pcat, p.catname
				FROM ".ASSORTMENT_TABLE." g
				LEFT OUTER JOIN ".PRODCAT_TABLE." p ON p.id=g.subcatid
				WHERE g.price > 0 && ".$query_flag." AND g.catid IN (".$parentcat.")
				ORDER BY IF(p.oreder IS NULL,1,0), p.oreder ASC, g.sort_id ASC";
			break;
		}
		$result = mysql_query($q);
		if (mysql_num_rows($result)>0) {
			if ($show_subcats) {
				// вывод с категориями
				while ($row = mysql_fetch_array($result)) {
					if ($row['pcat']!=$start_sub) {
						$start_good = 0;
						if ($start_sub!=-1) {
							echo '</ul>
							<div class="clear"></div>';
						}
						echo ($row['catname']==''?'
						<div class="mezhrazdel" style="color:#fff;height:20px;font-size:18px;">Без категории</div>':'
						<div class="mezhrazdel-2">'.$row['catname'].'</div>').'
						<ul style="margin:0;padding:0;">';
						$start_sub = $row['pcat'];
					}
					$subtitle = '';
					if (!empty($subcats[$row['subcatid']])) {
						$subtitle = $subcats[$row['subcatid']];
					}
					$uninumber = $row['uninumber'];
					echo '<li style="width: 238px; overflow: hidden; float: left;">';
					include("includes/goods-work.php");
					echo '</li>';
					$start_good++;
					if ($start_good>=$info_lines) {
						echo '
						</ul>
						<div class="clear"></div>
						<div class="mezhrazdel"></div>
						<ul style="margin:0;padding:0;">';
						$start_good = 0;
					}
				}
			}
			else {
				// вывод без категорий
				echo '
				<ul style="margin:0;padding:0;">';
				while ($row = mysql_fetch_array($result)) {
					$uninumber = $row['uninumber'];
					echo '<li style="width: 238px; overflow: hidden; float: left;">';
					include("includes/goods-work.php");
					echo '</li>';
					$start_good++;
					if ($start_good>=$info_lines) {
						echo '
						</ul>
						<div class="clear"></div>
						<div class="mezhrazdel"></div>
						<ul style="margin:0;padding:0;">';
						$start_good = 0;
					}
				}				
			}
			echo '
			</ul>
			<div class="clear"></div>';
		}
	}
echo "<div class='clear10'></div>";
?>
</div>
<?php
if ($category && $category != 8) {
    include_once "karkasnie-bassein.php";
}
require_once "sn-buttons.php";

function getCategoryFilterQuery() {
    $fshape = intval($_REQUEST['fshape']);
    $ftype = intval($_REQUEST['ftype']);
    $fsize = intval($_REQUEST['fsize']);
    // круглый
    if ($fshape == 1) {
        $query_string = "(flag1=0 || coming != 0) and (catid in (60) || `subcatid` in (57,62))";
        // каркас
        if ($ftype == 1) {
            $query_string = "(flag1=0 || coming != 0) and (catid in (60))";
        }
        // надувной
        else if ($ftype == 2) {
            $query_string = "(flag1=0 || coming != 0) and (`subcatid` in (57))";
        }
        // металл
        else if ($ftype == 3) {
            $query_string = "(flag1=0 || coming != 0) and (subcatid in (62))";
        }
    }
    // овальный
    else if ($fshape == 2) {
        $query_string = "(flag1=0 || coming != 0) and (`subcatid` in (56, 63))";
        // каркас
        if ($ftype == 1) {
            $query_string = "flag1=5";
        }
        // надувной
        else if ($ftype == 2) {
            $query_string = "(flag1=0 || coming != 0) and (subcatid in (56))";
        }
        // металл
        else if ($ftype == 3) {
            $query_string = "(flag1=0 || coming != 0) and (subcatid in (63))";
        }
    }
    // прямоугольный
    else if ($fshape == 3) {
        $query_string = "(flag1=0 || coming != 0) and (`catid` in (61))";

        // каркас
        if ($ftype == 1) {
            $query_string = "(flag1=0 || coming != 0) and (`catid` in (61))";
        }
        // надувной
        else if ($ftype == 2) {
            $query_string = "flag1=5";
        }
        // металл
        else if ($ftype == 3) {
            $query_string = "flag1=5";
        }
    }
    // если форма не задана
    else {
        $query_string = "(flag1=0 || coming != 0)";
    }
    if (!empty($fsize)) {
        $fsize = mysql_real_escape_string($fsize);
        $query_string .= ' and (analog = "'.$fsize."\r".'" || analog = "'.$fsize.'")';
    }
    return $query_string. ' ORDER BY `sort_id` asc';
}
?>
		
		
		

