<!--
Project: micro-pos ILCoin ILC php script
Author: PlusBit <info@plusbit.tech>
inspired from https://github.com/dArkjON/micro-pos/
This script is released under the GNU General Public License v3.0 See the LICENSE file for more information
-->

<?php 
$paywallet = $_GET['wallet'];
$total = $_GET['coin'];

$json2 = file_get_contents('https://ilcoinexplorer.com/api/addr/'.$paywallet); 
$data2 = json_decode($json2);

$addrStr = $data2->addrStr;
$balance = $data2->balance;
$unconfirmedBalance = $data2->unconfirmedBalance;
$unconfirmedTxApperances = $data2->unconfirmedTxApperances;
$txApperances = $data2->txApperances;

echo '<h6>Payment address : '.$addrStr.'<br>';
echo 'Balance : '.$balance.' ILC // TX No : '.$txApperances.'<br>';
echo 'Unconfirmed Balance : '.$unconfirmedBalance.'  // TX No : '.$unconfirmedTxApperances.'</h6><br>';

$check1 = $unconfirmedBalance - $total;

if ($unconfirmedBalance == $total && $unconfirmedTxApperances == "1") {
	$msg = '<h6>Payment recieved and Amount Match !</h6>';
	$myfile = fopen("logs.txt", "a") or die("Unable to open file!");
	$txt = "Payed Invoice : ".$addrStr." ".$total." \n";
	fwrite($myfile, $txt);
	fclose($myfile);
	echo '<meta http-equiv="refresh" content="3; URL='.$_SERVER['HTTP_REFERER'].'?msg=123&wallet='.$addrStr.'&amount='.$total.'">';
	}else{
	$msg = '<h6>Awaiting Payment....</h6>';
}
echo $msg;
echo '<h6><a href="'.$_SERVER['HTTP_REFERER'].'">Restart</a></h6>';
?>
