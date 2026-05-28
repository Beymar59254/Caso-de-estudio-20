<x-app-layout>
    <div class="container mx-auto px-4 py-10">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white dark:bg-gray-900/60 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xl">
                <div class="p-6 sm:p-8">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white">
                                Perfil de Usuario
                            </h1>
                            <p class="mt-2 text-gray-600 dark:text-gray-300">
                                Información del sistema (solo lectura).
                            </p>
                        </div>

                        <div class="shrink-0">
                            <span class="inline-flex items-center rounded-full bg-indigo-50 dark:bg-indigo-500/15 px-3 py-1 text-indigo-700 dark:text-indigo-200 text-sm font-semibold">
                                Usuario
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-4">
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
                            <div class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ $user->getRoleNames()->first() ?? 'Usuario' }}
                            </div>
                        </div>

                        <div class="rounded-xl bg-gray-50 dark:bg-gray-800/40 border border-gray-200 dark:border-gray-700 p-4">
                            <div class="text-sm text-gray-500 dark:text-gray-400">Fecha de creación</div>
                            <div class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ $user->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <a href="{{ route('logout') }}" class="hidden">{{ csrf_token() }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

