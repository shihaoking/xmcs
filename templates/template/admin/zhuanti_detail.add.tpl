<{include file='admin/header.tpl'}>
<script type="text/javascript">
    function ajaxSelectChange(id,tag,url){
        if(id<1)return false;
        $.post(
                url,
                {id:id},
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
<div style="width:96%;margin:auto;padding:auto;">
    <form name="myform" jstype="vali" action="?ct=<{$ct}>&ac=add" method="POST"  enctype="multipart/form-data">
        <table width="100%" class="form">
            <{if $data_list}>
            <tr>
                <td style="width:15%">
                    专题名称(id):
                </td>
                <td>
                    <{$data_list.0.zt_name}>(<{$data_list.0.zt_id}>)
                    <input type="hidden" id="add_data_id" name="data_id" value="<{$data_list.0.zt_id}>" />
                    <input type="hidden" id="add_zt_id" name="zt_id" value="<{$data_list.0.zt_id}>" />
                </td>
            </tr>
                <{foreach from=$data_list key=k item=v}>
            <tr>
                <td>
                    <{$v.tplc_name}>：
                </td>
                <td>
                    <table width="100%" class="form">
                        <input type="hidden" name="tplc_id[]" value="<{$v.tplc_id}>" />
                        <{if $v.tplc_havetitle==1}>
                        <tr>
                            <td>标题</td>
                            <td><input type='text' id="add_det_title_<{$v.tplc_id}>" name='det_title[<{$v.tplc_id}>]' style="width:400px;" class="text error" errormsg='标题必须!' vali='' value='' /> <span class="text-hint normal">标题必须!</span>

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
                                <td><input type='text' id="add_det_url<{$v.tplc_id}>" name='det_url[<{$v.tplc_id}>]' style="width:400px;" class="text error" errormsg='跳转地址必须!' vali='' value='' /> <span class="text-hint normal">跳转地址必须!</span></td>
                            </tr>
                        <{/if}>
                        <{if $v.tplc_havemediaurl==1}>
                            <tr>
                                <td>媒体播放地址</td>
                                <td><input type='text' id="add_det_mediaurl_<{$v.tplc_id}>" name='det_mediaurl[<{$v.tplc_id}>]' class="text error" errormsg='媒体播放地址必须!' vali='' value='' /> <span class="text-hint normal">媒体播放地址必须!</span></td>
                            </tr>
                        <{/if}>
                        <{if $v.tplc_havesmallimg==1}>
                            <tr>
                                <td>小图</td>
                                <td><input type='file' id="add_det_smallimg_<{$v.tplc_id}>" name='det_smallimg_<{$v.tplc_id}>' class="text error" errormsg='小图必须!' vali='' value='' /> <span class="text-hint normal">小图必须!</span></td>
                            </tr>
                        <{/if}>
                        <{if $v.tplc_havebigimg==1}>
                            <tr>
                                <td>大图</td>
                                <td><input type='file' id="add_det_bigimg_<{$v.tplc_id}>" name='det_bigimg_<{$v.tplc_id}>' class="text error" errormsg='大图必须!' vali='' value='' /> <span class="text-hint normal">大图必须!</span></td>
                            </tr>
                        <{/if}>
                        <{if $v.tplc_havedescript==1}>
                            <tr>
                                <td>描述</td>
                                <td><textarea id="add_det_descript_<{$v.tplc_id}>" name='det_descript[<{$v.tplc_id}>]' class="text error" style="width:400px;height:120px;" errormsg='描述必须!' vali=''></textarea> <span class="text-hint normal">描述必须!</span>

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
                                <td><input type='text' id="add_det_date_<{$v.tplc_id}>" name='det_date[<{$v.tplc_id}>]' style="width:400px;" class="text error" errormsg='日期必须!' vali='' value='<{$smarty.now|date_format:"%Y-%m-%d"}>' /> <span class="text-hint normal">日期必须!</span></td>
                            </tr>
                        <{/if}>
                            <tr>
                                <td>开启</td>
                                <td><select id="add_det_open_<{$v.tplc_id}>" name="det_open[<{$v.tplc_id}>]" >
                                        <option value="2">开启</option>
                                        <option value="1">关闭</option>
                                </td>
                            </tr>

                    </table>
                </td>
            </tr>
                <{/foreach}>
            <tr>
                <td colspan='2' align='left' height='30' >
                    <input type='hidden' name='dosubmit' value='true'  />
                    <button type="submit" >提交</button> &nbsp;&nbsp;&nbsp;
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


</body>
</html>
