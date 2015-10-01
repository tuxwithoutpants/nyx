<?php 
	class cRouter { 
	
		private $objErr;
		public function __construct () 
		{
			$this->objErr = new cErrorHandling();
			try{
				
				spl_autoload_register(function ($class) 
				{
					if(file_exists(modelDir.$class.'.php'))
					{
						require_once(modelDir.$class.'.php');
					}
					elseif(file_exists(controlDir.$class.'.php'))
					{
						require_once(controlDir.$class.'.php');
					}
					elseif(file_exists(viewDir.$class.'.php'))
					{
						require_once(viewDir.$class.'.php');
					}
					else
					{
						throw new Exception("Class does not exist");
					}
				});
			}
			catch(Exception $e)
			{
				$this->objErr->fOnErr($e, 'spl_autoload_register');
			}
		}
		
		public function fRouter()
		{
			try
			{
				$request = '';
				$method = '';
				$params = '';				
				$objViewHtml = new vViewHtml();
				
				if(isset($_GET['request']))
					$request = $_GET['request'];
				
				if($request == '')
					$request = 'index';
				
				if(file_exists(htmlDir.$request.'.html') || file_exists(htmlDir.$request.'.htm'))
				{
					$objViewHtml->fViewStatic($request);
				}
				else
				{
					if(isset($_GET['method']))
						$method = $_GET['method'];
					
					if(isset($_GET['params']))
						$params = $_GET['params'];
					
				}
			}
			catch(Exception $e)
			{
				$this->objErr->fOnErr($e, 'fRouter');
			}
		}
	} 