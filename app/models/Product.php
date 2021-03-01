<?php
require_once ROOT."/core/Model.php";

class Product extends Model
{
    protected static string $table = "product";
    protected static string $pk = "id";
}