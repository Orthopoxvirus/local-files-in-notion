<?php
$domain = 'yourdomain.com';

$file = $_GET['f'] ?? null;
if ($file) {
	header("Location: localexplorer:$file");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Notion File System</title>
</head>
<body>
<p>
	<br />
	<input title="link input" type="text" width="200" style="width: 600px; max-width: 100%;" placeholder="Link hier einfügen">
</p>

<script>
	let input = document.querySelector('input');
	input.addEventListener('keyup', function (e) {
		if (e.key === "Enter") {
			let path = encodeURI(input.value.replace(/['"]+/g, '')).replace(/\+/g, '%2B');
			let url = new URL("https://<?=$domain?>/file.php?f=" + path);
			input.value = url.href;

			// copy input field value to clipboard
			if (!navigator.clipboard) {
				fallbackCopyTextToClipboard(input);
				return;
			}
			navigator.clipboard.writeText(input.value).then(function () {
				console.log('Async: Copying to clipboard was successful!');
			}, function (err) {
				console.error('Async: Could not copy text: ', err);
			});

			// mark text in input field
			input.select();
		}
	});

	function fallbackCopyTextToClipboard(input) {
		input.focus();
		input.select();

		try {
			let successful = document.execCommand('copy');
			let msg = successful ? 'successful' : 'unsuccessful';
			console.log('Fallback: Copying text command was ' + msg);
		} catch (err) {
			console.error('Fallback: Oops, unable to copy', err);
		}
	}
</script>

<style>
	body {
		background-color: #aaaaaa !important;
	}
</style>
</body>
</html>
