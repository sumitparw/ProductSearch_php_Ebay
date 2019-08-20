<?php
$response = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST["Product_keyword"])) 
    {	$search_key =$_POST["Product_keyword"];
    	$search_key = trim($search_key, " \t.");
        $search_key = urlencode($search_key);
        if(empty($search_key)) {
            $keyword_error = "Enter Value, this can't be blank.";
        }
        $category = $_POST["category_list"];
         //echo $category;
        if ($category=='first_art'){
        	//echo "hello";
          $segment_id =550 ;
        }
        else if ($category=='Second_baby'){
          $segment_id =2984 ;
        }
        else if ($category=='Third_books'){   
          $segment_id = 267;
        }
        else if ($category=='Fourth_clothing'){
          $segment_id =11450 ;
        }
        else if ($category=='Fifth_shoes'){
          $segment_id =11450 ;
        }
        else if ($category=='Sixth_comptabletnet'){
          $segment_id = 58058;
        }
        else if ($category=='Seventh_healthbeauty'){
          $segment_id = 26395;
        }
        else if ($category=='Eight_music'){
          $segment_id = 11233;
        }
        else if($category=='Nine_videoconsole'){
          $segment_id = 1249;
        }
        else if($category=='all'){
            
            $segment_id = 0;
            //echo $segment_id;
        }
        //echo $segment_id;
        if(isset($_POST['shipping_options1'])){
            $Pickup = "true";
        }
        else {
            $Pickup = "false";
        }
        if(isset($_POST['shipping_options2'])){
            $Shipping = "true";
        }
        else {
            $Shipping = "false";
        }
        
        $condition ='';
        $cnt = 0;
        if(isset($_POST['Enable_search'])){
        	//echo "in";
	        //$zip = $from_zip;
	        $distance = $_POST["distance_in_miles"];
	        $condition ="&itemFilter(4).name=Condition";
	            
	            if(isset($_POST['check1'])){
	                $condition .="&itemFilter(4).value(".$cnt.")=New";
	                $cnt +=1;
	            }
	            if(isset($_POST['check2'])){
	                $condition .="&itemFilter(4).value(".$cnt.")=Used";
	                $cnt +=1;
	            }
	            if(isset($_POST['check3'])){
	                $condition .="&itemFilter(4).value(".$cnt.")=Unspecified";
	                $cnt +=1;
	            }
	        $from_zip = $_POST["current_location"];
	        if($from_zip == "custom_loc") {
	            $from_zip = $_POST["custom_location"];
	        }
	        if($from_zip =='here'){
	            $from_zip =$_POST["location_lat"];
	        }
	        
	        
	        if($cnt==0){
		        if ($segment_id == 0)//for all categories
		        {  
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords=".$search_key."&buyerPostalCode=".$from_zip."&itemFilter(0).name=MaxDistance&itemFilter(0).value=".$distance."&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=".$Shipping."&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=".$Pickup."&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true";
		        }
		        else// for other categories
		        {
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced"."&SERVICE-VERSION=1.0.0"."&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42"."&RESPONSE-DATA-FORMAT=JSON"."&REST-PAYLOAD"."&paginationInput.entriesPerPage=20"."&keywords=".$search_key."&buyerPostalCode=".$from_zip."&itemFilter(0).name=MaxDistance&itemFilter(0).value=".$distance."&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=".$Shipping."&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=".$Pickup."&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&Category_Id=".$segment_id;
		        }
		    }
	        else{
		        if ($segment_id == 0)//for all categories
		        {  
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords=".$search_key."&buyerPostalCode=".$from_zip."&itemFilter(0).name=MaxDistance&itemFilter(0).value=".$distance."&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=".$Shipping."&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=".$Pickup."&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true".$condition;
		         }
		        else// for other categories
		        {
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced"."&SERVICE-VERSION=1.0.0"."&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42"."&RESPONSE-DATA-FORMAT=JSON"."&REST-PAYLOAD"."&paginationInput.entriesPerPage=20"."&keywords=".$search_key."&buyerPostalCode=".$from_zip."&itemFilter(0).name=MaxDistance&itemFilter(0).value=".$distance."&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=".$Shipping."&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=".$Pickup."&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true".$condition."&Category_Id=".$segment_id;
		        }
		    }
	    }
        else{
	        $condition ="&itemFilter(3).name=Condition";
	            
	        if(isset($_POST['check1'])){
	            $condition .="&itemFilter(3).value(".$cnt.")=New";
	            $cnt +=1;
	        }
	        if(isset($_POST['check2'])){
	            $condition .="&itemFilter(3).value(".$cnt.")=Used";
	            $cnt +=1;
	        }
	        if(isset($_POST['check3'])){
	            $condition .="&itemFilter(3).value(".$cnt.")=Unspecified";
	            $cnt +=1;
	        }
	        
	        if($cnt==0){
		        if ($segment_id == 0)//for all categories
		        {  
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords=".$search_key."&itemFilter(0).name=FreeShippingOnly&itemFilter(0).value=".$Shipping."&itemFilter(1).name=LocalPickupOnly&itemFilter(1).value=".$Pickup."&itemFilter(2).name=HideDuplicateItems&itemFilter(2).value=true";
		         }
		        else// for other categories
		        {
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced"."&SERVICE-VERSION=1.0.0"."&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42"."&RESPONSE-DATA-FORMAT=JSON"."&REST-PAYLOAD"."&paginationInput.entriesPerPage=20"."&keywords=".$search_key."&itemFilter(0).name=FreeShippingOnly&itemFilter(0).value=".$Shipping."&itemFilter(1).name=LocalPickupOnly&itemFilter(1).value=".$Pickup."&itemFilter(2).name=HideDuplicateItems&itemFilter(2).value=true&Category_Id=".$segment_id;
		        }
		    }
	        else{
		        if ($segment_id == 0)//for all categories
		        {  
		            $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords=".$search_key."&itemFilter(0).name=FreeShippingOnly&itemFilter(0).value=".$Shipping."&itemFilter(1).name=LocalPickupOnly&itemFilter(1).value=".$Pickup."&itemFilter(2).name=HideDuplicateItems&itemFilter(2).value=true".$condition;
		         }
		        else// for other categories
		        {
		             $url = "http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced"."&SERVICE-VERSION=1.0.0"."&SECURITY-APPNAME=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42"."&RESPONSE-DATA-FORMAT=JSON"."&REST-PAYLOAD"."&paginationInput.entriesPerPage=20"."&keywords=".$search_key."&itemFilter(0).name=FreeShippingOnly&itemFilter(0).value=".$Shipping."&itemFilter(1).name=LocalPickupOnly&itemFilter(1).value=".$Pickup."&itemFilter(2).name=HideDuplicateItems&itemFilter(2).value=true".$condition."&Category_Id=".$segment_id;
		        }
		    }
	        
	    }
        //echo $url;
        $response = file_get_contents($url);
        

        //exit($response);
        //return false;
    }
}
if(isset($_GET['id']))
    {
        $url2 ="http://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=JSON&appid=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42&siteid=0&version=967&ItemID=".$_GET['id']."&IncludeSelector=Description,Details,ItemSpecifics";  
        $response2 = file_get_contents($url2);
        exit($response2);
        //return false;
    }
    if(isset($_GET['name']))
    {
        $url3 = "http://svcs.ebay.com/MerchandisingService?OPERATION-NAME=getSimilarItems&SERVICE-NAME=MerchandisingService&SERVICE-VERSION=1.1.0&CONSUMER-ID=sumitPar-Mytestfo-PRD-016e2f149-b99e8a42&siteid=0&version=967&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&itemId=".urlencode($_GET['name'])."&maxResults=8";
        $response3 = file_get_contents($url3);
        exit(($response3));
    }
?>
<html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title>HW6</title>
<style type="text/css">
    select{
    	border-radius: 2px;

    }
    
    h2 {
        text-align: center;
        margin: 0px;
        
    }
    #searchbox_container {
        width: 630px;
        height: 290px;
        position: absolute;
        left: 23%;
        border: 2px solid #C0C0C0;
        background-color: #F9F9F9;
    }

    #searchbox_container h4 {
        text-align: center;
    }

    #Product_keyword{
        position: relative;
        top: -19px;
        left: 70px;
    }
    .checkconditions{
        top: 10px;
        position: relative;
    }
    .shippingoptions{
        top: 11px;
        position: relative;
    }
    .enable{
        top: 25px;
        position: relative;
    }
    #from_location_div {
        float: right;
        position: relative;
        right: 140px;
    }
    #category_list {
        position: relative;
        top: -18px;
        left: 70px;
    }
    #distance_in_mil {
        position: relative;
        left:20px;
    }
    #current_loc {
        position: relative;
        right:-95px;
        top:-33px;
    }
    #here_loc {
        position: relative;
        left: -5px;
    }
    #new_loc {
        position: relative;
        left: 72px;
        top:-70px;
    }
    #custom_location {
        position: relative;
        left: 70px;
        top:-70px;
    }
    #search_button {
        position: relative;
        left: -15px;
        width: 50px;
        top: 60px;
    }
    #clear_button {
        position: relative;
        left: -10px;
        width: 50px;
        top: 60px;
    }
    ul {
        list-style: none;
    }

    #searchbox ul {
        margin: 0px;
    }


    .search_details table{
        border: 2px solid #D3D3D3;
    }
    th{
        border: 2px solid #D3D3D3;
    }
    td{
        border: 2px solid #D3D3D3;
    }

/*  table {
        border-collapse: collapse;
        position: relative;
        left: -350px;
        top: 32px;
        width:1000px;
    }*/
    .table_product table {
        border: 2px solid #D3D3D3;
        width:100px;

    }
    
    .selector_idd:hover {
        color: grey;
        cursor: pointer;
    }
    #call_detail:hover {
        color: grey;
        cursor: pointer;
    }
    
    #check1{
       margin-left: 15px;
    }
    #check2{
       margin-left: 15px;
    }
    #check3{
       margin-left: 15px;
    }
    #shipping_options1{
        margin-left: 33px;
    }
    #shipping_options2{
        margin-left: 33px;
    }
    
    #result{
        top: 100px;
        position: relative;
        
            }
    #call_details:hover{
        color:grey;
    }
    #click_frame{
    	top:120px;
		position: relative;
    }
    #frame{

    	top:120px;
		position: relative;
    }
   #similar{
   	   top:120px;
	position: relative;
   }
    #test_iframe{
       border: 0;
	   height: 100%;
	   left: -100px;
	   position: absolute;
	   top: 0;
	   width: 150%;
    }
    #similar_frame{
    	top:120px;
       position:relative;
    }
    #arrow_down{
       position: relative;
       margin-top: 70%;
       padding-left:40%;
    }
   .similar{
   	border:none;
   	padding:10px;
   	font-size:0.8em;

   }
   .container {
	 
}
 
</style>
<script type="text/javascript">

   
function call_details(idd){
 	var xmlhttpreq = new XMLHttpRequest();
    var url = "api.php?id="+idd;
    xmlhttpreq.open("GET", url, false);
    xmlhttpreq.send();
    var res = xmlhttpreq.responseText;
    jsonInfo = JSON.parse(res);
    //console.log(jsonInfo)
    //console.log(jsonInfo['Item']);
    //console.log( jsonInfo['Item']['PictureURL'].length);
    var product_content1 ="";
    product_content1 +="<br><h2 style='padding-left:70px;margin-left:100px;'>Item Details</h2>"
    product_content1 +="<center><br><center><table class='table_product'style='border-collapse: collapse;position:relative;left:-30px;width:700px;'>";     
    product_content1 += "<tr>";
    product_content1 += "<th>Photo</th>";
    if(jsonInfo['Item']['PictureURL'].length>0 ){
    	product_content1 += "<td><img width='400px' height='300px'src='"+jsonInfo['Item']['PictureURL'][0]+"'></td>";
    }
    else{
    	product_content1 += "<td><img width='400px' height='300px' src=''alt='No Image'></td>";
    }
    product_content1 += "</tr>";
    product_content1 += "<tr>";
    product_content1 += "<th>Title</th>";
    if(jsonInfo['Item']['Title']){
    	product_content1 += "<td>"+jsonInfo['Item']['Title']+"</td>";
    }
    else{
    	product_content1 += "<td>N/A</td>";
    }
    product_content1 += "</tr>";
    product_content1 += "<tr>";
    product_content1 += "<th>Subtitle</th>";
    if(jsonInfo['Item']['Subtitle']){
    	product_content1 += "<td>"+jsonInfo['Item']['Subtitle']+"</td>";
    }
    else{
    	product_content1 += "<td>N/A</td>";
    }
    product_content1 += "</tr>";
    product_content1 += "<tr>";
    product_content1 += "<th>Price</th>";

    if(jsonInfo['Item']['ConvertedCurrentPrice']){
    	if(jsonInfo['Item']['ConvertedCurrentPrice']['Value'] && jsonInfo['Item']['ConvertedCurrentPrice']['CurrencyID']){
   			product_content1 += "<td>"+jsonInfo['Item']['ConvertedCurrentPrice']['Value']+"  "+jsonInfo['Item']['ConvertedCurrentPrice']['CurrencyID'] +"</td>";
   	    }
   	    else if(jsonInfo['Item']['ConvertedCurrentPrice']['Value']){
   	    	product_content1 += "<td>"+jsonInfo['Item']['ConvertedCurrentPrice']['Value']+"</td>";

   	    }
    }
    else{
    	product_content1 += "<td>N/A</td>";

    }

    product_content1 += "</tr>";
    product_content1 += "<tr>";
    product_content1 += "<th>Location</th>";
    if(jsonInfo['Item']['Location'] && jsonInfo['Item']['PostalCode']){
    	product_content1 += "<td>"+jsonInfo['Item']['Location']+"  "+jsonInfo['Item']['PostalCode'] +"</td>";
    }
    else if(jsonInfo['Item']['Location']){
    	product_content1 += "<td>"+jsonInfo['Item']['Location']+"</td>";
    }
    else if(jsonInfo['Item']['PostalCode'] ){
    	product_content1 += "<td>"+jsonInfo['Item']['PostalCode'] +"</td>";
    }
    else{
    	product_content1 += "<td>Location Not Provided</td>";
    }
    product_content1 += "</tr>";
    product_content1 += "<tr>";
    product_content1 += "<th>Seller</th>";
    if(jsonInfo['Item'].hasOwnProperty("Seller")){
	    if(jsonInfo['Item']['Seller']['UserID']){
	    	product_content1 += "<td>"+jsonInfo['Item']['Seller']['UserID']+"</td>";
	    }
	}
    else{
    	product_content1 += "<td>Seller Inforamtion Not Provided</td>";
    }

    product_content1 += "</tr>";
    product_content1 += "<tr>";
    product_content1 += "<th>ReturnPolicy(US)</th>";
    //console.log(jsonInfo['Item']);
    if(jsonInfo['Item'].hasOwnProperty("ReturnPolicy")){
	    if(jsonInfo['Item']['ReturnPolicy']['ReturnsAccepted']){
	    	product_content1 += "<td>"+jsonInfo['Item']['ReturnPolicy']['ReturnsAccepted']+"</td>";

	    }
	    else if(jsonInfo['Item']['ReturnPolicy']['ReturnsAccepted'] && jsonInfo['Item']['ReturnPolicy']['ReturnsWithin']){
	    	product_content1 += "<td>"+jsonInfo['Item']['ReturnPolicy']['ReturnsAccepted']+" within "+jsonInfo['Item']['ReturnPolicy']['ReturnsWithin']+"</td>";
	    }
	    else if(jsonInfo['Item']['ReturnPolicy']['ReturnsWithin']){
	    	product_content1 += "<td>"+jsonInfo['Item']['ReturnPolicy']['ReturnsWithin']+"</td>";

	    }
	   
	}
    else{
    	product_content1 += "<td>Return Inforamtion Not Provided</td>";
    }
    product_content1 += "</tr>";
    //console.log(jsonInfo['Item']);
    if(jsonInfo['Item']['ItemSpecifics']){
        for(var i=0;i<jsonInfo['Item']['ItemSpecifics']['NameValueList'].length;i++){
            product_content1 += "<tr>";
            product_content1 += "<th>"+jsonInfo['Item']['ItemSpecifics']['NameValueList'][i]['Name']+"</th>";
            product_content1 += "<td>"+jsonInfo['Item']['ItemSpecifics']['NameValueList'][i]['Value']+"</td>";
            product_content1 += "</tr>";
        }
    }
    
    product_content1 += "</table></center><br><br>";
    document.getElementById('result').innerHTML = product_content1;
    var product_f="";
    product_f +="<center><h6 id='button_iframe'style='color:#A9A9A9;'>Click to see seller messages</h6>";
    product_f +="<img style='cursor: pointer;'src='http://csci571.com/hw/hw6/images/arrow_down.png' id='arrow_downframe' onclick='frame();' width='40px'height='25px'> </img>";
    product_f += "<h6 id='button_hidesiframe' style='display:none;color:#A9A9A9;'>Click to hide seller messages</h6>";
    product_f +="<img style='cursor: pointer;' src='http://csci571.com/hw/hw6/images/arrow_up.png' id='arrow_upframe' width='40px'height='25px'onclick='hide_frame()'> </img></center>";
    document.getElementById('click_frame').innerHTML = product_f;
    var product_s="";
    product_s +="<center><h6 id='button_similar' style='color:#A9A9A9;'>Click to see similar Items</h6>";
    product_s +="<img src='http://csci571.com/hw/hw6/images/arrow_down.png' style='cursor: pointer;' id='arrow_downsimilar' width='40px'height='25px'onclick='Similar_items(" +  idd  +  ")'> </img>";
    product_s += "<h6 id='button_hidesimilar' style='display:none;color:#A9A9A9;'>Click to hide similar Items</h6>";
    product_s +="<img style='cursor: pointer;' src='http://csci571.com/hw/hw6/images/arrow_up.png' id='arrow_upsimilar' width='40px'height='25px'onclick='hide_Similar_items("+idd+")'> </img></center>";
    
    document.getElementById('similar_frame').innerHTML = product_s;
    var desc="";
    console.log(jsonInfo['Item']['Description']);
    if(jsonInfo['Item']['Description']){
     	desc= jsonInfo['Item']['Description'];
     	var product_content2 = "<iframe id='test_iframe' allowfullscreen scrolling='no'> </iframe>";
    }
    else{
    	desc="N/A";
     	var product_content2 = "<iframe id='test_iframe' allowfullscreen scrolling='no'> </iframe>";
    }
    //console.log(document.getElementsByTagName('div')[2]);
    document.getElementById('frame').innerHTML = product_content2;
    iframe = document.getElementById('test_iframe');
    iframe.setAttribute('srcDoc', desc);
    document.getElementById('test_iframe').style.display="none";
    document.getElementById('arrow_upframe').style.display="none";
    

    var xmlhttpreqq = new XMLHttpRequest();
    var url1 = "api.php?name="+idd;
    xmlhttpreqq.open("GET", url1, false);
    xmlhttpreqq.send();
    var resu = xmlhttpreqq.responseText;
    jsonInfo1 = JSON.parse(resu);
    //console.log(jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item']);
    var len_sim="";
    if(jsonInfo1['getSimilarItemsResponse']['itemRecommendations']){
    	if(jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item']){
    		if(jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item']['length']){
    			len_sim = jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item']['length'];
        }	}
    }
    else{
        len_sim=0;
    }
    
    var arra = [];
    var product_content3 = "";
    if(len_sim>0){
        product_content3 ="<center><div id='Similar_items'style='display:none;height:300px;width:750px;overflow:scroll;border:solid 2px #D3D3D3;overflow-y:hidden;overflow-x:scroll;display:inline-block;float:left;'>";
        product_content3 +="<table style='border-collapse:collapse;border:none>";
        product_content3 += "<tr class='similar'>";
        for(var i=0;i<jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'].length;i++){
            product_content3 += "<td class='similar'>";
            product_content3 += "<img width='120px' height='150px'src='"+jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'][i]['imageURL']+"'>";
            product_content3 += "</td>";
        }
        product_content3 += "</tr>";
        product_content3 += "<tr class='similar'>";
        for(var i=0;i<jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'].length;i++){
            arra[i] = jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'][i]['itemId'];
            product_content3 += "<td class='similar'>";
            product_content3 +="<p class='selector_idd' onclick='call_details("+arra[i]+")'>"+jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'][i]['title'];
            product_content3 += "</td>";
        }
        product_content3 += "</tr>";
        product_content3 += "<tr class='similar'>";
        for(var i=0;i<jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'].length;i++){
            product_content3 += "<td class='similar'>";
            product_content3 +="<center><b>$"+jsonInfo1['getSimilarItemsResponse']['itemRecommendations']['item'][i]['buyItNowPrice']['__value__']+"</center></b>";
            product_content3 += "</td>";
        }
        product_content3 += "</tr>";
        product_content3 +="</table>";
        product_content3 +="</div></center>";
    }
    else{
	    product_content3 +="<center><div id='Similar_items'style='display:none;height:40px;width:700px;overflow:scroll;border:solid 2px #D3D3D3;overflow-y:hidden;overflow-x:scroll;background-color: #F9F9F9;padding:5px'><div style='height:20px;width:800px;top:20px;'><b><p style='text-align:center;margin-top:0px;border:solid 2px #D3D3D3;'>No Similar Items found</p></div></div>"
    }
   
    document.getElementById('similar').innerHTML = product_content3;
    document.getElementById('Similar_items').style.display="none";
    document.getElementById('arrow_upsimilar').style.display="none";
   

            
            //Seller_frame(jsonInfo['Item']['Description']);
}
function frame(){
    iframe = document.getElementById('test_iframe');
    iframe.style.display="block";
    document.getElementById('button_iframe').style.display="none";
   	document.getElementById('button_hidesiframe').style.display="block";
   	
   	//console.log("ddddddddddddddddddd   ", iframe.offsetHeight)
   	//console.log(iframe.contentWindow.document.body.offsetHeight);
   	iframe.style.height=iframe.contentWindow.document.body.offsetHeight + 500;
   	//iframe.style.height=parseInt(iframe.style.height.split("px")[0])
   	//console.log(iframe.style.height);
   	//console.log(iframe.style.height.split("px")[0]);
   	//console.log("FRAMEEEEEE")
   	document.getElementById('arrow_downframe').style.display="none";
    document.getElementById('arrow_upframe').style.display="block";
    document.getElementById('similar_frame').style.top=parseInt(iframe.style.height.split("px")[0]);
    //console.log(document.getElementById('similar_frame').style.top);
    hide_Similar_items();
    // document.getElementById('similar_frame').style.margin.top=parseInt(iframe.style.height.split("px")[0]) + 150;
}

function hide_frame(){
	//console.log("HIDEEEEEE");
    document.getElementById('button_hidesiframe').style.display="none";
   	document.getElementById('button_iframe').style.display="block";
   	document.getElementById('test_iframe').style.display="none";
    document.getElementById('arrow_downframe').style.display="block";
    document.getElementById('arrow_upframe').style.display="none";
    document.getElementById('similar_frame').style.top="90px";
    //document.getElementById('similar').style.top="80px";
}

function Similar_items(idd){
	//sim = document.getElementById('similar');
	hide_frame();
	iframe = document.getElementById('test_iframe');
	//console.log("SIMIIIIIIII")
	// iframe.style.height=iframe.contentWindow.document.body.offsetHeight + 50;
   	// document.getElementById('arrow_downframe').style.display="none";
   	document.getElementById('button_similar').style.display="none";
   	document.getElementById('button_hidesimilar').style.display="block";
   	document.getElementById('Similar_items').style.display="block";
   	document.getElementById('arrow_downsimilar').style.display="none";
    document.getElementById('arrow_upsimilar').style.display="block";
    //document.getElementById('similar').style.top = iframe.style.height;
    //document.getElementById('similar').style.top = iframe.contentWindow.document.body.offsetHeight + 250;
    document.getElementById('similar').style.left="-50px";
}

function hide_Similar_items(idd){
   	document.getElementById('button_hidesimilar').style.display="none";
   	document.getElementById('button_similar').style.display="block";
   	document.getElementById('Similar_items').style.display="none";
   	document.getElementById('arrow_downsimilar').style.display="block";
    document.getElementById('arrow_upsimilar').style.display="none";
}

	var res = <?php
	if($response == "")
		echo("null");
	else 
		echo(json_encode($response));
	?>;
	if(res!=null) {
		//.log("BNOTTTTTTTTTTTTTTTTTTTTTTT")
		var Product_data = JSON.parse(res);
	
	var product_content = "";
	 //console.log(Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['@count']);
	if( Product_data['findItemsAdvancedResponse'][0]['ack'][0] == "Success" && Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['@count']>0){
	    initialize();
	    function initialize(){
	     	 var len = Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['@count'];
	         product_content ="<table class='search_details' border='1 solid black' style='border-collapse: collapse;position: relative;left: -240px;top: 32px;width:1100px;'>";     
	         product_content += "<tr>";
	         product_content += "<th>Index</th>";
	         product_content += "<th>Photo</th>";
	         product_content += "<th>Name</th>";
	         product_content += "<th>Price</th>";
	         product_content += "<th>Zip Code</th>";
	         product_content += "<th>Condition</th>";
	         product_content += "<th>Shipping Option</th>";
	         product_content += "</tr>";
	         var index_array = [];
	         //console.log(Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][12]);
	        for(var index=0; index < len; index++){
	            index_array[index]= Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['itemId'][0];
	             //console.log(index_array);
	            product_content += "<tr>";
	            product_content += "<td>"+(index+1)+'</td>';
	            if(Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['galleryURL']){
	            	product_content += '<td style="height:40px;width:40px"><img style="height:80px;width:80px" src="'+ Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['galleryURL'][0]+ '"></td>';
	            }
	            else{
	            	product_content += '<td style="height:40px;width:40px"><img style="height:80px;width:80px" alt="No Image"src=""></td>';
	            }
	            
	            product_content += "<td id='call_detail' onclick=call_details("+index_array[index]+")>"+Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['title'][0]+"</td>";
	        

	            product_content += "<td>$"+Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['sellingStatus'][0]["currentPrice"][0]['__value__']+"</td>";
	            
	            if(Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['postalCode']){
	            	product_content += "<td>"+Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['postalCode'][0]+"</td>";
	            }
	            else{
	            	product_content += "<td>N/A</td>";
	            }
	            
	            if(Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['condition']){
	            	product_content += "<td>"+Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['condition'][0]['conditionDisplayName'][0]+"</td>";
	            }
	            else{
	            	product_content += "<td>N/A</td>";
	            }
	            
	            if(!Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['shippingInfo'][0]['shippingServiceCost']){
	            		product_content += "<td>No Shipping Options</td>";
	            }
	            else if(Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['shippingInfo'][0]['shippingServiceCost'][0]['__value__'] == "0.0"){
	            	product_content += "<td>Free Shipping</td>";
	            }
	            else{
	                product_content += "<td>$"+Product_data['findItemsAdvancedResponse'][0]['searchResult'][0]['item'][index]['shippingInfo'][0]['shippingServiceCost'][0]['__value__'];+"</td>";
	            }  
	             
	            product_content += '</tr>';
	        }
	        product_content +="</table>";
	    }
	}
	else if(Product_data['findItemsAdvancedResponse'][0]['ack'][0] == "Failure" && Product_data['findItemsAdvancedResponse'][0]['errorMessage'][0]['error'][0]['message']=="Invalid postal code for specified country."){
		product_content +="<div style='height:20px;width:750px;margin-left:-60px;margin-top:40px;background-color: #F9F9F9;border: 2px solid #D3D3D3;'><b><p style='padding-left:290px;margin-top:0px;'>Zipcode is Invalid</p></div>";
	}
	else {
		product_content +="<div style='height:20px;width:750px;margin-left:-60px;margin-top:40px;background-color: #F9F9F9;border: 2px solid #D3D3D3;'><b><p style='padding-left:275px;margin-top:0px;'>No Records has been found</p></div>";
	}
}
</script>

</head>
<body onload="getDetails();">


    <div id="searchbox_container">
        <h2><i>Product Search</i></h2><hr style="color:#D3D3D3;">
        
        <form name="searchbox_form" id="searchbox" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

            <input type="hidden" id="location_lat" name="location_lat" value="">
            <ul>
                <li><b>Keyword</b></li><input type="text" required name="Product_keyword" id="Product_keyword" value="<?php echo isset($_POST['Product_keyword']) ? $_POST['Product_keyword'] : '' ;?>">
                <li><b>Category</b></li>
                <select name="category_list" id="category_list">
                    <option value="all" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="all") echo "selected";?>>All Categories</option>
                    <option value="first_art" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="first_art") echo "selected";?>>Art</option>
                    <option value="Second_baby" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Second_baby") echo "selected";?>>Baby</option>
                    <option value="Third_books" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Third_books") echo "selected";?>>Books</option>
                    <option value="Fourth_clothing" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Fourth_clothing") echo "selected";?>>Clothing</option>
                    <option value="Fifth_shoes" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Fifth_shoes") echo "selected";?>>Shoes & Accessories</option>
                    <option value="Sixth_comptabletnet" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Sixth_comptabletnet") echo "selected";?>>Computers/Tablets & Networking</option>
                    <option value="Seventh_healthbeauty" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Seventh_healthbeauty") echo "selected";?>>Health & Beauty</option>
                    <option value="Eight_music" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Eight_music") echo "selected";?>>Music</option>
                    <option value="Nine_videoconsole" <?php if (isset($_POST['category_list']) && $_POST['category_list']=="Nine_videoconsole") echo "selected";?>>Video Games & Console</option>
                </select>
                <span class="checkcondition">
                <li><b>Condition</b>
                <input type="checkbox" name="check1" id="check1" class="container"value="new"<?php if (isset($_POST['check1']) && $_POST['check1']=="new") echo "checked";?>> New
                <input type="checkbox" name="check2" id="check2" value="used"class="container" <?php if (isset($_POST['check2']) && $_POST['check2']=="used") echo "checked";?>> Used
                <input type="checkbox" name="check3" id="check3" value="unspecified" class="container" <?php if (isset($_POST['check3']) && $_POST['check3']=="unspecified") echo "checked";?>> Unspecified</li>
                </span>

                <span class="shippingoptions">
                <li><b>Shipping Options</b>
                <input type="checkbox" name="shipping_options1" id="shipping_options1" class="container" value="shipping"<?php if (isset($_POST['shipping_options1']) && $_POST['shipping_options1']=="shipping") echo "checked";?>> Local Pickup
                <input type="checkbox" name="shipping_options2" class="container" id="shipping_options2" value="shipping"<?php if (isset($_POST['shipping_options2']) && $_POST['shipping_options2']=="shipping") echo "checked";?>> Free Shipping</li>
                </span>
                <span class="enable">
                <li><input type="checkbox" name="Enable_search" id="Enable_search" class="container" onchange="check_func()"<?php if(isset($_POST['Enable_search'])) echo"checked";?>>
                <b>Enable Nearby Search</b><input type="text"  placeholder="10" disabled name="distance_in_miles" value="<?php echo isset($_POST['distance_in_miles']) ? $_POST['distance_in_miles'] : '10' ?>" id="distance_in_mil"  size="4">
                <div id="from_location_div">
                    <b>miles from</b>
                    <input type="radio" name="current_location" disabled value="here" checked id="here_loc" onclick="here_check();" <?php if(isset($_POST['current_location']) && $_POST['current_location'] == 'here')  echo 'checked="checked"';?>><p id="current_loc" >Here</p><br>

                    <input type="radio" name="current_location" onclick="zip_check()" disabled value="custom_loc" id="new_loc"<?php if(isset($_POST['current_location']) && $_POST['current_location'] == 'custom_loc')  echo 'checked="checked"'; ?> >


                    <input type="text" name="custom_location" disabled placeholder="zip code" id="custom_location" value="<?php echo isset($_POST['custom_location']) ? $_POST['custom_location'] : '' ?>"onchange='req();'>
                    
                </div>
                </span>
                <input type="submit" name="search_for_location" value="Search" id="search_button" disabled='true'style="border-radius: 3px;background-color: white; border:1px solid #D3D3D3;font-size: 12px;">
                <input type="button" name="clear_button" value="Clear" id="clear_button" onclick="clearall();" style="border-radius: 3px;background-color: white; border:1px solid #D3D3D3;font-size: 12px;">
            </ul>           
        </form> 
    <div id='result'></div>
    <div>
    <div id='click_frame'></div><br>
    <div id='frame'></div>
    <div id='similar_frame'></div><br>
    <div id='similar'></div>
    </div>
</body>
<script type="text/javascript">
	function req(){
		if(document.getElementById('new_loc').checked){
			document.getElementById('custom_location').required=true;
		}
	}
function here_check(){
    document.getElementById('custom_location').value="";
    document.getElementById('custom_location').setAttribute('readonly',"");
    //console.log(document.getElementById('custom_location').value)
}
function zip_check(){
	if(document.getElementById('new_loc').checked){
		document.getElementById('custom_location').required=true;
		document.getElementById('custom_location').removeAttribute('readonly');
		//console.log("in");

	}
}

function check_func(){
	//console.log("hello");
	if(document.getElementById('Enable_search').checked == false){
           document.getElementById('distance_in_mil').disabled = true;
           document.getElementById('here_loc').disabled = true;
           document.getElementById('new_loc').disabled = true;
           document.getElementById('custom_location').disabled = true;
	}
	else{
           document.getElementById('distance_in_mil').disabled = false;
           document.getElementById('here_loc').disabled = false;
           document.getElementById('new_loc').disabled = false;
           document.getElementById('custom_location').disabled = false;
	}
}

function clearall(){
	document.getElementById('Product_keyword').value="";
	document.getElementById('result').innerHTML="";
	document.getElementById('click_frame').innerHTML="";
	document.getElementById('similar_frame').innerHTML="";
	document.getElementById('frame').innerHTML="";
	document.getElementById('similar').innerHTML="";
	if(document.getElementById('Enable_search').checked){
		document.getElementById('Enable_search').checked=false;
		document.getElementById('distance_in_mil').disabled = true;
		document.getElementById('here_loc').checked = true;
	    document.getElementById('here_loc').disabled = true;
	    document.getElementById('custom_location').value="";
	    document.getElementById('new_loc').disabled = true;
	    document.getElementById('custom_location').disabled = true;}
	document.getElementById('check1').checked=false;
	document.getElementById('check2').checked=false;
	document.getElementById('check3').checked=false;
	document.getElementById('shipping_options1').checked=false;
	document.getElementById('shipping_options2').checked=false;
	document.getElementById('category_list').value="all";

}

function getDetails(){
    var req = new XMLHttpRequest();
    url="http://ip-api.com/json";
    req.open('GET',url,true);
    req.responseType = 'json';
    req.onload = function() {
        var status = req.status;
        document.getElementById("location_lat").value = req.response['zip'];
        //console.log( document.getElementById("search_button").disabled);
        document.getElementById("search_button").disabled = false;
        //console.log( document.getElementById("search_button").disabled);
        //console.log(req.response['zip']);
    };
    req.send();
    if(document.getElementById('Enable_search').checked){
    //document.getElementById('Enable_search').checked = false;
	    document.getElementById('distance_in_mil').disabled = false;
	    document.getElementById('here_loc').disabled = false;
	    document.getElementById('new_loc').disabled = false;
	    document.getElementById('custom_location').disabled = false;
	}
	else{
		document.getElementById('distance_in_mil').disabled = true;
	    document.getElementById('here_loc').disabled = true;
	    document.getElementById('new_loc').disabled = true;
	    document.getElementById('custom_location').disabled = true;
	}
	if(document.getElementById('here_loc').checked){
		document.getElementById('custom_location').setAttribute('readonly',"");
	}
};
 //    prod();
	// function prod() { 
	// 	var df = window.navigator.product;
	// 	 console.log(df);
 //    }
	if(product_content != null)
		document.getElementById('result').innerHTML=product_content;

</script> 

</html>
