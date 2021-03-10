<?php
namespace app\models;

use core\Model;

class Product extends Model
{
    protected static string $table = "products";
    protected static string $pk = "id";
}