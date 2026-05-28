<x-app-layout>
    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white">Gestión de Usuarios</h1>
                <p class="text-gray-600 dark:text-gray-300 mt-2">CRUD con búsqueda y roles.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.users.create') }}" class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-white shadow hover:bg-indigo-700 transition">
                    <span class="me-2">➕</span> Crear usuario
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-900/40 dark:bg-green-900/20 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-900/40 dark:bg-red-900/20 dark:text-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-900/60 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xl p-4">
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col sm:flex-row gap-3 sm:items-center">
                <div class="flex-1">
                    <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">Buscar</label>
                    <input type="text" name="q" value="{{ $q }}" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="por nombre o usuario" />
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2 text-white shadow hover:bg-indigo-700 transition">
                        🔎 Buscar
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        Limpiar
                    </a>
                </div>
            </form>

            <div class="overflow-x-auto mt-5">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-600 dark:text-gray-300">
                            <th class="py-3 px-4 font-semibold">Nombre completo</th>
                            <th class="py-3 px-4 font-semibold">Usuario</th>
                            <th class="py-3 px-4 font-semibold">Rol</th>
                            <th class="py-3 px-4 font-semibold">Creación</th>
                            <th class="py-3 px-4 font-semibold text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $u)
                            <tr class="border-t border-gray-100 dark:border-gray-800">
                                <td class="py-3 px-4">{{ $u->full_name }}</td>
                                <td class="py-3 px-4">{{ $u->username }}</td>
                                <td class="py-3 px-4">
                                    {{ $u->getRoleNames()->first() ?? 'Usuario' }}
                                </td>
                                <td class="py-3 px-4">{{ $u->created_at?->format('d/m/Y H:i') }}</td>
                                <td class="py-3 px-4 text-right">
                                    <div class="inline-flex gap-2">
                                        <a href="{{ route('admin.users.show', $u) }}" class="rounded-lg border border-gray-200 dark:border-gray-700 px-3 py-1 hover:bg-gray-50 dark:hover:bg-gray-800 transition">Ver</a>
                                        <a href="{{ route('admin.users.edit', $u) }}" class="rounded-lg border border-gray-200 dark:border-gray-700 px-3 py-1 hover:bg-gray-50 dark:hover:bg-gray-800 transition">Editar</a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $u) }}" onsubmit="return confirm('¿Eliminar a ' + '{{ $u->username }}' + '?')" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg border border-red-200 dark:border-red-900/40 bg-red-50 dark:bg-red-900/20 px-3 py-1 text-red-700 dark:text-red-200 hover:bg-red-100 dark:hover:bg-red-900/30 transition">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-gray-500 dark:text-gray-400">No hay usuarios.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

