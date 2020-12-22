<?php
/**
 * SVG Upload
 */

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types; 
} 
add_action('upload_mimes', 'add_file_types_to_uploads');