<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\Input;
use Auth;
use Response;
use App\User;
use Session;
use Hash;
use DateTime;
use Mail;
use App\AfricasTalkingGateway;
use App\SystemModule;
use App\ProviderModule;
use App\Message;
use Modules\UserManagement\Entities\Role;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Modules\Documents\Entities\SendSMS;
use Modules\UserManagement\Entities\Nhif;
use Modules\UserManagement\Entities\Nssf;
use Modules\UserManagement\Entities\Paye;
use Modules\UserManagement\Entities\OtherDeduction;
use Modules\UserManagement\Entities\Employee;
use Modules\UserManagement\Entities\MonthPayment;
use Modules\UserManagement\Entities\Expense;
use Modules\UserManagement\Entities\MonthlyExpense;
use Modules\UserManagement\Entities\AdvancedPayment;
use Modules\UserManagement\Entities\UserRole;
use Modules\UserManagement\Entities\Commission;
use Modules\UserManagement\Entities\StaffQualification;
use Modules\UserManagement\Entities\EmployeeAllowance;
use Modules\UserManagement\Entities\MonthlyDeduction;
use App\EmployeeDeduction;
use App\Messaging;
use Modules\System\Entities\PermissionStage;
class KraHelper
{

  public static function getData()
  {

    
     try{

$token=strlen("a");

      
    $curl = curl_init("http://www.scantech.ltd:8090/AndroidInterface.asmx/GetDataOfVehicle?UserName=a");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
   
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   
    $response = curl_exec($curl);
    curl_close($curl);

    $response1 = str_replace('<string xmlns="http://tempuri.org/">',"",$response);
     
     $response2 = str_replace('<?xml version="1.0" encoding="utf-8"?>',"",$response1);
     $response3=str_replace('</string>',"",$response2);
     $response3=trim($response3);
     $vehicle_data=explode(";", $response3);

         dd($vehicle_data);


      ;
    return $result;

    }catch(\Exception $e)
    { 
      return false;

    }



    
  
 $soapUrl = "http://www.scantech.ltd:8090/AndroidInterface.asmx/GetDataOfVehicle"; // asmx URL of WSDL
 $soapUser = "a";  //  username
 $soapPassword = "password"; // password

 // xml post structure

 $xml_post_string = '
                     
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetDataOfVehicle xmlns="http://tempuri.org/">
      <UserName>'.$soapUser.'</UserName>
    </GetDataOfVehicle>
  </soap:Body>
</soap:Envelope>';   // data from the form, e.g. some ID number

    $headers = array(
                 "Content-type: application/x-www-form-urlencoded;charset=\"utf-8\"",
                 "Accept: text/xml",
                 "Cache-Control: no-cache",
                 "Pragma: no-cache",
                 "SOAPAction: http://www.scantech.ltd:8090/AndroidInterface.asmx/GetDataOfVehicle", 
                 "Content-length: ".strlen($xml_post_string),
             ); //SOAPAction: your op URL

     $url = $soapUrl;

     // PHP cURL  for https connection with auth
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     //curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

     // converting
     $response = curl_exec($ch); 
     curl_close($ch);

      

     // converting
     $response1 = str_replace("<soap:Body>","",$response);
     $response2 = str_replace("</soap:Body>","",$response1);

     // convertingc to XML
     $parser = simplexml_load_string($response2);
       dd($parser);

  }

	public static function ValidatePinData($pinNumber,$business_number)
	{
		$soapUrl = config('kra.soapUrl'); // asmx URL of WSDL
        $soapUser = config('kra.soapUser');  //  username
        $soapPassword =config('kra.soapPassword'); // password
		      $xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ifm="http://tcs.com/kra/ifmisws">
				   <soapenv:Header/>
				   <soapenv:Body>
			      <ifm:validatePINRequest>
			         <ifm:loginId>'.$soapUser.'</ifm:loginId>
			         <ifm:password>'.$soapPassword.'</ifm:password>
			         <ifm:KRAPIN>'.$pinNumber.'</ifm:KRAPIN>
			         <ifm:BusinessNumber>'.$business_number.'</ifm:BusinessNumber>
			      </ifm:validatePINRequest>
		       </soapenv:Body>
		      </soapenv:Envelope>';
           $header = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"run\"",
    "Content-length: ".strlen($xml_post_string),
  );
 
  $soap_do = curl_init();
  curl_setopt($soap_do, CURLOPT_URL, $soapUrl );
  curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($soap_do, CURLOPT_TIMEOUT,        10);
  curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
  curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($soap_do, CURLOPT_POST,           true );
  curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $xml_post_string);
  curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);
 
  if(curl_exec($soap_do) === false) {
    $err = 'Curl error: ' . curl_error($soap_do);
    curl_close($soap_do);
    print $err;
  } else {

    $response = curl_exec($soap_do); 
    
    curl_close($soap_do);

  
// SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
$plainXML =Self::mungXML($response);
$arrayResult = json_decode(json_encode(SimpleXML_Load_String($plainXML, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
$first_level=$arrayResult['soapenv_Body'];
$second_level=$first_level['ns2_validatePINResponse'];
$third_level=$second_level['ns2_responseString'];

$status=self::getMyValue($third_level,"Message");
 if($status=="Invalid")
 {
 	return 0;
 }
 $return_data=array("ResponseCode","Message","Status","KRAPIN","BusinessNumber","BusinessName","PINOwnerName","MobileNumber","EmailAddress","StatusOfPIN","VATRegistered");

 $kra_data=array();
  foreach($return_data as $key)
  {
    $value=self::getMyValue($third_level,$key);
    $kra_data[$key]=$value;


  }
    return $kra_data;
	}
}


	public static  function getMyValue($third_level,$key)
    {
        $dom = new \DOMDocument;
		$dom->loadXML($third_level);
		$books = $dom->getElementsByTagName($key);
		$value="";
    foreach($books as $book)
    {

      $value=$book->nodeValue;
    }
    return $value;

    }

    public static  function mungXML($xml)
   {
    $obj = SimpleXML_Load_String($xml);
    if ($obj === FALSE) return $xml;

    // GET NAMESPACES, IF ANY
    $nss = $obj->getNamespaces(TRUE);
    if (empty($nss)) return $xml;

    // CHANGE ns: INTO ns_
    $nsm = array_keys($nss);
    foreach ($nsm as $key)
    {
        // A REGULAR EXPRESSION TO MUNG THE XML
        $rgx
        = '#'               // REGEX DELIMITER
        . '('               // GROUP PATTERN 1
        . '\<'              // LOCATE A LEFT WICKET
        . '/?'              // MAYBE FOLLOWED BY A SLASH
        . preg_quote($key)  // THE NAMESPACE
        . ')'               // END GROUP PATTERN
        . '('               // GROUP PATTERN 2
        . ':{1}'            // A COLON (EXACTLY ONE)
        . ')'               // END GROUP PATTERN
        . '#'               // REGEX DELIMITER
        ;
        // INSERT THE UNDERSCORE INTO THE TAG NAME
        $rep
        = '$1'          // BACKREFERENCE TO GROUP 1
        . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
        ;
        // PERFORM THE REPLACEMENT
        $xml =  preg_replace($rgx, $rep, $xml);
    }
    return $xml;
}





  }