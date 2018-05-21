<?php
include("includes/server_config.php"); 
include("database/connection.php");
include("includes/search_functions.php");
include("includes/brogaard_portfolio.php");

$bp = new brogaard_portfolio;

$msg = "";


//Object is created
$sf = new search_functions;
if($_POST['page'] && $_POST['search_txt'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 20;
$previous_btn = true;
$next_btn = true;
$first_btn = false;
$last_btn = false;
$start = $page * $per_page;
/*include"db.php";*/

$search_result = $sf->WS_GET_SEARCH_RESULT($_POST['search_txt'],"100000");
if(count($search_result) >0)
{
	if(count($search_result) < ($start+$per_page))
		{
			$limit_loop = count($search_result);
		}
		else
		{
			$limit_loop = $start+$per_page;
		}
	for($i=$start;$i<$limit_loop;$i++)
	{
		if(($search_result[$i]['GAL_ID'] == 0) && ($search_result[$i]['HS_ID'] == 1))
		{
			?>
            <!-- Start row-->
            <div class="row" style="margin:0 3% !important;">
            
            	<div class="col-md-10" valign="middle">
            		
                    <div class="col-md-3" style="padding:5px !important;">
            			
                        <a href="index.php">
            			<img class="img-responsive1" src="clientadmin/home/thumb/<?php if($search_result[$i]['H_TITLE']!=''){echo $search_result[$i]['H_TITLE'];} else {$search_result[$i]['H_IMG_DESC'];}?>" height="80" width="80"/>
            			</a> 
            		</div>
            	
                	<div class="col-md-7">
            			Image Title : <?=$search_result[$i]['H_IMAGE_NAME']?>
            			<br />
            			Image Description : <?php /*?><?=iconv("UTF-8", "ISO-8859-1//IGNORE", $search_result[$i]['H_IMG_DESC'])?><?php */?>
                        <?php echo utf8_encode(trim(mysql_real_escape_string(substr(strip_tags($search_result[$i]['H_IMG_DESC']),0,100))));?>
            		</div>
            	</div>
                
            </div>
            <!-- End row-->
            
            <!-- Start row-->
            <div class="row" style="margin:0 3% !important;">
            	<hr style="border-top: 1px solid #e8e8e8;">
           	</div>
            <!-- End row-->
            <?php
		}
		/*else
		{*/
			if(($search_result[$i]['GAL_ID'] > 0) && ($search_result[$i]['HS_ID'] == 2))
			{
				$gal_name = $sf->WS_GET_GAL_NAME($search_result[$i]['GAL_ID']);
				$b_gal_images = $bp->WS_GET_BROGAARD_GAL_IMAGES($search_result[$i]['GAL_ID']);
				for($j=1;$j<count($b_gal_images);$j++)
				{
					if($b_gal_images[$j]['H_TITLE'] == $search_result[$i]['H_TITLE'])
					{
						$count = $j;
					}
				}
				?>
              
            <!-- Start row-->
            <div class="row" style="margin:0 3% !important;">
            
            	<div class="col-md-10" valign="middle">
            
            		<div class="col-md-3" style="padding:5px !important">
                    
            			<a href="portfolio/portraits.php?gal_id=<?=$search_result[$i]['GAL_ID']?>#/category_3_zoom/image<?=$count?>">
            			<img class="img-responsive1" src="clientadmin/portfolio_galleries/<?php if($gal_name[0]['GAL_NAME']!=''){echo $gal_name[0]['GAL_NAME'];}?>/portfolio_small/<?=$search_result[$i]['H_TITLE']?>" height="80" width="80"/>
            			</a>
                        
            		</div>
                    
            		<div class="col-md-7">
            			Image Title : <?=$search_result[$i]['H_IMAGE_NAME']?>
            			<br />
            			Image Description : <?php /*?><?=iconv("UTF-8", "ISO-8859-1//IGNORE", $search_result[$i]['H_IMG_DESC'])?><?php */?>
                        <?php echo utf8_encode(trim(mysql_real_escape_string(substr(strip_tags($search_result[$i]['H_IMG_DESC']),0,100))));?>
            		</div>
                    
            	</div>
                
            </div>
            <!-- End row-->
            
            <!-- Start row-->
            <div class="row" style="margin:0 3% !important;">
            	<hr style="border-top: 1px solid #e8e8e8;">
           	</div>
            <!-- End row-->
                <?php	
			}
		/*}*/
	}
	
	/* --------------------------------------------- */
	$query_pag_num = "SELECT COUNT(*) AS count FROM home_slider WHERE H_IMAGE_NAME like '%".$_POST['search_txt']."%' OR H_IMG_DESC like '%".$_POST['search_txt']."%'";
	
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count1 = $row['count'];

/*$count2 = 0;*/

$count = $count1+0;
}
/*else
{*/
	$search_result1 = $sf->WS_GET_SEARCH_RESULT1($_POST['search_txt'],$start,$per_page);
	if(count($search_result1)>0)
	{
		for($k=0;$k<count($search_result1);$k++)
		{
			$get_image_name = $sf->WS_GET_IMAGE_NAME($search_result1[$k]['GAL_ID']);
			$b_gal_images1 = $bp->WS_GET_BROGAARD_GAL_IMAGES($search_result1[$k]['GAL_ID']);
			for($l=1;$l<count($b_gal_images1);$l++)
			{
				if($b_gal_images1[$l]['H_TITLE'] == $get_image_name[0]['H_TITLE'])
				{
					$count1 = $l;
				}
			}
			?>
            
            <!-- Start row-->
            <div class="row" style="margin:0 3% !important;">
            
            	<div class="col-md-10"  valign="middle">
            		
                    <div class="col-md-3" style="padding:5px !important;">
                    
            			<a href="portfolio/index.php">
            			<img class="img-responsive1" src="clientadmin/portfolio_galleries/<?php if($search_result1[$k]['GAL_NAME']!=''){echo $search_result1[$k]['GAL_NAME'];}?>/portfolio_small/<?=$get_image_name[0]['H_TITLE']?>" height="80" width="80" />
            			</a>
                       
            		</div>
                    
            		<div class="col-md-7">
            			Gallery Name : <?=$search_result1[$k]['GAL_NAME']?>
            			<br />
            			Gallery Sub Title : <?=$search_result1[$k]['GAL_SUB_TITLE']?>
            		</div>
            
            	</div>
            
            </div>
            <!-- End row-->
            
            <!-- Start row-->
            <div class="row" style="margin:0 3% !important;">
            	<hr style="border-top: 1px solid #e8e8e8;">
           	</div>
            <!-- End row-->
                <?php
		}
		/* --------------------------------------------- */
	$query_pag_num1 = "SELECT COUNT(*) AS count FROM portfolio_galleries WHERE GAL_NAME like '%".$_POST['search_txt']."%' OR GAL_SUB_TITLE like '%".$_POST['search_txt']."%'";
	
$result_pag_num1 = mysql_query($query_pag_num1);
$row1 = mysql_fetch_array($result_pag_num1);
$count2 = $row1['count'];

/*$count1 = 0;*/

$count = 0+$count2;
	}
	/*}*/
	if((count($search_result) == 0) &&  (count($search_result1)==0))
{
	$count = 0;
	?>
    <br />
    <div align="left" style="font-size:22px;color:#cc0000;font-weight:bold;padding-left:2.5%;">No results were found. Please try a different search.</div>
    <br />
    <?php
}
if((count($search_result) > 0) &&  (count($search_result1) > 0))
{
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count1 = $row['count'];

$result_pag_num1 = mysql_query($query_pag_num1);
$row1 = mysql_fetch_array($result_pag_num1);
$count2 = $row1['count'];

$count = $count1+$count2;
}



$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#cc0000;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
/*$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";*/
$msg = $msg . /*"</ul>" . $goto . $total_string .*/ "</div>";  // Content for pagination
echo $msg;
}

