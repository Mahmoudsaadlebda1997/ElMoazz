<?php


namespace Modules\CommonModule\Traits;


use Illuminate\Support\Facades\Storage;

trait PathHelper
{

    function getImagePathAttribute(){
        if($this->image){
            return Storage::url($this->image);
        }
        return null;
    }
    function getFilePathAttribute(){
        if($this->file){
            return Storage::url($this->file);
        }
        return null;
    }
    function getFileAttendancePathAttribute(){
        if($this->file_attendance){
            return Storage::url($this->file_attendance);
        }
        return null;
    }
    function getTicketFilePathAttribute(){
        if($this->ticket_file){
            return Storage::url($this->ticket_file);
        }
        return null;
    }
    function getAnswerFilePathAttribute(){
        if($this->answer_file){
            return Storage::url($this->answer_file);
        }
        return null;
    }

}
