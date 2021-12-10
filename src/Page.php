<?php

namespace ComminicationCraft\Pagemanagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Page extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = ['name','title','uri', 'description','status'];

    public $sortable = [ 'id','name','title','uri',];
}
