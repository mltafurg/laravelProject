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
     */
    protected $fillable = ['name', 'price'];
    // se crea una lista que guarda los valores del name y price por seguridad
    // solo de estos atributos porque son los que se pueden modificar por el cliente o admin
    // el id y los timestamps no porque son datos que pertenecen a la DB y este los genera 
    // getters y setters de cada atributo

    public function getId(): int
    // funcion publica es accedida por cualquiera
    {
        return $this->attributes['id'];
        // atributes es un arreglo que pertence a la clase padre
        // cotiene todos los atributos de la tabla
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price): void
    {
        $this->attributes['price'] = $price;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
        // aqui vemos que un producto puede tener varios comentarios
        // por lo tanto del id del producto buscamos todos los comentarios que tienen ese id del producto

    }

    public function getComments(): Collection
    {
        return $this->comments; // retorna la collecion de instancias de comments
    }

    public function setComments(Collection $comments): void
    {
        $this->comments = $comments; // recibe esa coleccion
    }
}
