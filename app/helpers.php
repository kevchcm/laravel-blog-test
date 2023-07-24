<?php

if (!function_exists('getPostThumbnail')){
    function getPostThumbnail(object $post): string {
        return $post->thumbnail? asset('storage/' . $post->thumbnail) : '/images/illustration-1.png';
    }
}