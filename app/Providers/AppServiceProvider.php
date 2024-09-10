<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        View::composer('layouts.app', function($view){
            $brands = Brand::orderBy('order')
            ->orderBy('id')
            ->get();
    
            $categories = Category::orderBy('order')
            ->orderBy('id')
            ->get();
    
            $sections = [0, 5, 10, 15];

            $view->with('globalSections', $sections);
            $view->with('globalBrands', $brands);
            $view->with('globalCategories', $categories);
        });

        View::composer('layouts.admin', function ($view) {

            $unreadOrders = Order::where('is_read', false)->count();
           // $unreadConections = Conection::where('is_read', false)->count();
            $unreadMessages = Message::where('is_read', false)->count();

            $totalUnread = $unreadOrders;
    
            // Obtener las órdenes y añadir el tipo
            $orders = Order::orderBy('created_at', 'desc')
                ->get()
                ->map(function ($item) {
                    return [
                        'type' => 'order',
                        'created_at' => $item->created_at,
                        'url' => url('orders/' . $item->id . '/show'),
                        'title' => 'Nueva orden de ' . $item->user->name,
                        'is_read' => $item->is_read
                    ];
                });
            
            // Obtener las conexiones y añadir el tipo
           /*$conections = Conection::orderBy('created_at', 'desc')
                ->get()
                ->map(function ($item) {
                    return [
                        'type' => 'conection',
                        'created_at' => $item->created_at,
                        'url' => url('admin/conections/' . $item->id),
                        'title' => 'Nueva solicitud de ' . $item->name,
                        'is_read' => $item->is_read
                    ];
                });*/
            
            // Combinar las colecciones, ordenarlas por fecha y tomar los primeros 3 elementos
            /*if($orders->count() > 0){
                $notifications = $orders->merge($conections)
                ->sortByDesc('created_at')
                ->take(3);
            }else{
                $notifications = $conections
                ->sortByDesc('created_at')
                ->take(3);
            }*/
            $notifications = $orders
            ->sortByDesc('created_at')
            ->take(6);

            $messages = Message::orderBy('created_at', 'desc')->take(4)->get();

            // Pasar la colección al view
            $view->with('notifications', $notifications);
            $view->with('unreadNotifications', $totalUnread > 9 ? '+9' : $totalUnread);
            $view->with('messages', $messages);
            $view->with('unreadMessages', $unreadMessages > 9 ? '+9' : $unreadMessages);
        });
        
    }
}
