<!--首页
<a href="<?=$this->createUrl('index/list')?>">商品列表页 &gt;</a>
-->
<?php

$SendMessage = new SendMessage('14782593339','HelloWorld',NULL);

echo $SendMessage->send();
