;/*
jbCallMe v0.2 2014
by Jet Bit - http://JetBit.ru

For more information, visit:
http://jetbit.ru/market/jbcallme
*/
(function ($, window, document, undefined) {
    var pluginName = 'jbcallme',
        defaults = {
            no_name: false,
            no_tel: false,
            no_submit: false,
            title: '\u041e\u0431\u0440\u0430\u0442\u043d\u044b\u0439 \u0437\u0432\u043e\u043d\u043e\u043a',
            action_url: '/postmaster.php',
            success: '\u0421\u043e\u043e\u0431\u0449\u0435\u043d\u0438\u0435 \u043e\u0442\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u043e',
            fail: '\u0421\u043e\u043e\u0431\u0449\u0435\u043d\u0438\u0435 \u043d\u0435 \u043e\u0442\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u043e',
            fields: {},
            postfix: "default"
        };

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options);

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype.init = function () {

        return this.build();
    };
    Plugin.prototype.build = function () {
        function merge(obj1,obj2){
            var obj3 = {};
            for (var key in obj1) { obj3[key] = obj1[key]; }
            for (var key in obj2) { obj3[key] = obj2[key]; }
            return obj3;
        }
        var _this = this;
        if (!$("#jbCallme_overlay").length) {
            $('<div id="jbCallme_overlay" class="jbCallme_overlay"></div>').appendTo($("body"));
        }
        if (!$("#jbCallme_" + this.options.postfix).length) {
            $('<div id="jbCallme_' + this.options.postfix + '" class="jbCallme"><div class="jb_title">' + this.options.title + '</div><a title="\u0417\u0430\u043a\u0440\u044b\u0442\u044c" class="jb_close">\u0417\u0430\u043a\u0440\u044b\u0442\u044c</a><form class="jb_form"></form>' +
                '<div class="jb_success">' + this.options.success + '<p class="order-success-msg"><br><br>Вашему заказу присвоен номер: <b>№<span class="order-id"></span></b></p></div><div class="jb_progress"></div><div class="jb_fail">' + this.options.fail + '</div></div>').appendTo($("body"));

            this.$success = $('.jb_success').hide();
            this.$fail = $('.jb_fail').hide();
            this.$progress = $('.jb_progress').hide();
            this.$overlay = $('#jbCallme_overlay');
            this.$overlay = $('#jbCallme_overlay');
            this.$container = $("#jbCallme_" + this.options.postfix);
            this.$container.append($('<a/>').html('\u00a9 \u006a\u0062\u0043\u0061\u006c\u006c\u004d\u0065').attr('\u0068\u0072\u0065\u0066','\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u006a\u0062\u0063\u0061\u006c\u006c\u006d\u0065\u002e\u0072\u0075\u002f\u0064\u0065\u006d\u006f\u002f\u006f\u0062\u0072\u0061\u0074\u006e\u0079\u006a\u002d\u007a\u0076\u006f\u006e\u006f\u006b').attr('\u0074\u0061\u0072\u0067\u0065\u0074','\u005f\u0062\u006c\u0061\u006e\u006b').addClass("jb_dev"));
            this.$form = this.$container.find(".jb_form");
            var options = {};
            if (!this.options.no_name) {
                options.name = {
                    required: true,
                    placeholder: "\u0412\u0430\u0448\u0435 \u0438\u043c\u044f",
                    type: "text"
                }
            }
            if (!this.options.no_tel) {
                options.tel = {
                    required: true,
                    placeholder: "\u041d\u043e\u043c\u0435\u0440 \u0442\u0435\u043b\u0435\u0444\u043e\u043d\u0430",
                    type: "text"
                }
            }
            this.options.fields = merge(options, this.options.fields);
            if (!this.options.no_submit) {
                this.options.fields.submit = {
                    value: "Отправить заказ",
                    type: 'submit'
                }
            }
            if (!this.options.fields.action) {
                this.options.fields.action = {
                    value: "callme",
                    type: 'hidden'
                }
            }

            _this.$form.append('<div class="fail-message-form">'+this.options.fail+'</div>');

            $.each(this.options.fields, function (index, value) {
                var form_input = '';
                if (value.type && value.type == 'textarea') {
                    form_input = '<label>'+(value.placeholder ?value.placeholder +':<br/>':'')+'<textarea ' +
                        (value.required ? 'required="required" ' : '') +

                        (value.placeholder ? 'placeholder="' + value.placeholder + '" ' : '') +
                        'name="' + index + '">'+(value.value ? 'value="' + value.value + '" ' : '')+'</textarea></label>' +

                        '<p><input type="hidden" name="chat_id" value="'+$("#uis-code-cache").val()+'"><input id="sign_on" type="checkbox" checked="checked" required="required" name="sign" value="1"> Соглашаюсь и принимаю условия <a style="color: #000" href="/?s=terms" target="_blank">пользовательского соглашения</a> и даю согласие на обработку моих '+
                    'персональных данных на условиях и для целей, определенных в <a style="color: #000" href="/?s=terms-pd" target="_blank">политике в области обработки и защиты персональных данных</a>'+
                    '</p>' +

                        '<p><i class="jbcall-info-label" style="font-size: 12px">- После отправки заказа, Мы свяжемся с Вами в ближайшее время</i></p>';
                } else if (value.type && value.type == 'select') {
                    form_input = '<select ' +

                        'name="' + index + '">';
                        form_input += value.placeholder ? '<option disabled="disabled">'+value.placeholder+'</option>' : '';
                        for (var i = 0; i < value.options.length; i++) {
                            form_input += '<option value="'+value.indexes[i]+'">'+value.options[i]+'</option>';
                        }
                        
                    form_input += '</select>';
                } else {
                    form_input = '<label>'+(value.placeholder ?value.placeholder +':<br/>':'')+'<input ' +
                        (value.required ? 'required="required" ' : '') +
                        (value.placeholder ? 'placeholder="' + value.placeholder + '" ' : '') +

                        (value.value ? 'value="' + value.value + '" ' : '') +
                        'type="' + (value.type && jQuery.inArray(value.type, ["submit", "hidden", "text", "email", "date", "color"]) >= 0 ? value.type : 'text') + '" name="' + index + '" /></label>';
                }

                $((value.type != 'hidden' ? '<div class="jb_input">' +
                        (value.label ? '<label>' + value.label + '</label>' : '') : '') +
                    form_input +
                    (value.type != 'hidden' ? '</div>' : '')).appendTo(_this.$form);

                if (index == 'name') {
                    $('<div class="jb_input"><label>Ваш телефон:<br/>'+
                        '+7 (<input type="text" required="required" class="field tel1" placeholder="900" style="width: 40px;margin:0;" maxlength="3" name="tel1">)&nbsp;-&nbsp;'+
                        '<input type="text" required="required" placeholder="0000000" class="field tel2" style="width: auto;margin:0;" maxlength="7" name="tel2">' +
                        '</label></div>').appendTo(_this.$form);
                }
            });



            this.$container.hide().find(".jb_close").on('click', function () {
                _this.end();
                return false;
            });
            this.$overlay.hide();
//            .on('click', function () {
//                _this.end();
//                return false;
//            });
            this.$form.on('submit', function () {
                _this.submit();
                return false;
            });

            var tel1 = this.$form.find('.tel1').first();
            var tel2 = this.$form.find('.tel2').first();
            tel1.keyup(function(){
                var v = this.value;
                if (/\D+/g.test(v)) {
                    $(this).val(v.replace(/\D+/g, ''));
                    return;
                }
                if (/^(7|8)/.test(v)) {
                    $(this).val(v.replace(/^(7|8)/, ''));
                }

                if (v.length >=3 ) {
                    tel2.trigger("focus");
                }
            });

            tel2.keyup(function(){
                var v = this.value
                if (v.length == 0 ) {
                    tel1.trigger("focus");
                }
                if (/\D+/g.test(v)) {
                    $(this).val(v.replace(/\D+/g, ''));
                    return;
                }
            });

        }
        $(_this.element).on('click', function () {
            _this.show();
            return false;
        });
    };
    Plugin.prototype.submit = function () {
        var _this = this;
        _this.$container.find('.jb_progress').show();
        _this.$container = $("#jbCallme_" + this.options.postfix);
        _this.$container.find('form').hide();
        _this.$container.find('.fail-message-form').hide();
        if (this.options.postfix == 'default') {
            send_combo('callback_send_call_form','call_form');
        }      
        else if (this.options.postfix == 'bbc') {
            send_combo('callback_send_1click_form','buy_1click');
        }  
        $.ajax({
            type: "POST",
            url: this.options.action_url,
            data: this.$form.serialize(),
            success: function(data) {
                _this.$container.find('.jb_progress').hide();
                var json = $.parseJSON(data);

                if (json.code == '200') {
                    var success = _this.$container.find('.jb_success');
                    success.show();
                    if (json.order) {
                        success.find('.order-id').html(json.order);
                        success.find('.order-success-msg').show();
                    }
                    else {
                        success.find('.order-success-msg').hide();
                    }
                } else {
                    _this.$container.find('form').show();
                    _this.$container.find('.fail-message-form').show();
                    _this.$container.find('.jb_fail').hide();
                }
            },
            error: function(){
                _this.$container.find('.jb_progress').hide();
                _this.$container.find('.jb_fail').show();
            }
        });
//        setTimeout(function () {
//            _this.end()
//        }, 3000);
        return false;
    };
    Plugin.prototype.end = function () {
        this.$overlay = $('#jbCallme_overlay').fadeOut();
        this.$container = $(".jbCallme").fadeOut();
        $('#jbCallme_' + this.options.postfix).find('form')[0].reset();
        $('.jbCallme .jb_success, .jbCallme .jb_fail').hide();
        $('.jbCallme form').show();
        $('.jbCallme .fail-message-form').hide();

    };
    Plugin.prototype.show = function () {
        console.log(this.options.postfix);
        if (this.options.postfix == 'default') {
            send_combo('callback_call_btn_click',0);
        }
        else if (this.options.postfix == 'bbc') {
            send_combo('callback_buy_1click_btn',0);
        }
        this.$other = $('.jbCallme:not(#jbCallme_' + this.options.postfix + ')').hide();
        this.$overlay = $('#jbCallme_overlay').fadeIn();
        $('#jbCallme_' + this.options.postfix).find('form')[0].reset();
        element = $(this.element);
        $("#jbCallme_" + this.options.postfix).find('input,textarea').each(function(){
            if(element.data($(this).attr('name'))){
                $(this).val(element.data($(this).attr('name')));
            }
        });
        $('.jbCallme .fail-message-form').hide();
        this.$container = $("#jbCallme_" + this.options.postfix).show();
    };
    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                    new Plugin(this, options));
            }

        });
    }

})(jQuery, window, document);
