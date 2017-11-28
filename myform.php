<? 

// ----------------------------конфигурация-------------------------- // 

 
$adminemail="rudaya2711@gmail.com";  // e-mail админа 
 
$date=date("d.m.y"); // число.месяц.год 

$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="http://yandex.by";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
// Принимаем данные с формы 
 
$name=$_POST['name']; 
$color=$_POST['color']; 
$town=$_POST['town']; 
$lang=$_POST['language']; 
$year=$_POST['year']; 
$photo=$_POST['[photo]']; 
$date=$_POST['[date]']; 


 // Отправляем письмо админу  
mail("$adminemail", "$date $time Сообщение от $name", "$color", "$town", "$lang", "$year", "$photo", "$date" ); 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Сообщение от $name"); 
 
fwrite($f,"\n $color "); 
fwrite($f,"\n $town "); 
fwrite($f,"\n $lang "); 
fwrite($f,"\n $year "); 
fwrite($f,"\n $photo "); 
fwrite($f,"\n $date "); 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
  
 
// Выводим сообщение пользователю 
 
print "<script language='Javascript'><!-- function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000); //--></script> 
 
$msg <p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";  
exit; 

?>