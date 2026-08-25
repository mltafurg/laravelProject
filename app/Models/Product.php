<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory; // dice la dir de la herramienta hasfactory
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model // creacion clase prodcuct que hereda de model
{
    use HasFactory; // aqui es cuando la clase obtiene todos los metodos de la tool

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
     * $this->comments - Comment[] - contains the associated comments
     * $this -> attributes['created_at']- string - contains the date the product is created
     * $this -> attributes['updated_at']- string - contains the date the product is updated
     */
    protected $fillable = ['name', 'price'];

    /*
    we create a list that stores the values of name and price for security,
    we use only this attributes bc they are the ones the client or admin can modify
    the id and timestamps are not here cause the belong to the DB (DB generates them)
    */

    public function getId(): int
    // public function is accesed by everybody
    {
        return $this->attributes['id'];
        // attributes is an array that belongs to the Model Class
        // has all the attributes of the table
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
        // here we see that a product can have different comments, so based on the id of the product we
        // search all the comments that have this id of the product

    }

    public function getComments(): Collection
    {
        return $this->comments;
        // returns the collection of instances of comments
    }

    public function setComments(Collection $comments): void
    {
        $this->comments = $comments; // receives that collection
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
