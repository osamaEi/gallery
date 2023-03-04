<?php


class Photo extends db_object {
    
    
    
    
    
    protected static $db_table ="photos";
    protected static $db_table_field =array('id','title','caption','description','filename','alternate_text','type','size');
    
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $alternate_text;
    public $caption;
   
   
    
    public $tmp_path;
    public $upload_directory = "images";
    
    public $errors= array();
  
    
    // This is passing $_FILES['uploaded_file'] as an argument
    
    
           public function set_file($file) {
        
        if (empty($file) || !$file || !is_array($file)) {
            
            $this->errors[]= "there was no file uploaded here";
            
            return false;
            
        } 
        
        elseif($file['error'] !=0)
        {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            
            return false;
            
        } else {
            
            
            $this->filename =basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type =$file['type'];
            $this->size =$file ['size'];
            
            
        }
        
        
        
        
        
    }

    
    
    
    public function picture_path() {
        
        
        return $this->upload_directory .DS. $this->filename;
        
        
    } 
    
    
    
    
    public function save() {
        
     
            
            if(!empty($this->errors)) {
                
                return false;
            }
            
            if (empty($this->filename) || empty($this->tmp_path)) {
                
                $this->errors[] ="the file was not avaliable";
                
                return false;
                
            }
            
            
            $target_path= SITE_ROOT.DS. 'admin' .DS. $this->upload_directory .DS. $this->filename; 
            
            if(file_exists($target_path)) {
                
                $this->errors[] = "The file {$this->filename} already exists";
                
                return false;
            }
            
            if(move_uploaded_file($this->tmp_path, $target_path)) {
                
                if ($this->create()) {
                    
                    unset ($this->tmp_path);
                    
                    return true;
                    
                }
                
            }else {
                
                $this->errors[] = "the file probably does not have permission";
                
                return false;
                
            }
            
           
        
        
        
    }
    
    public function delete_photo() {
        
        if ($this->delete()) {
            
            $target_path = SITE_ROOT.DS. 'admin' .DS. $this->picture_path();
            
            
            return unlink($target_path)? true : false;
            
            
            
            
        } else {
            
            return false;
            
        }
        
        
        
    }
    
    
    
    
    

} 


















?>