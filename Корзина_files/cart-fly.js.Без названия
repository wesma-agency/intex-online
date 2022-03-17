
function cart_conservation_add(id, shopid){
  shopid = 3;	
  var am = $("#amount-"+id).val();
	
	var typeBas = $('#cart_conservation_form_bas_volume').val();
  
	var am804 = 1;
	var coservItemId = 1421;
	
	if (typeBas == 2) {
		am804 = 2;
		coservItemId = 1422;
	}
	else if (typeBas == 3) {
		am804 = 3;
		coservItemId = 1423;
	}
	
	am804 = am804 * am;
	
	$.ajax({
		url: "index.php?cart_action=1&shop="+shopid+"&assortment=804&amount="+am804,
		success: function() {
				$.ajax({
					url: "index.php?cart_action=1&shop="+shopid+"&assortment="+coservItemId+"&amount="+am,
					success: function(data){
									$("#cart-left-div").fadeOut(500, function(){$("#cart-left-div").html(data);});
									$("#cart-left-div").fadeIn(1000);
									cart_to_fly(id);
							}
				});
		}});

}

function cart_conservation_add_form(id, obj, shopid) {
	var forma, pos, offsets;
        
	shopid = 3;
	
	forma = "<div id='helper-"+id+"' class='cart_amounter'><a class='close_btn' href='javascript:void(0);' onclick='cart_close_helper(this);'>[x]</a><label for='amount-"+id+"'>Количество:</label><div class=\"buttons\"><a href='javascript:void(0);' class='minus' onclick=\"cart_amount_val('"+id+"', 0);\">&nbsp;</a> <input type='text' value='1' name='amount-"+id+"' id='amount-"+id+"' size='2' /> <a href=\"javascript:void(0); onclick=cart_amount_val(\'"+id+"\', 1);\" class='plus'>&nbsp;</a><input type='button' class='add_btn' value='OK' onclick=\"cart_conservation_add('"+id+"', '"+shopid+"');\" /></div></div>";
	
    $('#helper-'+id).remove();
	$('body').append(forma);

	var caf = $('#helper-'+id);
    var newp;
	newp = getCenterPos(caf, obj);
//	fadeIn(1000)
	caf.css({'top':newp.y+'px','left':newp.x+'px'}).show();
}


function cart_add(id, shopid, self){
  if (!shopid) shopid = 1;

  var jsId = ""+id;
  if (typeof self !== 'undefined' && $(self).data('id')) {

      jsId = ""+$(self).attr('data-id');
  }



  var am = $("#amount-"+jsId).val();
  
  id = encodeURIComponent(id);
	
	$.ajax({
		url: "/index.php?cart_action=1&shop="+shopid+"&assortment="+id+"&amount="+am,
		success: function(data){
            $("#cart-left-div").fadeOut(500, function(){$("#cart-left-div").html(data);});
            $("#cart-left-div").fadeIn(1000);
            cart_to_fly(jsId);
        }
	});

}

function cart_to_fly(id) {
    send_combo('callback_add_to_basket','add_to_basket');
    var helper = $("#helper-"+id);
    var leftcart = $("#cart-left-div");
    var flyto = getCenterPos(helper, leftcart);
    helper.animate({top: flyto.y, left: flyto.x}, 700).fadeOut(600, function(){helper.remove();});
}

function cart_add_rnp(id, obj, shopid) {
    if (!confirm("Наложенный платеж доступен только для клиентов из регионов.\nПродолжить оформление заказа?")) {
        return false;
    }

    if (!shopid) shopid = 1;
    id = encodeURIComponent(id);

    var obj = $(obj);

    if (obj.hasClass('process')) {
        return false;
    }

    obj.addClass('process')

    var am = 1;
    $.ajax({
        url: "/index.php?cart_action=1&shop=" + shopid + "&assortment=" + id + "&amount=" + am,
        success: function() {
            location.href = '/?s=order&r=9'
        }
    });
}

function cart_add_credit(id, obj, shopid) {
    send_combo('callback_buy_credit_btn',0);
    if (!shopid) shopid = 1;
    id = encodeURIComponent(id);

    var obj = $(obj);

    if (obj.hasClass('process')) {
        return false;
    }

    obj.addClass('process')

    var am = 1;
    $.ajax({
        url: "/index.php?cart_action=1&shop=" + shopid + "&assortment=" + id + "&amount=" + am,
        success: function() {
            location.href = '/?s=order'
        }
    });
}

function cart_add_form(id, obj, shopid) {
           
	var forma, pos, offsets, jsId;
        
           if (!shopid) shopid = 1;
           
           if (shopid == 1) {
               jsId = id.replace(/\W/g, "");
           }
           else {
               jsId = id;
           }
           
	
	forma = "<div id='helper-"+jsId+"' class='cart_amounter'><a class='close_btn' href='javascript:void(0);' onclick='cart_close_helper(this);'>[x]</a><label for='amount-"+jsId+"'>Количество:</label><div class=\"buttons\"><a href='javascript:void(0);' class='minus' onclick=\"cart_amount_val('"+jsId+"', 0);\">&nbsp;</a> <input type='text' value='1' name='amount-"+jsId+"' id='amount-"+jsId+"' size='2' /> <a href=\"javascript:void(0); onclick=cart_amount_val(\'"+jsId+"\', 1);\" class='plus'>&nbsp;</a><input type='button' class='add_btn' value='OK' data-id='"+jsId+"' onclick=\"cart_add('"+id+"', '"+shopid+"', this);\" /></div></div>";
	
    $('#helper-'+id).remove();
	$('body').append(forma);

	var caf = $('#helper-'+jsId);
    var newp;
	newp = getCenterPos(caf, obj);
//	fadeIn(1000)
	caf.css({'top':newp.y+'px','left':newp.x+'px'}).show();
}

function cart_close_helper(obj) {   
//	fadeOut(1000);
	$(obj).parent().hide();  }

function cart_amount_val(id,pm){

    var pre = $("#amount-"+id).val();
    var val = (pm == 1) ? pre-(-1) : (pre > 0) ? pre-1 : pre;
    $("#amount-"+id).val(val);

}

function cart_flush(shopid){
            if (!shopid) shopid = 1;

	$.ajax({
		url: "index.php?cart_action=3&shop="+shopid,
		success: function(data){ $("#cart-left-div").fadeOut(1000, function(){$("#cart-left-div").html(data)});$("#cart-left-div").fadeIn(1000);}
	});

}

function prod_del(pid, shopid){
           if (!shopid) shopid = 1;
	$.ajax({
		url: "index.php?cart_action=2&shop="+shopid+"&assortment="+pid,
		success: function(data){
            $("#cart-left-div #cart-li-"+pid).fadeOut(800, function(){$("#cart-left-div").html(data);});
            $("#cart-left-div").fadeIn(800);
        }
	});
}



// вспомогательные функции
function getPosition(elem){
  var el = $(elem).get(0);
	var p = {x: el.offsetLeft, y: el.offsetTop};
	while (el.offsetParent){
		el = el.offsetParent;
		p.x += el.offsetLeft;
		p.y += el.offsetTop;
		if (el != document.body && el != document.documentElement){
			p.x -= el.scrollLeft;
			p.y -= el.scrollTop;
		}
	}
	return p;
}

function getCenterPos(elA,elB){
  posB = new Object();
  cntPos = new Object();
  posB = getPosition(elB);
  var correct;
  cntPos.y = Math.round(($(elB).outerHeight()-$(elA).outerHeight())/2)+posB.y;
  cntPos.x = Math.round(($(elB).outerWidth()-$(elA).outerWidth())/2)+posB.x;
  if(cntPos.x+$(elA).outerWidth()>$(window).width()){
    cntPos.x = Math.round($(window).width()-$(elA).outerWidth())-2;
  }
  if(cntPos.x<0){
    cntPos.x = 2;
  }
  return cntPos;
}

function getOffset(elem) {
    if (elem.getBoundingClientRect) {
        // "правильный" вариант
        return getOffsetRect(elem);
    } else {
        // пусть работает хоть как-то
        return getOffsetSum(elem);
    }
}

function getOffsetSum(elem) {
    var top=0, left=0;
    while(elem) {
        top = top + parseInt(elem.offsetTop);
        left = left + parseInt(elem.offsetLeft);
        elem = elem.offsetParent;
    }

    return {top: top, left: left}
}

function getOffsetRect(elem) {
    // (1)
    var box = elem.getBoundingClientRect();

    // (2)
    var body = document.body;
    var docElem = document.documentElement;

    // (3)
    var scrollTop = window.pageYOffset || docElem.scrollTop || body.scrollTop;
    var scrollLeft = window.pageXOffset || docElem.scrollLeft || body.scrollLeft;

    // (4) 
    var clientTop = docElem.clientTop || body.clientTop || 0;
    var clientLeft = docElem.clientLeft || body.clientLeft || 0;

    // (5)
    var top  = box.top +  scrollTop - clientTop;
    var left = box.left + scrollLeft - clientLeft;

    return { top: Math.round(top), left: Math.round(left) }
}
