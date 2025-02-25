// Validate product image size for upload (600x600px)
function validate_product_image_size($file) {
    // Check if the uploaded image is a product image
    if (isset($file['name'])) {
        $image = getimagesize($file['tmp_name']);
        $width = $image[0];
        $height = $image[1];

        // Define allowed image size (600x600px)
        if ($width != 600 || $height != 600) {
            // Return an error if the image size is not 600x600px
            $file['error'] = 'Image dimensions must be exactly 600x600px. Please upload a 600x600px image.';
        }
    }

    return $file;
}
add_filter('wp_handle_upload_prefilter', 'validate_product_image_size');
