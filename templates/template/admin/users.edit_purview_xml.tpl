<{include file="admin/header.tpl"}>

<form id="form1" action="?ct=users&ac=edit_purview_xml" method="POST" enctype="multipart/form-data">
<div id="contents">
    <table class="form" style="width:800px">
    <tr>
        <td style='background:#EEF8FF;padding-left:8px;font-weight:bold'>&raquo;全局权限XML手动配置(组权限的XML配置文件，如果不理解请不要修改)：</td>
    </tr>
    <tr>
        <td>
            <textarea name="purview_xml" class="text" style="width:800px;height:450px;"><{$purview_xml}></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <button type="submit">确定保存</button>
        </td>
    </tr>
</table>
</div>
</form>

</body>
</html>
