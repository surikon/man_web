<?php
    class View
    {
        function generate($content_view, $template_view, $result = null)
        {
           include 'application/views/'.$template_view;
        }
    }
?>