    <{foreach key=so_key item=so_item from=$self_opt}>
    <{if !empty($tb_column.$so_key) && $so_item.0=='show'}>
<tr>
    <td class='title'><{$tb_column.$so_key}> : </td>
    <td class='fitem'>
    <dd>
<{if !empty($so_item.1) && $so_item.1 == 'select'}>
    <{if !empty($so_item.2)}>
            <select name="<{$so_key}>" id="<{$so_key}>">
                <option value="">请选择</option>
                <{if !empty($so_item.3)&&$so_item.3 == 2}>
                    <{foreach item=si_item key=si_key from=$so_item.2}>
                        <optgroup label="<{$si_key}>">
                            <{if !empty($si_item)}>
                            <{foreach item=item1 key=key1 from=$si_item}>
                                <option value="<{$key1}>" <{if !empty($data_array.$so_key)&&$key1 == $data_array.$so_key}> selected="selected" <{/if}> <{if $so_item.4}>style="color:<{$item1}>"<{/if}>>[<{$key1}>]<{$si_key}> : <{$item1}></option>
                            <{/foreach}>
                            <{/if}>
                        </optgroup>
                    <{/foreach}>
                <{else}>
                    <{foreach item=si_item key=si_key from=$so_item.2}>
                        <option value="<{$si_key}>" <{if !empty($data_array.$so_key)&&$si_key == $data_array.$so_key}> selected="selected" <{/if}> <{if $so_item.4}>style="color:<{$si_item}>"<{/if}>><{$si_item}></option>
                    <{/foreach}>   
                <{/if}>
            </select> 
    <{/if}>
<{elseif !empty($so_item.1) && $so_item.1 == 'input_text'}>
    <input type='text' name='<{$so_key}>' class='<{$so_item.2}}>' value='<{if !empty($data_array.$so_key)}><{$data_array.$so_key}><{else}><{if isset($so_item.3)}><{$so_item.3}><{/if}><{/if}>'/>
<{elseif !empty($so_item.1) && $so_item.1 == 'pic'}>
        优先图片上传 目录 : <{$opt.images_upload_dir}><input type="file" name='<{$so_key}>' class='l' ><br />
        <{if !empty($data_array.$so_key)}>当前: <img src='<{$data_array.$so_key}>' height='50px'/> <br /><{/if}> 
        或者 外链图片<br /><input type='text' class='l' name='<{$so_key}>' value="<{if !empty($data_array.$so_key)}><{$data_array.$so_key}><{/if}>"/>
<{elseif !empty($so_item.1) && $so_item.1 == 'input_select'}>
    <{if !empty($so_item.2)}>            
    <select name="<{$so_key}>">
        <{foreach key=k item=i from=$so_item.2}>
            <option value="<{$k}>" <{if !empty($data_array.$so_key) && $k==$data_array.$so_key}>selected='selected'<{/if}>><{$i}></option>
        <{/foreach}>
    </select>
    <{/if}>
<{elseif !empty($so_item.1) && $so_item.1 == 'checkbox'}>
    <{if !empty($so_item.2)}>  
        <p>
            <{foreach key=k item=i from=$data_array.tagids}>
               
                <span>
                    <input type="checkbox" name="<{$so_key}>[]" <{if !empty($data_array.$so_key) && in_array($i.id,$data_array.$so_key)}>checked='checked'<{/if}> value="<{$i.id}>"> <{$i.tag}>  &nbsp;
                </span>
                
            <{/foreach}>                    
       </p>
    <{/if}>
    
<{elseif !empty($so_item.1) && $so_item.1 == 'checkboxs'}>
    <{if !empty($so_item.2)}>  
        <p><{$data_array.idarrix.nums}>
            <{foreach key=k item=i from=$data_array.idarrix}>
               <{if !empty($i.id)}>
                <span>
                    <input type="checkbox" name="<{$so_key}>[]" checked='checked' value="<{$i.id}>"> <{$i.name}>  &nbsp;
                </span>
                <{/if}>
            <{/foreach}>                    
       </p>
    <{/if}>            
        
<{else}>
    <{if !empty($data_array.$so_key)}><{$data_array.$so_key}><{/if}>
<{/if}>
    
    </dd>
</td>	
</tr>
<{/if}>
    <{/foreach}>
<tr>
    <td colspan='2' align='center' height='60'>
        <{if empty($id)}>
                <input type="hidden" name="do" value="add"/>
            <button type="submit" name="sub" value="add">新增</button> &nbsp;&nbsp;&nbsp;
            <button type="reset">重设</button>
        <{else}>
            <{if !empty($id)}>
                <input type="hidden" name="id" value="<{$id}> "/>
                <input type="hidden" name="do" value="edit"/>
                <button type="submit" name="sub" value="upd">修改后保存</button> &nbsp;&nbsp;&nbsp;
            <{/if}>
            <button type="submit" name="do" value="add">修改后新增</button> &nbsp;&nbsp;&nbsp;
            <button type="button" id="clean" >清空重填</button> &nbsp;&nbsp;&nbsp;
        <{/if}>    

        &nbsp;&nbsp;&nbsp;<a class="button" href="?ct=<{$ct}>&ac=<{$ac_list}>">返回列表</a>

    </td>
</tr>

<script type="text/javascript">
    $("#clean").click(function () {
        $("input").val('');
    });

</script>

