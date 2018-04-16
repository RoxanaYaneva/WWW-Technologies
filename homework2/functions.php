<?php

function showPage($data, $pageId) {
	$h1 = $data[$pageId]['title'];
	$h2 = $data[$pageId]['lecturer'];
	$p = $data[$pageId]['description'];
	$string = '<h1>'.$h1.'</h1>'.
			  '<h2>'.$h2.'</h2>'.
			  '<p>'.$p.'</p>';
	return $string;
}

function showNav($data, $pageId) {
	$string = '<nav>';
	foreach ($data as $key => $value) {
		$content = $value['title'];
		if($key == $pageId) {
			$string .= '<a href="?page='.$key.'" class="selected">'.$content.'</a><br>';
		} 
		else {
			$string .= '<a href="?page='.$key.'">'.$content.'</a><br>';
		}
	}
	$string .= '</nav>';
	return $string;
}

//-----------example-info--------------------

$data = [
  'webgl' => [
    'title' => 'Компютърна графика с WebGL',
    'description' => '...',
    'lecturer' => 'доц. П. Бойчев',
  ],
  'go' => [
    'title' => 'Програмиране с Go',
    'description' => '...',
    'lecturer' => 'Николай Бачийски',
  ]
];

$pageId = 'webgl';
$pageId2 = 'go';

//----------------demo---------------------

echo showPage($data, $pageId);

echo showPage($data, $pageId2);

echo "-----------Navigation---------------";

echo showNav($data, $pageId);

?>
