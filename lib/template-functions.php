<?php

function renderTemplate(string $path, array $templateData = []): string
{
	if (!file_exists($path))
	{
		return " renderTemplate file is not exist : " . $path;
	}

	extract($templateData, EXTR_OVERWRITE);
	ob_start();
	include $path;
	return ob_get_clean();
}

function renderLayout(string $content, array $templateData = []): void
{
	$data = array_merge($templateData, [
		'content' => $content,
	]);
	$result = renderTemplate("./resource/pages/layout.php", $data);

	echo $result;
}

function convertRating(string $rating): string
{
	if (isset($rating))
	{
		return number_format($rating, 1, '.', '');
	}
	return "rating is empty";
}
