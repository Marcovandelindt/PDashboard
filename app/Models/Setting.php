<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Define the fillables
    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * Get the name of a setting
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of a setting
     *
     * @returns string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
