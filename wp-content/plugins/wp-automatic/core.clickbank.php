<?php

// Main Class
require_once 'core.php';

Class WpAutomaticClickbank extends wp_automatic{


/*
 * ---* Get Clickbank links ---
 */
function clickbank_fetch_links($keyword, $camp) {
	  echo "<br>so I should now get some links from clickbank ...";

	// ini
	$camp_opt = unserialize ( $camp->camp_options );
	$wp_wp_automatic_cbu = get_option('wp_wp_automatic_cbu','');
	
	// Camp general
	if( stristr($camp->camp_general, 'a:') ) $camp->camp_general=base64_encode($camp->camp_general);
	$camp_general = unserialize ( base64_decode( $camp->camp_general ) );
	$camp_general=array_map('wp_automatic_stripslashes', $camp_general);

	// using clickbank
	$clickkey = urlencode ( $keyword );

	// getting start
	$query = "select clickbank_start from {$this->wp_prefix}automatic_keywords where keyword_name='$keyword' and keyword_camp='{$camp->camp_id}' ";
	$ret = $this->db->get_results ( $query );

	$row = $ret [0];
	$start = $row->clickbank_start;
	// check if the start = -1 this means the keyword is exhausted
	if ($start == '-1') {
			
		//check if it is reactivated or still deactivated
		if($this->is_deactivated($camp->camp_id, $keyword)){
			$start =0;
		}else{
			//still deactivated
			return false;
		}
			
	}
	
	//reglash start 
	$start = ($start == 1)? 0 : $start;
	$offset_part = ($start == 0)? '' : ',"offset":'.$start  ; // ,"offset":10
	echo ' start:'.$start.' ';
	
	//sort ,"sortField":"gravity"
	$sortby = strtolower( $camp->camp_search_order ) ;
	echo ' sort:'.$sortby;
	if($sortby != ''){
		$offset_part.= ',"sortField":"' . $sortby . '"' ;
	}
 	
	//CAT ,"category":"Parenting & Families","subCategory":"Divorce"
	$camp_cb_category = $camp->camp_cb_category;
	
	if(! stristr($camp_cb_category, '=') && $camp_cb_category != 'All' ){
		
		$main_cat = $camp_cb_category; //ini
		$sub_cat = '';
		
		if(strpos($camp_cb_category, ',')){
		
			$cat_parts = explode(',' , $camp_cb_category );

			$main_cat= $cat_parts[0];
			$sub_cat = $cat_parts[1];
			$offset_part.= ',"subCategory":"' . $sub_cat . '"' ;
		}
		
		$offset_part.= ',"category":"' . $main_cat . '"' ;
		
	
	}
	
	
	// Lang ,"productLanguages":["de"]
	$cg_cb_lang = '';
	@$cg_cb_lang = @$camp_general['cg_cb_lang'];
	
	if(trim($cg_cb_lang) == ''){
		$cg_cb_lang = 'EN';
	}
	
	$cg_cb_lang = strtolower($cg_cb_lang);
	
	if($cg_cb_lang != 'all')
	$offset_part.=  ',"productLanguages":["'.$cg_cb_lang.'"]' ;

	//$clickbank = "https://accounts.clickbank.com/mkplSearchResult.htm?dores=true&includeKeywords=seo";
	//$clickbank = "https://$cbname.accounts.clickbank.com/account/mkplSearchResult.htm?includeKeywords=$clickkey&resultsPerPage=50&firstResult=$start&sortField=$sortby&$camp_cb_category&productLanguages=$cg_cb_lang";
	
	$search_keyword = trim($clickkey);
	
	if($keyword == '*') $search_keyword = '';
	
	echo ' for keyword:'.$search_keyword;
	
	/*
	$clickbank = "https://accounts.clickbank.com/mkplSearchResult.htm?includeKeywords=$search_keyword&resultsPerPage=50&firstResult=$start&sortField=$sortby&$camp_cb_category";
	//&productLanguages=$cg_cb_lang
	
	  echo "<br>Clickbank Remote Link:$clickbank....";
  
	// Get
	$x = 'error';
		 
		$url = $clickbank;
		curl_setopt ( $this->ch, CURLOPT_HTTPGET, 1 );
		curl_setopt ( $this->ch, CURLOPT_URL, trim ( $url ) );
			
		$cont = curl_exec ( $this->ch );
		  echo $x = curl_error ( $this->ch );
  
	preg_match_all ( '/details">.*?(http:\/\/zzzzz\..*?net).*?>(.*?)<\/a>/s', $cont, $matches, PREG_PATTERN_ORDER );

	$links = $matches [1];
	$titles = $matches [2];
	*/
	
	// NEW API
	
	echo '<br>Query part:' . $offset_part;
	
	//curl ini
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT,20);
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.bing.com/');
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
	curl_setopt($ch, CURLOPT_MAXREDIRS, 5); // Good leeway for redirections.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Many login forms redirect at least once.
	curl_setopt($ch, CURLOPT_COOKIEJAR , "cookie.txt");
	 
	
	curl_setopt_array($ch, array(
			CURLOPT_URL => 'https://new-api.clickbank.net/graphql',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{"query":"query ($parameters: MarketplaceSearchParameters!) {\\n\\t\\t\\tmarketplaceSearch(parameters: $parameters) {\\n\\t\\t\\t\\ttotalHits\\n\\t\\t\\t\\toffset\\n\\t\\t\\t\\thits {\\n\\t\\t\\t\\t\\tsite\\n\\t\\t\\t\\t\\ttitle\\n\\t\\t\\t\\t\\tdescription\\n\\t\\t\\t\\t\\tfavorite\\n\\t\\t\\t\\t\\turl\\n\\t\\t\\t\\t\\tmarketplaceStats {\\n\\t\\t\\t\\t\\t\\tactivateDate\\n\\t\\t\\t\\t\\t\\tcategory\\n\\t\\t\\t\\t\\t\\tsubCategory\\n\\t\\t\\t\\t\\t\\tinitialDollarsPerSale\\n\\t\\t\\t\\t\\t\\taverageDollarsPerSale\\n\\t\\t\\t\\t\\t\\tgravity\\n\\t\\t\\t\\t\\t\\ttotalRebill\\n\\t\\t\\t\\t\\t\\tde\\n\\t\\t\\t\\t\\t\\ten\\n\\t\\t\\t\\t\\t\\tes\\n\\t\\t\\t\\t\\t\\tfr\\n\\t\\t\\t\\t\\t\\tit\\n\\t\\t\\t\\t\\t\\tpt\\n\\t\\t\\t\\t\\t\\tstandard\\n\\t\\t\\t\\t\\t\\tphysical\\n\\t\\t\\t\\t\\t\\trebill\\n\\t\\t\\t\\t\\t\\tupsell\\n\\t\\t\\t\\t\\t\\tstandardUrlPresent\\n\\t\\t\\t\\t\\t\\tmobileEnabled\\n\\t\\t\\t\\t\\t\\twhitelistVendor\\n\\t\\t\\t\\t\\t\\tcpaVisible\\n\\t\\t\\t\\t\\t\\tdollarTrial\\n\\t\\t\\t\\t\\t\\thasAdditionalSiteHoplinks\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t \\t\\taffiliateToolsUrl\\n\\t\\t\\t  \\t\\taffiliateSupportEmail\\n            \\t\\tskypeName\\n\\t\\t\\t\\t}\\n\\t\\t\\t}\\n\\t\\t  }","variables":{"parameters":{"includeKeywords":"'.$search_keyword.'"' . $offset_part  . '}}}',
			CURLOPT_HTTPHEADER => array(
					'authority: new-api.clickbank.net',
					'accept: application/json, text/plain, */*',
					'accept-language: en-US,en;q=0.9,ar;q=0.8',
					
					'content-type: application/json',
					'origin: https://sweetheatm.accounts.clickbank.com',
					'referer: https://sweetheatm.accounts.clickbank.com/',
					'sec-ch-ua: ".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103"',
					'sec-ch-ua-mobile: ?0',
					'sec-ch-ua-platform: "macOS"',
					'sec-fetch-dest: empty',
					'sec-fetch-mode: cors',
					'sec-fetch-site: cross-site',
					'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'
			),
	));
	
	$response = curl_exec($ch);
	
	//reset 
	
	$x = curl_error ( $ch );
	
	//empty response
	if(trim($response) == ''){
		echo ' Empty response from ClickBank ' . $x;
	}
	
	//not json response with data 
	if( ! stristr( $response ,  '{"data":'     ) ){
		echo ' Got a response but can not find the data info ' . $response;
	}
	
	//good we have the products
	$json = json_decode($response);
	
	
	$items = $json->data->marketplaceSearch->hits;
	
	echo '<br>' .  count($items) . ' items returned ';
	
 

	$links = array();
	$titles= array();
	
	foreach($items as $item_single){
		$titles[] = $item_single->title;
		$descs[] = $item_single->description;
		$links[] = 'http://zzzzz.'.$item_single->site.'.hop.clickbank.net';
		
	}
	 
	  echo '<br>links found:' . count ( $links );

 
		
	  echo '<ol>';
	for($i = 0; $i < count ( $links ); $i ++) {
		$title = addslashes ( $titles [$i] );
			
		  echo '<li>' . $links [$i] . '<br>' . $titles [$i] . '</li>';
			
 	
			
		$link_url = str_replace('zzzzz', $wp_wp_automatic_cbu,$links[$i]) ;
			
		if( $this->is_execluded($camp->camp_id, $link_url) ){
			  echo '<-- Excluded';
			continue;
		}

		if ( ! $this->is_duplicate($link_url) )  {
			$desc = addslashes ( $descs [$i] );
			$query = "INSERT INTO {$this->wp_prefix}automatic_clickbank_links ( link_url , link_title , link_keyword  , link_status , link_desc )VALUES ( '$links[$i]', '$title', '$keyword', '0' ,'$desc')";
			$this->db->query ( $query );

		} else {
			  echo ' <- duplicated <a href="'.get_edit_post_link($this->duplicate_id).'">#'.$this->duplicate_id.'</a>';
		}
			
			

	}
	  echo '</ol>';

	if (count ( $links ) > 0) {
		// increment the start with 50
		$newstart = $start + 10;
		$query = "update {$this->wp_prefix}automatic_keywords set  clickbank_start  = '$newstart' where keyword_name='$keyword'";
		$this->db->query ( $query );
		return true;
	} else {
		// there was no links lets deactivate
		$newstart = '-1';
		$query = "update {$this->wp_prefix}automatic_keywords set clickbank_start  = '$newstart' where keyword_name='$keyword'";
		$this->db->query ( $query );
			
		$this->deactivate_key($camp->camp_id, $keyword);
			
		return false;
	}
}
function clickbank_get_post($camp) {

	$keywords = explode ( ',', $camp->camp_keywords );
	
	// ini options
	$camp_opt = unserialize ( $camp->camp_options );
	
	
	foreach ( $keywords as $keyword ) {
			
		$keyword = trim($keyword);
			
		if (trim ( $keyword ) != '') {
				
			//update last keyword
			update_post_meta($camp->camp_id, 'last_keyword', trim($keyword));

			// getting links from the db for that keyword
			$query = "select * from {$this->wp_prefix}automatic_clickbank_links where link_keyword='$keyword' ";
			$res = $this->db->get_results ( $query );

			
			// when no links lets get new links
			if (count ( $res ) == 0) {
				
				//clean any old cache for this keyword
				$query_delete = "delete from {$this->wp_prefix}automatic_clickbank_links where link_keyword='$keyword' ";
				$this->db->query ( $query_delete );
				
				$this->clickbank_fetch_links ( $keyword, $camp );
				// getting links from the db for that keyword
				$query = "select * from {$this->wp_prefix}automatic_clickbank_links where link_keyword='$keyword' ";
				$res = $this->db->get_results ( $query );
			}

			//duplicate but posted
			//deleting duplicated items
			$res_count = count($res);
			for($i=0;$i< $res_count;$i++){

				$t_row = $res[$i];
				$t_link_url=$t_row->link_url;

				if( $this->is_duplicate($t_link_url) ){
						
					//duplicated item let's delete
					unset($res[$i]);
						
					  echo '<br>Clickbank Item ('. $t_row->link_title .') found cached but duplicated <a href="'.get_permalink($this->duplicate_id).'">#'.$this->duplicate_id.'</a>'  ;
						
					//delete the item
					$query = "delete from {$this->wp_prefix}automatic_clickbank_links where link_id='{$t_row->link_id}'";
					$this->db->query ( $query );
						
				}else{
					break;
				}

			}

			// check again if valid links found for that keyword otherwise skip it
			if (count ( $res ) > 0) {
				// ini
				$cbname = trim( get_option ( 'wp_wp_automatic_cbu', '' ));
					
				if (trim ( $cbname ) == '') {
					$message = '<a href="http://clickbank.net">Click Bank</a> account needed visit settings and add the username ';
					  echo "<br>$message";
					$this->log ( 'Error', $message );
				}
					
				// lets process that link
				$ret = $res [$i];
					
				$offer_title = $ret->link_title;
				$offer_url = $ret->link_url;
				
				echo '<br>Processing link:' . $offer_url;
				
				$offer_url_parts = explode('.', $offer_url);
				$offer_id = strtolower( $offer_url_parts[1] ) ;
				
				 
				
				$offer_url = str_replace ( 'zzzzz', $cbname, $offer_url );
				$offer_desc = $ret->link_desc;
					
				// lets call the downloader for offer_title and offer_real_link
				
				echo '<br>Downloading...';
				$downloader_link = get_home_url () . '/wp-content/plugins/wp-automatic/downloader.php';
				$downloader_link = site_url('?wp_automatic=download');
					
				curl_setopt ( $this->ch, CURLOPT_HTTPGET, 1 );
				curl_setopt ( $this->ch, CURLOPT_URL, trim ( $downloader_link . '&link=' . str_replace ( 'http:', 'httpz:', $offer_url ) ) );
				$exec = curl_exec ( $this->ch );
    
				$json = json_decode ( $exec );
				// print_r($json);
				$original_title= ''; //ini
				$original_link = ''; 
				@$original_link = $json->link;
				@$original_title = $json->title;
				
				if( trim($original_title) !=''){
					echo ' success found title:'.$original_title. ' link:'.$original_link;
				}else{
					echo ' download did not succeed';	
				}
				
				if(stristr($original_link, 'errCode') || stristr($original_title, 'error page')){
					echo '<br>Product not valid or requires approval.... excluding.';
					$this->link_execlude ( $camp->camp_id, $offer_url );
					
					$query = "delete from {$this->wp_prefix}automatic_clickbank_links where link_id={$ret->link_id}";
					$this->db->query ( $query );
					
					return false;
				}
				 
				
				if(in_array('OPT_CB_DESCRIPTION', $camp_opt)){
					
					$ps = $json->text;
					
					if(is_array($ps)){
						$offer_desc = '<p>'.implode('</p><p>', $ps).'</p>';
					}
						
				}
				
				$original_link = str_replace ( "?hop=$cbname", '', $original_link );
					
				if (trim ( $original_link ) == '' || trim ( $original_title ) == '') {
					  echo '<br>Could not extract original url from hop link, using hop instead';

					$original_title = $offer_title;

					if (trim ( $original_link ) == '') {
						$original_link = $offer_url;
					}
				} else {

					$offer_title = $original_title;
				}
				
				// img
				$tempo = str_replace ( "http://$cbname", 'zzzz', $original_link );
				$tempo = str_replace ( "https://$cbname", 'zzzz', $original_link );
				$tempo = str_replace ( 'http://', '', $tempo );
				$tempo = str_replace ( 'https://', '', $tempo );
				$tempo = str_replace ( "?hop=$cbname", '', $tempo );
				
				$tempo = urlencode ( trim ( $tempo ) );
				$wp_amazonpin_tw = get_option ( 'wp_amazonpin_tw', 400 );
					
				$img = '<img class="product_thumb"  src="https://www.cbtrends.com/images/vendor-pages/'. $offer_id .'-x400-thumb.jpg" />';
					
				$temp = array ();
				$temp ['title'] = $offer_title;
				$temp ['original_title'] = $offer_title;
				$temp ['offer_link'] = $offer_url;
				$temp ['source_link'] = $offer_url;
				$temp ['product_link'] = $offer_url;
				$temp ['original_link'] = $original_link;
				$temp ['product_original_link'] = $original_link;
				$temp ['offer_desc'] = $offer_desc;
				$temp ['product_desc'] = $offer_desc;
				$temp ['img'] = $img;
				$temp ['product_img'] = $img;
				
				//$temp ['product_img_src'] = 'http://pagepeeker.com/t/l/' . strtolower ( $tempo ) ;
				$temp['product_img_src'] = "https://www.cbtrends.com/images/vendor-pages/$offer_id-x400-thumb.jpg";
				$this->used_keyword = $ret->link_keyword ;
				 
				// update the link status to 1
				$query = "delete from {$this->wp_prefix}automatic_clickbank_links where link_id={$ret->link_id}";
				$this->db->query ( $query );
				
					
				return $temp;
			} else {
					
				  echo '<br>No links found for this keyword';
			}
		} // if trim
	} // foreach keyword
} // end funs

}