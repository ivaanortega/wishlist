<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable=['name','description','price','url','image_url'];


    protected static function booted()
    {
        static::creating(function ($product) {
            $product->url = self::addOrReplaceAmazonAffiliateTag($product->url);
        });

        static::updating(function ($product) {
            $product->url = self::addOrReplaceAmazonAffiliateTag($product->url);
        });
    }

    private static function addOrReplaceAmazonAffiliateTag($url)
    {
        // Comprobar si la URL está vacía o no es válida
        if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            return ''; // Retornar una cadena vacía si la URL no es válida
        }

        $modifiedUrl = $url;
        try {
            $tagValue = config('services.amazon.affiliate_tag');
            // Parsear la URL
            $urlParts = parse_url($url);

            // Si la URL tiene parámetros de consulta
            if (isset($urlParts['query'])) {
                // Parsear los parámetros de la consulta
                parse_str($urlParts['query'], $queryParameters);

                // Comprobar si el parámetro 'tag' existe
                if (isset($queryParameters['tag'])) {
                    // Reemplazar el valor del parámetro 'tag'
                    $queryParameters['tag'] = $tagValue;
                } else {
                    // Agregar el parámetro 'tag'
                    $queryParameters['tag'] = $tagValue;
                }

                // Construir la cadena de consulta modificada
                $modifiedQueryString = http_build_query($queryParameters);

                // Actualizar la URL con la cadena de consulta modificada
                $urlParts['query'] = $modifiedQueryString;
            } else {
                // Si no existen parámetros de consulta, agregar el parámetro 'tag'
                $urlParts['query'] = 'tag=' . $tagValue;
            }

            // Reconstruir la URL modificada
            $modifiedUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $urlParts['query'];

        } catch (Exception $e) {
            // Manejo de errores (en caso de que algo falle en el try)
            // Puedes registrar el error en los logs o manejarlo de otra manera
            return ''; // En caso de error, devolver una cadena vacía
        }

        return $modifiedUrl;
    }
}
