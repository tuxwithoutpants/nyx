<?php 
	class vViewHtml { 
	
		private $htmlFileName;
		
		public function __construct() 
		{
		}
		
		public function fViewStatic($request) 
		{				
			$htmlFileName = '';
			
			if(file_exists(htmlDir.$request.'.html'))
				$htmlFileName = htmlDir.$request.'.html';
			
			if(file_exists(htmlDir.$request.'.htm'))
				$htmlFileName = htmlDir.$request.'.htm';
			
			if($htmlFileName != '')
			{
				$strFileContent = file_get_contents($htmlFileName, true);
				echo $strFileContent;
			}				 
		}		
	} 