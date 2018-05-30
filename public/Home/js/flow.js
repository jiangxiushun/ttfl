    var $quantity   = $(".quantity");
    var $increase   = $(".increase");
    var $decrease   = $(".decrease");
    var $delete     = $(".delete");
    var $gift       = $("#gift");
    var $promotion  = $("#promotion");
    var $effectiveRewardPoint = $("#effectiveRewardPoint");
    var $effectivePrice = $(".tot_pri em");
    var $clear      =   $("#clear");
    var $submit     =   $("#submit");
    var timeouts    =   {};
    var $allCheck   =   $(".all_check");
    var $choosen_em =   $('.choosen em');
    // 初始数量
    $quantity.each(function() {
        var $this = $(this);
        $this.data("value", $this.val());
        if($this.val() >= 200 ){
            $this.val(200);
        }
    });
    
    $(".quantity").change(function(){
        var $this = $(this);
        if($this.val() >= 200 ){
            $this.val(200);
        }
    })
    // 数量
    $quantity.keypress(function(event) {
        return (event.which >= 48 && event.which <= 57) || event.which == 8;
    });
    
    // 增加数量
    $increase.click(function() {
        var $quantity = $(this).siblings("input");
        var quantity = $quantity.val();
        if (/^\d*[1-9]\d*$/.test(quantity)) {
            if(quantity >= 200){
                $quantity.val(200);
            }else{
               $quantity.val(parseInt(quantity) + 1);
                $(this).siblings(".decrease").removeClass("err").addClass("act"); 
            }
            
        } else {
            $quantity.val(1);
            $(this).siblings(".decrease").addClass("act").removeClass("err");
        }
        edit($quantity);
    });
    
    // 减少数量
    $decrease.click(function() {
        var $quantity = $(this).siblings("input");
        var quantity = $quantity.val();
        if (/^\d*[1-9]\d*$/.test(quantity) && parseInt(quantity) > 1) {
            if(parseInt(quantity)==2){
                $(this).addClass("err").removeClass("act");
            }else{$(this).removeClass("err").addClass("act");}
            $quantity.val(parseInt(quantity) - 1);
        } else {
            $quantity.val(1);
            $(this).addClass("err").removeClass("act");
        }
        edit($quantity);
    });
    
    // 编辑数量
    $quantity.on("input propertychange change", function(event) {
        if (event.type != "propertychange" || event.originalEvent.propertyName == "value") {
            edit($(this));
        }
    });
    /*单选*/
    $("#shopping-trolley .aor_pros_cell_bg").find("label").on("click",function () {
        var isCheck= $(this).parent().find("input:checkbox").attr("checked");
        if(isCheck){
            $(this).parent().removeClass("check").find("input:checkbox").removeAttr("checked");
            $("label.all-check").parent().removeClass("check").find("input:checkbox").attr("checked", false);
        }else{
            $(this).parent().addClass("check").find("input:checkbox").attr("checked",true);
        }
        selectGoods();
    });
    /*全选*/
    $("#shopping-trolley").find("label.all-check").on("click",function () {
        if($(this).parent().find("input:checkbox").attr("checked")){
            $("label.all-check").parent().removeClass("check").find("input:checkbox").attr("checked", false);
            for(i=0;i<$(".aor_pros_cell_bg").length;i++){
                $(".aor_pros_cell_bg").eq(i).find(".wt1").removeClass("check").children("input:checkbox").attr("checked", false);
            }
        }
        else{
            $("label.all-check").parent().addClass("check").find("input:checkbox").attr("checked", true);
            for(var i=0;i<$(".aor_pros_cell_bg").length;i++){
                $(".aor_pros_cell_bg").eq(i).find(".wt1").addClass("check").children("input:checkbox").attr("checked", true);
            }
        }
        selectGoods();
    });
    //切换历史，推荐，猜你喜欢
    $(".tab-nav").find("li").bind("click", function () {
        $(".mod-fixed .tab-nav").find("li").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
        $(".mod-detail .tab-nav").find("li").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
        $(".i-line").stop().animate({left: $(".tab-nav li.cur").position().left}, 200);
        $(".tab-container").find(".tab-content").eq($(this).index()).fadeIn(200).addClass("act").siblings().hide().removeClass("act");
        $('html, body').stop().animate({'scrollTop': $(".mod-detail .tab-nav").offset().top - 20}, 300);
    }).hover(function () {
        $(this).parents(".tab-nav").find(".i-line").stop().animate({left: $(this).position().left}, 200);
    }, function () {
        $(this).parents(".tab-nav").find(".i-line").stop().animate({left: $(".tab-nav li.cur").position().left}, 200);
    });
    
    // 删除
    $delete.click(function() {
        var $this = $(this);
        layer.msg('您确定要删除吗？', {
          time: 0 //不自动关闭
          ,btn: ['确定', '取消']
          ,yes: function(index){
            layer.close(index);
            var $tr = $this.closest(".aor_pros_cell_bg");
            var id = $tr.find("input[name='id']").val();
            clearTimeout(timeouts[id]);
            $.ajax({
                url: "flow.php",
                type: "POST",
                data: {id: id,ajax:'1',step:'drop_goods'},
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    $submit.prop("disabled", true);
                },
                success: function(data) {
                    if (data.status == "1") {
                        if(data.goodDate.total.real_goods_count == 0){
                            location.reload(true);
                        }else{
                            $tr.fadeOut();
                            $choosen_em.text(data.goodDate.total.sel_goods_num);
                            $effectivePrice.text(data.goodDate.total['goods_price']); 
                        }
                    }else{
                        layer.msg(data.message); 
                    }
                },
                complete: function() {
                    $submit.prop("disabled", false);
                }
            });
            }
        });
    })
// 编辑数量
function edit($quantity) {
    var quantity = $quantity.val();
    if (/^\d*[1-9]\d*$/.test(quantity)) {
        var $tr = $quantity.closest(".aor_pros_cell_bg");
        var id = $tr.find("input[name='id']").val();
        clearTimeout(timeouts[id]);
        timeouts[id] = setTimeout(function() {
            $.ajax({
                url: "flow.php",
                type: "POST",
                data: {id: id, quantity: quantity,step:'update_cart',ajax:'1'},
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    layer.load(2);
                    $submit.prop("disabled", true);
                },
                success: function(data) {
                    if (data.status == "1") {
                        $quantity.data("value", quantity);
                        var date = data.goodDate.goods_list;
                        $.each(date,function(key,value){
                            if(id == value.rec_id){
                              $tr.find(".wt6").text('￥'+value.subtotal); 
                            }
                        })
                        $choosen_em.text(data.goodDate.total['sel_goods_num']);
                        $effectivePrice.text('￥'+data.goodDate.total['goods_price']); 
                    }else{
                        layer.msg(data.message);
                        if(data.status == "-2"){
                            $quantity.val(1);
                        }
                    }
                },
                complete: function() {
                    layer.closeAll('loading');
                    $submit.prop("disabled", false);
                }
            });
        }, 500);
    } else {
        $quantity.val($quantity.data("value"));
    }
}
//选择商品AJAX请求
function selectGoods(){
    var jsonDate  = {0:[],1:[]};
    $(".wt1 input").each(function(k,v){
        var recId    = parseFloat($(v).attr('recId'));
        if (!$(this).attr('checked')) {
            jsonDate[0].push(recId);
        } else {
            jsonDate[1].push(recId);
        };
    });
    $.ajax({
        url: "flow.php",
        type: "POST",
        data: {id: jsonDate,ajax:'1',step:'select_goods'},
        dataType: "json",
        cache: false,
        beforeSend: function() {
            layer.load(2);
        },
        success: function(data) {
            if (data.status == "1") {
                $choosen_em.text(data.goodDate.total.sel_goods_num);
                $effectivePrice.text('￥'+data.goodDate.total['goods_price']); 
            }else{
                layer.msg(data.message);
            }
        },
        complete: function() {
            layer.closeAll('loading');
        }
    });
}
/* *
 * 添加商品到收藏夹
 */
function collect(goodsId)
{
    var url = 'user.php?act=collect';
    $.ajax({
        url: url,
        type: "GET",
        data: {id : goodsId},
        dataType: "json",
        cache: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            layer.msg(result.message);
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
}
/* *
 * 多删功能
 */
function all_delete()
{
    var jsonDate  = [];
    $(".wt1 input").each(function(k,v){
        if ($(this).attr('checked') != undefined) {
            var recId    = parseFloat($(v).attr('recId'));
            jsonDate.push(recId);
        }
    });
    if(jsonDate.length == 0) {layer.msg('请选择商品'); return false;}
    layer.msg('您确定要删除吗？', {
      time: 0 //不自动关闭
      ,btn: ['确定', '取消']
      ,yes: function(index){
        layer.close(index);
        $.ajax({
            url: "flow.php",
            type: "POST",
            data: {goods: jsonDate,step:'new_drop_goods'},
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $submit.prop("disabled", true);
            },
            success: function(data) {
                if (data.status == "1") {
                    if(data.goodDate.total.total_goods_num == 0){
                        location.reload(true);
                    }else{
                        $(".wt1 input").each(function(k,v){
                            if ($(this).attr('checked') != undefined) {
                                $(this).parents('.pro_na_lis').remove();
                            }
                        });
                        $choosen_em.text(data.goodDate.total.sel_goods_num);
                        $effectivePrice.text(data.goodDate.total['goods_price']); 
                    }
                }else{
                    layer.msg(data.message);
                }
            },
            complete: function() {
                $submit.prop("disabled", false);
            }
        });
        }
    });
}
/* *
 * 多收藏功能
 */
function all_collect()
{
    var jsonDate  = [];
    $(".wt1 input").each(function(k,v){
        if ($(v).attr('checked') != undefined && $(v).attr('goods_id') != undefined) {
            var recId    = parseFloat($(v).attr('goods_id'));
            jsonDate.push(recId);
        }
    });
    if(jsonDate.length == 0) {layer.msg('请选择商品'); return false;}
    var url = 'user.php?act=new_collect';
    $.ajax({
        url: url,
        type: "POST",
        data: {goods : jsonDate},
        dataType: "json",
        cache: false,
        beforeSend: function() {
          layer.load(2);  
        },
        success: function(result) {
            layer.msg(result.message);
        },
        complete: function() {
           layer.closeAll('loading');
        }
    });
}