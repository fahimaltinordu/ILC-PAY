<html>
<head>
<link rel="stylesheet" href="js/micropos.css">
</head>
<title>ILC-Pay</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="ILCoin Web point of sale">
<meta name="keywords" content="easy,simple,simplest,online,ilcoin,ILC,cryptocurrency,payment,btc,bch,js,browser">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<?php

//Project: micro-pos ILCoin ILC php script
//Author: PlusBit <info@plusbit.tech>
//inspired from https://github.com/dArkjON/micro-pos/
//This script is released under the GNU General Public License v3.0 See the LICENSE file for more information
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

echo "<body style='background: url(https://ilcointools.com/ilc-pay/back.jpg);'>";


echo '<img src="https://ilcointools.com/ilc-pay/logo.png" width="300">';
echo '<h6>This is a Demo for the ILC-PAY<br />Easily install on your PHP server. <a href="https://github.com/PlusBitPos/ILC-PAY"> Source code</a></h6>';
$coin = 'ILCoin';
include 'wallet.php';


$price = number_format($_POST['amount'], 2, '.', '');

$msg1 = $_GET['msg'];
$msg2 = $_GET['wallet'];
$msg3 = $_GET['amount'];

$json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ilcoin/?convert=VND'); 
$data = json_decode($json);

$pusd = number_format($data[0]->price_usd, 4);
$ptry = number_format($data[0]->price_vnd, 4);
//$peuro = number_format($data[0]->price_eur, 2);
$pbtc = $data[0]->price_btc;
$ptry = $data[0]->price_vnd;
$psymbole = $data[0]->symbol;

echo '<h4>'.$coin.' Rate <br>';
echo 'ILC/VND : '.$ptry.' </h4>';
echo 'ILC/USD : $'.$pusd.' // ILC/BTC : '.$pbtc.'<br></h4>'; 
//echo 'EUR : '.$peuro.'<br>';

echo '<h6> Exchange rates are taken from the CoinMarketCap</h6><br>';

//echo 'Wallet 1:'.$wallet.'<br>'.'Wallet 2:'.$wallet1.'<br>'.'Wallet 3:'.$wallet2.'<br>'.'Wallet 4:'.$wallet3.'<br>'.'Wallet 5:'.$wallet4.'<br>';

	
if ($_POST['amount'] == ''){
	
if ($msg1 == "123"){
echo '<br>';
echo '<img src="https://ilcointools.com/ilc-pay/pay.png" width="230">';
echo '<br>';
echo '<h4>'.$msg3.' '.$psymbole.' payment <br>'.$msg2.' <br> completed successfully.</h4>';
echo '<meta http-equiv="refresh" content="5; URL=https://ilcointools.com/ilc-pay">';
}else{
	
echo '<form action="" method="post">';
echo '<h3>Invoice amount : <input type="number" class="text" step="any" name="amount"> VND <br><br>';
echo '<input type="submit" value="Create Invoice"></h3>';
echo '</form>';




}

echo '<h5><a href="https://ilcointools.com/ilc-pay/">ILC-PAY</a></h5>';
}else{
$target = number_format($price/$ptry, 8);
	
$json2 = file_get_contents('https://ilcoinexplorer.com/api/addr/'.$wallet); 
$data2 = json_decode($json2);
$addrStr = $data2->addrStr;
$balance = $data2->balance;
$unconfirmedBalance = $data2->unconfirmedBalance;
$unconfirmedTxApperances = $data2->unconfirmedTxApperances;
$txApperances = $data2->txApperances;

if ($unconfirmedTxApperances == '0'){
echo '<h6>Invoice Total Amount: '.$price.' VND <br />'.$target.' '.$psymbole.'<br /></h6>';
echo '<a href="ilcoin:'.$wallet.'?amount='.$target.'"><img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=ilcoin:'.$wallet.'?amount='.$target.'" title="'.$wallet.'" /></a>';
echo '<div id="open"><h6> Payment Address: '.$wallet.'<br><br>... Loading Details ...</h6></div>';
}else{
	$json2 = file_get_contents('https://ilcoinexplorer.com/api/addr/'.$wallet1); 
	$data2 = json_decode($json2);
	$addrStr = $data2->addrStr;
	$balance = $data2->balance;
	$unconfirmedBalance = $data2->unconfirmedBalance;
	$unconfirmedTxApperances = $data2->unconfirmedTxApperances;
	$txApperances = $data2->txApperances;
	if ($unconfirmedTxApperances == '0'){
	echo '<h6>Invoice Total Amount: '.$price.' VND<br />'.$target.' '.$psymbole.'<br /></h6>';
	echo '<a href="ilcoin:'.$wallet1.'?amount='.$target.'"><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=ilcoin:'.$wallet1.'?amount='.$target.'" title="'.$wallet1.'" /></a>';
	echo '<div id="open"><h6>Payment Address: '.$wallet1.'<br><br>... Loading Details ...</h6></div>';
	}else{
	$json2 = file_get_contents('https://ilcoinexplorer.com/api/addr/'.$wallet2); 
	$data2 = json_decode($json2);
	$addrStr = $data2->addrStr;
	$balance = $data2->balance;
	$unconfirmedBalance = $data2->unconfirmedBalance;
	$unconfirmedTxApperances = $data2->unconfirmedTxApperances;
	$txApperances = $data2->txApperances;
	if ($unconfirmedTxApperances == '0'){
	echo '<h6>Invoice Total Amount: '.$price.' VND<br />'.$target.' '.$psymbole.'<br /></h6>';
	echo '<a href="ilcoin:'.$wallet2.'?amount='.$target.'"><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=ilcoin:'.$wallet2.'?amount='.$target.'" title="'.$wallet2.'" /></a>';
	echo '<div id="open"><h6>Payment Address: '.$wallet2.'<br><br>... Loading Details ...</h6></div>';
	}else{
	$json2 = file_get_contents('https://ilcoinexplorer.com/api/addr/'.$wallet3); 
	$data2 = json_decode($json2);
	$addrStr = $data2->addrStr;
	$balance = $data2->balance;
	$unconfirmedBalance = $data2->unconfirmedBalance;
	$unconfirmedTxApperances = $data2->unconfirmedTxApperances;
	$txApperances = $data2->txApperances;
	if ($unconfirmedTxApperances == '0'){
	echo '<h6>Invoice Total Amount: '.$price.' VND<br />'.$target.' '.$psymbole.'<br /></h6>';
	echo '<a href="ilcoin:'.$wallet3.'?amount='.$target.'"><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=ilcoin:'.$wallet3.'?amount='.$target.'" title="'.$wallet3.'" /></a>';
	echo '<div id="open">Payment Address: '.$wallet3.'<br><br>... Loading Details ...</div>';
	}else{
	$json2 = file_get_contents('https://ilcoinexplorer.com/api/addr/'.$wallet4); 
	$data2 = json_decode($json2);
	$addrStr = $data2->addrStr;
	$balance = $data2->balance;
	$unconfirmedBalance = $data2->unconfirmedBalance;
	$unconfirmedTxApperances = $data2->unconfirmedTxApperances;
	$txApperances = $data2->txApperances;
	if ($unconfirmedTxApperances == '0'){
	echo '<h6>Invoice Total Amount: '.$price.' VND<br />'.$target.' '.$psymbole.'<br /></h6>';
	echo '<a href="ilcoin:'.$wallet4.'?amount='.$target.'"><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=ilcoin:'.$wallet4.'?amount='.$target.'" title="'.$wallet4.'" /></a>';	
	echo '<div id="open">Payment Address: '.$wallet4.'<br><br>... Loading Details ...</div>';
	}else{
	echo 'Sorry, All Wallet Addresses Are In Use. When the other process is completed, try again.<br>';
	echo '<a href="https://ilcointools.com/ilc-pay">Restart</a>';
	}	}	}	}	}
	


$myfile = fopen("logs.txt", "a") or die("Unable to open file!");
$txt = "Create Invoice : ".$addrStr." ".$target." ".$price." \n";
fwrite($myfile, $txt);
fclose($myfile);
}
?>



<script type="text/javascript">
setInterval(function(){
$('#open').load('open.php?wallet=<?php echo $addrStr;?>&coin=<?php echo $target;?>');
},15000);
</script>
<script src="js/jquery.min.js"></script>
</body>
</html>
