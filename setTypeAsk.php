<?php


// Проверяем, объявлена ли функция (защита от ошибки redeclare)
if (!function_exists('my_is_find')) {
    function my_is_find($source, $sourses = []): bool
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

// Тип сделки из лида
$source = $this->getVariable('type_of_ask');

// Маппинг: ключ => массив значений для проверки
$sourceMappings = [
    'nalichie'      => ["Наличие", "наличие"],
    'zakaz'         => ["Заказ", "заказ", "Ростов", "Казань", "Сочи", "Воды", "Мин.Воды", "Новороссийск",
        "ЕКБ", "екб", "Екб", "Новгород", "Волгоград", "СПБ","спб", "Спб", "Питер", "Импорт", "импорт"]

];

// Значение по умолчанию
$result = 'noFind';

// Проверяем все варианты
foreach ($sourceMappings as $key => $values) {
    if (my_is_find($source, $values)) {
        $result = $key;
        break; // Прерываем при первом совпадении
    }
}

// Записываем результат туда же
$this->setVariable('type_of_ask', $result);



?>
