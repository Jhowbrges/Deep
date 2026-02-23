<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                Reports
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
                    Relatórios (fictício)
                </div>

                <p class="text-gray-700 dark:text-gray-200">
                    Aqui você pode simular telas de relatórios para gerar tráfego e alimentar os gráficos do dashboard.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Relatório</div>
                        <div class="text-base font-semibold text-gray-900 dark:text-gray-100">Acessos por dia</div>
                    </div>

                    <div class="rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Relatório</div>
                        <div class="text-base font-semibold text-gray-900 dark:text-gray-100">Top páginas</div>
                    </div>

                    <div class="rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Relatório</div>
                        <div class="text-base font-semibold text-gray-900 dark:text-gray-100">Usuários únicos</div>
                    </div>
                </div>

                <div class="text-xs text-gray-500 dark:text-gray-400">
                    Dica: dê refresh algumas vezes pra ver o dashboard mudando.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
