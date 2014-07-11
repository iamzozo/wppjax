#Wordpress with pjax

**Usage:**
- Install and activate the plugin as usual
- Add **data-pjax** attribute to links

** Forexample**
```
<a href="<?php echo get_permalink(1) ?>" data-pjax="#content">My first pjax link</a>
```

It will request a page with ajax. The response will only contain the required part (in the example #content's inner html) and overwrite the orignal content.

To make it work, be sure:
- the original page contains the required html (ex. ...<div id="content"> a </div>...)
- the response page should have this html part also (ex. ...<div id="content"> b </div>)
 
**More about pjax**
[https://github.com/defunkt/jquery-pjax](https://github.com/defunkt/jquery-pjax)
