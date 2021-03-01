<?php
require_once ROOT."/core/Model.php";

class Role extends Model
{
    protected static string $table = "role";
    protected static string $pk = "id";
}