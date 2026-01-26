<x-app>
	<div class="grid min-h-screen place-items-center bg-gray-50">
		<div class="w-md container mx-auto rounded-lg border border-gray-300 px-6 py-10 shadow bg-white">
			<h3 class="mb-4 text-center text-lg font-bold">Sistem Informasi Gereja</h3>

			@auth
				<a href="/admin" class="flex w-full cursor-pointer justify-center rounded-full bg-blue-500 p-2 text-white">Masuk
					Dasbor</a>
			@else
				<form method="post" action="/register" class="mb-4">
					@csrf
					<div class="mb-3">
						<input type="text" name="name" value="{{ old('name') }}" class="w-full rounded">
						<div class="mt-1 text-xs text-gray-800">Nama</div>
					</div>
					<div class="mb-3">
						<input type="email" name="email" value="{{ old('email') }}" class="w-full rounded">
						<div class="mt-1 text-xs text-gray-800">E-mail</div>
					</div>
					<div class="mb-3">
						<input type="password" name="password" class="w-full rounded">
						<div class="mt-1 text-xs text-gray-800">Sandi</div>
					</div>
					<button type="submit" class="w-full cursor-pointer rounded-full bg-blue-500 p-2 text-white">Daftar</button>
				</form>

				<p class="text-center">Silakan <a href="/admin" class="underline">masuk</a> jika Anda sudah terdaftar.</p>
			@endauth
		</div>
	</div>
</x-app>
