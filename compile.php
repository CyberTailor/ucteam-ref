<?php

function fatal_error($message) {
    file_put_contents(mktemp('report'),
        date('m-d H:i:s') . ' ' . $_SERVER['REMOTE_ADDR'] . "\n" .
        print_r(array('_REQUEST' => $_REQUEST, '_SERVER' => $_SERVER), true) . "\n\n" . $message);
    echo $message;
    die;
}

function mktemp($pref) {
    return tempnam('./tmp', $pref);
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
    $url = "http://sciencesoft.at/image/latex/latex.pdf?index=${response['idx']}&id=${response['id']}";
    $result = file_get_contents($url);
    file_put_contents($outfile, $result);
}

$what = $_REQUEST['what'];
$rest_pdf = "assets/ref_${what}_rest.pdf";
$template_tex = "assets/ref_${what}_title.tex";
if (!preg_match('/^[a-z]+$/', $what) || !file_exists($rest_pdf) || !file_exists($template_tex)) {
    fatal_error("Not a codex: ${what}");
}

$data = array(
    '$ofStudentOf$' => $_REQUEST['sex'] === 'f' ? 'учащейся' : 'учащегося',
    '$group$'       => strval($_REQUEST['group']),
    '$name$'        => strval($_REQUEST['name']),
);

$title_pdf = mktemp('compile');
$result_pdf = mktemp('compile');

$code = file_get_contents($template_tex);
$code = str_replace(array_keys($data), array_values($data), $code);
compile($code, $title_pdf);

shell_exec("gs -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile=$result_pdf $title_pdf $rest_pdf");

header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Transfer-Encoding: binary');
header("Content-Disposition: inline; filename=referat_${what}.pdf");
header('Content-Length: ' . filesize($result_pdf));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0, max-age=0');
header('Pragma: no-cache');
readfile($result_pdf);

unlink($title_pdf);
unlink($result_pdf);
