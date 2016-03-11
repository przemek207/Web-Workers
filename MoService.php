<?php
/**
 * Created by PhpStorm.
 * User: Przemek
 */
namespace app\components;

use app\models\Mo;
use app\components\exceptions\InvalidDateException;
use app\components\exceptions\InvalidUserException;
use app\components\exceptions\InvalidEnumKeyException;
use \DateTime;
use yii\validators\DateValidator;

class MoService
{
	public function getValues()
	{
		$arr=[];
		$rel = Mo::find() ->all();
		if (is_null($rel))
		{
			return [];
		}
		foreach($rel as $var)
		{
			$arr[] = self::createObj($var['name'],$var['course']);
		}
		return $arr;
	}
	private static function createObj($name, $course)
	{
		return ['name'=>$name, 'course' => $course];
	}
}

?>