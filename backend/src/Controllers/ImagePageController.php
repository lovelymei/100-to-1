<?php

namespace Controllers;

use Models\Image;

class ImagePageController extends BaseController
{
    public static function print(Image $image)
    {
        print("Image page");
    }
}