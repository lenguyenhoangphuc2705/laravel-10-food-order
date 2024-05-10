<?php


/** Create unique slug */
if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = \Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = \Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

if (!function_exists('currencyPosition')) {
    function currencyPosition($price): string
    {
        if (config('settings.site_currency_icon_position') === 'left') {
            return config('settings.site_currency_icon') . $price;
        } else {
            return $price . config('settings.site_currency_icon');
        }
    }
}
/** Calculate cart total price */
if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $total = 0;

        foreach (Cart::content() as $item) {
            // Kiểm tra nếu $item có tồn tại và không phải null
            if ($item) {
                $productPrice = $item->price;

                // Kiểm tra nếu $item->options và $item->options->product_size có tồn tại và không phải null trước khi truy cập thuộc tính
                $sizePrice = isset($item->options->product_size['price']) ? $item->options->product_size['price'] : 0;

                $optionsPrice = 0;
                
                // Kiểm tra nếu $item->options và $item->options->product_options có tồn tại và không phải null trước khi lặp qua
                if ($item->options && $item->options->product_options) {
                    foreach ($item->options->product_options as $option) {
                        // Kiểm tra nếu $option có tồn tại và không phải null trước khi truy cập thuộc tính
                        if ($option) {
                            $optionsPrice += $option['price'];
                        }
                    }
                }

                $total += ($productPrice + $sizePrice + $optionsPrice) * $item->qty;
            }
        }

        return $total;
    }
}

