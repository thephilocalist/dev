<?php

namespace app\models\upload;

use Yii;
use yii\base\Model;
use yii\imagine\Image;

class WelcomePhotoUpload extends Model
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

    public function upload($id)
    {
        if ($this->validate()) {
            
            $this->imageFile->saveAs('images/welcome/'.$this->photo.'.jpg', ['jpeg_quality' => 90]);
            Image::thumbnail('images/welcome/'.$this->photo.'.jpg', 1024, 600)->
                             save('images/welcome/'.$this->photo.'@1024.jpg', ['jpeg_quality' => 90]);
            Image::thumbnail('images/welcome/'.$this->photo.'.jpg', 200, 200)->
                             save('images/welcome/'.$this->photo.'@200x200.jpg', ['jpeg_quality' => 90]);
            Image::thumbnail('images/welcome/'.$this->photo.'.jpg', 380, 220)->
                            save('images/welcome/'.$this->photo.'@380x220.jpg', ['jpeg_quality' => 90]);
            Image::thumbnail('images/welcome/'.$this->photo.'.jpg', 600, 400)->
                            save('images/welcome/'.$this->photo.'@600x400.jpg', ['jpeg_quality' => 90]);

            return true;
        } else {
            return false;
        }
    }
}
