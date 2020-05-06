<{include file="admin/header.tpl"}>
<div style="width:96%;margin:auto;padding:auto">
    <form name="form1" action="?ct=hand&ac=ad_do&do=upd" method="POST" enctype="multipart/form-data">
        <{if !empty($data_array.id)}><input type='hidden' name='id' value="<{$data_array.id}>" /><{/if}>
        <table class="form">
            <tr>
                <td class='title'>所属页面 : </td>
                <td class='fitem'>
            <dd>
                <select name="type">
                            <{foreach key =k item=i from=$type_ad_array}>
                                <option value="<{$k}>" <{if $k==$data_array.type}>selected='selected'<{/if}>><{$i}></option>
                            <{/foreach}>
                </select>
            </dd>
            </td>	
            </tr>
            <tr>
                <td class='title'>标题 : </td>
                <td class='fitem'>
            <dd>
                <input type='text' name='title' class='' value='<{if !empty($data_array.title)}><{$data_array.title}><{/if}>'/>
            </dd>
            </td>	
            </tr>
            <tr>
                <td class='title'>内容 : </td>
                <td class='fitem'>
            <dd>
                <textarea name='content' class='l' ><{if !empty($data_array.content)}><{$data_array.content|base64_decode}><{/if}></textarea><br />
            </dd>
            </td>	
            </tr>
            <tr>
                <td class='title'>结束时间 : </td>
                <td class='fitem'>
            <dd>
                <input type='text' name='endtime'  jstype="cal"  value='<{if !empty($data_array.endtime)}><{$data_array.endtime}><{/if}>'/>
            </dd>
            </td>	
            </tr>
            <tr>
                <td class='title'>替换后标题 : </td>
                <td class='fitem'>
            <dd>
                <input type='text' name='titlere' class='' value='<{if !empty($data_array.titlere)}><{$data_array.titlere}><{/if}>'/>
            </dd>
            </td>	
            </tr>
            <tr>
                <td class='title'>结束后内容 : </td>
                <td class='fitem'>
            <dd>
                <textarea name='reserve' class='l' ><{if !empty($data_array.reserve)}><{$data_array.reserve|base64_decode}><{/if}></textarea><br />
            </dd>
            </td>	
            </tr>
            <tr>
                <td colspan='2' align='center' height='60'>
                    <input type="hidden" name="do" value="edit"/>
                    <button type="submit" name="sub" value="upd">修改后保存</button> &nbsp;&nbsp;&nbsp;
                    <button type="button" id="clean" >清空重填</button> &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;<a class="button" href="?ct=hand&ac=ad">返回列表</a>
                </td>
            </tr>

            <script type="text/javascript">
                $("#clean").click(function () {
                    $("input").val('');
                });
            </script>

        </table>
    </form>
</div>

</body>
</html>
