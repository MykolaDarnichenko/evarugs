<?

// получаем значения из формы
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['message'];

// функция для создания запроса на сервер Telegram
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

//формируем сообщение 
$message .= "Сообщение с сайта EvaRugs+";
$message .= "Имя: ".$name;
$message .= "Email: ".$email;
$message .= "Текст: ".$text;

$token = "6707080081:AAHeg1POKu3K__gfwvJ2nT2X-nE79AfxxF8";
$chat_id = "-4181174812";
parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");
?>
