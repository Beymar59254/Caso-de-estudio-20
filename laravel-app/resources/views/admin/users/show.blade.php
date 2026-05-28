<x-app-layout>
    <div class="container mx-auto px-4 py-10">
        <div class="max-w-2xl mx-auto">
            <div class="flex items-start justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white">Detalle de usuario</h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Información registrada.</p>
                </div>
                <a href="{{ route('admin.users.index') }}" class="rounded-xl border border-gray-200 dark:border-gray-700 px-4 py-2 hover:bg-gray-50 dark:hover:bg-gray-800 transition">Volver</a>
            </div>

            <div class="bg-white dark:bg-gray-900/60 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xl p-6">
                <div class="space-y-4">
                    <div class="rounded-xl bg-gray-50 dark:bg-gray-800/40 border border-gray-200 dark:border-gray-700 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Nombre completo</div>
                        <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->full_name }}</div>
                    </div>

                    <div class="rounded-xl bg-gray-50 dark:bg-gray-800/40 border border-gray-200 dark:border-gray-700 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Usuario</div>
                        <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->username }}</div>
                    </div>

                    <div class="rounded-xl bg-gray-50 dark:bg-gray-800/40 border border-gray-200 dark:border-gray-700 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Rol</div>
                        <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->getRoleNames()->first() ?? 'Usuario' }}</div>
                    </div>

                    <div class="rounded-xl bg-gray-50 dark:bg-gray-800/40 border border-gray-200 dark:border-gray-700 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Fecha de creación</div>
                        <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->created_at?->format('d/m/Y H:i') }}</div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('admin.users.edit', $user) }}" class="rounded-xl bg-indigo-600 text-white px-4 py-2 shadow hover:bg-indigo-700 transition">Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

