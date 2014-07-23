#Wordpress with pjax

**Usage:**
- Install and activate the plugin as usual
- Add **data-pjax** attribute to links

**Example:**
```
<a href="<?php echo get_permalink(1) ?>" data-pjax="#content">My first pjax link</a>
```

It will request a page with ajax. The response will only contain the required part (in the example #content's inner html) and overwrite the orignal content.

To make it work, be sure:
- the original page contains the required html ```...<div id="content"> a </div>...```
- the response page should have this html part also ```...<div id="content"> b </div>...```

##PJAX with Forms
You are able to sending forms with pjax too. Handle your forms by adding ```data-pjax="[target container]"``` to your ```<form>``` tag.
(You cannot use ```action``` named inputs inside your forms, due pjax using it. Suggesting to rename this form's actions forexample to ```_action``` )

**Example in your functions php:**
```
if (isset($_POST['_action']) && $_POST['_action'] == 'save_post') {
   $id = wp_insert_post(array(
       'post_title' => strip_tags($_POST['title']),
       'post_status' => 'publish',
       'post_content' => $_POST['content']
   ));
   wp_redirect(get_permalink($id));
   exit;
}
```

 
**More about pjax**

[https://github.com/defunkt/jquery-pjax](https://github.com/defunkt/jquery-pjax)
