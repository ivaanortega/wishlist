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
        //check if its an url
        //if($url == null || !filter_var($url, FILTER_VALIDATE_URL)) return dd($url);
        $modifiedUrl = $url;
        try {            
            $tagValue = config('services.amazon.affiliate_tag');
            // Parse the URL
            $urlParts = parse_url($url);

            // If there are query parameters in the URL
            if (isset($urlParts['query'])) {
                // Parse the query parameters
                parse_str($urlParts['query'], $queryParameters);

                // Check if the 'tag' parameter exists
                if (isset($queryParameters['tag'])) {
                    // Replace the 'tag' parameter value
                    $queryParameters['tag'] = $tagValue;
                } else {
                    // Add the 'tag' parameter
                    $queryParameters['tag'] = $tagValue;
                }

                // Build the modified query string
                $modifiedQueryString = http_build_query($queryParameters);

                // Update the URL with the modified query string
                $urlParts['query'] = $modifiedQueryString;
            } else {
                // If there are no existing query parameters, add the 'tag' parameter
                $urlParts['query'] = 'tag=' . $tagValue;
            }

            // Rebuild the modified URL
            $modifiedUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $urlParts['query'];
            
            
        } catch (Error $th) {
           
        }
        return $modifiedUrl;
    }
}
