<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoPedido extends Notification
{
    use Queueable;
    public $id_producto;
    public $id_cliente;
    /**
     * Create a new notification instance.
     */
    public function __construct($id_producto,$id_cliente)
    {
        $this->id_producto = $id_producto;
        $this->id_cliente = $id_cliente;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'mensaje' => 'Nuevo Pedido',
            'id_producto' => $this->id_producto,
            'id_cliente' => $this->id_cliente,
        ];
    }
}
