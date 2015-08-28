<?php
/* @var $this LotteryController */
/* @var $model Lottery */

$this->breadcrumbs=array(
	'Lotteries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Lottery', 'url'=>array('index'))
);

?>

<h1>中奖记录 - (数据下载)</h1>
<style type="text/css">
    ul.download-link{
        list-style: none;
        margin: 0;
        padding: 10px 0;
        float: right;
    }
    ul.download-link li{
        float: left;
        display: inline-block;
    }
    ul.download-link li a{
        text-decoration: none;
        padding: 8px;
        margin-left: 1px;
        background-color: #06c;
        color: #fff;
        border-radius: 3px;
    }
</style>
<div class="clearfix">
<ul class="download-link">
    <li><a href="/csv/lottery.php?v=<?=time();?>">中奖记录</a></li>
    <li><a href="/csv/city.php?v=<?=time();?>">城市抽奖数量统计</a></li>
    <li><a href="/csv/market.php?v=<?=time();?>">店铺抽奖数量统计</a></li>
</ul>
</div>
<div class="history_from_date form">
    <input type="hidden" value="1" name="Lottery[search]" />
    <input type="text" readonly name="Lottery[search_starttime]" id="Lottery_startTime" placeholder="开始时间" value="<?php echo isset($model->search_starttime) ? $model->search_starttime:""; ?>" />
    <span>-to-</span>
    <input type="text" readonly name="Lottery[search_endtime]" id="Lottery_endTime" placeholder="结束时间" value="<?php echo isset($model->search_endtime) ? $model->search_endtime:""; ?>"  />
    
    <button id="history_search">查 询</button>

<script>
        $('#history_search').click(function(e) {
            var a = {};
            $("input[name^='Lottery']").each(function(i, o){
                $this = $(this)
                a[ $this.attr('name') ] = $this.val();
            });
            send(a);
        });
        function send(data){
            var selectedStr = '';
            var url = "<?=$this->createUrl('/admin/lottery/admin');?>";

            for(var key in data){
                selectedStr += encodeURIComponent(key)+'='+encodeURIComponent(data[key]) + '&';
            }

            $('#lottery-grid').yiiGridView('update', {url: url + '?' + selectedStr +'&Lottery_page=1&ajax=lottery-grid' });

        }
</script>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lottery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'id',
		'uid',*/
		'phone',
		array(
            'name'=>'cityId',
            'type'=>'raw',
            'value'=> array($this,'getCityName'),   //调用自定义的函数
        ),  
		array(
            'name'=>'marketId',
            'type'=>'raw',
            'value'=> array($this,'getMarketName'),   //调用自定义的函数
        ),  
		array(
            'name'=>'type',
            'type'=>'raw',
            'value'=> array($this,'getTypeName'),   //调用自定义的函数
        ),
		'createTime',
		array(
            'name'=>'win',
            'type'=>'raw',
            'value'=> array($this,'getWinName'),   //调用自定义的函数
        ),  
		array(
            'name'=>'giftId',
            'type'=>'raw',
            'value'=> array($this,'getGiftName'),   //调用自定义的函数
        ),
        array(  
            'name'=>'username',  
            'value'=>'json_decode($data->user->nickname)',  //定义展示的 value 值  
           // 'filter'=>CHtml::activeTextField($model,'name'), //添加搜索 filter  
        ),  
        array(  
            'name'=>'path',  
            'value'=>'$data->user->path == 1 ? "微信":"新浪微博"',  //定义展示的 value 值  
            //'filter'=>CHtml::activeTextField($model,'name'), //添加搜索 filter  
        ), 
		array(
		'header'=>'操作',
		'class'=>'CButtonColumn',
		'headerHtmlOptions'=>array(
			'width'=>'80',
		),
		'template'=>'{view}', 
		),
	),
)); ?>
<script>
    //$('#Market_startTime,#Market_endTime')
    laydate({
        elem: '#Lottery_startTime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        format: 'YYYY-MM-DD hh:mm:ss',
        //event: 'focus' //响应事件。如果没有传入event，则按照默认的click
    });
    laydate({
        elem: '#Lottery_endTime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        format: 'YYYY-MM-DD hh:mm:ss',      
        //event: 'focus' //响应事件。如果没有传入event，则按照默认的click
    });

</script>
