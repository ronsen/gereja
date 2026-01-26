<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>{{ $title ?? config('app.name') }}</title>
	<meta name="description" content="Sistem Informasi Gereja.">
	<meta name="keywords" content="gereja, church">
	@vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="font-sans antialiased">
	{{ $slot }}
</body>

</html>
