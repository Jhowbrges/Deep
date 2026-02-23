<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PageView;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        // Período: últimos 7 dias
        $from = Carbon::now()->subDays(6)->startOfDay();

        /*
        |--------------------------------------------------------------------------
        | Totais Gerais
        |--------------------------------------------------------------------------
        */

        // Total de acessos
        $totalViews7d = PageView::where('created_at', '>=', $from)->count();

        // Usuários únicos
        $uniqueUsers7d = PageView::where('created_at', '>=', $from)
            ->whereNotNull('user_id')
            ->distinct('user_id')
            ->count('user_id');

        /*
        |--------------------------------------------------------------------------
        | Top Páginas (com tradução e formatação)
        |--------------------------------------------------------------------------
        */

       	$topPages = PageView::where('created_at', '>=', $from)
    ->selectRaw('path, COUNT(*) as total')
    ->groupBy('path')
    ->orderByDesc('total')
    ->limit(7)
    ->get()
    ->map(function ($item) {

        $path = $item->path;

        // Remove domínio se existir
        $path = parse_url($path, PHP_URL_PATH) ?? $path;

        // Remove barra inicial e final
        $path = trim($path, '/');

        // Se for vazio (rota raiz)
        if ($path === '') {
            $path = 'home';
        }

        $translations = [
            'dashboard' => 'Painel',
            'help' => 'Ajuda',
            'reports' => 'Relatórios',
            'settings' => 'Configurações',
            'profile' => 'Perfil',
            'home' => 'Início',
        ];

        $key = strtolower($path);

        if (isset($translations[$key])) {
            $label = $translations[$key];
        } else {
            $label = ucfirst($path);
        }

        $item->label = $label;

        return $item;
    }); 
        /*
        |--------------------------------------------------------------------------
        | Gráfico: acessos por dia
        |--------------------------------------------------------------------------
        */

        $viewsByDay = PageView::where('created_at', '>=', $from)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = [];
        $series = [];

        // Garante 7 dias no gráfico mesmo se algum dia não tiver acesso
        for ($i = 6; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i)->toDateString();
            $labels[] = Carbon::parse($day)->format('d/m');

            $match = $viewsByDay->firstWhere('date', $day);
            $series[] = $match ? (int) $match->total : 0;
        }

        /*
        |--------------------------------------------------------------------------
        | Retorno para a View
        |--------------------------------------------------------------------------
        */

        return view('dashboard', [
            'totalViews7d' => $totalViews7d,
            'uniqueUsers7d' => $uniqueUsers7d,
            'topPages' => $topPages,
            'labels' => $labels,
            'series' => $series,
        ]);
    }
}
