<?php

namespace common\models\filters;

use yii\base\Model;
use yii\db\ActiveQuery;

class ApitaskFilter extends Model
{
	public function filter($filter, ActiveQuery $query)
	{
		// var_dump($filter);
		$query->where([
			'name' => $filter['name']
			// 'initiator_id' => $filter['initiator_id']
		]);
		return $query;
	}
}