<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // relacion de  pertenece a, utilizada con product

class Comment extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['description'] - string - contains the comment description
     * $this->product - Product - contains the associated Product
     */
    protected $fillable = ['description', 'product_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $desc): void
    {
        $this->attributes['description'] = $desc;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $pId): void
    {
        $this->attributes['product_id'] = $pId;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
        // relacion entre el id de comment (product_id)
        // y el id del model del producto, se conectan las dos, como? el belongs to utiliza el nobmre de la funcion y le añade un
        // '_id' y busca en la tabla products la llave primaria
        // basicamente busca el registro del producto del comentario hecho, se hace un comentario de un producto y ese producto
        // es el que es traido
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct($product): void
    {
        $this->product = $product;
    }
}
