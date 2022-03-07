<?php

class CommonFunction
{
    public static function fileUpload($file = "", $path, $old_file = null, $cropdata = null, $append_name = false, $aspectRatio = null)
    {
        $fileName = "";
        if (isset($file) && $file != "") {
            try {
                $fileName = strtotime("now") . mt_rand(0, 999999);
                if ($append_name) {
                    $fileName = $fileName . "-" . $file->getClientOriginalName();
                } else {
                    $fileName = $fileName . "." . $file->getClientOriginalExtension();
                }

                $path = env('STORAGE_DIRECTORY', '') . $path;

                if ($old_file) {
                    $exists = Storage::disk('s3')->has($path . "/" . $old_file);
                    if ($exists) {
                        Storage::disk('s3')->delete($path . '/' . $old_file);
                    }
                }

                // Image
                $mime_types = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
                $content_type = $file->getClientMimeType();
                if (in_array($content_type, $mime_types) && $cropdata) {
                    $image = Image::make($file);
                    $image->crop($cropdata->width, $cropdata->height, $cropdata->x, $cropdata->y)->stream();

                    Storage::disk('s3')->put(
                        $path . '/' . $fileName,
                        $image->__toString()
                    );

                    // Thumb
                    $thumbName = strtotime("now") . mt_rand(0, 999999);
                    if ($append_name) {
                        $thumbName = $thumbName . "-thumb-" . $file->getClientOriginalName();
                    } else {
                        $thumbName = $thumbName . "-thumb." . $file->getClientOriginalExtension();
                    }
                    $thumb = $path . "/thumb/";
                    $img = Image::make($file)->resize(225, 225)->stream();
                    Storage::disk('s3')->put(
                        $thumb . $thumbName,
                        $img->__toString()
                    );

                    if ($old_file && $thumb . $old_file) {
                        Storage::disk('s3')->delete($thumb . $old_file);
                    }
                } else if (in_array($content_type, $mime_types) && $aspectRatio) {
                    $resize_photo = Image::make($file)
                        ->resize($aspectRatio->width, $aspectRatio->height, function ($constraints) {
                            $constraints->aspectRatio();
                            $constraints->upsize();
                        })->resizeCanvas($aspectRatio->width, $aspectRatio->height)->stream();
                    Storage::disk('s3')->put(
                        $path . '/' . $fileName,
                        $resize_photo->__toString()
                    );
                } else {
                    $file->storeAs($path, $fileName, ['disk' => 's3']);
                }
            } catch (\Exception $e) {
            }
        }
        return $fileName;
    }
}