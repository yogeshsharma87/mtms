<?php

class Mtms_Model_Navigation extends Mtms_Model
{
	const SUPERADMIN_ROLE_ID = 5;
	public static function getNav()
	{
		$user = Mtms_Model_SessionManager::getInstance()->user;
		if($user['role_id'] == self::SUPERADMIN_ROLE_ID)
		{
			return R::getAll( 'SELECT name,url FROM acl_resource');
		}
		else
		{
			$resources = R::GetCol( 'SELECT fk_acl_resource_id as resources FROM role_acl_resource where fk_role_id=?',[$user['role_id']]);
			return R::getAll( 'SELECT name,url FROM acl_resource where id_acl_resource in ('.R::genSlots( $resources ).')',$resources);
		}
	}
}
