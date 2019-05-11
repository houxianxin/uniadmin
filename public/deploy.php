<?php
// +----------------------------------------------------------------------
// | 零云 [ 简单 高效 卓越 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lingyun.net All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
// | 版权申明：零云不是一个自由软件，是零云官方推出的商业源码，严禁在未经许可的情况下
// | 拷贝、复制、传播、使用零云的任意代码，如有违反，请立即删除，否则您将面临承担相应
// | 法律责任的风险。如果需要取得官方授权，请联系官方http://www.lingyun.net
// +----------------------------------------------------------------------

// 自动部署脚本，可以用于git的webhook实现推送代码后自动部署
// 注意需要给www-data用户权限在/etc/sudoers添加 www-data ALL=(root) NOPASSWD: /usr/bin/git
exec('cd ' . dirname(__FILE__) . '&&sudo git pull 2>&1', $res, $rc);
if ($rc == 0) {
	echo '部署成功<br>';
} else {
	echo '部署失败<br>';
}
echo '<pre>';
var_dump($res);
echo '</pre>';

echo '提交记录：<pre>';
exec('cd ' . dirname(__FILE__) . '&&sudo git log -5 2>&1', $res1, $rc);
var_dump($res1);
echo '</pre>';

?>