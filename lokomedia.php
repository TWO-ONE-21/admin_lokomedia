<?php
// Recode By: 5IG4R3T_KR3T3K
// WordList By : Yukinoshita47
// Usability : Admin Finder Lokomedia
// Facebook: https://facebook.com/CHECKPOlNT
// Thanks To: MR.CAKIL - MINANG SILENT

print "   
	
    _         ____      _  _      ____      __  __      ____      ___     __       _     
   FJ        F __ ]    FJ / ;    F __ ]    F  \/  ]    F ___J    F __".   FJ      /.\    
  J |       J |--| L  J |/ (|   J |--| L  J |\__/| L  J |___:   J |--\ L J  L    //_\\   
  | |       | |  | |  |     L   | |  | |  | |`--'| |  | _____|  | |  J | |  |   / ___ \  
  F L_____  F L__J J  F L:\  L  F L__J J  F L    J J  F L____:  F L__J | F  J  / L___J \ 
 J________LJ\______/FJ__L \\__LJ\______/FJ__L    J__LJ________LJ______/FJ____LJ__L   J__L
 |________| J______F |__L  \L_| J______F |__L    J__||________||______F |____||__L   J__|
                                                                                         
                Admin Finder Lokomedia - coded by ./Mr.cakil - recode by 5IG4R3T_KR3T3K
  Thanks to  :Mr.cakil - Yukinoshita47 - Minang Silent
";

echo "Url sitenya  : ";
$target = trim(fgets(STDIN));
$list = "admin_lokomedia.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$targetnya = "http://$target";
}else{
	$targetnya = $target;
}

$buka = fopen("$list","r");
$ukuran = filesize("$list");
$baca = fread($buka,$ukuran);
$lists = explode("\r\n",$baca);

foreach($lists as $login){
	$log = "$targetnya/$login";
	$ch = curl_init("$log");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		 $handle = fopen("result.txt", "a+");
		fwrite($handle, "$log\n");
		print "\n\n [".date('H:m:s')."] Mencoba : $log ====> Valid\n";
	}else{
		print "\n[".date('H:m:s')."] Mencoba : $log ====> Gak Valid";
	}
}
  
?>
