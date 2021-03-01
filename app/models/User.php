<?php

require_once ROOT."/core/Model.php";

class User extends Model
{
    protected static string $table = "user";
    protected static string $pk = "id";
}

