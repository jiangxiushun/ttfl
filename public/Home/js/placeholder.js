/*
        让IE 支持placeholder 属性  I 无效!!!!
        关于IE不兼容placeholder的方法，方法1虽然可以做到显示placeholder的灰色提示文字，
        但是向后台传递参数的时候，可能会把placeholder的提示文字也提交给后台,此处注释
*/
/*方法1*/
    /*$(document).ready(function(){
        var doc=document,
            inputs=doc.getElementsByTagName('input'),
            supportPlaceholder='placeholder'in doc.createElement('input'),

            placeholder=function(input){
                var text=input.getAttribute('placeholder'),
                    defaultValue=input.defaultValue;
                if(defaultValue==''){
                    input.value=text
                }
                input.onfocus=function(){
                    if(input.value===text)
                    {
                        this.value=''
                    }
                };
                input.onblur=function(){
                    if(input.value===''){
                        this.value=text
                    }
                }
            };

        if(!supportPlaceholder){
            for(var i=0,len=inputs.length;i<len;i++){
                var input=inputs[i],
                    text=input.getAttribute('placeholder');
                if(input.type==='text'&&text){
                    placeholder(input)
                }
            }
        }
    });*/
/*方法2*/
var JPlaceHolder = {
    //检测
    _check : function(){
        return 'placeholder' in document.createElement('input');
    },
    //初始化
    init : function(){
        if(!this._check()){
            this.fix();
        }
    },
    //修复
    fix : function(){
        jQuery(':input[placeholder]').each(function(index, element) {
            var self = $(this), txt = self.attr('placeholder');
            self.wrap($('<div></div>').css({position:'relative', zoom:'1', border:'none', background:'none', padding:'none', margin:'none'}));
            var pos = self.position(), h = self.outerHeight(true), paddingleft = self.css('padding-left');
            var holder = $('<span></span>').text(txt).css({position:'absolute', left:pos.left, top:pos.top, height:h, lineHeight:h+'px', paddingLeft:paddingleft, color:'#aaa'}).appendTo(self.parent());
            self.focusin(function(e) {
                holder.hide();
            }).focusout(function(e) {
                if(!self.val()){
                    holder.show();
                }
            });
            holder.click(function(e) {
                holder.hide();
                self.focus();
            });
        });
    }
};
jQuery(function(){
    JPlaceHolder.init();
});
