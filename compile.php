<?php

function fatal_error($message) {
    file_put_contents(mktemp('report'),
        date('m-d H:i:s') . ' ' . $_SERVER['REMOTE_ADDR'] . "\n" .
        print_r(array('_REQUEST' => $_REQUEST, '_SERVER' => $_SERVER), true) . "\n\n" . $message);
    echo 'Произошла ошибка. Попробуйте снова или напишите нам на <a href="mailto:mail@ucteam.ru">mail@ucteam.ru</a>.';
    echo "<br><br>Информация об ошибке:<br>\n";
    echo $message;
    die;
}

function redirect($url, $status_code = 303) {
   header("Location: $url", true, $status_code);
   die;
}

function mktemp($pref) {
    return tempnam('tmp', $pref);
}

function compile($code, $outfile) {
    $data = array(
        'ochem' => 'false',
        'dpi' => '120',
        'utf8' => 'on',
        'template' => '13',
        'device' => '6',
        'bgcolor' => '',
        'papersize' => '1',
        'runexample' => 'false',
        'src' => $code,
    );
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $response = file_get_contents('http://sciencesoft.at/latex/compile', false, $context);
    $response = json_decode($response, true);
    if ($response['error']) {
        fatal_error(var_export($response, true));
    }
    $url = "http://sciencesoft.at/image/latex/latex.pdf?index={$response['idx']}&id={$response['id']}";
    $result = file_get_contents($url);
    file_put_contents($outfile, $result);
}

$what = $_REQUEST['what'];
$template_tex = "assets/ref_{$what}_title.tex";
if (!preg_match('/^[a-z]+$/', $what) || !file_exists($template_tex)) {
    fatal_error("Not a codex: $what");
}

$group = strval($_REQUEST['group']);
$name = !empty($_REQUEST['name']) ? strval($_REQUEST['name']) : 'Путимцева И. Д.';

$data = array(
    '$ofStudentOf$' => $_REQUEST['sex'] === 'f' ? 'обучающейся' : 'обучающегося',
    '$group$'       => $group,
    '$name$'        => $name,
);

$data_hash = substr(md5(json_encode($data)), 0, 8);
$result_pdf = "results/{$data_hash}_{$what}.pdf";
$result_url = "{$data_hash}/referat_{$what}.pdf";

if (!file_exists($result_pdf)) {
    $title_code = file_get_contents($template_tex);
    $title_code = str_replace(array_keys($data), array_values($data), $title_code);

    $title_pdf = mktemp('compile');
    compile($title_code, $title_pdf);

    $rest_pdf = "assets/ref_{$what}_rest.pdf";
    $pdfmarks = "assets/ref_{$what}_pdfmarks";
    shell_exec("gs -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile=$result_pdf $title_pdf $rest_pdf $pdfmarks");
    unlink($title_pdf);
}

redirect($result_url);
