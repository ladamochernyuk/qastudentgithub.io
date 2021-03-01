<?php
require_once ROOT."/core/Model.php";

class Brand extends Model
{
    protected static string $table = "brand";
    protected static string $pk = "id";
}