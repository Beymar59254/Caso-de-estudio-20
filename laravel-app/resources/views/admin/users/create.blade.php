<x-app-layout>
    <div class="container mx-auto px-4 py-10">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white">Crear usuario</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Completa los datos y asigna un rol.</p>

            <div class="mt-6 bg-white dark:bg-gray-900/60 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xl p-6">
                <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">Nombre completo</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-500" required />
                        @error('full_name')
                            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">Usuario</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-500" required />
                        @error('username')
                            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">Contraseña</label>
                        <input type="password" name="password" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-500" required />
                        @error('password')
                            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">Rol</label>
                        <select name="role" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">Selecciona...</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->name }}" @selected(old('role') === $r->name)>{{ $r->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <a href="{{ route('admin.users.index') }}" class="rounded-xl border border-gray-200 dark:border-gray-700 px-4 py-2 hover:bg-gray-50 dark:hover:bg-gray-800 transition">Cancelar</a>
                        <button type="submit" class="rounded-xl bg-indigo-600 text-white px-4 py-2 shadow hover:bg-indigo-700 transition">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

