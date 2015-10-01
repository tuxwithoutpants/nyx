<?php
	class cErrorHandling
	{
		private $errFile;
		private $errFileName = '';
		
		public function fOnErr($errMsg, $errCaller)
		{	
			$errFileName = date("Ymd") . $errCaller . '.err.log';
			$errFile = fopen($errFileName, "a");
			fwrite($errFile, $errMsg);
			fclose($errFile);
			header('Location: error.html');
		}
	}