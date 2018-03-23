<?php
    class View
    {
        function generate($content_view, $template_view, $result = null)
        {
            if($result) extract($result);
            include 'application/views/'.$template_view;
        }
    }
?>