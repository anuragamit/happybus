<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( ! function_exists('asset_url()'))
     {
       function asset_url()
       {
          return base_url().'assets/';
       }
     }
if(!function_exists('getStatusCode')){
function getStatusCode($status_id)
	{
        $ci=& get_instance();
        $ci->load->database();
		
		 $sql="select code from status_main_cat where id='".$status_id."' and deleted='N'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['code'];
		
		
	}
}
if(!function_exists('GethelpdeshData')){
function GethelpdeshData()
	{
        $ci=& get_instance();
        $ci->load->database();
		
		 $sql="select * from faq where status=1";
		$query = $ci->db->query($sql);
		$result=$query->result_array();
		return $result;
		
		
	}
}

if(!function_exists('gettotalcountqty')){
	function gettotalcountqty($uid)
		{
			$ci=& get_instance();
			$ci->load->database();
			$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
			 $sql="select count(qty) as totalqty from pickup_request where uniqueid='$uid' ";
			$query = $ci->FULFIL->query($sql);
			$result=$query->row_array();
			return $result['totalqty'];
			
			
		}
	}

	if(!function_exists('Getalldriverdatashow')){
		function Getalldriverdatashow($id)
			{
				$ci=& get_instance();
				$ci->load->database();
				$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
				 $sql="select username from users where  user_id='$id'";
				$query = $ci->FULFIL->query($sql);
				$result=$query->row_array();
				return $result['username'];
				
				
			}
		}

		if(!function_exists('GetPickupmainStatus')){
			function GetPickupmainStatus($id)
				{
					$ci=& get_instance();
					$ci->load->database();
					$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
					 $sql="select name from pickup_status where  id='$id'";
					$query = $ci->FULFIL->query($sql);
					$result=$query->row_array();
					return $result['name'];
					
					
				}
			}
	

if(!function_exists('checkvalidskuno')){
	function checkvalidskuno($seller_id,$sku)
		{
			$ci=& get_instance();
			$ci->load->database();
			$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		  $sql="select id from items_m where sku='".$sku."' and super_id='".$ci->session->userdata('user_details_fm')['super_id']."'";
			$query = $ci->FULFIL->query($sql);
			//return $ci->db->last_query(); die();
			$result=$query->num_rows();
			if($result>0){
				return 1;
				}
			else{
			return	1;  
			}
			
			   
		}
	}

	if(!function_exists('add_manifest_request')){
		function add_manifest_request($data_m)
			{   
				$ci=& get_instance();
				$ci->load->database();
				$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
				$entrydate=date("Y-m-d");

				if(!empty($data_m))
				{
					foreach($data_m as $data){
						$uniqueid=$data[0]['uniqueid'];
						$seller_id=$data[0]['seller_id'];
						$sku=$data[0]['sku'];
						$qty=$data[0]['qty'];
						$expire_date=$data[0]['expire_date'];
						$req_date=$entrydate;
						$super_id=$ci->session->userdata('user_details_fm')['super_id'];
					$request_m_data.="('".$uniqueid."', '".$seller_id."','".$sku."','".$qty."','".$expire_date."','".$req_date."','1','PR','".$super_id."'),";   
							 
					}

					$request_m_data=	rtrim($request_m_data,',');


				 $sql="insert into pickup_request(uniqueid,seller_id,sku,qty,expire_date,req_date,pstatus,code,super_id)values ".$request_m_data;
				$query = $ci->FULFIL->query($sql);  
				
				}
				return true;
				
				   
			}
		}

if(!function_exists('getStatusCode_fm')){
function getStatusCode_fm($status_id)
	{
        $ci=& get_instance();
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select code from status_main_cat where id='".$status_id."' and deleted='N'";
		$query = $ci->FULFIL->query($sql);
		$result=$query->row_array();
		return $result['code'];
		
		
	}
}
if(!function_exists('GetPickuptableData')){
function GetPickuptableData($id,$field){
         $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select $field  from pickup_request where id='".$id."'";
		$query = $ci->FULFIL->query($sql);
		//echo $ci->FULFIL->last_query(); die(); 
		$result=$query->row_array();    
		return $result[$field]; 
	
    }
}

if(!function_exists('find_by_seller')){
function find_by_seller()
	{
        $ci=& get_instance();
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$item_query="select item_inventory.id,  items_m.sku,items_m.description ,SUM(item_inventory.quantity) as iqty,item_inventory.update_date,
		items_m.name as item_name,seller_m.name as seller_name  
		from item_inventory
		left join items_m  on items_m.id = item_inventory.item_sku 
		left JOIN seller_m on seller_m.id = item_inventory.seller_id where seller_id='".$ci->session->userdata('user_details_fm')['seller_id']."'  group by item_inventory.item_sku";
		$query = $ci->FULFIL->query($item_query);
		$result=$query->result_array();
		return $result;
		
		
	}
}

if(!function_exists('count_find')){
function count_find()
	{
		$result['SUMqty']=0;
        $ci=& get_instance();
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$item_query="select SUM(quantity) AS SUMqty from item_inventory where seller_id='".$ci->session->userdata('user_details_fm')['seller_id']."'";
		$query = $ci->FULFIL->query($item_query);
		$result=$query->row_array();
		return $result['SUMqty'];
		
		
	}
}
if(!function_exists('seller_info')){
function seller_info(){
	$ci=& get_instance();
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
	 $item_query="select * from seller_m where id='".$ci->session->userdata('user_details_fm')['seller_id']."'"; 
	$query=$ci->FULFIL->query($item_query);
	$result=$query->row_array();
    return $result;
}
}

if(!function_exists('data_shipment_m')){
function data_shipment_m(){
	$ci=& get_instance();
        $ci->load->database();
		  $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
 $item_query="select shipment_m.id , items_m.sku as Item_Sku, cartoon_inventory.sku as Cartoon_Sku,seller_m.name as seller_name,shipment_m.status,shipment_m.item_quantity,shipment_m.cartoon_quantity,shipment_m.date from shipment_m left join items_m on items_m.id = shipment_m.item_sku left join seller_m on seller_m.id = shipment_m.seller left join cartoon_inventory on cartoon_inventory.id = shipment_m.cartoon_sku where shipment_m.seller='".$ci->session->userdata('user_details_fm')['seller_id']."'";
$query = $ci->FULFIL->query($item_query);
		$result=$query->row_array();

	return $result;
}
}

if(!function_exists('Get_user_name')){
function Get_user_name($id=null,$type=null)
	{
	
	
	       $ci=& get_instance();
           $ci->load->database();
		if($type=='user')
		{
		 $siteQry="SELECT name FROM user WHERE id='".$id."' ";
		$query = $ci->db->query($siteQry);
		$countrydata=$query->result_array();
		$name=$countrydata[0]['name'];
		  
		}
		if($type=='customer')
		{
		 $siteQry="SELECT name FROM customer WHERE id='".$id."' ";
		$query = $ci->db->query($siteQry);
		$countrydata=$query->result_array();
		$name=$countrydata[0]['name'];
		}
		if($type=='driver')
		{
		$siteQry="SELECT messenger_name FROM courier_staff WHERE cor_id='".$id."'  ";
		$query = $ci->db->query($siteQry);
		$countrydata=$query->result_array();
		$name=$countrydata[0]['messenger_name'];	
		}
	return $name;
		
	}
}

if(!function_exists('invoiceCountnew')){
	 function invoiceCountnew($invoice_no=null)
	{
		$ci=& get_instance();
        $ci->load->database();
		 $siteQry="select count(id) as total_numCount from Payable_invoice where invoice_no='".$invoice_no."' "; 
		 $query = $ci->db->query($siteQry);
		 $invoiceCountData=$query->row_array();
	
		 return $invoiceCountData;
		
	 }
	}

if(!function_exists('invoiceDetailnew')){
	function invoiceDetailnew($invoice_no=null) 
	{
		$ci=& get_instance();
        $ci->load->database();
	  $siteQry="select SUM(cod_charge) as cod_charge_sum,SUM(return_charge) as return_charge_sum,SUM(service_charge) as service_charge_sum,SUM(cod_amount) as cod_amount_sum,SUM(vat) as vat_sum from Payable_invoice where invoice_no='".$invoice_no."'";
	  $query = $ci->db->query($siteQry);
	   $invoiceCountData=$query->row_array();
	   return $invoiceCountData;


	}
	}

if(!function_exists('getTicketNumber')){
	function getTicketNumber(){
		$ci=& get_instance();
	  $ci->load->database();
	  $sql ="SELECT id FROM contactus order by id desc limit 1";
	  $query = $ci->db->query($sql);
	  $result=$query->row_array();
	  $last_id=$result->id+1;
		return '100'.$last_id.date('s');  
	}
  }


  if(!function_exists('GetUserTableField')){
	function GetUserTableField($id,$field){
	  $ci=& get_instance();
	  $ci->load->database();
	  $sql ="SELECT $field FROM users where id='$id'";
	  $query = $ci->db->query($sql);
	  $row=$query->row_array();
	  return $row[$field];
	  
	  
	}
  }
    /*if(!function_exists('GetSuperIdtoTableDataLM')){
	function GetSuperIdtoTableDataLM($field=null){
	  $ci=& get_instance();
	  $ci->load->database();
	  $sql ="SELECT $field FROM user where id='".$ci->session->userdata('user_details')['super_id']."'"; 
	  $query = $ci->db->query($sql);
	  $row=$query->row_array();
	  return $row[$field];
	  
	  
	}
  }*/

  if(!function_exists('GetallvenderTableField')){
	function GetallvenderTableField($id,$field){
	  $ci=& get_instance();
	  $ci->load->database();
	  $sql ="SELECT $field FROM vendor where id='$id'";
	  $query = $ci->db->query($sql);
	  $row=$query->row_array();
	  return $row[$field];
	  
	  
	}
  }

  if(!function_exists('site_configTable')){
	function site_configTable($field=null)
		{
			$ci=& get_instance();
			$ci->load->database(); 
			 $sql="select $field from site_config";
			$query = $ci->db->query($sql);
			//return $ci->db->last_query(); die();
			$result=$query->row_array();
			return $result[$field];
			
		}
	}    
 if(!function_exists('Get_name_country_by_id')){
function Get_name_country_by_id($fild,$cityid) 
	{
		global $objSmarty;
		//$city_list="select ".$fild." from country where (id='".$cityid."'  || city='".$cityid."'  )";
		
		 $city_list="select ".$fild." from country where (id='".$cityid."'  || city='".$cityid."'  )";
		$citydata=$this->dbh_read->FetchAllResults($city_list);
		$city_name= $citydata[0][$fild];
		return $city_name;
	}
 }
  function Get_name_country_by_id($fild=null,$cityid=null)
	{
		$ci=& get_instance();
        $ci->load->database();	
		 $city_list="select ".$fild." from country where (id='".$cityid."'  || city='".$cityid."'  )";
		  $query=$ci->db->query($city_list);
		$citydata=$query->result_array();
		$city_name= $citydata[0][$fild];
		return $city_name;
	}

	if(!function_exists('get_messanger_tablefield')){   
		function get_messanger_tablefield($messanger_id=null,$field=null)
			{
			
				 $ci=& get_instance();
				$ci->load->database();
				$site_query="select $field from courier_staff where status='Y' and deleted='N' and cor_id='$messanger_id'";
				$query = $ci->db->query($site_query);
				
				//echo $ci->db->last_query();exit;
				
				$result=$query->row_array();
				return $result[$field];
			 
			}	
		}
			if(!function_exists('GetallmessangerData_lm')){   
		function GetallmessangerData_lm($messanger_id=null)
			{
				
			
				 $ci=& get_instance();
				$ci->load->database();
				$site_query="select * from courier_staff where status='Y' and deleted='N' and cor_id='$messanger_id'";
				$query = $ci->db->query($site_query);
				
				//echo $ci->db->last_query();exit;
				
				$result=$query->row_array();
				return $result;
			 
			}	
		}
		
		

if(!function_exists('getDriverNameByid')){
function getDriverNameByid($id)
	{
        $ci=& get_instance();
        $ci->load->database();
		
		 $sql="select messenger_name from courier_staff where cor_id='".$id."' and deleted='N'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['messenger_name'];
		
		
	}
}
if(!function_exists('total_collection')){
function total_collection($shipment){
            $cust_id = $user_id;
            if($shipment['mode']=='CASH'){
                    return '-'.$shipment[0]['service_charge'];
            }
            if($shipment['delivered'] == '6'){
                if(($shipment['origin'] == '29663') && ($shipment['destination'] == '29663')){
                    $price_query = "select return_fees from zone_riyadh_price_set where cust_id='".$cust_id."' limit 1";
                    $price = $this->dbh_read->FetchAllResults($price_query);
                    if($price)
                    {
                        return '-'.$price[0]['return_fees'];
                    }else{
                        $price_query = "select return_fees from zone_riyadh_price_set where cust_id='0' limit 1";
                        $price = $this->dbh_read->FetchAllResults($price_query);
                        return '-'.$price[0]['return_fees'];
                    }
                    
                }else{
                    
                    $from_zone_id = "select zone_id from country where id='".$shipment['origin']."' limit 1";
                    $from_zone_id = $this->dbh_read->FetchAllResults($from_zone_id);
                   
                    $to_zone_id = "select zone_id from country where id='".$shipment['destination']."' limit 1";
                    $to_zone_id = $this->dbh_read->FetchAllResults($to_zone_id);
                    
                    
                    $price_query = "select return_fees from zone_price_set where cust_id='".$cust_id."' and zone_id_form ='".$from_zone_id[0]['zone_id']."' and  zone_id_to ='".$to_zone_id[0]['zone_id']."' limit 1";
                    $price = $this->dbh_read->FetchAllResults($price_query);
                    
                    if($price)
                    {
                        return '-'.$price[0]['return_fees'];
                    }else{
                        $price_query = "select return_fees from zone_price_set where cust_id='0' and zone_id_form ='".$from_zone_id[0]['zone_id']."' and  zone_id_to ='".$to_zone_id[0]['zone_id']."' limit 1";
						print_r($price_query); die;
                        $price = $this->dbh_read->FetchAllResults($price_query);
                        return '-'.$price[0]['return_fees'];
                    }
                }
               
            }
            else{
                return ($shipment['total_amt']-$shipment['service_charge']-$shipment['cod_fees']);
            }
        }
}

if(!function_exists('status_main_cat')){
	function status_main_cat($status_id=null)
		{
			
			  $ci=& get_instance();
			$ci->load->database();
			$sql ="SELECT * FROM status_main_cat";
			$query = $ci->db->query($sql);
			$result=$query->result_array();
			$citydata=$result;
		
			$mainStatusArray=array();
			$mainStatusArray_css=array();
				$i=0;
				for($i=0;$i<sizeof($citydata);$i++)
				{
					$mainStatusArray[$citydata[$i]['id']] = $citydata[$i]['main_status'];
					$mainStatusArray_css[$citydata[$i]['id']] = $citydata[$i]['css'];
				}
				if(empty($mainStatusArray[$status_id]))
				$STATUS_SUB_DATA=$result;
				{
					$j=0;
				for($j=0;$j<sizeof($STATUS_SUB_DATA);$j++)
				{
					$mainStatusArray[$STATUS_SUB_DATA[$j]['id']] = $STATUS_SUB_DATA[$j]['sub_status'];
					$mainStatusArray_css[$STATUS_SUB_DATA[$j]['id']] = $STATUS_SUB_DATA[$j]['css'];
				}
					
					
					}
			
		//print_r($mainStatusArray);
			//return  $mainStatusArray[$status_id]; 
			return  $mainStatusArray[$status_id]; 
		}
	}
	
	if(!function_exists('status_main_cat_fm')){
	function status_main_cat_fm($status_id=null)
		{
			
			  $ci=& get_instance();
			$ci->load->database();
			$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);	
			$sql ="SELECT * FROM status_main_cat";
			$query = $ci->FULFIL->query($sql);
			$result=$query->result_array();
			$citydata=$result;
		
			$mainStatusArray=array();
			$mainStatusArray_css=array();
				$i=0;
				for($i=0;$i<sizeof($citydata);$i++)
				{
					$mainStatusArray[$citydata[$i]['id']] = $citydata[$i]['main_status'];
					$mainStatusArray_css[$citydata[$i]['id']] = $citydata[$i]['css'];
				}
				if(empty($mainStatusArray[$status_id]))
				$STATUS_SUB_DATA=$result;
				{
					$j=0;
				for($j=0;$j<sizeof($STATUS_SUB_DATA);$j++)
				{
					$mainStatusArray[$STATUS_SUB_DATA[$j]['id']] = $STATUS_SUB_DATA[$j]['sub_status'];
					$mainStatusArray_css[$STATUS_SUB_DATA[$j]['id']] = $STATUS_SUB_DATA[$j]['css'];
				}
					
					
					}
			
		//print_r($mainStatusArray);
			//return  $mainStatusArray[$status_id]; 
			return  $mainStatusArray[$status_id]; 
		}
	}
	   

if(!function_exists('getStatus')){
function getStatus($status_id)
	{
        $ci=& get_instance();
        $ci->load->database();
		
        $sql="select main_status from status_main_cat where id='".$status_id."' and deleted='N'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['main_status'];
		
	}
}
if(!function_exists('getStatus_fm')){
function getStatus_fm($status_id=null)
	{
        $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);	
        $sql="select main_status from status_main_cat where id='".$status_id."' and deleted='N'";
		$query = $ci->FULFIL->query($sql);
		$result=$query->row_array();
		return $result['main_status'];
		
	}
}

if(!function_exists('update_stock')){ 
function update_stock($data=array())
	{
        $ci=& get_instance();
        $ci->load->database();
		foreach($data as $rdata)
		{
			
			foreach($rdata as $finaldata)
			{
				
				 $updates="update item_inventory set quantity='".$finaldata['upqty']."' where id='".$finaldata['tableid']."'";
				$query = $ci->db->query($updates);
			}
		}
       		
   }
}
if(!function_exists('update_stock_fm')){ 
function update_stock_fm($data=array())
	{
        $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);	 
		foreach($data as $rdata)
		{
			
			foreach($rdata as $finaldata)
			{
				 $updates="update item_inventory set quantity='".$finaldata['upqty']."' where id='".$finaldata['tableid']."'";
				$query = $ci->FULFIL->query($updates);
			}
		}
       		
   }
}
if(!function_exists('check_stock')){
    function check_stock($seller_id,$sku,$pieces)
	{
         $ci=& get_instance();
         $ci->load->database();
		//echo $pieces."<br>";		 
      $inventory_dataqry="select item_inventory.*,items_m.sku from item_inventory left join items_m on item_inventory.item_sku=items_m.id where item_inventory.seller_id='".$seller_id."' and items_m.sku like'".trim($sku)."'"; 
    	$query = $ci->db->query($inventory_dataqry);
		

    	if($query->num_rows()>0){
    		$inventory_data=$query->result_array();
			$returnarray=array();
			
			//print_r($inventory_data);
		//echo array_sum($inventory_data['quantity']);
		     $totalqty=0;
			 $totalqty1=0;
			foreach($inventory_data as $rdata)
			{
				$totalqty+=$rdata['quantity'];
				
				
				
			}
			
			//print_r($returnarray);
				//echo '<br>xxx'. $pieces;
    		if($pieces<=$totalqty){
				$newpcs=$pieces;
				$ii=0;
				
				foreach($inventory_data as $rdata)
			   {
				
						
					if($newpcs>=$rdata['quantity'] )
					{
					
					$returnarray[$ii]['upqty']=0;
					$newpcs=$newpcs-$rdata['quantity'];	
					$pieces=$pieces-$rdata['quantity'];
					}
					else
					{
						if($pieces>0)
						{
						
						    
						 $newpcs=$rdata['quantity']-$newpcs;
						 $pieces=$pieces-$rdata['quantity'];		
						 $returnarray[$ii]['upqty']=$newpcs; 
						}
						else
						{
						
                                $returnarray[$ii]['upqty']=$rdata['quantity']; 
							}
						  
						 
						
						}
					//echo '<br>yy'. $pieces.'//'.$rdata['sku'];
					$returnarray[$ii]['tableid']=$rdata['id'];
					$returnarray[$ii]['skuid']=$rdata['item_sku'];
					$returnarray[$ii]['quantity']=$rdata['quantity'];
					$returnarray[$ii]['sku']=$rdata['sku'];
					$ii++;
						
			 }
				//print_r($returnarray);
    			return array('succ'=>1,'stArray'=>$returnarray);
    		}
    		else{
		return	'Less Stock';
    		}
    	}
    	else{
    	return	'Invalid SKU';
    	}
		
		}
}
if(!function_exists('check_stock_fm')){
    function check_stock_fm($seller_id,$sku,$pieces)
	{
         $ci=& get_instance();
         $ci->load->database();
		//echo $pieces."<br>";	
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);	 
      $inventory_dataqry="select item_inventory.*,items_m.sku from item_inventory left join items_m on item_inventory.item_sku=items_m.id where item_inventory.seller_id='".$seller_id."' and items_m.sku like'".trim($sku)."'"; 
    	$query = $ci->FULFIL->query($inventory_dataqry);
		

    	if($query->num_rows()>0){
    		$inventory_data=$query->result_array();
			$returnarray=array();
			
			//print_r($inventory_data);
		//echo array_sum($inventory_data['quantity']);
		     $totalqty=0;
			 $totalqty1=0;
			foreach($inventory_data as $rdata)
			{
				$totalqty+=$rdata['quantity'];
				
				
				
			}
			
			//print_r($returnarray);
				//echo '<br>xxx'. $pieces;
    		if($pieces<=$totalqty){
				$newpcs=$pieces;
				$ii=0;
				
				foreach($inventory_data as $rdata)
			   {
				
						
					if($newpcs>=$rdata['quantity'] )
					{
					
					$returnarray[$ii]['upqty']=0;
					$newpcs=$newpcs-$rdata['quantity'];	
					$pieces=$pieces-$rdata['quantity'];
					}
					else
					{
						if($pieces>0)
						{
						
						    
						 $newpcs=$rdata['quantity']-$newpcs;
						 $pieces=$pieces-$rdata['quantity'];		
						 $returnarray[$ii]['upqty']=$newpcs; 
						}
						else
						{
						
                                $returnarray[$ii]['upqty']=$rdata['quantity']; 
							}
						  
						 
						
						}
					//echo '<br>yy'. $pieces.'//'.$rdata['sku'];
					$returnarray[$ii]['tableid']=$rdata['id'];
					$returnarray[$ii]['skuid']=$rdata['item_sku'];
					$returnarray[$ii]['quantity']=$rdata['quantity'];
					$returnarray[$ii]['sku']=$rdata['sku'];
					$ii++;
						
			 }
				//print_r($returnarray);
    			return array('succ'=>1,'stArray'=>$returnarray);
    		}
    		else{
		return	'Less Stock';
    		}
    	}
    	else{
    	return	'Invalid SKU';
    	}
		
		}
}
if(!function_exists('skuDetails')){
    function skuDetails($id)
	{
         $ci=& get_instance();
        $ci->load->database();
		$item_query="select   items_m.description from items_m  where sku='".$id."' ";
		$query = $ci->db->query($item_query);
		$result=$query->row_array();
		return $result['description'];
		 
	} 
}
if(!function_exists('BookingIdCheck_cust_fm')){
function BookingIdCheck_cust_fm($booking_id=null,$cust_id=null)
	{
		
        $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $site_query="select slip_no from shipment where booking_id='".trim($booking_id)."' and cust_id='".$cust_id."' and deleted='N'  ";
		 $query = $ci->FULFIL->query($site_query);
		$result=$query->row_array();
		return $result['slip_no'];
		
	}

}
if(!function_exists('BookingIdCheck_cust')){
function BookingIdCheck_cust($booking_id,$cust_id)
	{
        $ci=& get_instance();
        $ci->load->database();
		 $site_query="select slip_no from shipment where booking_id='".trim($booking_id)."' and cust_id='".$cust_id."' and deleted='N'  ";
		 $query = $ci->db->query($site_query);
		$result=$query->row_array();
		return $result['slip_no'];
		
	}

}

if(!function_exists('CityidByName')){
function CityidByName($name)
	{
		global $COUNTRYTBLBYNAMEID;
		
		$ci=& get_instance();
        $ci->load->database();			
		$siteQry="SELECT id,city FROM country WHERE  (city like '%".$name."%' || city_code like '%".$name."%' || title like '%".$name."%') and status='Y' and deleted='N'";
		$query=$ci->db->query($siteQry);
		$result=$query->row_array();

		return $result['id'];	
	}
}

if(!function_exists('Get_service_id_fm')){
function Get_service_id_fm($name=null)
	{
		$ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$siteQry="select id from services where services_name='".$name."'"; 
		$query = $ci->FULFIL->query($siteQry);
		$result=$query->row_array();
		return $result['id'];
	}
	
}


if(!function_exists('Get_service_id')){
function Get_service_id($name=null)
	{
		$ci=& get_instance();
        $ci->load->database();
		$siteQry="select id from services where services_name='".$name."'"; 
		$query = $ci->db->query($siteQry);
		$result=$query->row_array();
		return $result['id'];
	}
	
}

if(!function_exists('GetAdminUsersite_configData')){
function GetAdminUsersite_configData($field=null)
	{
		$ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$siteQry="select $field from site_config where super_id='".$ci->session->userdata('user_details_fm')['super_id']."'"; 
		$query = $ci->FULFIL->query($siteQry);
		$result=$query->row_array();
		return $result[$field];
	}
	
	
}
if(!function_exists('get_ship_code')){
function get_ship_code()
{
	$string = 'dfsicjkxcvXSNxmaOZpqxnQDlaciwalaciAghakckUIy1234567890';
	$shuffle = str_shuffle($string);
	$random_chars = substr($shuffle, 0, 8);
	$random_chars2 = substr(str_shuffle('dfsicjkxcvXSNxmaOZpqxnQDlaciwalaciAghakckUIy123456789'), 0, 8);
	return strtoupper($random_chars2);
}
}
if(!function_exists('get_unique_code')){
function get_unique_code()
{
	$string = 'dfsicjkxcvXSNxmaOZpqxnQDlaciwalaciAghakckUIy1234567890';
	$shuffle = str_shuffle($string);
	$random_chars = substr($shuffle, 0, 6);
	$random_chars2 = substr(str_shuffle('dfsicjkxcvXSNxmaOZpqxnQDlaciwalaciAghakckUIy123456789'), 0, 6);
	return strtoupper($random_chars2);
}
}
if(!function_exists('GenerateOtp')){
function GenerateOtp()
{
	$string = '1234567890';
	$shuffle = str_shuffle($string);
	$random_chars = substr($shuffle, 0, 6);
	$random_chars2 = substr(str_shuffle('123456789'), 0, 7);
	return   strtoupper($random_chars2);
}
}

if(!function_exists('Generate_awb_number_fm')){
function Generate_awb_number_fm()
	{
    $ci=& get_instance();
    $ci->load->helper('utility');
	$default_format=GetAdminUsersite_configData('default_awb_char');
	$random_chars2= mt_rand(1000000000, 9999999999); 
	$generate_awb_no=$default_format. strtoupper($random_chars2);	
		
	$check=checkAwbNumberExits_fm($generate_awb_no);
	if($check==1){
	Generate_awb_number_fm(); 
	}
	else
	{
	return  $generate_awb_no;	
	}
}
}

if(!function_exists('checkAwbNumberExits_fm')){	
function checkAwbNumberExits_fm($awb_number)
	{
        $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $site_query="select slip_no from shipment where slip_no='".$awb_number."' and deleted='N'";
		 $query = $ci->FULFIL->query($site_query);
		$result=$query->row_array();
		 //$result['slip_no'];
		 if( !empty($result['slip_no']))
		 {
			return 1;
		 }
		 else
		 {
			 return 0;
		 }
		
	}
}
if(!function_exists('Generate_awb_number')){
function Generate_awb_number()
	{
    $ci=& get_instance();
    $ci->load->helper('utility');
	// $default_format=site_configTable('default_awb_char');
	 //if(empty($default_format))
	 $default_format="ABD";
	$random_chars2= mt_rand(1000000000, 9999999999); 
	$generate_awb_no=$default_format.strtoupper($random_chars2);	
		
	$check=checkAwbNumberExits($generate_awb_no);
	if($check==1){
	Generate_awb_number(); 
	}
	else
	{
	return  $generate_awb_no;	
	}
}
}
if(!function_exists('Get_city_id')){
function Get_city_id($fild)
	{
		$ci=& get_instance();
        $ci->load->database();
		
		 $city_list="select id from  country where deleted='N' and (city='".$fild."' or city_code='$fild')";
		 $query = $ci->db->query($city_list);
		 $result=$query->row_array();
		 return $result['id'];
	}
} 
if(!function_exists('get_select_service_id')){
function get_select_service_id($services_name)
	{
		$ci=& get_instance();
        $ci->load->database();
		
		
		 $getCustName="SELECT id FROM services WHERE services_name='".trim($services_name)."' and deleted='N'"; 
		 $query = $ci->db->query($getCustName);
		 $result=$query->row_array();
		 return $result['id'];
	}
}
if(!function_exists('Get_prioduct_uniqueid_fm')){
function Get_prioduct_uniqueid_fm($name) 
	{
		$ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$siteQry="select unique_id from procut_category where cat_name='".$name."'"; 
		$query = $ci->FULFIL->query($siteQry);
		$result=$query->row_array();
		return $result['unique_id'];
	}
}	
if(!function_exists('Get_prioduct_uniqueid')){
function Get_prioduct_uniqueid($name) 
	{
		$ci=& get_instance();
        $ci->load->database();
		
		$siteQry="select unique_id from procut_category where cat_name='".$name."'"; 
		$query = $ci->db->query($siteQry);
		$result=$query->row_array();
		return $result['unique_id'];
	}
}	


function getSingleFildDetailsFromCounty($fild,$cat_id)
{

 
  $ci=& get_instance();
  $ci->load->database();

	if(!empty($cat_id))
		{
	    $sql ="SELECT id,city FROM country where deleted='N'";
		$query = $ci->db->query($sql);
		$COUNTRYTBLBYNAMEID=$query->result_array();
			foreach($COUNTRYTBLBYNAMEID as $key => $val) 
			{
			   if ($val['id']==$cat_id) 
			  return $val[$fild];
			   else if ($val['country']==$cat_id) 
			   return   $val[$fild];
			   else if ($val['city']==$cat_id) 
			   return   $val[$fild];
			}
		}
  
}


function getSingleFildDetailsCountryName($fild,$state_name)
	{
		 $ci=& get_instance();
        $ci->load->database();
		if($state_name)
		{
		$sql ="SELECT id,city FROM country where deleted='N'";
		$query = $ci->db->query($sql);
		$COUNTRYTBLBYNAMEID=$query->result_array();
		foreach($COUNTRYTBLBYNAMEID as $key => $val) 
			{
			   if ($val['country']==$state_name && $val['city']=='') 
			   return   $val[$fild];
			 
			}
		}
	}
	

if(!function_exists('calculatePrice')){
function calculatePrice($service_id=null,$productType=null,$weight=null,$origin=null,$destination=null,$customer_id=null)
{ 
	     $ci=& get_instance();
         $ci->load->database();
		 $ci->load->helper('utility');

	      $default_country='Saudi Arabia';
		  $orignCounrty=getSingleFildDetailsFromCounty('country',$origin);	
		  $destinationCountry=getSingleFildDetailsFromCounty('country',$destination); 
		
		if($orignCounrty== $default_country && $destinationCountry==$default_country)
		{
			// echo "yyyyyyyy";
		$from_zone=getSingleFildDetailsFromCounty('zone_id',$origin);	
	    $to_zone=getSingleFildDetailsFromCounty('zone_id',$destination);	
		if ($from_zone==0)
		$from_zone=2;
		if ($to_zone==0)
		$to_zone=2;
	//==================to get additional weight======================
	 $getlastWeight="select start_weight_range from zone_price_set where service_id='".$service_id."' and unique_id='".$productType."' and zone_id_form='".$from_zone."' and zone_id_to='".$to_zone."'and  end_weight_range='FLAT' and cust_id='".$customer_id."' and deleted='N'"; 
	   $query = $ci->db->query($getlastWeight);
	 $lastWeightData=  $query->row_array();
//echo $ci->db->last_query();exit;
	   $lastWeight=$lastWeightData['start_weight_range'];
	   if($weight>=$lastWeight)
	   {
		   $additionWeight=$weight-$lastWeight;
		   $weight=$lastWeight;
		   }
		   else
		   {
			   $additionWeight=0;
			   }
	
	//========================== check customer exits====================and unique_id='".$productType."' 
	 $checkCustPrice="select COUNT(id) as tcount from zone_price_set where service_id='".$service_id."' and unique_id='".$productType."' and cust_id='".$customer_id."' and zone_id_form='".$from_zone."' and zone_id_to='".$to_zone."'  and ('".round($weight)."' >= cast(start_weight_range AS SIGNED) && ('".round($weight)."' <=cast(end_weight_range AS SIGNED)  ) ) and deleted='N'"; 
	$query = $ci->db->query($checkCustPrice);
	 $chkResult=  $query->row_array();
	
	/*if($chkResult['tcount']>0)
	$customer_id=$customer_id;
	else
	$customer_id=0;*/
	
	//============================= get price by weight===================and unique_id='".$productType."'
	
     $ratesQry="select price,cod_fees,pod_fees from zone_price_set where service_id='".$service_id."' and unique_id='".$productType."' and cust_id='".$customer_id."'  and zone_id_form='".$from_zone."' and zone_id_to='".$to_zone."'  and ('".$weight."' >= cast(start_weight_range AS SIGNED) &&  end_weight_range!='FLAT'  ) and deleted='N'"; 
  
 
 $query = $ci->db->query($ratesQry);
  $ratesdata=  $query->row_array();
 $price=$ratesdata['price']; 
// $codfees=$ratesdata['cod_fees'];
 
if($additionWeight>0)
	
{
	   $query="select price from zone_price_set where service_id='".$service_id."' and cust_id='".$customer_id."' and unique_id='".$productType."' and zone_id_form='".$from_zone."' and zone_id_to='".$to_zone."'  and  end_weight_range='FLAT'   and deleted='N'"; 
	   $query= $ci->db->query($query);
	     $Querydata=  $query->row_array();
	   $addtionalPrice= $additionWeight*$Querydata['price'];
	
	}
	else
	$addtionalPrice=0;
     }
 else
 { 
	 $data="select template_id from customer where deleted='N' and id='".$customer_id."'";
	 $query=$ci->db->query($data);
	 $customerdata=  $query->row_array();
	 $origin_country_id	=	getSingleFildDetailsCountryName('id',$orignCounrty);
	
	  $from_zone=getSingleFildDetailsFromCounty('country_zone_id',$origin_country_id);	
	  $to_zone=getSingleFildDetailsFromCounty('country_zone_id',$destination);
	 $min_weight=	20;
	  if($weight <= $min_weight){
		 $temp_weight	=	$weight;
		}else{
			$temp_weight	=	20;
		}	
		
	   $listingQry1="select additional_half,price from zone_price_set_country where zone_id_form='".$from_zone."' and zone_id_to	='".$to_zone."'   and service_id='".$service_id."'  and ('".$temp_weight."' > cast(start_weight_range AS SIGNED) && '".$temp_weight."' <= cast(end_weight_range AS SIGNED)  ) and template_id='".$customerdata['template_id']."'";
		$query=$ci->db->query($listingQry1);
		 $userdata=  $query->row_array();
	  //	./// echo "xzzzzzzz"; die;
		$price	=$userdata['price']; 
		if($weight <= $min_weight){
			$addtionalPrice	=	0;
		}else{
			$addtionalPrice	=	($weight-$min_weight)*$userdata['additional_half']*2;
		}
	 }
	$newData['price']=$price+$addtionalPrice;
	$newData['cod_fees']=$ratesdata['cod_fees'];
	$newData['pod_fees']=$ratesdata['pod_fees'];
	
	
	
	return $newData;
 //print_r($newData);
	
	}
}

if(!function_exists('getTodayYearMonth')){
function getTodayYearMonth($today_date)//===========================get year month =======================//
	{
		$exploade_date=explode("-",$today_date);
		$Year=$exploade_date[0];
		$month=$exploade_date[1];
		
		
		if($month=="01")
			$month_name='January';
		if($month=="02")
			$month_name='February';
		if($month=="03")
			$month_name='March';
		if($month=="04")
			$month_name='April';
		if($month=="05")
			$month_name='May';
		if($month=="06")
			$month_name='June';
		if($month=="07")
			$month_name='July';
		if($month=="08")
			$month_name='August';
		if($month=="09")
			$month_name='September';
		if($month=="10")
			$month_name='October';
		if($month=="11")
			$month_name='November';
		if($month=="12")
			$month_name='December';			
			
		$month_year_name=$month_name."-".$Year;
		
		return $month_year_name;									
	}
}

	
function skuDetailsBySku($sku)
	{
		 $ci=& get_instance();
         $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $item_query="select   items_m.id from items_m  where sku='".$sku."' ";
		 $query=$ci->FULFIL->query($item_query);
		 $result=$query->result_array();
		 return $result[0]['id'];
		 
	} 
	if(!function_exists('add_shipment_fulfillment_changes')){
	function add_shipment_fulfillment_changes($dataArray=array())
	{	
		 $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		//print_r($dataArray);
	
		
		//print_r($dataArray)."<br>";die;
		  //echo '<pre>';
          //print_r($dataArray); 
		$CURRENT_DATE=date("Y-m-d H:i:s");
		$entrydate=date("Y-m-d H:i:s");
        $dataArrayNew=array();
        foreach($dataArray as $datanew)
		{//$key=-1;
           
            
            $key2 = array_search($datanew['booking_id'], array_column($dataArrayNew, 'booking_id'));
           // echo('zzzz<br>'.$key2) ;
          // echo('zzz<br>'.$dataArrayNew[$key2]['booking_id'].'//'.$datanew['booking_id']) ;
           
             if($dataArrayNew[$key2]['booking_id']==$datanew['booking_id'])     
         
                {
               // echo('vv<br>'.$dataArrayNew[$key2]['booking_id'].'//'.$datanew['booking_id']) ;
                 $dataArrayNew[$key2]['pieces']= $dataArrayNew[$key2]['pieces']+$datanew['pieces'];
                $dataArrayNew[$key2]['total_cod_amt']= $dataArrayNew[$key2]['total_cod_amt']+$datanew['total_cod_amt'];
                $dataArrayNew[$key2]['weight']= $dataArrayNew[$key2]['weight']+$datanew['weight'];
            $key3 = array_search($datanew['sku'], array_column($dataArrayNew[$key2]['sku_details'], 'sku'));
             if( $dataArrayNew[$key2]['sku_details'][$key3]['sku']==$datanew['sku'] )  
            {    
             // echo('cc<br>'.$dataArrayNew[$key2]['sku_details'][$key3]['sku'].'//'.$datanew['sku']) ; 
              
            $dataArrayNew[$key2]['sku_details'][$key3]['pieces']=$dataArrayNew[$key2]['sku_details'][$key3]['pieces']+$datanew['pieces'];
            $dataArrayNew[$key2]['sku_details'][$key3]['weight']=$dataArrayNew[$key2]['sku_details'][$key3]['weight']+$datanew['weight'];
             $dataArrayNew[$key2]['sku_details'][$key3]['total_cod_amt']=$dataArrayNew[$key2]['sku_details'][$key3]['total_cod_amt']+$datanew['total_cod_amt'];
           
             }
            else{
           // echo '<br>dd'.$datanew['sku'];
                 $datanew['sku_details']['sku']=$datanew['sku'];
                 $datanew['sku_details']['total_cod_amt']=$datanew['total_cod_amt'];
                 $datanew['sku_details']['pieces']=$datanew['pieces'];
                 $datanew['sku_details']['status_describtion']=$datanew['status_describtion'];
                 $datanew['sku_details']['weight']=$datanew['weight'];  
                array_push($dataArrayNew[$key2]['sku_details'],$datanew['sku_details']);
            
            }
            
        
                
         }    
        
             else
             {
				 
                // echo '<br>ll'.$datanew['sku'];
              array_push($dataArrayNew, $datanew) ; 
               $lastkey= count($dataArrayNew)-1; 
                 $datanew['sku_details']['sku']=$datanew['sku'];
                 $datanew['sku_details']['total_cod_amt']=$datanew['total_cod_amt'];
                 $datanew['sku_details']['pieces']=$datanew['pieces'];
                 $datanew['sku_details']['status_describtion']=$datanew['status_describtion'];
                 $datanew['sku_details']['weight']=$datanew['weight'];
                 $dataArrayNew[$lastkey]['sku_details'][]=$datanew['sku_details'];
            
               
              
             }
            
         
         
        
        }
		//echo '<pre>';
   // print_r($dataArrayNew); exit;
		foreach($dataArrayNew as $data)
		{
		


           

						
		
			$new_awb_number=$data['slip_no']; 
			
	       $new_pices=$data['pieces'];
		   $new_weight=$data['weight'];
		   $new_cod=$data['total_cod_amt'];
			//$booking_id=$this->ZajilCreateorderId($data);
			$booking_id =	$data['booking_id'];
			$bookingExits=BookingIdCheck_cust_fm($data['booking_id'],$data['cust_id']);
			//echo  $bookingExits; exit;
			 if($bookingExits=='')
			 { 
                 $stockarray=array();
				 //$ReturnstockArray=array();
				
           // echo '<br>slr:'.$data['seller_id'].'ps:->'.$data['pieces'].'stock:'.$data['sku'].'->';
               // $stock_check=$functions->check_stock($data['seller_id'],$data['sku'],$data['pieces']);
			 // echo '<pre>';
			  // print_r($data['sku_details']); 
			
			   
                  foreach($data['sku_details'] as $data4)
		              {
						//  echo "xxxxx";
						
                      $stock_check=check_stock_fm($data['seller_id'],$data4['sku'],$data4['pieces']); 
					
                      //$datacheck=count($stock_check);
                        if($stock_check['succ']==1){
							//array_push($ReturnstockArray,$stock_check['stArray']);
                         $ReturnstockArray[]=$stock_check['stArray']; 
						
						 $insertfieldCo="backorder";
							$insertfieldvalueCo=0;
                        }
						 else if($stock_check=="Less Stock"){
							
							$insertfieldCo="backorder";
							$insertfieldvalueCo=1;
							
							 
							//array_push($ReturnstockArray,$stock_check['stArray']);
                         //$ReturnstockArray[]=$stock_check['stArray'];   
                        }
                      else
                      {
                      array_push($stockarray,$data4['sku']);
                      }
                  }
				 
        if(empty($stockarray))
        {   
		
		
		//print_r($ReturnstockArray); 
		
	        $StockLCount=count($stock_check['StockLocation']);
			
              //insert into shipment (user_id,uniqueid,shippers_ac_no, shippers_ref_no, nrd, slip_no, origin ,destination ,pieces ,weight  ,volumetric_weight ,sender_name ,sender_address  ,sender_phone  ,sender_email ,reciever_name ,reciever_address ,reciever_phone  ,reciever_email  ,service_charge ,status_describtion,entrydate,mode,delivered,cust_id, total_cod_amt,service_id,sku,code,fulfillment
			  $shipment_m_data.="('".$new_awb_number."', '".$data['sku']."','','".$data['seller_id']."','".$data['delivered']."','".$new_pices."','0','".$CURRENT_DATE."','shipment Booked'),";
			  
			 // echo $booking_id;
			// {
			$shipmentInsetValue.="( '".$booking_id."','".$data['user_id']."','".$data['shippers_ac_no']."', '".$data['shippers_ref_no']."', '".$data['nrd']."', '".$data['slip_no']."', '".$data['origin']."','".$data['destination']."','".$data['pieces']."','".$data['weight']."','".$data['volumetric_weight']."','".$data['sender_name']."','".$data['sender_address']."','".$data['sender_phone']."','".$data['sender_email']."','".$data['reciever_name']."' ,'".$data['reciever_address']."' ,'".$data['reciever_phone']."'  ,'".$data['reciever_email']."' ,'".$data['service_charge']."' ,'".$data['status_describtion']."','".$data['entrydate']."','".$data['mode']."','".$data['delivered']."','".$data['cust_id']."','".$data['total_cod_amt']."','".$data['service_id']."','".$data['sku']."','".getStatusCode_fm($data['delivered'])."','Y','$StockLCount','$insertfieldvalueCo','".$ci->session->userdata('user_details_fm')['super_id']."'),";  
			
			
			
			
			
			
			if(!empty($data['sku_details']))
				{
					
					//print_r($ReturnstockArray);
					
					// print_r($data3);
                    foreach($data['sku_details'] as $data3)
		              {  
					  
					  
					      $totalSt=check_stock_totalQty($ci->session->userdata('user_details_fm')['seller_id'],$data3['sku'],$data3['pieces']);
						  $newqty=$totalSt-$data3['pieces'];
						 // $total$stock_check['totalqty'];
                   	$inventoryHistory.="('".$ci->session->userdata('user_details_fm')['seller_id']."','".$ci->session->userdata('user_details_fm')['seller_id']."','".$newqty."','".$totalSt."','".skuDetailsBySku($data3['sku'])."','deducted','".date('Y-m-d H:i:s')."','".$new_awb_number."','".$ci->session->userdata('user_details_fm')['super_id']."'),";  
                   
					   $add_diamention="INSERT INTO diamention(slip_no,booking_id, length, width, height, wieght,piece,sku,description,cod,cust_id,super_id) VALUES ('".$new_awb_number."','".$booking_id."','','','','".$data3['weight']."','".$data3['pieces']."','".$data3['sku']."','".$data3['status_describtion']."','".$data3['total_cod_amt']."','".$data['cust_id']."','".$ci->session->userdata('user_details_fm')['super_id']."')"; 
					$ci->FULFIL->query($add_diamention);	
                    }
					if($insertfieldvalueCo==0){
					 update_stock_fm($ReturnstockArray);
					}
				}
				
				
				if(isset($data['user_type']) && !empty($data['user_type'])){
					$user_type=	$data['user_type'];
				}else{
					$user_type=	'user';
				}
				if($data['delever_time'] == ''){
					$Activites	=	getStatus_fm($data['delivered']);
					$Details	=	getStatus_fm($data['delivered']);
				}else{
					$Activites	=	"Reverse order as per customer request &rarr; Original AWB #".$data['slip_no'];
					$Details	=	"Reverse order as per customer request &rarr; Original AWB #".$data['slip_no'];
				}
			
			$statusInsertData.=" ('".$data['slip_no']."','".$data['sender_city']."','".$data['delivered']."','".$data['CURRENT_TIME']."','".$entrydate."','".$Activites."','".$Details."','".$entrydate."','".$data['user_id']."','".$user_type."','".getStatusCode_fm($data['delivered'])."','".$ci->session->userdata('user_details_fm')['super_id']."'),";
		
				
				if($data['mode']=='COD')
				{
				$codInsertData.="('".$data['cust_id']."','".$data['slip_no']."','".$data['total_cod_amt']."','".$data['year_month_group']."','".$ci->session->userdata('user_details_fm')['super_id']."'),"; 
						
				}
				//==============================================invoice generate query========================================//	
			
			
				// $driver_name	=$this->get_messanger_name($data['messanger_id']);
				// $destination=$this->Get_city_name('',$data['destination']);
				$number=$data['reciever_phone'];
				// $link=$site_url."/gml/".$this->encrypt($data['slip_no'].'/'.mktime());
		//$sendMessage="select templates from msg_template where id IN ('24')";
		//$template=$this->dbh->Query($sendMessage);
		//$dataVal=str_replace('booking_id',$data['slip_no'],$template['templates']);
		
		// $dataVal=str_replace('Link',$link,$dataVal);
		
		//$dataVal=str_replace('Location',$destination,$dataVal);
		// $dataVal=str_replace('number','920026099',$dataVal);
		// $dataVal=str_replace('driver_name',$driver_name,$dataVal);
		// $dataVal=str_replace('shipper',$data['sender_name'],$dataVal);
		// $dataVal=str_replace('sender',$data['reciever_name'],$dataVal);
		// $dataVal=str_replace('New_feedback_link','',$dataVal);	
		
		
				// $CURRENT_DATE=date("Y-m-d H:i:s");
				// $entrydate=date("Y-m-d H:i:s");
				// $status_details_up="SMS Sent To Customer sucessfully. Mobile No: ".$data['reciever_phone'];;
				//   $update_status="insert into status(slip_no,new_location,new_status,pickup_time,pickup_date,Activites,Details,entry_date,user_id,user_type,code,comment) values ('".$data['slip_no']."','".$_SESSION['adminbranchlocation']."','".$data['delivered']."','".$data['CURRENT_TIME']."','".$entrydate."','SMS to receiver','$status_details_up','".$entrydate."','".$_SESSION['useridadmin']."','user','SMS','".mysql_real_escape_string($dataVal)."')";  
				// $this->dbh->Query($update_status);
		
			//*************start Calling Ajoul Update API**********************//
							
							// $functions->trackPush(trim($awb));
			//*********************** End Calling Ajoul Update API************//
					 //SEND_SMS1($number,$dataVal);		 
				
		
		}
		
		}
         }    
		 if($bookingExits=='')
		 {
	$shipmentInsetValue=rtrim($shipmentInsetValue,',');
	$statusInsertData=	rtrim($statusInsertData,',');	 
	$inserdata=	rtrim($inserdata,',');
	$codInsertData=	rtrim($codInsertData,',');	
	$inventoryHistory=rtrim($inventoryHistory,',');
             if(!empty($shipmentInsetValue))
             {
                 
                 
			  $add_shipment="insert into shipment (booking_id,user_id,shippers_ac_no, shippers_ref_no, nrd, slip_no, origin ,destination ,pieces ,weight  ,volumetric_weight ,sender_name ,sender_address  ,sender_phone  ,sender_email ,reciever_name ,reciever_address ,reciever_phone  ,reciever_email  ,service_charge ,status_describtion,entrydate,mode,delivered,cust_id, total_cod_amt,service_id,sku,code,fulfillment,stocklcount,$insertfieldCo,super_id) values ".$shipmentInsetValue; 
			$ci->FULFIL->query($add_shipment);
				$ci->FULFIL->query("insert into inventory_activity (user_id,seller_id,qty,p_qty,item_sku,type,entrydate,awb_no,super_id) values ".$inventoryHistory); 
	$shipment_m_data=	rtrim($shipment_m_data,',');
		$sql_insert="insert into shipment_m(awb_no,item_sku,cartoon_sku,seller,status,item_quantity,cartoon_quantity,date,comment,super_id)values ".$shipment_m_data;
		$ci->FULFIL->query($sql_insert);			
				
		
				
			  $update_status="insert into status(slip_no,new_location,new_status,pickup_time,pickup_date,Activites,Details,entry_date,user_id,user_type,code,super_id) values".$statusInsertData;
			$ci->FULFIL->query($update_status);
			
				}
			
			
      
										
			return true;
        }
	}	
	}
	function check_stock_totalQty($seller_id=null,$sku=null,$pieces=null)
	{
		$ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		//echo $pieces."<br>";		 
      $inventory_dataqry="select item_inventory.*,items_m.sku from item_inventory left join items_m on item_inventory.item_sku=items_m.id where item_inventory.seller_id='".$seller_id."' and items_m.sku like'".trim($sku)."'"; 
	   $query = $ci->FULFIL->query($inventory_dataqry);
		

    	if($query->num_rows()>0){
			$inventory_data=$query->result_array();
			$returnarray=array();
			
			//print_r($inventory_data);
		//echo array_sum($inventory_data['quantity']);
		     $totalqty=0;
			 $totalqty1=0;
			foreach($inventory_data as $rdata)
			{
				$totalqty+=$rdata['quantity'];
				
			}
			
			return $totalqty;
		
    	}
    	
		
		}
	
	
	//================check awb number exits====================//
if(!function_exists('checkAwbNumberExits')){	
function checkAwbNumberExits($awb_number)
	{
        $ci=& get_instance();
        $ci->load->database();
		 $site_query="select slip_no from shipment where slip_no='".$awb_number."' and deleted='N'  ";
		 $query = $ci->db->query($site_query);
		$result=$query->row_array();
		 //$result['slip_no'];
		 if( !empty($result['slip_no']))
		 {
			return 1;
		 }
		 else
		 {
			 return 0;
		 }
		
	}
}
if(!function_exists('createOrderFulfillment')){
function createOrderFulfillment($dataArray)

	{
		$ci=& get_instance();
        $ci->load->database();
        $ci->load->helper('utility');
		$CURRENT_DATE=date("Y-m-d H:i:s");
		$entrydate=date("Y-m-d H:i:s");
        $dataArrayNew=array();
        foreach($dataArray as $datanew)
		{//$key=-1;
           
            
            $key2 = array_search($datanew['booking_id'], array_column($dataArrayNew, 'booking_id'));
           // echo('zzzz<br>'.$key2) ;
          // echo('zzz<br>'.$dataArrayNew[$key2]['booking_id'].'//'.$datanew['booking_id']) ;
           
             if($dataArrayNew[$key2]['booking_id']==$datanew['booking_id'])     
         
                {
               // echo('vv<br>'.$dataArrayNew[$key2]['booking_id'].'//'.$datanew['booking_id']) ;
                 $dataArrayNew[$key2]['pieces']= $dataArrayNew[$key2]['pieces']+$datanew['pieces'];
                $dataArrayNew[$key2]['total_cod_amt']= $dataArrayNew[$key2]['total_cod_amt']+$datanew['total_cod_amt'];
                $dataArrayNew[$key2]['weight']= $dataArrayNew[$key2]['weight']+$datanew['weight'];
            $key3 = array_search($datanew['sku'], array_column($dataArrayNew[$key2]['sku_details'], 'sku'));
             if( $dataArrayNew[$key2]['sku_details'][$key3]['sku']==$datanew['sku'] )  
            {    
             // echo('cc<br>'.$dataArrayNew[$key2]['sku_details'][$key3]['sku'].'//'.$datanew['sku']) ; 
              
            $dataArrayNew[$key2]['sku_details'][$key3]['pieces']=$dataArrayNew[$key2]['sku_details'][$key3]['pieces']+$datanew['pieces'];
            $dataArrayNew[$key2]['sku_details'][$key3]['weight']=$dataArrayNew[$key2]['sku_details'][$key3]['weight']+$datanew['weight'];
             $dataArrayNew[$key2]['sku_details'][$key3]['total_cod_amt']=$dataArrayNew[$key2]['sku_details'][$key3]['total_cod_amt']+$datanew['total_cod_amt'];
           
             }
            else{
           // echo '<br>dd'.$datanew['sku'];
                 $datanew['sku_details']['sku']=$datanew['sku'];
                 $datanew['sku_details']['total_cod_amt']=$datanew['total_cod_amt'];
                 $datanew['sku_details']['pieces']=$datanew['pieces'];
                 $datanew['sku_details']['status_describtion']=skuDetails($datanew['sku']);
                 $datanew['sku_details']['weight']=$datanew['weight'];  
                array_push($dataArrayNew[$key2]['sku_details'],$datanew['sku_details']);
            
            }
            
        
                
         }    
        
             else
             {
                // echo '<br>ll'.$datanew['sku'];
              array_push($dataArrayNew, $datanew) ; 
               $lastkey= count($dataArrayNew)-1; 
                 $datanew['sku_details']['sku']=$datanew['sku'];
                 $datanew['sku_details']['total_cod_amt']=$datanew['total_cod_amt'];
                 $datanew['sku_details']['pieces']=$datanew['pieces'];
                 $datanew['sku_details']['status_describtion']=skuDetails($datanew['sku']);
                 $datanew['sku_details']['weight']=$datanew['weight'];
                 $dataArrayNew[$lastkey]['sku_details'][]=$datanew['sku_details'];
            
               
              
             }
         }
   // print_r($dataArrayNew); exit;
		foreach($dataArrayNew as $data)
		{
					$new_awb_number=$data['slip_no']; 
			
	       $new_pices=$data['pieces'];
		   $new_weight=$data['weight'];
		   $new_cod=$data['total_cod_amt'];
			//$booking_id=$this->ZajilCreateorderId($data);
			$booking_id =	$data['booking_id'];
			$bookingExits=BookingIdCheck_cust($data['booking_id'],$data['cust_id']);
		
			 if($bookingExits=='')
			 { 
                     $stockarray=array();
				     foreach($data['sku_details'] as $data4)
		              {
                     $stock_check=check_stock($data['seller_id'],$data4['sku'],$data4['pieces']); 
                      //$datacheck=count($stock_check);
                        if($stock_check['succ']==1){
							//array_push($ReturnstockArray,$stock_check['stArray']);
                         $ReturnstockArray[]=$stock_check['stArray'];   
                        }
                      else
                      {
                      array_push($stockarray,$data4['sku']);
                      }
                  }
			//print_r($stockarray);exit;	 
        if(empty($stockarray))
        {    
		
			  $shipment_m_data.="('".$new_awb_number."', '".$data['sku']."','','".$data['seller_id']."','".$data['delivered']."','".$new_pices."','0','".$CURRENT_DATE."','shipment Booked'),";
			// {
			$shipmentInsetValue.="( '".($data['booking_id'])."','".$data['user_id']."','".$data['shippers_ac_no']."', '".$data['shippers_ref_no']."', '".$data['nrd']."', '".$data['slip_no']."', '".$data['origin']."','".$data['destination']."','".$data['pieces']."','".$data['weight']."','".$data['volumetric_weight']."','".$data['sender_name']."','".$data['sender_address']."','".$data['sender_phone']."','".$data['sender_email']."','".($data['reciever_name'])."' ,'". ($data['reciever_address'])."' ,'".$data['reciever_phone']."'  ,'".$data['reciever_email']."' ,'".$data['service_charge']."' ,'".$data['status_describtion']."','".$data['entrydate']."','".$data['mode']."','".$data['delivered']."','".$data['cust_id']."','".$data['total_cod_amt']."','".$data['service_id']."','".$data['sku']."','".getStatusCode($data['delivered'])."','Y'),";  
			if(!empty($data['sku_details']))
				{
					//print_r($ReturnstockArray);
					 update_stock($ReturnstockArray);
                    foreach($data['sku_details'] as $data3)
		              {
                   
					  $add_diamention="INSERT INTO diamention(slip_no,booking_id, length, width, height, wieght,piece,sku,description,cod) VALUES ('".$new_awb_number."','".$booking_id."','','','','".$data3['weight']."','".$data3['pieces']."','".$data3['sku']."','".$data3['status_describtion']."','".$data3['total_cod_amt']."')"; 
					$ci->db->query($add_diamention);
                    }
				}
				if(isset($data['user_type']) && !empty($data['user_type'])){
					$user_type=	$data['user_type'];
				}else{
					$user_type=	'user';
				}
				if($data['delever_time'] == ''){
					$Activites	=	getStatus($data['delivered']);
					$Details	=	getStatus($data['delivered']);
				}else{
					$Activites	=	"Reverse order as per customer request &rarr; Original AWB #".$data['slip_no'];
					$Details	=	"Reverse order as per customer request &rarr; Original AWB #".$data['slip_no'];
				}
			
			$statusInsertData.=" ('".$data['slip_no']."','".$data['sender_city']."','".$data['delivered']."','".$data['CURRENT_TIME']."','".$entrydate."','".$Activites."','".$Details."','".$entrydate."','".$data['user_id']."','".$user_type."','".getStatusCode($data['delivered'])."'),";
		
				
				if($data['mode']=='COD')
				{
				$codInsertData.="('".$data['cust_id']."','".$data['slip_no']."','".$data['total_cod_amt']."','".$data['year_month_group']."'),"; 
						
				}
				//==============================================invoice generate query========================================//	
			
			
							 
				
		
		}
		
		}
         }    
		 if($bookingExits=='')
		 {
	$shipmentInsetValue=rtrim($shipmentInsetValue,',');
	$statusInsertData=	rtrim($statusInsertData,',');	 
	$inserdata=	rtrim($inserdata,',');
	$codInsertData=	rtrim($codInsertData,',');	
             if(!empty($shipmentInsetValue))
             {
                 
                 
			  $add_shipment="insert into shipment (booking_id,user_id,shippers_ac_no, shippers_ref_no, nrd, slip_no, origin ,destination ,pieces ,weight  ,volumetric_weight ,sender_name ,sender_address  ,sender_phone  ,sender_email ,reciever_name ,reciever_address ,reciever_phone  ,reciever_email  ,service_charge ,status_describtion,entrydate,mode,delivered,cust_id, total_cod_amt,service_id,sku,code,fulfillment) values ".$shipmentInsetValue; 
			  
              $ci->db->query($add_shipment);
	
			
				
			  $update_status="insert into status(slip_no,new_location,new_status,pickup_time,pickup_date,Activites,Details,entry_date,user_id,user_type,code) values".$statusInsertData;
			$ci->db->query($update_status);
			//echo $ci->db->last_query();exit;
		
				}
			
      
										
			 return true;
        }
	}
}
	 if(!function_exists('getusertypedropdown')){
	  function getusertypedropdown($id=null){
		  
		$ci=& get_instance();
        $ci->load->database();
        $sql ="SELECT id,designation_name FROM designation_tbl";
		$query = $ci->db->query($sql);
		 $result=$query->result_array();
		 $userdrop='<select class="form-control" name="usertype" id="usertype"><option value="">Please Select</option>';
		 foreach($result as $row)
		 {
			 if($row['id']==$id)
			$userdrop.='<option value="'.$row['id'].'" selected="selected">'.$row['designation_name'].'</option>';
			else
			$userdrop.='<option value="'.$row['id'].'">'.$row['designation_name'].'</option>';
		 }
		  $userdrop.='</select>';
		 return $userdrop;
	  }
    }
	
	
	if(!function_exists('Getallskudatadetails')){
	  function Getallskudatadetails($slip_no=null){
		$ci=& get_instance();
        $ci->load->database();
		$sql ="select (select id from items_m where items_m.sku=diamention.sku)as itmSku,piece from diamention where deleted='N' and slip_no='".$slip_no."'";
		$query = $ci->db->query($sql);
		$result=$query->result_array();
		return $result;
	  }
	}
	if(!function_exists('getusertypenameshow')){
	  function getusertypenameshow($id=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT id,designation_name FROM designation_tbl where id='$id'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['designation_name'];
	  }
	}  

	if(!function_exists('get_total_current1')){
		function get_total_current1($status=null){
			
			$ci=& get_instance();
			$ci->load->database();		  
	   
	   $current_date_new='';
			  $current_date	=	 date('Y-m-d');
			  $current_date_new ="	 and DATE(entrydate) = '".$current_date."' ";
	
		  $total	=	0;
		  $status_condition="and delivered='".$status."'";
		
		  $sql ="select id from shipment where  status='Y' and deleted='N' and cust_id='".$ci->session->userdata('user_details')['user_id']."'  $status_condition $current_date_new ";
		  $query = $ci->db->query($sql);
		  //return $ci->db->last_query();exit;
		  $result=$query->result_array();
		 //echo $ci->db->last_query();exit;
		   return count($result);
		}
	  }

	  	function getDataFromShipmetMonthWise($cust_id=null){
		
	
	      $ci=& get_instance();
         $ci->load->database();
	   // $ci->LMDB=$ci->load->database('lastmile_id',TRUE);
	    // $super_id=GetFMclientSuperID_lm($cust_id);
		$query=$ci->db->query("SELECT MONTHNAME(entrydate) AS label,COUNT(DISTINCT id) as y FROM shipment where status='Y' and cust_id='".$ci->session->userdata('user_details')['user_id']."'  and deleted='N' $custid_condition GROUP BY label");
		$shipment_data= $query->result_array();
		return json_encode($shipment_data,JSON_NUMERIC_CHECK); 
	}

	if(!function_exists('get_total_current')){
	  function get_total_current($status=null){
		  
		
		$date1=date('Y-m-d');
		
	 
	 $current_date_new='';
	//	if($current_date == 1){
			$current_date	=	 date('Y-m-d');
			$current_date_new ="	 and DATE(entrydate)='".$current_date."' ";
		//}
		 if($status_slug =='11' || $status_slug =='6')
		{
			$current_date	=	 date('Y-m-d');
			$current_date_new ="	 and DATE(delever_date)='".$current_date."' ";
			}
		$total	=	0;
		$status_condition="and delivered='".$status."'";
		  $ci=& get_instance();
        $ci->load->database();
		 $sql ="select id from shipment where  status='Y' and deleted='N' and cust_id='".$ci->session->userdata('user_details')['user_id']."'  $status_condition $current_date_new ";
		$query = $ci->db->query($sql);
		$result=$query->result_array();
		if(!empty($result))
		 return count($result);
		 else
		 return 0;
	  }
	}

	if(!function_exists('scheduled_shipments')){
	  function scheduled_shipments($id=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="select count(*) as sh_id from shipment where shipment.schedule_status='Y' and refused!= 'YES' and DATE(shipment.schedule_date) >='".date('Y-m-d')."' and delivered NOT IN (11,6) and shipment.deleted='N'";
		$query = $ci->db->query($sql);
		//return $ci->db->last_query();exit;
		$result=$query->row_array();
		if($result>0){
			return $result['sh_id'];
		}
		return 0;
	  }
	}
	
if(!function_exists('getUserNameById')){
	  function getUserNameById($id=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT username FROM users where user_id='$id'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['username'];
	  }
	}
	if(!function_exists('getpickuplist_tblDatashow')){
	  function getpickuplist_tblDatashow($slip_no=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT sku FROM pickuplist_tbl where slip_no='$slip_no'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['sku'];
	  }
	}
	
	if(!function_exists('getUserNameByIdType')){
	  function getUserNameByIdType($id=null,$usertype=null){
		
		$ci=& get_instance();
        $ci->load->database();
		
		if($usertype=='customer')
		$sql ="SELECT name as username FROM customer where id='$id'";
		else
		$sql ="SELECT username FROM users where user_id='$id'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['username'];
	  }
	}


if(!function_exists('statusCount')){
	  function statusCount($id=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT COUNT(ID) as total_cnt FROM shipment  where delivered='".$id."' and deleted='N'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['total_cnt'];
	  }
	}
	if(!function_exists('getallsratusshipmentid')){
	  function getallsratusshipmentid($shipid=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT $field FROM shipment  where id='$shipid'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}
	
	if(!function_exists('GetshpmentDataByawb')){
	  function GetshpmentDataByawb($awb=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT $field FROM shipment  where slip_no='$awb'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}
if(!function_exists('getAllDestination')){
	  function getAllDestination($id=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT id,city FROM country where deleted='N' and city!=''";
		$query = $ci->db->query($sql);
		$result=$query->result_array();
		return $result;
	  }
	}
	
	if(!function_exists('getitembulduploadData')){
	  function getitembulduploadData($data,$stock_location){
		  $ci=& get_instance();
         $ci->load->database();
		 $ci->db->select('*');
		 $ci->db->from('item_inventory');
		 $ci->db->where('item_sku',$data['item_sku']);
		 $ci->db->where('seller_id',$data['seller_id']);
		 $ci->db->where('expity_date',$data['expity_date']);
		 $ci->db->where('stock_location',$stock_location);
		 $query2=$ci->db->get();
		 
		return $query2->row();
	  }
	}
	if(!function_exists('getallitemskubyid')){
		function getallitemskubyid($sku=null){
			$ci=& get_instance();
		  $ci->load->database();
		  $sql ="SELECT id FROM items_m where sku='$sku'";
		  $query = $ci->db->query($sql);
		  $result=$query->row_array();
		  return $result['id'];
		}
	  }



if(!function_exists('getalldataitemtables')){
	  function getalldataitemtables($id=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT $field FROM items_m where id='$id'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}

if(!function_exists('checkThisMonthShipmentInvoiceAlreadyExits')){
function checkThisMonthShipmentInvoiceAlreadyExits($month_year,$customer_id)
	{
		$ci=& get_instance();
        $ci->load->database();
		$listingQry="select invoice_id from shipment_invoice_details where user_id='".$customer_id."' and invoice_month_year='".$month_year."' and deleted='N'"; 
		$query = $ci->db->query($listingQry);
		
		if($query->num_rows()>0)
		{
			$query_data=$query->result_array();
		    $return_value=$query_data[0]['invoice_id'];
		}
		else
		{
			 $return_value=$Default_Invoice_id;
			
		}
		//echo $return_value; exit;
		return $return_value;	
	}
}

	if(!function_exists('add_shipment_All')){
		function add_shipment_All($dataArray=array()){
		$ci=& get_instance();
        $ci->load->database();
		//print_r($dataArray); die;
		
		
		
		//print_r($dataArray)."<br>";die;
		 
		$CURRENT_DATE=date("Y-m-d H:i:s");
		$entrydate=date("Y-m-d H:i:s");
		foreach($dataArray as $data)
		{
		 { 
		 
		 
			$new_awb_number=$data['slip_no']; 
			$booking_id =	$data['booking_id'];
				$shipmentInsetValue.="('".$data['user_id']."','".$data['uniqueid']."','".$data['shippers_ac_no']."', '".$data['shippers_ref_no']."', '".$data['nrd']."', '".$data['slip_no']."', '".$data['origin']."','".$data['next_station']."','".$data['destination']."','".$data['pieces']."','".$data['weight']."','".$data['volumetric_weight']."','".$data['sender_name']."','".$data['sender_address']."','".$data['sender_zip']."','".$data['sender_phone']."','".$data['sender_city']."' ,'".$data['sender_email']."','".$data['reciever_name']."' ,'".$data['reciever_address']."' ,'".$data['reciever_zip']."' ,'".$data['reciever_phone']."' ,'".$data['reciever_city']."' ,'".$data['reciever_email']."' ,'".$data['contents']."' ,'".$data['declared_charge']."' ,'".$data['service_charge']."' ,'".$data['packing_charge']."' ,'".$data['service_tax']."' ,'".$data['valuation_charges']."' ,'".$data['other_charges']."','".$data['total_amt']."','".$data['status_describtion']."','".$data['delevered_to']."', '".$data['delevered_no']."','".$data['entrydate']."','".$data['booking_mode']."','".$data['mode']."','".$data['pickup_time']."','".$data['pickup_date']."','".$data['expected_date']."','".$data['delivered']."','".$data['messanger_id']."','".$data['cust_id']."','".$data['total_cod_amt']."','".$data['service_id']."','".$data['sku']."','".$data['cod_fees']."','".$data['shipment_all_city']."','".$data['product_type']."','".$data['client_type']."','".$booking_id."','".$data['pod']."','".$data['pod_fees']."','".$data['delever_time']."','".getStatusCode($data['delivered'])."','".$data['shipping_zone']."'),";  
			
				if(isset($data['user_type']) && !empty($data['user_type'])){
					$user_type=	$data['user_type'];
				}else{
					$user_type=	'user';
				}
				if($data['delever_time'] == ''){
					$Activites	=	getStatus($data['delivered']);
					$Details	=	getStatus($data['delivered']);
				}else{
					$Activites	=	"Reverse order as per customer request &rarr; Original AWB #".$data['slip_no'];
					$Details	=	"Reverse order as per customer request &rarr; Original AWB #".$data['slip_no'];
				}
			
			$statusInsertData.=" ('".$data['slip_no']."','".$data['sender_city']."','".$data['delivered']."','".$data['CURRENT_TIME']."','".$entrydate."','".$Activites."','".$Details."','".$entrydate."','".$data['user_id']."','".$user_type."','".getStatusCode($data['delivered'])."'),";
		
				foreach($data['parcel_weight'] as $key=>$val )
				{ 
					$inserdata.= "('".$new_awb_number."','".$data['parcel_girth'][$key]."','".$data['parcel_width'][$key]."','".$data['parcel_height'][$key]."','".$data['parcel_weight'][$key]."')".','; 
			
					}	
				if($data['mode']=='COD')
				{
				$codInsertData.="('".$data['cust_id']."','".$data['slip_no']."','".$data['total_cod_amt']."','".$data['year_month_group']."'),"; 
						
				}
				//==============================================invoice generate query========================================//	
			$check_invoice_exits=checkThisMonthShipmentInvoiceAlreadyExits($data['year_month_group'],$data['cust_id']);
			
			if($check_invoice_exits==$Default_Invoice_id)
			{
				$query25="select invoice_id from shipment_invoice_details where deleted='N' order by id desc limit 0,1";
				$query = $ci->db->query($query25);
		        $query_data=$query->result_array();
					$last_invoice_id=$query_data[0]['invoice_id'];
					if($last_invoice_id>0)
					{
					$current_invoice_id=$last_invoice_id+1;
					}
					else
					{
					$current_invoice_id=$Default_Invoice_id+1;
					}
				
				$invoice_query="insert into shipment_invoice_details(invoice_id,user_id,invoice_month_year,total_payment,due_amout,paid_amount,entry_date,invoice_status)values('".$current_invoice_id."','".$data['cust_id']."','".$data['year_month_group']."','".$data['total_amt']."','".$data['total_amt']."','0','".date("Y-m-d H:i:s")."','UN PAID')"; 
				$ci->db->query($invoice_query);
				
				
			}
			else
			{
			 	$query65="select total_payment,due_amout,paid_amount from shipment_invoice_details where invoice_id='".$check_invoice_exits."' and  deleted='N' ";
				$query65 = $ci->db->query($query65);
		        $query_data=$query65->result_array();
				$invoice_total_amout=$query_data[0]['total_payment']+$data['total_amt'];
				$invoice_paid_amout=$query_data[0]['paid_amount'];
				$invoice_due_amout=$invoice_total_amout-$invoice_paid_amout;
				$update_invoice_query="update shipment_invoice_details set total_payment='".$invoice_total_amout."',paid_amount='".$invoice_paid_amout."',due_amout='".$invoice_due_amout."',invoice_status='UN PAID' where invoice_id='".$check_invoice_exits."'"; 
				$ci->db->query($update_invoice_query);
				
			}
							 
				
		}
		}
	$shipmentInsetValue=	rtrim($shipmentInsetValue,',');
	$statusInsertData=	rtrim($statusInsertData,',');	 
	$inserdata=	rtrim($inserdata,',');
	$codInsertData=	rtrim($codInsertData,',');	
			   $add_shipment="insert into shipment (user_id,uniqueid,shippers_ac_no, shippers_ref_no, nrd, slip_no, origin,next_station ,destination ,pieces ,weight  ,volumetric_weight ,sender_name ,sender_address ,sender_zip ,sender_phone ,sender_city ,sender_email ,reciever_name ,reciever_address ,reciever_zip ,reciever_phone ,reciever_city ,reciever_email  ,contents ,declared_charge ,service_charge ,packing_charge ,service_tax ,valuation_charges ,other_charges,total_amt,status_describtion, delevered_to, delevered_no, entrydate,booking_mode,mode,pickup_time,pickup_date,expected_date,delivered,messanger_id,cust_id, total_cod_amt,service_id,sku,cod_fees,shipment_all_city,product_type,client_type,booking_id,pod,pod_fees,delever_time,code,shipping_zone) values ".$shipmentInsetValue;
			$ci->db->query($add_shipment);
				
				
				if(!empty($inserdata))
				{
					 $add_diamention="INSERT INTO diamention(slip_no, length, width, height, wieght) VALUES ".$inserdata;
					$ci->db->query($add_diamention);
				}
				
				
			   $update_status="insert into status(slip_no,new_location,new_status,pickup_time,pickup_date,Activites,Details,entry_date,user_id,user_type,code) values".$statusInsertData;
			$ci->db->query($update_status);
				
			
				if($data['mode']=='COD')
				{
				$codQry="insert into cod_shipment_details(cust_id,slip_no,cod_ammount,year_month_group)values".$codInsertData; 
				$ci->db->query($codQry);
				
				}
										
			//return true;
		
	}
	  }


if(!function_exists('GetcheckalreadyLocations')){
	  function GetcheckalreadyLocations($stock_location=null,$seller_id=null){
		$ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT id FROM stockLocation where stock_location='$stock_location' and seller_id='$seller_id'";
		$query = $ci->db->query($sql);
		$countdata=$query->num_rows();
		if($countdata==0)
		return true;
		else
		return false;
		
		
	  }
	}


	
	if(!function_exists('GetallaccountidBysellerID')){
	  function GetallaccountidBysellerID($uid=null){
		$ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT seller_id FROM customer where uniqueid='$uid'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['seller_id'];
	  }
	}
if(!function_exists('barcodeRuntime')){		function barcodeRuntime($bar_code_id)
{ 
		// Get pararameters that are passed in through $_GET or set to the default value
	$text = (isset($_GET["text"])?$_GET["text"]: $bar_code_id);
	$size = (isset($_GET["size"])?$_GET["size"]:"80");
	$orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
	$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code128");
	$code_string = "";

	// Translate the $text into barcode the correct $code_type
	if(strtolower($code_type) == "code128")
	{
		$chksum = 104;
		// Must not change order of array elements as the checksum depends on the array's key to validate final code
		$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
		$code_keys = array_keys($code_array);
		$code_values = array_flip($code_keys);
		for($X = 1; $X <= strlen($text); $X++)
		{
			$activeKey = substr( $text, ($X-1), 1);
			$code_string .= $code_array[$activeKey];
			$chksum=($chksum + ($code_values[$activeKey] * $X));
		}
		$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

		$code_string = "211214" . $code_string . "2331112";
	}
	elseif(strtolower($code_type) == "codabar")
	{
		$code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
		$code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");

		// Convert to uppercase
		$upper_text = strtoupper($text);

		for($X = 1; $X<=strlen($upper_text); $X++)
		{
			for($Y = 0; $Y<count($code_array1); $Y++)
			{
				if(substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
					$code_string .= $code_array2[$Y] . "1";
			}
		}
		$code_string = "11221211" . $code_string . "1122121";
	}

	// Pad the edges of the barcode
	$code_length = 40;
	for($i=1; $i <= strlen($code_string); $i++)
		$code_length = $code_length + (integer)(substr($code_string,($i-1),1));

	if(strtolower($orientation) == "horizontal")
	{
		$img_width = $code_length;
		$img_height = $size;
	}
	else
	{
		$img_width = $size;
		$img_height = $code_length;
	}

	$image = imagecreate($img_width, $img_height);
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);

	imagefill( $image, 0, 0, $white );

	$location = 10;
	for($position = 1 ; $position <= strlen($code_string); $position++)
	{
		$cur_size = $location + ( substr($code_string, ($position-1), 1) );
		if(strtolower($orientation) == "horizontal")
			imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		else
			imagefilledrectangle( $image, 0, $location, $img_width, $cur_size, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}
	
	 ob_start ();

    imagejpeg($image);
    imagedestroy($image);

    $data = ob_get_contents ();

    ob_end_clean ();

    $image = base64_encode ($data);
	return $image;
	// Draw barcode to the screen

	//imagejpeg($image,$path,100);	
	//header ('Content-type: image/png');
	//imagepng($image);
	//imagedestroy($image);
}
}
if(!function_exists('Get_cust_uid')){
	  function Get_cust_uid($cust_id=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="select uniqueid from customer where id='".$cust_id."'";
		$query = $ci->db->query($sql);
		//echo $ci->db->last_query();exit;
		$result=$query->row_array();
		return $result['uniqueid'];
	  }
	}
	function GetCheckTimeCancel($time1,$time2)
	{
		
		

		 $time1=strtotime(date('H:I'));
		 $time2=strtotime($time2);
		if($time1<$time2)
		{
			return 1;
			
		}
		else
		return false;
		
	}
	
	if(!function_exists('Get_cust_uid_fm')){
	  function Get_cust_uid_fm($cust_id=null){
		$ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$sql ="select uniqueid from customer where id='".$cust_id."'";
		$query = $ci->FULFIL->query($sql);
		//echo $ci->db->last_query();exit;
		$result=$query->row_array();
		return $result['uniqueid'];
	  }
	}
function getCityCode($city_id=null)
	{ 
	
	    $ci=& get_instance();
        $ci->load->database();
		 $sql="select city_code from country where (id='".$city_id."' or city='".$city_id."') and deleted='N'";
		 $query = $ci->db->query($sql);
		$statusData=$query->row_array();
	return	$status=$statusData['city_code'];
		
	}
	
	function getCityCode_fm($city_id=null)
	{ 
	
	     $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select city_code from country where (id='".$city_id."' or city='".$city_id."') and deleted='N'";
		 $query = $ci->FULFIL->query($sql);
		$statusData=$query->row_array();
	return	$status=$statusData['city_code'];
		
	}
	if(!function_exists('getdestinationfieldshow')){
	  function getdestinationfieldshow($id=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT $field FROM country where id='$id'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}
	if(!function_exists('getdestinationfieldshow_fm')){
	  function getdestinationfieldshow_fm($id=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$sql ="SELECT $field FROM country where id='$id'";
		$query = $ci->FULFIL->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}
	if(!function_exists('GetallitemcheckDuplicate')){
	  function GetallitemcheckDuplicate($sku){
		$ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT id FROM items_m where sku='$sku'";
		$query = $ci->db->query($sql);
		$countdata=$query->num_rows();
		$row=$query->row_array();
		if($countdata>0)
		return $row['id'];
		else
		return false;
		
	  }
	}
	
	
	if(!function_exists('getallmaincatstatus')){
	  function getallmaincatstatus($id=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT $field FROM status_main_cat where id='$id'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}
	
	if(!function_exists('getallmaincatstatus_fm')){
	  function getallmaincatstatus_fm($id=null,$field=null){
		  $ci=& get_instance();
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		$sql ="SELECT $field FROM status_main_cat where id='$id'";
		$query = $ci->FULFIL->query($sql);
		$result=$query->row_array();
		return $result[$field];
	  }
	}
	
	
	
	if(!function_exists('checkPrivilageExitsForCustomer')){
	function checkPrivilageExitsForCustomer($customer_id=null,$privilage_id=null)
	{
		
		$ci=& get_instance();
        $ci->load->database();
		 $sql="select privilage_array from set_user_privilege where customer_id='".$customer_id."' ";
		$query=$ci->db->Query($sql);
		$data=$query->row_array();
		$privilage=$data['privilage_array'];
		
		$privilage_array=explode(',',$privilage);
		
		if(in_array($privilage_id,$privilage_array))
		{
			return 'Y';
		}
		else
		{
			return 'N';
		}
	}
}
	
	if(!function_exists('menuIdExitsInPrivilageArray')){
		function menuIdExitsInPrivilageArray($menu_id)
	   {
		   
		    $ci=& get_instance();
            $ci->load->database();
			$sql="select privilage_array from set_user_privilege where customer_id='".$ci->session->userdata('user_details')['user_id']."'";
			$query = $ci->db->query($sql);
			$result=$query->row_array();  
		    $privielage_array=explode(',',$result['privilage_array']);
			if($ci->session->userdata('user_details')['user_type']==0)
			{
			$return_value="Y";
			}else
			{
				if (in_array($menu_id, $privielage_array)) 
				$return_value="Y";
			else
				$return_value="N";
			}
			
			return $return_value;
	  }
	}
	
	if(!function_exists('getIdfromCityName')){
	  function getIdfromCityName($city){
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT id FROM country where deleted='N' and city Like '".$city."'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['id'];
	  }
	}
	if(!function_exists('get_customer_detail')){
	function get_customer_detail($customer_uid_ac){

		$ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT id,seller_id,secret_key FROM customer where deleted='N' and uniqueid='".$customer_uid_ac."' limit 1";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result;


	}
}
	if(!function_exists('generate_hash')){
    function generate_hash($salt,$password,$algo = 'sha256'){
         return hash($algo,$salt.$password);
    }
      	if(!function_exists('barcodeRuntime'))  
        {
        	function barcodeRuntime($bar_code_id)
{
		// Get pararameters that are passed in through $_GET or set to the default value
	$text = (isset($_GET["text"])?$_GET["text"]: $bar_code_id);
	$size = (isset($_GET["size"])?$_GET["size"]:"80");
	$orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
	$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code128");
	$code_string = "";

	// Translate the $text into barcode the correct $code_type
	if(strtolower($code_type) == "code128")
	{
		$chksum = 104;
		// Must not change order of array elements as the checksum depends on the array's key to validate final code
		$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
		$code_keys = array_keys($code_array);
		$code_values = array_flip($code_keys);
		for($X = 1; $X <= strlen($text); $X++)
		{
			$activeKey = substr( $text, ($X-1), 1);
			$code_string .= $code_array[$activeKey];
			$chksum=($chksum + ($code_values[$activeKey] * $X));
		}
		$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

		$code_string = "211214" . $code_string . "2331112";
	}
	elseif(strtolower($code_type) == "codabar")
	{
		$code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
		$code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");

		// Convert to uppercase
		$upper_text = strtoupper($text);

		for($X = 1; $X<=strlen($upper_text); $X++)
		{
			for($Y = 0; $Y<count($code_array1); $Y++)
			{
				if(substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
					$code_string .= $code_array2[$Y] . "1";
			}
		}
		$code_string = "11221211" . $code_string . "1122121";
	}

	// Pad the edges of the barcode
	$code_length = 40;
	for($i=1; $i <= strlen($code_string); $i++)
		$code_length = $code_length + (integer)(substr($code_string,($i-1),1));

	if(strtolower($orientation) == "horizontal")
	{
		$img_width = $code_length;
		$img_height = $size;
	}
	else
	{
		$img_width = $size;
		$img_height = $code_length;
	}

	$image = imagecreate($img_width, $img_height);
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);

	imagefill( $image, 0, 0, $white );

	$location = 10;
	for($position = 1 ; $position <= strlen($code_string); $position++)
	{
		$cur_size = $location + ( substr($code_string, ($position-1), 1) );
		if(strtolower($orientation) == "horizontal")
			imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		else
			imagefilledrectangle( $image, 0, $location, $img_width, $cur_size, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}
	
	 ob_start ();

    imagejpeg($image);
    imagedestroy($image);

    $data = ob_get_contents ();

    ob_end_clean ();

    $image = "data:image/jpeg;base64,".base64_encode ($data);
	return $image;
	// Draw barcode to the screen

	//imagejpeg($image,$path,100);	
	//header ('Content-type: image/png');
	//imagepng($image);
	//imagedestroy($image);
}
        
        
        }
    }
	if(!function_exists('getsupplierbyid')){
function getsupplierbyid($status_id)
	{
        $ci=& get_instance();
        $ci->load->database();
		
		 $sql="select name from supplier where id='".$status_id."' and deleted='N'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['name'];
		
		
	}
	}
	if(!function_exists('getcitybyid')){
function getcitybyid($status_id)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $sql="select city from country where id='".$status_id."' and deleted='N'";
		$query = $ci->db->query($sql);
		$result=$query->row_array();
		return $result['city'];
		
		
	}
}
function getCity($status_id=null)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $sql="select city from country where  city!='' and deleted='N'";
		$query = $ci->db->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arrayCity=array();
		foreach($result as $val)
		array_push($arrayCity,$val['city']);
		echo json_encode($arrayCity); 
		//return $arrayCity;
		
		
	
}
function getCity_fm($status_id)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		$ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select city from country where  city!='' and deleted='N'";
		$query = $ci->FULFIL->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arrayCity=array();
		foreach($result as $val)
		array_push($arrayCity,$val['city']);
		echo json_encode($arrayCity); 
		//return $arrayCity;
		
		
	
}
function getskuid($seller_id)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select items_m.sku from items_m left join item_inventory on items_m.id=item_inventory.item_sku where item_inventory.shelve_no!='' and item_inventory.seller_id='".$ci->session->userdata('user_details_fm')['seller_id']."' group by items_m.sku ";
		$query = $ci->FULFIL->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arraysku=array();
		foreach($result as $val)
		array_push($arraysku,$val['sku']);
		echo json_encode($arraysku); 
		//return $arrayCity;
		
		
	
}


function GetcustomerAlldata_fm($seller_id=null)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 
		 $sql="select * from customer where id='".$ci->session->userdata('user_details_fm')['user_id']."' and deleted='N' and status='Y' ";
		$query = $ci->FULFIL->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		return $result;
		//return $arrayCity;
		
		
	
}

function getcat_list_fm($seller_id=null)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select cat_name from procut_category where status='Y'";
		$query = $ci->FULFIL->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arraycat=array();
		foreach($result as $val)
		array_push($arraycat,$val['cat_name']);
		echo json_encode($arraycat); 
		//return $arrayCity;
		
		
	
}

  function getcat_list($seller_id)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $sql="select cat_name from procut_category where status='Y'";
		$query = $ci->db->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arraycat=array();
		foreach($result as $val)
		array_push($arraycat,$val['cat_name']);
		echo json_encode($arraycat); 
		//return $arrayCity;
		
		
	
}
function getService_fm($status_id=null)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $ci->FULFIL=$ci->load->database('fulfilm_db',TRUE);
		 $sql="select services_name from services where  services_name!='' and deleted='N'";
		 $query = $ci->FULFIL->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arrayCity=array();
		foreach($result as $val)
		array_push($arrayCity,$val['services_name']);
		echo json_encode($arrayCity); 
		//return $arrayCity;
		
		
	
}
function getService($status_id=null)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $sql="select services_name from services where  services_name!='' and deleted='N'";
		 $query = $ci->db->query($sql);
		//$result=$query->row_array();
		$result=$query->result_array();
		$arrayCity=array();
		foreach($result as $val)
		array_push($arrayCity,$val['services_name']);
		echo json_encode($arrayCity); 
		//return $arrayCity;
		
		
	
}
if(!function_exists('getcityidbyid')){  
function getcityidbyid($status_id)
	{
        $ci=& get_instance();
		
        $ci->load->database();
		 $sql="select city as city_id from country where id='".$status_id."' and deleted='N'";
		$query = $ci->db->query($sql); 
		$result=$query->row_array();
		return $result['city_id'];
		
		
	}
}

if(!function_exists('GetallStatusCountReport')){
function GetallStatusCountReport($channel=null,$status_id=null,$searchArray=array())
	{
        $ci=& get_instance();
        $ci->load->database();
		$user_id=$ci->session->userdata('user_details')['user_id'];
		if(!empty($searchArray))
		 {
			$yearSearch=$searchArray['yearSearch'];
			$monthSearch=$searchArray['monthSearch']; 
			if(!empty($yearSearch))
			$yearsearchcon=" and YEAR(entry_date)='$yearSearch'";
			else
			$yearsearchcon=" and YEAR(entry_date)='".date('Y')."'";
			if(!empty($monthSearch))
			$monthSearchcon=" and MONTH(entry_date)='$monthSearch'";
			else
			$monthSearchcon=" and MONTH(entry_date)='".date('m')."'";
			
			
			
		 }
		 
		 if(empty($channel))
		 $sql="select  COALESCE(SUM(`d_count`),0) as totalcount from delivery_performance where   status_id='$status_id' and cust_id='".$user_id."' $yearsearchcon $monthSearchcon group by cust_id";
		 else
		  $sql="select  COALESCE(SUM(`d_count`),0) as totalcount from delivery_performance where  channel_id='$channel' and  status_id='$status_id' and cust_id='".$user_id."' $yearsearchcon $monthSearchcon group by channel_id";
		  $query = $ci->db->query($sql);
		$total_shipment_data=$query->row_array();
		$totalcount=$total_shipment_data['totalcount'];
		return $totalcount;
		
		
	}
}

	function barcodeRuntime_new($bar_code_id)

{
		// Get pararameters that are passed in through $_GET or set to the default value
	$text = (isset($_GET["text"])?$_GET["text"]: $bar_code_id);
	$size = (isset($_GET["size"])?$_GET["size"]:"40");
	$orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
	$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code128");
	$code_string = "";

	// Translate the $text into barcode the correct $code_type
	if(strtolower($code_type) == "code128")
	{
		$chksum = 104;
		// Must not change order of array elements as the checksum depends on the array's key to validate final code
		$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
		$code_keys = array_keys($code_array);
		$code_values = array_flip($code_keys);
		for($X = 1; $X <= strlen($text); $X++)
		{
			$activeKey = substr( $text, ($X-1), 1);
			$code_string .= $code_array[$activeKey];
			$chksum=($chksum + ($code_values[$activeKey] * $X));
		}
		$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

		$code_string = "211214" . $code_string . "2331112";
	}
	elseif(strtolower($code_type) == "codabar")
	{
		$code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
		$code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");

		// Convert to uppercase
		$upper_text = strtoupper($text);

		for($X = 1; $X<=strlen($upper_text); $X++)
		{
			for($Y = 0; $Y<count($code_array1); $Y++)
			{
				if(substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
					$code_string .= $code_array2[$Y] . "1";
			}
		}
		$code_string = "11221211" . $code_string . "1122121";
	}

	// Pad the edges of the barcode
	$code_length = 20;
	for($i=1; $i <= strlen($code_string); $i++)
		$code_length = $code_length + (integer)(substr($code_string,($i-1),1));

	if(strtolower($orientation) == "horizontal")
	{
		$img_width = $code_length;
		$img_height = $size;
	}
	else
	{
		$img_width = $size;
		$img_height = $code_length;
	}

	$image = imagecreate($img_width, $img_height);
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);

	imagefill( $image, 0, 0, $white );

	$location = 10;
	for($position = 1 ; $position <= strlen($code_string); $position++)
	{
		$cur_size = $location + ( substr($code_string, ($position-1), 1) );
		if(strtolower($orientation) == "horizontal")
			imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		else
			imagefilledrectangle( $image, 0, $location, $img_width, $cur_size, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}
	
	 ob_start ();

    imagejpeg($image);
    imagedestroy($image);

    $data = ob_get_contents ();

    ob_end_clean ();

    $image = "<img src='data:image/jpeg;base64,".base64_encode ($data)."'>";
	return $image;
	// Draw barcode to the screen

	//imagejpeg($image,$path,100);	
	//header ('Content-type: image/png');
	//imagepng($image);
	//imagedestroy($image);
}




if(!function_exists('status_main_cat')){
function status_main_cat($status_id=null)
	{
		
		  $ci=& get_instance();
        $ci->load->database();
		$sql ="SELECT * FROM status_main_cat";
		$query = $ci->db->query($sql);
		$result=$query->result_array();
		$citydata=$result;
	
		$mainStatusArray=array();
		$mainStatusArray_css=array();
			$i=0;
			for($i=0;$i<sizeof($citydata);$i++)
			{
				$mainStatusArray[$citydata[$i]['id']] = $citydata[$i]['main_status'];
				$mainStatusArray_css[$citydata[$i]['id']] = $citydata[$i]['css'];
			}
			if(empty($mainStatusArray[$status_id]))
			$STATUS_SUB_DATA=$result;
			{
				$j=0;
			for($j=0;$j<sizeof($STATUS_SUB_DATA);$j++)
			{
				$mainStatusArray[$STATUS_SUB_DATA[$j]['id']] = $STATUS_SUB_DATA[$j]['sub_status'];
				$mainStatusArray_css[$STATUS_SUB_DATA[$j]['id']] = $STATUS_SUB_DATA[$j]['css'];
			}
				
				
				} 
		//return  $mainStatusArray[$status_id]; 
		return  '<i class="'.$mainStatusArray_css[$status_id].'" aria-hidden="true"></i> '.$mainStatusArray[$status_id]; 
	}
}
function sendMail()
{
    $config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'deepakacharya65@gmail.com', // change it to yours
		'smtp_pass' => 'anotherchanceforme@USA', // change it to yours
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
	);

	$message = '';
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->email->from('deepakacharya65@gmail.com'); // change it to yours
	$this->email->to('deepakacharya65@gmail.com');// change it to yours
	$this->email->subject('Resume from JobsBuddy for your Job posting');
	$this->email->message($message);
	if($this->email->send()){
		echo 'Email sent.';
	}else{
		show_error($this->email->print_debugger());
    }
}