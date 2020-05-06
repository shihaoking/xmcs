  <{include file="admin/header.tpl"}> 
  <link href="images/css/lyz.calendar.css" rel="stylesheet" type="text/css" /> 
  <script src="images/js/lyz.calendar.min.js" type="text/javascript"></script> 
  <script lang="javascript">

$(function () {

        $("#search_createtime_start").calendar({

            controlId: "divDate",                                

            speed: 200,                                           

            complement: true,                                    

            readonly: true,                                      

            upperLimit: new Date(),                               

            lowerLimit: new Date("2018/01/01"),                   

            callback: function () {                               

             

            }

        });

        $("#search_createtime_end").calendar();

    });
</script> 
  <div id="contents"> 
   <div style="background-color:#DAFBCA;padding:5px 10px;line-height:32px;"> 
    <form method="GET" action="?ct=ffsm_order&ac=excel_out">  
     <input type="hidden" value="ffsm_order" name="ct" /> 
     <input type="hidden" value="excel_out" name="ac" />
     <label>订单开始时间：</label> 
     <input type="text" id="search_createtime_start" name="createtime_start" value="" class="text m" readonly="" /> &nbsp;&nbsp;&nbsp; 
     <label>订单结束时间：</label> 
     <input type="text" id="search_createtime_end" name="createtime_end" value="" class="text m" readonly="" /> &nbsp;&nbsp;&nbsp; 
     <label>支付状态：</label> 
     <select name="status" id="search_status" style="height:23px;"> 
	 <option value="" selected="">所属支付状态</option> 
	 <option value="1">待付费</option> 
	 <option value="2">已付费</option> 
	 </select> &nbsp;&nbsp;&nbsp; 
     <label>所属栏目：</label> 
     <select name="type" id="search_type" style="height:23px;"> 
	 <option value="" selected="">所属栏目</option> 
	 <option value="1">八字分析</option>
	 <option value="2">八字合婚</option>
	 <option value="3">姓名详解</option>
	 <option value="4">姓名配对</option>
	 <option value="5">紫薇命盘</option>
	 <option value="6">八字综合分析</option>
	 <option value="7">婚姻运势</option>
	 <option value="8">八字精批</option>
	 <option value="9">爱情运势</option>
	 <option value="10">八字精批PC版</option>
	 <option value="11">结婚运势</option>
	 <option value="12">八字精批详解</option>
	 <option value="13">十年大运</option>
	 <option value="14">八字财运</option>
	 <option value="15">喜用神</option>
	 <option value="16">月老姻缘</option>
	 <option value="17">八字合婚</option>
	 <option value="18">号码解析</option>
	 </select> 
     <button type="submit">导出excel</button>
     <span style="margin-left:25px;"> </span>
    </form> 
   </div>   
  </div>
 </body>
</html>