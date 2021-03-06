<?php namespace Pixiu\Commerce\Models;

use Model;

/**
 * AttributeGroup Model
 */
class AttributeGroup extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pixiu_com_attribute_groups';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'attributes' => ['Pixiu\Commerce\Models\Attribute']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}