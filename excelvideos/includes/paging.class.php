<?php
	class paging
	{
		// CONSTRUCTOR
		function paging()
		{
			$this->PageCount=6; // Total page numbers displayed
			$this->AcnhorClass='normaltext5'; // Class given to the anchor tags in this pagenation
			$this->TextClass='normaltext6'; // Class given to the text in this pagenation
		}
		
		//SET THE CURRENT PAGE NUMBER
		function setPageNumber($pageno)
		{
			if($pageno>0)
				$this->PageNumber=$pageno;
			else
				$this->PageNumber=0;
				
			return $this->PageNumber;
		}
		
		// SET THE MAXIMUM NUMBER OF ROWS DISPLAYED IN A PAGE
		function setDisplayRows($maxrows)
		{
			$this->DisplayRows=$maxrows;
			return $this->DisplayRows;
		}
		
		// SET THE FIRST ROW DISPLAYED
		function setStartRow()
		{
			$this->StartRow	=$this->PageNumber*$this->DisplayRows;
			if($this->StartRow>0)
				return $this->StartRow;
			else
				return 0;
		}
		
		// SET THE TOTAL NUMBER OF PAGES TO DISPLAY THE WHOLE RESULTS
		function setTotalPages($totalrows)
		{
			$this->TotalPages=ceil($totalrows/$this->DisplayRows);
			return $this->TotalPages;
		}
		
		// URL
		function setURL($pagename,$querystring)
		{
			$this->URL=$pagename;
			$querystring=unserialize(base64_decode($querystring));
			if(sizeof($querystring))
			{
				$new_qs='';
				foreach($querystring as $variable => $var_val)
				{
					if($variable!='page')
						$new_qs.=$variable.'='.htmlspecialchars($var_val).'&';
				}
			}
			$this->URL.='?'.$new_qs;
		}

		// PAGEING FUNCTION
		function pagenation()
		{
			
			// Style for Anchor tags	
			if($this->AcnhorClass=='')
				$a_class='';
			else
				$a_class='class="'.$this->AcnhorClass.'"';
			
			// Style for texts
			if($this->TextClass=='')
				$text_class='';
			else
				$text_class='class="'.$this->TextClass.'"';
			
			// Display FIRST & PREV Links, if not the first page
			if($this->PageNumber!=0)
				echo '<a href="'.$this->URL.'page=0" '.$a_class.'>&lt;&lt;</a>&nbsp;&nbsp;<a href="'.$this->URL.'page='.($this->PageNumber-1).'" '.$a_class.'>&lt;</a>&nbsp;';
				
			// Display page numbers 1 2 3 etc
			if($this->TotalPages!=1)
			{
				// Change the total page numbers displayed to the smallest of TOTAL PAGES & PAGE COUNT VARIABLE
				$show_count = ($this->TotalPages < $this->PageCount)?$this->TotalPages:$this->PageCount;
				
				if($this->TotalPages > $this->PageCount)
				{
					$max_right=ceil($show_count/2);
					$min_left=$max_right-1;
					if((($this->PageNumber+1+$max_right) <= $this->TotalPages) && (($this->PageNumber+1) - $min_left >0))
						$page=($this->PageNumber+1) - $min_left;
					elseif(($this->PageNumber+1) - $min_left <=0)
						$page=1;						
					else
						$page=$this->TotalPages-$show_count+1;
				}
				else
				{
					$page=1;
				}
				for($i=1;$i<=$show_count;$i++)
				{
					if($page==$this->PageNumber+1)
						echo '<span '.$text_class.'> '.$page.' </span>';
					else
						echo ' <a href="'.$this->URL.'page='.($page-1).'" '.$a_class.'>'.$page.'</a> ';
					if($page==$this->TotalPages)
						break;
					$page++;
				}	
			}
			// Display NEXT & LAST Links, if not the last page
			if($this->PageNumber < ($this->TotalPages-1))
				echo '&nbsp;<a href="'.$this->URL.'page='.($this->PageNumber+1).'" '.$a_class.'>&gt;</a>&nbsp;&nbsp;<a href="'.$this->URL.'page='.($this->TotalPages-1).'" '.$a_class.'>&gt;&gt;</a> ';
		}
	}
?>