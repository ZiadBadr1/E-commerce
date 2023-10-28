<?php
namespace App\Enums;

enum UserTypes: string
{
    case CUSTOMER = 'user';
    case SELLER = 'seller';
    case ADMIN = 'admin';
}
