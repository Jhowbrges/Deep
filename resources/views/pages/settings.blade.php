<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                Settings
            </h2>

            <a href="{{ route('dashboard') }}" class="text-sm underline text-gray-600 dark:text-gray-300">
                Voltar ao Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="text-gray-900 dark:text-gray-100 text-lg font-semibold">
                    Configurações (fictício)
                </div>

                <p class="text-gray-700 dark:text-gray-200">
                    Página placeholder de configurações. Ideal para simular navegação e gerar logs de acesso.
                </p>

                <div class="space-y-3">
                    <div class="flex items-center justify-between rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Tema</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-gray-100">Dark Mode</div>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Desligado</span>
                    </div>

                    <div class="flex items-center justify-between rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Notificações</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-gray-100">Email Alerts</div>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Ativo</span>
                    </div>

                    <div class="flex items-center justify-between rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Segurança</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-gray-100">2FA</div>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Em breve</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
