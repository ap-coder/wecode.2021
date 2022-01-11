<?php

namespace App\Observers;

use App\Models\Pagesection;
use App\Helpers\Sanitize;
use DOMDocument;

class PageSectionObserver
{
    /**
     * Handle the PageSection "created" event.
     *
     * @param  \App\Models\PageSection  $pageSection
     * @return void
     */
    public function saving(PageSection $pageSection)
    {
        
        libxml_use_internal_errors(false);
        $file = new DOMDocument();
        libxml_use_internal_errors(true);
        $file->loadHTML($pageSection->section,LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $tags = $file->getElementsByTagName('img');

        if ($tags) {
            foreach ($tags as $tag) {

                $oldSrc = $tag->getAttribute('src');
    
                $originname = substr($oldSrc, strrpos($oldSrc, '/') + 1);
                $url = dirname($oldSrc);
    
                $filename = pathinfo($originname, PATHINFO_FILENAME);
                $extension = pathinfo($originname, PATHINFO_EXTENSION);
    
                $filtername = Sanitize::normalizeString($filename);
    
                $name = $filtername.'.'.$extension;
    
                $newScrURL = $url.'/'.$name;
                $tag->setAttribute('src', $newScrURL);
             }
               
             $htmlString = substr($file->saveHTML(), 12, -15);

             $pageSection->section=$htmlString;

        }
       
        // attachments

        libxml_use_internal_errors(false);
        $attachment = new DOMDocument();
        libxml_use_internal_errors(true);
        $attachment->loadHTML($pageSection->section,LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $hrefs = $attachment->getElementsByTagName('a');

        if ($hrefs) {
            foreach ($hrefs as $href) {

                $oldSrc = $href->getAttribute('href');

                $originname = substr($oldSrc, strrpos($oldSrc, '/') + 1);
                $url = dirname($oldSrc);
               
                $filename = pathinfo($originname, PATHINFO_FILENAME);
                $extension = pathinfo($originname, PATHINFO_EXTENSION);                

                if($extension){
                    $filtername = Sanitize::normalizeString($filename);
    
                    $name = $filtername.'.'.$extension;
        
                    $newScrURL = $url.'/'.$name;
                    $href->setAttribute('href', $newScrURL);
                }
                
             }
                            
             $htmlStringHref = substr($attachment->saveHTML(), 12, -15);

             $pageSection->section=$htmlStringHref;

        }
        
    }

    /**
     * Handle the PageSection "updated" event.
     *
     * @param  \App\Models\PageSection  $pageSection
     * @return void
     */
    public function updating(PageSection $pageSection)
    {
        libxml_use_internal_errors(false);
        $file = new DOMDocument();
        libxml_use_internal_errors(true);
        $file->loadHTML($pageSection->section,LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $tags = $file->getElementsByTagName('img');

        if ($tags) {
            foreach ($tags as $tag) {

                $oldSrc = $tag->getAttribute('src');
    
                $originname = substr($oldSrc, strrpos($oldSrc, '/') + 1);
                $url = dirname($oldSrc);
    
                $filename = pathinfo($originname, PATHINFO_FILENAME);
                $extension = pathinfo($originname, PATHINFO_EXTENSION);
    
                $filtername = Sanitize::normalizeString($filename);
    
                $name = $filtername.'.'.$extension;
    
                $newScrURL = $url.'/'.$name;
                $tag->setAttribute('src', $newScrURL);
             }
               
             $htmlString = substr($file->saveHTML(), 12, -15);

             $pageSection->section=$htmlString;

        }

        // attachments

        libxml_use_internal_errors(false);
        $attachment = new DOMDocument();
        libxml_use_internal_errors(true);
        $attachment->loadHTML($pageSection->section,LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $hrefs = $attachment->getElementsByTagName('a');

        if ($hrefs) {
            foreach ($hrefs as $href) {

                $oldSrc = $href->getAttribute('href');

                $originname = substr($oldSrc, strrpos($oldSrc, '/') + 1);
                $url = dirname($oldSrc);
               
                $filename = pathinfo($originname, PATHINFO_FILENAME);
                $extension = pathinfo($originname, PATHINFO_EXTENSION);                

                if($extension){
                    $filtername = Sanitize::normalizeString($filename);
    
                    $name = $filtername.'.'.$extension;
        
                    $newScrURL = $url.'/'.$name;
                    $href->setAttribute('href', $newScrURL);
                }
                
             }
                            
             $htmlStringHref = substr($attachment->saveHTML(), 12, -15);

             $pageSection->section=$htmlStringHref;

        }
    }
}
