<?php
//Установка подразделения

//$this->setVariable('city', 'город заполнен');

// Получаем ID текущего Лида
//$leadId = $this->get'LEAD_ID');

$source = $this->getVariable('user_source');

//$this->setVariable('city', $source);

$imp = ["Импорт_", "импорт_"];
$at = ["_АТ_", "_ат_", "_Ат_", "Автосалон_"];
$tuning = ['_Тюнинг_', '_тюнинг_', "Тюнинг_" ];
$ac = ["АС", "Ас", "ас", "Сервис_"];
$mz = ["_МЗ_", "_мз_", "_Detalno_", "_detalno_", "МЗ_"];
$krd_city = ["Крд", "крд", "р263", "Р263", "Краснодар"];
$msk_city = ["мск", "Мск", "Москва", "МСК"];

if (inList($source, $imp)) $this->setVariable('dep', 'imp');
elseif (inList($source, $at)) $this->setVariable('dep', 'at');
elseif (inList($source, $tuning)) $this->setVariable('dep', 'tuning');
elseif (inList($source, $ac)) $this->setVariable('dep', 'ac');
elseif (inList($source, $mz)) $this->setVariable('dep', 'mz');
else $this->setVariable('dep', 'unknown');

if (inList($source, $krd_city)) $this->setVariable('city', 'krd');
elseif (inList($source, $msk_city)) $this->setVariable('city', 'msk');
else $this->setVariable('city', 'unknown');


//Есть ли слово из источника в переданном массиве
function inList($source, array $list): bool{
    $isAlive = false;
    foreach ($list as $l){
        if(str_contains($source, $l)){
            $isAlive = true;
            break;
        }
    }
    return $isAlive;
}


?>
