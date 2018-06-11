@extends('Home.common.common')
@section('content')
<div class="main">      
<div style="position:relative;top: 500px;left: 401px;width: 100%;height: 0px;">
	<a onmouseout="document.getElementById('baiduDiv').style.display='none'" onmouseover="document.getElementById('baiduDiv').style.display=''" style="color: red;">扫码关注全场5-8折优惠劵</a>
<div id="baiduDiv" style="display:none;">
<div style="position: absolute; left: 30px;top: 50px;">
<img src="http://images.51ttfl.com/static/web/images/erweima.png">
</div>
</div>
</div>
   
    <h2 class="aor_top_tit"><i></i>填写并核对订单信息</h2>
    <form id="orderForm" action="flow.php" method="post">
    <input type="hidden" name="step" value="done">
        <div class="acount_cons">
            <div class="cons_tabs">
                <div class="tabs_table tabs_table_th">
                    <div class="tabs_cell cl01">
                        商品清单
                        <span class="sp_pos"></span>
                    </div>
                    <div class="tabs_cell cl02">
                        单价
                    </div>
                    <div class="tabs_cell cl03">
                        已优惠
                    </div>
                    <div class="tabs_cell cl02">
                        数量
                    </div>
                    <div class="tabs_cell cl04">
                        金额小计
                    </div>
                    <div class="clear"></div>
                </div>
                    <div class="tabs_table tabs_table_td">
                        <div class="tabs_cell cl01">
                            <a href="" title="{{$data->gname}}" target="_blank">
                                <img src="http://images.51ttfl.com/images/201804/thumb_img/1534_thumb_G_1524614241462.jpg" alt="键鼠套装" class="p_img">
								<span class="ac_tit ac_tit2">键鼠套装[颜色:黑色]</span>
                                    <span class="ac_tit ac_tit2 rig_abso">使用您的兑换码后价格更优惠！</span>
                                                                
                            </a>
                        </div>
                        <div class="tabs_cell cl02 font_fim">
                            ￥69.00                        </div>
                        <div class="tabs_cell cl03 font_fim">
                            -
                        </div>
                        <div class="tabs_cell cl02 font_fim">
                            1                        </div>
                        <div class="tabs_cell cl04 font_fim">
                            ￥69.00                        </div>
                        <div class="clear"></div>
                    </div>
                                                <div class="tabs_table tabs_table_td tabs_table_td_bot">
                    <div class="tabs_cell cl01">
                    </div>
                    <div class="tabs_cell cl02" style="width: 0;">
                    </div>
                    <div class="tabs_cell cl03" style="width: 195px;">
                        商品合计（尚未计运费）:
                    </div>
                    <div class="tabs_cell cl02 font_fim">
                        1                    </div>
                    <div class="tabs_cell cl04 font_fim" data-price="69.00">￥69.00</div>
                    <div class="clear"></div>
                </div>

            </div>
                        <div class="cons_tabs cons_tabs2">
                <div class="tabs_table tabs_table_th">
                    <div class="tabs_cell cl01">
                        填写您的兑换码,即享专属渠道优惠！
                        <span class="sp_pos"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="acount_cdk">
                    <p class="disp" id="cdkeyName" style="display: none;">
                        <span class="tips_info"></span>
                    </p>
                    <p class="inp">
                        <input type="text" name="bonus_sn" id="cdkeyCode" maxlength="200">
                    </p>
                </div>
            </div>
                    
            <div class="cons_tabs cons_tabs2">
                <div class="tabs_table tabs_table_th">
                    <div class="tabs_cell cl01">
                        支付方式
                        <span class="sp_pos"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="acount_cdk">
                    <div class="choose_zf clearfix">
                                                    <label class="clearfix">
                                <input type="radio" name="payment" value="4">
                                <img src="http://images.51ttfl.com/static/images/payment/alipay_payment.png">
                            </label>
                                                    <label class="clearfix">
                                <input type="radio" name="payment" value="5">
                                <img src="http://images.51ttfl.com/static/images/payment/wxpay_payment.png">
                            </label>
                                                <span style="color: red;position: relative;top: 13px;left: -22px;">           	</span>
                    </div>
                </div>
            </div>
           
                        <div class="cons_tabs cons_tabs2">
                <div class="tabs_table tabs_table_th">
                    <div class="tabs_cell cl01">
                        订单附言:
                        <span class="sp_pos"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="acount_cdk">
                    <p class="disp" id="cdkeyName" style="display: none;">
                        <span class="tips_info"></span>
                    </p>
                    <p class="inp">
                        <input type="text" name="postscript" maxlength="200">
                    </p>
                </div>
            </div>
            
                        <div class="cons_tabs cons_tabs2">
                <div class="tabs_table tabs_table_th">
                    <div class="tabs_cell cl01">
                        选择收货地址<span style="color:#ff6700;font-size:12px">&nbsp;[注：新疆、西藏、内蒙、青海、甘肃、宁夏 偏远地区不包邮]</span>
                        <span class="sp_pos"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="add_lists_pro" id="receiver">
                    <ul>
                    <input type="hidden" name="address_id" id="address_id" value="">
                                            <li class="ad_lis">
                            <span class="add_new_layers"><i></i>添加新地址</span>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
                        
            <style type="text/css">
                .fubiyh{width:100%;height:40px;line-height: 40px;border-top:1px solid #E7E7E7;}
                .fubiyh p{width:270px;float:left;    font-size: 14px;font-weight: bold;}
                .switch{float:left;width:55px;height:25px;background: white;border:1px solid #E7E7E7;border-radius: 40px;margin-top:7px;cursor: pointer;}
                .switch>span{display: block;width:30px;height:25px;border-radius: 40px;box-shadow: 3px 0px 5px #e4e4e4;background: white;}

                .switch.on{background: orange;}
                .switch.on>span{float: right;background: white;}
            </style>
                        
            <div class="cons_tabs cons_tabs2">
                <div class="acount_prices">
                    <p>
                        <span class="le">1件商品总金额：</span>
                        <span class="ri">￥69.00</span>
                    </p>
                                                                                <p>
                        <span class="le">应付总额：</span>
                        <span class="ri amount">￥69.00</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="aorder_sum">
            <!--<span class="infos">温馨提示：现在付款，有机会获得精美小礼品哦~</span>-->
            <span class="tot_pri">实际支付金额：<em class="amount">69.00</em></span>
            <input type="submit" id="submit" class="sumits" value="去结算">
        </div>
    </form>
    <div class="layers_bgs " id="layers_bgs" style="display: none;"></div>
    <div class="pro_layers pro_layers_aco disn" id="pro_layers" style="top: 50%; margin-top: -195px; position: fixed;">
        <h1 class="tits">新增收货地址<a href="javascript:;" class="cancel"></a></h1>
        <form id="receiverForm" action="" method="post" novalidate="">
            <input type="hidden" name="act" value="act_edit_address">
            <input type="hidden" name="country" value="1">
            <input type="hidden" name="isAjax" value="1">
            <div class="layer_acoun_cons" id="newReceiver">
                <div class="cons_line">
                    <label>收&nbsp;&nbsp;货&nbsp;&nbsp;人:</label>
                    <input type="text" id="consignee" name="consignee" class="fieldError" maxlength="200" aria-required="true" aria-invalid="true">
                    <label id="consignee-error" class="fieldError" for="consignee"><i></i>必填</label>
                </div>
                <div class="cons_line form_pos">
                    <fieldset id="city_china_val">
                        <!--<legend>设置默认值及选项标题</legend>-->
                        <p>
                            <label for="">所在地区 :</label><span class="in_ri"></span>
                            <select name="province" class="province" data-first-title="选择省" onchange="getcity(this.value,2)">
                                <option value="">请选择</option>
                                                                    <option value="2">北京</option>
                                                                    <option value="3">安徽</option>
                                                                    <option value="4">福建</option>
                                                                    <option value="5">甘肃</option>
                                                                    <option value="6">广东</option>
                                                                    <option value="7">广西</option>
                                                                    <option value="8">贵州</option>
                                                                    <option value="9">海南</option>
                                                                    <option value="10">河北</option>
                                                                    <option value="11">河南</option>
                                                                    <option value="12">黑龙江</option>
                                                                    <option value="13">湖北</option>
                                                                    <option value="14">湖南</option>
                                                                    <option value="15">吉林</option>
                                                                    <option value="16">江苏</option>
                                                                    <option value="17">江西</option>
                                                                    <option value="18">辽宁</option>
                                                                    <option value="19">内蒙古</option>
                                                                    <option value="20">宁夏</option>
                                                                    <option value="21">青海</option>
                                                                    <option value="22">山东</option>
                                                                    <option value="23">山西</option>
                                                                    <option value="24">陕西</option>
                                                                    <option value="25">上海</option>
                                                                    <option value="26">四川</option>
                                                                    <option value="27">天津</option>
                                                                    <option value="28">西藏</option>
                                                                    <option value="29">新疆</option>
                                                                    <option value="30">云南</option>
                                                                    <option value="31">浙江</option>
                                                                    <option value="32">重庆</option>
                                                                    <option value="33">香港</option>
                                                                    <option value="34">澳门</option>
                                                                    <option value="35">台湾</option>
                                                            </select>
                            <select name="city" class="city" data-first-title="选择市" onchange="getarea(this.value,3)">
                                <option value="">请选择</option>
                            </select>
                            <select name="district" class="district" data-first-title="选择地区" onchange="getdistrict()">
                                <option value="">请选择</option>
                            </select>
                        </p>
                    </fieldset>
                    <label id="area-error" class="fieldError" for="consignee"><i></i>必填</label>
                </div>
                <div class="cons_line">
                    <label>详细地址 :</label><textarea name="address" maxlength="200" id="address" aria-required="true" class="fieldError"></textarea>
                    <label id="address-error" class="fieldError" for="address"><i></i>必填</label>
                </div>
                <div class="cons_line">
                    <label>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机 :</label>
                    <input type="text" id="phone" name="tel" maxlength="200" aria-required="true" class="fieldError">
                    <label id="phone-error" class="fieldError" for="phone"><i></i>格式有误</label>
                </div>
                <div class="cons_line">
                    <input type="checkbox" name="default" class="check" value="1" id="def_asd"><span>设为默认地址</span>
                </div>
                <div class="cons_line">
                    <label></label><a type="submit" id="newReceiverSubmit" class="ac_add_sum" href="javascript:;">保    存</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
        $('.sn_nav').css('display','none');
        $('.sn_nav').parent().parent().mouseover(function(){
        $('.sn_nav').css('display','list-item');
      }).mouseout(function(){
        $('.sn_nav').css('display','none');
      });
</script>
@endsection