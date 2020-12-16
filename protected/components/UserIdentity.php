<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/
	
				private $_id;
			private $pass;
			
			public function authenticate()
		{
			$username=strtolower($this->username);
			$user=Usuarios::model()->find('LOWER(usuario)=?',array($username));
            
			if($user===null)
			{ 
			
			echo "Usuario es Null";
			$this->errorCode=self::ERROR_USERNAME_INVALID;
            }
			else if($user->clave!==$this->password)
			{
			echo "Clave Invalida";
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		else

			{
				$this->_id=$user->usuario_id;
				$this->username=$user->nombre;
				$this->errorCode=self::ERROR_NONE;
				
								
				$mi_rol=$user->rol_id;
				$mi_dep=$user->centro_id;
				$mi_id=$user->usuario_id;
				$mi_ttr=$user->tipo_trasplante_id;
				
				
				$roluser = Roles::model()->findByPk($mi_rol);
				$this->setState('Rolnb', $roluser->rol);
				$this->setState('Rol', $mi_rol);
				$this->setState('Dep', $mi_dep);
				$this->setState('Usu', $mi_id);
				$this->setState('Ttr', $mi_ttr);
	
				
			}
		return $this->errorCode==self::ERROR_NONE;
		}
				public function getId()
			{
				return $this->_id;
				
			}
	
	
}