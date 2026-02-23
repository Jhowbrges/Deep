<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                Painel
            </h2>

            <div class="flex flex-wrap items-center gap-3">
                <a
                    href="{{ route('pages.reports') }}"
                    class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-900 dark:text-gray-200 dark:ring-gray-700 dark:hover:bg-gray-800"
                >
                    Relatórios
                </a>

                <a
                    href="{{ route('pages.settings') }}"
                    class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-900 dark:text-gray-200 dark:ring-gray-700 dark:hover:bg-gray-800"
                >
                    Configurações
                </a>

                <a
                    href="{{ route('pages.help') }}"
                    class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-900 dark:text-gray-200 dark:ring-gray-700 dark:hover:bg-gray-800"
                >
                    Ajuda
                </a>

                <a
                    href="{{ route('profile.edit') }}"
                    class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-900 dark:text-gray-200 dark:ring-gray-700 dark:hover:bg-gray-800"
                >
                    Editar perfil
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- CARD PRINCIPAL: Usuário --}}
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-6">

                        {{-- Avatar --}}
                        <div class="shrink-0">
                            @if(auth()->user()->profile_photo)
                                <img
                                    src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                    alt="Foto de perfil"
                                    class="h-20 w-20 rounded-full object-cover ring-2 ring-gray-200 dark:ring-gray-700"
                                >
                            @else
                                <div
                                    class="h-20 w-20 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center ring-2 ring-gray-200 dark:ring-gray-700"
                                    title="Sem foto"
                                >
                                    <span class="text-gray-500 dark:text-gray-400 text-sm font-semibold">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Infos --}}
                        <div class="flex-1">
                            <div class="flex flex-col gap-1">
                                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ auth()->user()->name }}
                                </div>

                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ auth()->user()->email }}
                                </div>

                                <div class="mt-3 inline-flex items-center flex-wrap gap-2">
                                    @if(auth()->user()->email_verified_at)
                                        <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800 dark:bg-green-900/40 dark:text-green-200">
                                            E-mail verificado
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-200">
                                            E-mail não verificado
                                        </span>
                                    @endif

                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 dark:bg-gray-800 dark:text-gray-200">
                                        Conta: #{{ auth()->user()->id }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Ações rápidas --}}
                        <div class="flex gap-3">
                            <a
                                href="{{ route('profile.edit') }}"
                                class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
                            >
                                Editar
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-900 dark:text-gray-200 dark:ring-gray-700 dark:hover:bg-gray-800"
                                >
                                    Sair
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            {{-- KPIs --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Acessos (últimos 7 dias)</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $totalViews7d ?? 0 }}
                        </div>
                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Total de visitas registradas nas páginas do sistema.
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Pessoas diferentes (últimos 7 dias)</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $uniqueUsers7d ?? 0 }}
                        </div>
                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Quantas pessoas diferentes acessaram o sistema nesse período.
                        </div>
                    </div>
                </div>
            </div>

            {{-- Gráfico + Top páginas --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                Acessos por dia
                            </div>

                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                Últimos 7 dias
                            </span>
                        </div>

                        <div class="mt-4">
                            <canvas id="viewsChart" height="90"></canvas>
                        </div>

                        <div class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                            Dica: navegue entre as páginas e volte aqui para ver a atualização.
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Páginas mais visitadas
                        </div>

                        <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Últimos 7 dias
                        </div>

                        <div class="mt-4 space-y-3">
                            @forelse(($topPages ?? []) as $p)
                                <div class="flex items-center justify-between gap-3">
                                    <div class="text-sm text-gray-700 dark:text-gray-200 truncate" title="{{ $p->path }}">
                                        {{ $p->label }}
                                    </div>
                                    <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $p->total }}
                                    </div>
                                </div>
                            @empty
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    Ainda não há dados suficientes. Acesse algumas páginas e volte aqui.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- RESUMO (cards) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Status do acesso</div>
                        <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">Ativo</div>
                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Você está autenticado e pode navegar pelas áreas disponíveis.
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Foto de perfil</div>
                        <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">
                            {{ auth()->user()->profile_photo ? 'Configurada' : 'Não configurada' }}
                        </div>
                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Você pode atualizar sua foto na página de perfil.
                        </div>
                    </div>
                </div>
		{{-- Segurança --}}
		<div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
		    <div class="p-6">
		        <div class="text-sm text-gray-500 dark:text-gray-400">
		            Segurança
		        </div>
		
		        @if(auth()->user()->email_verified_at)
		            <div class="mt-2 text-2xl font-bold text-green-600">
		                Tudo certo
		            </div>
		            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
		                Seu e-mail está verificado e sua conta está protegida.
		            </div>
		        @else
		            <div class="mt-2 text-2xl font-bold text-yellow-600">
		                Atenção necessária
		            </div>
		            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
		                Seu e-mail ainda não foi verificado. Isso pode limitar recursos da conta.
		            </div>
		
		            <div class="mt-3">
		                <a href="{{ route('profile.edit') }}"
		                   class="inline-flex items-center rounded-md bg-yellow-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600">
		                    Verificar agora
		                </a>
		            </div>
		        @endif
		    </div>
		</div>
           </div>

        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels ?? []);
        const data = @json($series ?? []);

        const canvas = document.getElementById('viewsChart');

        if (canvas) {
            new Chart(canvas, {
                type: 'line',
                data: {
                    labels,
                    datasets: [{
                        label: 'Acessos',
                        data,
                        tension: 0.35
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        }
    </script>
</x-app-layout>
