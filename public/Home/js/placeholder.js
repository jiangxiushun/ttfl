/*
        ��IE ֧��placeholder ����  I ��Ч!!!!
        ����IE������placeholder�ķ���������1��Ȼ����������ʾplaceholder�Ļ�ɫ��ʾ���֣�
        �������̨���ݲ�����ʱ�򣬿��ܻ��placeholder����ʾ����Ҳ�ύ����̨,�˴�ע��
*/
/*����1*/
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
/*����2*/
var JPlaceHolder = {
    //���
    _check : function(){
        return 'placeholder' in document.createElement('input');
    },
    //��ʼ��
    init : function(){
        if(!this._check()){
            this.fix();
        }
    },
    //�޸�
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
