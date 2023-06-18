<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case Under = 'under';
    case  Processing = 'processing';
    case Canceled = 'canceled';
    case Delivered = 'delivered';
}


