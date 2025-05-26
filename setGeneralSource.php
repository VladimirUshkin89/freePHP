<?php
// Проверяем, объявлена ли функция (защита от ошибки redeclare)
if (!function_exists('my_is_contain')) {
    function my_is_contain($source, $sourses = []): bool
    {
        foreach ($sourses as $s) {
            // Проверяем без учета регистра через stripos()
            if (stripos($source, $s) !== false) {
                return true;
            }
        }
        return false;
    }
}

// Источник из лида
$source = $this->getVariable('user_source');

// Маппинг: ключ => массив значений для проверки
$sourceMappings = [
    'avito'      => ["вито", "vito"],
    'avtoRu'     => ["AvtoRu", "avto.ru", "Авто.ру"],
    'drom'       => ['Дром', 'Drom', 'ДРОМ'],
    'site'       => ["Сайт", "site"],
    'context'    => ["Контекст", "Яндекс.Директ"],
    'gis'        => ["2 гис", "2Гис", "gis", "2гис"],
    'yaMap'      => ["ЯндексКарты", "Яндекс.Карты"],
    'gMap'       => ["GoogleКарты", "GoogleMaps", "ГуглКарты"],
    'telega'     => ["telegram", "телеграм", "Телеграмм"],
    'whatsapp'   => ["whatsapp", "ватсап"],
    'insta'      => ["инстаграм", "instagram", "Инстаграмм"],
    'vk'         => ["VK", "вк"],
    'uTube'      => ["ютуб", "YouTube"],
    'inside'     => ["Наружка"]
];

// Значение по умолчанию
$result = 'noFind';

// Проверяем все варианты
foreach ($sourceMappings as $key => $values) {
    if (my_is_contain($source, $values)) {
        $result = $key;
        break; // Прерываем при первом совпадении
    }
}

// Записываем результат
$this->setVariable('total_source', $result);


?>
