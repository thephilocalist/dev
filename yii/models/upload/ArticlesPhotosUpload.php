<?php

namespace app\models\upload;

use Yii;
use yii\base\Model;
use yii\imagine\Image;

class ArticlesPhotosUpload extends Model
{
    public $photo;
    public $imageFile;
    public $photo_id;

    public function rules()
    {
        return [
        [['imageFile'], 'file', 'skipOnEmpty' => false,
                                'checkExtensionByMimeType' => false,
                                'mimeTypes' => ['image/jpeg', 'image/png', 'image/jpg'],
                                'extensions' => 'png, jpg, jpeg', ],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            
            $this->imageFile->saveAs('images/articles/'.$this->photo.'.jpg', ['jpeg_quality' => 40]);
            Image::thumbnail('images/articles/'.$this->photo.'.jpg', 1024, 768)->
                             save('images/articles/'.$this->photo.'@1024.jpg', ['jpeg_quality' => 40]);
            Image::thumbnail('images/articles/'.$this->photo.'.jpg', 100, 100)->
                             save('images/articles/'.$this->photo.'@100x100.jpg', ['jpeg_quality' => 40]);
            Image::thumbnail('images/articles/'.$this->photo.'.jpg', 200, 200)->
                             save('images/articles/'.$this->photo.'@200x200.jpg', ['jpeg_quality' => 40]);
            Image::thumbnail('images/articles/'.$this->photo.'.jpg', 380, 220)->
                            save('images/articles/'.$this->photo.'@380x220.jpg', ['jpeg_quality' => 40]);
            Image::thumbnail('images/articles/'.$this->photo.'.jpg', 600, 400)->
                            save('images/articles/'.$this->photo.'@600x400.jpg', ['jpeg_quality' => 40]);

            return true;
        } else {
            return false;
        }
    }
}