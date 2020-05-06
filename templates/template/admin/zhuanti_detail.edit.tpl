<{include file='admin/header.tpl'}>
<script type="text/javascript">
    function ajaxSelectChange(id,tag,url){
        if(id<1)return false;
        var currentValue = $('.'+tag).attr('currentValue');
        $.post(
                url,
                {id:id,currentValue:currentValue},
                function(data){
                    if(data.str=='success'){
                        //$('.'+tag).append(data.data);
                        $('.'+tag).html(data.data);
                    }else{
                        alert(data.str);
                    }
                },
                'json'
        );
    }


</script>

<div id="div_1"></div>
<style>
    #div_1 {
        position:absolute;
        font-size:9pt;
        color:#4586b5;
        width:50px;
        text-align:right;
        display:none
    }
</style>
<script type="text/javascript">

    jQuery.fn.extend({
        showWordCount: function() {
            var _length = $(this).val().length;
            _left = $(this).offset().left;
            _top = $(this).offset().top;
            _width = $(this).width();
            _height = $(this).height();
            $('#div_1').html(_length );
            $('#div_1').css({
                'left':_left + _width - 60,
                'top':_top + _height -8
            });
        }
    });

    $('#add_title').live('change', function() {
        $(this).showWordCount();
    });

    $('#add_title').blur(function(){
        $('#div_1').fadeOut('slow');
    });
</script>

<script type="text/javascript" charset="utf-8" src="images/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="images/js/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="images/js/lang/zh-cn/zh-cn.js"></script>
<{assign var="richid" value=""}>
<{assign var="richcontent" value=""}>
<div style="width:96%;margin:auto;padding:auto">
    <form name="myform" jstype="vali" action="?ct=<{$ct}>&ac=edit" method="POST"  enctype="multipart/form-data" onsubmit="return submitForm();">
        <table width="100%" class="form">
            <{if $data_template}>
            <tr>
                <td style="width:15%">
                    专题名称(id):
                </td>
                <td>
                    <{$data_template.0.zt_name}>(<{$data_template.0.zt_id}>)
                    <input type="hidden" id="add_data_id" name="data_id" value="<{$data_template.0.zt_id}>" />
                    <input type="hidden" id="add_zt_id" name="zt_id" value="<{$data_template.0.zt_id}>" />
                </td>
            </tr>
            <{foreach from=$data_template key=k item=v}>
                <tr>
                    <td>
                        <{$v.tplc_name}>：
                    </td>
                    <td>
                        <table width="100%" class="form">
                            <input type="hidden" name="tplc_id[]" value="<{$v.tplc_id}>" />
                            <input type="hidden" name="det_id[<{$v.tplc_id}>]" value="<{$data[$v.tplc_id].det_id}>" />
                            <{if $v.tplc_havetitle==1}>
                                <tr>
                                    <td>标题</td>
                                    <td><input type='text' id="add_det_title_<{$v.tplc_id}>" name='det_title[<{$v.tplc_id}>]' class="text error" style="width:400px;" errormsg='标题必须!' vali='' value='<{$data[$v.tplc_id].det_title}>' /> <span class="text-hint normal">标题必须!</span>
                                        <script type="text/javascript">
                                            $('#add_det_title_<{$v.tplc_id}>').focus(function(){
                                                $(this).showWordCount();
                                                $('#div_1').fadeIn('slow');
                                            });
                                        </script>
                                    </td>
                                </tr>
                            <{/if}>
                            <{if $v.tplc_haveurl==1}>
                                <tr>
                                    <td>跳转地址</td>
                                    <td><input type='text' id="add_det_url<{$v.tplc_id}>" name='det_url[<{$v.tplc_id}>]' class="text error" style="width:400px;"  errormsg='跳转地址必须!' vali='' value='<{$data[$v.tplc_id].det_url}>' /> <span class="text-hint normal">跳转地址必须!</span></td>
                                </tr>
                            <{/if}>
                            <{if $v.tplc_havemediaurl==1}>
                                <tr>
                                    <td>媒体播放地址</td>
                                    <td><input type='text' id="add_det_mediaurl_<{$v.tplc_id}>" name='det_mediaurl[<{$v.tplc_id}>]' class="text error" style="width:400px;"  errormsg='媒体播放地址必须!' vali='' value='<{$data[$v.tplc_id].det_mediaurl}>' /> <span class="text-hint normal">媒体播放地址必须!</span></td>
                                </tr>
                            <{/if}>
                            <{if $v.tplc_havesmallimg==1}>
                                <tr>
                                    <td>小图</td>
                                    <td><input type='file' id="add_det_smallimg_<{$v.tplc_id}>" name='det_smallimg_<{$v.tplc_id}>' class="text error" style="width:400px;"  errormsg='小图必须!' vali='' value='' /> <span class="text-hint normal">小图必须!</span>
                                        <br /><img src="<{$data[$v.tplc_id].det_smallimg}>" style="width:100px;height:80px;" />
                                    </td>
                                </tr>
                            <{/if}>
                            <{if $v.tplc_havebigimg==1}>
                                <tr>
                                    <td>大图</td>
                                    <td><input type='file' id="add_det_bigimg_<{$v.tplc_id}>" name='det_bigimg_<{$v.tplc_id}>' class="text error" errormsg='大图必须!' vali='' value='' /> <span class="text-hint normal">大图必须!</span>
                                        <br /><img src="<{$data[$v.tplc_id].det_bigimg}>" style="width:100px;height:80px;" />
                                    </td>
                                </tr>
                            <{/if}>
                            <{if $v.tplc_havedescript==1}>
                                <tr>
                                    <td>描述</td>
                                    <td><textarea id="add_det_descript_<{$v.tplc_id}>" name='det_descript[<{$v.tplc_id}>]' class="text error" style="width:400px;height:120px;" errormsg='描述必须!' vali=''><{$data[$v.tplc_id].det_descript}></textarea> <span class="text-hint normal">描述必须!</span>

                                        <script type="text/javascript">
                                            $('#add_det_descript_<{$v.tplc_id}>').focus(function(){
                                                $(this).showWordCount();
                                                $('#div_1').fadeIn('slow');
                                            });
                                        </script>
                                    </td>
                                </tr>
                            <{/if}>
                            <{if $v.tplc_havedate==1}>
                                <tr>
                                    <td>日期</td>
                                    <td><input type='text' id="add_det_date_<{$v.tplc_id}>" name='det_date[<{$v.tplc_id}>]' class="text error" errormsg='日期必须!' vali='' value='<{$data[$v.tplc_id].det_date}>' /> <span class="text-hint normal">日期必须!</span></td>
                                </tr>
                            <{/if}>
                            <tr>
                                <td>开启</td>
                                <td><select id="add_det_open_<{$v.tplc_id}>" name="det_open[<{$v.tplc_id}>]" >
                                        <option value="2" <{if $data[$v.tplc_id].det_open==2 }>selected="selected" <{/if}>>开启</option>
                                        <option value="1" <{if $data[$v.tplc_id].det_open!=2 }>selected="selected" <{/if}>>关闭</option>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            <{/foreach}>
            <tr>
                <td colspan='2' align='left' height='30' >
                    <input type='hidden' name='dosubmit' value='true'  />
                    <button type="submit" >保存</button> &nbsp;&nbsp;&nbsp;
                    <button type="reset">重设</button>
                </td>
            </tr>
            <{else}>
                <tr>
                    <td>未找到设置的列</td>
                </tr>
            <{/if}>
        </table>
    </form>
</div>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('content_editor');
    ue.addListener("ready", function () {
        <{assign var="fieldname" value="content"}>
        ue.setContent('<{$data[$fieldname]}>');

    });

    function submitForm(){
        var contentval = document.getElementById("add_content");
        var contentstr = UE.getEditor('content_editor').getContent();
        if(!UE.getEditor('content_editor').hasContents()){
            alert("内容不能为空！");
            return false;
        }
        if(!contentval){
            alert("内容不能为空！");
            return false;
        }

        contentval.value = contentstr.trim();
        return true;
    }
</script>
<script type="text/javascript">
    <{if isset($_autoAjax) && !empty($_autoAjax)}>
    <{foreach from=$_autoAjax item=v}>
    ajaxSelectChange('<{$data[$v.field]}>','<{$v.class}>','<{$v.url}>');
    <{/foreach}>
    <{/if}>
</script>
</body>
</html>
