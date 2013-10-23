<?php
ob_start();
session_start();

mysql_connect("localhost","root","");
mysql_select_db("root");

$table = '';
if($_GET['option']==1)
$sql=mysql_query("select * from producer where auth_1='1'");
else if($_GET['option']==2)
$sql=mysql_query("select * from producer where auth_2='1'");
else if($_GET['option']==3)
$sql=mysql_query("select * from producer where auth_3='1'");
else if($_GET['option']==4)
$sql=mysql_query("select * from producer where auth_4='1'");
else if($_GET['option']==5)
$sql=mysql_query("select * from producer where auth_5='1'");
else
$sql=mysql_query("select * from producer where auth_1='1'");

if($_GET['option']==1)
$name="Producers";
else if($_GET['option']==2)
$name="Collectors";
else if($_GET['option']==3)
$name="Storages";
else if($_GET['option']==4)
$name="Dismantlers";
else if($_GET['option']==5)
$name="Recyclers";
else
$name="Producers";




$table.='WEEE Number, Organisation Name, Trading Name, Site Name , Annual Turnover , Password , b2b,b2c, Director_contacts title , Director_contacts Given name , Director_contacts surname , Director_contacts phone , Director_contacts mobile ,Director_contacts fax , Director_contacts email, Director_contacts position, Director_contacts address1 , Director_contacts address2 , Director_contacts address3, Director_contacts State , Director_contacts postcode , Director_contacts country, daytoday In State_contacts title , daytoday In State_contacts Given name , daytoday In State_contacts surname , daytoday In State_contacts phone , daytoday In State_contacts mobile , daytoday In State_contacts fax , daytoday In State_contacts email , daytoday In State_contacts position , daytoday In State_contacts address1 , daytoday In State_contacts address2 , daytoday In State_contacts address3 , daytoday In State_contacts satat, daytoday In State_contacts postcode, daytoday In State_contacts country , daytoday_Out state_contacts title , daytoday_Out state_contacts Given name , daytoday_Out state_contacts surname , daytoday_Out state_contacts phone, daytoday_Out state_contacts mobile, daytoday_Out state_contacts fax, daytoday_Out state_contacts email ,daytoday_Out state_contacts position , daytoday_Out state_contacts address1, daytoday_Out state_contacts address2 ,daytoday_Out state_contacts address3 , daytoday_Out state_contacts State,daytoday_Out state_contacts postcode, daytoday_Out state_contacts country ,Generation-PART A General Authorisation,Dismantling-PART A General Authorisation,Collection-PART A General Authorisation,Recycling-PART A General Authorisation,Generation-PART A E-Waste,Processing-PART A E-Waste,Total Capital Invested on the project,Year of commencement of the production,Date of grant of the Consent to Establish,Date of grant of the Consent to Operate,Part B-Cat(i)-Centralised data processing,Part B-Cat(i)-Mainframes+minicomputers,Part B-Cat(i)-Personal computing,Part B-Cat(i)-Personal computers,Part B-Cat(i)-Laptop Computers,Part B-Cat(i)-Notebook Computers,Part B-Cat(i)-Notepad Computers,Part B-Cat(i)-Printers including cartridges,Part B-Cat(i)-Copying equipment,Part B-Cat(i)-Electrical and electronic typewriters,Part B-Cat(i)-User terminals and systems,Part B-Cat(i)-Facsimile,Part B-Cat(i)-Telex,Part B-Cat(i)-Telephones,Part B-Cat(i)-Pay telephones,Part B-Cat(i)-Cordless telephones,Part B-Cat(i)-Cellular telephones,Part B-Cat(i)-Answering systems,Part B-Cat(ii)-Television sets,Part B-Cat(ii)-Refrigerator,Part B-Cat(ii)-washing machine,Part B-Cat(ii)-Air-Conditioners,Part B-Generated,Part B-Generated Weight,Part B-Collected,Part B-Collected Weight,Part B-Dismantled,Part B-Dismantled Weight,Part B-Recycled,Part B-Recycled Weight,Part B(c)-Mode of storage with in the plant,Part B(c)-PDF,Part B(d)-Method of treatment and disposal,Part B(d)-PDF,Part B(e)-Installed capacity of the plant,Part B(e)-PDF,Part C(i)-Location of site,Part C(i)-map PDF,Part C(ii)-Details of processing technology,Part C(ii)-PDF,Part C(iii)-Type and Quantity of waste to be process per day,Part C(iii)-cat(i),Part C(iii)-cat(ii),Part C(iii)-PDF,Part C(iv)-Site clearance from local authority,Part C(iv)-PDF,Part C(v)-Utilisation of the e-waste processed,Part C(v)-PDF,Part C(vi)-Method of disposal of residues,Part C(vi)-PDF,Part C(vii)-Quantity of waste to be processed or disposed per day,Part C(vii)-PDF,Part C(viii)-Details of categories of e-waste to be dismantled/processed,Part C(viii)-cat(i),Part C(viii)-cat(ii),Part C(viii)-PDF,Part C(ix)-Methodology and operational details,Part C(ix)-PDF,Part C(x)-Measures to be taken for preventation and control of environmental pollution including treatment of leachates,Part C(x)-PDF,Part C(xi)-Investment of project and expected returns,Part C(xi)-PDF,Part C(xii)- Measures to be taken for safety of workers working in the plant,Part C(xii)-PDF,Validation OK,Declatation Name,Declaration Date,Declaration,Authorisation Type';
$table.="\n";
while($row = mysql_fetch_array($sql))

{
$producerid=$row['id'];
//procuder details
$weeenumber=$row['reg_number'];
$table.=str_replace(",", "+",$weeenumber).",";
$table.=str_replace(",", "+",$row['name']).",";
$table.=str_replace(",", "+",$row['trading_name']).",";
$table.="Admin,";

$table.=str_replace(",", "+",$row['annual_turnover']).",";

$table.=$row['password'].",";

if($row['obligation_type_b2b']==1)
	$table.="Yes,";
else
	$table.="no,";

if($row['obligation_type_b2c']==1)
	$table.="Yes,";
else
	$table.="no,";





//Director details
$sql1=mysql_query('select * from contact_details where id='.$row['director_contact_detailsid']) or die(mysql_error());
@$Director_contacts = mysql_fetch_assoc($sql1);
$table.=str_replace(",", "+",$Director_contacts['title']).",";
$table.=str_replace(",", "+",$Director_contacts['forename']).",";
$table.=str_replace(",", "+",$Director_contacts['surname']).",";

$table.=str_replace(",", "+",$Director_contacts['phone']).",";
$table.=str_replace(",", "+",$Director_contacts['mobile']).",";
$table.=str_replace(",", "+",$Director_contacts['fax']).",";
$table.=str_replace(",", "+",$Director_contacts['email']).",";
$table.=str_replace(",", "+",$Director_contacts['position']).",";
$table.=str_replace(",", "+",$Director_contacts['primary_name']).',';
$table.=str_replace(",", "+",$Director_contacts['secondary_name']).',';
$table.=str_replace(",", "+",$Director_contacts['street_name']).',';
$table.=str_replace(",", "+",$Director_contacts['town']).',';
$table.=$Director_contacts['postcode'].',';
if($Director_contacts['countryid'])
{
$sqlc1 = mysql_query('select country from country where id='.$Director_contacts['countryid']);
$country = mysql_fetch_assoc($sqlc1);
$table.=$country['country'].',';
}
else{
$table.=',';
}

//daytoday In State details
$sql2=mysql_query('select * from contact_details where id='.$row['daytoday_instate_contact_detailsid']);
@$daytoday_instate_contacts = mysql_fetch_assoc($sql2);

$table.=str_replace(",", "+",$daytoday_instate_contacts['title']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['forename']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['surname']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['phone']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['mobile']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['fax']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['email']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['position']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['primary_name']).',';
$table.=str_replace(",", "+",$daytoday_instate_contacts['secondary_name']).',';
$table.=str_replace(",", "+",$daytoday_instate_contacts['street_name']).',';
$table.=str_replace(",", "+",$daytoday_instate_contacts['town']).',';
$table.=$daytoday_instate_contacts['postcode'].',';
if($daytoday_instate_contacts['countryid'])
{
$sqlc2 = mysql_query('select country from country where id='.$daytoday_instate_contacts['countryid']);
$country1 = mysql_fetch_assoc($sqlc2);
$table.=$country1['country'].',';
}
else{
$table.=',';
}
//daytoday_Out state detials
@$sql3=mysql_query('select * from contact_details where id='.$row['daytoday_outstate_detailsid']);
@$daytoday_outstate_contacts = mysql_fetch_assoc($sql3);
$table.=str_replace(",", "+",$daytoday_outstate_contacts['title']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['forename']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['surname']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['phone']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['mobile']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['fax']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['email']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['position']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['primary_name']).',';
$table.=str_replace(",", "+",$daytoday_outstate_contacts['secondary_name']).',';
$table.=str_replace(",", "+",$daytoday_outstate_contacts['street_name']).',';
$table.=str_replace(",", "+",$daytoday_outstate_contacts['town']).',';
$table.=$daytoday_outstate_contacts['postcode'].',';
if($daytoday_outstate_contacts['countryid'])
{
@$sqlc3 = mysql_query('select country from country where id='.$daytoday_outstate_contacts['countryid']);
$country2 = mysql_fetch_assoc($sqlc3);
$table.=$country2['country'].',';
}
else{
$table.=',';
}
$sel=mysql_query("select * from  producer_parts where producerid=". $row['id']." ");
@$fet=mysql_fetch_array($sel);
if($fet['part-A-1']=='1')
{
 $option_aut1='Yes';
 $option_ewaste1='Yes';
 }
 else
 {
 $option_aut1='No';
  $option_ewaste1='No';
 }
 if($fet['part-A-2']=='1')
 $option_aut2='Yes';
 else
 $option_aut2='No';
 if($fet['part-A-3']=='1')
 $option_aut3='Yes';
 else
 $option_aut3='No';
 if($fet['part-A-4']=='1')
 $option_aut4='Yes';
 else
 $option_aut4='No';
 // Added 'Yes' for Displaying Authorisations
 if($option_aut2=='Yes' or $option_aut3=='Yes' or $option_aut4=='Yes') {
  $option_ewaste2='Yes';
}
else
{
 $option_ewaste2='No';
}


// Removing blank space 
$sqlc = "centralised_processing 	= '1'";
	$sqlc .= " or minicomputers 	= '1'";
	$sqlc .= " or personal_computing 	= '1'";
	$sqlc .= " or personal_computers 	= '1'";
	$sqlc .= " or laptop_computers 	= '1'";
	$sqlc .= " or notebook_computers 	= '1'";
	$sqlc .= " or notepad_computers 	= '1'";
	$sqlc .= " or printers_cartridges 	= '1'";
	$sqlc .= " or copying_equipment 	= '1'";
	$sqlc .= " or electrical_electronic 	= '1'";
	$sqlc .= " or terminals_systems 	= '1'";
	$sqlc .= " or facsimile 	= '1'";
	$sqlc .= " or telex 	= '1'";
	$sqlc .= " or telephones 	= '1'";
	$sqlc .= " or pay_telephones 	= '1'";
	$sqlc .= " or cordless_telephones 	= '1'";
	$sqlc .= " or cellular_telephones 	= '1'";
	$sqlc .= " or answering_systems 	= '1'";


// Removing blank space 
$sqlc2 = "television_sets 	= '1'";
	$sqlc2 .= " or refrigerator 	= '1'";
	$sqlc2 .= " or washing_machine 	= '1'";
	$sqlc2 .= " or air_conditioners 	= '1'";




if ($option_aut1 == 'Yes')
	$table.='Generation,';
else
	$table.=$option_aut1.',';

if ($option_aut2 == 'Yes')
	$table.='Dismantling,';
else
	$table.=$option_aut2.',';

if ($option_aut3 == 'Yes')
	$table.='Collection,';
else
	$table.=$option_aut3.',';

if ($option_aut4 == 'Yes')
	$table.='Recycling,';
else
	$table.=$option_aut4.',';


$table.=$option_ewaste1.',';
$table.=$option_ewaste2.',';


$table.=str_replace(",", "+",$fet['part-A-F-total']).",";
$table.=$fet['part-A-F-year'].',';
$table.=$fet['part-A-F-date-establish'].',';
$table.=$fet['part-A-F-date-operation'].',';

 $sel_part_21=mysql_query("select * from `form3` where producerid=".$row['id']."");
			$fet=mysql_fetch_array($sel_part_21);
			$part_id21=$fet['id'];

if($fet['centralised_processing']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['minicomputers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['personal_computing']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['personal_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['laptop_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['notebook_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['notepad_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['printers_cartridges']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['copying_equipment']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['electrical_electronic']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['terminals_systems']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['facsimile']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['telex']==1)
$table.='Yes,';
else
$table.='No,';


if($fet['telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['pay_telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['cordless_telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['cellular_telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['answering_systems']==1)
$table.='Yes,';
else
$table.='No,';

if($fet['television_sets']=='1')
$table.='Yes,';
else
$table.='No,';
if($fet['refrigerator']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['washing_machine']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['air_conditioners']==1)
$table.='Yes,';
else
$table.='No,';


$generated_weight = $fet['generated_weight'];
if ($generated_weight == null)
	$generated_weight = 0;

$collected_weight = $fet['collected_weight'];
if ($collected_weight == null)
	$collected_weight = 0;

$dismantled_weight = $fet['dismantled_weight'];
if ($dismantled_weight == null)
	$dismantled_weight = 0;

$recycled_weight = $fet['recycled_weight'];
if ($recycled_weight == null)
	$recycled_weight = 0;


$table.=$option_aut1.',';
$table.=$generated_weight.',';

$table.=$option_aut2.',';
$table.=$collected_weight.',';

$table.=$option_aut3.',';
$table.=$dismantled_weight.',';

$table.=$option_aut4.',';
$table.=$recycled_weight.',';



if($fet['one_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{
$textone=str_replace(",", "+",$fet['modeofstorage_textarea']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file21=mysql_query("select * from `form3_files` where form_id=".$fet['id']." and pdf_id=1");
if(mysql_num_rows($sel_part_file21)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }


}

if($fet['two_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{

$textone2=str_replace(",", "+",$fet['treatment_disposal_textarea']);
$table.=mysql_real_escape_string($textone2).",";

 $sel_part_file22=mysql_query("select * from `form3_files` where form_id=".$fet['id']." and pdf_id=2");
if(mysql_num_rows($sel_part_file22)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }



}

if($fet['three_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{

$textone3=str_replace(",", "+",$fet['capacity_plant_textarea']);
$table.=mysql_real_escape_string($textone3).",";

 $sel_part_file23=mysql_query("select * from `form3_files` where form_id=".$fet['id']." and pdf_id=3");
if(mysql_num_rows($sel_part_file23)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }


}



 $sel_part_4=mysql_query("select * from `form4` where producerid=".$row['id']."");
			$fet4=mysql_fetch_array($sel_part_4);
			$part_id4=$fet4['id'];




$textone=str_replace(",", "+",$fet4['map_text']);
$table.=mysql_real_escape_string($textone).",";


if($fet4['map_pdf_name']!='')
$table.='TRUE,';
else
$table.='FALSE,';






if($fet4['one_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{

$textone=str_replace(",", "+",$fet4['one_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file1=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=1");

if(mysql_num_rows($sel_part_file1)>0){

$table.='TRUE,';

}else {

$table.='FALSE,';

 }
}

if($fet4['two_status']==1)
{
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['two_text']);
$table.=mysql_real_escape_string($textone).",";



$sel_cat=mysql_query("select * from form3 where ($sqlc) and producerid=$producerid");
if(@mysql_num_rows($sel_cat)!=0)
$table.='Yes,';
else
$table.='No,';

$sel_cat2=mysql_query("select * from form3 where ($sqlc2) and producerid=$producerid");
if(@mysql_num_rows($sel_cat2)!=0)
$table.='Yes,';
else
$table.='No,';








 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=2");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['three_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['three_text']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=3");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['four_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{

$textone=str_replace(",", "+",$fet4['four_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=4");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['five_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{

$textone=str_replace(",", "+",$fet4['five_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=5");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['six_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['six_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=6");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}

if($fet4['seven_status']==1)
{
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
}
else
{
$table.='FALSE,';

//echo "select * from form3 where ($sqlc) and producerid=$producerid";
// Added producer id for comparing the producer id in SQL
$sel_cat=mysql_query("select * from form3 where ($sqlc) and producerid=".$producerid." ");
if(@mysql_num_rows($sel_cat)!=0)
$table.='Yes,';
else
$table.='No,';

$sel_cat2=mysql_query("select * from form3 where ($sqlc2) and producerid=$producerid");
if(@mysql_num_rows($sel_cat2)!=0)
$table.='Yes,';
else
$table.='No,';

 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=7");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['eight_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['eight_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=8");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}

if($fet4['nine_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['nine_text']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=9");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}

if($fet4['ten_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['ten_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=10");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}
if($fet4['eleven_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['eleven_text']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file2=mysql_query("select * from `form4_files` where form_id=".$fet4['id']." and pdf_id=11");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}




if($row['save_status']==0)
$table.='FALSE,';
else
$table.='TRUE,';
// Displaying decl_name, date and decl_status priviously it shows wrong format  

$table.=$row['decl_name'].",";

$table.=$row['date'].",";

if($row['decl_status']==0)
$table.='No,';
else
$table.='Yes,';






 


$table.=     mysql_real_escape_string($name).',';



$table.="\n";



if($_GET['option']==1)
$sqls=mysql_query("select * from sub_producer where auth_1='1' and prod_id=".$producerid);
else if($_GET['option']==2)
$sqls=mysql_query("select * from sub_producer where auth_2='1'  and prod_id=".$producerid);
else if($_GET['option']==3)
$sqls=mysql_query("select * from sub_producer where auth_3='1'  and prod_id=".$producerid);
else if($_GET['option']==4)
$sqls=mysql_query("select * from sub_producer where auth_4='1'  and prod_id=".$producerid);
else if($_GET['option']==5)
$sqls=mysql_query("select * from sub_producer where auth_5='1' and prod_id=".$producerid);
else
$sqls=mysql_query("select * from sub_producer where auth_1='1'  and prod_id=".$producerid);;

//end sub producer
while($rows = mysql_fetch_array($sqls))

{

$subid=$rows['id'];
//procuder details

$weeenumbers=$rows['reg_number'];
//$weeenumbers="WIN00".$producerid."/02";
$table.=str_replace(",", "+",$weeenumbers).",";
$table.=str_replace(",", "+",$rows['name']).",";
$table.=str_replace(",", "+",$rows['trading_name']).",";

$sitesql = mysql_query("select name from polution_list where id = " . $rows["polu_id"]);

@$site = mysql_fetch_assoc($sitesql);

$table.=str_replace(",", "+",$site['name']).",";


$table.=str_replace(",", "+",$rows['annual_turnover']).",";

$table.=$rows['password'].",";
if($rows['obligation_type_b2b']==1)
	$table.="Yes,";
else
	$table.="no,";

if($rows['obligation_type_b2c']==1)
	$table.="Yes,";
else
	$table.="no,";





//Director details
$sql1=mysql_query('select * from sub_contact_details where id='.$rows['director_contact_detailsid']) or die(mysql_error());
@$Director_contacts = mysql_fetch_assoc($sql1);
$table.=str_replace(",", "+",$Director_contacts['title']).",";
$table.=str_replace(",", "+",$Director_contacts['forename']).",";
$table.=str_replace(",", "+",$Director_contacts['surname']).",";
$table.=str_replace(",", "+",$Director_contacts['phone']).",";
$table.=str_replace(",", "+",$Director_contacts['mobile']).",";
$table.=str_replace(",", "+",$Director_contacts['fax']).",";
$table.=str_replace(",", "+",$Director_contacts['email']).",";
$table.=str_replace(",", "+",$Director_contacts['position']).",";
$table.=str_replace(",", "+",$Director_contacts['primary_name']).',';
$table.=str_replace(",", "+",$Director_contacts['secondary_name']).',';
$table.=str_replace(",", "+",$Director_contacts['street_name']).',';
$table.=str_replace(",", "+",$Director_contacts['town']).',';
$table.=$Director_contacts['postcode'].',';
if($Director_contacts['countryid'])
{
$sqlc1 = mysql_query('select country from country where id='.$Director_contacts['countryid']);
$country = mysql_fetch_assoc($sqlc1);
$table.=$country['country'].',';
}
else{
$table.=',';
}

//daytoday In State details
$sql2=mysql_query('select * from sub_contact_details where id='.$rows['daytoday_instate_contact_detailsid']);
@$daytoday_instate_contacts = mysql_fetch_assoc($sql2);

$table.=str_replace(",", "+",$daytoday_instate_contacts['title']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['forename']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['surname']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['phone']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['mobile']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['fax']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['email']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['position']).",";
$table.=str_replace(",", "+",$daytoday_instate_contacts['primary_name']).',';
$table.=str_replace(",", "+",$daytoday_instate_contacts['secondary_name']).',';
$table.=str_replace(",", "+",$daytoday_instate_contacts['street_name']).',';
$table.=str_replace(",", "+",$daytoday_instate_contacts['town']).',';
$table.=$daytoday_instate_contacts['postcode'].',';
if($daytoday_instate_contacts['countryid'])
{
$sqlc2 = mysql_query('select country from country where id='.$daytoday_instate_contacts['countryid']);
$country1 = mysql_fetch_assoc($sqlc2);
$table.=$country1['country'].',';
}
else{
$table.=',';
}
//daytoday_Out state detials
@$sql3=mysql_query('select * from sub_contact_details where id='.$rows['daytoday_outstate_detailsid']);
@$daytoday_outstate_contacts = mysql_fetch_assoc($sql3);
$table.=str_replace(",", "+",$daytoday_outstate_contacts['title']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['forename']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['surname']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['phone']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['mobile']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['fax']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['email']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['position']).",";
$table.=str_replace(",", "+",$daytoday_outstate_contacts['primary_name']).',';
$table.=str_replace(",", "+",$daytoday_outstate_contacts['secondary_name']).',';
$table.=str_replace(",", "+",$daytoday_outstate_contacts['street_name']).',';
$table.=str_replace(",", "+",$daytoday_outstate_contacts['town']).',';
$table.=$daytoday_outstate_contacts['postcode'].',';
if($daytoday_outstate_contacts['countryid'])
{
@$sqlc3 = mysql_query('select country from country where id='.$daytoday_outstate_contacts['countryid']);
$country2 = mysql_fetch_assoc($sqlc3);
$table.=$country2['country'].',';
}
else{
$table.=',';
}
$sel=mysql_query("select * from  sub_producer_parts where producerid=".$producerid." and sub_id=". $rows['id']." ");
@$fet=mysql_fetch_array($sel);
if($fet['part-A-1']=='1')
{
 $option_aut1='Yes';
 $option_ewaste1='Yes';
 }
 else
 {
 $option_aut1='No';
  $option_ewaste1='No';
 }
 if($fet['part-A-2']=='1')
 $option_aut2='Yes';
 else
 $option_aut2='No';
 if($fet['part-A-3']=='1')
 $option_aut3='Yes';
 else
 $option_aut3='No';
 if($fet['part-A-4']=='1')
 $option_aut4='Yes';
 else
 $option_aut4='No';
 if($option_aut2=='1' or $option_aut3=='1' or $option_aut4=='1') {
  $option_ewaste2='Yes';
}
else
{
 $option_ewaste2='No';
}

// Removing blank space 

$sqlc = "centralised_processing 	= '1'";
	$sqlc .= " or minicomputers 	= '1'";
	$sqlc .= " or personal_computing 	= '1'";
	$sqlc .= " or personal_computers 	= '1'";
	$sqlc .= " or laptop_computers 	= '1'";
	$sqlc .= " or notebook_computers 	= '1'";
	$sqlc .= " or notepad_computers 	= '1'";
	$sqlc .= " or printers_cartridges 	= '1'";
	$sqlc .= " or copying_equipment 	= '1'";
	$sqlc .= " or electrical_electronic 	= '1'";
	$sqlc .= " or terminals_systems 	= '1'";
	$sqlc .= " or facsimile 	= '1'";
	$sqlc .= " or telex 	= '1'";
	$sqlc .= " or telephones 	= '1'";
	$sqlc .= " or pay_telephones 	= '1'";
	$sqlc .= " or cordless_telephones 	= '1'";
	$sqlc .= " or cellular_telephones 	= '1'";
	$sqlc .= " or answering_systems 	= '1'";


// Removing blank space 
$sqlc2 = "television_sets 	= '1'";
	$sqlc2 .= " or refrigerator 	= '1'";
	$sqlc2 .= " or washing_machine 	= '1'";
	$sqlc2 .= " or air_conditioners 	= '1'";


if ($option_aut1 == 'Yes')
	$table.='Generation,';
else
	$table.=$option_aut1.',';

if ($option_aut2 == 'Yes')
	$table.='Dismantling,';
else
	$table.=$option_aut2.',';

if ($option_aut3 == 'Yes')
	$table.='Collection,';
else
	$table.=$option_aut3.',';

if ($option_aut4 == 'Yes')
	$table.='Recycling,';
else
	$table.=$option_aut4.',';

$table.=$option_ewaste1.',';
$table.=$option_ewaste2.',';


$table.=str_replace(",", "+",$fet['part-A-F-total']).",";
$table.=$fet['part-A-F-year'].',';
$table.=$fet['part-A-F-date-establish'].',';
$table.=$fet['part-A-F-date-operation'].',';

 $sel_part_21=mysql_query("select * from `sub_form3` where producerid=".$producerid." and sub_id=". $rows['id']." ");
			$fet=mysql_fetch_array($sel_part_21);
			$part_id21=$fet['id'];

if($fet['centralised_processing']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['minicomputers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['personal_computing']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['personal_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['laptop_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['notebook_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['notepad_computers']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['printers_cartridges']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['copying_equipment']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['electrical_electronic']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['terminals_systems']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['facsimile']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['telex']==1)
$table.='Yes,';
else
$table.='No,';


if($fet['telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['pay_telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['cordless_telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['cellular_telephones']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['answering_systems']==1)
$table.='Yes,';
else
$table.='No,';

if($fet['television_sets']=='1')
$table.='Yes,';
else
$table.='No,';
if($fet['refrigerator']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['washing_machine']==1)
$table.='Yes,';
else
$table.='No,';
if($fet['air_conditioners']==1)
$table.='Yes,';
else
$table.='No,';


$generated_weight = $fet['generated_weight'];
if ($generated_weight == null)
	$generated_weight = 0;

$collected_weight = $fet['collected_weight'];
if ($collected_weight == null)
	$collected_weight = 0;

$dismantled_weight = $fet['dismantled_weight'];
if ($dismantled_weight == null)
	$dismantled_weight = 0;

$recycled_weight = $fet['recycled_weight'];
if ($recycled_weight == null)
	$recycled_weight = 0;


$table.=$option_aut1.',';
$table.=$generated_weight.',';

$table.=$option_aut2.',';
$table.=$collected_weight.',';

$table.=$option_aut3.',';
$table.=$dismantled_weight.',';

$table.=$option_aut4.',';
$table.=$recycled_weight.',';


if($fet['one_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{
$textone=str_replace(",", "+",$fet['modeofstorage_textarea']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file21=mysql_query("select * from `sub_form3_files` where form_id=".$fet['id']." and pdf_id=1");
if(mysql_num_rows($sel_part_file21)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }


}

if($fet['two_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{

$textone2=str_replace(",", "+",$fet['treatment_disposal_textarea']);
$table.=mysql_real_escape_string($textone2).",";

 $sel_part_file22=mysql_query("select * from `sub_form3_files` where form_id=".$fet['id']." and pdf_id=2");
if(mysql_num_rows($sel_part_file22)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }



}

if($fet['three_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{

$textone3=str_replace(",", "+",$fet['capacity_plant_textarea']);
$table.=mysql_real_escape_string($textone3).",";

 $sel_part_file23=mysql_query("select * from `sub_form3_files` where form_id=".$fet['id']." and pdf_id=3");
if(mysql_num_rows($sel_part_file23)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }


}



 $sel_part_4=mysql_query("select * from `sub_form4` where producerid=".$producerid." and sub_id=". $rows['id']." ");
			$fet4=mysql_fetch_array($sel_part_4);
			$part_id4=$fet4['id'];




$textone=str_replace(",", "+",$fet4['map_text']);
$table.=mysql_real_escape_string($textone).",";


if($fet4['map_pdf_name']!='')
$table.='TRUE,';
else
$table.='FALSE,';






if($fet4['one_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{

$textone=str_replace(",", "+",$fet4['one_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file1=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=1");

if(mysql_num_rows($sel_part_file1)>0){

$table.='TRUE,';

}else {

$table.='FALSE,';

 }
}

if($fet4['two_status']==1)
{
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['two_text']);
$table.=mysql_real_escape_string($textone).",";



$sel_cat=mysql_query("select * from sub_form3 where ($sqlc) and producerid=".$producerid." and sub_id=". $rows['id']." ");
if(@mysql_num_rows($sel_cat)!=0)
$table.='Yes,';
else
$table.='No,';

$sel_cat2=mysql_query("select * from sub_form3 where ($sqlc2) and producerid=".$producerid." and sub_id=". $rows['id']." ");
if(@mysql_num_rows($sel_cat2)!=0)
$table.='Yes,';
else
$table.='No,';








 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=2");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['three_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['three_text']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=3");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['four_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{

$textone=str_replace(",", "+",$fet4['four_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=4");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['five_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{

$textone=str_replace(",", "+",$fet4['five_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=5");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['six_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['six_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=6");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}

if($fet4['seven_status']==1)
{
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
$table.='N/A,';
}
else
{
$table.='FALSE,';


$sel_cat=mysql_query("select * from sub_form3 where ($sqlc) and producerid=".$producerid." and sub_id=". $rows['id']." ");
if(@mysql_num_rows($sel_cat)!=0)
$table.='Yes,';
else
$table.='No,';

$sel_cat2=mysql_query("select * from sub_form3 where ($sqlc2) and producerid=".$producerid." and sub_id=". $rows['id']." ");
if(@mysql_num_rows($sel_cat2)!=0)
$table.='Yes,';
else
$table.='No,';

 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=7");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}


if($fet4['eight_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['eight_text']);
$table.=mysql_real_escape_string($textone).",";



 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=8");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}

if($fet4['nine_status']==1)
{$table.='N/A,';
$table.='N/A,';
}
else
{



$textone=str_replace(",", "+",$fet4['nine_text']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=9");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}

if($fet4['ten_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['ten_text']);
$table.=mysql_real_escape_string($textone).",";

 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=10");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}
if($fet4['eleven_status']==1)
{
$table.='N/A,';
$table.='N/A,';
}
else
{


$textone=str_replace(",", "+",$fet4['eleven_text']);
$table.=mysql_real_escape_string($textone).",";
 $sel_part_file2=mysql_query("select * from `sub_form4_files` where form_id=".$fet4['id']." and pdf_id=11");

if(mysql_num_rows($sel_part_file2)>0){
$table.='TRUE,';
}else {
$table.='FALSE,';
 }
}




if($rows['save_status']==0)
$table.='FALSE,';
else
$table.='TRUE,';

// Displaying decl_name, date and decl_status priviously it shows wrong format
$table.=$rows['decl_name'].",";

$table.=$rows['date'].",";

if($rows['decl_status']==0)
$table.='No,';
else
$table.='Yes,';


$table.=     mysql_real_escape_string($name).',';



$table.="\n";




}


}
$table.='';




header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header("Content-disposition: Attachment; filename=\"$name-2012.csv\"");
echo $table;
?>
