
<a href="<?=$this->createUrl('index/list')?>">&lt;列表页 </a>

商品详情页，商品id<?=$pid;?>

<a href="<?=$this->createUrl('index/share',array('pid'=>1,'did'=>1))?>"> 分享到朋友圈 &gt;</a>

<pre>
<?=var_dump($data);?>
</pre>