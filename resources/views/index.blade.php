<x-app :title=$title>
	<div class="grid min-h-screen place-items-center bg-gray-50">
		<div class="w-md container mx-auto rounded-lg border border-gray-300 bg-white shadow">
			<div class="px-6 py-10">
				<h3 class="mb-3 text-center text-lg font-bold">Sistem Informasi Gereja</h3>

				@auth
					<a href="/admin" class="mb-4 flex w-full cursor-pointer justify-center rounded-full bg-blue-500 p-2 text-white">Masuk
						Dasbor</a>
				@else
					@if ($errors->any())
						<div class="mb-6 rounded border border-red-500 bg-red-200 p-3 text-center">Terjadi kesalahan, mohon periksa kembali!
						</div>
					@endif

					<form method="post" action="/register" class="mb-4">
						@csrf
						<div class="mb-3">
							<input type="text" name="name" value="{{ old('name') }}" @class([
								'w-full',
								'rounded',
								'border-red-500' => $errors->has('name'),
							])>
							<div @class([
								'mt-1',
								'text-xs',
								'text-gray-800',
								'text-red-500' => $errors->has('name'),
							])>Nama</div>
						</div>
						<div class="mb-3">
							<input type="email" name="email" value="{{ old('email') }}" @class([
								'w-full',
								'rounded',
								'border-red-500' => $errors->has('email'),
							])>
							<div @class([
								'mt-1',
								'text-xs',
								'text-gray-800',
								'text-red-500' => $errors->has('email'),
							])>E-mail</div>
						</div>
						<div class="mb-3">
							<input type="password" name="password" @class([
								'w-full',
								'rounded',
								'border-red-500' => $errors->has('password'),
							])>
							<div @class([
								'mt-1',
								'text-xs',
								'text-gray-800',
								'text-red-500' => $errors->has('password'),
							])>Sandi</div>
						</div>
						<button type="submit" class="w-full cursor-pointer rounded-full bg-blue-500 p-2 text-white">Daftar</button>
					</form>

					<p class="mb-4 text-center">Silakan <a href="/admin" class="underline">masuk</a> jika Anda sudah terdaftar.</p>
				@endauth
			</div>

			<div class="flex items-center justify-center gap-3 rounded-b-lg bg-gray-100 p-2 text-sm">
				<a href="https://github.com/ronsen/gereja" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github"
						viewBox="0 0 16 16">
						<path
							d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
					</svg>
				</a>
			</div>
		</div>
	</div>
</x-app>
