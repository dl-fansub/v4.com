<?php
class fsDigitalLover
{
	private $database;
	private $session;
	private $path;
	
	public function __construct()
	{
		$this->database = new SyncDatabase();
		$this->session = new Session();
		$this->path = new UrlRequest();
	}
	
	public function Initialize()
	{
		$frontpage = $this->query("SELECT * FROM dl_menu WHERE frontpage=1 LIMIT 1;");
		if(!$frontpage) $frontpage = $this->query("SELECT * FROM dl_menu LIMIT 1;");
		
		include('language/'.$this->profile("language"));
		$GLOBALS['menu_id'] = $frontpage['menu_id'];
		$GLOBALS['component_name'] = $frontpage['name'];
		
		if($this->path(0)) {
			if($this->query("SELECT COUNT(*) FROM dl_component WHERE name='".$this->path(0)."' LIMIT 1;")) {
				$isLevel = $this->query("SELECT * FROM dl_menu WHERE path='".$this->path->path()."' LIMIT 1;");
				$GLOBALS['component_name'] = $this->path(0);
				$GLOBALS['menu_id'] = $isLevel['menu_id'];
			} else {
				$GLOBALS['menu_id'] = 0;
				$GLOBALS['component_name'] = 'error';
				$GLOBALS['error_type'] = 'component_name';
			}
		}	
		$GLOBALS['title_site'] = $this->profile("title");
		
		$component = $this->query("SELECT * FROM dl_component WHERE name='$GLOBALS[component_name]' LIMIT 1;");
		
		if($GLOBALS['error_type']==='component_name') {
			$GLOBALS['title_site'] = _ERROR_TITLE_URL.$GLOBALS['title_site'];
		} else {
			$GLOBALS['title_site'] = $component['title'].$GLOBALS['title_site'];
		}		
	}
	public function Header()
	{
		echo '<title>'.$GLOBALS['title_site'].'</title>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="Keywords" content="'.$this->profile('keywords').'" />';
		echo '<meta name="Description" content="'.$this->profile('description').'" />';
		echo '<link rel="shortcut icon" href="'.$this->profile('icon').'">';
		/*echo '<script src="http://connect.facebook.net/th_TH/all.js#xfbml=1"></script>';*/
	}
	
	
	// Initialize Scritps
	public function IncludeScripts()
	{
		foreach (glob("skin/font/*.css") as $filename) echo '<link rel="stylesheet" type="text/css" href="'.$filename.'" />'; 
		foreach (glob("skin/css/*.css") as $filename) echo '<link rel="stylesheet" type="text/css" href="'.$filename.'" />'; 
		foreach (glob(".require/jquery/*.js") as $filename) echo '<script type="text/javascript" src="'.$filename.'"></script>'; 
		foreach (glob("site/js/*.js") as $filename) echo '<script type="text/javascript" src="'.$filename.'"></script>';
		
		if(is_dir("component/com_$GLOBALS[component_name]/")){
			foreach(glob("component/com_$GLOBALS[component_name]/css/*.css") as $filename) { echo '<link rel="stylesheet" type="text/css" href="'.$filename.'" />';}
			foreach(glob("component/com_$GLOBALS[component_name]/js/*.js") as $filename) { echo  '<script type="text/javascript" src="'.$filename.'"></script>'; }
		}
	}
		
	public function HTML()
	{
		if(file_exists('body.php')) {
			include_once('body.php');
		} else {
			echo '"<strong>body.php</strong>" Miss.';
		}
	}
	
	public function query($string) { return $this->database->query($string); }
	public function cookie($key) { return $this->session->value($key); }
	public function path($level) { return $this->path->level($level); }		
	public function profile($profile_id)
	{ 
		$result = $this->query("SELECT value FROM dl_profiles WHERE profile_id='$profile_id' LIMIT 1;");
		if(isset($result['value'])) { $result = $result['value']; } else { $result = ""; }
		return $result;
	}
	
	private function Module($panel) {
		//echo $GLOBALS[menu_id]." ".$panel;
		if($GLOBALS['menu_id']) {
			foreach($this->query("SELECT dm.name, dm.title, dm.type FROM dl_module AS dm INNER JOIN dl_panel AS dp 
			ON dm.panel_id = dp.panel_id WHERE dp.panel = '$panel' AND dm.publisher = 1 AND
			CASE WHEN (SELECT COUNT(*) FROM dl_view AS dv WHERE dv.module_id=dm.module_id)=0 THEN TRUE
			ELSE CASE WHEN (SELECT COUNT(*) FROM dl_view AS dv WHERE dv.module_id=dm.module_id AND dv.menu_id=$GLOBALS[menu_id])>0 THEN
			TRUE ELSE FALSE END END ORDER BY dm.sorted ASC;") as $module) {	
				if(file_exists('module/'.$module['name'].'.php')) {
					if(file_exists('module/'.$module['name'].'.ini')) {
						$loadConfig = parse_ini_file('module/'.$module['name'].'.ini', true);
						foreach($loadConfig as $isGroupConfig) { foreach($isGroupConfig as $name=>$value) { $config[$name] = $value; } }
					}
					switch($module['type']) {
						case 1:
							echo '<div id="module_'.$module['name'].'"><div class="module_head">'.$module['title'].'</div>';
							echo '<div class="module_body">';
							include_once('module/'.$module['name'].'.php');
							echo '</div></div>';
							break;
						default:
							include_once('module/'.$module['name'].'.php');
							break;
					}
				} else {
					echo '<div align="center"><strong>Found:</strong> '.$module['name'].' in '.$panel.'</div>';
				}
			}
		}
	}
	
	public function cls($filename)
	{
		$incClass = NULL;
		if(file_exists(".require/$filename.php"))
		{
			include_once(".require/$filename.php");
			switch($filename)
			{
				case 'class_profile': $incClass = new profile($this->database); break;
			}
		}
		return $incClass;
	}
	
}

class code
{
	/*public static function bb($contents)
	{
		$contents = htmlspecialchars($contents);
		$contents = preg_replace('!\[quote\](.+)\[/quote\]!isU', '<div class="citationforum">$1</div>', $contents);
		$contents = preg_replace("!\[quote\=(.+)\](.+)\[\/quote\]!isU", '<div class="citationforum"><strong>$1 :</strong><br>$2</div>', $contents); 
		$contents = preg_replace("!\[font\=(.+)\](.+)\[\/font\]!isU", '<span style="font-size:$1px">$2</span>', $contents); 
		$contents = preg_replace('!\[b\](.+)\[/b\]!isU', '<strong>$1</strong>', $contents);
		$contents = preg_replace('!\[i\](.+)\[/i\]!isU', '<em>$1</em>', $contents);
		$contents = preg_replace('!\[u\](.+)\[/u\]!isU', '<span style="text-decoration:underline;">$1</span>', $contents);
		$contents = preg_replace('!\[center\](.+)\[/center\]!isU', '<div style="text-align:center;">$1</div>', $contents);
		$contents = preg_replace('!\[right\](.+)\[/right\]!isU', '<div style="text-align:right;">$1</div>', $contents);
		$contents = preg_replace('!\[left\](.+)\[/left\]!isU', '<div style="text-align:left;">$1</div>', $contents);
		$contents = preg_replace('!\[li\](.+)\[/li\]!isU', '<li>$1</li>',$contents);
		$contents = preg_replace('!\[img\](.+)\[/img\]!isU', '<img src="$1" border="0">',$contents);
		$contents = preg_replace('!\[url\](.+)\[/url\]!isU', '<a href="$1" target="_blank">$1</a>',$contents);
		$contents = preg_replace("!\[url\=(.+)\](.+)\[\/url\]!isU", '<a href="$1" target="_blank">$2</a>', $contents); 
		$contents = preg_replace("!(.+)\[br\](.+)!isU", '$1<br>$2', $contents); 
		return $contents;
	}*/

	public static function encrypt($decrypted, $password, $salt='!kQm*fF3pXe1Kbm%9')
	{ 
		$key = hash('SHA256', $salt.$password, true);
		srand();
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
		if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) return false;
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
		return $iv_base64.$encrypted;
	} 
	
	public static function decrypt($encrypted, $password, $xcode='!kQm*fF3pXe1Kbm%9')
	{
		$key = hash('SHA256', $salt . $password, true);
		$iv = base64_decode(substr($encrypted, 0, 22) . '==');
		$encrypted = substr($encrypted, 22);
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
		$hash = substr($decrypted, -32);
		$decrypted = substr($decrypted, 0, -32);
		if (md5($decrypted) != $hash) return false;
		return $decrypted;
	}
}

class Session
{	
	public function setSession($name, $value)
	{
		$_SESSION[$name] = $value;
	}
	
	public function setCookie($name, $value, $minute)
	{
		if(!$minute) {
			setcookie($name, $value, $minute, '/');
		} else {
			setcookie($name, $value, time()+($minute*60), '/');
		}
	}
	public function delete($name)
	{
		if(isset($_SESSION[$name])){
			unset($_SESSION[$name]);
		} elseif(isset($_COOKIE[$name])) {
			setcookie($name, '', 0, '/');
		}
	}
	
	public function value($name)
	{
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		} elseif(isset($_COOKIE[$name])) {
			return $_COOKIE[$name];
		} else {
			return false;
		}
	}
}

class SyncDatabase
{
	protected $dbConnect;
	protected $isConfig;
	
	public function __construct()
	{
		$loadConfig = parse_ini_file('SyncConfig.ini', true);
		foreach($loadConfig as $isGroupConfig) { foreach($isGroupConfig as $name=>$value) { $this->isConfig[$name] = $value; } }
		try {
			$this->dbConnect = @mysql_connect($this->isConfig['host'], $this->isConfig['username'], $this->isConfig['password']);
			if (!$this->dbConnect) {
				throw new Exception('<strong>Error:</strong> '.mysql_error());
			} else {
				mysql_select_db($this->isConfig['dbname']);
				mysql_set_charset('UTF8',$this->dbConnect); 
			}
		} catch(Exception $e) {
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
	
	public function query($sqlString)
	{
		list($sqlType) = explode(' ',$sqlString);
		switch(strtolower($sqlType))
		{
			case 'select':
				$result = array();				
				try {
					$tmpQuery = @mysql_query($sqlString, $this->dbConnect);
					if(!$tmpQuery)
					{
						throw new Exception('<strong>SQL SELECT:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
					} else {
						while($tmpValue = mysql_fetch_array($tmpQuery))
						{
							$result[] = $tmpValue;
						}
					}
				} catch(Exception $e) {
					echo '<p>'.$e->getMessage().'</p>';
				}
				if(preg_match('(limit 1;)', strtolower($sqlString)) && isset($result[0]) ) { $result = $result[0]; }
				return $result;
			break;
			case 'insert':
				try {
					$tmpQuery = @mysql_query($sqlString, $this->dbConnect);
					if(!$tmpQuery)
					{
						throw new Exception('<strong>SQL INSERT:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
					} else {
						return mysql_insert_id($this->dbConnect);
					}
				} catch(Exception $e) {
					echo '<p>'.$e->getMessage().'</p>';
					return false;
				}
			break;
			case 'update':
				try {
					$tmpQuery = @mysql_query($sqlString, $this->dbConnect);
					if(!$tmpQuery)
					{
						throw new Exception('<strong>SQL UPDATE:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
					} else {
						return mysql_affected_rows($this->dbConnect);
					}
				} catch(Exception $e) {
					echo '<p>'.$e->getMessage().'</p>';
					return false;
				}
			break;
			default:
				try {
					$tmpQuery = @mysql_query($sqlString, $this->dbConnect);
					if(!$tmpQuery)
					{
						throw new Exception('<strong>SQL Query:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
					} else {
						return true;
					}
				} catch(Exception $e) {
					echo '<p>'.$e->getMessage().'</p>';
					return false;
				}
			break;
		}
	}

	public function __destruct()
	{
		@mysql_close($this->dbConnect);
	}
}

class UrlRequest
{
	protected $result;
	protected $value = array();
	
	public function __construct()
	{
		if(count(explode('?!', $_SERVER['REQUEST_URI']))>1) {
			list($slash, $this->result) = explode('?!', $_SERVER['REQUEST_URI']);
			$this->value = explode('|', $this->result);
		} 
	}
	
	public function level($index)
	{
		if($index>-1 && $index<count($this->value))
		{
			return trim($this->value[$index]);
		} else {
			return false;
		}
	}
	
	public function path()
	{
		return "?!".trim($this->result);
	}
}

?>