<?php
$timeSliderShow = 1000;
function showBanner( $type = 1)
{
    global $timeSliderShow;


    $query = "select * from sys_banners where `current` = 1 order by ord asc";

    $rs = mysql_query($query);


    if (mysql_num_rows($rs) == 0) {
        return;
    }

    if ($type == 1) {
        echo '<ul id="top-slider" style="display:none;overflow:hidden;height: 220px;list-style-type: none;padding:0;margin:0;">';
    }



    while ($row = mysql_fetch_array($rs)) {

        if (!empty($row['articul'])) {
            $item = getItem($row['articul']);

            $timeSliderShow = 1000 * $row['time'];

            if ($item == null || empty($item)) {
                continue;
            }
        }

        $priceText = '';
        if ($row['price_type'] == 1) {
            $priceText = '<span>Прогнозируемая цена: '.$row['future_price'].'</span>';
        }
        else {
            $priceText = '<span>Старая цена:<br/>'.$row['old_price'].'</span>';
        }

        $priceText .= '<b>'.number_format($item['price'], 0, ',', ' ').' руб.</b>';

        if (!empty($row['articul'])) {

            if ($type == 1) {
                echo '<li><div class="banner-cl">
                <div class="banner-cl__bg"></div>
                <div class="price__title">Бассейн</div>
                <div class="price">' . $priceText . '</div>
                <div class="articul__title">Артикул</div>
                <div class="articul">' . $row['articul'] . '</div>
                <div class="size__title">Размер</div>
                <div class="size">' . $row['size'] . '</div>';
                echo '<a title="' . $item['productname'] . '" style="border:none; text-decoration:none;" href="https://intex-online.ru/'.($item['url']!=''?$item['url'].'/':'?s=assortment&id='.$item['uninumber']).'"><img src="' . $row['img'] . '" alt="' . $item['productname'] . '" style="border:none;margin: 10px 0;" ></a>';
                echo '</div></li>';
            }
            else if ($type == 2) {
                echo '<div class="banner-cl lite">
                <div class="banner-cl__bg"></div>
                <div class="price__title">Бассейн</div>
                <div class="price">' . $priceText . '</div>
                <div class="articul__title">Артикул</div>
                <div class="articul">' . $row['articul'] . '</div>
                <div class="size__title">Размер</div>
                <div class="size">' . $row['size'] . '</div>';
                echo '<a title="' . $item['productname'] . '" style="border:none; text-decoration:none;" href="https://intex-online.ru/'.($item['url']!=''?$item['url'].'/':'?s=assortment&id='.$item['uninumber']).'"><img src="' . $row['img'] . '" alt="' . $item['productname'] . '" style="border:none;margin: 10px 0;" ></a>';
                echo '</div>';
            }
        }
        else if ($type == 1) {
            echo '<li><div class="banner-cl">';
            echo '<a style="border:none; text-decoration:none;" href="'.$row['url'].'"><img src="' . $row['img'] . '" style="border:none;margin: 10px 0;" ></a>';
            echo '</div></li>';
        }
        else {
            echo '<div class="banner-cl lite">';
            echo '<a style="border:none; text-decoration:none;" href="'.$row['url'].'"><img src="' . $row['img'] . '" style="border:none;margin: 10px 0;" ></a>';
            echo '</div>';
        }
    }



    if ($type == 1) {

            echo '</ul>';


            echo '<p class="banner-cl-more-lnk"><a href="/sale/" class="sale sale-img" title="Товары по акции"></a><a href="/akcii/" title="Все спецпредложения" class="spec-img"></a></p><div class="clear"></div>';


//            echo '<p class="banner-cl-more-lnk"><a href="https://intex-online.ru/?s=sale" class="sale">Товары по акции</a><a href="https://intex-online.ru/?s=specials">Все спецпредложения</a></p>';
        
        initJs();
    }

}

function getItem($articul) {
    $query = "select a.*, g.url
    FROM " . ASSORTMENT_TABLE . " a
    LEFT OUTER JOIN global_meta g ON g.snap_s = 'assortment' AND g.snap_id = a.uninumber
    WHERE a.uninumber = '".$articul."';";
    $rs = mysql_query($query);
    if (empty($rs)) {
        return null;
    }
    
    $row = mysql_fetch_array($rs);
    // find new unimber if exist
    if (!empty($row['uninumber_new']) && $row['uninumber_new']) {
        $query = "select a.*, g.url
        FROM ".ASSORTMENT_TABLE." a
        LEFT OUTER JOIN global_meta g ON g.snap_s = 'assortment' AND g.snap_id = a.uninumber
        WHERE a.uninumber = '".$row['uninumber_new']."';";
        $rs = mysql_query($query);
        if (empty($rs)) {
            return null;
        }
    }
    return $row;
}

function initJs() {
    global $timeSliderShow;
    echo '<script type="text/javascript">
    $(document).ready(function() {
        $("#top-slider").rhinoslider({
            showTime:'.$timeSliderShow.',
            controlsPlayPause: false,
            autoPlay: true,
            showBullets: "never",
            showControls: "never",
            slidePrevDirection: "toRight",
            slideNextDirection: "toLeft",
            callBackInit: function() {
                $("#top-slider").show();
                return false;
            }

        });
    });
    </script>';


}

