<?
function include_template($name, array $data = []) {
    $name = $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require $name;
    $result = ob_get_clean();
    return $result;
}
function splitDistance($distance_km) {
    $kilometers = floor($distance_km);
    $meters = ($distance_km - $kilometers) * 1000;
    
    if ($kilometers === 0) {
        return $meters . " м ";
    } else {
        return $kilometers . " км " . $meters . " м";
    }
}

function convertMinutesToHours($minutes) {
    $hours = floor($minutes / 60);
    $remaining_minutes = $minutes % 60;
    if ($hours === 0) {
        return $remaining_minutes . " мин ";
    } else {
        return $hours . " ч. " . $remaining_minutes . " мин.";
    }
}
?>