<?php /* Smarty version 2.6.25, created on 2020-05-03 19:49:21
         compiled from ffsm/history.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8"/>
<title>我的测算订单查询</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="black" name="apple-mobile-web-app-status-bar-style"/>
<meta content="telephone=no" name="format-detection"/>
<link rel="shortcut icon" href="/statics/ffsm/favicon.ico"/>
<link href="/statics/ffsm/public/wap.min-v=0817.css" rel="stylesheet" type="text/css"/>
<link href="/statics/ffsm/inquiry/1/inquiry.min.css" rel="stylesheet" type="text/css"/>
<script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<header class="public_header">
<h1 class="public_h_con"><?php echo $this->_tpl_vars['filtertypename']; ?>
</h1>
<a class="public_h_home" href="/?ac=<?php if ($this->_tpl_vars['filtertype'] == 23): ?>ffqm<?php else: ?>xmfx<?php endif; ?>"></a></header>
  <ul class="ddztxz">
    
    <li>
        <a href="/?ac=history&type=<?php echo $this->_tpl_vars['filtertype']; ?>
" <?php if ($this->_tpl_vars['state'] == 0): ?>class="on" <?php endif; ?>>未付款</a>
    </li>
    <li>
    <a href="/?ac=history&state=1&type=<?php echo $this->_tpl_vars['filtertype']; ?>
" <?php if ($this->_tpl_vars['state'] == 1): ?>class="on" <?php endif; ?>>已付款</a>
    </li>
    <li>
    <a href="/?ac=history&state=2&type=<?php echo $this->_tpl_vars['filtertype']; ?>
" <?php if ($this->_tpl_vars['state'] == 2): ?>class="on" <?php endif; ?>>查询订单</a>
    </li>
  </ul>
  <?php if ($this->_tpl_vars['data'] && $this->_tpl_vars['state'] != 2): ?>
  <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
  <?php if ($this->_tpl_vars['state'] == $this->_tpl_vars['v']['status']): ?>
  <div class="public_ddxx_order">
      <div class="public_k_order">
          <div class="public_k_left"><?php if ($this->_tpl_vars['filtertype'] == 23): ?>宝宝姓氏<?php else: ?>姓名<?php endif; ?>：</div>
          <div class="public_k_right"><?php echo $this->_tpl_vars['v']['data']['xing']; ?>
<?php echo $this->_tpl_vars['v']['data']['username']; ?>
</div>
      </div>
     <div class="public_k_order">
          <div class="public_k_left">性别：</div>
          <div class="public_k_right"><?php if ($this->_tpl_vars['v']['data']['gender'] == 1): ?>男<?php endif; ?><?php if ($this->_tpl_vars['v']['data']['gender'] == 0): ?>女<?php endif; ?><?php if ($this->_tpl_vars['v']['data']['gender'] == 2): ?>未知<?php endif; ?></div>
     </div>
     <div class="public_k_order">
          <div class="public_k_left">出生日期：</div>
          <div class="public_k_right">公历 <?php echo $this->_tpl_vars['v']['birthday']; ?>
</div>
     </div>
     <div class="public_k_order">
          <div class="public_k_left">订单号：</div>
          <div class="public_k_right"><?php echo $this->_tpl_vars['v']['oid']; ?>
</div>
     </div>
      <div class="public_k_order">
          <div class="public_k_left">下单时间：</div>
          <div class="public_k_right"><?php echo $this->_tpl_vars['v']['createtime']; ?>
</div>
    </div>
     <div class="public_k_order">
          <div class="public_k_left">状态</div>
          <div class="public_k_right"><?php if ($this->_tpl_vars['v']['status'] == 1): ?><span>已付款</span><?php else: ?><span class="public_red">未支付</span><?php endif; ?></div>
     </div>
    <div class="public_k public_bddd" style="text-align: center">
        <a class="public_pyzt__look" href="<?php echo $this->_tpl_vars['v']['url']; ?>
"><?php if ($this->_tpl_vars['v']['status'] == 1): ?>点击查看<?php else: ?>去支付<?php endif; ?></a>
     </div>
  </div>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
  <?php if ($this->_tpl_vars['state'] == 2): ?>
<div class="public_ddxx_search">
	<div class="public_ddxx_form">
      <form class="J_ajaxForm" action="/?ac=select_orders&type=<?php echo $this->_tpl_vars['filtertype']; ?>
" method="post">
			<input type="text" name="oid" nolocal="true" placeholder="请输入订单号" class="input" value="<?php echo $this->_tpl_vars['oids']; ?>
" /><input type="submit" value="搜索" class="J_ajax_submit_btn btn"/>
		</form>
	</div>
	
	
</div>
<?php endif; ?>
  
  
<div class="public_orders_search">
	<div class="public_os_info">
		温馨提示：已经付款的用户请输入订单号查询测算结果！如未正常显示请关注【公众号】进行反馈！
	</div>
	<ul class="problem_feedback">
		<!--<li><a class="after_sales_link" href="https://www.yiabs.com/yixue/i38-1.html" hidetxt="问题反馈">问题反馈</a></li>  
		<li><a href="javascript:;" onclick="history.go(-1);" class="btn_back">返回</a></li> -->
	</ul>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => './ffsm/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => './ffsm/dl_ck.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>