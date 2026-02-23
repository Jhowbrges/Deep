<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                Help
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
                    Central de Ajuda (fictício)
                </div>

                <p class="text-gray-700 dark:text-gray-200">
                    Página de ajuda para simular navegação e dúvidas frequentes.
                </p>

                <div class="space-y-3">
                    <div class="rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div class="font-semibold text-gray-900 dark:text-gray-100">Como atualizar meu perfil?</div>
                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Acesse <code>/profile</code> e altere seus dados.
                        </div>
                    </div>

                    <div class="rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div class="font-semibold text-gray-900 dark:text-gray-100">Como trocar a senha?</div>
                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            No perfil, preencha a nova senha e confirme.
                        </div>
                    </div>

                    <div class="rounded-lg border border-gray-200 dark:border-gray-800 p-4">
                        <div class="font-semibold text-gray-900 dark:text-gray-100">Por que o dashboard muda?</div>
                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Ele lê os dados da tabela <code>page_views</code> e gera os gráficos.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
