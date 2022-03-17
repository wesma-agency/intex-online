<?php
include_once("includes/register_globals.php");
ini_set('session.cookie_domain', '.intex-online.ru');
// session_set_cookie_params(0, '/', '.intex-online.ru');
// ini_set('session.gc_maxlifetime', 120960);
// ini_set('session.cookie_lifetime', 120960);
session_start();
// todo:test-share-coupon удалить как будет готово
// if (!empty($_REQUEST['test-share-coupon'])) {
$_SESSION['test-share-coupon'] = 1;
// }
// unset($_SESSION['test-share-coupon']);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'includes/somedata.ext.php';
require_once 'includes/gzip.php';
require_once 'icart/UserDB.php';
require_once 'icart/DB.php';
require_once 'icart/CartApp.php';
require_once "includes/callme.php";
UserDB::unsubscribe();
$callMe = new CallMe(1);
if ($s == "ajaxstore") {
    include("includes/ajaxstore.php");
}
include("seomagic/init.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title><?=$global_meta['seo_title']?></title>
        <meta name="description" content="<?=$global_meta['seo_description']?>">
        <meta name="keywords" content="<?=$global_meta['seo_keywords']?>">       
        <?php
        if ($s == 'search' || (!empty($_REQUEST['a']) && $_REQUEST['a'] == 'search')) {?>
        <meta name="robots" content="noindex"><?php
        }
        if (ShopRegion::isSpb()) {
            $su = '//spb.intex-online.ru/';
        ?>
        <base href="//spb.intex-online.ru/" /><?php
        }
        else {?>
        <base href="//intex-online.ru/" /><?php
        }
        ?>
        <link rel="stylesheet" href="//intex-online.ru/assets/css/style.css?v=<?=time()?>" />
        <meta http-equiv="content-type" content="text/html; charset=windows-1251">
        <meta http-equiv="Content-type" content="text/html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Language" content="ru"><?php // include("includes/metat.php"); ?>
        <meta name="robots" content="all">
        <meta name="yandex-verification" content="5b45d359f8b308f4" />
        <meta name="google-site-verification" content="r0KmbJYQOndrCJMINchQpIVbmsESrShM4MbXcrPpvE0" />
        <? if ($canonical): ?><link rel="canonical" href="<?=$canonical?>"/><? endif; ?>       
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/fancybox/jquery.fancybox.pack.js?v=2.0.6"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.intex-online.ru/fancybox/jquery.fancybox.css?v=2.0.6" media="screen" >
        <script type="text/javascript" src="//cdn.intex-online.ru/jcarousellite/jcarousellite_1.0.1.min.js"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/jcarousellite/easing.js"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/js/calendar.js"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/js/cart-fly.js?v=<?=time()?>"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/jcarousellite/mousewheel.js"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/rhinoslider/rhinoslider.10.5.js"></script>
        <script type="text/javascript" src="//vk.com/js/api/share.js?93" charset="windows-1251"></script>
        <script type="text/javascript" src="//cdn.intex-online.ru/js/intex-phone.js?v=4"></script>
        <script type="text/javascript">
            var __cs = __cs || [];
            __cs.push(["setCsAccount", "_x825S61_uqFFS1GS4SkOUuzYb8evDBu"]);
        </script>
        <script type="text/javascript" async src="https://app.uiscom.ru/static/cs.min.js"></script>
        <!--
        <script type="text/javascript">
            var __cs = __cs || [];
            __cs.push(["setCsAccount", "3IDX29yEL0lsGDYORWp850Xavhv4GTWM"]);
        </script>
        <script type="text/javascript" async src="//app.comagic.ru/static/cs.min.js"></script>
        -->
    </head><?php
    include("seomagic/editor.php");
    ?>
    <body bgcolor="3d7ac3">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92353038-1"></script>
        <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-92353038-1'); </script>

        <?php
        // подключение модуля редактирования заказа
        require_once 'icart/EditApp.php';
        new EditApp(1);
        // определяем источник трафика
        CartApp::setTrafficMark(1);
        ?>
        <div class="sitebody">
            <div class="siteheader">
                <div class="region-menu">
                    <span>Ваш город:</span>
                    <ul class="open"><?php
                        if (ShopRegion::isSpb()) {?>
                        <li><a href="//spb.intex-online.ru">Санкт-Петербург</a></li>
                        <li><a href="//intex-online.ru/region.php?c=msk">Москва и МО</a></li>
                        <li><a href="//intex-online.ru/region.php">Регионы РФ</a></li><?php }
                        elseif (!empty($_COOKIE['_region']) && $_COOKIE['_region'] == 1) { ?>
                        <li><a href="//intex-online.ru/region.php">Регионы РФ</a></li>
                        <li><a href="//intex-online.ru/region.php?c=msk">Москва и МО</a></li>
                        <li><a href="//spb.intex-online.ru">Санкт-Петербург</a></li><?php }
                        else {?>
                        <li><a href="//intex-online.ru/region.php?c=msk">Москва и МО</a></li>
                        <li><a href="//spb.intex-online.ru">Санкт-Петербург</a></li>
                        <li><a href="//intex-online.ru/region.php">Регионы РФ</a></li><?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="logo"><a href=""><img src="images/logo.png" alt=""></a></div>
                <div class="slogan"><img src="images/slogan.png" alt=""></div>
                <form action="/" id="myownsearchform">
                    <div class="phone">
                        <div class="phone-block">
                            <span class="l">телефон:</span>
                            <p><a href="tel:+74951045793" class="na-phone" onclick="send_combo('callback_phone_header','phone_header');">8 (495) 104-57-93</a>&nbsp;</p>
                            <span class="code-uis">Код посетителя: <span id="uis-code"></span></span>
                            <input type="hidden" id="uis-code-cache" value="<?=$_SESSION['uis_code_cache']?>">
                        </div><?php
                        $search = '';
                        if ($_GET['word']) {
                            $search = addslashes(trim($_GET['word']));
                        }
                        ?>
                        <input class="search" name="word" value="<?=$search?>" type="text"> <a class="search-lnk" href="javascript:return false;" onclick="$('#myownsearchform')[0].submit()">Найти</a>
                    </div>
                    <input type="hidden" name="s" value="search" >
                </form>
                <div class="clear"></div><?php
                ob_start("reparse");
                $global_menu = array(
                    ''=>'Главная',
                    'contact'=>'Контакты',
                    'delivery'=>'Доставка и оплата',
                    'about'=>'О магазине',
                    'article'=>'Статьи',
                    'article6'=>'Фотогалерея',
                    'article10'=>'Строительство бассейнов',
                    'article19'=>'Оплата и доставка в регионы'
                );
                ?>
                <div class="tmm">
                    <table width="99%">
                        <tr><?php
                        foreach ($global_menu as $k=>$v) {
                            echo '
                            <td><a href="'.($k!=''?'?s='.$k:'/').'" class="rc10'.($s==$k?' active':'').'">'.$v.'</a><div class="hid"></div></td>';    
                        }
                        ?>
                        </tr>
                    </table>
                </div>
                <?php
                ob_end_flush();
                ?>
            </div>
            <div class="technical-work">Внимание! С 1 по 15 февраля на сайте ведутся технические работы. Возможны сбои при отображении некоторых страниц. Не волнуйтесь, если что-то такое произошло, то мы скорее всего это уже увидели и исправляем. Приносим извинения за доставленные неудобства.</div>
			<div class="left"><?php
                include("includes/categories_menu.php");
                ?>
                <a href="#" id="go-to-top" class="buy">&#8593; Наверх</a>
            </div>
            <div class="central"><?php
                require_once("includes/banners.php");
                showBanner(1);
                require_once EXTRA_LIB."/spec-timer.php";
                $specTimer = new SpecTimer(1);
                if ($specTimer->isTimerEnabled()) {?>
                    <br/><br/>
                    <div class="borderWhite2">
                        <div class="blueTitle" style="width:250px">До повышения цен осталось</div><?=$specTimer->getTimer()?>
                        <p></p>
                    </div>
                    <?php
                }
                else {
                    echo '<br/>';
                }
                ?>
                <div class="borderWhite2">
                    <div class="blueTitle">Подобрать бассейн:</div>
                    <form id="ajax-from-filter-js" class="sort-form" action="/" method="get" autocomplete="off">
                        <input type="hidden" name="s" value="categories"/>
                        <input type="hidden" name="a" value="search"/>
                        <table cellpadding="0" cellspacing="0" border="0" style="width: 100%">
                            <tr>
                                <td><label for="sort-form-fshape">Форма:</label></td>
                                <td><label for="sort-form-ftype">Тип:</label></td>
                                <td><label for="sort-form-fsize">Размер:</label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="sort-form-fshape" name="fshape" class="filter-from-ajax">
                                        <option <?php if ($_REQUEST['fshape'] == 1) {echo 'selected="selected"';}?> value="1">Круглый</option>
                                        <option <?php if ($_REQUEST['fshape'] == 2) {echo 'selected="selected"';}?> value="2">Овальный</option>
                                        <option <?php if ($_REQUEST['fshape'] == 3) {echo 'selected="selected"';}?> value="3">Прямоугольный</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="sort-form-ftype" name="ftype" class="filter-from-ajax">
                                        <option value="">Любой</option>
                                        <option <?php if ($_REQUEST['ftype'] == 1) {echo 'selected="selected"';}?> value="1">Каркасный</option>
                                        <option <?php if ($_REQUEST['ftype'] == 2) {echo 'selected="selected"';}?> value="2">Надувной</option>
                                        <option <?php if ($_REQUEST['ftype'] == 3) {echo 'selected="selected"';}?> value="3">Металлический</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="sort-form-fsize" name="fsize" <?php if (!empty($_REQUEST['fsize'])) {echo 'data-set="'.$_REQUEST['fsize'].'"';}?>>
                                        <option value="">Любой</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="btn" type="submit" value="Подобрать"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div><?php
                if ($s) include("includes/breadcrumbs.php"); 
                echo '<!-- '.$s.' -->';
                $closeTags = false;
                if (!$s || $s == 'basseyni' || $s == 'naduvnie_krovati_matrasy' || $s == 'naduvnie_lodki') {
                    $closeTags = true;
                    echo '
                    <h1 class="whitecat">'.$global_meta['seo_h1'].'</h1>';
                ?>
                <div id="tabs">
                    <ul>
                        <li class="pl"><a href=""><img  alt="" src="images/plashka1.png"><span>Спецпредложения</span></a></li>
                        <li class="pl"><a href="/basseyni/"><img alt="" src="images/plashka2.png"><span>Бассейны</span></a></li>
                        <li class="pl"><a href="/naduvnie_krovati_matrasy/"><img  alt="" src="images/plashka3.png"><span>Надувная мебель</span></a></li>
                        <li class="pl"><a href="/naduvnie_lodki/"><img  alt="" src="images/plashka4.png"><span>Надувные лодки</span></a></li>
                    </ul>
                    <div class="clear"></div>
                    <div id="fragment-1"><?php
                    }
                    switch ($s) {
                        case "analog":
                            include("includes/analog.php");    
                            break;
                        case "categories":
                            include("includes/categories.php");
                            break;
                        case "assortment":
                            include("includes/assortment.php");
                            break;                    
                        case "quickbyclick":
                            CartApp::quickByClick();
                            break;                   
                        case "order":
                            include("includes/order.php"); 
                            break;
                        case "order-proc":
                            include("includes/order-proc.php"); 
                            break;                    
                        case "order-coupon":
                            include("includes/biglion.php"); 
                            break;
                        case "discount":
                            include("includes/discount.php"); 
                            break;
                        case "contact":
                            include("includes/contact.php"); 
                            break;                    
                        case "about":
                            include("includes/about.php");
                            break;
                        case "delivery":
                            include("includes/delivery.php"); 
                            break;
                        case "specials":
                            include("includes/specials.php"); 
                            break;
                        case "sale":
                            include("includes/sale.php");
                            break;
                        case "view":
                            include("includes/view.php");
                            break;
                        case "article":
                            include("includes/article.php");
                            break;
                        case "payment":
                            include("includes/payment.php"); 
                            break;
                        case "netpay":
                            include("includes/payment_netpay.php"); 
                            break;                           
                        case "search":
                            include("includes/search.php"); 
                            break;
                        case "vacancy":
                            include("includes/vacancy.php"); 
                            break;
                        case "pecom_calc":
                            include("includes/pek_calc.php");
                            break;
                        case "responses":
                            include("includes/responses.php"); 
                            break;
                        case "responses_add":
                            include("includes/responses_add.php"); 
                            break;
                        case "poolstroi-calc":
                            include("includes/test-calc.php"); 
                            break;   
                        case "404":
                            include("includes/404.php"); 
                        break;                             
                        default:
                            if (preg_match("/article(\\d+)$/", $s, $matchId) || in_array($s, array('obzor-basseinov','obzor-basseinov-1','obzor-basseinov-3','obzor-basseinov-4','bassein-bestway-2012','vodopodgotovka','polprop','bassstroi','terms','terms-pd','terms-return'))){
                                $articleUrl = $s;
                                include("includes/article.php"); 
                            } elseif (!$s){
                                // главная
                                include("includes/specp.php");
                                include("includes/home-processing.php");
                            }                            
                            break;
                    }
                    if ($closeTags) { ?>
                    </div><?php
                    }
                    require_once 'includes/tabs.php';
                    if ($s == "basseyni") { ?>
                    <div id="fragment-2" class="fragments"><?php
                        $dataCat = array();
                        swemingpoll($dataCat);
                        foreach ($dataCat as $row) {
                            include 'includes/oneItem.php';
                        }
                        ?>
                    </div><?php
                    }
                    else if ($s == "naduvnie_krovati_matrasy") { ?>
                    <div id="fragment-3" class="fragments"><?php
                        $dataCat = array();
                        furniture($dataCat);
                        foreach ($dataCat as $row) {
                            include 'includes/oneItem.php';
                        }
                        ?>
                    </div><?php
                    }
                    else if ($s == "naduvnie_lodki") { ?>
                    <div id="fragment-4" class="fragments"><?php
                    $dataCat = array();
                    bout($dataCat);
                    foreach ($dataCat as $row) {
                        include 'includes/oneItem.php';
                    }
                    ?>
                    </div><?php
                    }
                if ($closeTags){ ?>
                </div><?php
                }
                ?>
            </div>
            <div class="right"><?php
                // include("includes/categories_menu.php");
                // include "includes/left_cart.php";
                echo CartApp::init_cart();
                ?> 
                <div style=" padding: 0 5px 14px;" class="borderWhite">
                    <div class="blueTitle">Прайс-лист</div>
                    <div class="price-xls">
                        <a class="xls-icon" href="/excelcreator/pricelist.php" onclick="send_combo('callback_download_pricelist','download_pricelist');">Microsoft Excel</a>
                        <p>Обновлен <?=date("d.m.Y")?></p>
                    </div>
                </div>
                <br><?php
                if ($specTimer->isRateEnabled()) {
                    echo $specTimer->getUSD();
                }
                $callMe->getForm();
                 CartApp::getQuickByClickForm(1);
                /*
                <a href="?s=order-coupon" title="Оформить Купон" style="text-decoration:none;"><img style="border:none;" alt="Оформить Купон" src="images/kupon1.gif"><br></a>
                */
                ?>
                <a href="/vacancy/" class="vacation-lnk"><img style="border:none;" alt="" src="images/vacation.png"></a>
                <p>
                    <a href="/karkassnie-basseiny/s-hlorgeneratorom/">Хлоргенераторы и озонаторы</a>
                    <a href="/karkassnie-basseiny/s-peschanym-filtrom/">Песчаные насос-фильтры для очистки воды</a>
                </p><?php
                // <!-- /?s=assortment&id=58202 -->
                ?>
                <a href="?s=categories&amp;category=48" style="text-decoration:none;"><img  alt="" style="border:none;" src="images/baner_cart.gif"><br></a>
                <p style="height:20px;"></p>
                <!--
                <div class="reklama">
                    <a href="http://pyroblast.ru" target="_blank"><img alt="" src="images/salut_mal.jpg"><br>Салюты, фейерверки, петарды</a>
                </div>
                <div class="clear"></div>
                -->
                <div class="reklama">
                    <!--noindex-->
                    <a href="https://poolstroi.ru" target="_blank" rel="nofollow"><img alt="" src="images/stac_mal.jpg"><br>Оборудование для стационарных бассейнов</a>
                    <!--/noindex-->
                </div>
                <div class="clear"></div>
                <!--
                <div class="reklama">
                    <a href="http://yanato.ru" target="_blank"><img src="images/yanato.jpg" alt="Автосервис и запчасти в Одинцово"><br>Автосервис и запчасти в Одинцово</a>
                </div>
                -->
                <br>
            </div><?php
            /*
            <a href="http://www.yandex.ru/redir?dtype=stred&pid=47&cid=1248&url=http://market.yandex.ru/grade-shop.xml?shop_id=4755"><img src="http://img.yandex.ru/market/informer1.png" border="0 alt="Оцените качество магазина   intex-online.ru  на Яндекс.Маркете."><img width="1" height="1" src="http://www.yandex.ru/redir?dtype=stred&pid=47&cid=1248&url=http://img.yandex.ru/i/pix.gif" alt="" border="0"></a>
            */
            if (!$s || ($s == "assortment")) {?>
                <div class="clear10"></div>
                <?=$mq?>
                <div class="clear10"></div>
            <?php
            }
            if ($s!='' && $s !="categories") {
            ?>
                <div class="clear10"></div>
                <div class="seotext">
                    <div style="margin:0 30px;"><?=$mq?></div>
                </div>
                <div class="clear10"></div>
            <?php
            }
            ?>
            <div class="clear10"></div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".various").fancybox({
                        maxWidth	: 800,
                        maxHeight	: 600,
                        fitToView	: false,
                        width		: '70%',
                        height		: '70%',
                        autoSize	: false,
                        closeClick	: false,
                        openEffect	: 'none',
                        closeEffect	: 'none'
                    });
                    $(".gallery2").fancybox();
                });
                
                function prnWindow (_url, _name, _width, _height) {
                    nw = window.open(_url, _name, 'toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no, width=' + _width + ', height=' + _height + '');
                    nw.print();
                    return false;
                }
                
                $('#go-to-top').click(function(){
                    $('html, body').animate({scrollTop: "0px"}, 200);
                    return false;
                });
                
                $(window).scroll(function() {
                    if ($(window).scrollTop() > 2200) {
                         $('#go-to-top').addClass("fixed-top-lnk");
                    }
                    else {
                        $('#go-to-top').removeClass("fixed-top-lnk");
                    }
                });
                
                $('.filter-from-ajax').change(function() {
                    $.ajax({
                        url: '/?s=categories&a=search-ajax&ftype=' + $('#ajax-from-filter-js').find('select[name=ftype]').val() + '&fshape=' + $('#ajax-from-filter-js').find('select[name=fshape]').val()
                    }).done(function(data){
                        var selectJq = $('#ajax-from-filter-js').find('select[name=fsize]').first();
                        selectJq.html(data);
                        if (selectJq.data('set')) {
                            selectJq.val(selectJq.data('set'));
                            selectJq.removeAttr('data-set');
                            selectJq.removeData('set');
                        }
                    });
                });
                
                $("ul.thumbs > li").each(function(){
                    var img = $(this).find("img"); var src = img.attr("src");
                    $(this).html('<a href="'+src+'" rel="group"><img src="'+src+'" border="0"></a>');
                });
                
                $("ul.thumbs > li a").fancybox({
                    'cyclic': true,
                    'showNavArrows': true
                });
                
                <?php // if (!empty($_REQUEST['a']) && $_REQUEST['a'] == 'search') {?>
                $('#ajax-from-filter-js').find('select[name=ftype]').trigger('change');
                <?php // }
            ?>
            </script>    
            <div class="sitefooter">
                <div class="copyright">
                    2010-<?=date("Y")?> &copy; Все права защищены<br>
                    <!--noindex-->
                    <a title="Блог про бассейны" href="https://pool-blog.ru/" target="_blank" rel="nofollow">Блог про бассейны</a>
                    <!--/noindex-->
                </div>
                <div class="copyright"><br></div>
            </div>
            <script type="text/javascript">changePhone()</script>
            <div class="counter">
                <div class="incounter">
                    <div style="float:left;width: 40px;">
                        <!--LiveInternet counter-->
                        <script type="text/javascript"><!--
                        document.write('<a href="//www.liveinternet.ru/click" '+
                        'target=_blank><img src="//counter.yadro.ru/hit?t39.11;r'+
                        escape(document.referrer)+((typeof(screen)=='undefined')?'':
                        ';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
                        screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
                        ';'+Math.random()+
                        '" alt="" title="LiveInternet" '+
                        'border=0 width=31 height=31><\/a>')//-->
                        </script>
                        <!--/LiveInternet-->
                    </div>
                    <div style="float:left;width: 100px;"><?php
                    if (!ShopRegion::isSpb()) {
                    ?>
                            <!-- Yandex.Metrika informer -->
                            <a href="https://metrika.yandex.ru/stat/?id=47330&amp;from=informer"
                            target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/47330/2_1_FFFFFFFF_EFEFEFFF_0_uniques"
                            style="width:80px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (уникальные посетители)" class="ym-advanced-informer" data-cid="47330" data-lang="ru" /></a>
                            <!-- /Yandex.Metrika informer -->

                            <!-- Yandex.Metrika counter -->
                            <script type="text/javascript" >
                                (function (d, w, c) {
                                    (w[c] = w[c] || []).push(function() {
                                        try {
                                            w.yaCounter47330 = new Ya.Metrika({
                                                id:47330,
                                                clickmap:true,
                                                trackLinks:true,
                                                accurateTrackBounce:true,
                                                ecommerce:"dataLayer"
                                            });
                                        } catch(e) { }
                                    });

                                    var n = d.getElementsByTagName("script")[0],
                                        s = d.createElement("script"),
                                        f = function () { n.parentNode.insertBefore(s, n); };
                                    s.type = "text/javascript";
                                    s.async = true;
                                    s.src = "https://mc.yandex.ru/metrika/watch.js";

                                    if (w.opera == "[object Opera]") {
                                        d.addEventListener("DOMContentLoaded", f, false);
                                    } else { f(); }
                                })(document, window, "yandex_metrika_callbacks");
                                jQuery(document).on('yacounter47330inited', function () {
                                    <?php if (isset($YA_ECOMMERCE)) { ?>
                                    window.dataLayer.push(<?php echo $YA_ECOMMERCE?>);
                                    <?php } ?>
                                });
                            </script>
                            <noscript><div><img src="https://mc.yandex.ru/watch/47330" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                            <!-- /Yandex.Metrika counter -->
                    <?php
                    }
                    else { ?>
                            <!-- Yandex.Metrika informer -->
                            <a href="https://metrika.yandex.ru/stat/?id=32855295&from=informer" target="_blank" rel="nofollow"><img src="//informer.yandex.ru/informer/32855295/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:32855295,lang:'ru'});return false}catch(e){}"/></a>
                            <!-- /Yandex.Metrika informer -->
                            <!-- Yandex.Metrika counter -->
                            <script type="text/javascript">
                                (function (d, w, c) {
                                    (w[c] = w[c] || []).push(function() {
                                        try {
                                            w.yaCounter32855295 = new Ya.Metrika({id:32855295,
                                                webvisor:true,
                                                clickmap:true,
                                                trackLinks:true,
                                                accurateTrackBounce:true,
                                            });
                                        } catch(e) { }
                                    });
                                    var n = d.getElementsByTagName("script")[0],
                                        s = d.createElement("script"),
                                        f = function () { n.parentNode.insertBefore(s, n); };
                                    s.type = "text/javascript";
                                    s.async = true;
                                    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
                                    if (w.opera == "[object Opera]") {
                                        d.addEventListener("DOMContentLoaded", f, false);
                                    } else { f(); }
                                })(document, window, "yandex_metrika_callbacks");
                            </script>
                            <noscript><div><img src="//mc.yandex.ru/watch/32855295" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                            <!-- /Yandex.Metrika counter -->
                    <?php
                    }
                    ?>
                    </div>
                    <?php if (isset($GLOBAL_YA_TARGETS)) echo $GLOBAL_YA_TARGETS;
                    /*
                    <div style="float:left;width: 100px;">
                        <a href="http://top100.rambler.ru/home?id=1996014" target="_blank"><img src="http://top100-images.rambler.ru/top100/banner-88x31-rambler-blue3.gif" alt="Rambler's Top100" width="88" height="31" border="0" ></a>
                    </div>
                    */
                    ?>
                    <div style="float:left;width: 100px;">
                        <!--Rating@Mail.ru counter-->
                        <script language="javascript" type="text/javascript"><!--
                            d=document;var a='';a+=';r='+escape(d.referrer);js=10;//--></script>
                        <script language="javascript1.1" type="text/javascript"><!--
                            a+=';j='+navigator.javaEnabled();js=11;//--></script>
                        <script language="javascript1.2" type="text/javascript"><!--
                            s=screen;a+=';s='+s.width+'*'+s.height;
                            a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth);js=12;//--></script>
                        <script language="javascript1.3" type="text/javascript"><!--
                            js=13;//--></script>
                        <script language="javascript" type="text/javascript"><!--
                            d.write('<a href="//top.mail.ru/jump?from=1788697" target="_top">'+
                                '<img src="//cdn.intex-online.ru/img/mail.ru.counter.gif" alt="Рейтинг@Mail.ru" border="0" '+
                                'height="40" width="88"><\/a>');if(11<js)d.write('<'+'!-- ');//-->
                        </script>
                        <noscript><a target="_top" href="//top.mail.ru/jump?from=1788697">
                                <img src="//cdn.intex-online.ru/img/mail.ru.counter.gif"
                                     height="40" width="88" border="0" alt="Рейтинг@Mail.ru"></a></noscript>
                        <script language="javascript" type="text/javascript"><!--
                            if(11<js)d.write('--'+'>');//--></script>
                        <!--// Rating@Mail.ru counter-->
                    </div>
                    <?php
                    /*
                    <div style="float:left;width: 100px;">
                    <a href='http://torg.mail.ru/?prtnr=1&amp;pid=8103&amp;click=1'><img height='31' border='0' width='88' alt='Товары@Mail.ru' src='http://upload.torg.mail.ru/prtnr/?pid=8103'></a>
                    </div>
                    */
                    ?>
                </div>
            </div>  
            <div class="info-footer">
            <p>Данный ресурс является информационным, предназначенным исключительно для ознакомления и не является договором публичной оферты.</p>
            </div>
        </div>
        <?php
        /*
        <div class="liveTexButton_83861"></div>
        <div class="liveTexButton_30389"></div>
        <script type="text/javascript">
            var liveTex = true,
                liveTexID = 38639,
                liveTex_object = true;
            (function() {
                var lt = document.createElement('script');
                lt.type ='text/javascript';
                lt.async = true;
                lt.src = 'http://cs15.livetex.ru/js/client.js';
                var sc = document.getElementsByTagName('script')[0];
                sc.parentNode.insertBefore(lt, sc);
            })();
        </script>
        */
        ?>
        <!-- <script async src="https://cdn.onthe.io/io.js/oeMqmMQDlF8w"></script> -->
        <!-- BEGIN CLICKTEX CODE {literal} -->
        <script type="text/javascript" charset="utf-8" async="async" src="//www.clicktex.ru/code/17468"></script>
        <!-- {/literal} END CLICKTEX CODE -->
        <?php if (UserDB::isAuth() && !UserDB::isEditOrder() && UserDB::getAuthId() == 1) {?>
        <a href="#test" class="notice-frontend-fancybox"></a>
        <script type="text/javascript" src="//cdn.intex-online.ru/sys/js/NotificationFrontend.js"></script>
        <?php
        }
        ?>
        <script type="text/javascript" src="//cdn.intex-online.ru/js/uis.js"></script>
    </body>
</html>
