<?php

function rm_sample_shortcode($atts, $content=null) {
    # this function MUST return a string
    # the string will add to post using [shortcode_name]
    # just like [job_listing]
    //return "this my short code";

    # also you can use html tag here.
    //return "<h1>this my short code</h1>";
    
    # parameters [job_listing title="my title"]
    //print_r($atts);

    # default parameters
    //$atts = shortcode_atts(
        //array(
            //'title' => 'Default title',
            //'src' => 'www.google.com'
        //), $atts
    //);
    //print_r($atts);

    # content
    # [job_listing]This is content[/job_listing]
    print_r($content);
}

add_shortcode('job_listing', 'rm_sample_shortcode');
