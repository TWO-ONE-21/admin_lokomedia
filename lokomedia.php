<?php
// Recode By: 5IG4R3T_KR3T3K
// WordList By : Yukinoshita47
// Usability : Admin Finder Lokomedia
// Facebook: https://facebook.com/CHECKPOlNT
// Thanks To: MR.CAKIL - MINANG SILENT

print "   
	
██╗      ██████╗ ██╗  ██╗ ██████╗ ███╗   ███╗███████╗██████╗ ██╗ █████╗ 
██║     ██╔═══██╗██║ ██╔╝██╔═══██╗████╗ ████║██╔════╝██╔══██╗██║██╔══██╗
██║     ██║   ██║█████╔╝ ██║   ██║██╔████╔██║█████╗  ██║  ██║██║███████║
██║     ██║   ██║██╔═██╗ ██║   ██║██║╚██╔╝██║██╔══╝  ██║  ██║██║██╔══██║
███████╗╚██████╔╝██║  ██╗╚██████╔╝██║ ╚═╝ ██║███████╗██████╔╝██║██║  ██║
╚══════╝ ╚═════╝ ╚═╝  ╚═╝ ╚═════╝ ╚═╝     ╚═╝╚══════╝╚═════╝ ╚═╝╚═╝  ╚═╝
                                                                                         
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
		print "\n\n [".date('H:m:s')."] Mencoba : $log => Valid\n";
	}else{
		print "\n[".date('H:m:s')."] Mencoba : $log => Gak Valid";
	}
}
  
?>
