<?php

echo '<h1>Заявки на обратный звонок</h1>';

global $wpdb;
$results = $wpdb->get_results('SELECT * FROM wp_callback_request ORDER BY id DESC', ARRAY_A);
?>
    <table class="cbr__table">
        <thead>
        <tr>
            <th>№</th>
            <th>Время заявки</th>
            <th>Статус</th>
            <th>Тема</th>
            <th>Ф.И.О.</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Вопрос</th>
            <th>Ссылка</th>
        </tr>
        </thead>
<?php ;
foreach ($results as $arrays) {
    echo '<tr>';
    $id = $arrays['id'];
    foreach ($arrays as $key => $value) {
        if ($key == 'status') {
            echo '<td>';
            echo "<input type='checkbox' ".($value !=0 ? 'checked' : '')." data-id='".$id."'>";
            echo '</td>';
        } elseif (($key == 'url') && $value) {
            echo '<td>';
            echo '<a href="'.$value.'">Перейти</a>';
            echo '</td>';
        } else {
            echo '<td>';
            echo $value;
            echo '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';

function get_callback()
{

}

add_action('init', 'get_callback');