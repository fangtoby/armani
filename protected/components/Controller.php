<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	protected $signPackage = array(
		'appid'=>23, // 应用唯一标识，在微信开放平台提交应用审核通过后获得
		'secret'=>'234rdsfa',//应用密钥AppSecret，在微信开放平台提交应用审核通过后获得
		'grant_type'=>'authorization_code',//固定
		'code'=>'SDFERWE3w3erw',
		'timestamp'=>23,
		'nonceStr'=>23,
		'signature'=>23,
	);
	
	public function beforeAction($action)
	{
		return true;
	}
	
	protected function jsonSuccess($data, $params = array())
	{
		$data = array('code'=>200,'message'=>'操作成功','data'=>$data);
		$data = array_merge($data, $params);
		echo CJSON::encode($data);
		exit;
	}
	protected function jsonError($data,$message, $params = array())
	{
		$data = array('code'=>200,'message'=>$message,'data'=>$data);
		$data = array_merge($data, $params);
		echo CJSON::encode($data);
		exit;
	}
}