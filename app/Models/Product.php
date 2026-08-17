<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // dice la dir de la herramienta hasfactory

class Product extends Model // creacion clase prodcuct que hereda de model
{
    use HasFactory; // aqui es cuando la clase obtiene todos los metodos de la tool
       /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
    */


    protected $fillable = ['name','price'];
     // se crea una lista que guarda los valores del name y price por seguridad
    //getters y setters de cada atributo

    public function getId(): int
    //funcion publica es accedida por cualquiera
    {
        return $this->attributes['id'];
        // atributes es un arreglo que pertence a la clase padre 
        // cotiene todos los atributos de la tabla
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price) : void
    {
        $this->attributes['price'] = $price;
    }


}
